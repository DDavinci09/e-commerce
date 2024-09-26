<?php
defined('BASEPATH') or exit('No direct script access allowed');

class modelKategori extends CI_Model
{
  public function getAll2()
  {
    $this->db->order_by('id_kategori', 'DESC');
    return $this->db->get('kategori')->result_array();
  }
  
  public function getAll()
  {
    // Mengambil kategori beserta jumlah produk
    $this->db->select('kategori.id_kategori, kategori.nama_kategori, kategori.keterangan_kategori, COUNT(produk.id_produk) as total_produk');
    $this->db->from('kategori');
    $this->db->join('produk', 'produk.id_kategori = kategori.id_kategori', 'left'); // Menggunakan LEFT JOIN
    $this->db->group_by('kategori.id_kategori'); // Mengelompokkan berdasarkan kategori
    $query = $this->db->get();
    return $query->result_array(); // Mengembalikan hasil sebagai array
  }
  
  public function getAllKategoriAlumni()
  {
      // Mengambil kategori beserta jumlah produk untuk alumni tertentu
      $this->db->select('kategori.id_kategori, kategori.nama_kategori, kategori.keterangan_kategori, COUNT(produk.id_produk) as total_produk');
      $this->db->from('kategori');
      
      // Menghubungkan tabel produk dengan kategori
      $this->db->join('produk', 'produk.id_kategori = kategori.id_kategori', 'left'); // Menggunakan LEFT JOIN
      
      // Menghubungkan tabel alumni dengan produk
      $this->db->join('alumni', 'produk.id_alumni = alumni.id_alumni', 'left'); // Menggunakan LEFT JOIN
      
      // Menyaring berdasarkan id_alumni dari session
      $this->db->where('alumni.id_alumni', $this->session->userdata('id_alumni'));
      
      // Mengelompokkan hasil berdasarkan id_kategori
      $this->db->group_by('kategori.id_kategori'); 
      
      // Menjalankan query
      $query = $this->db->get();
      
      // Mengembalikan hasil sebagai array
      return $query->result_array(); 
  }

  public function getidKategori($id_kategori)
  {
    return $this->db->get_where('kategori', ['id_kategori' => $id_kategori])->row_array();
  }

  public function tambah()
  {
    $data = [
      "nama_kategori" => $this->input->post('nama_kategori', true),
      "keterangan_kategori" => $this->input->post('keterangan_kategori', true)
    ];

    $this->db->insert('kategori', $data);
  }

  public function edit()
  {
    $data = [
      "nama_kategori" => $this->input->post('nama_kategori', true),
      "keterangan_kategori" => $this->input->post('keterangan_kategori', true)
    ];

    $this->db->where('id_kategori', $this->input->post('id_kategori'));
    $this->db->update('kategori', $data);
  }

  public function hapus($id_kategori)
  {
    $this->db->delete('kategori', ['id_kategori' => $id_kategori]);
  }

}