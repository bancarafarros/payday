<?php

class LaporanAbsensi extends CI_Controller
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

    public function index() {
        $data['title'] = 'Laporan Absensi ';

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/filter-laporan-absensi', $data);
        $this->load->view('templates_admin/footer');
    }

    public function cetakLaporanAbsensi()  {
        $data['title'] = 'Cetak Absensi Pegawai';

        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $bulanTahun = $bulan + $tahun;
        
        if ((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')) {
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $bulanTahun = $bulan . $tahun;
        } else {
            $bulan = date('m');
            $tahun = date('Y');
            $bulanTahun = $bulan . $tahun;
        }

        $data['laporanAbsensi'] = $this->db->query("SELECT * FROM data_absensi WHERE bulan='$bulanTahun' ORDER BY nama_pegawai ASC")->result();
        
        $this->load->view('templates_admin/header', $data);
        $this->load->view('admin/cetak-absensi');
    }
}

?>