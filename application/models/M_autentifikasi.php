<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_autentifikasi extends CI_Model
{
    public function login_admin($username, $password)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where(array(
            'username' => $username,
            'password' => $password
        ));
        return $this->db->get()->row();
    }

    public function login_pelanggan($email, $password)
    {
        $this->db->select('*');
        $this->db->from('pelanggan');
        $this->db->where(array(
            'email' => $email,
            'password' => $password
        ));
        return $this->db->get()->row();
    }

    public function register($data)
    {
        $this->db->insert('user', $data);
    }

    public function get_by_username($username)
    {
        return $this->db->where('username', $username)->get('user')->row();
    }
}

/* End of file M_autentifikasi.php */