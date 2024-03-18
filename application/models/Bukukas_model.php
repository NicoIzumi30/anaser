<?php
defined('BASEPATH') or exit ('No direct script access allowed');
class Bukukas_model extends CI_Model
{
	public function get_all()
	{
		$user_id = $this->session->userdata('user_id');
		$hari_ini = date('Y-m-d');
		$this->db->select("*");
		$this->db->from("bukukas");
		$this->db->where('tanggal', $hari_ini);
		if ($this->session->userdata('user_role') == 'tuser') {
			$this->db->where('user_id', $user_id);
		}
		return $this->db->get()->result_array();
	}
	public function get_data($id)
	{
		$this->db->select("*");
		$this->db->where('id', $id);
		$this->db->from("bukukas");
		return $this->db->get()->row_array();
	}
	public function pemasukan_bulan_lalu()
	{
		$bulan = date('m');
		$tahun = date('Y');
		$bulan_sebelumnya = date('m', strtotime('-1 month'));
		$this->db->select('SUM(harga) AS pemasukan');
		$this->db->from('bukukas');
		$this->db->where('MONTH(tanggal)', $bulan_sebelumnya);
		$this->db->where('YEAR(tanggal)', $tahun);
		$this->db->where('tipe', 'pemasukan');
		$pendapatan = $this->db->get()->row()->pemasukan;
		if ($pendapatan == null) {
			return 0;
		} else {
			return $pendapatan;
		}
	}
	public function pengeluaran_bulan_lalu()
	{
		$bulan = date('m');
		$tahun = date('Y');
		$bulan_sebelumnya = date('m', strtotime('-1 month'));
		$this->db->select('SUM(harga) AS pengeluaran');
		$this->db->from('bukukas');
		$this->db->where('MONTH(tanggal)', $bulan_sebelumnya);
		$this->db->where('YEAR(tanggal)', $tahun);
		$this->db->where('tipe', 'pengeluaran');
		$pendapatan = $this->db->get()->row()->pengeluaran;
		if ($pendapatan == null) {
			return 0;
		} else {
			return $pendapatan;
		}
	}
	public function search($tanggal, $tuser_id = null)
	{
		$user_id = $this->session->userdata('user_id');
		$this->db->select('*');
		$this->db->from('bukukas');
		$this->db->where('tanggal', $tanggal);
		if ($this->session->userdata('user_role') == 'tuser') {
			$this->db->where('user_id', $user_id);
		}
		if ($tuser_id != null) {
			$this->db->where('user_id', $tuser_id);
		}
		return $this->db->get()->result_array();
	}
	public function insert($data, $k_status)
	{
		$query = $this->db->insert('bukukas', $data);
		if ($k_status == 'true') {
			$redirect = 'bukukas/konter';
		} else {
			$redirect = 'bukukas';
		}
		if ($query) {
			$this->session->set_flashdata('flash', 'Di Tambahkan');
			return redirect($redirect);
		} else {
			$this->session->set_flashdata('flash-gagal', 'Di Tambahkan');
			return redirect($redirect);
		}
	}
	public function get_pelanggan()
	{
		$this->db->select('*');
		$this->db->from('bukukas');
		$this->db->where('tipe', 'pemasukan');
		$this->db->group_by('nama_pelanggan');
		return $this->db->get()->result_array();
	}
	public function search_pelanggan($nama)
	{
		$this->db->select('*');
		$this->db->from('bukukas');
		$this->db->where('tipe', 'pemasukan');
		$this->db->like('nama_pelanggan', $nama);
		$this->db->group_by('nama_pelanggan');
		return $this->db->get()->result_array();
	}
	public function update($data, $id)
	{
		$this->db->where('id', $id);
		$query = $this->db->update('bukukas', $data);
		if ($query) {
			$this->session->set_flashdata('flash', 'Di Update');
			return redirect('bukukas');
		} else {
			$this->session->set_flashdata('flash-gagal', 'Di Update');
			return redirect('bukukas');
		}
	}
	public function delete($id)
	{
		$this->db->where(['id  ' => $id]);
		$query = $this->db->delete('bukukas');
		if ($query) {
			$this->session->set_flashdata('flash', 'Di Hapus');
			redirect('bukukas');
		} else {
			$this->session->set_flashdata('flash-gagal', 'Di Hapus');
			redirect('bukukas');
		}
	}
}
