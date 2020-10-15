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
        //$data['idsales'] = $this->db->get_where('t_sales', ['fc_salesid' => $id_sales])->row_array();
        $data['sales'] = $this->M_sales->get();
        $data['sales3'] = $this->M_sales->get();
        $data['jabatan'] = $this->M_sales->get_jabatan();
        $this->load->view('admin/v_sales', $data);
    }

    public function save()
    {
        $validasi = $this->form_validation->set_rules('fc_salesid', 'id sales', 'required|is_unique[t_sales.fc_salesid]', [
            'is_unique' => 'Kode sudah ada',
            'required' => 'Nama Tidak Boleh Kosong'
        ]);
        $validasi = $this->form_validation->set_rules('fv_nama', 'nama', 'required', [
            'required' => 'Nama Tidak boleh kosong'
        ]);

        $save_sales = $this->M_sales;
        if ($validasi->run() == true) {
            $save_sales->save_sales();
            // $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Data Produk Berhasil Disimpan :)</div>');
            // redirect('');
            echo "<script>
            alert('Data sales berhasil di tambahkan');
            window.location.href = '" . base_url('C_sales') . "';
        </script>"; //Url tujuan

        }
    }



    public function delete($id)
    {
        {
            foreach ($_POST['fc_salesid'] as $id) {
                $this->M_pelanggan->delete($id);
            }
            return redirect('C_pelanggan/index');
        }
    }
}
