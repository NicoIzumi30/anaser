<?php
defined('BASEPATH') or exit ('No direct script access allowed');

class Jasa extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->Auth_model->cek_session();
		$this->load->model('Users_model');
		$this->load->model('Jasa_model');
	}
	public function index()
	{
		$data['title'] = 'Jasa';
		$this->load->view('layout/header.php', $data);
		$this->form_validation->set_rules('keyword', 'Keyword', 'required');
		if ($this->form_validation->run() == false) {
			$data['jasa'] = $this->Jasa_model->get_all();
		} else {
			$keyword = htmlspecialchars($this->input->post('keyword'));
			;
			$data['jasa'] = $this->Jasa_model->search($keyword);
			$data['keyword'] = $keyword;
		}
		$data['users'] = $this->Users_model->get_all();
		$this->load->view('pages/jasa/index.php', $data);
		$this->load->view('layout/footer.php');
	}
	public function add()
	{
		$this->Auth_model->midleware_not_operator();
		$this->form_validation->set_rules('seri', 'Seri', 'required');
		$this->form_validation->set_rules('kerusakan', 'Kerusakan', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_rules('harga', 'Harga', 'required');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('flash-gagal', 'Di Tambahkan');
			return redirect('jasa');
		} else {
			if($this->session->userdata('user_role') == 'tuser'){
				$user_id = $this->session->userdata('user_id');
			}else{
				$user_id = $this->input->post('user_id');
			}
			$data = [
				'user_id' => $user_id,
				'seri_hp' => htmlspecialchars($this->input->post('seri')),
				'kerusakan' => htmlspecialchars($this->input->post('kerusakan')),
				'status' => htmlspecialchars($this->input->post('status')),
				'harga' => htmlspecialchars($this->input->post('harga')),
			];
			$this->Jasa_model->insert($data);
		}

	}
	public function lunas($id)
	{
		$data = $this->Jasa_model->get_data($id);
		$data_update = [
			'status' => 1,
			'lunas' => 1
		];
		$this->db->where('id', $id);
		$this->db->update('jasa', $data_update);
		$this->session->set_flashdata('flash', 'Di Lunasi');
		return redirect('jasa');
	}
	public function cancel($id)
	{
		$this->Jasa_model->delete($id);
		$this->session->set_flashdata('flash', 'Di Batalkan');
		return redirect('jasa');
	}
}
