<?php

class M_penggajian extends CI_Model
{
    public function getData($table) {
        return $this->db->get($table);
    }
    
    public function createData($data, $table) {
        $this->db->insert($table, $data);
    }

    public function updateData($table, $data, $where) {
        $this->db->update($table, $data, $where);
    }

    public function deleteData($where, $table) {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function createAbsensi($table = null, $data = array()) {
        $jumlah = count($data);
        if ($jumlah > 0) {
            $this->db->insert_batch($table, $data);
        }
    }
}

?>