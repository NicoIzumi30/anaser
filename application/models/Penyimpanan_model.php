<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Penyimpanan_model extends CI_Model
{
    public function get_all()
    {
        $this->db->select("*");
        $this->db->from("penyimpanan");
        return $this->db->get()->result_array();
    }
    public function get_data($id)
    {
        $this->db->select("*");
        $this->db->where('id', $id);
        $this->db->from("penyimpanan");
        return $this->db->get()->row_array();
    }
    public function insert($data)
    {
        $query = $this->db->insert('penyimpanan', $data);
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
        $query = $this->db->update('penyimpanan', $data);
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
        $query = $this->db->delete('penyimpanan');
        if ($query) {
            $this->session->set_flashdata('flash', 'Di Hapus');
            redirect('kategori');
        } else {
            $this->session->set_flashdata('flash-gagal', 'Di Hapus');
            redirect('kategori');
        }
    }
}
