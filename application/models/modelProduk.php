<?php
defined('BASEPATH') or exit('No direct script access allowed');

class modelProduk extends CI_Model
{
  private function hitungDiskon($harga_asli, $diskon) 
  {
    return $harga_asli - ($harga_asli * ($diskon / 100));
  }
    
  public function getAll()
  {
    $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori');
    $this->db->join('alumni', 'produk.id_alumni = alumni.id_alumni');
    $this->db->where('alumni.status', 'Approve');
    $this->db->order_by('id_produk', 'DESC');
    $query = $this->db->get('produk');
    $produkAll = $query->result_array();

      foreach ($produkAll as &$produk) {
          $produk['harga_diskon'] = $this->hitungDiskon($produk['harga_produk'], $produk['diskon_produk']);
      }

      return $produkAll;
  }
  
  public function cariProduk($keyword = null)
  {
    // Join dengan tabel kategori dan alumni
    $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori');
    $this->db->join('alumni', 'produk.id_alumni = alumni.id_alumni');
    
    // Filter hanya alumni dengan status 'Approve'
    $this->db->where('alumni.status', 'Approve');
    
    // Jika ada keyword, lakukan pencarian dengan LIKE
    if ($keyword) {
        $this->db->like('produk.nama_produk', $keyword);
        $this->db->or_like('produk.keterangan_produk', $keyword);
        $this->db->or_like('kategori.nama_kategori', $keyword);
    }

    // Urutkan berdasarkan ID produk secara menurun
    $this->db->order_by('produk.id_produk', 'DESC');
    
    // Ambil data produk dari database
    $query = $this->db->get('produk');
    $produkAll = $query->result_array();

    // Hitung diskon untuk setiap produk
    foreach ($produkAll as &$produk) {
        $produk['harga_diskon'] = $this->hitungDiskon($produk['harga_produk'], $produk['diskon_produk']);
    }

    return $produkAll;
  }
    
  public function getProdukterbaru($limit = 8)
  {
    $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori');
    $this->db->join('alumni', 'produk.id_alumni = alumni.id_alumni');
    $this->db->where('alumni.status', 'Approve');
    $this->db->order_by('create_at', 'DESC');
    $query = $this->db->get('produk', $limit);
    $produkTerbaru = $query->result_array();

      foreach ($produkTerbaru as &$produk) {
          $produk['harga_diskon'] = $this->hitungDiskon($produk['harga_produk'], $produk['diskon_produk']);
      }

      return $produkTerbaru;
  }
  
  public function getProdukdiskon($limit = 8)
  {
    $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori');
    $this->db->join('alumni', 'produk.id_alumni = alumni.id_alumni');
    $this->db->where('alumni.status', 'Approve');
    $this->db->where('diskon_produk >', 0);
    $this->db->order_by('diskon_produk', 'DESC');
    $query = $this->db->get('produk', $limit);
    $produkDiskon = $query->result_array();

      foreach ($produkDiskon as &$produk) {
          $produk['harga_diskon'] = $this->hitungDiskon($produk['harga_produk'], $produk['diskon_produk']);
      }

      return $produkDiskon;
  }

  public function getProdukteratas($limit = 8)
  {
    $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori');
    $this->db->join('alumni', 'produk.id_alumni = alumni.id_alumni');
    $this->db->where('alumni.status', 'Approve');
    $this->db->order_by('rating_produk', 'DESC');
    $query = $this->db->get('produk', $limit);
    $produkTerbaru = $query->result_array();

      foreach ($produkTerbaru as &$produk) {
          $produk['harga_diskon'] = $this->hitungDiskon($produk['harga_produk'], $produk['diskon_produk']);
      }

      return $produkTerbaru;
  }
  
  public function getProdukbarudibeli($limit = 8)
{
    $this->db->join('produk', 'pesanan.id_produk = produk.id_produk');
    $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori');
    $this->db->join('alumni', 'pesanan.id_alumni = alumni.id_alumni');
    $this->db->join('user', 'pesanan.id_user = user.id_user');
    $this->db->where('alumni.status', 'Approve');
    $this->db->where(['pesanan.id_user' => $this->session->userdata('id_user')]);
    $this->db->where('pesanan.status_pesanan', 'Selesai');
    $this->db->group_by('produk.id_produk');
    $this->db->order_by('produk.id_produk', 'DESC');
    
    // Ambil data dengan limit
    $query = $this->db->get('pesanan', $limit);

    // Cek apakah query gagal
    if (!$query) {
        // Menampilkan error jika query gagal
        $error = $this->db->error();
        log_message('error', 'Query Error: ' . $error['message']);
        return []; // Kembalikan array kosong jika query gagal
    }

    // Ambil hasil query
    $produkBarudibeli = $query->result_array();

    // Hitung harga diskon jika ada produk
    if (!empty($produkBarudibeli)) {
        foreach ($produkBarudibeli as &$produk) {
            $produk['harga_diskon'] = $this->hitungDiskon($produk['harga_produk'], $produk['diskon_produk']);
        }
    }

    return $produkBarudibeli; // Kembalikan produk yang ditemukan atau array kosong
}


  public function getProdukAdmin()
  {
    $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori');
    $this->db->join('alumni', 'produk.id_alumni = alumni.id_alumni');
    $this->db->where('alumni.status', 'Approve');
    $this->db->group_by('produk.id_produk');
    $this->db->order_by('id_produk', 'DESC');

    return $this->db->get('produk')->result_array();
  }

  public function getProdukAlumni()
  {
    $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori');
    $this->db->join('alumni', 'produk.id_alumni = alumni.id_alumni');
    $this->db->where(['produk.id_alumni' => $this->session->userdata('id_alumni')]);
    $this->db->group_by('produk.id_produk');
    $this->db->order_by('id_produk', 'DESC');

    return $this->db->get('produk')->result_array();
  }
  
  public function getProdukAlumnibyId($id_alumni)
  {
    $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori');
    $this->db->join('alumni', 'produk.id_alumni = alumni.id_alumni');
    $this->db->where(['produk.id_alumni' => $id_alumni]);
    $this->db->group_by('produk.id_produk');
    $this->db->order_by('id_produk', 'DESC');

    return $this->db->get('produk')->result_array();
  }

  public function getProdukByAlumni($id_alumni)
{
    return $this->db->get_where('produk', ['id_alumni' => $id_alumni])->result_array();
}


  public function getidProduk($id_produk)
  {
    // Join tabel dan ambil data produk
    $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori');
    $this->db->join('alumni', 'produk.id_alumni = alumni.id_alumni');
    $this->db->where('alumni.status', 'Approve');
    $this->db->group_by('produk.id_produk');
    $produk = $this->db->get_where('produk', ['id_produk' => $id_produk])->row_array();
    
    // Jika produk ditemukan, hitung harga diskon
    if (!empty($produk)) {
        $produk['harga_diskon'] = $this->hitungDiskon($produk['harga_produk'], $produk['diskon_produk']);
    }
    
    return $produk;
  }
  
  public function getJenisProduk($jenis_produk)
  {
    $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori');
    $this->db->join('alumni', 'produk.id_alumni = alumni.id_alumni');
    $this->db->where('alumni.status', 'Approve');
    $this->db->where('jenis_produk', $jenis_produk); // Ganti 'jenis_produk' dengan nama kolom yang sesuai di database
    $this->db->order_by('id_produk', 'DESC');
    $query = $this->db->get('produk'); // Ganti 'produk' dengan nama tabel produk yang sesuai
    $produkAll = $query->result_array();

      foreach ($produkAll as &$produk) {
          $produk['harga_diskon'] = $this->hitungDiskon($produk['harga_produk'], $produk['diskon_produk']);
      }

      return $produkAll;
  }

  public function getKategoriProduk($id_kategori)
  {
    $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori');
    $this->db->join('alumni', 'produk.id_alumni = alumni.id_alumni');
    $this->db->where('alumni.status', 'Approve');
    $this->db->where('produk.id_kategori', $id_kategori);
    $this->db->order_by('id_produk', 'DESC');
    $query = $this->db->get('produk');
    $produkAll = $query->result_array();

      foreach ($produkAll as &$produk) {
          $produk['harga_diskon'] = $this->hitungDiskon($produk['harga_produk'], $produk['diskon_produk']);
      }

      return $produkAll;
  }
  
  public function getKategoriProdukAlumni($id_kategori)
  {
    $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori');
    $this->db->join('alumni', 'produk.id_alumni = alumni.id_alumni');
    $this->db->where('alumni.status', 'Approve');
    $this->db->where('alumni.id_alumni', $this->session->userdata('id_alumni'));
    $this->db->where('produk.id_kategori', $id_kategori);
    $this->db->order_by('id_produk', 'DESC');
    $query = $this->db->get('produk');
    $produkAll = $query->result_array();

      foreach ($produkAll as &$produk) {
          $produk['harga_diskon'] = $this->hitungDiskon($produk['harga_produk'], $produk['diskon_produk']);
      }

      return $produkAll;
  }

  // Proses
  public function tambah()
  {
    $data = [
      "id_alumni" => $this->input->post('id_alumni', true),
      "id_kategori" => $this->input->post('id_kategori', true),
      "nama_produk" => $this->input->post('nama_produk', true),
      "berat_produk" => $this->input->post('berat_produk', true),
      "keterangan_produk" => $this->input->post('keterangan_produk', true),
      "stok_produk" => $this->input->post('stok_produk', true),
      "harga_produk" => $this->input->post('harga_produk', true),
      "diskon_produk" => $this->input->post('diskon_produk', true),
      "create_at" => date('Y-m-d H:i:s'),
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
      "berat_produk" => $this->input->post('berat_produk', true),
      "keterangan_produk" => $this->input->post('keterangan_produk', true),
      "stok_produk" => $this->input->post('stok_produk', true),
      "harga_produk" => $this->input->post('harga_produk', true),
      "diskon_produk" => $this->input->post('diskon_produk', true),
      "create_at" => date('Y-m-d H:i:s'),
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
      "berat_produk" => $this->input->post('berat_produk', true),
      "keterangan_produk" => $this->input->post('keterangan_produk', true),
      "stok_produk" => $this->input->post('stok_produk', true),
      "harga_produk" => $this->input->post('harga_produk', true),
      "diskon_produk" => $this->input->post('diskon_produk', true),
      "update_at" => date('Y-m-d H:i:s')
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
      "berat_produk" => $this->input->post('berat_produk', true),
      "keterangan_produk" => $this->input->post('keterangan_produk', true),
      "stok_produk" => $this->input->post('stok_produk', true),
      "harga_produk" => $this->input->post('harga_produk', true),
      "diskon_produk" => $this->input->post('diskon_produk', true),
      "update_at" => date('Y-m-d H:i:s'),
      "image" => $file['file_name']
    ];

    $this->db->where('id_produk', $this->input->post('id_produk'));
    $this->db->update('produk', $data);
  }
  
  public function editStok($stok_baru)
  {
    $this->db->where('id_produk', $this->input->post('id_produk'));
    return $this->db->update('produk', ["stok_produk" => $stok_baru]);
  }
  
  public function editStok2($id_produk, $stok_baru)
  {
    $this->db->where('id_produk', $id_produk);
    return $this->db->update('produk', ["stok_produk" => $stok_baru]);
  }

  public function hapus($id_produk)
  {
    $this->db->delete('produk', ['id_produk' => $id_produk]);
  }

  public function editProdukRating($id_produk)
  {
    // Menghitung rata-rata rating dari review
    $this->db->select_avg('rating_review', 'average_rating'); // Alias sebagai 'average_rating'
    $this->db->where('id_produk', $id_produk);
    $result = $this->db->get('review')->row();

    // Jika ada hasil rating, update produk
    if ($result) {
        $average_rating = $result->average_rating; // Mengambil alias 'average_rating'

        // Update kolom rating pada tabel produk
        $this->db->set('rating_produk', $average_rating);
        $this->db->where('id_produk', $id_produk);
        $this->db->update('produk');
    }
  }

}