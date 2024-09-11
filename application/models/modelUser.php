<?php
defined('BASEPATH') or exit('No direct script access allowed');

class modelUser extends CI_Model
{
    public function getUsers()
    {
		return $this->db->get('users')->result_array();
    }

}

?>