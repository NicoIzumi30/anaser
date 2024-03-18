<?php
defined('BASEPATH') or exit ('No direct script access allowed');

class Pelanggan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->Auth_model->cek_session();
		$this->load->model('Bukukas_model');
	}

	public function index()
	{
		$data['title'] = 'Kontak Pelanggan';
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		if ($this->form_validation->run() == false) {
			$data['kontak'] = $this->Bukukas_model->get_pelanggan();
		} else {
			$nama = $this->input->post('nama', true);
			$data['kontak'] = $this->Bukukas_model->search_pelanggan($nama);
			$data['nama'] = $nama;
		}
		$this->load->view('layout/header.php', $data);
		$this->load->view('pages/pelanggan/index.php', $data);
		$this->load->view('layout/footer.php');
	}

}

