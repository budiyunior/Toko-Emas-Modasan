<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_lapembelian extends CI_Model
{
    public function get_lapembelian($startdate, $enddate)
    {
        return $this->db->query("SELECT * FROM t_belimst WHERE fd_tglbeli between '$startdate' AND '$enddate'")->result();
    }
}
