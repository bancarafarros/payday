<?php

class DataAbsensi extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();
		$this->load->model('M_penggajian', 'penggajian');
	}

    public function index() {
        $data['title'] = 'Data Absensi Pegawai';

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data-absensi', $data);
        $this->load->view('templates_admin/footer');
    }

}

?>