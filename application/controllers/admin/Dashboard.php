<?php

class Dashboard extends CI_Controller
{
    function index() {
        $data['title'] = 'Dashboard';
        
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dashboard');
        $this->load->view('templates_admin/footer');
    }
    
}

?>