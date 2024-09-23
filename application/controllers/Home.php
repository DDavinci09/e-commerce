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
        $data['kategori'] = $this->modelKategori->getAll();
        $data['terbaru'] = $this->modelProduk->getProdukterbaru();
        $data['diskon'] = $this->modelProduk->getProdukdiskon();

        $this->load->view('layoutHome/header', $data);
        $this->load->view('layoutHome/navbar', $data);
        $this->load->view('home/index', $data);
        $this->load->view('layoutHome/footer', $data);
    }
    
    public function shop()
    {
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
        $data['produk'] = $this->modelProduk->getidProduk($id_produk);        
        $data['review'] =$this->modelReview->getProdukReview($id_produk);
        
        $this->load->view('layoutHome/header', $data);
        $this->load->view('layoutHome/navbar', $data);
        $this->load->view('home/detail', $data);
        $this->load->view('layoutHome/footer', $data);
    }
    
    public function Contact()
    {   
        $data['contact'] = "Kontak";
        
        $this->load->view('layoutHome/header', $data);
        $this->load->view('layoutHome/navbar', $data);
        $this->load->view('home/contact', $data);
        $this->load->view('layoutHome/footer', $data);
    }
    
    public function AboutUs()
    {   
        $data['aboutUs'] = "About us";
        
        $this->load->view('layoutHome/header', $data);
        $this->load->view('layoutHome/navbar', $data);
        $this->load->view('home/aboutUs', $data);
        $this->load->view('layoutHome/footer', $data);
    }
}