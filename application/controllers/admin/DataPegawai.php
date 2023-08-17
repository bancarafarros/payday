<?php

class DataPegawai extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();
		$this->load->model('M_penggajian', 'penggajian');
        $this->load->library('upload');
	}

    public function _rules() {
        $this->form_validation->set_rules('nik', 'nik', 'required');
        $this->form_validation->set_rules('nama_pegawai', 'nama pegawai', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'required');
        $this->form_validation->set_rules('jabatan', 'jabatan', 'required');
        $this->form_validation->set_rules('tanggal_masuk', 'tanggal masuk', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
        // $this->form_validation->set_rules('foto', 'foto', 'required');
    }
    
    public function index() {
        $data['title'] = 'Data Pegawai';
        $data['pegawai'] = $this->penggajian->getData('data_pegawai')->result();

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data-pegawai', $data);
        $this->load->view('templates_admin/footer');
    }

    public function halamanTambahPegawai() {
        $data['title'] = 'Tambah Data Pegawai';
        $data['jabatan'] = $this->penggajian->getData('data_jabatan')->result();

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/tambah-data-pegawai', $data);
        $this->load->view('templates_admin/footer');
    }

    public function createPegawai() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->halamanTambahPegawai();
        } else {
            $nik = $this->input->post('nik');
            $nama_pegawai = $this->input->post('nama_pegawai');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $jabatan = $this->input->post('jabatan');
            $tanggal_masuk = $this->input->post('tanggal_masuk');
            $status = $this->input->post('status');
            $config['upload_path'] = './assets/photo';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size']      = 100000000000000000000000000000000000000000;
            $config['max_width']     = 100000000000000000000000000000000000000000;
            $config['max_height']    = 100000000000000000000000000000000000000000;
            $this->upload->initialize($config);
            $file = $this->upload->do_upload('foto');
            $data = $this->upload->data();

            if ($file) {
                $data = $this->upload->data();
                $foto = $data['file_name'];
            } else {
                $foto = $this->input->post('foto');
            }

            $arrayInsert = array(
                'nik' => $nik,
                'nama_pegawai' => $nama_pegawai,
                'jenis_kelamin' => $jenis_kelamin,
                'jabatan' => $jabatan,
                'tanggal_masuk' => $tanggal_masuk,
                'status' => $status,
                'foto' => $foto
            );
            
            $this->penggajian->createData($arrayInsert, 'data_pegawai');
            $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Selamat, data berhasil ditambahkan!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/DataPegawai');
        }
    }

    public function halamanUpdatePegawai($id) {
        $data['title'] = 'Update Data Pegawai';
        $where = array('id_pegawai' => $id);
        $data['pegawai'] = $this->db->query("SELECT * FROM data_pegawai WHERE id_pegawai = '$id'")->result();
        $data['jabatan'] = $this->penggajian->getData('data_jabatan')->result();

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/update-data-pegawai', $data);
        $this->load->view('templates_admin/footer');
    }
}

?>