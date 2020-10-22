<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_lapembelian extends CI_Model
{
    function list_pelanggan($limit, $start)
    {
        $query = $this->db->get('tm_invoice', $limit, $start);
        return $query;
    }
}
