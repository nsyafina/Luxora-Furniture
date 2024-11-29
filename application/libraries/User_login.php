<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_login
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('m_autentifikasi');
    }

    public function login($username, $password)
    {
        $cek = $this->ci->m_autentifikasi->login_admin($username, $password);
        if ($cek) {
            $nama_user = $cek->nama_user;
            $username = $cek->username;
            $lavel_user = $cek->lavel_user;
            $this->ci->session->set_userdata('username', $username);
            $this->ci->session->set_userdata('nama_user', $nama_user);
            $this->ci->session->set_userdata('lavel_user', $lavel_user);
            redirect('admin');
        } else {
            $this->ci->session->set_flashdata('error', 'Username atau Password salah!');
            redirect('autentifikasi/login_admin');
        }
    }

    public function proteksi_halaman()
    {
        if ($this->ci->session->userdata('username') == '') {
            $this->ci->session->set_flashdata('error', 'Anda Belum Login!');
            redirect('autentifikasi/login_admin');
        }
    }

    public function logout()
    {
        $this->ci->session->unset_userdata('username');
        $this->ci->session->unset_userdata('nama_user');
        $this->ci->session->unset_userdata('level_user');
        $this->ci->session->set_flashdata('pesan', 'Anda Sudah Logout!');
        redirect('autentifikasi/login_admin');
    }
}

/* End of file User_login.php */
