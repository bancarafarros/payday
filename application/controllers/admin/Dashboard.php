<?php

class Dashboard extends CI_Controller
{
    function index() {
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/dashboard');
        $this->load->view('admin/footer');
    }
    
}

?>