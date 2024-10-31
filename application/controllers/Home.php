<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Panggil fungsi check login
        Home();
        $this->load->helper('text');
    }
    
    // Halaman home
    public function index()
    {
        $data['active_menu'] = "home";
        $data['kategori'] = $this->modelKategori->getAll();
        $data['terbaru'] = $this->modelProduk->getProdukterbaru();
        $data['diskon'] = $this->modelProduk->getProdukdiskon();
        $data['teratas'] = $this->modelProduk->getProdukteratas();
        $data['reviews'] = $this->modelReview->getAll();
        $data['banner'] = $this->modelAdmin->getBannerAktif();

        $this->load->view('layoutHome/header', $data);
        $this->load->view('layoutHome/navbar', $data);
        $this->load->view('home/index', $data);
        $this->load->view('layoutHome/footer', $data);
    }
    
    // halaman shop
    public function shop()
    {
        $data['active_menu'] = "shop";
        $data['title'] = "Semua Produk";
        $data['kategori'] = $this->modelKategori->getAll();
        $data['produk'] = $this->modelProduk->getAll();
        $data['totalproduk'] = count($data['produk']);

        $this->load->view('layoutHome/header', $data);
        $this->load->view('layoutHome/navbar', $data);
        $this->load->view('home/shop', $data);
        $this->load->view('layoutHome/footer', $data);
    }

    public function Pencarian()
    {
        $data['active_menu'] = "shop";
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
    
    public function getJenisProduk($jenis_produk)
    {   
        $data['active_menu'] = "shop";
        $data['title'] = "Jenis : $jenis_produk";
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
        $data['active_menu'] = "shop";
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
    
    // Halaman detail
    public function detail($id_produk)
    {
        $data['active_menu'] = "shop";
        $data['produk'] = $this->modelProduk->getidProduk($id_produk);        
        $data['review'] =$this->modelReview->getProdukReview($id_produk);
        
        $this->load->view('layoutHome/header', $data);
        $this->load->view('layoutHome/navbar', $data);
        $this->load->view('home/detail', $data);
        $this->load->view('layoutHome/footer', $data);
    }
    
    // halaman contact
    public function Contact()
    {   
        $data['active_menu'] = "aboutus";
        $data['contact'] = $this->modelAdmin->getKontak();
        
        $this->load->view('layoutHome/header', $data);
        $this->load->view('layoutHome/navbar', $data);
        $this->load->view('home/contact', $data);
        $this->load->view('layoutHome/footer', $data);
    }
    
    // halaman about us
    public function AboutUs()
    {   
        $data['active_menu'] = "aboutus";
        $data['profil'] = $this->modelAdmin->getProfile();
        
        $this->load->view('layoutHome/header', $data);
        $this->load->view('layoutHome/navbar', $data);
        $this->load->view('home/aboutUs', $data);
        $this->load->view('layoutHome/footer', $data);
    }
}