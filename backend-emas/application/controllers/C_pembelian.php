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
        $this->load->model('M_barang_id');
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

    public function getDataBarang()
    {
        $this->M_pembelian->ambilBarang();
        //print_r($this->db->last_query());
    }

    public function ajax_listall($Nomor)
    {

        $list = $this->M_barang_id->get_datatablesid();
        //print_r($this->db->last_query());
        $data = array();
        $no = $_REQUEST['start'];
        foreach ($list as $orde) {
            // $kode_barang = preg_replace ('/[^\p{L}\p{N}]/u', '', $orde->kode_barang);
            // $nama_barang = preg_replace ('/[^\p{L}\p{N}]/u', '', $orde->nama_barang);

            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $orde->fc_kdstock;
            $row[] = $orde->fv_nmbarang;
            $row[] = $orde->ff_berat;
            $row[] = $orde->fc_kadar;
            $row[] = $orde->fv_nmlokasi;
            $row[] = $orde->fv_nmkelompok;

            $row[] = ' <button type="button" class="btn btn-primary " onclick="pencarian_kode(\'' . $orde->fc_barcode . '\',\'' . $orde->fc_kdstock . '\',\'' . $orde->fv_nmbarang . '\',\'' . $orde->fc_kdkelompok . '\',\'' . $orde->fc_kdlokasi . '\',\'' . $orde->ff_berat . '\',\'' . $orde->fc_kadar . '\',\'' . $orde->fm_ongkos . '\',\'' . $orde->fm_hargabeli . '\',\'' . $orde->fm_hargajual . '\',\'' . $Nomor . '\')">Pilih</button>';


            $data[] = $row;
        }

        $output = array(
            "draw" => $_REQUEST['draw'],
            "recordsTotal" => $this->M_barang_id->count_allid(),
            "recordsFiltered" => $this->M_barang_id->count_filteredid(),
            "data" => $data,
        );
        echo json_encode($output);
    }


    public function max_nota()
    {
        // header('Access-Control-Allow-Origin: *');
        // header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS");
        $data = $this->M_pembelian->where_max_nota()->row();
        //print_r($this->db->last_query());
        $json['maxs'] = @$data->maxs;
        echo json_encode($json);
    }

    public function tampil_nama($id)
    {
        $data = $this->M_penjualan->get_by_id($id);
        echo json_encode($data);
    }

    public function view_barang($id)
    {
        $data = $this->M_penjualan->get_by_barang($id);
        echo json_encode($data);
    }
}
