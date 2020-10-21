<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pembelian extends CI_Model
{
    private $tbinvoice = "tm_invoice";

    public function get_faktur()
    {
        return $this->db->get($this->tbinvoice)->result();
    }

    public function get_by_id($id)
    {
        $this->db->where('fc_noinv', $id);
        return $this->db->get('tm_invoice')->row();
    }
}
