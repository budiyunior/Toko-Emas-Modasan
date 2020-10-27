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
        // $startdate = $this->input->get('startdate', TRUE);
        // $enddate = $this->input->get('enddate', TRUE);


        // if ($startdate and $enddate) {
        //     $data['penjualan'] = $this->M_lapenjualan->get_lapenjualan($startdate, $enddate);
        //     // $data['total_asset'] = $this->M_lapenjualan->get_lapenjualan($startdate, $enddate);
        // } else {
        //     $data['penjualan'] = $this->M_lapenjualan->tampil_semua();
        // }

        $this->load->view('admin/v_lapenjualan', $data);
    }

    // public function filter()
    // {
    //     $startdate = $this->input->get('startdate', TRUE);
    //     $enddate = $this->input->get('enddate', TRUE);

    //     $data['penjualan'] = $this->M_lapenjualan->get_lapenjualan($startdate, $enddate);

    //     $this->load->view('admin/v_lapenjualan', $data);
    // }

    public function view_cetak()
    {
        $data['title'] = "Penjualan";
        $data['menu'] = $this->M_menu->get_menu();


        $this->load->view('admin/cetak_lapenjualan', $data);
    }

    public function cetak_nota()
    {
        $data['title'] = "Cetak Nota";


        $this->load->view('admin/cetak_nota', $data);
    }
}
