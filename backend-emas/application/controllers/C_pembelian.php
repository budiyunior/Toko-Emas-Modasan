<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_pembelian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('M_menu');
        $this->load->model('M_pembelian');
        $this->load->model('M_barang');
        $this->load->model('M_pelanggan');
    }

    public function index()
    {
        $data['title'] = "Pembelian";
        $data['menu'] = $this->M_menu->get_menu();

        $data['barang'] = $this->M_barang->get_barang();
        $data['faktur'] = $this->M_pembelian->get_faktur();
        $data['pelanggan'] = $this->M_pembelian->get_pelanggan();

        $this->load->view('admin/v_pembelian', $data);
    }

    public function tampil_faktur($id)
    {   
        $data = $this->M_pembelian->get_by_id($id);
        echo json_encode($data);
    }

    public function tampil_pelanggan($id)
    {
        $data = $this->M_pembelian->get_pelanggan_id($id);
        echo json_encode($data);
    }
}