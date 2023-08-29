<?php

class Dashboard extends CI_Controller
{
    public function __construct() {
        parent::__construct();

        if ($this->session->userdata('role_id') != 2) {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>NGA DL XOB</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
            redirect('Auth');
        }
    }
    
    public function index() {
        $data['title'] = 'Dashboard';

        $id_pegawai = $this->session->userdata('id_pegawai');
        $data['pegawai'] = $this->db->query("SELECT * FROM data_pegawai WHERE id_pegawai = '$id_pegawai'")->result();
        
        $this->load->view('templates_pegawai/header', $data);
        $this->load->view('templates_pegawai/sidebar');
        $this->load->view('pegawai/dashboard', $data);
        $this->load->view('templates_pegawai/footer');
    }
    
}

?>