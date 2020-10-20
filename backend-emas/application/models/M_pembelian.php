<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pembelian extends CI_Model
{
    private $tbinvoice = "tm_invoice";

    public function get_faktur()
    {
        return $this->db->get($this->tbinvoice)->result();
    }
}
