<?php
defined('BASEPATH') or exit('No direct script access allowed');

class modelAlumni extends CI_Model
{
    public function getAll()
    {
		return $this->db->get('alumni')->result_array();
    }

}
?>