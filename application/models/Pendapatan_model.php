<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pendapatan_model extends CI_Model
{
    public function get_all()
    {
        $this->db->select("*");
        $this->db->from("pendapatan");
        return $this->db->get()->result_array();
    }
    public function get_data($id)
    {
        $this->db->select("*");
        $this->db->where('id', $id);
        $this->db->from("pendapatan");
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
}
