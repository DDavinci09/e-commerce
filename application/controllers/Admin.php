<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function index()
    {
        $data['dashboard'] = "Selamat Datang";
        $data['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('layoutDashboard/header', $data);
        $this->load->view('layoutDashboard/sidebar', $data);
        $this->load->view('layoutDashboard/navbar', $data);
        $this->load->view('dashboard/index', $data);
        $this->load->view('layoutDashboard/footer', $data);
    }

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

        // Redirect kembali ke halaman alumni
        redirect('Admin/DataAlumni');
    }

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
            redirect('Admin/DataKategori');
        }
    }

    public function hapusKategori($id_kategori)
    {
        $data['kt'] = $this->modelKategori->getidKategori($id_kategori);

        $this->modelKategori->hapus($id_kategori);
        redirect('Admin/DataKategori');
    }
}