<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller
{

    public function index()
    {
        $data['produk'] = $this->modelProduk->getAll();

        $this->load->view('layoutDashboard/header', $data);
        $this->load->view('layoutDashboard/sidebar', $data);
        $this->load->view('layoutDashboard/navbar', $data);
        $this->load->view('produk/index', $data);
        $this->load->view('layoutDashboard/footer', $data);
    }
}