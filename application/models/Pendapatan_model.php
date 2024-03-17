<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pendapatan_model extends CI_Model
{
    public function get_all()
    {
        $this->db->select("pendapatan.*,users.nama,produk.nama_produk,produk.stok");
        $this->db->from("pendapatan");
		$this->db->join("users", "users.id = pendapatan.user_id");
		$this->db->join("produk", "produk.id = pendapatan.produk_id");
        return $this->db->get()->result_array();
    }
	public function search($tanggal)
    {
        $this->db->select("pendapatan.*,users.nama,produk.nama_produk,produk.stok");
        $this->db->from("pendapatan");
		$this->db->join("users", "users.id = pendapatan.user_id");
		$this->db->join("produk", "produk.id = pendapatan.produk_id");
		$this->db->where('pendapatan.tanggal_pelunasan', $tanggal);
        return $this->db->get()->result_array();
    }
    public function get_data($id)
    {
		$this->db->select("pendapatan.*,users.nama,produk.nama_produk,produk.stok");
        $this->db->from("pendapatan");
		$this->db->join("users", "users.id = pendapatan.user_id");
		$this->db->join("produk", "produk.id = pendapatan.produk_id");
        $this->db->where('pendapatan.id', $id);
        return $this->db->get()->row_array();
    }
    public function insert($data)
    {
        $query = $this->db->insert('pendapatan', $data);
       return $query;
    }
    public function update($data, $id)
    {
        $this->db->where('id', $id);
        $query = $this->db->update('pendapatan', $data);
        if ($query) {
            $this->session->set_flashdata('flash', 'Di Update');
            return redirect('pendapatan');
        } else {
            $this->session->set_flashdata('flash-gagal', 'Di Update');
            return redirect('pendapatan');
        }
    }
    public function delete($id)
    {
        $this->db->where(['id  ' => $id]);
        $query = $this->db->delete('pendapatan');
        if ($query) {
            $this->session->set_flashdata('flash', 'Di Hapus');
            redirect('pendapatan');
        } else {
            $this->session->set_flashdata('flash-gagal', 'Di Hapus');
            redirect('pendapatan');
        }
    }
	public function pendapatan_harian() {
		$tgl = date('Y-m-d');
		$this->db->select_sum('harga');
		$this->db->where('tanggal_pelunasan', $tgl);
		$this->db->from('pendapatan');
		return $this->db->get()->row()->harga;
	}
	public function pendapatan_bulanan() {
		$bulan = date('m'); 
        $tahun = date('Y'); 
		$tgl = date('Y-m-d');
		$this->db->select('SUM(harga) AS pendapatan');
        $this->db->from('pendapatan');
        $this->db->where('MONTH(tanggal_pelunasan)', $bulan);
        $this->db->where('YEAR(tanggal_pelunasan)', $tahun);
        return $this->db->get()->row()->pendapatan;
	}
}
