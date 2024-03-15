<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Sampah_model');
        $this->load->model('Berita_model');
    }
    public function get_qr($kode){
        $data = $this->Sampah_model->get_qr($kode);
        header('Content-Type: application/json');
        echo json_encode($data);
    } 
    public function get_judul(){
        $data = $this->Berita_model->get_all();
          header('Content-Type: application/json');
        echo json_encode($data);
    } 
    public function get_berita($id){
        $data = $this->Berita_model->get_data($id);
          header('Content-Type: application/json');
        echo json_encode($data);
    } 
}
