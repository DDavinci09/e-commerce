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

    public function index()
    {
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
    
    public function shop()
    {
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

    public function getJenisProduk($jenis_produk)
    {
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
    
    public function getKategoriProduk($id_kategori)
    {
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
    
    public function detail($id_produk)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['produk'] = $this->modelProduk->getidProduk($id_produk);
        $data['review'] =$this->modelReview->getProdukReview($id_produk);
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
        
    public function DataPesanan()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['pesanan'] = $this->modelPesanan->getPesananUser();

        $this->load->view('layoutHome/header', $data);
        $this->load->view('layoutHome/navbar', $data);
        $this->load->view('home/pesanan', $data);
        $this->load->view('layoutHome/footer', $data);
    }

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

    public function contact()
    {   
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['contact'] = "Kontak";
        
        $this->load->view('layoutHome/header', $data);
        $this->load->view('layoutHome/navbar', $data);
        $this->load->view('home/contact', $data);
        $this->load->view('layoutHome/footer', $data);
    }
    
    public function aboutUs()
    {   
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['aboutUs'] = "About us";
        
        $this->load->view('layoutHome/header', $data);
        $this->load->view('layoutHome/navbar', $data);
        $this->load->view('home/aboutUs', $data);
        $this->load->view('layoutHome/footer', $data);
    }
  
}