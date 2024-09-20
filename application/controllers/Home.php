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
        $data['kategori'] = $this->modelKategori->getAll();
        $data['produk'] = $this->modelProduk->getAll();

        $this->load->view('layoutHome/header', $data);
        $this->load->view('layoutHome/navbar', $data);
        $this->load->view('home/shop', $data);
        $this->load->view('layoutHome/footer', $data);
    }
    
    public function detail($id_produk)
    {
        $data['produk'] = $this->modelProduk->getidProduk($id_produk);
        
        $this->load->view('layoutHome/header', $data);
        $this->load->view('layoutHome/navbar', $data);
        $this->load->view('home/detail', $data);
        $this->load->view('layoutHome/footer', $data);
    }
}