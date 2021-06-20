<?php 
    
class ModelUser extends CI_Model {


	public function mingguan (){
		$this->db->select ( 'WEEK(pemasukan.tanggal) AS Minggu,pemasukan.ket_pemasukan, pemasukan.nominal, pemasukan.tanggal' ); 
        $this->db->from ( 'pemasukan' );
        $this->db->Where ('WEEK(pemasukan.tanggal)=WEEK(NOW())');
		$this->db->order_by('pemasukan.tanggal ASC');
		$query = $this->db->get();
		return $query->result();
	}

	public function saldominggulalu (){
		$this->db->select ( 'SUM(pemasukan.nominal) as total' ); 
        $this->db->from ( 'pemasukan' );
        $this->db->Where ('pemasukan.tanggal < curdate() - INTERVAL DAYOFWEEK(curdate())-1 DAY');
		$query = $this->db->get();
		return $query->result();
	}

	public function kreditminggulalu (){
		$this->db->select ( 'SUM(pengeluaran.nominal) as total' ); 
        $this->db->from ( 'pengeluaran' );
        $this->db->Where ('pengeluaran.tanggal < curdate() - INTERVAL DAYOFWEEK(curdate())-1 DAY');
		$query = $this->db->get();
		return $query->result();
	}

	public function pemasukanminggulalu (){
		$this->db->select ( 'SUM(pemasukan.nominal) as total' ); 
        $this->db->from ( 'pemasukan' );
        $this->db->Where ('pemasukan.tanggal >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY
		AND pemasukan.tanggal < curdate() - INTERVAL DAYOFWEEK(curdate())-1 DAY');
		$query = $this->db->get();
		return $query->result();
	}

	public function pengeluaranminggulalu (){
		$this->db->select ( 'SUM(pengeluaran.nominal) as total' ); 
        $this->db->from ( 'pengeluaran' );
        $this->db->Where ('pengeluaran.tanggal >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY
		AND pengeluaran.tanggal < curdate() - INTERVAL DAYOFWEEK(curdate())-1 DAY');
		$query = $this->db->get();
		return $query->result();
	}

	public function pemasukanharian (){
		$this->db->select ( 'pemasukan.ket_pemasukan, pemasukan.nominal, pemasukan.tanggal' ); 
        $this->db->from ( 'pemasukan' );
        $this->db->Where ('pemasukan.tanggal=CURDATE()');
		$this->db->order_by('pemasukan.tanggal DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function pengeluaranharian (){
		$this->db->select ( 'pengeluaran.ket_pengeluaran, pengeluaran.nominal, pengeluaran.tanggal' ); 
        $this->db->from ( 'pengeluaran' );
        $this->db->Where ('pengeluaran.tanggal=CURDATE()');
		$this->db->order_by('pengeluaran.tanggal DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function neraca (){
		$this->db->select ( 'DATE_FORMAT(pemasukan.tanggal, "%M %Y") AS Bulan, SUM(pemasukan.nominal) AS TOTALPemasukan, SUM(pengeluaran.nominal) AS TOTALPengeluaran' ); 
		$this->db->from ( 'pemasukan' );
		$this->db->join ( 'pengeluaran', 'DATE_FORMAT(pemasukan.tanggal, "M-Y") = DATE_FORMAT(pengeluaran.tanggal,"M-Y")', 'left');
		$this->db->group_by('DATE_FORMAT(pemasukan.tanggal,"%M")');
		$query = $this->db->get();
		return $query->result();
	}	

	public function pemasukanbulanan (){
		$this->db->select ( 'DATE_FORMAT(pemasukan.tanggal, "%M %Y") as Bulan, SUM(pemasukan.nominal) as TotalPemasukan' ); 
		$this->db->from ( 'pemasukan' );
		$this->db->where ('YEAR(pemasukan.tanggal) = YEAR(CURDATE())');
		$this->db->group_by('DATE_FORMAT(pemasukan.tanggal, "%M%Y")');
		$this->db->order_by('(pemasukan.tanggal) ASC;');
		$query = $this->db->get();
		return $query->result();
	}

	public function pengeluaranbulanan (){
		$this->db->select ( 'DATE_FORMAT(pengeluaran.tanggal, "%M %Y") as Bulan, SUM(pengeluaran.nominal) as TotalPengeluaran' ); 
		$this->db->from ( 'pengeluaran' );
		$this->db->where ('YEAR(pengeluaran.tanggal) = YEAR(CURDATE())');
		$this->db->group_by('DATE_FORMAT(pengeluaran.tanggal, "%M%Y")');
		$this->db->order_by('(pengeluaran.tanggal) ASC;');
		$query = $this->db->get();
		return $query->result();
	}	
}