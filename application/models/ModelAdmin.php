<?php 
    
class ModelAdmin extends CI_Model {

	public function viewpemasukan (){
		$this->db->select ( 'pemasukan.ket_pemasukan, pemasukan.nama_penyumbang, jenis_pemasukan.jenis_pemasukan as jenis, pemasukan.tanggal, payment.nama_payment as payment, pemasukan.nominal' ); 
        $this->db->from ( 'pemasukan' );
        $this->db->join ('jenis_pemasukan', 'pemasukan.id_jenis_pemasukan = jenis_pemasukan.id_jenis_pemasukan');
		$this->db->join ('payment' , 'pemasukan.id_payment = payment.id_payment');
		$query = $this->db->get();
		return $query->result();
	}

	public function pemasukanharian (){
		$this->db->select ( 'SUM(pemasukan.nominal) AS PemasukanHarian' ); 
        $this->db->from ( 'pemasukan' );
        $this->db->Where ('pemasukan.tanggal=CURDATE()');
		$query = $this->db->get();
		return $query->result();
	}

	public function pengeluaranharian (){	
		$this->db->select ( 'SUM(pengeluaran.nominal) AS PengeluaranHarian' ); 
        $this->db->from ( 'pengeluaran' );
        $this->db->Where ('pengeluaran.tanggal=CURDATE()');
		$query = $this->db->get();
		return $query->result();
	}

	public function pemasukanbulanini (){
		$this->db->select ( 'SUM(pemasukan.nominal) AS PemasukanBulanIni' ); 
        $this->db->from ( 'pemasukan' );
        $this->db->Where ('MONTH(pemasukan.tanggal)=MONTH(NOW())');
		$query = $this->db->get();
		return $query->result();
	}

	public function pengeluaranbulanini (){
		$this->db->select ( 'SUM(pengeluaran.nominal) AS PengeluaranBulanIni' ); 
        $this->db->from ( 'pengeluaran' );
        $this->db->Where ('MONTH(pengeluaran.tanggal)=MONTH(NOW())');
		$query = $this->db->get();
		return $query->result();
	}

	public function pemasukanbulanlalu (){
		$this->db->select ( 'SUM(pemasukan.nominal) AS PemasukanBulanLalu' ); 
        $this->db->from ( 'pemasukan' );
        $this->db->Where ('MONTH(pemasukan.tanggal)=MONTH(NOW())-1');
		$query = $this->db->get();
		return $query->result();
	}

	public function pengeluaranbulanlalu (){
		$this->db->select ( 'SUM(pengeluaran.nominal) AS PengeluaranBulanLalu' ); 
        $this->db->from ( 'pengeluaran' );
        $this->db->Where ('MONTH(pengeluaran.tanggal)=MONTH(NOW())-1');
		$query = $this->db->get();
		return $query->result();
	}
	
	public function pemasukantahunini (){
		$this->db->select ( 'SUM(pemasukan.nominal) AS PemasukanTahunIni' ); 
        $this->db->from ( 'pemasukan' );
        $this->db->Where ('YEAR(pemasukan.tanggal)=YEAR(CURDATE())');
		$query = $this->db->get();
		return $query->result();
	}

	public function pengeluarantahunini (){
		$this->db->select ( 'SUM(pengeluaran.nominal) AS PengeluaranTahunIni' ); 
        $this->db->from ( 'pengeluaran' );
        $this->db->Where ('YEAR(pengeluaran.tanggal)=YEAR(CURDATE())');
		$query = $this->db->get();
		return $query->result();
	}

	public function caripemasukan ($bulan, $tahun){
		$this->db->select ('pemasukan.ket_pemasukan, pemasukan.tanggal, pemasukan.jenis_pemasukan, pemasukan.nama_penyumbang, pemasukan.nominal, pemasukan.nama_payment' ); 
		$this->db->from ( 'pemasukan');
		$this->db->Where ('MONTH(pemasukan.tanggal)', $bulan);
		$this->db->where ('YEAR(pemasukan.tanggal)', $tahun);
		$query = $this->db->get();
		return $query->result();
	}

	public function caripengeluaran ($bulan, $tahun){
		$this->db->select ('pengeluaran.ket_pengeluaran, pengeluaran.tanggal, pengeluaran.jenis_pengeluaran, pengeluaran.nominal, pengeluaran.nama_payment' ); 
		$this->db->from ( 'pengeluaran');
		$this->db->Where ('MONTH(pengeluaran.tanggal)', $bulan);
		$this->db->where ('YEAR(pengeluaran.tanggal)', $tahun);
		$query = $this->db->get();
		return $query->result();
	}

	public function caribarang ($bulan, $tahun){
		$this->db->select ('barang.nama_barang, barang.jumlah_barang, barang.nama_penyumbang, barang.lokasi_penyimpanan, barang.tanggal_masuk' ); 
		$this->db->from ( 'barang');
		$this->db->Where ('MONTH(barang.tanggal_masuk)', $bulan);
		$this->db->where ('YEAR(barang.tanggal_masuk)', $tahun);
		$query = $this->db->get();
		return $query->result();
	}


	public function upload(){
		$config['upload_path']    = './images/';
        $config['allowed_types']  = 'gif|jpg|png';
        $config['max_size']       = 2048;
        $config['remove_space']   = TRUE;
	  
		$this->load->library('upload', $config); // Load konfigurasi uploadnya
		if($this->upload->do_upload('barcode')){ // Lakukan upload dan Cek jika proses upload berhasil
		  // Jika berhasil :
		  $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
		  return $return;
		}else{
		  // Jika gagal :
		  $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
		  return $return;
		}
	  }
	  
	  // Fungsi untuk menyimpan data ke database
	  public function save($upload){
		$data = array(
			'nama_barcode' => $this->input->post('namabarcode'),
			'nomor' => $this->input->post('nomorbarcode'),
			'barcode' => $upload['file']['file_name'],
		);
		$id = $this->input->post('id');
		$this->db->where('id_barcode', $id);
        $this->db->update('barcode', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Edit Metode Donasi Berhasil!
        </div>');
        redirect('admin/barcode');
	  }

	  public function tambah($upload){
		$data = array(
			'nama_barcode' => $this->input->post('namabarcode'),
			'nomor' => $this->input->post('nomorbarcode'),
			'barcode' => $upload['file']['file_name'],
		);
		$this->db->insert('barcode', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Tambah Metode Donasi Berhasil!
        </div>');
        redirect('admin/barcode');
	  }

}