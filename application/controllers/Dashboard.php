<?php
defined('BASEPATH') or exit ('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->Auth_model->cek_session();
		$this->load->model('Pendapatan_model');
		$this->load->model('Pengambilan_model');
		$this->load->model('Product_model');
		$this->Auth_model->midleware();


	}
	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['produk'] = $this->Product_model->count_produk();
		$data['harian'] = $this->Pendapatan_model->pendapatan_harian();
		$data['bulanan'] = $this->Pendapatan_model->pendapatan_bulanan();
		$data['hutang'] = $this->Pengambilan_model->get_hutang();
		$monthly_income = $this->Pendapatan_model->get_monthly_income();
		$yearly_income = $this->Pendapatan_model->get_yearly_income();
		$data['yearly_income'] = json_encode($yearly_income);
		$data['monthly_income'] = json_encode($monthly_income);
		$this->load->view('layout/header.php', $data);
		$this->load->view('pages/dashboard/index.php', $data);
		$this->load->view('layout/footer.php');
	}
}
