<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_barang extends CI_Model
{
    private $tabel = "tm_stock";
    private $tbsales = "t_sales";
    private $tbkelompok = "tm_kelompok";
    private $tblokasi = "tm_lokasi";

    public function delete($id)
    {
        $this->db->where('fn_id', $id);
        $this->db->delete('tm_stock');
    }

    public function get_barang_all($limit, $start)
    {
        $this->db->select('*');
        $this->db->from('tm_stock', 'tm_kelompok', 'tm_lokasi', 't_sales');
        $this->db->join('tm_kelompok', 'tm_kelompok.fc_kdkelompok = tm_stock.fc_kdkelompok');
        $this->db->join('tm_lokasi', 'tm_lokasi.fc_kdlokasi = tm_stock.fc_kdlokasi');
        $this->db->join('t_sales', 't_sales.fc_salesid = tm_stock.fc_salesid');
        $query = $this->db->get('', $limit, $start);
        return $query->result();
    }

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

    public function list_barang($limit, $start)
    {
        // $kadar = $this->input->post('fc_kadar');
        // $kelompok = $this->input->post('fc_kdkelompok');
        // $lokasi = $this->input->post('fc_kdlokasi');
        $query = $this->db->get('tm_stock', $limit, $start);
        return $query->result();
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
        $this->fn_stock = $post['fn_stock'];

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
        $this->fn_id = $post['fn_id_edit'];
        $this->fd_date = $post['fd_date_edit'];
        // $this->fc_barcode = $post['fc_barcode'];
        $this->fc_kdstock = $post['fc_kdstock_edit'];
        $this->fv_nmbarang = $post['fv_nmbarang_edit'];
        $this->fc_kdkelompok = $post['fc_kdkelompok_edit'];
        $this->fc_kdlokasi = $post['fc_kdlokasi_edit'];
        $this->fc_salesid = $post['fc_salesid_edit'];
        $this->ff_berat = $post['ff_berat_edit'];
        $this->fc_kadar = $post['fc_kadar_edit'];
        $this->fm_ongkos = $post['fm_ongkos_edit'];
        $this->fm_hargabeli = $post['fm_hargabeli_edit'];
        $this->fm_hargajual = $post['fm_hargajual_edit'];
        if (!empty($_FILES["f_foto"]["name"])) {
            $this->f_foto = $this->uploadImage();
        } else {
            $this->f_foto = $post["f_foto_edit"];
        }
        $this->fc_sts = $post['fc_sts_edit'];
        $this->fn_stock = $post['fn_stock_edit'];
        $this->db->update($this->tabel, $this, array('fn_id' => $post['fn_id_edit']));
    }

    public function save_kelompok()
    {
        $post = $this->input->post();
        $this->fc_kdkelompok = $post['fc_kdkelompok'];
        $this->fv_nmkelompok = $post['fv_nmkelompok'];
        $this->db->insert($this->tbkelompok, $this);
    }

    public function save_lokasi()
    {
        $post = $this->input->post();
        $this->fc_kdlokasi = $post['fc_kdlokasi'];
        $this->fv_nmlokasi = $post['fv_nmlokasi'];
        $this->db->insert($this->tblokasi, $this);
    }

    public function getRole($id_admin, $spesifik, $idmenu)
    {
        $this->db->select($spesifik . ' as r');
        $this->db->where('fc_userid', $id_admin);
        $this->db->where('id_menu', $idmenu);
        // $this->db->where('password', $password);
        return $this->db->get('tab_akses_mainmenu')->result()[0];
        //  var_dump($this->db->last_query());die;
        //  return

    }
    public function filter($limit, $start)
    {
        $post = $this->input->get('refresh');
        $kadar = $this->input->get('fc_kadar');
        if (isset($kadar)) {
            //$kadar = $this->input->get('fc_kadar');
            $this->db->get_where('tm_stock', array('fc_kadar' => $kadar), $limit, $start);
        } else if ($this->input->post('refresh')) {
            $kelompok = $this->input->get('fc_kdkelompok');
            $this->db->get_where('tm_stock', array('fc_kdkelompok' => $kelompok), $limit, $start);
        }
        $lokasi = $this->input->get('fc_kdlokasi');
        if ($lokasi) {
            $this->db->where('fc_kdlokasi', $lokasi);
        }
        return $this->db->get('tm_stock', $limit, $start)->result();
        // $query = $this->db->get_where('tm_stock', array('fc_kadar' => $kadar, 'fc_kdkelompok' => $kelompok, 'fc_kdlokasi' => $lokasi), $limit, $start);
        // return $query->result();
    }

    public function filternew($limit, $start)
    {
        $kadar = $this->input->get('fc_kadar');
        $kelompok = $this->input->get('fc_kdkelompok');
        $lokasi = $this->input->get('fc_kdlokasi');
        $query = $this->db->get_where('tm_stock', array('fc_kadar' => $kadar, 'fc_kdkelompok' => $kelompok, 'fc_kdlokasi' => $lokasi), $limit, $start);
        return $query->result();
    }

    // public function filter2($limit, $start)
    // {
    //     if ($kadar = $this->input->get('fc_kadar')) {
    //         $query = $this->db->get_where('tm_stock', array('fc_kadar' => $kadar), $limit, $start);
    //         return $query->result();
    //     } else {
    //         $query = $this->db->get('tm_stock', $limit, $start);
    //         return $query->result();
    //     }
    //     if ($kelompok = $this->input->get('fc_kdkelompok')) {
    //         $query = $this->db->get_where('tm_stock', array('fc_kdkelompok' => $kelompok), $limit, $start);
    //         return $query->result();
    //     } else {
    //         $query = $this->db->get('tm_stock', $limit, $start);
    //         return $query->result();
    //     }
    //     if ($kelompok = $this->input->get('fc_kdkelompok')) {
    //         $query = $this->db->get_where('tm_stock', array('fc_kdkelompok' => $kelompok), $limit, $start);
    //         return $query->result();
    //     } else {
    //         $query = $this->db->get('tm_stock', $limit, $start);
    //         return $query->result();
    //     }
    //     $kadar = $this->input->get('fc_kadar');
    //     $kelompok = $this->input->get('fc_kdkelompok');
    //     $lokasi = $this->input->get('fc_kdlokasi');
    //     $query = $this->db->get_where('tm_stock', array('fc_kadar' => $kadar, 'fc_kdkelompok' => $kelompok, 'fc_kdlokasi' => $lokasi), $limit, $start);
    //     return $query->result();
    // }

    // public function filter3($limit, $start)
    // {
    //     if ($kelompok = $this->input->get('fc_kdkelompok')) {
    //         $query = $this->db->get_where('tm_stock', array('fc_kdkelompok' => $kelompok), $limit, $start);
    //         return $query->result();
    //     } else {
    //         $query = $this->db->get('tm_stock', $limit, $start);
    //         return $query->result();
    //     }
    // }

    // public function filter4($limit, $start)
    // {
    //     if ($lokasi = $this->input->get('fc_kdlokasi')) {
    //         $query = $this->db->get_where('tm_stock', array('fc_kdlokasi' => $lokasi), $limit, $start);
    //         return $query->result();
    //     } else {
    //         $query = $this->db->get('tm_stock', $limit, $start);
    //         return $query->result();
    //     }
    // }

    public function getMenu($menu)
    {
        $this->db->where('link_menu', $menu);
        return $this->db->get('mainmenu')->row();
    }
}
