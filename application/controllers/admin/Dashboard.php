<?php

class Dashboard extends CI_Controller
{
    public function __construct() {
        parent::__construct();

        if ($this->session->userdata('role_id') != 1) {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>NGA DL XOB</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
            redirect('Auth');
        }
    }

    public function index() {
        $data['title'] = 'Dashboard';
        
        $pegawai = $this->db->query("SELECT * FROM data_pegawai");
        $data['pegawai'] = $pegawai->num_rows();
        
        $admin = $this->db->query("SELECT * FROM data_pegawai WHERE jabatan = 'Admin'");
        $data['admin'] = $admin->num_rows();
        
        $jabatan = $this->db->query("SELECT * FROM data_jabatan");
        $data['jabatan'] = $jabatan->num_rows();
        
        $absensi = $this->db->query("SELECT * FROM data_absensi");
        $data['absensi'] = $absensi->num_rows();
        
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('templates_admin/footer');
    }
    
}

?>