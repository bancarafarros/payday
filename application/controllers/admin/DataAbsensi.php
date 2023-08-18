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
        
        if ((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')) {
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $dataWaktu = $bulan . $tahun;
        } else {
            $bulan = date('m');
            $tahun = date('y');
            $dataWaktu = $bulan . $tahun;
        }
        
        $data['absensi'] = $this->db->query("SELECT data_absensi . *, data_pegawai.nama_pegawai, data_pegawai.jenis_kelamin, data_pegawai.jabatan FROM data_absensi INNER JOIN data_pegawai ON data_absensi.nik=data_pegawai.nik INNER JOIN data_jabatan ON data_pegawai.jabatan = data_jabatan.nama_jabatan WHERE data_absensi.bulan='$dataWaktu' ORDER BY data_pegawai.nama_pegawai ASC")->result();

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data-absensi', $data);
        $this->load->view('templates_admin/footer');
    }

    public function inputAbsensi() {
        $data['title'] = 'Form Input Absensi';

        if ((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')) {
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $dataWaktu = $bulan . $tahun;
        } else {
            $bulan = date('m');
            $tahun = date('y');
            $dataWaktu = $bulan . $tahun;
        }

        $data['inputAbsensi'] = $this->db->query("SELECT data_pegawai.*, data_jabatan.nama_jabatan FROM data_pegawai INNER JOIN data_jabatan ON data_pegawai.jabatan=data_jabatan.nama_jabatan WHERE NOT EXISTS (SELECT * FROM data_absensi WHERE bulan='$dataWaktu' AND data_pegawai.nik=data_absensi.nik) ORDER BY data_pegawai.nama_pegawai ASC")->result();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/input-absensi', $data);
        $this->load->view('templates_admin/footer');
    }

}

?>