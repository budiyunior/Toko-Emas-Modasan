<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_pengaturan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('M_menu');
        $this->load->model('M_pengaturan');
    }

    public function index()
    {
        $data['title'] = "Pengaturan";
        $data['menu'] = $this->M_menu->get_menu();


        $this->load->view('admin/v_pengaturan', $data);
    }

    public function save()
    {
        
    }
}
