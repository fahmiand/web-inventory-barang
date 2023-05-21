<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Barang_model extends CI_Model
{
    public function getBarang($id)
    {
        return $this->db->get_where('barang_masuk', ['id' => $id])->row_array();
    }

    public function getBarangAll()
    {
        return $this->db->get('barang_masuk')->result_array();
    }

    public function getBarangAllOut()
    {
        return $this->db->get('barang_keluar')->result_array();
    }
}
