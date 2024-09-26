<?php

function loginUser()
{
    $ci = get_instance();
    // Cek apakah user sudah login dan role-nya adalah 'User'
    if (!$ci->session->userdata('username') || $ci->session->userdata('role') !== 'User') {
        // Jika belum login atau bukan role 'User', redirect ke halaman login
        $ci->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
                    Silahkan login sebagai User!
                    </div>');
        redirect('Auth');
    }
}

function loginAlumni()
{
    $ci = get_instance();
    // Cek apakah user sudah login dan role-nya adalah 'Alumni'
    if (!$ci->session->userdata('username') || $ci->session->userdata('role') !== 'Alumni') {
        // Jika belum login atau bukan role 'Alumni', redirect ke halaman login
        $ci->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
                    Silahkan login sebagai Alumni!
                    </div>');
        redirect('Auth');
    }
}

function loginAdmin()
{
    $ci = get_instance();
    // Cek apakah user sudah login dan role-nya adalah 'Admin'
    if (!$ci->session->userdata('username') || $ci->session->userdata('role') !== 'Admin') {
        // Jika belum login atau bukan role 'Admin', redirect ke halaman login
        $ci->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
                    Silahkan login sebagai Admin!
                    </div>');
        redirect('Auth');
    }
}

function Home()
{
    $ci = get_instance();
    // Cek apakah user sudah login dan role-nya adalah 'Admin'
    if ($ci->session->userdata('username')) {
        if ($ci->session->userdata('role') == 'Admin') {
            redirect('Admin');
        } else if ($ci->session->userdata('role') == 'Alumni') { 
            redirect('Alumni');
        } else {
            redirect('User');
        }
    }
}