<?php
defined('BASEPATH') or exit('No direct script access allowed');

class modelPesanan extends CI_Model
{    
  public function getAll()
  {
    $this->db->order_by('id_pesanan', 'DESC');
    return $this->db->get('pesanan')->result_array();
  }
  
  public function getidProduk($id_produk)
  {
    // Join tabel dan ambil data produk
    $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori');
    $this->db->join('alumni', 'produk.id_alumni = alumni.id_alumni');
    $this->db->group_by('produk.id_produk');
    $produk = $this->db->get_where('produk', ['id_produk' => $id_produk])->row_array();
    
    // Jika produk ditemukan, hitung harga diskon
    if (!empty($produk)) {
        $produk['harga_diskon'] = $this->hitungDiskon($produk['harga_produk'], $produk['diskon_produk']);
    }
    
    return $produk;
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