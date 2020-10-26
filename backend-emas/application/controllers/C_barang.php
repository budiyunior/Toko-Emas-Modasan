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


    public function save_nmkelompok()
    {
        $save_kelompok = $this->form_validation->set_rules('');







        $save_kelompok->save_namakelompok();
        // $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Data Produk Berhasil Disimpan :)</div>');
        // redirect('');
        
        // echo "<script>
        //     alert('Data sales berhasil di tambahkan');
        //     window.location.href = '" . base_url('C_barang') . "';
        // </script>"; //Url tujuan

    }
}
