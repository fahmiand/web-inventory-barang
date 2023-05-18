<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Toko_model extends CI_Model
{
    public function getToko()
    {
        $query = "SELECT `barang_keluar`.*, `toko`.`nama_toko`
                    FROM `barang_keluar` JOIN `toko`
                      ON `barang_keluar`.`toko_id` = `toko`.`id`
        ";

        return $this->db->query($query)->result_array();
    }
}
