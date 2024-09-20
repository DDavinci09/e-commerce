<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Alumni extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Panggil fungsi check login
        loginAlumni();
    }

    public function index()
    {
        $data['dashboard'] = "Selamat Datang";
        $data['user'] = $this->db->get_where('alumni', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('layoutDashboard/header', $data);
        $this->load->view('layoutDashboard/sidebar', $data);
        $this->load->view('layoutDashboard/navbar', $data);
        $this->load->view('dashboard/index', $data);
        $this->load->view('layoutDashboard/footer', $data);
    }

    public function DataKategori()
    {
        $data['user'] = $this->db->get_where('alumni', ['username' => $this->session->userdata('username')])->row_array();
        $data['kategori'] = $this->modelKategori->getAll();

        $this->load->view('layoutDashboard/header', $data);
        $this->load->view('layoutDashboard/sidebar', $data);
        $this->load->view('layoutDashboard/navbar', $data);
        $this->load->view('kategori/index', $data);
        $this->load->view('layoutDashboard/footer', $data);
    }

    public function DataProduk()
    {
        $data['user'] = $this->db->get_where('alumni', ['username' => $this->session->userdata('username')])->row_array();
        $data['produk'] = $this->modelProduk->getProdukAlumni();

        $this->load->view('layoutDashboard/header', $data);
        $this->load->view('layoutDashboard/sidebar', $data);
        $this->load->view('layoutDashboard/navbar', $data);
        $this->load->view('produk/index', $data);
        $this->load->view('layoutDashboard/footer', $data);
    }

    public function tambahProduk()
    {
        $data['user'] = $this->db->get_where('alumni', ['username' => $this->session->userdata('username')])->row_array();
        $data['kategori'] = $this->modelKategori->getAll();

        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');
        $this->form_validation->set_rules('id_kategori', 'Nama Kategori', 'required');
        $this->form_validation->set_rules('jenis_produk', 'Jenis Produk', 'required');
        $this->form_validation->set_rules('keterangan_produk', 'Keterangan Produk', 'required');
        $this->form_validation->set_rules('stok_produk', 'Stok Produk', 'required');
        $this->form_validation->set_rules('harga_produk', 'Harga Produk', 'required');
        $this->form_validation->set_rules('diskon_produk', 'Diskon Produk', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layoutDashboard/header', $data);
            $this->load->view('layoutDashboard/sidebar', $data);
            $this->load->view('layoutDashboard/navbar', $data);
            $this->load->view('produk/tambah', $data);
            $this->load->view('layoutDashboard/footer', $data);
        } else {
            //konfigurasi upload file
            $config['upload_path'] = './assets/upload/produk';
            $config['allowed_types'] = 'jpg|jpeg|png|PNG';
            $config['max_size'] = '10000';

            $this->load->library('upload', $config);

            //Initiaze config upload
            $this->upload->initialize($config);

            if ($this->upload->do_upload('image')) {
                $this->modelProduk->tambahfile($this->upload->data());
                redirect('Alumni/DataProduk');
            } else {
                $this->modelProduk->tambah();
                redirect('Alumni/DataProduk');
            }
        }
    }

    public function editProduk($id_produk)
    {
        $data['user'] = $this->db->get_where('alumni', ['username' => $this->session->userdata('username')])->row_array();
        $data['kategori'] = $this->modelKategori->getAll();
        $data['produk'] = $this->modelProduk->getidProduk($id_produk);
        $data['jenis'] = ['Barang', 'Jasa'];

        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');
        $this->form_validation->set_rules('id_kategori', 'Nama Kategori', 'required');
        $this->form_validation->set_rules('jenis_produk', 'Jenis Produk', 'required');
        $this->form_validation->set_rules('keterangan_produk', 'Keterangan Produk', 'required');
        $this->form_validation->set_rules('stok_produk', 'Stok Produk', 'required');
        $this->form_validation->set_rules('harga_produk', 'Harga Produk', 'required');
        $this->form_validation->set_rules('diskon_produk', 'Diskon Produk', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layoutDashboard/header', $data);
            $this->load->view('layoutDashboard/sidebar', $data);
            $this->load->view('layoutDashboard/navbar', $data);
            $this->load->view('produk/edit', $data);
            $this->load->view('layoutDashboard/footer', $data);
        } else {
            //konfigurasi upload file
            $config['upload_path'] = './assets/upload/produk';
            $config['allowed_types'] = 'jpg|jpeg|png|PNG';
            $config['max_size'] = '10000';

            $this->load->library('upload', $config);

            //Initiaze config upload
            $this->upload->initialize($config);

            if ($this->upload->do_upload('image')) {
                $file = './assets/upload/produk/' . $data['produk']['image'];

                // Try to delete the existing file
                if (is_readable($file) && unlink($file)) {
                    $this->modelProduk->editfile($this->upload->data());
                    redirect('Alumni/DataProduk');
                } else {
                    $this->modelProduk->editfile($this->upload->data());
                    redirect('Alumni/DataProduk');
                }
            } else {
                $this->modelProduk->edit();
                redirect('Alumni/DataProduk');
            }
        }
    }

    public function hapusProduk($id_produk)
    {
        //$this->session->set_flashdata('flash', 'Dihapus');
        $data['produk'] = $this->modelProduk->getidProduk($id_produk);
        $file = './assets/upload/produk/' . $data['produk']['image'];

        if (is_readable($file) && unlink($file)) {
            $this->modelProduk->hapus($id_produk);
            redirect('Alumni/DataProduk');
        } else {
            $this->modelProduk->hapus($id_produk);
            redirect('Alumni/DataProduk');
        }
    }

}