<?php
defined('BASEPATH') or exit('No direct script access allowed');

class modelAlumni extends CI_Model
{
  public function getAll()
  {
		return $this->db->get('alumni')->result_array();
  }

  public function getidAlumni($id_alumni)
  {
    return $this->db->get('alumni', ['id_alumni' => $id_alumni])->row_array();
  }
}