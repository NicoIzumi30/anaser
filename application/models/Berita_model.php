<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Berita_model extends CI_Model
{
    public function get_all()
    {
        $this->db->select("*");
        $this->db->from("berita");
        return $this->db->get()->result_array();
    }
    public function insert($data)
    {
        $query = $this->db->insert('berita', $data);
        if ($query) {
            $this->session->set_flashdata('flash', 'Di Tambahkan');
            return redirect('berita');
        } else {
            $this->session->set_flashdata('flash-gagal', 'Di Tambahkan');
            return redirect('berita');
        }
    }
    public function get_data($id)
    {
        $this->db->select("*");
        $this->db->where('id', $id);
        $this->db->from("berita");
        return $this->db->get()->row_array();
    }
    public function update($data, $id)
    {
        $this->db->where('id', $id);
        $query = $this->db->update('berita', $data);
        if ($query) {
            $this->session->set_flashdata('flash', 'Di Update');
            return redirect('berita');
        } else {
            $this->session->set_flashdata('flash-gagal', 'Di Update');
            return redirect('berita');
        }
    }
    public function delete($id, $old_file_name)
    {
        $this->db->where(['id  ' => $id]);
        $query = $this->db->delete('berita');
        if ($query) {
            unlink(FCPATH . 'uploads/berita/' . $old_file_name);
            $this->session->set_flashdata('flash', 'Di Hapus');
            redirect('berita');
        } else {
            $this->session->set_flashdata('flash-gagal', 'Di Hapus');
            redirect('berita');
        }
    }
    public function short($text){
        if (strlen($text) > 50) {
            $text = substr($text, 0, 50);
            $text .= '...';
        }
        return $text;
    } 
}