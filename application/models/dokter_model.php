<?php
class Dokter_model extends CI_Model {
    // Ambil semua data dokter
    public function semua_dokter(){
        return $this->db->get('dokter')->result();
    }
}