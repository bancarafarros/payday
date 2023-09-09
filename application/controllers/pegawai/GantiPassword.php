<?php

class GantiPassword extends CI_Controller
{
    public function __construct() {
		parent::__construct();

        if ($this->session->userdata('role_id') != 2) {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>NGA DL XOB</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
            redirect('Auth');
        }
        
		$this->load->model('M_penggajian', 'penggajian');
	}

    public function _rules() {
        $this->form_validation->set_rules('passwordBaru', 'Password baru', 'required');
        $this->form_validation->set_rules('ulangPassword', 'Ulang password', 'required|matches[passwordBaru]');
    }
    
    public function index() {
        $data['title'] = 'Ganti Password';

        $this->load->view('templates_pegawai/header', $data);
        $this->load->view('templates_pegawai/sidebar');
        $this->load->view('pegawai/ganti-password', $data);
        $this->load->view('templates_pegawai/footer');
    }

    public function gantiPassword() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $passwordBaru = $this->input->post('passwordBaru');
            $ulangPassword = $this->input->post('ulangPassword');
            
            $arrayUpdate = array(
                'password' => sha1($ulangPassword)
            );
            
            $where = array(
                'id_pegawai' => $this->session->userdata('id_pegawai')
            );
            
            $this->penggajian->updateData('data_pegawai', $arrayUpdate, $where);
            $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Selamat, password berhasil diupdate!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
            redirect('Auth');
        }
    }
}

?>