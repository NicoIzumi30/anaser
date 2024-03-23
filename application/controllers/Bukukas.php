<?php
defined('BASEPATH') or exit ('No direct script access allowed');

class Bukukas extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->Auth_model->cek_session();
		$this->load->model('Bukukas_model');
		$this->load->model('Users_model');
		$this->Auth_model->midleware_not_operator();
	}

	public function index()
	{
		$data['title'] = 'Buku Kas';
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		$pemasukan_bulan_lalu = $this->Bukukas_model->pemasukan_bulan_lalu();
		$pengeluaran_bulan_lalu = $this->Bukukas_model->pengeluaran_bulan_lalu();
		$total_bulan_lalu = $pemasukan_bulan_lalu - $pengeluaran_bulan_lalu;
		$data['total_bulan_lalu'] = $total_bulan_lalu;
		if ($this->form_validation->run() == false) {
			$data['bukukas'] = $this->Bukukas_model->get_all();
		} else {
			$tanggal = $this->input->post('tanggal', true);
			$data['bukukas'] = $this->Bukukas_model->search($tanggal);
			$data['tanggal'] = $tanggal;
		}

		$this->load->view('layout/header.php', $data);
		$this->load->view('pages/bukukas/index.php', $data);
		$this->load->view('layout/footer.php');
	}
	public function konter()
	{
		$this->Auth_model->midleware();
		$data['title'] = 'Buku Kas Konter';
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		$this->form_validation->set_rules('user_id', 'User ID', 'required');
		$pemasukan_bulan_lalu = $this->Bukukas_model->pemasukan_bulan_lalu();
		$pengeluaran_bulan_lalu = $this->Bukukas_model->pengeluaran_bulan_lalu();
		$total_bulan_lalu = $pemasukan_bulan_lalu - $pengeluaran_bulan_lalu;
		$data['users'] = $this->Users_model->get_all();
		$data['total_bulan_lalu'] = $total_bulan_lalu;
		if ($this->form_validation->run() == false) {
			$data['bukukas'] = $this->Bukukas_model->get_all();
		} else {
			$tanggal = $this->input->post('tanggal', true);
			$data['tuser_id'] = $this->input->post('user_id', true);
			$data['bukukas'] = $this->Bukukas_model->search($tanggal, $data['tuser_id']);
			$data['tanggal'] = $tanggal;
		}

		$this->load->view('layout/header.php', $data);
		$this->load->view('pages/bukukas/konter.php', $data);
		$this->load->view('layout/footer.php');
	}
	public function pemasukan()
	{
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		$this->form_validation->set_rules('keperluan', 'Keperluan', 'required');
		$this->form_validation->set_rules('nama_pelanggan', 'Nama Pelanggan', 'required');
		$this->form_validation->set_rules('no_telp', 'No Telp', 'required');
		$this->form_validation->set_rules('harga', 'Harga', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('flash-gagal', 'Di Tambahkan');
			return redirect('bukukas');
		} else {
			$user_id = $this->session->userdata('user_id');
			$k_status = $this->input->post('k');
			$data = [
				'user_id' => $user_id,
				'tanggal' => htmlspecialchars($this->input->post('tanggal')),
				'keperluan' => htmlspecialchars($this->input->post('keperluan')),
				'nama_pelanggan' => htmlspecialchars($this->input->post('nama_pelanggan')),
				'no_telp' => htmlspecialchars($this->input->post('no_telp')),
				'harga' => htmlspecialchars($this->input->post('harga')),
				'alamat' => htmlspecialchars($this->input->post('alamat')),
				'tipe' => 'pemasukan',
			];
			$this->Bukukas_model->insert($data, $k_status);
		}
	}

	public function pengeluaran()
	{
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		$this->form_validation->set_rules('keperluan', 'Keperluan', 'required');
		$this->form_validation->set_rules('harga', 'Harga', 'required');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('flash-gagal', 'Di Tambahkan');
			return redirect('bukukas');
		} else {
			$user_id = $this->session->userdata('user_id');
			$k_status = $this->input->post('k');
			$data = [
				'user_id' => $user_id,
				'tanggal' => htmlspecialchars($this->input->post('tanggal')),
				'keperluan' => htmlspecialchars($this->input->post('keperluan')),
				'harga' => htmlspecialchars($this->input->post('harga')),
				'tipe' => 'pengeluaran',
			];
			$this->Bukukas_model->insert($data, $k_status);
		}
	}
}

