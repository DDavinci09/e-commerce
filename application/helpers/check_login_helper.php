<?php

function loginUser()
{
    $ci = get_instance();
    // Cek apakah user sudah login dan role-nya adalah 'User'
    if (!$ci->session->userdata('username') || $ci->session->userdata('role') !== 'User') {
        // Jika belum login atau bukan role 'User', redirect ke halaman login
        redirect('auth/loginUser');
    }
}

function loginAlumni()
{

}

function loginAdmin()
{

}