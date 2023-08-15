<?php

class DataJabatan extends CI_Controller
{
    public function index() {
        $data['title'] = 'Data Jabatan';

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_jabatan', $data);
        $this->load->view('templates_admin/footer');
    }

    public function FunctionName() {
        
    }
}

?>