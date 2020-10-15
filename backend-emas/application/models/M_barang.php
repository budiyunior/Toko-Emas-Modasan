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

    public function save_barang()
    {
        $post = $this->input->post();
        $this->fn_id = $post['fn_id'];
        $this->fd_date = $post['fc_barcode'];
    }
}
