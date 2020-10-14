<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_barang extends CI_Model
{
    private $tabel = "tm_stock";

    public function get_barang()
    {
        return $this->db->get($this->tabel)->result();
    }
}
