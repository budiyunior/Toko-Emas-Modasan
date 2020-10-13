<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_menu extends CI_Model
{
    private $tabel = "mainmenu";

    public function get_menu()
    {
        return $this->db->get($this->tabel)->result();
    }

}