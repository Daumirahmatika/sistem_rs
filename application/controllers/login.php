<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('url');
    }

    // Halaman Pilihan Login
    public function index()
    {
        $this->load->view('login_pilih');
    }

    // ==============================================
    // ✅ BAGIAN ADMIN - SUDAH DIPERBAIKI: WAJIB LOGIN, TIDAK LANGSUNG MASUK
    // ==============================================
    public function admin()
    {
        // Hapus sisa sesi login lama, PAKSA tampilkan form isian
        $this->session->unset_userdata('admin');
        $this->load->view('login_admin');
    }

    public function proses_admin()
    {
        // Ambil data dari form input
        $user = $this->input->post('username');
        $pass = $this->input->post('password');

        // Cek kecocokan ke database tabel 'admin'
        $this->db->where('username', $user);
        $this->db->where('password', MD5($pass)); // Password disamakan dengan acakan MD5
        $cek = $this->db->get('admin')->row();

        if($cek){
            // Kalau benar: simpan data login & masuk ke dashboard
            $this->session->set_userdata('admin', $cek);
            redirect('admin/dashboard');
        } else {
            // Kalau salah: kembali ke form & tampilkan pesan error
            $this->session->set_flashdata('pesan', '❌ Username atau Password Admin Salah!');
            redirect('login/admin');
        }
    }

    // ==============================================
    // ✅ BAGIAN PASIEN - AMAN, TIDAK MUTER-MUTER
    // ==============================================
    public function pasien()
    {
        // Hapus sisa sesi lama, tampilkan form isian
        $this->session->unset_userdata('pasien');
        $this->load->view('login_pasien');
    }

    public function proses_pasien()
    {
        $user = $this->input->post('username');
        $pass = $this->input->post('password');

        // Cek ke tabel akun_pasien
        $this->db->where('username', $user);
        $this->db->where('password', MD5($pass));
        $cek = $this->db->get('akun_pasien')->row();

        if($cek){
            // Simpan sesi pasien
            $this->session->set_userdata('pasien', $cek);
            redirect('pasien/dashboard');
        } else {
            $this->session->set_flashdata('pesan_error', '❌ Username atau Password Salah!');
            redirect('login/pasien');
        }
    }

    // ==============================================
    // ✅ FUNGSI LOGOUT - SUDAH BENAR, HAPUS SEMUA DATA
    // ==============================================
    public function logout()
    {
        // Hapus SEMUA data login, biar benar-benar keluar
        $this->session->sess_destroy();
        redirect('login'); // Kembali ke halaman pilihan awal
    }

}