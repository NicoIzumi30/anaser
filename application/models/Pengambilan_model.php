<?php
defined('BASEPATH') or exit ('No direct script access allowed');
class Pengambilan_model extends CI_Model
{
	public function get_all()
	{
		$this->db->select("pengambilan.*,users.nama,produk.nama_produk,produk.image,kategori.nama_kategori");
		$this->db->from("pengambilan");
		$this->db->join("users", "users.id=pengambilan.user_id");
		$this->db->join("produk", "produk.id=pengambilan.produk_id");
		$this->db->join("kategori", "kategori.id=produk.kategori_id");
		return $this->db->get()->result_array();
	}
	public function search($keyword, $kategori)
	{
		$this->db->select("pengambilan.*,users.nama,produk.nama_produk,produk.image,kategori.nama_kategori");
		$this->db->from("pengambilan");
		$this->db->join("users", "users.id=pengambilan.user_id");
		$this->db->join("produk", "produk.id=pengambilan.produk_id");
		$this->db->join("kategori", "kategori.id=produk.kategori_id");
		$this->db->like('produk.nama_produk', $keyword);
		if ($kategori != '*') {
			$this->db->where('produk.kategori_id', $kategori);
		}
		return $this->db->get()->result_array();
	}
	public function get_data($id)
	{
		$this->db->select("pengambilan.*,users.nama,produk.nama_produk,produk.image,kategori.nama_kategori");
		$this->db->from("pengambilan");
		$this->db->join("users", "users.id=pengambilan.user_id");
		$this->db->join("produk", "produk.id=pengambilan.produk_id");
		$this->db->join("kategori", "kategori.id=produk.kategori_id");
		$this->db->where('pengambilan.id', $id);
		return $this->db->get()->row_array();
	}
	public function get_data_by_session()
	{
		$user_id = $this->session->userdata('user_id');
		$this->db->select("pengambilan.*,users.nama,produk.nama_produk,produk.image,kategori.nama_kategori");
		$this->db->from("pengambilan");
		$this->db->join("users", "users.id=pengambilan.user_id");
		$this->db->join("produk", "produk.id=pengambilan.produk_id");
		$this->db->join("kategori", "kategori.id=produk.kategori_id");
		$this->db->where('pengambilan.user_id', $user_id);
		return $this->db->get()->result_array();
		// return $user_id;
	}
	public function insert($data)
	{
		$query = $this->db->insert('pengambilan', $data);
		if ($query) {
			$this->session->set_flashdata('flash', 'Di Tambahkan');
			return redirect('pengambilan');
		} else {
			$this->session->set_flashdata('flash-gagal', 'Di Tambahkan');
			return redirect('pengambilan');
		}
	}
	public function update($data, $id)
	{
		$this->db->where('id', $id);
		$query = $this->db->update('pengambilan', $data);
		if ($query) {
			$this->session->set_flashdata('flash', 'Di Update');
			return redirect('pengambilan');
		} else {
			$this->session->set_flashdata('flash-gagal', 'Di Update');
			return redirect('pengambilan');
		}
	}
	public function delete($id)
	{
		$this->db->where(['id  ' => $id]);
		$query = $this->db->delete('pengambilan');
		return $query;
	}
	public function get_hutang()
	{
		$this->db->select_sum('harga');
		$this->db->from('pengambilan');
		$hutang = $this->db->get()->row()->harga;
		if ($hutang == null) {
			return 0;
		} else {
			return $hutang;
		}
	}
}
