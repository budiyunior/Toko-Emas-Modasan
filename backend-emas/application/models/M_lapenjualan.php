<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_lapenjualan extends CI_Model
{
    public function __construct()
    {
    }
    // private $tabel = "tm_invoice";
    public function get_lapenjualan($startdate, $enddate)
    {

        return $this->db->query("SELECT * FROM tm_invoice WHERE fd_tglinv between '$startdate' AND '$enddate'")->result();
    }
}
