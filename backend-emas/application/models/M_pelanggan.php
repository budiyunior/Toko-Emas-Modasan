<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pelanggan extends CI_Model
{
    private $tabel = "tm_pelanggan";

    function list_pelanggan($limit, $start)
    {
        $query = $this->db->get('tm_pelanggan', $limit, $start);
        return $query;
    }

    // public function get_pelanggan()
    // {
    //     return $this->db->get($this->tabel)->result();
    // }

    // public function get()
    // {
    //     $this->db->select('*');
    //     $this->db->from('tm_pelanggan');
    //     $query = $this->db->get()->result();
    //     return $query;
    // }

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
    
    public function update_pelanggan()
    {
        $post = $this->input->post();
        $this->fc_salesid = $post['fc_kdpel'];
        $this->fv_nama = $post['fv_nmpelanggan'];
        $this->fc_email = $post['f_alamat'];
        $this->fc_hp = $post['fc_telp'];
        $this->fc_aktif = $post['fc_aktif'];
        $this->fd_tgllahir = $post['fc_noktp'];
        $this->fc_kdposisi = $post['f_keterangan'];

        $this->db->update($this->tabel, $this, array('fc_salesid' => $post['fc_salesid']));
    }
    
    public function delete($id)
    {
        $this->db->where('fc_kdpel', $id);
        $this->db->delete('tm_pelanggan');
    }
}
