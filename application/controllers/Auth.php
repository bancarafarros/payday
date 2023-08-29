<?php

class Auth extends CI_Controller
{
    public function __construct() {
		parent::__construct();
		$this->load->model('M_penggajian', 'penggajian');
	}

    public function _rules() {
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
    }

    public function index() {
        $data['title'] = 'Login';

        $this->load->view('templates_admin/header', $data);
        $this->load->view('login', $data);
    }
    
    public function login() {
        $this->_rules();

        if ($this->form_validation->run() ==  FALSE) {
            redirect('Auth');
        
        } else {
            $username = $this->input->post('username');
            $password = sha1($this->input->post('password'));

            $auth = $this->penggajian->cekLogin($username, $password);

            if ($auth == FALSE) {
                $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>NGA DL XOB</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button></div>');
                redirect('Auth');
            
            } else {
                $this->session->set_userdata('role_id', $auth->role_id);
                $this->session->set_userdata('id_pegawai', $auth->id_pegawai);
                $this->session->set_userdata('username', $auth->username);
                $this->session->set_userdata('nama_pegawai', $auth->nama_pegawai);
                $this->session->set_userdata('photo', $auth->photo);
                $this->session->set_userdata('nik', $auth->nik);

                switch ($auth->role_id) {
                    case 1:
                        redirect('admin/Dashboard');
                        break;

                    case 2:
                        redirect('pegawai/Dashboard');
                        break;
                    
                    default:
                        break;
                }
            }
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('Auth');
    }
}

?>