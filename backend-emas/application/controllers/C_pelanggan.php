<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_pelanggan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('M_menu');
        $this->load->model('M_pelanggan');
    }


    public function index()
    {
        $data['title'] = "Pelanggan";
        $data['menu'] = $this->M_menu->get_menu();
        $data['pelanggan'] = $this->M_pelanggan->get();
        $this->load->view('admin/v_pelanggan', $data);
    }

    public function save()
    {
        $validasi = $this->form_validation->set_rules('fc_kdpel', 'id pelanggan', 'required|is_unique[tm_pelanggan.fc_kdpel]', [
            'is_unique' => 'Kode sudah ada',
            'required' => 'Nama Tidak Boleh Kosong'
        ]);
        $validasi = $this->form_validation->set_rules('fv_nmpelanggan', 'nama', 'required', [
            'required' => 'Nama Tidak boleh kosong'
        ]);

        $save_pelanggan = $this->M_pelanggan;
        if ($validasi->run() == true) {
            $save_pelanggan->save_pelanggan();
            // $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Data Produk Berhasil Disimpan :)</div>');
            // redirect('');
            echo "<script>
            alert('Data sales berhasil di tambahkan');
            window.location.href = '" . base_url('C_pelanggan') . "';
        </script>"; //Url tujuan

        }
    }

    function delete()
    {
        foreach ($_POST['id'] as $id) {
            $this->M_pelanggan->delete($id);
        }
        return redirect('C_pelanggan/index');
    }
}
