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
        $this->load->library('pagination');
    }

    public function index()
    {
        $data['title'] = "Barang";
        $data['menu'] = $this->M_menu->get_menu();
        $data['barang'] = $this->M_barang->get_barang();

        $data['sales'] = $this->M_barang->get_sales();
        $data['kelompok'] = $this->M_barang->get_kelompok();
        $data['lokasi'] = $this->M_barang->get_lokasi();

        //konfigurasi pagination
        $config['base_url'] = site_url('C_barang/index'); //site url
        $config['total_rows'] = $this->db->count_all('tm_stock'); //total row
        $config['per_page'] = 10;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        // Membuat Style pagination dengan Bootstrap
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        //panggil function list_pelanggan yang ada pada mmodel M_pelanggan 
        $data['barang'] = $this->M_barang->list_barang($config["per_page"], $data['page']);

        $data['pagination'] = $this->pagination->create_links();

        //load view pelanggan view

        $this->load->view('admin/v_barang', $data);
    }


    public function save_nmkelompok()
    {
        $save_kelompok = $this->M_barang;

        $save_kelompok->save_namakelompok();
        // $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Data Produk Berhasil Disimpan :)</div>');
        // redirect('');

        // echo "<script>
        //     alert('Data sales berhasil di tambahkan');
        //     window.location.href = '" . base_url('C_barang') . "';
        // </script>"; //Url tujuan
    }

    public function save_barang()
    {

        $save_barang = $this->M_barang;
        $save_barang->save_barang();
        // $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Data Produk Berhasil Disimpan :)</div>');
        // redirect('');
        echo "<script>
            alert('Data Barang berhasil di tambahkan');
            window.location.href = '" . base_url('C_barang') . "';
        </script>"; //Url tujuan

    }

    public function update_barang()
    {

        $save_barang = $this->M_barang;
        $save_barang->update_barang();
        // $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Data Produk Berhasil Disimpan :)</div>');
        // redirect('');
        echo "<script>
            alert('Data Barang berhasil di ubah');
            window.location.href = '" . base_url('C_barang') . "';
        </script>"; //Url tujuan

    }

    public function edit($id)
    {
        $data = $this->M_barang->get_by_id($id);
        echo json_encode($data);
    }
}
