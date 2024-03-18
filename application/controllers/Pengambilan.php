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
	}
	public function index()
	{
		$data['title'] = 'Pengambilan';
		$this->load->view('layout/header.php', $data);
		if ($this->session->userdata('user_role') == 'admin') {
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
			$data['pengambilans'] = $this->Pengambilan_model->get_data_by_session();
			$this->load->view('pages/pengambilan/pengambilan_tuser.php', $data);
		}
		$this->load->view('layout/footer.php');
	}
	public function add()
	{
		$this->Auth_model->midleware();
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
		$stok = $data_produk['stok'];
		$stok_baru = $stok - 1;
		$data_update = [
			'stok' => $stok_baru
		];
		$this->db->update('produk', $data_update, ['id' => $produk_id]);
		$harga = $data_produk['harga'];
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
		$this->Pengambilan_model->delete($id);
		$this->session->set_flashdata('flash', 'Di Batalkan');
		return redirect('pengambilan');
	}
}
