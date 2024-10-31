<?php
defined('BASEPATH') or exit('No direct script access allowed');

class modelAdmin extends CI_Model
{
    // Rekening
    public function getallRekening()
    {
        return $this->db->get('rekening')->result_array();
    }
    
    public function getRekeningAktif()
    {
        $this->db->where('status', 'Aktif');
        return $this->db->get('rekening')->result_array();
    }
    
    public function getidRekening($id_rekening)
    {
        return $this->db->get_where('rekening', ['id_rekening' => $id_rekening])->row_array();
    }
    
    public function tambahRekening()
    {
        $data = [
            "nama_bank" => $this->input->post('nama_bank', true),
            "no_rekening" => $this->input->post('no_rekening', true),
            "status" => "Aktif"
        ];

        $this->db->insert('rekening', $data);
    }
    
    public function editRekening($id_rekening)
    {
        $data = [
            "nama_bank" => $this->input->post('nama_bank', true),
            "no_rekening" => $this->input->post('no_rekening', true)
        ];

        $this->db->where('id_rekening', $id_rekening);
        $this->db->update('rekening', $data);
    }

    public function hapusRekening($id_rekening)
    {
        $this->db->delete('rekening', ['id_rekening' => $id_rekening]);
    }


    // Kontak
    public function getKontak() {
        return $this->db->get_where('kontak')->row_array();
    }

    public function getKontakById($id_kontak) {
        return $this->db->get_where('kontak', ['id_kontak' => $id_kontak])->row_array();
    }

    public function updateKontak($id_kontak, $data) {
        $this->db->update('kontak', $data, ['id_kontak' => $id_kontak]);
    }

    // Profile
    public function getProfile() {
        return $this->db->get_where('profil')->row_array();
    }

    public function getProfileById($id_profil) {
        return $this->db->get_where('profil', ['id_profil' => $id_profil])->row_array();
    }

    public function updateProfile($id_profil, $data)
{
    $this->db->where('id_profil', $id_profil);
    $this->db->update('profil', $data);
}

// banner
public function getallBanner()
    {
        return $this->db->get('banner')->result_array();
    }

    public function getBannerAktif()
    {
        $this->db->where('status', 'Aktif');
        return $this->db->get('banner')->result_array();
    }

    public function tambahBanner($data)
  {
    $this->db->insert('banner', $data);
  }

  public function getidBanner($id_banner)
    {
        return $this->db->get_where('banner', ['id_banner' => $id_banner])->row_array();
    }

    public function hapusBanner($id_banner)
    {
        $this->db->delete('banner', ['id_banner' => $id_banner]);
    }

}