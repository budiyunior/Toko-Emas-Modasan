<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('M_menu');
        if (empty($this->session->userdata('fv_username'))) {
            echo "<script>
                alert('Anda harus login terlebih dahulu');
                window.location.href = '" . base_url('C_login') . "';
            </script>"; //Url tujuan
        }
    }

    public function index()
    {
        $data['title'] = 'Home';
        $data['menu'] = $this->M_menu->get_menu();
        $this->load->view('admin/home', $data);
    }

    public function perhitungan()
    {
        $data['title'] = 'perhitungan';
        $data['menu'] = $this->M_menu->get_menu();
        $this->load->view('coba/perhitungan', $data);
    }
}
