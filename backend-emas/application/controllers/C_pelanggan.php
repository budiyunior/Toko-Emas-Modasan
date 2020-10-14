<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_pelanggan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('M_menu');
        $this->load->model('M_pelanggan');
    }


    public function index()
    {
        $data['title'] = "Pelanggan";
        $data['menu'] = $this->M_menu->get_menu();
        $data['pelanggan'] = $this->M_sales->get();
        $data['jabatan'] = $this->M_sales->get_jabatan();
        $this->load->view('admin/v_sales', $data);
    }
}
