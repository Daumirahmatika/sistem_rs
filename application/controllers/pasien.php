<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('url');

        // Cek Login Pasien
        if(!$this->session->userdata('pasien')){
            redirect('login/pasien');
            exit;
        }
    }

    // ==============================================
    // 📱 DASHBOARD PASIEN
    // ==============================================
    public function dashboard()
    {
        // Ambil ID AKUN dari session
        $id_akun = $this->session->userdata('pasien');
        if(is_object($id_akun)) $id_akun = $id_akun->id_pasien;
        $id_akun = (int)$id_akun;

        // 1. Ambil DATA DIRI (ambil data yang PERTAMA KALI didaftarkan)
        $this->db->select('*');
        $this->db->from('pasien');
        $this->db->where('id_akun_pasien', $id_akun);
        $this->db->order_by('id_pasien', 'ASC');
        $this->db->limit(1);
        $query1 = $this->db->get();
        $data['profil'] = $query1->row();

        // 2. Ambil SEMUA RIWAYAT KUNJUNGAN akun ini
        $this->db->select('pasien.*, dokter.nama_dokter, dokter.spesialis');
        $this->db->from('pasien');
        $this->db->join('dokter', 'pasien.id_dokter = dokter.id_dokter');
        $this->db->where('pasien.id_akun_pasien', $id_akun);
        $this->db->order_by('pasien.tanggal_kunjungan', 'DESC');
        $query2 = $this->db->get();
        $data['semua_riwayat'] = $query2->result();

        $this->load->view('pasien/header_pasien');
        $this->load->view('pasien/dashboard_pasien', $data);
        $this->load->view('pasien/footer_pasien');
    }

    // ==============================================
    // ➕ HALAMAN DAFTAR BEROBAT BARU
    // ==============================================
    public function daftar_baru()
    {
        $data['dokter'] = $this->db->get('dokter')->result();

        $this->load->view('pasien/header_pasien');
        $this->load->view('pasien/daftar_baru', $data);
        $this->load->view('pasien/footer_pasien');
    }

    // ==============================================
    // 💾 PROSES SIMPAN DAFTAR BARU
    // ==============================================
    public function simpan_daftar_baru()
    {
        $id_akun = $this->session->userdata('pasien');
        if(is_object($id_akun)) $id_akun = $id_akun->id_pasien;
        $id_akun = (int)$id_akun;

        // Ambil data lama untuk disalin (nama, alamat, dll)
        $data_lama = $this->db->get_where('pasien', ['id_akun_pasien' => $id_akun])->row();

        // DATA BARU: id_pasien TIDAK DIISI (biar nambah sendiri), yang diisi id_akun
        $data_baru = array(
            'id_akun_pasien'    => $id_akun, // <--- INI KUNCI PENTING
            'nama'              => $data_lama->nama,
            'tanggal_lahir'     => $data_lama->tanggal_lahir,
            'alamat'            => $data_lama->alamat,
            'no_hp'             => $data_lama->no_hp,
            'keluhan'           => $this->input->post('keluhan_baru'),
            'id_dokter'         => $this->input->post('id_dokter'),
            'tanggal_kunjungan' => $this->input->post('tanggal_kunjungan'),
            'status_pendaftaran'=> 'menunggu',
            'status_selesai'    => 'belum'
        );

        $this->db->insert('pasien', $data_baru);

        $this->session->set_flashdata('pesan', '✅ Pendaftaran berobat baru BERHASIL!');
        redirect('pasien/dashboard');
    }

    // ==============================================
    // 🚪 KELUAR
    // ==============================================
    public function logout()
    {
        $this->session->unset_userdata('pasien');
        redirect('login/pasien');
    }
}