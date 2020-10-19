<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_barang extends CI_Model
{
    private $tabel = "tm_stock";
    private $tbsales = "t_sales";
    private $tbkelompok = "tm_kelompok";
    private $tblokasi = "tm_lokasi";

    public function get_barang()
    {
        return $this->db->get($this->tabel)->result();
    }

    public function get_sales()
    {
        return $this->db->get($this->tbsales)->result();
    }

    public function get_by_id($id)
    {
        $this->db->where('fn_id', $id);
        return $this->db->get('tm_stock')->row();
    }


    public function get_lokasi()
    {
        return $this->db->get($this->tblokasi)->result();
    }
    public function get_kelompok()
    {
        return $this->db->get($this->tbkelompok)->result();
    }

    public function save_barang()
    {
        $post = $this->input->post();
        $this->fd_date = $post['fd_date'];
        // $this->fc_barcode = $post['fc_barcode'];
        $this->fc_kdstock = $post['fc_kdstock'];
        $this->fv_nmbarang = $post['fv_nmbarang'];
        $this->fc_kdkelompok = $post['fc_kdkelompok'];
        $this->fc_kdlokasi = $post['fc_kdlokasi'];
        $this->fc_salesid = $post['fc_salesid'];
        $this->ff_berat = $post['ff_berat'];
        $this->fc_kadar = $post['fc_kadar'];
        $this->fm_ongkos = $post['fm_ongkos'];
        $this->fm_hargabeli = $post['fm_hargabeli'];
        $this->fm_hargajual = $post['fm_hargajual'];
        $this->f_foto = $this->uploadImage();
        $this->fc_sts = $post['fc_sts'];  

        $this->db->insert($this->tabel, $this);
    }

    public function save_namakelompok()
    {
        $post = $this->input->post();
        $this->fv_nmkelompok = $post['fv_nmkelompok'];
        
        $this->db->insert($this->tbkelompok, $this);
    }

    private function uploadImage()
    {
        $config['upload_path'] = './assets/img/foto_barang/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $nama_lengkap = $_FILES['f_foto']['name'];
        $config['file_name'] = $nama_lengkap;
        $config['overwrite'] = true;
        $config['max_size'] = 10240;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('f_foto')) {
            return $this->upload->data("file_name");
        }

        print_r($this->upload->display_errors());
    }

    public function update_barang()
    {
        $post = $this->input->post();
        $this->fd_date = $post['fd_date'];
        // $this->fc_barcode = $post['fc_barcode'];
        $this->fc_kdstock = $post['fc_kdstock'];
        $this->fv_nmbarang = $post['fv_nmbarang'];
        $this->fc_kdkelompok = $post['fc_kdkelompok'];
        $this->fc_kdlokasi = $post['fc_kdlokasi'];
        $this->fc_salesid = $post['fc_salesid'];
        $this->ff_berat = $post['ff_berat'];
        $this->fc_kadar = $post['fc_kadar'];
        $this->fm_ongkos = $post['fm_ongkos'];
        $this->fm_hargabeli = $post['fm_hargabeli'];
        $this->fm_hargajual = $post['fm_hargajual'];
        $this->f_foto = $this->uploadImage();
        $this->fc_sts = $post['fc_sts'];  

        $this->db->insert($this->tabel, $this);
    }

}

