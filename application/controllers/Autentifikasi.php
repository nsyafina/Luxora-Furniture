<?php

class Autentifikasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_user');
        $this->load->model('m_autentifikasi');
    }

    public function login_admin()
    {
        $this->form_validation->set_rules('username', 'Username', 'required', array(
            'required' => '%s Harus Diisi !'
        ));
        $this->form_validation->set_rules('password', 'Password', 'required', array(
            'required' => '%s Harus Diisi !'
        ));


        if ($this->form_validation->run() == TRUE) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            // Ambil data pelanggan berdasarkan username
            $user = $this->m_user->get_by_username($username);

            if ($user && password_verify($password, $user->password)) {
                // Simpan data ke session
                $this->session->set_userdata(array(
                    'id_user' => $user->id_user,
                    'nama_user' => $user->nama_user,
                    'username' => $user->username,
                    'foto_backend' => $user->foto
                ));
                redirect('admin');
            } else {
                $this->session->set_flashdata('error', 'Username atau password salah!');
                redirect('autentifikasi/login_admin');
            }
        }

        $data = array(
            'title' => 'Login Admin',
        );
        $this->load->view('v_login_admin', $data, FALSE);
    }

    public function logout_admin()
    {
        $this->user_login->logout();
    }

    public function register()
    {
        $this->form_validation->set_rules(
            'nama_user',
            'Nama User',
            'required',
            array('required' => '%s Harus Diisi!')
        );
        $this->form_validation->set_rules(
            'username',
            'Username',
            'required',
            array('required' => '%s Harus Diisi!')
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required',
            array('required' => '%s Harus Diisi!')
        );
        $this->form_validation->set_rules(
            'ulangi_password',
            'Ulangi Password',
            'required|matches[password]',
            array('required' => '%s Harus Diisi!', 'matches' => '%s Password Tidak Sama...!!')
        );
        $this->form_validation->set_rules(
            'no_telp',
            'No Telp',
            'required',
            array('required' => '%s Harus Diisi!')
        );

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Register Admin',
            );
            $this->load->view('v_register_admin', $data, FALSE);
        } else {
            $data = array(
                'nama_user' => $this->input->post('nama_user'),
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                'foto' => 'default-pict.jpg',
                'level_user' => 1,
                'no_telp' => $this->input->post('no_telp'),

            );
            $this->m_autentifikasi->register($data);
            $this->session->set_flashdata('pesan', 'Selamat, Register Berhasil Silahkan Login Kembali!');
            redirect('autentifikasi/register');
        }
    }
}
