<?php

class PotonganGaji extends CI_Controller
{
    public function __construct() {
		parent::__construct();
		$this->load->model('M_penggajian', 'penggajian');
	}
    
    public function index() {
        $data['title'] = "Setting Potongan Gaji";
        $data['potongan_gaji'] = $this->penggajian->getData('potongan_gaji')->result();

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/potongan-gaji', $data);
        $this->load->view('templates_admin/footer');
    }
}

?>