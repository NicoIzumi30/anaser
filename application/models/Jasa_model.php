<?php
defined('BASEPATH') or exit ('No direct script access allowed');
class Jasa_model extends CI_Model
{
	public function get_all()
	{
		$user_id = $this->session->userdata('user_id');
		$user_role = $this->session->userdata('user_role');
		$this->db->select("jasa.*,users.nama");
		$this->db->from("jasa");
		$this->db->join("users", "users.id=jasa.user_id");
		if($user_role == 'tuser'){
			$this->db->where('user_id', $user_id);
			$this->db->where('lunas',0);
		}
		return $this->db->get()->result_array();
	}
	public function search($keyword)
	{
		$user_id = $this->session->userdata('user_id');
		$user_role = $this->session->userdata('user_role');
		$this->db->select("jasa.*,users.nama");
		$this->db->from("jasa");
		$this->db->join("users", "users.id=jasa.user_id");
		if($user_role == 'tuser'){
			$this->db->where('user_id', $user_id);
			$this->db->where('lunas',0);
		}
		$this->db->like('jasa.seri_hp', $keyword);
		return $this->db->get()->result_array();
	}
	public function get_data($id)
	{
		$user_id = $this->session->userdata('user_id');
		$user_role = $this->session->userdata('user_role');
		$this->db->select("jasa.*,users.nama");
		$this->db->from("jasa");
		$this->db->join("users", "users.id=jasa.user_id");
		if($user_role == 'tuser'){
			$this->db->where('user_id', $user_id);
			$this->db->where('lunas',0);
		}
		$this->db->where('jasa.id', $id);
		return $this->db->get()->row_array();
	}
	public function insert($data)
	{
		$query = $this->db->insert('jasa', $data);
		if ($query) {
			$this->session->set_flashdata('flash', 'Di Tambahkan');
			return redirect('jasa');
		} else {
			$this->session->set_flashdata('flash-gagal', 'Di Tambahkan');
			return redirect('jasa');
		}
	}
	public function update($data, $id)
	{
		$this->db->where('id', $id);
		$query = $this->db->update('jasa', $data);
		if ($query) {
			$this->session->set_flashdata('flash', 'Di Update');
			return redirect('jasa');
		} else {
			$this->session->set_flashdata('flash-gagal', 'Di Update');
			return redirect('jasa');
		}
	}
	public function delete($id)
	{
		$this->db->where(['id  ' => $id]);
		$query = $this->db->delete('jasa');
		return $query;
	}
	public function get_hutang()
	{
		$this->db->select_sum('harga');
		$this->db->from('jasa');
		$hutang = $this->db->get()->row()->harga;
		if ($hutang == null) {
			return 0;
		} else {
			return $hutang;
		}
	}
}
