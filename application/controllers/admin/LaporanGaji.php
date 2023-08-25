<?php

class LaporanGaji extends CI_Controller
{
    public function __construct() {
		parent::__construct();
		$this->load->model('M_penggajian', 'penggajian');
	}
    
    public function index() {
        $data['title'] = 'Data Gaji Pegawai';

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/filter-laporan-gaji');
        $this->load->view('templates_admin/footer');
    }

    public function cetakLaporanGaji() {
        $data['title'] = 'Cetak Laporan Gaji Pegawai';
        
        if ((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')) {
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $bulanTahun = $bulan . $tahun;
        } else {
            $bulan = date('m');
            $tahun = date('y');
            $bulanTahun = $bulan . $tahun;
        }
        $data['cetakGaji'] = $this->db->query("SELECT data_pegawai.nik, data_pegawai.nama_pegawai, data_pegawai.jenis_kelamin, data_jabatan.nama_jabatan, data_jabatan.gaji_pokok, data_jabatan.tj_transport, data_jabatan.uang_makan, data_absensi.alpha FROM data_pegawai INNER JOIN data_absensi ON data_absensi.nik=data_pegawai.nik INNER JOIN data_jabatan ON data_jabatan.nama_jabatan=data_pegawai.jabatan WHERE data_absensi.bulan= '$bulanTahun' ORDER BY data_pegawai.nama_pegawai ASC")->result();

        $data['potongan'] = $this->penggajian->getData('potongan_gaji')->result();

        $this->load->view('templates_admin/header', $data);
        $this->load->view('admin/cetak-gaji', $data);
    }
}

?>