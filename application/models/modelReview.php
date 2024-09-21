<?php
defined('BASEPATH') or exit('No direct script access allowed');

class modelReview extends CI_Model
{    
  public function getAll()
  {
    $this->db->order_by('id_pesanan', 'DESC');
    return $this->db->get('pesanan')->result_array();
  }
  
  public function getReviewUser($id_produk)
  {
    // Bergabung dengan tabel review, produk, dan user
    $this->db->join('produk', 'review.id_produk = produk.id_produk');
    $this->db->join('user', 'review.id_user = user.id_user');    
    $this->db->where(['review.id_produk' => $id_produk]);
    $this->db->where(['review.id_user' => $this->session->userdata('id_user')]);
    
    return $this->db->get('review')->row_array();
  }
  
  public function getProdukReview($id_produk)
  {
    // Bergabung dengan tabel review, produk, dan user
    $this->db->join('produk', 'review.id_produk = produk.id_produk');
    $this->db->join('user', 'review.id_user = user.id_user');    
    $this->db->where(['review.id_produk' => $id_produk]);
    
    return $this->db->get('review')->result_array();
  }
  
  public function tambah($id_produk)
  {
    $data = [
      "id_produk" => $id_produk,
      "id_user" => $this->input->post('id_user', true),
      "isi_review" => $this->input->post('isi_review', true),
      "rating_review" => $this->input->post('rating_review', true),
      "tgl_review" => date('Y-m-d H:i:s')
    ];
    
    $this->db->insert('review', $data);
  }

  public function hapus($id_produk)
  {
    $this->db->delete('produk', ['id_produk' => $id_produk]);
  }

}