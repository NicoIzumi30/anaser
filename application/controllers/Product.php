<?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class Product extends CI_Controller
    {
		public function __construct()
		{
			parent::__construct();
			$this->Auth_model->cek_session();
		}
		public function index()
		{
			$data['title'] = 'Daftar Produk';
			$this->load->view('layout/header.php', $data);
			if($this->session->userdata('user_role') == 'admin'){
				$this->load->view('pages/product/index.php');				
			}else{
				$this->load->view('pages/product/produk_tuser.php');
			}
			$this->load->view('layout/footer.php');
		}
	}
