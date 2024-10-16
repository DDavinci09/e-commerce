<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Panggil fungsi check login
        loginUser();
        $this->load->helper('text');
    }

    // Halaman Landing Page/Home User
    public function index()
    {
        $data['active_menu'] = "home";
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['kategori'] = $this->modelKategori->getAll();
        $data['terbaru'] = $this->modelProduk->getProdukterbaru();
        $data['diskon'] = $this->modelProduk->getProdukdiskon();        
        $data['teratas'] = $this->modelProduk->getProdukteratas();
        $data['barudibeli'] = $this->modelProduk->getProdukbarudibeli();
        $data['reviews'] = $this->modelReview->getAll();

        $this->load->view('layoutHome/header', $data);
        $this->load->view('layoutHome/navbar', $data);
        $this->load->view('home/index', $data);
        $this->load->view('layoutHome/footer', $data);
    }
    
    // Halaman pembelian produk user
    public function shop()
    {
        $data['active_menu'] = "shop";
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = "Semua Produk";
        $data['kategori'] = $this->modelKategori->getAll();
        $data['produk'] = $this->modelProduk->getAll();
        $data['totalproduk'] = count($data['produk']);

        $this->load->view('layoutHome/header', $data);
        $this->load->view('layoutHome/navbar', $data);
        $this->load->view('home/shop', $data);
        $this->load->view('layoutHome/footer', $data);
    }
    
    // Halaman pembelian produk user
    public function Pencarian()
    {
        $data['active_menu'] = "shop";
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        // Ambil kata kunci dari input form (GET)
        $keyword = $this->input->get('keyword');
        
        $data['kategori'] = $this->modelKategori->getAll();
        $data['produk'] = $this->modelProduk->cariProduk($keyword);
        $data['totalproduk'] = count($data['produk']);
        $data['title'] = "Hasil Pencarian : ". $keyword;

        $this->load->view('layoutHome/header', $data);
        $this->load->view('layoutHome/navbar', $data);
        $this->load->view('home/shop', $data);
        $this->load->view('layoutHome/footer', $data);
    }    

    // Halaman pembelian produk user berdasarkan jenis produk
    public function getJenisProduk($jenis_produk)
    {
        $data['active_menu'] = "shop";
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = "Jenis Produk : $jenis_produk";
        $data['kategori'] = $this->modelKategori->getAll();
        $data['produk'] = $this->modelProduk->getJenisProduk($jenis_produk);
        $data['totalproduk'] = count($data['produk']);

        $this->load->view('layoutHome/header', $data);
        $this->load->view('layoutHome/navbar', $data);
        $this->load->view('home/shop', $data);
        $this->load->view('layoutHome/footer', $data);
    }
    
    // Halaman pembelian produk user berdasarkan kategori produk
    public function getKategoriProduk($id_kategori)
    {
        $data['active_menu'] = "shop";
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['kategori'] = $this->modelKategori->getAll();
        $data['nama_kategori'] = $this->modelKategori->getidKategori($id_kategori);
        $data['produk'] = $this->modelProduk->getKategoriProduk($id_kategori);
        $data['title'] = "Ketegori : " . $data['nama_kategori']['nama_kategori'];
        $data['totalproduk'] = count($data['produk']);

        $this->load->view('layoutHome/header', $data);
        $this->load->view('layoutHome/navbar', $data);
        $this->load->view('home/shop', $data);
        $this->load->view('layoutHome/footer', $data);
    }
    
    // Halaman detail produk user
    public function detail($id_produk)
    {
        $data['active_menu'] = "shop";
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['produk'] = $this->modelProduk->getidProduk($id_produk);
        $data['review'] =$this->modelReview->getProdukReview($id_produk);
         // Panggil fungsi di model untuk cek apakah user memiliki pesanan produk tersebut
        $data['bisaReview'] = $this->modelPesanan->cekPesanan($id_produk);
        $data['reviewuser'] =$this->modelReview->getReviewUser($id_produk);

        $this->form_validation->set_rules('jml_pesanan', 'Jumlah Pesanan', 'required');
        $this->form_validation->set_rules('pembayaran', 'Metode Pembayaran', 'required');

        $harga_pesanan = $this->input->post('harga_pesanan', true);
        $jumlah_pesanan = $this->input->post('jml_pesanan', true);

        if ($this->form_validation->run() == FALSE) {
        $this->load->view('layoutHome/header', $data);
        $this->load->view('layoutHome/navbar', $data);
        $this->load->view('home/detail', $data);
        $this->load->view('layoutHome/footer', $data);
        } else {
            // Cek apakah stok mencukupi
            if ($data['produk']['stok_produk'] < $jumlah_pesanan) {
                $this->session->set_flashdata('message', 'Stok tidak mencukupi.');
                redirect('user/detail/'.$id_produk);
            }

            $total_harga = $jumlah_pesanan * $harga_pesanan;

            // Data pesanan
            $dataPesanan = [
                'id_user' => $this->session->userdata('id_user'),
                'id_alumni' => $this->input->post('id_alumni', true),
                'id_produk' => $this->input->post('id_produk', true),
                'pembayaran' => $this->input->post('pembayaran', true),
                'harga_pesanan' => $harga_pesanan,
                'jml_pesanan' => $jumlah_pesanan,
                'total_pembayaran' => $total_harga,
                'tgl_pesanan' => date('Y-m-d H:i:s'),
                'status_bayar' => 'Belum Bayar',
                'status_pesanan' => 'Diproses'
            ];

            // Mulai transaksi
            $this->db->trans_start();

            // Simpan pesanan
            $this->modelPesanan->tambah($dataPesanan);
            if ($this->db->trans_status() === FALSE) {
                log_message('error', 'Gagal menyimpan pesanan: ' . json_encode($dataPesanan));
            }

            // Update stok
            $stok_baru = $data['produk']['stok_produk'] - $jumlah_pesanan;
            $this->modelProduk->editStok($stok_baru);
            if ($this->db->trans_status() === FALSE) {
                log_message('error', 'Gagal update stok untuk id_produk: ' . $id_produk);
            }

            // Akhiri transaksi
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Pebelian Gagal!
                </div>');
                redirect('User/detail/'.$id_produk);
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Pembelian berhasil! Total pembayaran: Rp ' . number_format($total_harga, 2) .'</div>');
                redirect('User/DataPesanan');
            }
        }
    }
    
    // Halaman Data Pesanan Produk yang dibeli oleh User
    public function DataPesanan()
    {
        $data['active_menu'] = "pesanan";
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['pesanan'] = $this->modelPesanan->getPesananUser();

        $this->load->view('layoutHome/header', $data);
        $this->load->view('layoutHome/navbar', $data);
        $this->load->view('home/pesanan', $data);
        $this->load->view('layoutHome/footer', $data);
    }  

    // Upload bukti pembayaran oleh user
    public function uploadBuktiBayar()
    {
        //konfigurasi upload file
        $config['upload_path'] = './assets/upload/bukti';
        $config['allowed_types'] = 'jpg|jpeg|png|PNG|pdf';
        $config['max_size'] = '10000';

        $this->load->library('upload', $config);

        //Initiaze config upload
        $this->upload->initialize($config);

        if ($this->upload->do_upload('bukti_bayar')) {
            $this->modelPesanan->uploadBuktiBayar($this->upload->data());
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Upload Bukti Pembayaran Berhasil Ditambahkan!
            </div>');
            redirect('User/DataPesanan');
        } else {
            // Jika upload file gagal
            $error = $this->upload->display_errors(); // Ambil pesan error dari upload
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Upload Bukti Pembayaran Gagal Ditambahkan!
            </div>');
            redirect('User/DataPesanan');
        }
    }

    // Edit Data Pesanan oleh user
    public function editPesanan()
    {
        // Validasi form input
        $this->form_validation->set_rules('jml_pesanan', 'Jumlah Pesanan', 'required|numeric');
        $this->form_validation->set_rules('pembayaran', 'Metode Pembayaran', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Kesalahan input data!</div>');
            redirect('User/DataPesanan');  // Redirect kembali jika gagal
        } else {
            // Ambil data dari form modal
            $id_pesanan = $this->input->post('id_pesanan', true);
            $harga_pesanan = $this->input->post('harga_pesanan', true);
            $jumlah_pesanan_baru = $this->input->post('jml_pesanan', true);
            $pembayaran = $this->input->post('pembayaran', true);

            // Ambil data pesanan lama
            $pesanan_lama = $this->modelPesanan->getidPesanan($id_pesanan);
            $jumlah_pesanan_lama = $pesanan_lama['jml_pesanan'];
            
            // Hitung total pembayaran baru
            $total_harga = $jumlah_pesanan_baru * $harga_pesanan;

            // Update data pesanan
            $dataPesanan = [
                'pembayaran' => $pembayaran,
                'jml_pesanan' => $jumlah_pesanan_baru,
                'total_pembayaran' => $total_harga
            ];

            // Mulai transaksi database
            $this->db->trans_start();

            // Update pesanan
            $this->modelPesanan->edit($id_pesanan, $dataPesanan);

            // Ambil data produk untuk update stok
            $produk = $this->modelProduk->getidProduk($pesanan_lama['id_produk']);
            $stok_sekarang = $produk['stok_produk'];

            // Jika jumlah pesanan baru lebih kecil, tambahkan ke stok
            if ($jumlah_pesanan_baru < $jumlah_pesanan_lama) {
                $selisih = $jumlah_pesanan_lama - $jumlah_pesanan_baru;
                $stok_baru = $stok_sekarang + $selisih;
            } else {
                // Jika lebih besar, kurangi stok
                $selisih = $jumlah_pesanan_baru - $jumlah_pesanan_lama;
                $stok_baru = $stok_sekarang - $selisih;
            }

            // Update stok produk
            $this->modelProduk->editStok($stok_baru);

            // Selesaikan transaksi
            $this->db->trans_complete();

            // Cek transaksi
            if ($this->db->trans_status() === FALSE) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger">Data Pesanan Gagal Diperbarui!</div>');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-success">Data Pesanan Berhasil diperbarui!</div>');
            }

            // Redirect ke halaman data pesanan
            redirect('User/DataPesanan');
        }
    }

    // Hapus data pesanan oleh user
    public function hapusPesanan($id_pesanan)
    {
        // Ambil data pesanan berdasarkan id_pesanan
        $pesanan = $this->modelPesanan->getidPesanan($id_pesanan);

        // Cek apakah data pesanan ditemukan
        if ($pesanan) {
            // Ambil data produk berdasarkan id_produk dari pesanan
            $produk = $this->modelProduk->getidProduk($pesanan['id_produk']);

            // Tambah stok produk sesuai jumlah pesanan yang dihapus
            $stok_baru = $produk['stok_produk'] + $pesanan['jml_pesanan'];

            // Update stok produk di database
            $this->modelProduk->editStok2($produk['id_produk'], $stok_baru);

            // Hapus data pesanan
            $this->modelPesanan->hapus($id_pesanan);

            // Set pesan flash jika berhasil dihapus
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Data Pesanan Berhasil Dihapus dan Stok Produk Ditambah!
            </div>');
        } else {
            // Jika pesanan tidak ditemukan, tampilkan pesan error
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Pesanan tidak ditemukan!
            </div>');
        }

        // Redirect ke halaman DataPesanan
        redirect('User/DataPesanan');
    }  

    // Menambahkan data review oleh user
    public function TambahReview()
    {
        $id_produk = $this->input->post('id_produk');
        
        $this->modelReview->tambah($id_produk);
        // Update rating produk setelah review ditambahkan
        $this->modelProduk->editProdukRating($id_produk);
        $this->session->set_flashdata('message', '<div class="alert alert-secondary" role="alert">
        Review Anda Berhasil Ditambahkan!
        </div>');
        redirect('User/detail/'.$id_produk.'#review');
    }

    // Halaman Contact
    public function contact()
    {   
        $data['active_menu'] = "contact";
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['contact'] = "Kontak";
        
        $this->load->view('layoutHome/header', $data);
        $this->load->view('layoutHome/navbar', $data);
        $this->load->view('home/contact', $data);
        $this->load->view('layoutHome/footer', $data);
    }
    
    // Halaman About Us
    public function aboutUs()
    {   
        $data['active_menu'] = "aboutus";
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['aboutUs'] = "About us";
        
        $this->load->view('layoutHome/header', $data);
        $this->load->view('layoutHome/navbar', $data);
        $this->load->view('home/aboutUs', $data);
        $this->load->view('layoutHome/footer', $data);
    }
}