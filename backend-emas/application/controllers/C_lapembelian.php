<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_lapembelian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('M_menu');
        $this->load->model('M_lapembelian');
        $this->load->model('M_barang');
        $this->load->model('M_pelanggan');
    }

    public function index()
    {
        $data['title'] = "Laporan Pembelian";
        $data['menu'] = $this->M_menu->get_menu();
        $startdate = $this->input->get('startdate', TRUE);
        $enddate = $this->input->get('enddate', TRUE);


        $data['pembelian'] = $this->M_lapembelian->get_lapembelian($startdate, $enddate);


        $this->load->view('admin/v_lapembelian', $data);
    }
}
