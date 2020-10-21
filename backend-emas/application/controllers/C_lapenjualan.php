<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_lapenjualan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('M_menu');
        $this->load->model('M_lapenjualan');
        $this->load->model('M_barang');
        $this->load->model('M_pelanggan');
    }

    public function index()
    {
        $data['title'] = "Laporan Penjualan";
        $data['menu'] = $this->M_menu->get_menu();


        $data['barang'] = $this->M_barang->get_barang();

        $this->load->view('admin/v_lapenjualan', $data);
    }
}
