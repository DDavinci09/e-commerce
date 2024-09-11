<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller
{

    public function index()
    {
        $data['users'] = $this->modelUser->getUsers();

        $this->load->view('layoutDashboard/header', $data);
        $this->load->view('layoutDashboard/sidebar', $data);
        $this->load->view('layoutDashboard/navbar', $data);
        $this->load->view('kategori/index', $data);
        $this->load->view('layoutDashboard/footer', $data);
    }
}