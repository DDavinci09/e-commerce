<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Panggil fungsi check login
        $this->load->helper('text');
    }
    
    public function index()
    {
        $data['user'] = $this->db->get_where('alumni', ['username' => $this->session->userdata('username')])->row_array();
        $data['kategori'] = $this->modelKategori->getAll();
        $data['terbaru'] = $this->modelProduk->getProdukterbaru();
        $data['diskon'] = $this->modelProduk->getProdukdiskon();

        // // Hitung harga diskon untuk setiap produk
        // foreach ($data['terbaru'] as &$produk) {
        //     $harga_asli = $produk['harga_produk'];
        //     $diskon = $produk['diskon_produk'];
        //     $produk['harga_diskon'] = $harga_asli - ($harga_asli * ($diskon / 100));
        // }
        
        // // Hitung harga diskon untuk setiap produk
        // foreach ($data['diskon'] as &$produk) {
        //     $harga_asli = $produk['harga_produk'];
        //     $diskon = $produk['diskon_produk'];
        //     $produk['harga_diskon'] = $harga_asli - ($harga_asli * ($diskon / 100));
        // }

        $this->load->view('layoutHome/header', $data);
        $this->load->view('layoutHome/navbar', $data);
        $this->load->view('home/index', $data);
        $this->load->view('layoutHome/footer', $data);
    }
    
    public function shop()
    {
        $data['kategori'] = $this->modelKategori->getAll();
        $data['produk'] = $this->modelProduk->getAll();

        // // Hitung harga diskon untuk setiap produk
        // foreach ($data['produk'] as &$produk) {
        //     $harga_asli = $produk['harga_produk'];
        //     $diskon = $produk['diskon_produk'];
        //     $produk['harga_diskon'] = $harga_asli - ($harga_asli * ($diskon / 100));
        // }

        $this->load->view('layoutHome/header', $data);
        $this->load->view('layoutHome/navbar', $data);
        $this->load->view('home/shop', $data);
        $this->load->view('layoutHome/footer', $data);
    }
    
    public function detail()
    {
        $data['kategori'] = $this->modelKategori->getAll();
        $data['produk'] = $this->modelProduk->getAll();
        
        $this->load->view('layoutHome/header', $data);
        $this->load->view('layoutHome/navbar', $data);
        $this->load->view('home/detail', $data);
        $this->load->view('layoutHome/footer', $data);
    }
}