<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_penjualan extends CI_Model
{
    private $tbpelanggan = "tm_pelanggan";

    function get_pelanggan()
    {
        return $this->db->get($this->tbpelanggan)->result();
    }

    public function get_by_id($id)
    {
        $this->db->where('fc_kdpel', $id);
        return $this->db->get('tm_pelanggan')->row();
    }

    public function get_by_barang($id)
    {
        $this->db->where('fn_id', $id);
        return $this->db->get('tm_stock')->row();
    }
}
