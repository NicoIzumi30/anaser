<?php
defined('BASEPATH') or exit ('No direct script access allowed');
class Brand_model extends CI_Model
{
	public function get_all()
	{
		$this->db->select("brand.*, kategori.nama_kategori");
		$this->db->join('kategori', 'brand.kategori_id = kategori.id');
		$this->db->from("brand");
		$this->db->order_by('kategori_id', 'ASC');
		return $this->db->get()->result_array();
	}
	public function get_list_brand_by_kategori($id)
	{
		$this->db->select("*");
		$this->db->where('kategori_id', $id);
		$this->db->from("brand");
		return $this->db->get()->result_array();
	}
	public function insert($data)
	{
		$query = $this->db->insert('brand', $data);
		if ($query) {
			$this->session->set_flashdata('flash', 'Di Tambahkan');
			return redirect('kategori');
		} else {
			$this->session->set_flashdata('flash-gagal', 'Di Tambahkan');
			return redirect('kategori');
		}
	}
	public function update($data, $id)
	{
		$this->db->where('id', $id);
		$query = $this->db->update('brand', $data);
		if ($query) {
			$this->session->set_flashdata('flash', 'Di Update');
			return redirect('kategori');
		} else {
			$this->session->set_flashdata('flash-gagal', 'Di Update');
			return redirect('kategori');
		}
	}
	public function delete($id)
	{
		$this->db->where(['id  ' => $id]);
		$query = $this->db->delete('brand');
		if ($query) {
			$this->session->set_flashdata('flash', 'Di Hapus');
			redirect('kategori');
		} else {
			$this->session->set_flashdata('flash-gagal', 'Di Hapus');
			redirect('kategori');
		}
	}
}
