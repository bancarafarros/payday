<?php

class DataPegawai extends CI_Controller
{
    public function index() {
        $data = $this->db->query("SELECT * FROM data_pegawai")->result();

        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
}

?>