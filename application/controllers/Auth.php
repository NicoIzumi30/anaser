<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
        date_default_timezone_set('Asia/Jakarta');
    }
    public function index()
    {
        $this->form_validation->set_rules('no_telp', 'No Telp', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('pages/auth/index');
        } else {
            $data = [
                'nomor_telp' => htmlspecialchars($this->input->post('no_telp')),
                'password' => $this->input->post('password')
            ];
            $this->Auth_model->login($data);
        }
    }
	public function login_admin()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('pages/auth/admin');
        } else {
            $data = [
                'email' => htmlspecialchars($this->input->post('email')),
                'password' => $this->input->post('password')
            ];
            $this->Auth_model->login_admin($data);
        }
    }
    public function logout()
    {
        $this->Auth_model->logout();
    }
}
