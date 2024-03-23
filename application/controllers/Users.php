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
		$data['title'] = 'User Tuser';
		$data['users'] = $this->Users_model->get_all();
		$this->load->view('layout/header.php', $data);
		$this->load->view('pages/users/index.php', $data);
		$this->load->view('layout/footer.php');
	}
	public function operator(){
		$data['title'] = 'User Operator';
		$data['users'] = $this->Users_model->get_all_operator();
		$this->load->view('layout/header.php', $data);
		$this->load->view('pages/users/operator.php', $data);
		$this->load->view('layout/footer.php');
	} 
	public function add()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('no_telp', 'No Telp', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('flash-gagal', 'Di Tambahkan');
			return redirect('users');
		} else {
			$role = $this->input->post('role');
			if($role == 2){
				$role = 'operator';
			}else{
				$role = 'tuser';
			}
			$data = [
				'nama' => htmlspecialchars($this->input->post('nama')),
				'nomor_telp' => htmlspecialchars($this->input->post('no_telp')),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'role' => $role
			];
			$this->Users_model->insert($data,$role);
		}
	}
	public function update($id)
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('no_telp', 'No Telp', 'required');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('flash-gagal', 'Di Update');
			return redirect('users');
		} else {
			$role = $this->input->post('role');
			if($role == 2){
				$role = 'operator';
			}else{
				$role = 'tuser';
			}
			$data = [
				'nama' => htmlspecialchars($this->input->post('nama')),
				'nomor_telp' => htmlspecialchars($this->input->post('no_telp')),
			];
			$this->Users_model->update($data, $id,$role);
		}
	}
	public function delete($id)
	{
		$role = 'tuser';
		$this->Users_model->delete($id,$role);
	}
	public function delete_operator($id){
		$role = 'operator';
		$this->Users_model->delete($id,$role);
	} 

}
