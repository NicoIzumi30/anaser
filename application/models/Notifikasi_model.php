<?php
defined('BASEPATH') or exit ('No direct script access allowed');
class Notifikasi_model extends CI_Model
{
	public function get_all()
	{
		$user_id = $this->session->userdata('user_id');
		$this->db->select("*");
		$this->db->from("notifikasi");
		$this->db->where('user_id', $user_id);
		$this->db->order_by('id', 'DESC');
		return $this->db->get()->result_array();
	}
	public function insert($data)
	{
		$query = $this->db->insert('notifikasi', $data);
		if ($query) {
			return true;
		} else {
			return false;
		}
	}
}
