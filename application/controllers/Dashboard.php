<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function index()
    {
        $data['dashboard'] = "Selamat Datang";

        $this->load->view('layoutDashboard/header', $data);
        $this->load->view('layoutDashboard/sidebar', $data);
        $this->load->view('layoutDashboard/navbar', $data);
        $this->load->view('dashboard/index', $data);
        $this->load->view('layoutDashboard/footer', $data);
    }
}