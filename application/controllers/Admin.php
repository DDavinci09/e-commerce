<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        loginAdmin();
    }
    
    // Halaman Dashboard Admin
    public function index()
    {
        $data['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $data['pesanan_pending'] = $this->modelPesanan->telahBayar();
        $data['totalUser'] = count($this->modelUser->getAll());
        $data['totalAlumni'] = count($this->modelAlumni->getAll());
        $data['totalApprove'] = count($this->modelAlumni->getApprove());
        $data['totalDecline'] = count($this->modelAlumni->getDecline());
        $data['totalKategori'] = count($this->modelKategori->getAll());
        $data['totalProduk'] = count($this->modelProduk->getAll());
        $data['totalPesanan'] = count($this->modelPesanan->getAll());
        $data['totalBelumBayar'] = count($this->modelPesanan->getAdminBelumBayar());
        $data['totalLunas'] = count($this->modelPesanan->getAdminLunas());
        $data['totalDiproses'] = count($this->modelPesanan->getAdminDiproses());
        $data['totalSelesai'] = count($this->modelPesanan->getAdminSelesai());
        $data['totalDibatalkan'] = count($this->modelPesanan->getAdminDibatalkan());
        $data['totalReview'] = count($this->modelReview->getAll());

        $this->load->view('layoutDashboard/header', $data);
        $this->load->view('layoutDashboard/sidebar', $data);
        $this->load->view('layoutDashboard/navbar', $data);
        $this->load->view('dashboard/index', $data);
        $this->load->view('layoutDashboard/footer', $data);
    }

    // Halaman Dat Alumni
    public function DataAlumni()
    {
        $data['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $data['alumni'] = $this->modelAlumni->getAll();

        $this->load->view('layoutDashboard/header', $data);
        $this->load->view('layoutDashboard/sidebar', $data);
        $this->load->view('layoutDashboard/navbar', $data);
        $this->load->view('alumni/index', $data);
        $this->load->view('layoutDashboard/footer', $data);
    }

    // Fungsi untuk mengubah status alumni
    public function editStatus($id_alumni, $status)
    {
        // Mengambil data ID alumni
        $data['iduser'] = $this->modelAlumni->getIdAlumni($id_alumni);

        // Memasukkan status baru
        $statusData = [
            "status" => $status
        ];

        // Melakukan update pada status alumni berdasarkan ID
        $this->db->update('alumni', $statusData, ['id_alumni' => $id_alumni]);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Status Alumni Berhasil Diperbaharui!
        </div>');
        // Redirect kembali ke halaman alumni
        redirect('Admin/DataAlumni');
    }

    // Halaman Data User
    public function DataUser()
    {
        $data['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $data['users'] = $this->modelUser->getAll();

        $this->load->view('layoutDashboard/header', $data);
        $this->load->view('layoutDashboard/sidebar', $data);
        $this->load->view('layoutDashboard/navbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('layoutDashboard/footer', $data);
    }

    // Halaman Data Kategori
    public function DataKategori()
    {
        $data['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $data['kategori'] = $this->modelKategori->getAll();

        $this->load->view('layoutDashboard/header', $data);
        $this->load->view('layoutDashboard/sidebar', $data);
        $this->load->view('layoutDashboard/navbar', $data);
        $this->load->view('kategori/index', $data);
        $this->load->view('layoutDashboard/footer', $data);
    }
    
    public function DetailKategori($id_kategori)
    {
        $data['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $data['kategori'] = $this->modelKategori->getidKategori($id_kategori);

        $this->load->view('layoutDashboard/header', $data);
        $this->load->view('layoutDashboard/sidebar', $data);
        $this->load->view('layoutDashboard/navbar', $data);
        $this->load->view('kategori/detail', $data);
        $this->load->view('layoutDashboard/footer', $data);
    }

    public function tambahKategori()
    {
        $data['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');
        $this->form_validation->set_rules('keterangan_kategori', 'Keterangan Kategori', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layoutDashboard/header', $data);
            $this->load->view('layoutDashboard/sidebar', $data);
            $this->load->view('layoutDashboard/navbar', $data);
            $this->load->view('kategori/tambah', $data);
            $this->load->view('layoutDashboard/footer', $data);
        } else {
            $this->modelKategori->tambah();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data Kategori Berhasil Ditambahkan!
            </div>');
            redirect('Admin/DataKategori');
        }
    }

    public function editKategori($id_kategori)
    {
        $data['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $data['kt'] = $this->modelKategori->getidKategori($id_kategori);

        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');
        $this->form_validation->set_rules('keterangan_kategori', 'Keterangan Kategori', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layoutDashboard/header', $data);
            $this->load->view('layoutDashboard/sidebar', $data);
            $this->load->view('layoutDashboard/navbar', $data);
            $this->load->view('kategori/edit', $data);
            $this->load->view('layoutDashboard/footer', $data);
        } else {
            $this->modelKategori->edit($id_kategori);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data Kategori Berhasil Diubah!
            </div>');
            redirect('Admin/DataKategori');
        }
    }

    public function hapusKategori($id_kategori)
    {
        $data['kt'] = $this->modelKategori->getidKategori($id_kategori);

        $this->modelKategori->hapus($id_kategori);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        Data Kategori Berhasil Dihapus!
        </div>');
        redirect('Admin/DataKategori');
    }

    // Halaman Data Produk
    public function DataProduk()
    {
        $data['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $data['produk'] = $this->modelProduk->getProdukAdmin();

        $this->load->view('layoutDashboard/header', $data);
        $this->load->view('layoutDashboard/sidebar', $data);
        $this->load->view('layoutDashboard/navbar', $data);
        $this->load->view('produk/index', $data);
        $this->load->view('layoutDashboard/footer', $data);
    }
    
    public function getProdukKategori($id_kategori)
    {
        $data['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $data['produk'] = $this->modelProduk->getKategoriProduk($id_kategori);

        $this->load->view('layoutDashboard/header', $data);
        $this->load->view('layoutDashboard/sidebar', $data);
        $this->load->view('layoutDashboard/navbar', $data);
        $this->load->view('produk/index', $data);
        $this->load->view('layoutDashboard/footer', $data);
    }
    
    public function DetailProduk($id_produk)
    {
        $data['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $data['produk'] = $this->modelProduk->getidProduk($id_produk);
        $data['review'] =$this->modelReview->getProdukReview($id_produk);

        $this->load->view('layoutDashboard/header', $data);
        $this->load->view('layoutDashboard/sidebar', $data);
        $this->load->view('layoutDashboard/navbar', $data);
        $this->load->view('produk/detail', $data);
        $this->load->view('layoutDashboard/footer', $data);
    }
    
    // Halaman Data Pesanan
    public function DataPesanan()
    {
        $data['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $data['pesanan'] = $this->modelPesanan->getPesananAdmin();

        $this->load->view('layoutDashboard/header', $data);
        $this->load->view('layoutDashboard/sidebar', $data);
        $this->load->view('layoutDashboard/navbar', $data);
        $this->load->view('pesanan/index', $data);
        $this->load->view('layoutDashboard/footer', $data);
    }
    
    public function PesananStatusBayar()
    {
        $data['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $data['pesanan'] = $this->modelPesanan->telahBayar();

        $this->load->view('layoutDashboard/header', $data);
        $this->load->view('layoutDashboard/sidebar', $data);
        $this->load->view('layoutDashboard/navbar', $data);
        $this->load->view('pesanan/index', $data);
        $this->load->view('layoutDashboard/footer', $data);
    }

    public function DetailPesanan($id_pesanan)
    {
        $data['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $data['pesanan'] = $this->modelPesanan->getidPesanan($id_pesanan);

        $this->load->view('layoutDashboard/header', $data);
        $this->load->view('layoutDashboard/sidebar', $data);
        $this->load->view('layoutDashboard/navbar', $data);
        $this->load->view('pesanan/detail', $data);
        $this->load->view('layoutDashboard/footer', $data);
    }
    
    public function editStatusPembayaran()
    {
        $this->modelPesanan->editStatusPembayaran();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Status Pembayaran Berhasil Diperbaharui!
        </div>');
        redirect('Admin/DataPesanan');
    }

    // Halaman Data Review
    public function DataReview()
    {
        $data['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $data['review'] = $this->modelReview->getAll();

        $this->load->view('layoutDashboard/header', $data);
        $this->load->view('layoutDashboard/sidebar', $data);
        $this->load->view('layoutDashboard/navbar', $data);
        $this->load->view('review/index', $data);
        $this->load->view('layoutDashboard/footer', $data);
    }
}