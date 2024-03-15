<?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class Berita extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->Auth_model->cek_session();
            $this->load->model('Berita_model');
        }
        public function index()
        {
            $data['title'] = 'Berita';
            $data['berita'] = $this->Berita_model->get_all();
            $this->load->view('layout/header.php', $data);
            $this->load->view('pages/berita/index.php');
            $this->load->view('layout/footer.php');
        }
        public function add()
        {
            $this->form_validation->set_rules('judul', 'Judul', 'required');
            $this->form_validation->set_rules('isi', 'Isi', 'required');
            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('flash-gagal', 'Di Tambahkan');
                return redirect('berita');
            } else {
                $config['upload_path']          = FCPATH . '/uploads/berita/';
                $config['allowed_types']        = 'gif|jpg|jpeg|png';
                $config['overwrite']            = true;
                $config['max_size']             = 3096;
                $config['encrypt_name'] = TRUE;
                $this->load->library('upload', $config);
    
                if (!$this->upload->do_upload('image')) {
                    $this->session->set_flashdata('flash-gagal', 'Di Tambahkan');
                    return redirect('berita');
                } else {
                    $uploaded_data = $this->upload->data();
                    $image = $uploaded_data['file_name'];
                    $data = [
                        'judul' => htmlspecialchars($this->input->post('judul')),
                        'isi' => htmlspecialchars($this->input->post('isi')),
                        'gambar' => $image
                    ];
                    $this->Berita_model->insert($data);
                }
            }
        }
        public function update($id)
        {
            $this->form_validation->set_rules('judul', 'Judul', 'required');
            $this->form_validation->set_rules('isi', 'Isi', 'required');
            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('flash-gagal', 'Di Update');
                return redirect('berita');
            } else {
                $data = [
                    'judul' => htmlspecialchars($this->input->post('judul')),
                    'isi' => htmlspecialchars($this->input->post('isi')),
                ];
                if ($_FILES['image']['error'] == 0) {
                    $existing_data = $this->Berita_model->get_data($id);
                    $old_file_name = $existing_data['image'];
                    $config['upload_path']          = FCPATH . '/uploads/berita/';
                    $config['allowed_types']        = 'gif|jpg|jpeg|png';
                    $config['overwrite']            = true;
                    $config['max_size']             = 3096;
                    $config['encrypt_name'] = TRUE;
                    $this->load->library('upload', $config);
                    if ($this->upload->do_upload('image')) {
                        unlink(FCPATH . 'uploads/berita/' . $old_file_name);
                        $upload_data = $this->upload->data();
                        $data['gambar'] = $upload_data['file_name'];
                    } else {
                        $error = array('error' => $this->upload->display_errors());
                    }
                }
                $this->Berita_model->update($data, $id);
            }
        }
        public function delete($id)
        {
            $existing_data = $this->Berita_model->get_data($id);
            $old_file_name = $existing_data['gambar'];
            $this->Berita_model->delete($id, $old_file_name);
        }
        }