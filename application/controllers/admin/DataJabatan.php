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
        $this->load->view('admin/data-jabatan', $data);
        $this->load->view('templates_admin/footer');
    }

    public function halamanTambahJabatan() {
        $data['title'] = 'Data Jabatan';

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/tambah-data-jabatan', $data);
        $this->load->view('templates_admin/footer');
    }

    public function createJabatan() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->halamanTambahJabatan();
        } else {
            $nama_jabatan = $this->input->post('nama_jabatan');
            $gaji_pokok = $this->input->post('gaji_pokok');
            $tj_transport = $this->input->post('tj_transport');
            $uang_makan = $this->input->post('uang_makan');

            $arrayInsert = array(
                'nama_jabatan' => $nama_jabatan,
                'gaji_pokok' => $gaji_pokok,
                'tj_transport' => $tj_transport,
                'uang_makan' => $uang_makan
            );
            $this->penggajian->createJabatan($arrayInsert, 'data_jabatan');
            $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" 
            role="alert">Selamat, data berhasil ditambahkan!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            redirect('admin/DataJabatan');
        }
    }
}

?>