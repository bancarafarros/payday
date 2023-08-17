<?php

class DataJabatan extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();
		$this->load->model('M_penggajian', 'penggajian');
	}

    public function _rules() {
        $this->form_validation->set_rules('nama_jabatan', 'nama jabatan', 'required');
        $this->form_validation->set_rules('gaji_pokok', 'gaji pokok', 'required');
        $this->form_validation->set_rules('tj_transport', 'tunjangan transport', 'required');
        $this->form_validation->set_rules('uang_makan', 'uang makan', 'required');
    }
    
    public function index() {
        $data['title'] = 'Data Jabatan';
        $data['jabatan'] = $this->penggajian->getData('data_jabatan')->result();

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data-jabatan', $data);
        $this->load->view('templates_admin/footer');
    }

    public function halamanTambahJabatan() {
        $data['title'] = 'Tambah Data Jabatan';

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
            $this->penggajian->createData($arrayInsert, 'data_jabatan');
            $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Selamat, data berhasil ditambahkan!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/DataJabatan');
        }
    }

    public function halamanUpdateJabatan($id) {
        $data['title'] = 'Update Data Jabatan';
        $where = array('id_jabatan' => $id);
        $data['jabatan'] = $this->db->query("SELECT * FROM data_jabatan WHERE id_jabatan = '$id'")->result();
    
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/update-data-jabatan', $data);
        $this->load->view('templates_admin/footer');
    }
    
    public function updateJabatan() {
        $this->_rules();
    
        if ($this->form_validation->run() == FALSE) {
            $this->halamanUpdateJabatan($id);
        } else {
            $id           = $this->input->post('id_jabatan');
            $nama_jabatan = $this->input->post('nama_jabatan');
            $gaji_pokok   = $this->input->post('gaji_pokok');
            $tj_transport = $this->input->post('tj_transport');
            $uang_makan   = $this->input->post('uang_makan');
    
            $arrayUpdate = array(
                'nama_jabatan' => $nama_jabatan,
                'gaji_pokok' => $gaji_pokok,
                'tj_transport' => $tj_transport,
                'uang_makan' => $uang_makan
            );

            $where = array(
                'id_jabatan' => $id
            );

            $this->penggajian->updateData('data_jabatan', $arrayUpdate, $where);
            $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Selamat, data berhasil diupdate!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/DataJabatan');
        }
    }

    public function deleteJabatan($id) {
        $where = array('id_jabatan' => $id);
        $this->penggajian->deleteData($where, 'data_jabatan');
        $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Selamat, data berhasil dihapus!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/DataJabatan');
    }
}

?>