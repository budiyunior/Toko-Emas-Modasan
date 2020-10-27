<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pengaturan extends CI_Model
{

    private $tbadmin = "admin";

    public function get_user()
    {
        return $this->db->get($this->tbadmin)->result();
    }
}
