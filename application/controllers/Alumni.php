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

    // Halaman Dashboard ALumni
    public function index()
    {
        $data['user'] = $this->db->get_where('alumni', ['username' => $this->session->userdata('username')])->row_array();
        $data['menungguProses'] = $this->modelPesanan->menungguProses();
        $data['totalProduk'] = count($this->modelProduk->getProdukAlumni());
        $data['totalPesanan'] = count($this->modelPesanan->getPesananAlumni());
        $data['totalBelumBayar'] = count($this->modelPesanan->getAlumniBelumBayar());
        $data['totalLunas'] = count($this->modelPesanan->getAlumniLunas());
        $data['totalDiproses'] = count($this->modelPesanan->getAlumniDiproses());
        $data['totalSelesai'] = count($this->modelPesanan->getAlumniSelesai());
        $data['totalDibatalkan'] = count($this->modelPesanan->getAlumniDibatalkan());
        $data['totalReview'] = count($this->modelReview->getAlumniReview());
        $data['totalPendapatan'] = $this->modelPesanan->totalPendapatanAlumni();

        $this->load->view('layoutDashboard/header', $data);
        $this->load->view('layoutDashboard/sidebar', $data);
        $this->load->view('layoutDashboard/navbar', $data);
        $this->load->view('dashboard/index', $data);
        $this->load->view('layoutDashboard/footer', $data);
    }

    // Profile alumni
    public function MyProfile()
    {
        $data['user'] = $this->db->get_where('alumni', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('layoutDashboard/header', $data);
        $this->load->view('layoutDashboard/sidebar', $data);
        $this->load->view('layoutDashboard/navbar', $data);
        $this->load->view('dashboard/myprofile', $data);
        $this->load->view('layoutDashboard/footer', $data);
    }
    
    public function editProfile()
    {
        $data['user'] = $this->db->get_where('alumni', ['username' => $this->session->userdata('username')])->row_array();
        $id_alumni = $data['user']['id_alumni'];

        // Form Validation
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('nama_toko', 'Nama Toko', 'required|trim');
        $this->form_validation->set_rules('keterangan_toko', 'Keterangan Toko', 'required|trim');
        $this->form_validation->set_rules('alamat_toko', 'Alamat Toko', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('no_telp', 'No Telp', 'required|trim');
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layoutDashboard/header', $data);
            $this->load->view('layoutDashboard/sidebar', $data);
            $this->load->view('layoutDashboard/navbar', $data);
            $this->load->view('dashboard/editprofile', $data);
            $this->load->view('layoutDashboard/footer', $data);
        } else {
            $this->modelAlumni->editAlumni($id_alumni);
            redirect('Alumni/MyProfile');
        }
    }

    public function editUsernamePassword()
{
    // Validasi form input
    $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[alumni.username]', [
            'is_unique' => 'This username has already registered!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Passwords do not match!',
            'min_length' => 'Password is too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Confirm Password', 'required|trim|matches[password1]');

    if ($this->form_validation->run() == FALSE) {
        // Jika validasi gagal, tampilkan modal kembali dengan error
        $this->session->set_flashdata('error', validation_errors());
        // Set flashdata agar modal tetap terbuka
        $this->session->set_flashdata('edit_modal', true);
        redirect('Alumni/MyProfile');
    } else {
        $username = $this->input->post('username');
        $new_password = $this->input->post('password1');

        $data = [
            'username' => htmlspecialchars($this->input->post('username', true)),
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
        ];

        // Update data di database
        $this->db->where('id_alumni', $this->session->userdata('id_alumni'));
        $this->db->update('alumni', $data);

        $this->session->set_userdata($data);

        $this->session->set_flashdata('message', 'Data berhasil diupdate');
        redirect('Alumni/MyProfile');
    }
}


    // Halaman Kategori
    public function DataKategori()
    {
        $data['user'] = $this->db->get_where('alumni', ['username' => $this->session->userdata('username')])->row_array();
        $data['kategori'] = $this->modelKategori->getAllKategoriAlumni();

        $this->load->view('layoutDashboard/header', $data);
        $this->load->view('layoutDashboard/sidebar', $data);
        $this->load->view('layoutDashboard/navbar', $data);
        $this->load->view('kategori/index', $data);
        $this->load->view('layoutDashboard/footer', $data);
    }

    public function DetailKategori($id_kategori)
    {
        $data['user'] = $this->db->get_where('alumni', ['username' => $this->session->userdata('username')])->row_array();
        $data['kategori'] = $this->modelKategori->getidKategori($id_kategori);

        $this->load->view('layoutDashboard/header', $data);
        $this->load->view('layoutDashboard/sidebar', $data);
        $this->load->view('layoutDashboard/navbar', $data);
        $this->load->view('kategori/detail', $data);
        $this->load->view('layoutDashboard/footer', $data);
    }

    // Proses Data Produk
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

    public function getProdukKategori($id_kategori)
    {
        $data['user'] = $this->db->get_where('alumni', ['username' => $this->session->userdata('username')])->row_array();
        $data['produk'] = $this->modelProduk->getKategoriProdukAlumni($id_kategori);

        $this->load->view('layoutDashboard/header', $data);
        $this->load->view('layoutDashboard/sidebar', $data);
        $this->load->view('layoutDashboard/navbar', $data);
        $this->load->view('produk/index', $data);
        $this->load->view('layoutDashboard/footer', $data);
    }

    public function DetailProduk($id_produk)
    {
        $data['user'] = $this->db->get_where('alumni', ['username' => $this->session->userdata('username')])->row_array();
        $data['produk'] = $this->modelProduk->getidProduk($id_produk);
        $data['review'] =$this->modelReview->getProdukReview($id_produk);

        $this->load->view('layoutDashboard/header', $data);
        $this->load->view('layoutDashboard/sidebar', $data);
        $this->load->view('layoutDashboard/navbar', $data);
        $this->load->view('produk/detail', $data);
        $this->load->view('layoutDashboard/footer', $data);
    }

    public function tambahProduk()
    {
        $data['user'] = $this->db->get_where('alumni', ['username' => $this->session->userdata('username')])->row_array();
        $data['kategori'] = $this->modelKategori->getAll();

        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');
        $this->form_validation->set_rules('id_kategori', 'Nama Kategori', 'required');
        $this->form_validation->set_rules('berat_produk', 'Berat Produk', 'required');
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
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Data Produk Berhasil Ditambahkan!
                </div>');
                redirect('Alumni/DataProduk');
            } else {
                // Jika upload file gagal
                $error = $this->upload->display_errors(); // Ambil pesan error dari upload
                
                $this->modelProduk->tambah();
                // Flash message error upload dan sukses tambah produk
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Data Produk Berhasil Ditambahkan, tetapi file gagal diupload: '.$error.'
                </div>');
                redirect('Alumni/DataProduk');
            }
        }
    }

    public function editProduk($id_produk)
    {
        $data['user'] = $this->db->get_where('alumni', ['username' => $this->session->userdata('username')])->row_array();
        $data['kategori'] = $this->modelKategori->getAll();
        $data['produk'] = $this->modelProduk->getidProduk($id_produk);

        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');
        $this->form_validation->set_rules('id_kategori', 'Nama Kategori', 'required');
        $this->form_validation->set_rules('berat_produk', 'Berat Produk', 'required');
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
            // Jika upload file berhasil
            $file = './assets/upload/produk/' . $data['produk']['image'];

                // Coba hapus file lama
                if (is_readable($file) && unlink($file)) {
                    // Jika file lama berhasil dihapus
                    $this->modelProduk->editfile($this->upload->data());

                    // Flash message untuk sukses edit dengan penghapusan file lama
                    $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
                        Data Produk Berhasil Diperbaharui dan File Lama Dihapus!
                    </div>');

                    redirect('Alumni/DataProduk');
                } else {
                    // Jika file lama tidak bisa dihapus
                    $this->modelProduk->editfile($this->upload->data());

                    // Flash message untuk sukses edit tanpa menghapus file lama
                    $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
                        Data Produk Berhasil Diperbaharui!
                    </div>');

                    redirect('Alumni/DataProduk');
                }
            } else {
                // Jika upload file gagal
                $error = $this->upload->display_errors(); // Ambil error dari upload

                // Tetap edit data produk tanpa file baru
                $this->modelProduk->edit();

                // Flash message untuk sukses edit tanpa upload file
                $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
                    Data Produk Berhasil Diperbaharui, tetapi file tidak ada!
                </div>');

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
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Data Produk Berhasil Dihapus dan File Lama Dihapus!
            </div>');
            redirect('Alumni/DataProduk');
        } else {
            $this->modelProduk->hapus($id_produk);
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Data Produk Berhasil Dihapus!
            </div>');
            redirect('Alumni/DataProduk');
        }
    }

    // Halaman Data Pesanan
    public function DataPesanan()
    {
        $data['user'] = $this->db->get_where('alumni', ['username' => $this->session->userdata('username')])->row_array();
        $data['pesanan'] = $this->modelPesanan->getPesananAlumni();

        $this->load->view('layoutDashboard/header', $data);
        $this->load->view('layoutDashboard/sidebar', $data);
        $this->load->view('layoutDashboard/navbar', $data);
        $this->load->view('pesanan/index', $data);
        $this->load->view('layoutDashboard/footer', $data);
    }
    
    public function PesananDiproses()
    {
        $data['user'] = $this->db->get_where('alumni', ['username' => $this->session->userdata('username')])->row_array();
        $data['pesanan'] = $this->modelPesanan->menungguProses();

        $this->load->view('layoutDashboard/header', $data);
        $this->load->view('layoutDashboard/sidebar', $data);
        $this->load->view('layoutDashboard/navbar', $data);
        $this->load->view('pesanan/index', $data);
        $this->load->view('layoutDashboard/footer', $data);
    }
    
    public function DetailPesanan($id_pesanan)
    {
        $data['user'] = $this->db->get_where('alumni', ['username' => $this->session->userdata('username')])->row_array();
        $data['pesanan'] = $this->modelPesanan->getidPesanan($id_pesanan);

        $this->load->view('layoutDashboard/header', $data);
        $this->load->view('layoutDashboard/sidebar', $data);
        $this->load->view('layoutDashboard/navbar', $data);
        $this->load->view('pesanan/detail', $data);
        $this->load->view('layoutDashboard/footer', $data);
    }
    
    public function editStatusPesanan()
    {
        $this->modelPesanan->editStatusPesanan();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Status Pesanan Berhasil Diperbaharui!
        </div>');
        redirect('Alumni/DataPesanan');
    }

    // Halaman Review
    public function DataReview()
    {
        $data['user'] = $this->db->get_where('alumni', ['username' => $this->session->userdata('username')])->row_array();
        $data['review'] = $this->modelReview->getAlumniReview();

        $this->load->view('layoutDashboard/header', $data);
        $this->load->view('layoutDashboard/sidebar', $data);
        $this->load->view('layoutDashboard/navbar', $data);
        $this->load->view('review/index', $data);
        $this->load->view('layoutDashboard/footer', $data);
    }
}