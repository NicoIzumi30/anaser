<?php
defined('BASEPATH') or exit ('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Pelanggan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->Auth_model->cek_session();
		$this->load->model('Bukukas_model');
	}

	public function index()
	{
		$data['title'] = 'Kontak Pelanggan';
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		if ($this->form_validation->run() == false) {
			$data['kontak'] = $this->Bukukas_model->get_pelanggan();
		} else {
			$nama = $this->input->post('nama', true);
			$data['kontak'] = $this->Bukukas_model->search_pelanggan($nama);
			$data['nama'] = $nama;
		}
		$this->load->view('layout/header.php', $data);
		$this->load->view('pages/pelanggan/index.php', $data);
		$this->load->view('layout/footer.php');
	}
	public function export_excel(){
		$data = $this->Bukukas_model->get_pelanggan();
		$spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Tulis header "LAPORAN DATA SISWA" dan "KOBER PAUD DARUSHOWAAB"
        $sheet->setCellValue('A1', 'Data Kontak Pelanggan');
        $sheet->mergeCells('A1:D1');
        $sheet->getStyle('A1')->getAlignment()->setHorizontal('center');
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(13);

        // Tulis header kolom
        $header = array('No', 'Nama Pelanggan', 'Alamat', 'No HP');
        $column = 'A';
        $row = 2;

        foreach ($header as $item) {
            $sheet->setCellValue($column . $row, $item);
            $sheet->getColumnDimension($column)->setAutoSize(false); // Tambahkan baris ini
            $sheet->getColumnDimension($column)->setWidth(15); // Atur lebar kolom (misalnya 30)
            if ($item === 'No') {
                $sheet->getColumnDimension($column)->setAutoSize(false); // Tambahkan baris ini
                $sheet->getColumnDimension($column)->setWidth(4); // Atur lebar kolom (misalnya 30)
            }
			if ($item === 'Alamat') {
                $sheet->getColumnDimension($column)->setAutoSize(false); // Tambahkan baris ini
                $sheet->getColumnDimension($column)->setWidth(30); // Atur lebar kolom (misalnya 30)
            }
            $column++;
        }
        $row++;
        $no = 1;

        foreach ($data as $item) {
            $sheet->setCellValue('A' . $row, $no);
            $sheet->setCellValue('B' . $row, $item['nama_pelanggan']);
            $sheet->setCellValue('C' . $row, $item['alamat']);
            $sheet->setCellValue('D' . $row, $item['no_telp']);
            $no++;
            $row++;
        }
        $writer = new Xlsx($spreadsheet);
        $filename = 'Data Kontak Pelanggan.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit();

	} 

}

