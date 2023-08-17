<?php

class DataPegawai extends CI_Controller
{
    // public function __construct()
	// {
	// 	parent::__construct();
	// 	$this->load->model('M_penggajian', 'penggajian');
	// }

    // public function _rules() {
    //     $this->form_validation->set_rules('nama_jabatan', 'nama jabatan', 'required');
    //     $this->form_validation->set_rules('gaji_pokok', 'gaji pokok', 'required');
    //     $this->form_validation->set_rules('tj_transport', 'tunjangan transport', 'required');
    //     $this->form_validation->set_rules('uang_makan', 'uang makan', 'required');
    // }
    
    public function index() {
        $data['title'] = 'Data Pegawai';
        $data['pegawai'] = $this->penggajian->getData('data_pegawai')->result();

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data-pegawai', $data);
        $this->load->view('templates_admin/footer');
    }
}

?>