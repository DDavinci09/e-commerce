<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        $data['user'] = $this->db->get_where('alumni', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('layoutHome/header', $data);
        $this->load->view('layoutHome/navbar', $data);
        $this->load->view('home/index', $data);
        $this->load->view('layoutHome/footer', $data);
    }
    public function shop()
    {
        $this->load->view('layoutHome/header');
        $this->load->view('layoutHome/navbar');
        $this->load->view('home/shop');
        $this->load->view('layoutHome/footer');
    }
}