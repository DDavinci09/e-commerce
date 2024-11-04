<?php
defined('BASEPATH') or exit('No direct script access allowed');

class modelAlumni extends CI_Model
{
  public function getAll()
  {
		return $this->db->get('alumni')->result_array();
  }
  
  public function getApprove()
  {
    return $this->db->where('status', 'Approve')->get('alumni')->result_array();
  }

  public function getDecline()
  {
    return $this->db->where('status', 'Decline')->get('alumni')->result_array();
  }

  public function getidAlumni($id_alumni)
  {
    return $this->db->get_where('alumni', ['id_alumni' => $id_alumni])->row_array();
  }

  // Model (modelAlumni.php)
  public function editAlumni($id_alumni)
  {
      // Ambil data lama dari database
      $existing_data = $this->db->get_where('alumni', ['id_alumni' => $id_alumni])->row_array();

      // Gunakan data lama jika tidak ada input baru
      $data = [
          'nama' => $this->input->post('nama', true),
          'nama_toko' => $this->input->post('nama_toko', true),
          'keterangan_toko' => $this->input->post('keterangan_toko', true),
          'alamat_toko' => $this->input->post('alamat_toko', true),
          'id_provinsi' => $this->input->post('id_provinsi') ?: $existing_data['id_provinsi'],
          'nama_provinsi' => $this->input->post('nama_provinsi') ?: $existing_data['nama_provinsi'],
          'id_kota' => $this->input->post('id_kota') ?: $existing_data['id_kota'],
          'nama_kota' => $this->input->post('nama_kota') ?: $existing_data['nama_kota'],
          'no_telp' => $this->input->post('no_telp', true),
          'no_rekening' => $this->input->post('no_rekening', true),
          'email' => $this->input->post('email', true)
      ];

      // Update database berdasarkan ID alumni
      $this->db->where('id_alumni', $id_alumni);
      $this->db->update('alumni', $data);
  }

}