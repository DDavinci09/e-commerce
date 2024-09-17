<?php
defined('BASEPATH') or exit('No direct script access allowed');

class modelProduk extends CI_Model
{
  public function getAll()
  {
    return $this->db->get('produk')->result_array();
  }

  public function getProdukAdmin()
  {
    $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori');
    $this->db->join('alumni', 'produk.id_alumni = alumni.id_alumni');
    $this->db->group_by('produk.id_produk');

    return $this->db->get('produk')->result_array();
  }

  public function getProdukAlumni()
  {
    $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori');
    $this->db->join('alumni', 'produk.id_alumni = alumni.id_alumni');
    $this->db->where(['produk.id_alumni' => $this->session->userdata('id_alumni')]);
    $this->db->group_by('produk.id_produk');

    return $this->db->get('produk')->result_array();
  }

  public function getidProduk($id_produk)
  {
    return $this->db->get_where('produk', ['id_produk' => $id_produk])->row_array();
  }

  public function tambah()
  {
    $data = [
      "id_alumni" => $this->input->post('id_alumni', true),
      "id_kategori" => $this->input->post('id_kategori', true),
      "nama_produk" => $this->input->post('nama_produk', true),
      "jenis_produk" => $this->input->post('jenis_produk', true),
      "keterangan_produk" => $this->input->post('keterangan_produk', true),
      "stok_produk" => $this->input->post('stok_produk', true),
      "harga_produk" => $this->input->post('harga_produk', true),
      "diskon_produk" => $this->input->post('diskon_produk', true),
      "rating_produk" => 0
    ];

    $this->db->insert('produk', $data);
  }

  public function tambahfile($file)
  {
    $data = [
      "id_alumni" => $this->input->post('id_alumni', true),
      "id_kategori" => $this->input->post('id_kategori', true),
      "nama_produk" => $this->input->post('nama_produk', true),
      "jenis_produk" => $this->input->post('jenis_produk', true),
      "keterangan_produk" => $this->input->post('keterangan_produk', true),
      "stok_produk" => $this->input->post('stok_produk', true),
      "harga_produk" => $this->input->post('harga_produk', true),
      "diskon_produk" => $this->input->post('diskon_produk', true),
      "rating_produk" => 0,
      "image" => $file['file_name']
    ];

    $this->db->insert('produk', $data);
  }

  public function edit()
  {
    $data = [
      "id_alumni" => $this->input->post('id_alumni', true),
      "id_kategori" => $this->input->post('id_kategori', true),
      "nama_produk" => $this->input->post('nama_produk', true),
      "jenis_produk" => $this->input->post('jenis_produk', true),
      "keterangan_produk" => $this->input->post('keterangan_produk', true),
      "stok_produk" => $this->input->post('stok_produk', true),
      "harga_produk" => $this->input->post('harga_produk', true),
      "diskon_produk" => $this->input->post('diskon_produk', true)
    ];

    $this->db->where('id_produk', $this->input->post('id_produk'));
    $this->db->update('produk', $data);
  }

  public function editfile($file)
  {
    $data = [
      "id_alumni" => $this->input->post('id_alumni', true),
      "id_kategori" => $this->input->post('id_kategori', true),
      "nama_produk" => $this->input->post('nama_produk', true),
      "jenis_produk" => $this->input->post('jenis_produk', true),
      "keterangan_produk" => $this->input->post('keterangan_produk', true),
      "stok_produk" => $this->input->post('stok_produk', true),
      "harga_produk" => $this->input->post('harga_produk', true),
      "diskon_produk" => $this->input->post('diskon_produk', true),
      "image" => $file['file_name']
    ];

    $this->db->where('id_produk', $this->input->post('id_produk'));
    $this->db->update('produk', $data);
  }

  public function hapus($id_produk)
  {
    $this->db->delete('produk', ['id_produk' => $id_produk]);
  }

}