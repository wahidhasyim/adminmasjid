<?php defined('BASEPATH') or die('No direct script access allowed');

class Export_model extends CI_Model
{
    public function pemasukan()
    {
        $this->db->select('*');
        $this->db->from('pemasukan');

        return $this->db->get();
    }

    public function pengeluaran()
    {
        $this->db->select('*');
        $this->db->from('pengeluaran');

        return $this->db->get();
    }

    public function barang()
    {
        $this->db->select('*');
        $this->db->from('barang');

        return $this->db->get();
    }
}
