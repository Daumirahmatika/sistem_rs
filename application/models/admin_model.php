<?php
class Admin_model extends CI_Model {
    // Cek login admin
    public function cek_login($user, $pass){
        $this->db->where('username', $user);
        $this->db->where('password', MD5($pass));
        return $this->db->get('admin')->row();
    }
}