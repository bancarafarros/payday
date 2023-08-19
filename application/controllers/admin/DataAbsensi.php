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
            $bulanTahun = $bulan . $tahun;
        } else {
            $bulan = date('m');
            $tahun = date('y');
            $bulanTahun = $bulan . $tahun;
        }
        
        $data['absensi'] = $this->db->query("SELECT data_absensi . *, data_pegawai.nama_pegawai, data_pegawai.jenis_kelamin, data_pegawai.jabatan FROM data_absensi INNER JOIN data_pegawai ON data_absensi.nik=data_pegawai.nik INNER JOIN data_jabatan ON data_pegawai.jabatan = data_jabatan.nama_jabatan WHERE data_absensi.bulan='$bulanTahun' ORDER BY data_pegawai.nama_pegawai ASC")->result();

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data-absensi', $data);
        $this->load->view('templates_admin/footer');
    }

    public function inputAbsensi() {
        if ($this->input->post('submit', TRUE) == 'submit') {
            $post = $this->input->post();

            foreach ($post['bulan'] as $key => $value) {
                if($post['bulan'][$key] !='' || $post['nik'][$key] !='') {
                    $simpan[] = array(
                        'bulan' => $post['bulan'][$key],
                        'nik' => $post['nik'][$key],
                        'nama_pegawai' => $post['nama_pegawai'][$key],
                        'jenis_kelamin' => $post['jenis_kelamin'][$key],
                        'nama_jabatan' => $post['nama_jabatan'][$key],
                        'hadir' => $post['hadir'][$key],
                        'sakit' => $post['sakit'][$key],
                        'alpha' => $post['alpha'][$key],
                    );
                }
            }

            $this->penggajian->createAbsensi('data_absensi', $simpan);
            $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Selamat, data berhasil ditambahkan!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/DataAbsensi');
        }
        
        $data['title'] = 'Form Input Absensi';

        if ((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')) {
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $bulanTahun = $bulan . $tahun;
        } else {
            $bulan = date('m');
            $tahun = date('y');
            $bulanTahun = $bulan . $tahun;
        }

        $data['inputAbsensi'] = $this->db->query("SELECT data_pegawai.*, data_jabatan.nama_jabatan FROM data_pegawai INNER JOIN data_jabatan ON data_pegawai.jabatan=data_jabatan.nama_jabatan WHERE NOT EXISTS (SELECT * FROM data_absensi WHERE bulan='$bulanTahun' AND data_pegawai.nik=data_absensi.nik) ORDER BY data_pegawai.nama_pegawai ASC")->result();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/input-absensi', $data);
        $this->load->view('templates_admin/footer');
    }

}

?>