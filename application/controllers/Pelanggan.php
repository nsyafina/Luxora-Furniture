<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_pelanggan');
        $this->load->model('m_autentifikasi');
    }

    public function index($offset = 0)
    {
        $data = array(
            'title' => '<i class="nav-icon fas fa-users"></i> Data Customer',
            'pelanggan' => $this->m_pelanggan->get_all_data(),
            'isi' => 'v_customer',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }
    public function register()
    {
        $this->form_validation->set_rules(
            'nama_pelanggan',
            'Nama Pelanggan',
            'required',
            array('required' => '%s Harus Diisi!')
        );
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|is_unique[pelanggan.email]',
            array('required' => '%s Harus Diisi!', 'is_unique' => '%s ini sudah terdaftar!')
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required',
            array('required' => '%s Harus Diisi!')
        );
        $this->form_validation->set_rules(
            'ulangi_password',
            'Ulangi password',
            'required|matches[password]',
            array('required' => '%s Harus Diisi!', 'matches' => '%s, password tidak sama!')
        );

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Register Pelanggan',
                'isi' => 'pelanggan/v_register'
            );
            $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
        } else {
            $data = array(
                'nama_pelanggan' => $this->input->post('nama_pelanggan'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                'foto' => 'default1.jpeg',

            );
            $this->m_pelanggan->register($data);
            $this->session->set_flashdata('pesan', ' Register berhasil, silahkan login kembali!');
            redirect('pelanggan/login');
        }
    }

    public function setting()
    {
        $this->form_validation->set_rules(
            'nama_toko',
            'Nama Toko',
            'required',
            array('required' => '%s Harus Diisi!')
        );
        $this->form_validation->set_rules(
            'kota',
            'Kota',
            'required',
            array('required' => '%s Harus Diisi!')
        );
        $this->form_validation->set_rules(
            'alamat_toko',
            'Alamat Toko',
            'required',
            array('required' => '%s Harus Diisi!')
        );
        $this->form_validation->set_rules(
            'no_telpon',
            'No Telpon',
            'required',
            array('required' => '%s Harus Diisi!')
        );

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Setting',
                'setting' => $this->m_admin->data_setting(),
                'isi' => 'v_setting'
            );
            $this->load->view('layout/v_wrapper_backend', $data, FALSE);
        } else {
            $data = array(
                'id' => 1,
                'lokasi' => $this->input->post('kota'),
                'nama_toko' => $this->input->post('nama_toko'),
                'alamat_toko' => $this->input->post('alamat_toko'),
                'no_telpon' => $this->input->post('no_telpon'),

            );
            $this->m_admin->edit($data);
            $this->session->set_flashdata('pesan', 'Settingan Berhasil Diedit!');
            redirect('admin/setting');
        }
    }

    public function login()
    {
        $this->form_validation->set_rules('email', 'Email', 'required', array(
            'required' => 'Email Harus Diisi!'
        ));
        $this->form_validation->set_rules('password', 'Password', 'required', array(
            'required' => 'Password Harus Diisi!'
        ));

        if ($this->form_validation->run() == TRUE) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            // Ambil data pelanggan berdasarkan email
            $pelanggan = $this->m_pelanggan->get_by_email($email);

            if ($pelanggan && password_verify($password, $pelanggan->password)) {
                // Simpan data ke session
                $this->session->set_userdata(array(
                    'id_pelanggan' => $pelanggan->id_pelanggan,
                    'nama_pelanggan' => $pelanggan->nama_pelanggan,
                    'email' => $pelanggan->email,
                    'foto' => $pelanggan->foto
                ));
                redirect('pelanggan/akun');
            } else {
                $this->session->set_flashdata('error', 'Email atau password salah!');
                redirect('pelanggan/login');
            }
        }

        $data = array(
            'title' => 'Login Pelanggan',
            'isi' => 'pelanggan/v_login_pelanggan'
        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
    }


    public function logout()
    {
        $this->pelanggan_login->logout();
    }

    public function akun()
    {
        //proteksi halaman
        $this->pelanggan_login->proteksi_halaman();

        $pelanggan = $this->m_pelanggan->cekData(['email' => $this->session->userdata('email')])->row_array();
        // Cek apakah data ditemukan
        if ($pelanggan) {
            // Simpan data foto dan nama pengguna di session
            $this->session->set_userdata('foto', $pelanggan['foto']);
            $this->session->set_userdata('nama_pelanggan', $pelanggan['nama_pelanggan']);

            // Tambahkan data user ke array
            $data = [
                'title' => 'Profile Saya',
                'pelanggan' => (object) $pelanggan, // Kirimkan $user sebagai object
                'isi' => 'pelanggan/v_akun_saya',
            ];
            $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
        } else {
            // Redirect jika user tidak ditemukan
            $this->session->set_flashdata('pesan', 'User tidak ditemukan.');
            redirect('pelanggan/akun');
        }
    }

    public function edit()
    {
        // Proteksi halaman (memastikan pelanggan sudah login)
        $this->pelanggan_login->proteksi_halaman();

        // Ambil data pelanggan dari session
        $email = $this->session->userdata('email');

        // Dapatkan data pelanggan berdasarkan email
        $pelanggan = $this->m_pelanggan->get_by_email($email);
        if (!$pelanggan) {
            $this->session->set_flashdata('error', 'Data pelanggan tidak ditemukan!');
            redirect('pelanggan/akun');
        }

        // Validasi form
        $this->form_validation->set_rules('nama_pelanggan', 'Nama Pelanggan', 'required', array('required' => '%s Harus diisi!!'));
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email', array('required' => '%s Harus diisi!!', 'valid_email' => 'Format %s tidak valid!!'));
        $this->form_validation->set_rules('password', 'Password', 'min_length[6]', array('min_length' => '%s minimal 6 karakter.'));

        if ($this->form_validation->run() == TRUE) {
            // Konfigurasi upload
            $config['upload_path'] = './img/profile/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
            $config['max_size'] = '2000';
            $this->upload->initialize($config);

            $data = array(
                'id_pelanggan' => $pelanggan->id_pelanggan,
                'nama_pelanggan' => $this->input->post('nama_pelanggan'),
                'email' => $this->input->post('email'),
            );

            if (!empty($this->input->post('password'))) {
                $data['password'] = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
            }

            // Jika ada upload foto baru
            if ($this->upload->do_upload('foto')) {
                // Hapus foto lama jika ada
                if (!empty($pelanggan->foto)) {
                    unlink('./img/profile/' . $pelanggan->foto);
                }
                $upload_data = $this->upload->data();
                $data['foto'] = $upload_data['file_name'];
                $this->session->set_userdata('foto', $data['foto']); // Update session dengan foto baru
            }

            // Simpan perubahan ke database
            $this->m_pelanggan->edit($data);

            // Update session dengan data terbaru
            $this->session->set_userdata('nama_pelanggan', $this->input->post('nama_pelanggan'));
            $this->session->set_userdata('email', $this->input->post('email'));

            $this->session->set_flashdata('pesan', 'Data berhasil diperbarui!');
            redirect('pelanggan/akun');
        }

        // Data untuk ditampilkan di view
        $data = array(
            'title' => 'Edit Akun',
            'pelanggan' => $pelanggan, // Data pelanggan yang akan diedit
            'isi' => 'pelanggan/v_edit_akun',
        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
    }
}
    
    /* End of file Admin.php */