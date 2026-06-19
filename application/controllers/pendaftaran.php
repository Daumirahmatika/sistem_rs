<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('form_validation');
    }

    // Halaman Form Pendaftaran
    public function index()
    {
        // Ambil data dokter untuk pilihan di form
        $data['dokter'] = $this->db->get('dokter')->result();
        $this->load->view('pendaftaran', $data);
    }

    // Proses Simpan Data
    public function simpan()
    {
        // 🔹 ATURAN VALIDASI FORM
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_hp', 'Nomor HP', 'required');
        $this->form_validation->set_rules('keluhan', 'Keluhan', 'required');
        $this->form_validation->set_rules('tanggal_kunjungan', 'Tanggal Kunjungan', 'required');
        $this->form_validation->set_rules('id_dokter', 'Dokter', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[akun_pasien.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]');

        // Kalau validasi gagal, kembali ke form
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('pesan_error', 'Mohon isi semua data dengan benar! Username harus unik.');
            redirect('pendaftaran');
        } 
        // Kalau berhasil, simpan ke database
        else {
            // 🔹 DATA UTAMA PASIEN
            $data_pasien = [
                'nama'              => $this->input->post('nama'),
                'tanggal_lahir'     => $this->input->post('tanggal_lahir'),
                'alamat'            => $this->input->post('alamat'),
                'no_hp'             => $this->input->post('no_hp'),
                'keluhan'           => $this->input->post('keluhan'),
                'tanggal_kunjungan' => $this->input->post('tanggal_kunjungan'),
                'id_dokter'         => $this->input->post('id_dokter'),
                'status_pendaftaran'=> 'menunggu' // Otomatis jadi menunggu
            ];

            // Simpan ke tabel pasien
            $this->db->insert('pasien', $data_pasien);
            
            // Ambil ID pasien yang baru saja disimpan
            $id_pasien_baru = $this->db->insert_id();

            // 🔹 DATA AKUN LOGIN PASIEN
            $data_akun = [
                'id_pasien' => $id_pasien_baru,
                'username'  => $this->input->post('username'),
                'password'  => MD5($this->input->post('password')) // Password diacak
            ];

            // Simpan ke tabel akun_pasien
            $this->db->insert('akun_pasien', $data_akun);

            // 🔹 NOTIFIKASI BERHASIL & LIHAT HASIL
            $this->session->set_flashdata('pesan_sukses', 'Pendaftaran BERHASIL! Data tersimpan. Silakan login untuk cek status.');
            redirect('pendaftaran/cek_status/'.$id_pasien_baru);
        }
    }

    // Halaman Cek Status Pendaftaran
    public function cek_status($id_pasien = null)
    {
        if($id_pasien != null){
            // Tampilkan data yang baru didaftarkan
            $this->db->select('pasien.*, dokter.nama_dokter, dokter.spesialis');
            $this->db->from('pasien');
            $this->db->join('dokter', 'pasien.id_dokter = dokter.id_dokter');
            $this->db->where('pasien.id_pasien', $id_pasien);
            $data['pasien'] = $this->db->get()->row();
        } else {
            // Cek manual pakai nomor pendaftaran
            $data['pasien'] = null;
        }

        $this->load->view('cek_status', $data);
    }

    // Proses Cek Status Manual
    public function proses_cek()
    {
        $id_pasien = $this->input->post('id_pasien');
        redirect('pendaftaran/cek_status/'.$id_pasien);
    }

}