<?php
defined('BASEPATH') or exit('No direct script access allowed');

class modelKategori extends CI_Model
{
    public function getAll()
    {
		return $this->db->get('kategori')->result_array();
    }

}
?>