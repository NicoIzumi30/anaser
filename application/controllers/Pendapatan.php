<?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class Pendapatan extends CI_Controller
    {
		public function __construct()
		{
			parent::__construct();
			$this->Auth_model->cek_session();
			$this->load->model('Pendapatan_model');
		}
		public function index()
		{
			$data['title'] = 'Pendapatan';
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		if($this->form_validation->run() == false){
			$data['pendapatans'] = $this->Pendapatan_model->get_all();
		}else{
			$tanggal = $this->input->post('tanggal');
			$data['pendapatans'] = $this->Pendapatan_model->search($tanggal);
			$data['tanggal'] = $tanggal;
		}
			$this->load->view('layout/header.php', $data);
			$this->load->view('pages/pendapatan/index.php',$data);
			$this->load->view('layout/footer.php');
		}
	}
