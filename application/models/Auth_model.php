<?php
defined('BASEPATH') or exit ('No direct script access allowed');
class Auth_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function cek_session()
	{
		if ($this->session->userdata('user_id')) {
			return true;
		} else {
			return redirect('auth');
		}
	}
	public function midleware()
	{
		if ($this->session->userdata('user_role') == 'admin') {
			return true;
		} else {
			return redirect('product');
		}
	}
	public function midleware_operator()
	{
		if ($this->session->userdata('user_role') == 'admin' || $this->session->userdata('user_role') == 'operator') {
			return true;
		} else {
			return redirect('product');
		}
	}
	public function midleware_not_operator(){
		if ($this->session->userdata('user_role') == 'admin' || $this->session->userdata('user_role') == 'tuser') {
			return true;
		} else {
			return redirect('product');
		}
	} 
	public function login($data)
	{
		$no_telp = $data['nomor_telp'];
		$password = $data['password'];
		$user = $this->db->get_where('users', ['nomor_telp' => $no_telp])->row_array();
		if ($user) {
			if (password_verify($password, $user['password'])) {
				$data_session = [
					'user_id' => $user['id'],
					'user_role' => $user['role'],
				];
				$this->session->set_userdata($data_session);
				return redirect('product');
			} else {
				$this->session->set_flashdata('message', '<div role="alert" class="relative flex w-full px-4 py-4 text-base text-white rounded-lg font-regular mt-2" style="background-color: rgb(220 38 38);"><div class="mr-12 ">Email atau Password Salah</div></div>');
				return redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div role="alert" class="relative flex w-full px-4 py-4 text-base text-white rounded-lg font-regular mt-2" style="background-color: rgb(220 38 38);"><div class="mr-12 ">Email atau Password Salah</div></div>');
			return redirect('auth');
		}
	}
	public function login_admin($data)
	{
		$email = $data['email'];
		$password = $data['password'];
		$user = $this->db->get_where('users', ['email' => $email])->row_array();
		if ($user) {
			if (password_verify($password, $user['password'])) {
				$data_session = [
					'user_id' => $user['id'],
					'user_role' => 'admin'
				];
				$this->session->set_userdata($data_session);
				return redirect('dashboard');
			} else {
				$this->session->set_flashdata('message', '<div role="alert" class="relative flex w-full px-4 py-4 text-base text-white rounded-lg font-regular mt-2" style="background-color: rgb(220 38 38);"><div class="mr-12 ">Email atau Password Salah</div></div>');
				return redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div role="alert" class="relative flex w-full px-4 py-4 text-base text-white rounded-lg font-regular mt-2" style="background-color: rgb(220 38 38);"><div class="mr-12 ">Email atau Password Salah</div></div>');
			return redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('user_id');
		$this->session->set_flashdata('message', '
		<div role="alert" class="relative flex w-full px-4 py-4 text-base text-white rounded-lg font-regular mt-2" style="background-color: rgb(52 211 153);">
    <div class="mr-12 ">Anda telah berhasil keluar dari akun Anda.</div>
  </div>');
		return redirect('auth');
	}
}
