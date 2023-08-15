<?php

class M_penggajian extends CI_Model
{
    public function getData($table) {
        return $this->db->get($table);
    }
    
    public function createJabatan($data, $table) {
        $this->db->insert($table, $data);
    }

    public function updateJabatan($table, $data, $where) {
        $this->db->update($table, $data, $where);
    }

    public function deleteJabatan($where, $table) {
        $this->db->where($where);
        $this->db->delete($table);
    }
}

?>