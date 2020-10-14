<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pelanggan extends CI_Model
{
    private $tabel = "tm_pelanggan";

    public function get_pelanggan()
    {
        return $this->db->get($this->tabel)->result();
    }

    public function get()
    {
        $this->db->select('*');
        $this->db->from('tm_pelanggan');
        $query = $this->db->get()->result();
        return $query;
    }

    // public function save_sales()
    // {
    //     $post = $this->input->post();
    //     $this->fc_salesid = $post['fc_salesid'];
    //     $this->fv_nama = $post['fv_nama'];
    //     $this->fc_email = $post['fc_email'];
    //     $this->fc_hp = $post['fc_hp'];
    //     $this->fc_aktif = $post['fc_aktif'];
    //     $this->fd_tgllahir = $post['fd_tgllahir'];
    //     $this->fc_kdposisi = $post['fc_kdposisi'];

    //     $this->db->insert($this->tabel, $this);
    // }
}
