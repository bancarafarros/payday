<?php

class DataJabatan extends CI_Controller
{
    // public function __construct()
	// {
	// 	parent::__construct();
	// 	$this->load->model('M_penggajian', 'penggajian');
	// }
    
    public function index() {
        $this->load->model('M_penggajian', 'penggajian');

        $data['title'] = 'Data Jabatan';
        $data['jabatan'] = $this->penggajian->getData('data_jabatan')->result();

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_jabatan', $data);
        $this->load->view('templates_admin/footer');
    }

    public function createJabatan() {
        $data['title'] = 'Data Jabatan';

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_jabatan', $data);
        $this->load->view('templates_admin/footer');
    }
}

?>