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
        $data['jabatan'] = $this->M_sales->get_jabatan();
        $this->load->view('admin/v_sales', $data);
    }

    public function save()
    {
        // $validation = $this->form_validation->set_rules('fc_salesid', 'ID Sales', 'required|is_unique[t_sales.fc_salesid]', [
        //     'is_unique' => 'Kode sudah terpakai',
        //     'required' => 'Kode Tidak Boleh Kosong',
        //     //'max_length' => 'No Rekam Medis tidak lebih dari 8 Karakter!'
        // ]);
        // $validation = $this->form_validation->set_rules('fv_nama', 'Nama Sales', 'required', [
        //     'required' => 'Nama Tidak boleh kosong'
        // ]);

        $save_sales = $this->M_sales;
        //if ($validation->run()) {
        $save_sales->save_sales();
        echo "<script>
                alert('Data sales berhasil di tambahkan');
                window.location.href = '" . base_url('C_sales') . "';
            </script>"; //Url tujuan
        //}
    }
}
