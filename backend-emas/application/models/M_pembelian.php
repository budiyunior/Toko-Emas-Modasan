<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pembelian extends CI_Model
{
    private $tbinvoice = "tm_invoice";
    private $tbpelanggan = "tm_pelanggan";

    public function get_faktur()
    {
        return $this->db->get($this->tbinvoice)->result();
    }

    // public function get_by_id($id)
    // {
    //     $this->db->where('fc_noinv', $id);
    //     return $this->db->get('tm_invoice')->row();
    // }

    public function get_pelanggan_id($id)
    {
        $this->db->where('fc_kdpel', $id);
        return $this->db->get('tm_pelanggan')->row();
    }

    public function get_by_id($id)
    {
        $this->db->where('fc_kdpel', $id);
        return $this->db->get('tm_pelanggan')->row();
    }

    public function get_by_barang($id)
    {
        $this->db->where('fn_id', $id);
        return $this->db->get('tm_stock')->row_array();
    }

    function get_pelanggan()
    {
        return $this->db->get($this->tbpelanggan)->result();
    }

    public function ambilBarang()
    {
        $this->db->select('*');
        $this->db->from('tm_stock');
        $this->db->join('tm_lokasi', 'tm_stock.fc_kdlokasi=tm_lokasi.fc_kdlokasi', 'left outer');
        $this->db->join('tm_kelompok', 'tm_stock.fc_kdkelompok=tm_kelompok.fc_kdkelompok', 'left outer');
        $this->db->where('fc_sts', 1);

        $barang = $this->db->get();

        if ($barang->num_rows() > 0) {
            $json['status']     = 1;
            foreach ($barang->result() as $b) {
                $json['datanya'][] = $b;
            }
            $json['jumlah_barang'] = count($barang->result());
        } else {
            $json['status']     = 0;
        }

        echo json_encode($json);
    }

    function where_max_nota()
    {
        return $this->db->query('SELECT fc_noinv AS maxs FROM tm_invoice order by fc_noinv desc limit 1 ');
    }

    function get_sales()
    {
        return $this->db->get('t_sales')->result();
    }

    function insert($where)
    {
        $this->db->insert('tm_invoice', $where);
        return $this->db->insert_id();
    }

    function insert_detail($where)
    {
        $this->db->insert('td_invoice', $where);
        return $this->db->insert_id();
    }
}
