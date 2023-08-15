<?php

class M_penggajian extends CI_Model
{
    public function getData($table) {
        return $this->db->get($table);
    }
    
    public function createJabatan($data, $table) {
        $this->db->insert($table, $data);
    }
}

?>