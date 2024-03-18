<?php
defined('BASEPATH') or exit ('No direct script access allowed');

class Users extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->Auth_model->cek_session();
		$this->Auth_model->midleware();
		$this->load->model('Users_model');
		$this->Auth_model->midleware();

	}
	public function index()
	{
		$data['title'] = 'Users';
		$data['users'] = $this->Users_model->get_all();
		$this->load->view('layout/header.php', $data);
		$this->load->view('pages/users/index.php', $data);
		$this->load->view('layout/footer.php');
	}
	public function add()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('konter', 'Konter', 'required');
		$this->form_validation->set_rules('no_telp', 'No Telp', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('flash-gagal', 'Di Tambahkan');
			return redirect('users');
		} else {
			$data = [
				'nama' => htmlspecialchars($this->input->post('nama')),
				'nama_konter' => htmlspecialchars($this->input->post('konter')),
				'nomor_telp' => htmlspecialchars($this->input->post('no_telp')),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'role' => 'tuser'
			];
			$this->Users_model->insert($data);
		}
	}
	public function update($id)
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('konter', 'Konter', 'required');
		$this->form_validation->set_rules('no_telp', 'No Telp', 'required');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('flash-gagal', 'Di Update');
			return redirect('users');
		} else {
			$data = [
				'nama' => htmlspecialchars($this->input->post('nama')),
				'nomor_telp' => htmlspecialchars($this->input->post('no_telp')),
				'nama_konter' => htmlspecialchars($this->input->post('konter')),
			];
			$this->Users_model->update($data, $id);
		}
	}
	public function delete($id)
	{
		$this->Users_model->delete($id);
	}

}
