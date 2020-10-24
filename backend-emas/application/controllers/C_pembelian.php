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

    public function save_datapelanggan()
    {

        $save_pelanggan = $this->M_pelanggan;

        $save_pelanggan->save_pelanggan();
        // $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Data Produk Berhasil Disimpan :)</div>');
        // redirect('');
        echo "<script>
            window.location.href = '" . base_url('C_pembelian') . "';
            
        </script>"; //Url tujuan
    }

    public function tampil_barang($id)
    {
        $data = $this->M_pembelian->get_by_barang($id);
        echo json_encode($data);
    }

    
}
