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
        // $data['totalReview'] = count($this->modelReview->getAll());

        $this->load->view('layoutDashboard/header', $data);
        $this->load->view('layoutDashboard/sidebar', $data);
        $this->load->view('layoutDashboard/navbar', $data);
        $this->load->view('dashboard/index', $data);
        $this->load->view('layoutDashboard/footer', $data);
    }

    public function MyProfile()
    {
        $data['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('layoutDashboard/header', $data);
        $this->load->view('layoutDashboard/sidebar', $data);
        $this->load->view('layoutDashboard/navbar', $data);
        $this->load->view('admin/myprofile', $data);
        $this->load->view('layoutDashboard/footer', $data);
    }

    public function editProfileAdmin()
    {
        $data['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        
        $data = [
            'nama' => $this->input->post('nama', true),
            'api_key' => $this->input->post('api_key', true)
        ];
        // Update data di database
        $this->db->where('id_admin', $this->session->userdata('id_admin'));
        $this->db->update('admin', $data);
        
        redirect('Admin/MyProfile');
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
            redirect('Admin/MyProfile');
        } else {
            $username = $this->input->post('username');
            $new_password = $this->input->post('password1');

            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            ];

            // Update data di database
            $this->db->where('id_admin', $this->session->userdata('id_admin'));
            $this->db->update('admin', $data);

            $this->session->set_userdata($data);

            $this->session->set_flashdata('message', 'Data berhasil diupdate');
            redirect('Admin/MyProfile');
        }
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
    
    public function ProfileAlumni($id_alumni)
    {
        $data['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $data['alumni'] = $this->modelAlumni->getidAlumni($id_alumni);

        $this->load->view('layoutDashboard/header', $data);
        $this->load->view('layoutDashboard/sidebar', $data);
        $this->load->view('layoutDashboard/navbar', $data);
        $this->load->view('alumni/detail', $data);
        $this->load->view('layoutDashboard/footer', $data);
    }
    
    public function ProdukAlumni($id_alumni)
    {
        $data['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $data['alumni'] = $this->modelAlumni->getidAlumni($id_alumni);
        $data['produk'] = $this->modelProduk->getProdukAlumnibyId($id_alumni);

        $this->load->view('layoutDashboard/header', $data);
        $this->load->view('layoutDashboard/sidebar', $data);
        $this->load->view('layoutDashboard/navbar', $data);
        $this->load->view('produk/index', $data);
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

    // Hapus Alumni
    public function deleteAlumni($id_alumni)
    {
        // Ambil semua data produk yang terkait dengan alumni ini
        $produkList = $this->modelProduk->getProdukByAlumni($id_alumni);
        
        // Hapus semua file gambar produk yang terkait
        foreach ($produkList as $produk) {
            $file = './assets/upload/produk/' . $produk['image'];
            
            if (is_readable($file)) {
                unlink($file); // Hapus file gambar produk jika ditemukan
            }
        }

        // Hapus data produk terkait dari database
        $this->db->where('id_alumni', $id_alumni);
        $this->db->delete('produk');

        // Hapus data alumni dari database
        $this->db->where('id_alumni', $id_alumni);
        $this->db->delete('alumni');

        // Set pesan flash dan redirect ke halaman Alumni
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Data Alumni dan Produk Terkait Berhasil Dihapus Beserta File Gambar Produk!
        </div>');
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
    
    public function ProfileUser($id_user)
    {
        $data['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $data['users'] = $this->modelUser->getidUser($id_user);

        $this->load->view('layoutDashboard/header', $data);
        $this->load->view('layoutDashboard/sidebar', $data);
        $this->load->view('layoutDashboard/navbar', $data);
        $this->load->view('user/detail', $data);
        $this->load->view('layoutDashboard/footer', $data);
    }

    public function deleteUser($id_user)
    {
        // Hapus data user dari database
        $this->db->where('id_user', $id_user);
        $this->db->delete('user');

        // Set pesan flash dan redirect ke halaman Users
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Data User Berhasil Dihapus!
        </div>');
        redirect('Admin/DataUser');
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

    public function PesananDiproses()
    {
        $data['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $data['pesanan'] = $this->modelPesanan->menungguProsesAdmin();

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
    
    // Menu Admin
    public function Rekening() 
    {
        $data['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $data['rekening'] = $this->modelAdmin->getallRekening();

        $this->form_validation->set_rules('nama_bank', 'Nama Bank', 'required');
        $this->form_validation->set_rules('no_rekening', 'No Rekening', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layoutDashboard/header', $data);
            $this->load->view('layoutDashboard/sidebar', $data);
            $this->load->view('layoutDashboard/navbar', $data);
            $this->load->view('admin/rekening', $data);
            $this->load->view('layoutDashboard/footer', $data);
        } else {
            $this->modelAdmin->tambahRekening();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data Rekening Berhasil Ditambahkan!
        </div>');
            redirect('Admin/Rekening'); 
        }
    }

    public function editRekening($id_rekening) 
    {
        $data['rekening'] = $this->modelAdmin->getidRekening($id_rekening);

        $this->modelAdmin->editRekening($id_rekening);
        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
        Data Rekening Berhasil Diedit!
        </div>');
        redirect('Admin/Rekening'); 
    }

    public function hapusRekening($id_rekening) 
    {
        $data['rekening'] = $this->modelAdmin->getidRekening($id_rekening);

        $this->modelAdmin->hapusRekening($id_rekening);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        Data Rekening Berhasil Dihapus!
        </div>');
        redirect('Admin/Rekening'); 
    }
    
    public function statusRekening($id_rekening, $status) 
    {
        $status = str_replace('_', ' ', $status); // Ubah kembali underscore ke spasi

        $statusData = [
            "status" => $status
        ];

        $this->db->update('rekening', $statusData, ['id_rekening' => $id_rekening]);

        // Set flash message
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Status Rekening Berhasil Diperbarui!
        </div>');

        // Redirect kembali ke halaman rekening
        redirect('Admin/Rekening'); 
    }

    public function Kontak() 
    {
        $data['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();        
        $data['kontak'] = $this->modelAdmin->getKontak();

        $this->load->view('layoutDashboard/header', $data);
        $this->load->view('layoutDashboard/sidebar', $data);
        $this->load->view('layoutDashboard/navbar', $data);
        $this->load->view('admin/kontak', $data);
        $this->load->view('layoutDashboard/footer', $data);
    }

    public function editKontak() 
    {
        $id_kontak = $this->input->post('id_kontak'); // Ambil id_kontak dari input
        $data = [
            'email' => $this->input->post('email'),
            'instagram' => $this->input->post('instagram'),
            'tiktok' => $this->input->post('tiktok'),
            'youtube' => $this->input->post('youtube'),
            'whatsapp' => $this->input->post('whatsapp'),
            'alamat' => $this->input->post('alamat'),
        ];

        $this->modelAdmin->updateKontak($id_kontak, $data);
        // Set flash message
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Kontak Berhasil Diperbarui!
        </div>');
        redirect('Admin/Kontak');
    }

    public function Profile() 
    {
        $data['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();        
        $data['profil'] = $this->modelAdmin->getProfile();

        $this->load->view('layoutDashboard/header', $data);
        $this->load->view('layoutDashboard/sidebar', $data);
        $this->load->view('layoutDashboard/navbar', $data);
        $this->load->view('admin/profile', $data);
        $this->load->view('layoutDashboard/footer', $data);
    }

    public function editProfile()
{
    $id_profile = $this->input->post('id_profile'); // Ambil ID profil

    // Ambil input dari form
    $data = [
        'nama_profil' => $this->input->post('nama_profil'),
        'isi_profil' => $this->input->post('isi_profil')
    ];

    // Cek apakah ada file gambar yang diupload
    if (!empty($_FILES['gambar_profil']['name'])) {
        $config['upload_path'] = './assets/upload/profile/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2048; // Maksimal 2MB
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar_profil')) {
            // Jika upload berhasil, simpan nama file baru di database
            $upload_data = $this->upload->data();
            $data['gambar_profil'] = $upload_data['file_name'];

            // Hapus gambar lama (opsional)
            $old_image = $this->modelAdmin->getProfileById($id_profile)['gambar_profil'];
            if (file_exists('./assets/upload/profile/' . $old_image)) {
                unlink('./assets/upload/profile/' . $old_image);
            }
        } else {
            // Jika gagal upload, tampilkan pesan error
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'
            . $this->upload->display_errors() . '</div>');
            redirect('Admin/editProfile');
        }
    }

    // Update data profil di database
    $this->modelAdmin->updateProfile($id_profile, $data);

    // Set flash message
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profil Berhasil Diperbarui!</div>');
    redirect('Admin/Profile');
}

    public function Banner() 
    {
        $data['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $data['banner'] = $this->modelAdmin->getallBanner();

        $this->form_validation->set_rules('nama_banner', 'Nama Banner', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layoutDashboard/header', $data);
            $this->load->view('layoutDashboard/sidebar', $data);
            $this->load->view('layoutDashboard/navbar', $data);
            $this->load->view('admin/banner', $data);
            $this->load->view('layoutDashboard/footer', $data);
        } else {
            // Konfigurasi upload file
            $config['upload_path'] = './assets/upload/banner';
            $config['allowed_types'] = 'jpg|jpeg|png|PNG';
            $config['max_size'] = '10000';

            $this->load->library('upload', $config);

            // Initialize config upload
            $this->upload->initialize($config);

            if ($this->upload->do_upload('file')) {
                // Ambil data upload
                $upload_data = $this->upload->data();

                // Simpan data banner ke database
                $data = [
                    'nama_banner' => $this->input->post('nama_banner'), // Ganti dengan nama input form Anda
                    'file' => $upload_data['file_name'], // Nama file yang diupload
                    'status' => 'Aktif'
                ];

                $this->modelAdmin->tambahBanner($data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Data Banner Berhasil Ditambahkan!
                </div>');
                redirect('Admin/Banner'); 
            } else {
                // Jika upload gagal
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Gagal menambahkan data banner! Error: ' . $this->upload->display_errors() . '
                </div>');
                redirect('Admin/Banner'); 
            }
        }
    }

    public function statusBanner($id_banner, $status) 
    {
        $status = str_replace('_', ' ', $status); // Ubah kembali underscore ke spasi

        $statusData = [
            "status" => $status
        ];

        $this->db->update('banner', $statusData, ['id_banner' => $id_banner]);

        // Set flash message
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Status Banner Berhasil Diperbarui!
        </div>');

        // Redirect kembali ke halaman rekening
        redirect('Admin/Banner'); 
    }

    public function hapusBanner($id_banner)
{
    // Ambil data banner berdasarkan ID
    $data['banner'] = $this->modelAdmin->getidBanner($id_banner);
    
    if (empty($data['banner'])) {
        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
            Banner tidak ditemukan!
        </div>');
        redirect('Admin/Banner');
        return;
    }

    $file = './assets/upload/banner/' . $data['banner']['file'];

    // Cek apakah file ada dan dapat dibaca
    if (is_readable($file)) {
        // Coba hapus file
        if (unlink($file)) {
            // Jika berhasil hapus file
            $this->modelAdmin->hapusBanner($id_banner);
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Data Banner Berhasil Dihapus!
            </div>');
        } else {
            // Jika gagal hapus file
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Gagal menghapus file banner, tetapi data tetap dihapus dari database.
            </div>');
            // Tetap hapus banner dari database
            $this->modelAdmin->hapusBanner($id_banner);
        }
    } else {
        // Jika file tidak ditemukan, tetap hapus banner dari database
        $this->modelAdmin->hapusBanner($id_banner);
        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
            File banner tidak ditemukan, tetapi data berhasil dihapus dari database.
        </div>');
    }

    redirect('Admin/Banner');
}



}