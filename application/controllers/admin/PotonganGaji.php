<?php

class PotonganGaji extends CI_Controller
{
    public function __construct() {
		parent::__construct();

        if ($this->session->userdata('role_id') != 1) {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>NGA DL XOB</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
            redirect('Auth');
        }
        
		$this->load->model('M_penggajian', 'penggajian');
	}

    public function _rules() {
        $this->form_validation->set_rules('potongan', 'potongan', 'required');
        $this->form_validation->set_rules('jml_potongan', 'jumlah potongan', 'required');
    }
    
    public function index() {
        $data['title'] = "Setting Potongan Gaji";
        $data['potongan_gaji'] = $this->penggajian->getData('potongan_gaji')->result();

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/potongan-gaji', $data);
        $this->load->view('templates_admin/footer');
    }

    public function halamanTambahPotonganGaji() {
        $data['title'] = "Tambah Potongan Gaji";

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/tambah-potongan-gaji', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambahPotonganGaji() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->halamanTambahPotonganGaji();
        } else {
            $potongan = $this->input->post('potongan');
            $jml_potongan = $this->input->post('jml_potongan');

            $arrayInsert = array(
                'potongan' => $potongan,
                'jml_potongan' => $jml_potongan
            );
            
            $this->penggajian->createData($arrayInsert, 'potongan_gaji');
            $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Selamat, data berhasil ditambahkan!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/PotonganGaji');
        }
    }

    public function halamanUpdatePotonganGaji($id) {
        $data['title'] = "Update Potongan Gaji";
        $where = array('id_potongan' => $id);
        $data['potongan'] = $this->db->query("SELECT * FROM potongan_gaji WHERE id_potongan = '$id'")->result();
    
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/update-potongan-gaji', $data);
        $this->load->view('templates_admin/footer');
    }
    
    public function updatePotonganGaji() {
        $this->_rules();
    
        if ($this->form_validation->run() == FALSE) {
            $this->halamanUpdatePotonganGaji($id);
        } else {
            $id_potongan = $this->input->post('id_potongan');
            $potongan = $this->input->post('potongan');
            $jml_potongan   = $this->input->post('jml_potongan');
    
            $arrayUpdate = array(
                'potongan' => $potongan,
                'jml_potongan' => $jml_potongan
            );

            $where = array(
                'id_potongan' => $id_potongan
            );

            $this->penggajian->updateData('potongan_gaji', $arrayUpdate, $where);
            $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Selamat, data berhasil diupdate!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/PotonganGaji');
        }
    }

    public function deletePotonganGaji($id) {
        $where = array('id_potongan' => $id);
        $this->penggajian->deleteData($where, 'potongan_gaji');
        $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Selamat, data berhasil dihapus!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/PotonganGaji');
    }
}

?>