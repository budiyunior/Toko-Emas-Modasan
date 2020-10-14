<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_sales extends CI_Model
{
    private $tabel = "t_sales";

    public function rules()
    {
        return [
            [
                'field' => 'fc_salesid',
                'label' => 'Id Sales',
                'rules' => 'required'
            ],

        ];
    }

    public function get_sales()
    {
        return $this->db->get($this->tabel)->result();
    }

    // public function get()
    // {
    //     $this->db->select('*');
    //     $this->db->from('t_sales');
    //     $this->db->join('tm_posisi', 'tm_posisi.fc_kdposisi = t_sales.fc_kdposisi');
    //     $query = $this->db->get();
    //     return $query;
    // }

    public function get()
    {
        $this->db->select('*');
        $this->db->from('t_sales', 'tm_posisi');
        $this->db->join('tm_posisi', 'tm_posisi.fc_kdposisi = t_sales.fc_kdposisi');
        $query = $this->db->get()->result();
        return $query;
    }

    public function save_sales()
    {
        $post = $this->input->post();
        $this->fc_salesid = $post['fc_salesid'];
        $this->fv_nama = $post['fv_nama'];
        $this->fc_email = $post['fc_email'];
        $this->fc_hp = $post['fc_hp'];
        $this->fc_aktif = $post['fc_aktif'];
        $this->fd_tglaktif = $post['fd_tglaktif'];
        $this->fd_tgllahir = $post['fd_tgllahir'];
        $this->fc_kdposisi = $post['fc_kdposisi'];

        $this->db->insert($this->tabel, $this);
    }
}