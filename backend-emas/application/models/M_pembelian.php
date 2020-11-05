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
	
	public function get_by_id2($id)
    {
		$this->db->where('fc_noinv', $id);
		$this->db->join('tm_pelanggan','tm_invoice.fc_kdpel=tm_pelanggan.fc_kdpel','left outer');
        return $this->db->get('tm_invoice')->row();
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
        return $this->db->query('SELECT fc_nobeli AS maxs FROM t_belimst order by fc_nobeli desc limit 1 ');
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
	
	function get_list_penjualan(){
		$this->db->select('a.fc_noinv');
		$this->db->select('DATE_FORMAT(a.fd_tglinv, "%d-%m-%Y") as tanggal');
		$this->db->select('b.fv_nmpelanggan');
		$this->db->select('a.fm_grandtotal');
		$this->db->select('a.fc_sts');
		$this->db->join('tm_pelanggan b','a.fc_kdpel=b.fc_kdpel','left outer');
		$this->db->where('a.fc_sts',1);
		return $this->db->get('tm_invoice a')->result();
	}

	function get_list_penjualan_det($fc_noinv){
		$this->db->select('a.fc_noinv');
		$this->db->select('a.fc_kdstock');
		$this->db->select('b.fv_nmbarang');
		$this->db->select('a.fn_berat');
		$this->db->select('a.ff_kadar');
		$this->db->select('a.fm_price');
		$this->db->select('a.Id');
		$this->db->join('tm_stock b','a.fc_kdstock=b.fc_kdstock','left outer');
		$this->db->where('a.fc_noinv',$fc_noinv);
		return $this->db->get('td_invoice a')->result();
	}

	function insertdata($where){
		$this->db->insert('t_belimst',$where);
		return $this->db->insert_id();
	}
	
	function insertdata_detail($where){
		$this->db->insert('t_belidtl',$where);
		return $this->db->insert_id();
	}

	public function update_status($data1,$where) {
		$this->db->update('tm_invoice', $data1, $where);
		return $this->db->affected_rows();
	}
}
