<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('M_menu');
        $this->load->model('M_barang');
    }

    public function index()
    {
        $data['title'] = "Barang";
        $data['menu'] = $this->M_menu->get_menu();
        $data['barang'] = $this->M_barang->get_barang();

        $data['sales'] = $this->M_barang->get_sales();
        $data['kelompok'] = $this->M_barang->get_kelompok();
        $data['lokasi'] = $this->M_barang->get_lokasi();

        $this->load->view('admin/v_barang', $data);
    }

}
