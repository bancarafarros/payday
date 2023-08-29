<?php

class DataGaji extends CI_Controller
{
    public function __construct() {
        parent::__construct();

        $this->load->model('M_penggajian', 'penggajian');
        
        if ($this->session->userdata('role_id') != 2) {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>NGA DL XOB</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
            redirect('Auth');
        }
    }
    
    public function index() {
        $data['title'] = 'Data Gaji';

        $nik = $this->session->userdata('nik');
        $data['potongan'] = $this->penggajian->getData('potongan_gaji')->result();
        $data['gaji'] = $this->db->query("SELECT data_pegawai.nama_pegawai, data_pegawai.nik, data_jabatan.gaji_pokok, data_jabatan.tj_transport, data_jabatan.uang_makan, data_absensi.alpha, data_absensi.bulan, data_absensi.id_kehadiran FROM data_pegawai INNER JOIN data_absensi ON data_absensi.nik=data_pegawai.nik INNER JOIN data_jabatan ON data_jabatan.nama_jabatan=data_pegawai.jabatan WHERE data_absensi.nik='$nik' ORDER BY data_absensi.bulan DESC")->result();
        
        $this->load->view('templates_pegawai/header', $data);
        $this->load->view('templates_pegawai/sidebar');
        $this->load->view('pegawai/data-gaji', $data);
        $this->load->view('templates_pegawai/footer');
    }
    
}

?>