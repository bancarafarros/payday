<?php

class Dashboard extends CI_Controller
{
    function index() {
        $data['title'] = 'Dashboard';
        
        $pegawai = $this->db->query("SELECT * FROM data_pegawai");
        $data['pegawai'] = $pegawai->num_rows();
        
        $admin = $this->db->query("SELECT * FROM data_pegawai WHERE jabatan = 'Admin'");
        $data['admin'] = $admin->num_rows();
        
        $jabatan = $this->db->query("SELECT * FROM data_jabatan");
        $data['jabatan'] = $jabatan->num_rows();
        
        $kehadiran = $this->db->query("SELECT * FROM data_kehadiran");
        $data['kehadiran'] = $kehadiran->num_rows();
        
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dashboard');
        $this->load->view('templates_admin/footer');
    }
    
}

?>