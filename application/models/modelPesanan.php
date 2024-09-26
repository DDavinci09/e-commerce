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
    $this->db->order_by('id_pesanan', 'DESC');
    
    return $this->db->get_where('pesanan', ['id_pesanan' => $id_pesanan])->row_array();
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

  public function totalPendapatanAlumni()
  {
    // Bergabung dengan tabel terkait
    $this->db->join('produk', 'pesanan.id_produk = produk.id_produk');
    $this->db->join('alumni', 'pesanan.id_alumni = alumni.id_alumni');

    // Menyaring berdasarkan ID alumni dari sesi
    $this->db->where('alumni.id_alumni', $this->session->userdata('id_alumni'));
    $this->db->where('pesanan.status_bayar', 'Lunas');
    $this->db->where('pesanan.status_pesanan', 'Selesai');

    // Menjumlahkan total pembayaran
    $this->db->select_sum('pesanan.total_pembayaran', 'total_pembayaran');

    // Mengambil data dari tabel pesanan
    $query = $this->db->get('pesanan')->row_array();

    // Memastikan hasil tidak null
    if ($query && isset($query['total_pembayaran'])) {
        return $query['total_pembayaran']; // Mengembalikan total pendapatan
    } else {
        return 0; // Jika tidak ada data, kembalikan 0
    }
  }
  
  // Data Pesanan User
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
    
  // Proses
  public function edit($id_pesanan, $dataPesanan)
  {
    $this->db->where('id_pesanan', $id_pesanan);
    $this->db->update('pesanan', $dataPesanan);
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

  public function uploadBuktibayar($file)
  {
    $data = [
      "bukti_bayar" => $file['file_name']
    ];

    $this->db->where('id_pesanan', $this->input->post('id_pesanan'));
    $this->db->update('pesanan', $data);
  }

  public function tambah($dataPesanan)
  {
    $this->db->insert('pesanan', $dataPesanan);
  }

  public function hapus($id_pesanan)
  {
    $this->db->delete('pesanan', ['id_pesanan' => $id_pesanan]);
  }

  public function telahBayar() 
  {
    // Melakukan join dengan tabel terkait
    $this->db->join('produk', 'pesanan.id_produk = produk.id_produk');
    $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori');
    $this->db->join('alumni', 'pesanan.id_alumni = alumni.id_alumni');
    $this->db->join('user', 'pesanan.id_user = user.id_user');
    
    // Memastikan bukti pembayaran tidak kosong
    $this->db->where('bukti_bayar IS NOT NULL');
    $this->db->where('bukti_bayar !=', ''); 
    
    // Memastikan status bayar adalah 'Belum bayar'
    $this->db->where('status_bayar', 'Belum bayar'); 
    
    // Mengelompokkan hasil berdasarkan ID pesanan
    $this->db->group_by('pesanan.id_pesanan');
    $this->db->order_by('id_pesanan', 'DESC');
    
    // Mengambil data dari tabel pesanan
    $query = $this->db->get('pesanan'); // Pastikan untuk menyebutkan tabel 'pesanan'
    
    return $query->result_array(); // Mengembalikan hasil dalam bentuk array
  }
  
  public function menungguProses() 
{
    $this->db->join('produk', 'pesanan.id_produk = produk.id_produk');
    $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori');
    $this->db->join('alumni', 'pesanan.id_alumni = alumni.id_alumni');
    $this->db->join('user', 'pesanan.id_user = user.id_user');
    
    // Memastikan alumni sesuai dengan session id_alumni
    $this->db->where(['pesanan.id_alumni' => $this->session->userdata('id_alumni')]);

    // Memastikan bukti pembayaran tidak kosong
    $this->db->where('pesanan.bukti_bayar IS NOT NULL'); 
    
    // Memastikan status bayar adalah 'Lunas'
    $this->db->where('pesanan.status_bayar', 'Lunas'); 
    
    // Memastikan status pesanan bukan 'Diproses'
    $this->db->where('pesanan.status_pesanan', 'Diproses');

    $this->db->group_by('pesanan.id_pesanan');
    $this->db->order_by('pesanan.id_pesanan', 'DESC');

    return $this->db->get('pesanan')->result_array();        
}

}