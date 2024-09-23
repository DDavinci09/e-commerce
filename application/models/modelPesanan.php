<?php
defined('BASEPATH') or exit('No direct script access allowed');

class modelPesanan extends CI_Model
{    
  private function hitungDiskon($harga_asli, $diskon) 
  {
    return $harga_asli - ($harga_asli * ($diskon / 100));
  }
  
  public function getAll()
  {
    $this->db->order_by('id_pesanan', 'DESC');
    return $this->db->get('pesanan')->result_array();
  }

  // Data Pesanan Admin
  public function getAdminBelumBayar()
  {
    return $this->db->where('status_bayar', 'Belum Bayar')->get('pesanan')->result_array();
  }
  
  public function getAdminLunas()
  {
    return $this->db->where('status_bayar', 'Lunas')->get('pesanan')->result_array();
  }
  
  public function getAdminDiproses()
  {
    return $this->db->where('status_pesanan', 'Diproses')->get('pesanan')->result_array();
  }
  
  public function getAdminSelesai()
  {
    return $this->db->where('status_pesanan', 'Selesai')->get('pesanan')->result_array();
  }
  
  public function getAdminDibatalkan()
  {
    return $this->db->where('status_pesanan', 'Dibatalkan')->get('pesanan')->result_array();
  }
  // End Data Pesanan Admin
  
  // Data Pesanan Alumni
  public function getAlumniBelumBayar()
  {
    $this->db->where(['pesanan.id_alumni' => $this->session->userdata('id_alumni')]);
    return $this->db->where('status_bayar', 'Belum Bayar')->get('pesanan')->result_array();
  }
  
  public function getAlumniLunas()
  {
    $this->db->where(['pesanan.id_alumni' => $this->session->userdata('id_alumni')]);
    return $this->db->where('status_bayar', 'Lunas')->get('pesanan')->result_array();
  }
  
  public function getAlumniDiproses()
  {
    $this->db->where(['pesanan.id_alumni' => $this->session->userdata('id_alumni')]);
    return $this->db->where('status_pesanan', 'Diproses')->get('pesanan')->result_array();
  }
  
  public function getAlumniSelesai()
  {
    $this->db->where(['pesanan.id_alumni' => $this->session->userdata('id_alumni')]);
    return $this->db->where('status_pesanan', 'Selesai')->get('pesanan')->result_array();
  }
  
  public function getAlumniDibatalkan()
  {
    $this->db->where(['pesanan.id_alumni' => $this->session->userdata('id_alumni')]);
    return $this->db->where('status_pesanan', 'Dibatalkan')->get('pesanan')->result_array();
  }
  // End Data Pesanan Alumni
  
  public function getPesananAdmin()
  {
    $this->db->join('produk', 'pesanan.id_produk = produk.id_produk');
    $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori');
    $this->db->join('alumni', 'pesanan.id_alumni = alumni.id_alumni');
    $this->db->join('user', 'pesanan.id_user = user.id_user');
    $this->db->group_by('pesanan.id_pesanan');
    $this->db->order_by('id_pesanan', 'DESC');

    return $this->db->get('pesanan')->result_array();
  }

  public function getPesananAlumni()
  {
    $this->db->join('produk', 'pesanan.id_produk = produk.id_produk');
    $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori');
    $this->db->join('alumni', 'pesanan.id_alumni = alumni.id_alumni');
    $this->db->join('user', 'pesanan.id_user = user.id_user');
    $this->db->where(['pesanan.id_alumni' => $this->session->userdata('id_alumni')]);
    $this->db->group_by('pesanan.id_pesanan');
    $this->db->order_by('id_pesanan', 'DESC');

    return $this->db->get('pesanan')->result_array();
  }
  
  public function getPesananUser()
  {
    $this->db->join('produk', 'pesanan.id_produk = produk.id_produk');
    $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori');
    $this->db->join('alumni', 'pesanan.id_alumni = alumni.id_alumni');
    $this->db->join('user', 'pesanan.id_user = user.id_user');
    $this->db->where(['pesanan.id_user' => $this->session->userdata('id_user')]);
    $this->db->group_by('pesanan.id_pesanan');
    $this->db->order_by('id_pesanan', 'DESC');

    return $this->db->get('pesanan')->result_array();
  }
  
  public function getidPesanan($id_pesanan)
  {
    $this->db->join('produk', 'pesanan.id_produk = produk.id_produk');
    $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori');
    $this->db->join('alumni', 'pesanan.id_alumni = alumni.id_alumni');
    $this->db->join('user', 'pesanan.id_user = user.id_user');
    $this->db->group_by('pesanan.id_pesanan');
    
    $pesanan = $this->db->get_where('pesanan', ['id_pesanan' => $id_pesanan])->row_array();

    // Jika produk ditemukan, hitung harga diskon
    if (!empty($pesanan)) {
        $pesanan['harga_diskon'] = $this->hitungDiskon($pesanan['harga_produk'], $pesanan['diskon_produk']);
    }

      return $pesanan;
  }
  
  public function getidPesananAdmin($id_pesanan)
  {
    $this->db->join('produk', 'pesanan.id_produk = produk.id_produk');
    $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori');
    $this->db->join('alumni', 'pesanan.id_alumni = alumni.id_alumni');
    $this->db->join('user', 'pesanan.id_user = user.id_user');
    $this->db->group_by('pesanan.id_pesanan');
    
    return $this->db->get_where('pesanan', ['id_pesanan' => $id_pesanan])->row_array();
  }

  public function editStatusPembayaran()
  {
    $data = [
      "status_bayar" => $this->input->post('status_bayar', true)
    ];

    $this->db->where('id_pesanan', $this->input->post('id_pesanan'));
    $this->db->update('pesanan', $data);
  }
  
  public function editStatusPesanan()
  {
    $data = [
      "status_pesanan" => $this->input->post('status_pesanan', true)
    ];

    $this->db->where('id_pesanan', $this->input->post('id_pesanan'));
    $this->db->update('pesanan', $data);
  }

  public function tambah($dataPesanan)
  {
    $this->db->insert('pesanan', $dataPesanan);
  }

  public function hapus($id_produk)
  {
    $this->db->delete('produk', ['id_produk' => $id_produk]);
  }

}