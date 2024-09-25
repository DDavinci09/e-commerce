<?php
defined('BASEPATH') or exit('No direct script access allowed');

class modelUser extends CI_Model
{
  // Proses Login
  public function loginAdmin($username) 
  {
    $this->db->where('username', $username);
    return $this->db->get('admin')->row_array();
  }
  
  public function loginAlumni($username) 
  {
    $this->db->where('username', $username);
    return $this->db->get('alumni')->row_array();
  }
  
  public function loginUser($username) 
  {
    $this->db->where('username', $username);
    return $this->db->get('user')->row_array();
  }
  
  public function getAll()
  {
    return $this->db->get('user')->result_array();
  }

}