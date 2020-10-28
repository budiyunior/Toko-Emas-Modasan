<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pengaturan extends CI_Model
{
    private $tabel = "tab_akses_mainmenu";


    public function save()
    {
        $post = $this->input->post();
        $this->id_menu = $post['id_menu'];
        
    }


}
