<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sampah extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // if (!$this->session->userdata('user_id')) {
        //     redirect('auth');
        // }
        $this->load->model('Sampah_model');
        $this->load->model('Kategori_model');
    }
    public function index()
    {
        $data['title'] = 'Data Sampah';
        $data['sampah'] = $this->Sampah_model->get_all();
        $data['kategori'] = $this->Kategori_model->get_all();
        $this->load->view('layout/header.php', $data);
        $this->load->view('pages/sampah/index.php');
        $this->load->view('layout/footer.php');
    }
    public function get_qr($kode){
        $data = $this->Sampah_model->get_qr($kode);
        echo json_encode($data);
    } 
public function print($id){
    $data['row'] = $this->Sampah_model->get_data($id);
    $this->load->view('pages/sampah/print.php',$data);
} 
    public function add()
    {
        $this->form_validation->set_rules('kategori_id', 'Kategori_id', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('bahan', 'Bahan', 'required');
        $this->form_validation->set_rules('jenis', 'Jenis', 'required');
        $this->form_validation->set_rules('cara', 'Cara', 'required');
        $this->form_validation->set_rules('lama', 'Lama', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('flash-gagal', 'Di Tambahkan');
            return redirect('sampah');
        } else {
            $sub_id = $this->input->post('sub_id');
            $get_kode = mt_rand(1000000000000, 9999999999999);
            $data = [
                'kategori_id' => htmlspecialchars($this->input->post('kategori_id')),
                'nama_sampah' => htmlspecialchars($this->input->post('nama')),
                'jenis_sampah' => htmlspecialchars($this->input->post('jenis')),
                'bahan' => htmlspecialchars($this->input->post('bahan')),
                'cara_daur_ulang' => htmlspecialchars($this->input->post('cara')),
                'lama_terurai' => htmlspecialchars($this->input->post('lama')),
                'deskripsi' => htmlspecialchars($this->input->post('deskripsi')),
                'kode' => $get_kode,
                'qr' => $this->Sampah_model->qr($get_kode),
            ];
            $this->Sampah_model->insert($data);
        }
    }
    public function update($id)
    {
        $this->form_validation->set_rules('kategori_id', 'Kategori_id', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('bahan', 'Bahan', 'required');
        $this->form_validation->set_rules('jenis', 'Jenis', 'required');
        $this->form_validation->set_rules('cara', 'Cara', 'required');
        $this->form_validation->set_rules('lama', 'Lama', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('flash-gagal', 'Di Update');
            return redirect('sampah');
        } else {
            $data = [
                'kategori_id' => htmlspecialchars($this->input->post('kategori_id')),
                'nama_sampah' => htmlspecialchars($this->input->post('nama')),
                'jenis_sampah' => htmlspecialchars($this->input->post('jenis')),
                'bahan' => htmlspecialchars($this->input->post('bahan')),
                'cara_daur_ulang' => htmlspecialchars($this->input->post('cara')),
                'lama_terurai' => htmlspecialchars($this->input->post('lama')),
                'deskripsi' => htmlspecialchars($this->input->post('deskripsi')),
            ];
            $this->Sampah_model->update($data, $id);
        }
    }
    public function delete($id)
    {
        $this->Sampah_model->delete($id);
    }

}
