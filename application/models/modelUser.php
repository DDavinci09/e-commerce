<?php
defined('BASEPATH') or exit('No direct script access allowed');

class modelUser extends CI_Model
{
    public function getAll()
    {
		return $this->db->get('user')->result_array();
    }

}
?>