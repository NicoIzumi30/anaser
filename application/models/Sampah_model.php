<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Sampah_model extends CI_Model
{
    public function get_all()
    {
        $this->db->select("*");
        $this->db->from("sampah");
        return $this->db->get()->result_array();
    }
    public function get_data($id)
    {
        $this->db->select("*");
        $this->db->where('id', $id);
        $this->db->from("sampah");
        return $this->db->get()->row_array();
    }
    public function get_qr($kode)
    {
        $this->db->select("sampah.*,kategori.nama_kategori");
        $this->db->from("sampah");
        $this->db->join("kategori", "sampah.kategori_id = kategori.id");
        $this->db->where('kode', $kode);
        return $this->db->get()->row_array();
    }
    public function qr($kodeqr)
{
    if($kodeqr){
        $filename = 'qr/'.$kodeqr;
        if (!file_exists($filename)) { 
                $this->load->library('ciqrcode');
                $params['data'] = $kodeqr;
                $params['level'] = 'H';
                $params['size'] = 10;
                $params['savename'] = FCPATH.'qr/'.$kodeqr.".png";;
                $this->ciqrcode->generate($params);
                return  $kodeqr.".png";
        }
    }
}

    public function insert($data)
    {
        $query = $this->db->insert('sampah', $data);
        if ($query) {
            $this->session->set_flashdata('flash', 'Di Tambahkan');
            return redirect('sampah');
        } else {
            $this->session->set_flashdata('flash-gagal', 'Di Tambahkan');
            return redirect('sampah');
        }
    }
    public function update($data, $id)
    {
        $this->db->where('id', $id);
        $query = $this->db->update('sampah', $data);
        if ($query) {
            $this->session->set_flashdata('flash', 'Di Update');
            return redirect('sampah');
        } else {
            $this->session->set_flashdata('flash-gagal', 'Di Update');
            return redirect('sampah');
        }
    }
    public function delete($id)
    {
        $this->db->where(['id  ' => $id]);
        $query = $this->db->delete('sampah');
        if ($query) {
            $this->session->set_flashdata('flash', 'Di Hapus');
            redirect('sampah');
        } else {
            $this->session->set_flashdata('flash-gagal', 'Di Hapus');
            redirect('sampah');
        }
    }
}