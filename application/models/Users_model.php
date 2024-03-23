<?php
defined('BASEPATH') or exit ('No direct script access allowed');
class Users_model extends CI_Model
{
	public function get_all()
	{
		$this->db->select("*");
		$this->db->from("users");
		$this->db->where('role', 'tuser');
		return $this->db->get()->result_array();
	}
	public function get_all_operator()
	{
		$this->db->select("*");
		$this->db->from("users");
		$this->db->where('role', 'operator');
		return $this->db->get()->result_array();
	}
	public function get_data($id)
	{
		$this->db->select("*");
		$this->db->from("users");
		$this->db->where('id', $id);
		return $this->db->get()->row_array();
	}
	public function insert($data, $role)
	{
		if($role == 'operator'){
			$redirect = 'users/operator';
		}else{
			$redirect = 'users';
		}
		$query = $this->db->insert('users', $data);
		if ($query) {
			$this->session->set_flashdata('flash', 'Di Tambahkan');
			return redirect($redirect);
		} else {
			$this->session->set_flashdata('flash-gagal', 'Di Tambahkan');
			return redirect($redirect);
		}
	}
	public function update($data, $id, $role)
	{
		if($role == 'operator'){
			$redirect = 'users/operator';
		}else{
			$redirect = 'users';
		}
		$this->db->where('id', $id);
		$query = $this->db->update('users', $data);
		if ($query) {
			$this->session->set_flashdata('flash', 'Di Update');
			return redirect($redirect);
		} else {
			$this->session->set_flashdata('flash-gagal', 'Di Update');
			return redirect($redirect);
		}
	}
	public function update_profile($data, $id)
	{
		$this->db->where('id', $id);
		$query = $this->db->update('users', $data);
		if ($query) {
			$this->session->set_flashdata('flash', 'Di Update');
			return redirect('profile');
		} else {
			$this->session->set_flashdata('flash-gagal', 'Di Update');
			return redirect('profile');
		}
	}
	public function delete($id, $role)
	{
		if($role == 'operator'){
			$redirect = 'users/operator';
		}else{
			$redirect = 'users';
		}
		$this->db->where(['id  ' => $id]);
		$query = $this->db->delete('users');
		if ($query) {
			$this->session->set_flashdata('flash', 'Di Hapus');
			redirect($redirect);
		} else {
			$this->session->set_flashdata('flash-gagal', 'Di Hapus');
			redirect($redirect);
		}
	}
}
