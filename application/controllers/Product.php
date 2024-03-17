<?php
defined('BASEPATH') or exit ('No direct script access allowed');

class Product extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->Auth_model->cek_session();
		$this->load->model('Product_model');
		$this->load->model('Kategori_model');
		$this->load->model('Penyimpanan_model');

	}
	public function index()
	{
		$data['title'] = 'Daftar Produk';
		$this->load->view('layout/header.php', $data);
		$data['categories'] = $this->Kategori_model->get_all();
		$data['penyimpanan'] = $this->Penyimpanan_model->get_all();
		$this->form_validation->set_rules('kategori_id', 'Kategori', 'required');
		$this->form_validation->set_rules('keyword', 'Keyword', 'required');
		if($this->form_validation->run() == false){
			$data['products'] = $this->Product_model->get_all();	
		}else{
			$keyword = htmlspecialchars($this->input->post('keyword'));;
			$kategori = $this->input->post('kategori_id');
			$data['products'] = $this->Product_model->search($keyword, $kategori);
			$data['keyword'] = $keyword;
			if($kategori != '*'){
				$data['kategori_id'] = $kategori;
			}
		}
		$this->load->view('pages/product/index.php', $data);
		$this->load->view('layout/footer.php');
	}
	public function add()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('penyimpanan', 'Penyimpanan', 'required');
		$this->form_validation->set_rules('kategori', 'Kategori', 'required');
		$this->form_validation->set_rules('stok', 'Stok', 'required');
		$this->form_validation->set_rules('harga', 'Harga', 'required');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('flash-gagal', 'Di Tambahkan');
			return redirect('product');
		} else {
			$jumlahData = count($_FILES['image']['name']);
			if ($jumlahData > 0) {
				$uploadedFilenames = "";
				for ($i = 0; $i < $jumlahData; $i++):
					$_FILES['file']['name'] = str_replace(' ', '_', $_FILES['image']['name'][$i]);
					$_FILES['file']['type'] = $_FILES['image']['type'][$i];
					$_FILES['file']['tmp_name'] = $_FILES['image']['tmp_name'][$i];
					$_FILES['file']['tmp_name'] = $_FILES['image']['tmp_name'][$i];
					$_FILES['file']['size'] = $_FILES['image']['size'][$i];
					$config['allowed_types'] = 'gif|jpg|jpeg|png';
					$config['max_size'] = 2048;
					$config['upload_path'] = FCPATH . '/uploads/produk/';
					$config['overwrite'] = true;
					$config['encrypt_name'] = TRUE;
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					if ($this->upload->do_upload('file')) {
						$fileData = $this->upload->data();
						if ($i == 0) {
							$uploadedFilenames .= $fileData['file_name'];
						} else {
							$uploadedFilenames .= "," . $fileData['file_name'];
						}
					}
				endfor;
				$data = [
					'nama_produk' => htmlspecialchars($this->input->post('nama')),
					'penyimpanan_id' => htmlspecialchars($this->input->post('penyimpanan')),
					'kategori_id' => htmlspecialchars($this->input->post('kategori')),
					'stok' => htmlspecialchars($this->input->post('stok')),
					'harga' => htmlspecialchars($this->input->post('harga')),
					'image' => $uploadedFilenames,
				];
				$this->Product_model->insert($data);
			} else {
				$this->session->set_flashdata('flash-gagal', 'Di Tambahkan');
				return redirect('product');
			}

		}

	}
	public function update($id)
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('penyimpanan', 'Penyimpanan', 'required');
		$this->form_validation->set_rules('kategori', 'Kategori', 'required');
		$this->form_validation->set_rules('stok', 'Stok', 'required');
		$this->form_validation->set_rules('harga', 'Harga', 'required');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('flash-gagal', 'Di Tambahkan');
			return redirect('product');
		} else {
			$jumlahData = count($_FILES['image']['name']);
			if ($_FILES['image']['name'][0] > 0) {
				$uploadedFilenames = "";
				for ($i = 0; $i < $jumlahData; $i++):
					$_FILES['file']['name'] = str_replace(' ', '_', $_FILES['image']['name'][$i]);
					$_FILES['file']['type'] = $_FILES['image']['type'][$i];
					$_FILES['file']['tmp_name'] = $_FILES['image']['tmp_name'][$i];
					$_FILES['file']['tmp_name'] = $_FILES['image']['tmp_name'][$i];
					$_FILES['file']['size'] = $_FILES['image']['size'][$i];
					$config['allowed_types'] = 'gif|jpg|jpeg|png';
					$config['max_size'] = 2048;
					$config['upload_path'] = FCPATH . '/uploads/produk/';
					$config['overwrite'] = true;
					$config['encrypt_name'] = TRUE;
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					if ($this->upload->do_upload('file')) {
						$fileData = $this->upload->data();
						if ($i == 0) {
							$uploadedFilenames .= $fileData['file_name'];
						} else {
							$uploadedFilenames .= "," . $fileData['file_name'];
						}
					}
				endfor;
				$dataProduk = $this->Product_model->get_data($id);
				$imageProduk = explode(",", $dataProduk['image']);
				foreach ($imageProduk as $img) {
					unlink(FCPATH . '/uploads/produk/' . $img);
				}
				$data = [
					'nama_produk' => htmlspecialchars($this->input->post('nama')),
					'penyimpanan_id' => htmlspecialchars($this->input->post('penyimpanan')),
					'kategori_id' => htmlspecialchars($this->input->post('kategori')),
					'stok' => htmlspecialchars($this->input->post('stok')),
					'harga' => htmlspecialchars($this->input->post('harga')),
					'image' => $uploadedFilenames,
				];
				$this->Product_model->update($data, $id);
			} else {
				$data = [
					'nama_produk' => htmlspecialchars($this->input->post('nama')),
					'penyimpanan_id' => htmlspecialchars($this->input->post('penyimpanan')),
					'kategori_id' => htmlspecialchars($this->input->post('kategori')),
					'stok' => htmlspecialchars($this->input->post('stok')),
					'harga' => htmlspecialchars($this->input->post('harga')),
				];
				$this->Product_model->update($data, $id);
			}

		}

	}
	public function delete($id)
	{
		$this->Product_model->delete($id);
	}
}
