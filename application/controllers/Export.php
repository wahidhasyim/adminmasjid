<?php defined('BASEPATH') or die('No direct script access allowed');

require('./application/third_party/phpoffice/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Export extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('export_model');
    }

    public function index()
    {
        $data['pemasukan'] = $this->export_model->pemasukan()->result();
        $this->load->view('export', $data);
    }

    public function exportPemasukan()
    {
        $pemasukan = $this->export_model->pemasukan()->result();

        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'Keterangan')
            ->setCellValue('C1', 'Nama Penyumbang')
            ->setCellValue('D1', 'Jenis')
            ->setCellValue('E1', 'Tanggal')
            ->setCellValue('F1', 'Nominal');

        $kolom = 2;
        $nomor = 1;
        foreach ($pemasukan as $p) {

            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $kolom, $nomor)
                ->setCellValue('B' . $kolom, $p->ket_pemasukan)
                ->setCellValue('C' . $kolom, $p->nama_penyumbang)
                ->setCellValue('D' . $kolom, $p->jenis_pemasukan)
                ->setCellValue('E' . $kolom, date('j F Y', strtotime($p->tanggal)))
                ->setCellValue('F' . $kolom, $p->nominal);

            $kolom++;
            $nomor++;
        }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Pemasukan.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    public function exportPengeluaran()
    {
        $pengeluaran = $this->export_model->pengeluaran()->result();

        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'Keterangan')
            ->setCellValue('C1', 'Nama Payment')
            ->setCellValue('D1', 'Jenis Pengeluaran')
            ->setCellValue('E1', 'Tanggal')
            ->setCellValue('F1', 'Nominal')
            ->setCellValue('G1', 'Email Pengurus');

        $kolom = 2;
        $nomor = 1;
        foreach ($pengeluaran as $p) {

            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $kolom, $nomor)
                ->setCellValue('B' . $kolom, $p->ket_pengeluaran)
                ->setCellValue('C' . $kolom, $p->nama_payment)
                ->setCellValue('D' . $kolom, $p->jenis_pengeluaran)
                ->setCellValue('E' . $kolom, date('j F Y', strtotime($p->tanggal)))
                ->setCellValue('F' . $kolom, $p->nominal)
                ->setCellValue('G' . $kolom, $p->username);

            $kolom++;
            $nomor++;
        }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Pengeluaran.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    public function exportBarang()
    {
        $barang = $this->export_model->barang()->result();

        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'Nama Barang')
            ->setCellValue('C1', 'Jumlah Barang')
            ->setCellValue('D1', 'Nama Penyumbang')
            ->setCellValue('E1', 'Lokasi Penyimpanan')
            ->setCellValue('F1', 'Tanggal')
            ->setCellValue('G1', 'Email Pengurus');

        $kolom = 2;
        $nomor = 1;
        foreach ($barang as $p) {

            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $kolom, $nomor)
                ->setCellValue('B' . $kolom, $p->nama_barang)
                ->setCellValue('C' . $kolom, $p->jumlah_barang)
                ->setCellValue('D' . $kolom, $p->nama_penyumbang)
                ->setCellValue('F' . $kolom, $p->lokasi_penyimpanan)
                ->setCellValue('E' . $kolom, date('j F Y', strtotime($p->tanggal_masuk)))
                ->setCellValue('G' . $kolom, $p->username);

            $kolom++;
            $nomor++;
        }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Barang.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}
