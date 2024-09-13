<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Alumni extends CI_Controller
{

    public function index()
    {
        $data['alumni'] = $this->modelAlumni->getAll();

        $this->load->view('layoutDashboard/header', $data);
        $this->load->view('layoutDashboard/sidebar', $data);
        $this->load->view('layoutDashboard/navbar', $data);
        $this->load->view('alumni/index', $data);
        $this->load->view('layoutDashboard/footer', $data);
    }
}