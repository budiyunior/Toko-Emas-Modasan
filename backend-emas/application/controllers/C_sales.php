<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_sales extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('M_menu');
        $this->load->model('M_sales');
    }


    public function index()
    {
        $data['title'] = "Sales";
        $data['menu'] = $this->M_menu->get_menu();
        $data['sales'] = $this->M_sales->get();
        $this->load->view('admin/v_sales', $data);
    }


}