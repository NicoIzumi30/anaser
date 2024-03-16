<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Product_model extends CI_Model
{
    public function get_all()
    {
        $this->db->select("produk.*, kategori.nama_kategori,penyimpanan.penyimpanan");
        $this->db->from("produk");
		$this->db->join('kategori', 'produk.kategori_id = kategori.id', 'left');
		$this->db->join('penyimpanan', 'produk.penyimpanan_id = penyimpanan.id', 'left');
        return $this->db->get()->result_array();
    }
    public function get_data($id)
    {
        $this->db->select("produk.*, kategori.nama_kategori,penyimpanan.penyimpanan");
        $this->db->from("produk");
		$this->db->join('kategori', 'produk.kategori_id = kategori.id', 'left');
		$this->db->join('penyimpanan', 'produk.penyimpanan_id = penyimpanan.id', 'left');
        $this->db->where('produk.id', $id);
        return $this->db->get()->row_array();
    }
    public function insert($data)
    {
        $query = $this->db->insert('produk', $data);
        if ($query) {
            $this->session->set_flashdata('flash', 'Di Tambahkan');
            return redirect('product');
        } else {
            $this->session->set_flashdata('flash-gagal', 'Di Tambahkan');
            return redirect('product');
        }
    }
    public function update($data, $id)
    {
        $this->db->where('id', $id);
        $query = $this->db->update('produk', $data);
        if ($query) {
            $this->session->set_flashdata('flash', 'Di Update');
            return redirect('product');
        } else {
            $this->session->set_flashdata('flash-gagal', 'Di Update');
            return redirect('product');
        }
    }
    public function delete($id)
    {
		$data = $this->db->get_where('produk', ['id' => $id])->row_array();
		$all_image = $data['image'];
		$image = explode(',', $all_image);
		foreach ($image as $img) {
			unlink(FCPATH . 'uploads/produk/' . $img);
		}
        $this->db->where(['id  ' => $id]);
        $query = $this->db->delete('produk');
        if ($query) {
            $this->session->set_flashdata('flash', 'Di Hapus');
            redirect('product');
        } else {
            $this->session->set_flashdata('flash-gagal', 'Di Hapus');
            redirect('product');
        }
    }
}
