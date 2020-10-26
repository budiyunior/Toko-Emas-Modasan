<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pembelian extends CI_Model
{
    private $tbinvoice = "tm_invoice";
    private $tbpelanggan = "tm_pelanggan";

    public function get_faktur()
    {
        return $this->db->get($this->tbinvoice)->result();
    }

    public function get_by_id($id)
    {
        $this->db->where('fc_noinv', $id);
        return $this->db->get('tm_invoice')->row();
    }

    public function get_pelanggan_id($id)
    {
        $this->db->where('fc_kdpel', $id);
        return $this->db->get('tm_pelanggan')->row();
    }

    public function get_by_barang($id)
    {
        $this->db->where('fn_id', $id);
        return $this->db->get('tm_stock')->row_array();
    }

    function get_pelanggan()
    {
        return $this->db->get($this->tbpelanggan)->result();
    }
}
