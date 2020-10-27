<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pengaturan extends CI_Model
{
<<<<<<< HEAD
    private $tabel = "tab_akses_mainmenu";


    public function save()
    {
        $post = $this->input->post();
        $this->id_menu = $post['id_menu'];
        
    }


=======

    private $tbadmin = "admin";

    public function get_user()
    {
        return $this->db->get($this->tbadmin)->result();
    }
>>>>>>> dad3fc758fd8a3d2bde54e5403fd1c4b12d540ee
}
