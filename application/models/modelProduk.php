<?php
defined('BASEPATH') or exit('No direct script access allowed');

class modelProduk extends CI_Model
{
    public function getAll()
    {
		return $this->db->get('produk')->result_array();
    }

}
?>