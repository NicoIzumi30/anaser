<?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class Dashboard extends CI_Controller
    {
		public function __construct()
		{
			parent::__construct();
			$this->Auth_model->cek_session();
		}
		public function index()
		{
			$data['title'] = 'Dashboard';
			$this->load->view('layout/header.php', $data);
			$this->load->view('pages/dashboard/index.php');
			$this->load->view('layout/footer.php');
		}
	}
