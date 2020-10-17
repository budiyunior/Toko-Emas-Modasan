<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_penjualan extends CI_Model
{
    private $tbpelanggan = "tm_pelanggan";

    function get_pelanggan()
    {
        return $this->db->get($this->tbpelanggan)->result();
    }
}
