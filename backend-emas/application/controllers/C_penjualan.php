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
        $this->load->model('M_barang');
        $this->load->model('M_pelanggan');
    }

    public function index()
    {
        $data['title'] = "Penjualan";
        $data['menu'] = $this->M_menu->get_menu();
        // $data['penjualan'] = $this->M_penjualan->get_penjualan();


        $data['pelanggan'] = $this->M_penjualan->get_pelanggan();

        $data['barang'] = $this->M_barang->get_barang();

        $this->load->view('admin/v_penjualan', $data);
    }

    public function save_pelanggan()
    {


        $save_pelanggan = $this->M_pelanggan;
        
            $save_pelanggan->save_pelanggan();
            // $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Data Produk Berhasil Disimpan :)</div>');
            // redirect('');
        //     echo "<script>
        //     window.location.href = '" . base_url('C_penjualan') . "';
        // </script>"; //Url tujuan

        
    }
}
