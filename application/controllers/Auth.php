<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        // Aturan validasi form
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layoutHome/authheader');
            $this->load->view('auth/index');
            $this->load->view('layoutHome/authfooter');
        } else {
            $this->_Auth();
        }
    }
    
    private function _Auth() 
    {
        // Ambil input dari form
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $role = $this->input->post('role');

        // Cek role dan panggil model sesuai role
        if ($role == 'Admin') {
            $user = $this->modelUser->loginAdmin($username, $password);
        } elseif ($role == 'User') {
            $user = $this->modelUser->loginUser($username, $password);
        } elseif ($role == 'Alumni') {
            $user = $this->modelUser->loginAlumni($username, $password);
        } else {
            $user = null;
        }

        // Jika usernya ada
        if ($user) {
            // Cek status "Approve" hanya untuk alumni
            if ($role == 'Alumni' && $user['status'] != "Approve") {
                // Jika status bukan "Approve"
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Username belum aktif!
                    </div>');
                redirect('Auth');
            }

            // Cek password
            if (password_verify($password, $user['password'])) {
                if ($role == 'User') {
                    $data = [
                        'id_user' => $user['id_user'],
                        'username' => $user['username'],
                        'role' => $user['role']
                    ];
                } else if ($role == 'Alumni') {
                    $data = [
                        'id_alumni' => $user['id_alumni'],
                        'username' => $user['username'],
                        'role' => $user['role']
                    ];
                } else {
                    $data = [
                        'id_admin' => $user['id_admin'],
                        'username' => $user['username'],
                        'role' => $user['role']
                    ];
                }
                
                // Jika password benar, set session
                $this->session->set_userdata($data);

                // Redirect sesuai role
                if ($role == 'Admin') {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Login berhasil, Selamat Datang Admin!
                    </div>');
                    redirect('Admin');
                } elseif ($role == 'User') {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Login berhasil, Selamat Datang User!
                    </div>');
                    redirect('User');
                } elseif ($role == 'Alumni') {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Login berhasil, Selamat Datang Alumni!
                    </div>');
                    redirect('Alumni');
                }
            } else {
                // Jika password salah
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Password salah!
                    </div>');
                redirect('Auth');
            }
        } else {
            // Jika user tidak terdaftar
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Username tidak terdaftar!
                </div>');
            redirect('Auth');
        }
    }
    
    // Proses Register
    public function registerUser()
    {
        //Form Validation
        $this->form_validation->set_rules('nama_user', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('no_telp', 'No Telp', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
            'is_unique' => 'This username has already registered!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('layoutHome/authheader');
            $this->load->view('auth/registerUser');
            $this->load->view('layoutHome/authfooter');
        } else {
            $data = [
                'nama_user' => $this->input->post('nama_user', true),
                'email' => $this->input->post('email', true),
                'no_telp' => $this->input->post('no_telp', true),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role' => "User"
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun Anda Berhasil Dibuat!</div>');
            redirect('Auth');
        }
    }

    public function registerAlumni()
    {
        // Form Validation
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('nama_toko', 'Nama Toko', 'required|trim');
        $this->form_validation->set_rules('keterangan_toko', 'Keterangan Toko', 'required|trim');
        $this->form_validation->set_rules('alamat_toko', 'Alamat Toko', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('no_telp', 'No Telp', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[alumni.username]', [
            'is_unique' => 'This username has already registered!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Passwords do not match!',
            'min_length' => 'Password is too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Confirm Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            // Load view with form
            $this->load->view('layoutHome/authheader');
            $this->load->view('auth/registerAlumni');
            $this->load->view('layoutHome/authfooter');
        } else {
            // Data Provinsi dan Kota Asal
            $id_provinsi = $this->input->post('id_provinsi');
            $nama_provinsi = $this->input->post('nama_provinsi');
            $id_kota = $this->input->post('id_kota');
            $nama_kota = $this->input->post('nama_kota');
            // Prepare data to be inserted into the alumni table
            $data = [
                'nama' => $this->input->post('nama', true),
                'nama_toko' => $this->input->post('nama_toko', true),
                'keterangan_toko' => $this->input->post('keterangan_toko', true),
                'alamat_toko' => $this->input->post('alamat_toko', true),
                'id_provinsi' => $id_provinsi,
                'nama_provinsi' => $nama_provinsi,
                'id_kota' => $id_kota,
                'nama_kota' => $nama_kota,
                'no_telp' => $this->input->post('no_telp', true),
                'no_rekening' => $this->input->post('no_rekening', true),
                'email' => $this->input->post('email', true),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role' => "Alumni", // Misal 2 untuk alumni
                'status' => "Decline" // 1 untuk aktif, bisa sesuaikan jika ada aturan lain
            ];

            // Insert data into the alumni table
            $this->db->insert('alumni', $data);
            // Set success message
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun Anda Berhasil Dibuat!</div>');
            redirect('Auth');
        }
    }

    public function registerAdmin()
    {
        //Form Validation
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[admin.username]', [
            'is_unique' => 'This username has already registered!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('layoutHome/authheader');
            $this->load->view('auth/registerAdmin');
            $this->load->view('layoutHome/authfooter');
        } else {
            $data = [
                'nama' => $this->input->post('nama', true),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role' => "Admin"
            ];

            $this->db->insert('admin', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun Anda Berhasil Dibuat!</div>');
            redirect('Auth');
        }
    }

    // Proses Logout
    public function logout()
    {
        session_destroy();
        // Hapus data sesi tanpa menghancurkan seluruh sesi
        // $this->session->unset_userdata($data);

        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
        Anda telah Logout!
        </div>');
        redirect('Home');
    }


    // Proses Login
    public function loginUser()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // Atur validasi form
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('layoutHome/authheader');
            $this->load->view('auth/loginUser');
            $this->load->view('layoutHome/authfooter');
        } else {
            $user = $this->db->get_where('user', ['username' => $username])->row_array();
            // jika usernya ada
            if ($user) {
                // cek password
                if (password_verify($password, $user['password'])) {
                    // berhasil login
                    $data = [
                        'id_user' => $user['id_user'],
                        'username' => $user['username'],
                        'nama_user' => $user['nama_user'],
                        'role' => $user['role']
                    ];
                    $this->session->set_userdata($data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Login berhasil, Selamat Datang User!
                    </div>');
                    redirect('User');
                } else {
                    // password salah
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Password salah!
                    </div>');
                    redirect('auth/loginUser');
                }
            } else {
                // username tidak terdatar terdaftar
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Username tidak terdaftar!
                </div>');
                redirect('auth/loginUser');
            }
        }
    }

    public function loginAlumni()
    {
        // Atur validasi form
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('layoutHome/authheader');
            $this->load->view('auth/loginAlumni');
            $this->load->view('layoutHome/authfooter');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = $this->db->get_where('alumni', ['username' => $username])->row_array();

            // jika usernya ada
            if ($user) {
                // jika usernya Approve
                if ($user['status'] == "Approve") {
                    // cek password
                    if (password_verify($password, $user['password'])) {
                        // berhasil login
                        $data = [
                            'id_alumni' => $user['id_alumni'],
                            'username' => $user['username'],
                            'nama' => $user['nama'],
                            'role' => $user['role'],
                            'status' => $user['status']
                        ];
                        $this->session->set_userdata($data);
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                        Login berhasil, Selamat Datang Alumni!
                        </div>');
                        redirect('Alumni');
                    } else {
                        // password salah
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                        Password salah!
                        </div>');
                        redirect('auth/loginAlumni');
                    }
                } else {
                    // username tidak aktif
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Username belum aktif!
                    </div>');
                    redirect('auth/loginAlumni');
                }
            } else {
                // username tidak terdatar terdaftar
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Username tidak terdaftar!
                </div>');
                redirect('auth/loginAlumni');
            }
        }
    }

    public function loginAdmin()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // Atur validasi form
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('layoutHome/authheader');
            $this->load->view('auth/loginAdmin');
            $this->load->view('layoutHome/authfooter');
        } else {
            $user = $this->db->get_where('admin', ['username' => $username])->row_array();
            // jika usernya ada
            if ($user) {
                if (password_verify($password, $user['password'])) {
                    // berhasil login
                    $data = [
                        'username' => $user['username'],
                        'nama' => $user['nama'],
                        'role' => $user['role']
                    ];
                    $this->session->set_userdata($data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Login berhasil, Selamat Datang Admin!
                    </div>');
                    redirect('Admin');
                } else {
                    // password salah
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Password salah!
                    </div>');
                    redirect('auth/loginAdmin');
                }
            } else {
                // username tidak terdatar terdaftar
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Username tidak terdaftar!
                </div>');
                redirect('auth/loginAdmin');
            }
        }
    }

}