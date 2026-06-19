<?php
class Pasien_model extends CI_Model {

    // Simpan data pasien baru
    public function simpan_pasien($data){
        $this->db->insert('pasien', $data);
        return $this->db->insert_id();
    }

    // Simpan akun login pasien
    public function simpan_akun($data){
        return $this->db->insert('akun_pasien', $data);
    }

    // Ambil semua data pasien (untuk admin)
    public function semua_pasien(){
        $this->db->select('p.*, d.nama_dokter, d.spesialis');
        $this->db->from('pasien p');
        $this->db->join('dokter d', 'p.id_dokter = d.id_dokter');
        $this->db->order_by('p.tanggal_daftar', 'DESC');
        return $this->db->get()->result();
    }

    // Ambil 1 data pasien berdasarkan ID
    public function get_pasien($id){
        $this->db->select('p.*, d.nama_dokter, d.spesialis');
        $this->db->from('pasien p');
        $this->db->join('dokter d', 'p.id_dokter = d.id_dokter');
        $this->db->where('p.id_pasien', $id);
        return $this->db->get()->row();
    }

    // Ubah status pendaftaran
    public function ubah_status($id, $status){
        return $this->db->update('pasien', ['status_pendaftaran' => $status], ['id_pasien' => $id]);
    }

    // Hapus data pasien
    public function hapus_pasien($id){
        return $this->db->delete('pasien', ['id_pasien' => $id]);
    }

    // Cek login pasien
    public function cek_login_pasien($user, $pass){
        $this->db->select('p.*');
        $this->db->from('akun_pasien a');
        $this->db->join('pasien p', 'a.id_pasien = p.id_pasien');
        $this->db->where('a.username', $user);
        $this->db->where('a.password', MD5($pass));
        return $this->db->get()->row();
    }

    // Statistik untuk laporan
    public function statistik(){
        $data['total'] = $this->db->count_all('pasien');
        $data['diterima'] = $this->db->where('status_pendaftaran','diterima')->count_all_results('pasien');
        $data['ditolak'] = $this->db->where('status_pendaftaran','ditolak')->count_all_results('pasien');
        $data['proses'] = $this->db->where('status_pendaftaran','proses')->count_all_results('pasien');
        $data['menunggu'] = $this->db->where('status_pendaftaran','menunggu')->count_all_results('pasien');
        return $data;
    }
}