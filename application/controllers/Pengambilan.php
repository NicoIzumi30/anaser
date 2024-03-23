<?php
defined('BASEPATH') or exit ('No direct script access allowed');

class Pengambilan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->Auth_model->cek_session();
		$this->load->model('Pengambilan_model');
		$this->load->model('Product_model');
		$this->load->model('Users_model');
		$this->load->model('Pendapatan_model');
		$this->load->model('Kategori_model');
		$this->load->model('Notifikasi_model');
	}
	public function index()
	{
		$data['title'] = 'Pengambilan';
		$this->load->view('layout/header.php', $data);
		if ($this->session->userdata('user_role') == 'admin' || $this->session->userdata('user_role') == 'operator') {
			$this->form_validation->set_rules('kategori_id', 'Kategori', 'required');
			$this->form_validation->set_rules('keyword', 'Keyword', 'required');
			if ($this->form_validation->run() == false) {
				$data['pengambilans'] = $this->Pengambilan_model->get_all();
			} else {
				$keyword = htmlspecialchars($this->input->post('keyword'));
				;
				$kategori = $this->input->post('kategori_id');
				$data['pengambilans'] = $this->Pengambilan_model->search($keyword, $kategori);
				$data['keyword'] = $keyword;
				if ($kategori != '*') {
					$data['kategori_id'] = $kategori;
				}
			}
			$data['products'] = $this->Product_model->get_all();
			$data['categories'] = $this->Kategori_model->get_all();

			$data['users'] = $this->Users_model->get_all();
			$this->load->view('pages/pengambilan/index.php', $data);
		} else {
			$data['notifikasi'] = $this->Notifikasi_model->get_all();
			$data['pengambilans'] = $this->Pengambilan_model->get_data_by_session();
			$this->load->view('pages/pengambilan/pengambilan_tuser.php', $data);
		}
		$this->load->view('layout/footer.php');
	}
	public function add()
	{
		$this->Auth_model->midleware_operator();
		$this->form_validation->set_rules('user_id', 'User ID', 'required');
		$this->form_validation->set_rules('produk_id', 'Produk ID', 'required');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('flash-gagal', 'Di Tambahkan');
			return redirect('pengambilan');
		} else {
			$produk_id = $this->input->post('produk_id');
			$data_produk = $this->Product_model->get_data($produk_id);
			$harga = $data_produk['harga'];
			$data = [
				'user_id' => htmlspecialchars($this->input->post('user_id')),
				'produk_id' => htmlspecialchars($this->input->post('produk_id')),
				'tanggal' => htmlspecialchars($this->input->post('tanggal')),
				'harga' => $harga
			];
			$stok = $data_produk['stok'];
			$nama_produk = $data_produk['nama_produk'];
			$waktu = date('Y-m-d H:i');
			$data_notifikasi = [
				'user_id' => $data['user_id'],
				'pesan' => $nama_produk.' telah ditambahkan di pengambilan ['.$waktu.']'
			];
			$this->Notifikasi_model->insert($data_notifikasi);
			$stok_baru = $stok - 1;
			$this->db->update('produk', ['stok' => $stok_baru], ['id' => $produk_id]);
			$this->Pengambilan_model->insert($data);
		}

	}
	public function lunas($id)
	{
		$data = $this->Pengambilan_model->get_data($id);
		$tanggal_pelunasan = date('Y-m-d');
		$user_id = $data['user_id'];
		$produk_id = $data['produk_id'];
		$data_produk = $this->Product_model->get_data($produk_id);
		$harga = $data_produk['harga'];
		$nama_produk = $data_produk['nama_produk'];
		$waktu = date('Y-m-d H:i');
		$data_notifikasi = [
			'user_id' => $user_id,
			'pesan' => $nama_produk.' telah di lunasi ['.$waktu.']'
		];
		$this->Notifikasi_model->insert($data_notifikasi);
		$data_lunas = [
			'user_id' => $user_id,
			'produk_id' => $produk_id,
			'tanggal_pelunasan' => $tanggal_pelunasan,
			'harga' => $harga,
		];
		$this->Pendapatan_model->insert($data_lunas);
		$this->Pengambilan_model->delete($id);
		$this->session->set_flashdata('flash', 'Di Lunasi');
		return redirect('pengambilan');
	}
	public function cancel($id)
	{
		$data = $this->Pengambilan_model->get_data($id);
		$produk_id = $data['produk_id'];
		$data_produk = $this->Product_model->get_data($produk_id);
		$stok = $data_produk['stok'];
		$nama_produk = $data_produk['nama_produk'];
		$waktu = date('Y-m-d H:i');
		$pesan = $nama_produk.' telah di cancel ['.$waktu.']';
		$data_notifikasi = [
			'user_id' => $data['user_id'],
			'pesan' => $pesan
		];
		$this->Notifikasi_model->insert($data_notifikasi);
		$stok_baru = $stok + 1;
		$this->db->update('produk', ['stok' => $stok_baru], ['id' => $produk_id]);
		$this->Pengambilan_model->delete($id);
		$this->session->set_flashdata('flash', 'Di Batalkan');
		return redirect('pengambilan');
	}
}
