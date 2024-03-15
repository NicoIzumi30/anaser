<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->Auth_model->cek_session();
        $this->load->model('Kategori_model');
    }

    // Kategori
    public function index()
    {
        $data['title'] = 'Kategori';
        $data['kategori'] = $this->Kategori_model->get_all();
        $this->load->view('layout/header.php',$data);
        $this->load->view('pages/kategori/index.php', $data);
        $this->load->view('layout/footer.php');
    }
    public function add()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('flash-gagal', 'Di Tambahkan');
            return redirect('kategori');
        } else {
            $data = [
                'nama_kategori' => htmlspecialchars($this->input->post('nama')),
            ];
            $this->Kategori_model->insert($data);
        }
    }
    public function update($id)
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('flash-gagal', 'Di Tambahkan');
            return redirect('kategori');
        } else {
            $data = [
                'nama_kategori' => htmlspecialchars($this->input->post('nama')),
            ];
            $this->Kategori_model->update($data, $id);
        }
    }
    public function delete($id)
    {
        $this->Kategori_model->delete($id);
    }
}
