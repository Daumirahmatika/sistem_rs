<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('url');

        if(!$this->session->userdata('admin')){
            redirect('login/admin');
            exit;
        }
    }

    public function dashboard()
    {
        $this->db->select('pasien.*, dokter.nama_dokter, dokter.spesialis');
        $this->db->from('pasien');
        $this->db->join('dokter', 'pasien.id_dokter = dokter.id_dokter', 'left');
        $this->db->order_by('pasien.tanggal_kunjungan', 'DESC');
        $data['semua_pasien'] = $this->db->get()->result();

        // ✅ SUDAH SESUAI NAMA FILE ASLIMU: header_admin & footer_admin
        $this->load->view('admin/header_admin');
        $this->load->view('admin/dashboard_admin', $data);
        $this->load->view('admin/footer_admin');
    }

    public function tambah_baru()
    {
        $data['dokter'] = $this->db->get('dokter')->result();
        $this->load->view('admin/header_admin');
        $this->load->view('admin/tambah_pasien', $data);
        $this->load->view('admin/footer_admin');
    }

    public function simpan_pasien()
    {
        $cek_data = $this->db->get_where('pasien', [
            'nama'          => $this->input->post('nama'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'alamat'        => $this->input->post('alamat'),
            'no_hp'         => $this->input->post('no_hp')
        ]);

        if($cek_data->num_rows() > 0){
            $this->session->set_flashdata('pesan', '❌ GAGAL! Data pasien ini SUDAH ADA di sistem. Tidak boleh ada data ganda.');
            redirect('admin/tambah_baru');
            exit;
        }

        $data_pasien = array(
            'id_akun_pasien'    => $this->input->post('id_akun_pasien'),
            'nama'              => $this->input->post('nama'),
            'tanggal_lahir'     => $this->input->post('tanggal_lahir'),
            'alamat'            => $this->input->post('alamat'),
            'no_hp'             => $this->input->post('no_hp'),
            'keluhan'           => $this->input->post('keluhan'),
            'id_dokter'         => $this->input->post('id_dokter'),
            'tanggal_kunjungan' => $this->input->post('tanggal_kunjungan'),
            'status_pendaftaran'=> $this->input->post('status_pendaftaran'),
            'status_selesai'    => 'belum'
        );

        $this->db->insert('pasien', $data_pasien);
        $id_pasien_baru = $this->db->insert_id();

        if($this->input->post('username') && $this->input->post('password')){
            $data_akun = array(
                'id_akun_pasien' => $id_pasien_baru,
                'username'       => $this->input->post('username'),
                'password'       => MD5($this->input->post('password'))
            );
            $this->db->insert('akun_pasien', $data_akun);
        }

        $this->session->set_flashdata('pesan', '✅ Data pasien BERHASIL disimpan!');
        redirect('admin/dashboard');
    }

    public function edit_pasien($id)
    {
        $this->db->select('*');
        $this->db->from('pasien');
        $this->db->where('id_pasien', $id);
        $data['pasien'] = $this->db->get()->row();

        if(!$data['pasien']){
            $this->session->set_flashdata('pesan', '❌ Data pasien tidak ditemukan!');
            redirect('admin/dashboard');
            exit;
        }

        $data['dokter'] = $this->db->get('dokter')->result();
        $this->load->view('admin/header_admin');
        $this->load->view('admin/edit_pasien', $data);
        $this->load->view('admin/footer_admin');
    }

    public function update_pasien()
    {
        $id = $this->input->post('id_pasien');

        $cek_data = $this->db->get_where('pasien', [
            'nama'          => $this->input->post('nama'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'alamat'        => $this->input->post('alamat'),
            'no_hp'         => $this->input->post('no_hp'),
            'id_pasien !='  => $id
        ]);

        if($cek_data->num_rows() > 0){
            $this->session->set_flashdata('pesan', '❌ GAGAL UBAH! Data pasien ini SUDAH ADA di sistem.');
            redirect('admin/edit_pasien/'.$id);
            exit;
        }

        $data_pasien = array(
            'id_akun_pasien'    => $this->input->post('id_akun_pasien'),
            'nama'              => $this->input->post('nama'),
            'tanggal_lahir'     => $this->input->post('tanggal_lahir'),
            'alamat'            => $this->input->post('alamat'),
            'no_hp'             => $this->input->post('no_hp'),
            'keluhan'           => $this->input->post('keluhan'),
            'id_dokter'         => $this->input->post('id_dokter'),
            'tanggal_kunjungan' => $this->input->post('tanggal_kunjungan'),
            'status_pendaftaran'=> $this->input->post('status_pendaftaran'),
            'status_selesai'    => $this->input->post('status_selesai')
        );

        $this->db->where('id_pasien', $id);
        $this->db->update('pasien', $data_pasien);

        $this->session->set_flashdata('pesan', '✅ Data pasien BERHASIL diubah!');
        redirect('admin/dashboard');
    }

    public function hapus_pasien($id)
    {
        $this->db->where('id_pasien', $id);
        $this->db->delete('pasien');
        $this->session->set_flashdata('pesan', '🗑️ Data pasien BERHASIL dihapus!');
        redirect('admin/dashboard');
    }

    public function ubah_status($id, $status)
    {
        $this->db->where('id_pasien', $id);
        $this->db->update('pasien', ['status_pendaftaran' => $status]);
        $this->session->set_flashdata('pesan', '✅ Status berhasil diubah!');
        redirect('admin/dashboard');
    }

    public function ubah_selesai($id)
    {
        $this->db->where('id_pasien', $id);
        $this->db->update('pasien', ['status_selesai' => 'sudah']);
        $this->session->set_flashdata('pesan', '✅ Pasien ditandai SELESAI BEROBAT!');
        redirect('admin/dashboard');
    }

    public function dokter()
    {
        $data['semua_dokter'] = $this->db->get('dokter')->result();
        $this->load->view('admin/header_admin');
        $this->load->view('admin/dokter/dashboard_dokter', $data);
        $this->load->view('admin/footer_admin');
    }

    public function tambah_dokter()
    {
        $this->load->view('admin/header_admin');
        $this->load->view('admin/dokter/tambah_dokter');
        $this->load->view('admin/footer_admin');
    }

    public function simpan_dokter()
    {
        $data = array(
            'nama_dokter'    => $this->input->post('nama_dokter'),
            'spesialis'      => $this->input->post('spesialis'),
            'jadwal_praktek' => $this->input->post('jadwal_praktek')
        );
        $this->db->insert('dokter', $data);
        $this->session->set_flashdata('pesan', '✅ Data Dokter BERHASIL disimpan!');
        redirect('admin/dokter');
    }

    public function edit_dokter($id)
    {
        $data['dokter'] = $this->db->get_where('dokter', ['id_dokter' => $id])->row();
        $this->load->view('admin/header_admin');
        $this->load->view('admin/dokter/edit_dokter', $data);
        $this->load->view('admin/footer_admin');
    }

    public function update_dokter()
    {
        $id = $this->input->post('id_dokter');
        $data = array(
            'nama_dokter'    => $this->input->post('nama_dokter'),
            'spesialis'      => $this->input->post('spesialis'),
            'jadwal_praktek' => $this->input->post('jadwal_praktek')
        );
        $this->db->where('id_dokter', $id);
        $this->db->update('dokter', $data);
        $this->session->set_flashdata('pesan', '✅ Data Dokter BERHASIL diubah!');
        redirect('admin/dokter');
    }

    public function hapus_dokter($id)
    {
        $this->db->where('id_dokter', $id);
        $this->db->delete('dokter');
        $this->session->set_flashdata('pesan', '🗑️ Data Dokter BERHASIL dihapus!');
        redirect('admin/dokter');
    }

    public function laporan()
    {
        $this->db->select('pasien.*, dokter.nama_dokter, dokter.spesialis');
        $this->db->from('pasien');
        $this->db->join('dokter', 'pasien.id_dokter = dokter.id_dokter', 'left');
        $this->db->order_by('pasien.tanggal_kunjungan', 'DESC');
        $data['pasien'] = $this->db->get()->result();
        $this->load->view('admin/header_admin');
        $this->load->view('admin/laporan_admin', $data);
        $this->load->view('admin/footer_admin');
    }

    public function logout()
    {
        $this->session->unset_userdata('admin');
        redirect('login/admin');
    }

}