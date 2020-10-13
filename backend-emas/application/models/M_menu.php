<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_menu extends CI_Model
{
    private $table = 'mainmenu';

    public function get_menu()
    {
        return $this->db->get($this->table)->result();
    }
}