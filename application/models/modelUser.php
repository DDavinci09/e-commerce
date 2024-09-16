<?php
defined('BASEPATH') or exit('No direct script access allowed');

class modelUser extends CI_Model
{
  public function getAll()
  {
    return $this->db->get('user')->result_array();
  }

  public function getSessionbyRole()
  {
    $username = $this->session->userdata('username');
    $role = $this->session->userdata('role');

    if ($role == 'Admin') {
      return $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
    } else if ($role == 'Alumni') {
      return $this->db->get_where('alumni', ['username' => $this->session->userdata('username')])->row_array();
    } else {
      return null;
    }
  }

}
?>