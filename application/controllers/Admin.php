<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        date_default_timezone_set("Asia/Jakarta");
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('ModelAdmin');
        $this->load->model('GambarModel');
        if ($this->session->userdata('role_id') == null) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            this session has expired, please login again!
              </div>');
            redirect("auth");
        }
    }

    public function index()
    {

    $data['title'] = 'Dashboard';
	$data['user'] =  $this->db->get_where('user', ['username' =>
	$this->session->userdata('username')])->row_array();

    $this->db->select_sum('nominal');
    $data['pemasukanharian'] = $this->ModelAdmin->pemasukanharian();
    $data['pengeluaranharian'] = $this->ModelAdmin->pengeluaranharian();
    $data['pemasukanbulanini'] = $this->ModelAdmin->pemasukanbulanini();
    $data['pengeluaranbulanini'] = $this->ModelAdmin->pengeluaranbulanini();
    $data['pemasukanbulanlalu'] = $this->ModelAdmin->pemasukanbulanlalu();
    $data['pengeluaranbulanlalu'] = $this->ModelAdmin->pengeluaranbulanlalu();
    $data['pemasukantahunini'] = $this->ModelAdmin->pemasukantahunini();
    $data['pengeluarantahunini'] = $this->ModelAdmin->pengeluarantahunini();
    $data['totalpemharian'] = null;
    $data['totalpenharian'] = null;
    $data['saldoharian'] = null;
    $data['totalpembulanan'] = null;
    $data['totalpenbulanan'] = null;
    $data['saldobulanan'] = null;
    $data['totalpembulanlalu'] = null;
    $data['totalpenbulanlalu'] = null;
    $data['saldobulanlalu'] = null;

	$data['total_pemasukan'] = $this->db->query("SELECT sum(nominal) as nominal from pemasukan")->row_array();

	$data['total_pengeluaran'] = $this->db->query("SELECT sum(nominal) as nominal from pengeluaran")->row_array();

	$data['total_barang'] = $this->db->query("SELECT sum(jumlah_barang) as jumlah_barang from barang")->row_array();

	// Untuk Grafik Pemasukan
	$data['total_pemasukan_bulanan'] = array();

	foreach ($this->db->query("SELECT MONTH(tanggal) AS bulan, SUM(nominal) AS jumlah_bulanan FROM pemasukan GROUP BY MONTH(tanggal)")->result_array() as $a) {

		array_push($data['total_pemasukan_bulanan'], $a);
	}
	// print_r($data['total_pemasukan_bulanan']);

	$data['jenis_pemasukan'] = array();
	foreach ($this->db->query("SELECT jenis_pemasukan as jenis_pemasukan, count(jenis_pemasukan) AS jumlah FROM pemasukan GROUP BY jenis_pemasukan")->result_array() as $a) {
		array_push($data['jenis_pemasukan'], $a);
	}

	// Untuk Grafik Pengeluaran 
	$data['total_pengeluaran_bulanan'] = array();

	foreach ($this->db->query("SELECT MONTH(tanggal) AS bulan, SUM(nominal) AS jumlah_bulanan FROM pengeluaran GROUP BY MONTH(tanggal)")->result_array() as $a) {

		array_push($data['total_pengeluaran_bulanan'], $a);
	}
	// print_r($data['total_pemasukan_bulanan']);

	$data['jenis_pengeluaran'] = array();
	foreach ($this->db->query("SELECT jenis_pengeluaran as jenis_pengeluaran, count(jenis_pengeluaran) AS jumlah FROM pengeluaran GROUP BY jenis_pengeluaran")->result_array() as $a) {
		array_push($data['jenis_pengeluaran'], $a);
	}

	$data['jenispengeluaran'] = $this->db->get('jenis_pengeluaran')->result_array();
	$data['jenispemasukan'] = $this->db->get('jenis_pemasukan')->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('template/footer');
    }

    public function addJenisPemasukan()
    {
        $data['title'] = 'Data Jenis Pemasukan';
        $data['user'] =  $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['donatur'] = $this->db->get('jenis_pemasukan')->result_array();

        $this->form_validation->set_rules('jenis', 'Jenis Pemasukan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('admin/pemasukan', $data);
            $this->load->view('template/footer');
        } else {
            $data = [
                'jenis_pemasukan' => $this->input->post('jenis')
            ];
            $this->db->insert('jenis_pemasukan', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Jenis Pemasukan di tambahkan!
          </div>');
            redirect('admin/pemasukan');
        }
    }

    public function addNewJenisPemasukan()
    {
        $data['title'] = 'Data Jenis Pemasukan';
        $data['user'] =  $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['donatur'] = $this->db->get('jenis_pemasukan')->result_array();

        $this->form_validation->set_rules('jenis', 'Jenis Pemasukan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('admin/pemasukan', $data);
            $this->load->view('template/footer');
        } else {
            $data = [
                'jenis_pemasukan' => $this->input->post('jenis')
            ];
            $this->db->insert('jenis_pemasukan', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Jenis Pemasukan di tambahkan!
          </div>');
            redirect('admin/jenispemasukan');
        }
    }

    public function printpemasukan(){
        
        $data['user'] =  $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $submit = $this->input->post('submit');
		if ($submit == 1) {
            $data['title'] = ' Laporan Pemasukan Bulan '.$bulan. ' Tahun '. $tahun;
        $data['datafilter'] = $this->ModelAdmin->caripemasukan($bulan, $tahun);
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('search/searchpemasukan', $data);
		}
		elseif ($submit == 2) {
            $data['title'] = ' Laporan Pemasukan Bulan '.$bulan. ' Tahun '. $tahun;
            $data['datafilter'] = $this->ModelAdmin->caripemasukan($bulan, $tahun);
            $this->load->view('print/printpemasukan', $data);
    }
    }

    public function printpengeluaran(){

        $data['user'] =  $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $submit = $this->input->post('submit');
		if ($submit == 1) {
            $data['title'] = ' Laporan Pengeluaran Bulan '.$bulan. ' Tahun '. $tahun;
        $data['datafilter'] = $this->ModelAdmin->caripengeluaran($bulan, $tahun);
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('search/searchpengeluaran', $data);
		}
		elseif ($submit == 2) {
            $data['title'] = ' Laporan Pengeluaran Bulan '.$bulan. ' Tahun '. $tahun;
		$data['datafilter'] = $this->ModelAdmin->caripengeluaran($bulan, $tahun);
        $this->load->view('print/printpengeluaran', $data);
    }
    }

    public function printbarang(){

        $data['user'] =  $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $submit = $this->input->post('submit');
		if ($submit == 1) {
            $data['title'] = ' Data Barang Bulan '.$bulan. ' Tahun '. $tahun;
        $data['datafilter'] = $this->ModelAdmin->caribarang($bulan, $tahun);
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('search/searchbarang', $data);
		}
		elseif ($submit == 2) {
            $data['title'] = ' Data Barang Bulan '.$bulan. ' Tahun '. $tahun;
            $data['datafilter'] = $this->ModelAdmin->caribarang($bulan, $tahun);
            $this->load->view('print/printbarang', $data);
    }
    }

    public function pemasukan()
    {
        $data['title'] = 'Data Pemasukan';
        $data['user'] =  $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['jenispemasukan'] = $this->db->get('jenis_pemasukan')->result_array();
        $data['payment'] = $this->db->get('payment')->result_array();

        $this->db->order_by("tanggal", "asc");
        $data['pemasukan'] = $this->db->get('pemasukan')->result_array();

        $this->db->select_sum('nominal');
        $data['total_pemasukan'] = $this->db->get('pemasukan')->row_array();

        
        $username = $this->session->userdata('username');

        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('penyumbang', 'Penyumbang', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('jenispemasukan', 'Jenis', 'required');
        $this->form_validation->set_rules('payment', 'Payment', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');

        
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('admin/pemasukan', $data);
            $this->load->view('template/footer');
        } else {



            $data = [
                'username' => $username,
                'ket_pemasukan' => $this->input->post('keterangan'),
                'nama_penyumbang' => $this->input->post('penyumbang'),
                'nominal' => $this->input->post('jumlah'),
                'tanggal' =>  $this->input->post('tanggal'),
                'jenis_pemasukan' => $this->input->post('jenispemasukan'),
                'nama_payment' => $this->input->post('payment')

            ];
            $this->db->insert('pemasukan', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Tambah Pemasukan Berhasil!
          </div>');
            redirect('admin/pemasukan');
        }
    }

    public function updatepemasukan()
    {
        $data['title'] = 'Data Pemasukan';
        $data['user'] =  $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['pemasukan'] = $this->db->get('pemasukan')->result_array();
        $data['jenispemasukan'] = $this->db->get('jenis_pemasukan')->result_array();
        $data['payment'] = $this->db->get('payment')->result_array();

        $this->db->select_sum('nominal');
        $data['total_pemasukan'] = $this->db->get('pemasukan')->row_array();

        $id = $this->input->post('id');

        $username = $this->session->userdata('username');

        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('penyumbang', 'Penyumbang', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('jenispemasukan', 'Jenis Pemasukan', 'required');
        $this->form_validation->set_rules('payment', 'Payment', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('admin/pemasukan', $data);
            $this->load->view('template/footer');
        } else {
            $data = [
                'username' => $username,
                'ket_pemasukan' => $this->input->post('keterangan'),
                'nama_penyumbang' => $this->input->post('penyumbang'),
                'nominal' => $this->input->post('jumlah'),
                'tanggal' =>  $this->input->post('tanggal'),
                'jenis_pemasukan' => $this->input->post('jenispemasukan'),
                'nama_payment' => $this->input->post('payment'),
            ];
            $this->db->where('id_pemasukan', $id);
            $this->db->update('pemasukan', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Update Pemasukan ' . $this->input->post('nama') . ' berhasil!
          </div>');
            redirect('admin/pemasukan');
        }
    }


    public function deletePemasukan()
    {
        $id = $this->input->get('id');

        $pemasukan =  $this->db->get_where('pemasukan', ['id_pemasukan' => $id])->row_array();

        $this->db->delete('pemasukan', array('id_pemasukan' => $id));


        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Hapus Pemasukan Berhasil!
          </div>');
        redirect('admin/pemasukan');
    }

    public function deletePengeluaran()
    {
        $id = $this->input->get('id');

        $pemasukan =  $this->db->get_where('pengeluaran', ['id_pengeluaran' => $id])->row_array();

        $this->db->delete('pengeluaran', array('id_pengeluaran' => $id));


        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Hapus Pengeluaran Berhasil!
          </div>');
        redirect('admin/pengeluaran');
    }

    public function pengeluaran()
    {
        $data['title'] = 'Data Pengeluaran';
        $data['user'] =  $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['jenispengeluaran'] = $this->db->get('jenis_pengeluaran')->result_array();
        $data['payment'] = $this->db->get('payment')->result_array();

        $this->db->order_by("tanggal", "asc");
        $data['pengeluaran'] = $this->db->get('pengeluaran')->result_array();

        $this->db->select_sum('nominal');
        $data['total_pengeluaran'] = $this->db->get('pengeluaran')->row_array();

        $username = $this->session->userdata('username');

        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('jenispengeluaran', 'Jenis', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('admin/pengeluaran', $data);
            $this->load->view('template/footer');
        } else {

         
            $data = [
                'username' => $username,
                'ket_pengeluaran' => $this->input->post('keterangan'),
                'nominal' => $this->input->post('jumlah'),
                'tanggal' =>  $this->input->post('tanggal'),
                'jenis_pengeluaran' => $this->input->post('jenispengeluaran'),
                'nama_payment' => $this->input->post('payment')

            ];
            $this->db->insert('pengeluaran', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Tambah Pengeluaran Berhasil!
          </div>');
            redirect('admin/pengeluaran');
        }
    }

    public function updatePengeluaran()
    {
        $data['title'] = 'Data Pengeluaran';
        $data['user'] =  $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['jenispengeluaran'] = $this->db->get('jenis_pengeluaran')->result_array();
        $data['payment'] = $this->db->get('payment')->result_array();

        // $this->db->order_by("date_trx", "asc");
        $data['pengeluaran'] = $this->db->get('pengeluaran')->result_array();

        $this->db->select_sum('nominal');
        $data['total_pengeluaran'] = $this->db->get('pengeluaran')->row_array();

        $id = $this->input->post('id');
        
        $username = $this->session->userdata('username');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('jenispengeluaran', 'Jenis', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
        $this->form_validation->set_rules('payment', 'Payment', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('admin/pengeluaran', $data);
            $this->load->view('template/footer');
        } else {

            

            $data = [
                'username' => $username,
                'ket_pengeluaran' => $this->input->post('keterangan'),
                'nominal' => $this->input->post('jumlah'),
                'tanggal' =>  $this->input->post('tanggal'),
                'jenis_pengeluaran' => $this->input->post('jenispengeluaran'),
                'nama_payment' => $this->input->post('payment')


            ];
            $this->db->where('id_pengeluaran', $id);
            $this->db->update('pengeluaran', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Edit Pengeluaran Berhasil!
          </div>');
            redirect('admin/pengeluaran');
        }
    }

    public function addJenisPengeluaran()
    {
        $data['title'] = 'Data Jenis Pengeluaran';
        $data['user'] =  $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['pengeluaran'] = $this->db->get('jenis_pengeluaran')->result_array();

        $this->form_validation->set_rules('jenis', 'Jenis Pengeluaran', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('admin/pemasukan', $data);
            $this->load->view('template/footer');
        } else {
            $data = [
                'jenis_pengeluaran' => $this->input->post('jenis')
            ];
            $this->db->insert('jenis_pengeluaran', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Jenis Pengeluaran di tambahkan!
          </div>');
            redirect('admin/pengeluaran');
        }
    }

    public function addNewJenisPengeluaran()
    {
        $data['title'] = 'Data Jenis Pengeluaran';
        $data['user'] =  $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['pengeluaran'] = $this->db->get('jenis_pengeluaran')->result_array();

        $this->form_validation->set_rules('jenis', 'Jenis Pengeluaran', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('admin/pemasukan', $data);
            $this->load->view('template/footer');
        } else {
            $data = [
                'jenis_pengeluaran' => $this->input->post('jenis')
            ];
            $this->db->insert('jenis_pengeluaran', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Jenis Pengeluaran di tambahkan!
          </div>');
            redirect('admin/jenispengeluaran');
        }
    }

    public function donasiBarang()
    {
        $data['title'] = 'Data Barang';
        $data['user'] =  $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        $username = $this->session->userdata('username');

        // $data['jenispengeluaran'] = $this->db->get('jenis_pengeluaran')->result_array();
        $data['payment'] = $this->db->get('payment')->result_array();

        // $this->db->order_by("date_trx", "asc");
        $data['barang'] = $this->db->get('barang')->result_array();



        $this->db->select_sum('jumlah_barang');
        $data['total_barang'] = $this->db->get('barang')->row_array();


        $this->form_validation->set_rules('namabarang', 'namabarang', 'required');
        $this->form_validation->set_rules('jumlah', 'jumlah', 'required');
        $this->form_validation->set_rules('penyumbang', 'penyumbang', 'required');
        $this->form_validation->set_rules('lokasi', 'lokasi', 'required');
        $this->form_validation->set_rules('tanggal', 'tanggal', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('admin/donasiBarang', $data);
            $this->load->view('template/footer');
        } else {

            

            $data = [
                
                'username' => $username,
                'nama_barang' => $this->input->post('namabarang'),
                'jumlah_barang' =>  $this->input->post('jumlah'),
                'nama_penyumbang' => $this->input->post('penyumbang'),
                'lokasi_penyimpanan' => $this->input->post('lokasi'),
                'tanggal_masuk' => $this->input->post('tanggal')


            ];
            $this->db->insert('barang', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Tambah Barang Berhasil!
          </div>');
            redirect('admin/donasiBarang');
        }
    }

    public function updateBarang()
    {
        $data['title'] = 'Data pemasukan Barang';
        $data['user'] =  $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        $username = $this->session->userdata('username');

        // $data['jenispengeluaran'] = $this->db->get('jenis_pengeluaran')->result_array();
        $data['payment'] = $this->db->get('payment')->result_array();


        $data['barang'] = $this->db->get('barang')->result_array();



        $this->db->select_sum('jumlah_barang');
        $data['total_barang'] = $this->db->get('barang')->row_array();

        $id = $this->input->post('id');

        $username = $this->session->userdata('username');

        $this->form_validation->set_rules('namabarang', 'namabarang', 'required');
        $this->form_validation->set_rules('jumlah', 'jumlah', 'required');
        $this->form_validation->set_rules('penyumbang', 'penyumbang', 'required');
        $this->form_validation->set_rules('lokasi', 'lokasi', 'required');
        $this->form_validation->set_rules('tanggal', 'tanggal', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('admin/donasiBarang', $data);
            $this->load->view('template/footer');
        } else {

           

            $data = [

                'username' => $username,
                'nama_barang' => $this->input->post('namabarang'),
                'jumlah_barang' =>  $this->input->post('jumlah'),
                'nama_penyumbang' => $this->input->post('penyumbang'),
                'lokasi_penyimpanan' => $this->input->post('lokasi'),
                'tanggal_masuk' => $this->input->post('tanggal')


            ];

            $this->db->where('id_barang', $id);
            $this->db->update('barang', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Edit Barang Berhasil!
          </div>');
            redirect('admin/donasiBarang');
        }
    }

    public function deleteBarang()
    {
        $id = $this->input->get('id');

        $barang =  $this->db->get_where('barang', ['id_barang' => $id])->row_array();

        $this->db->delete('barang', array('id_barang' => $id));


        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Hapus Pemasukan Berhasil!
          </div>');
        redirect('admin/donasiBarang');
    }
    public function adminkontak()
    {
        $data['title'] = 'Data Pesan Masuk';
        $data['user'] =  $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        // $this->db->order_by("date_trx", "asc");
        $data['contact'] = $this->db->get('contact')->result_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/adminkontak', $data);
        $this->load->view('template/footer');
    }

    public function deleteContact()
    {
        $id = $this->input->get('id');

        $contact =  $this->db->get_where('contact', ['id_contact' => $id])->row_array();

        $this->db->delete('contact', array('id_contact' => $id));


        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Hapus Pesan Berhasil!
          </div>');
        redirect('admin/adminKontak');
    }

    public function adminfaq()
    {
        $data['title'] = 'Data FAQ';
        $data['user'] =  $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['faq'] = $this->db->get('faq')->result_array();

        $this->form_validation->set_rules('pertanyaan', 'pertanyaan', 'required');
        $this->form_validation->set_rules('jawaban', 'jawaban', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('admin/adminfaq', $data);
            $this->load->view('template/footer');
        } else {

            $data = [
                'pertanyaan' => $this->input->post('pertanyaan'),
                'jawaban' => $this->input->post('jawaban'),

            ];
            $this->db->insert('faq', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Tambah Pertanyaan Berhasil!
          </div>');
            redirect('admin/adminfaq');
        }
    }

    public function updateFaq()
    {
        $data['title'] = 'Data FAQ';
        $data['user'] =  $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['faq'] = $this->db->get('faq')->result_array();

        $id = $this->input->post('id');

        $this->form_validation->set_rules('pertanyaan', 'pertanyaan', 'required');
        $this->form_validation->set_rules('jawaban', 'jawaban', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('admin/adminfaq', $data);
            $this->load->view('template/footer');
        } else {
            $data = [
                'pertanyaan' => $this->input->post('pertanyaan'),
                'jawaban' => $this->input->post('jawaban'),
            ];
            $this->db->where('id_faq', $id);
            $this->db->update('faq', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Edit Pertanyaan Berhasil!
          </div>');
            redirect('admin/adminfaq');
        }
    }

    public function deleteFaq()
    {
        $id = $this->input->get('id');

        $faq =  $this->db->get_where('faq', ['id_faq' => $id])->row_array();

        $this->db->delete('faq', array('id_faq' => $id));


        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Hapus Pertanyaan Berhasil!
          </div>');
        redirect('admin/adminfaq');
    }

    public function searchFaq()
    {
        $data['title'] = 'Data FAQ';
        $data['user'] =  $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['faq'] = $this->db->get('faq')->result_array();

        $keyword = $this->input->post('keyword');
        $this->db->like('pertanyaan', $keyword);
        $this->db->or_like('jawaban', $keyword);
        $data['post'] = $this->db->get('faq')->result();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/pencarianFaq', $data);
        $this->load->view('template/footer');
    }


    public function searchKontak()
    {
        $data['title'] = 'Data Pesan';
        $data['user'] =  $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['contact'] = $this->db->get('contact')->result_array();

        $keyword = $this->input->post('keyword');
        $this->db->like('nama', $keyword);
        $this->db->or_like('username', $keyword);
        $this->db->or_like('message', $keyword);
        $data['post'] = $this->db->get('contact')->result();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/pencarianContact', $data);
        $this->load->view('template/footer');
    }

    public function user()
    {
        $data['title'] = 'My Profile';
        $data['user'] =  $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('template/footer');
    }

    public function updateProfil()
    {
        $data['user'] =  $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['user'] = $this->db->get('user')->result_array();

        $id = $this->input->post('id');

        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('user/index', $data);
            $this->load->view('template/footer');
        } else {
            $data = [
                'name' => $this->input->post('name'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
            ];
            $this->db->where('id', $id);
            $this->db->update('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Edit Profil Berhasil!
          </div>');
            redirect('admin/user');
        }
    }

    public function jenisPemasukan()
    {
        $data['title'] = 'Data Jenis Pemasukan';
        $data['user'] =  $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        // $this->db->order_by("date_trx", "asc");
        $data['jenis_pemasukan'] = $this->db->get('jenis_pemasukan')->result_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/jenispemasukan', $data);
        $this->load->view('template/footer');
    }

    public function updateJenisPemasukan()
    {
        $data['title'] = 'Data Jenis Pemasukan';
        $data['user'] =  $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['jenis_pemasukan'] = $this->db->get('jenis_pemasukan')->result_array();

        $id = $this->input->post('id');

        $this->form_validation->set_rules('jenis_pemasukan', 'jenis_pemasukan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('admin/jenispemasukan', $data);
            $this->load->view('template/footer');
        } else {
            $data = [
                'jenis_pemasukan' => $this->input->post('jenis_pemasukan'),
            ];
            $this->db->where('id_jenis_pemasukan', $id);
            $this->db->update('jenis_pemasukan', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Edit Jenis Pemasukan Berhasil!
          </div>');
            redirect('admin/jenispemasukan');
        }
    }

    public function deleteJenisPemasukan()
    {
        $id = $this->input->get('id');

        $jenis_pemasukan =  $this->db->get_where('jenis_pemasukan', ['id_jenis_pemasukan' => $id])->row_array();

        $this->db->delete('jenis_pemasukan', array('id_jenis_pemasukan' => $id));


        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Hapus Jenis Pemasukan Berhasil!
          </div>');
        redirect('admin/jenisPemasukan');
    }

    public function jenisPengeluaran()
    {
        $data['title'] = 'Data Jenis Pengeluaran';
        $data['user'] =  $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        // $this->db->order_by("date_trx", "asc");
        $data['jenis_pengeluaran'] = $this->db->get('jenis_pengeluaran')->result_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/jenispengeluaran', $data);
        $this->load->view('template/footer');
    }


    public function updateJenisPengeluaran()
    {
            $data['title'] = 'Data Jenis Pengeluaran';
            $data['user'] =  $this->db->get_where('user', ['username' =>
            $this->session->userdata('username')])->row_array();
    
            $data['jenis_pengeluaran'] = $this->db->get('jenis_pengeluaran')->result_array();
    
            $id = $this->input->post('id');
    
            $this->form_validation->set_rules('jenis_pengeluaran', 'jenis_pengeluaran', 'required');
    
            if ($this->form_validation->run() == false) {
                $this->load->view('template/header', $data);
                $this->load->view('template/sidebar', $data);
                $this->load->view('template/topbar', $data);
                $this->load->view('admin/jenispengeluaran', $data);
                $this->load->view('template/footer');
            } else {
                $data = [
                    'jenis_pengeluaran' => $this->input->post('jenis_pengeluaran'),
                ];
                $this->db->where('id_jenis_pengeluaran', $id);
                $this->db->update('jenis_pengeluaran', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
               Edit Jenis pengeluaran Berhasil!
              </div>');
                redirect('admin/jenispengeluaran');
            }
    }

    public function deleteJenisPengeluaran()
    {
        $id = $this->input->get('id');

        $jenis_pengeluaran =  $this->db->get_where('jenis_pengeluaran', ['id_jenis_pengeluaran' => $id])->row_array();

        $this->db->delete('jenis_pengeluaran', array('id_jenis_pengeluaran' => $id));


        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Hapus Jenis Pengeluaran Berhasil!
          </div>');
        redirect('admin/jenisPengeluaran');
    }

    public function dataMasjid()
    {
        $data['title'] = 'Data Masjid';
        $data['user'] =  $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        // $this->db->order_by("date_trx", "asc");
        $data['datamasjid'] = $this->db->get('datamasjid')->result_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/datamasjid', $data);
        $this->load->view('template/footer');
    }

    public function updateDataMasjid()
    {
            $data['title'] = 'Data Masjid';
            $data['user'] =  $this->db->get_where('user', ['username' =>
            $this->session->userdata('username')])->row_array();
    
            $data['datamasjid'] = $this->db->get('datamasjid')->result_array();
    
            $id = $this->input->post('id');
        
            $this->form_validation->set_rules('nama', 'nama', 'required');
            $this->form_validation->set_rules('alamat', 'alamat', 'required');
            $this->form_validation->set_rules('telp', 'telp', 'required');
            $this->form_validation->set_rules('email', 'email', 'required');
    
            if ($this->form_validation->run() == false) {
                $this->load->view('template/header', $data);
                $this->load->view('template/sidebar', $data);
                $this->load->view('template/topbar', $data);
                $this->load->view('admin/datamasjid', $data);
                $this->load->view('template/footer');
            } else {
                $data = [
                    'nama' => $this->input->post('nama'),
                    'alamat' => $this->input->post('alamat'),
                    'telp' => $this->input->post('telp'),
                    'email' => $this->input->post('email'),
                ];
                $this->db->where('id_datamasjid', $id);
                $this->db->update('datamasjid', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
               Edit Data Masjid Berhasil!
              </div>');
                redirect('admin/datamasjid');
            }
    }

    public function payment()
    {
        $data['title'] = 'Data Metode Pembayaran';
        $data['user'] =  $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        // $this->db->order_by("date_trx", "asc");
        $data['payment'] = $this->db->get('payment')->result_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/payment', $data);
        $this->load->view('template/footer');
    }

    public function deletePayment()
    {
        $id = $this->input->get('id');

        $payment =  $this->db->get_where('payment', ['id_payment' => $id])->row_array();

        $this->db->delete('payment', array('id_payment' => $id));


        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Hapus Metode Pembayaran Berhasil!
          </div>');
        redirect('admin/payment');
    }

    function updatePayment()
    {
        $data['title'] = 'Data Metode Pembayaran';
        $data['user'] =  $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        
        $data['payment'] = $this->db->get('payment')->result_array();

        $id = $this->input->post('id');

        $this->form_validation->set_rules('nama_payment', 'Nama Payment', 'required');
        $this->form_validation->set_rules('no_payment', 'Nomor Payment', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('admin/payment', $data);
            $this->load->view('template/footer');
        } else {
            $data = [
                'nama_payment' => $this->input->post('nama_payment'),
                'no_payment' => $this->input->post('no_payment'),
            ];
            $this->db->where('id_payment', $id);
            $this->db->update('payment', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Edit Data Metode Pembayaran Berhasil!
          </div>');
            redirect('admin/payment');
        }
    }

    
    public function addNewPayment()
    {
        $data['title'] = 'Metode Pembayaran';
        $data['user'] =  $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        $data['payment'] = $this->db->get('payment')->result_array();

        $this->form_validation->set_rules('nama_payment', 'Nama Payment', 'required');
        $this->form_validation->set_rules('no_payment', 'Nomor Payment', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('admin/payment', $data);
            $this->load->view('template/footer');
        } else {
            $data = [
                'nama_payment' => $this->input->post('nama_payment'),
                'no_payment' => $this->input->post('no_payment'),
            ];
            $this->db->insert('payment', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Metode Pembayaran di tambahkan!
          </div>');
            redirect('admin/payment');
        }
    }

    public function barcode()
    {
        $data['title'] = 'Data Metode Donasi Online';
        $data['user'] =  $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        // $this->db->order_by("date_trx", "asc");
        $data['barcode'] = $this->db->get('barcode')->result_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/barcode', $data);
        $this->load->view('template/footer');
    }

    function updateBarcode()
    {
        $data['title'] = 'Barcode';
        $data['user'] =  $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        $data['barcode'] = $this->db->get('barcode')->result_array();

        if($this->input->post('submit')){ // Jika user menekan tombol Submit (Simpan) pada form
            // lakukan upload file dengan memanggil function upload yang ada di GambarModel.php
            $upload = $this->ModelAdmin->upload();
            
            if($upload['result'] == "success"){ // Jika proses upload sukses
               // Panggil function save yang ada di GambarModel.php untuk menyimpan data ke database
              $this->ModelAdmin->save($upload);
              
              redirect('barcode'); // Redirect kembali ke halaman awal / halaman view data
            }else{ // Jika proses upload gagal
              $data['message'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('admin/barcode', $data);
            $this->load->view('template/footer');
            }
          }
    }

    public function deleteBarcode()
    {
        $id = $this->input->get('id');

        $payment =  $this->db->get_where('barcode', ['id_barcode' => $id])->row_array();

        $this->db->delete('barcode', array('id_barcode' => $id));


        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Hapus Metode Donasi Berhasil!
          </div>');
        redirect('admin/barcode');
    }
    
    public function addNewBarcode()
    {
        $data['title'] = 'Barcode';
        $data['user'] =  $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        $data['barcode'] = $this->db->get('barcode')->result_array();

        if($this->input->post('submit')){ // Jika user menekan tombol Submit (Simpan) pada form
            // lakukan upload file dengan memanggil function upload yang ada di GambarModel.php
            $upload = $this->ModelAdmin->upload();
            
            if($upload['result'] == "success"){ // Jika proses upload sukses
               // Panggil function save yang ada di GambarModel.php untuk menyimpan data ke database
              $this->ModelAdmin->tambah($upload);
              
              redirect('barcode'); // Redirect kembali ke halaman awal / halaman view data
            }else{ // Jika proses upload gagal
              $data['message'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('admin/barcode', $data);
            $this->load->view('template/footer');
            }
          }
    }

}
