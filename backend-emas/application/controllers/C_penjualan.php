<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_penjualan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('M_menu');
        $this->load->model('M_penjualan');
    }

    public function index()
    {
        $data['title'] = "Penjualan";
        $data['menu'] = $this->M_menu->get_menu();
        // $data['penjualan'] = $this->M_penjualan->get_penjualan();


        $data['pelanggan'] = $this->M_penjualan->get_pelanggan();

        $this->load->view('admin/v_penjualan', $data);
    }
}
