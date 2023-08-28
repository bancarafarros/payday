<?php

class SlipGaji extends CI_Controller
{
    public function __construct() {
		parent::__construct();
		$this->load->model('M_penggajian', 'penggajian');
        $this->load->library('upload');
	}

    public function index() {
        $data['title'] = 'Filter Slip Gaji Pegawai ';
        
        $data['pegawai'] = $this->penggajian->getData('data_pegawai')->result();

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/filter-slip-gaji', $data);
        $this->load->view('templates_admin/footer');
    }

    public function cetakSlipGaji() {
        $data['title'] = 'Cetak Slip Gaji Pegawai ';
        
        $data['pegawai'] = $this->penggajian->getData('data_pegawai')->result();

        $nama_pegawai = $this->input->post('nama_pegawai');
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $bulanTahun = $bulan . $tahun;
        // var_dump($nama_pegawai);
        // print_r($bulanTahun);
        // die();
        $data['slipGaji'] = $this->db->query("SELECT data_pegawai.nik, data_pegawai.nama_pegawai, data_jabatan.nama_jabatan, data_jabatan.gaji_pokok, data_jabatan.tj_transport, data_jabatan.uang_makan, data_absensi.alpha FROM data_pegawai INNER JOIN data_absensi ON data_absensi.nik=data_pegawai.nik INNER JOIN data_jabatan ON data_jabatan.nama_jabatan=data_pegawai.jabatan WHERE data_absensi.bulan='$bulanTahun' AND data_absensi.nama_pegawai='$nama_pegawai'")->result();
        $data['potongan'] = $this->penggajian->getData('potongan_gaji')->result();
        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        // die();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('admin/cetak-slip-gaji', $data);
    }
}

?>