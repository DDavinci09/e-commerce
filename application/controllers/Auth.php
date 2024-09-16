<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
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
                    redirect('User');
                } else {
                    // password salah
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Wrong password!
                    </div>');
                    redirect('auth/loginUser');
                }
            } else {
                // username tidak terdatar terdaftar
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            username is not registered!
            </div>');
                echo "tidak terdaftar";
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
                        redirect('Alumni');
                    } else {
                        // password salah
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Wrong password!
                    </div>');
                        redirect('auth/loginAlumni');
                    }
                } else {
                    // username tidak aktif
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                This username is not been activated!
                </div>');
                    redirect('auth/loginAlumni');
                }
            } else {
                // username tidak terdatar terdaftar
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            username is not registered!
            </div>');
                echo "tidak terdaftar";
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
                // berhasil login
                $data = [
                    'username' => $user['username'],
                    'nama' => $user['nama'],
                    'role' => $user['role']
                ];
                $this->session->set_userdata($data);
                redirect('Admin');
            } else {
                // password salah
                echo "password salah";
            }
        }
    }

    public function registerUser()
    {
        //Form Validation
        $this->form_validation->set_rules('nama_user', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
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
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Congratulation! Your account has been created. Please Login first
            </div>');
            redirect('auth');
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
            // Prepare data to be inserted into the alumni table
            $data = [
                'nama' => $this->input->post('nama', true),
                'nama_toko' => $this->input->post('nama_toko', true),
                'keterangan_toko' => $this->input->post('keterangan_toko', true),
                'alamat_toko' => $this->input->post('alamat_toko', true),
                'no_telp' => $this->input->post('no_telp', true),
                'email' => $this->input->post('email', true),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role' => "Alumni", // Misal 2 untuk alumni
                'status' => "Tidak Aktif" // 1 untuk aktif, bisa sesuaikan jika ada aturan lain
            ];

            // Insert data into the alumni table
            if ($this->db->insert('alumni', $data)) {
                // Set success message
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! Your account has been created. Please login.</div>');
                redirect('auth');
            } else {
                // Handle database error
                $error = $this->db->error();
                echo 'Database Error: ' . $error['message'];
            }
        }
    }

    public function registerAlumni2()
    {
        //Form Validation
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        // $this->form_validation->set_rules('nama_toko', 'nama_toko', 'required|trim');
        // $this->form_validation->set_rules('keterangan_toko', 'keterangan_toko', 'required|trim');
        // $this->form_validation->set_rules('alamat_toko', 'alamat_toko', 'required|trim');
        // $this->form_validation->set_rules('email', 'Email', 'required|trim');
        // $this->form_validation->set_rules('no_telp', 'No Telp', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[alumni.username]', [
            'is_unique' => 'This username has already registered!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');


        if ($this->form_validation->run() == false) {
            $this->load->view('layoutHome/authheader');
            $this->load->view('auth/registerAlumni');
            $this->load->view('layoutHome/authfooter');
        } else {
            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'nama' => $this->input->post('nama', true),
                'no_telp' => $this->input->post('no_telp', true),
                'email' => $this->input->post('email', true),
                'nama_toko' => $this->input->post('nama_toko', true),
                'keterangan_toko' => $this->input->post('keterangan_toko', true),
                'alamat_toko' => $this->input->post('alamat_toko', true),
                'role' => "Alumni",
                'status' => "Tidak Aktif"
            ];

            $this->db->insert('alumni', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Congratulation! Your account has been created. Please Login first
            </div>');
            redirect('auth');
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
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Congratulation! Your account has been created. Please Login first
            </div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        session_destroy();

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        You have been logged out!
        </div>');
        redirect('Home');
    }

}