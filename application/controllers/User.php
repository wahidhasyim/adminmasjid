<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        date_default_timezone_set("Asia/Jakarta");
        parent::__construct();
        $this->load->model('ModelUser');
    }

    public function index()
    {
        $data['user'] =  $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        
        $this->db->order_by("tanggal", "desc");
        $data['pengeluaran'] = $this->db->get('pengeluaran')->result_array();

        $data['datamasjid'] = $this->db->get('datamasjid')->result_array();

        $data['mingguan'] = $this->ModelUser->mingguan();
        $data['saldominggulalu'] = $this->ModelUser->saldominggulalu();
        $data['kreditminggulalu'] = $this->ModelUser->kreditminggulalu();
        $data['pemasukanminggulalu'] = $this->ModelUser->pemasukanminggulalu();
        $data['pengeluaranminggulalu'] = $this->ModelUser->pengeluaranminggulalu();
        $data['pemasukanbulanan'] = $this->ModelUser->pemasukanbulanan();
        $data['pengeluaranbulanan'] = $this->ModelUser->pengeluaranbulanan();
        $data['pemasukanharian'] = $this->ModelUser->pemasukanharian();
        $data['pengeluaranharian'] = $this->ModelUser->pengeluaranharian();
        $data['saldosebelum'] = null;
        $data['saldolalu'] = null;
        $data['kreditlalu'] = null;
        $data['pemasukanlalu'] = null;
        $data['pengeluaranlalu'] = null;
        $data['saldototal'] = null;
        $data['totalmingguan'] = null;
        $data['totalpemharian'] = null;
        $data['totalpenharian'] = null;
        $data['totalpenakhir'] = null;
        $data['totalpemakhir'] = null;
        $data['neracatotal'] = null;

            $data['neraca'] = $this->ModelUser->neraca();

        $this->db->order_by("tanggal", "desc");
        $data['pemasukan'] = $this->db->get('pemasukan')->result_array();
            $this->load->view('user/landing', $data);
            $this->load->view('template/footer');
    }

    public function editprofil()
    {
        $data['title'] = 'Edit Profil';
        $data['user'] =  $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('user/editprofil', $data);
        $this->load->view('template/footer');
    }
    public function faq()
    {

        // $this->db->order_by("date_trx", "asc");
        $data['faq'] = $this->db->get('faq')->result_array();
        $this->load->view('template/headeruser');
        $this->load->view('user/faq', $data);
    }

    public function kontak()
    {

        // $this->db->order_by("date_trx", "asc");
        $data['datamasjid'] = $this->db->get('datamasjid')->result_array();
        $this->load->view('template/headeruser');
        $this->load->view('user/kontak', $data);
    }

    public function submitkontak()
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'message' => $this->input->post('message'),

        ];
        $this->db->insert('contact', $data);
        redirect('user');
    }


    public function metode()
    {
        $data['barcode'] = $this->db->get('barcode')->result_array();
        $this->load->view('template/headeruser');
        $this->load->view('user/metodepembayaran', $data);
    }
    

    public function halamandonasi()
    {
        $this->load->view('template/headeruser');
        $this->load->view('user/halamandonasi');
    }

    
    
}
