<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Users_model extends CI_Model
{
    public function get_all()
    {
        $this->db->select("*");
        $this->db->from("users");
        $this->db->where('role', 'tuser');
        return $this->db->get()->result_array();
    }
    public function get_data($id)
    {
        $this->db->select("*");
        $this->db->from("users");
        $this->db->where('id', $id);
        return $this->db->get()->row_array();
    }
    public function insert($data)
    {
        $query = $this->db->insert('users', $data);
        if ($query) {
            $this->session->set_flashdata('flash', 'Di Tambahkan');
            return redirect('users');
        } else {
            $this->session->set_flashdata('flash-gagal', 'Di Tambahkan');
            return redirect('users');
        }
    }
    public function update($data, $id)
    {
        $this->db->where('id', $id);
        $query = $this->db->update('users', $data);
        if ($query) {
            $this->session->set_flashdata('flash', 'Di Update');
            return redirect('users');
        } else {
            $this->session->set_flashdata('flash-gagal', 'Di Update');
            return redirect('users');
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
    public function delete($id)
    {
        $this->db->where(['id  ' => $id]);
        $query = $this->db->delete('users');
        if ($query) {
            $this->session->set_flashdata('flash', 'Di Hapus');
            redirect('users');
        } else {
            $this->session->set_flashdata('flash-gagal', 'Di Hapus');
            redirect('users');
        }
    }
}
