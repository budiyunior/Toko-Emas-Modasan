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

     public function save_pelanggan()
     {
         $post = $this->input->post();
         $this->fc_kdpel = $post['fc_kdpel'];
         $this->fv_nmpelanggan = $post['fv_nmpelanggan'];
         $this->f_alamat = $post['f_alamat'];
         $this->fc_telp = $post['fc_telp'];
         $this->fc_noktp = $post['fc_noktp'];
         $this->f_keterangan = $post['f_keterangan'];
        

         $this->db->insert($this->tabel, $this);
     }
}
