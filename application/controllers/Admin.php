<?php

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_admin');
        $this->load->model('m_user');
        $this->load->model('m_pesanan_masuk'); // Add this line to load the model
    }


    public function index()
    {
        $data = array(
            'title' => '<i class="nav-icon fas fa-tachometer-alt"></i> Dashboard',
            'total_barang' => $this->m_admin->total_barang(),
            'total_kategori' => $this->m_admin->total_kategori(),
            'total_transaksi' => $this->m_admin->total_transaksi(),
            'total_pelanggan' => $this->m_admin->total_pelanggan(),
            'isi' => 'v_admin',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
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
                'title' => '<i class="nav-icon fas fa-cog"></i> Setting',
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

    public function pesanan_masuk()
    {
        $data = array(
            'title' => '<i class="nav-icon fas fa-dollar-sign"></i> Transaksi Pesanan',
            'pesanan' => $this->m_pesanan_masuk->pesanan(),
            'pesanan_diproses' => $this->m_pesanan_masuk->pesanan_diproses(),
            'pesanan_dikirim' => $this->m_pesanan_masuk->pesanan_dikirim(),
            'pesanan_selesai' => $this->m_pesanan_masuk->pesanan_selesai(),
            'isi' => 'v_pesanan_masuk',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

    public function proses($id_transaksi)
    {
        $data = array(
            'id_transaksi' => $id_transaksi,
            'status_order' => '1'
        );
        $this->m_pesanan_masuk->update_order($data);
        $this->session->set_flashdata('pesan', 'Pesanan berhasil diproses!');
        redirect('admin/pesanan_masuk');
    }

    public function kirim($id_transaksi)
    {
        $data = array(
            'id_transaksi' => $id_transaksi,
            'no_resi' => $this->input->post('no_resi'),
            'status_order' => '2'
        );
        $this->m_pesanan_masuk->update_order($data);
        $this->session->set_flashdata('pesan', 'Pesanan berhasil dikirim!');
        redirect('admin/pesanan_masuk');
    }

    public function akun()
    {
        $user = $this->m_admin->cekData(['username' => $this->session->userdata('username')])->row_array();
        // Cek apakah data ditemukan
        if ($user) {
            // Simpan data foto dan nama pengguna di session
            $this->session->set_userdata('foto_backend', $user['foto']);
            $this->session->set_userdata('nama_user', $user['nama_user']);

            // Tambahkan data user ke array
            $data = [
                'title' => '<i class="nav-icon fas fa-user"></i> Profile Saya',
                'user' => (object) $user, // Kirimkan $user sebagai object
                'isi' => 'member/index',
            ];
            $this->load->view('layout/v_wrapper_backend', $data, FALSE);  // Pastikan layout dipanggil dengan data yang benar
        } else {
            // Redirect jika user tidak ditemukan
            $this->session->set_flashdata('pesan', 'User tidak ditemukan.');
            redirect('admin');
        }
    }


    public function edit()
    {
        // Ambil data user dari session
        $username = $this->session->userdata('username');

        // Dapatkan data user berdasarkan username
        $user = $this->m_user->get_by_username($username);
        if (!$user) {
            $this->session->set_flashdata('error', 'Data user tidak ditemukan!');
            redirect('admin/akun');
        }

        // Validasi form
        $this->form_validation->set_rules('nama_user', 'Nama user', 'required', array('required' => '%s Harus diisi!!'));
        $this->form_validation->set_rules('username', 'Username', 'required', array('required' => '%s Harus diisi!!'));
        $this->form_validation->set_rules('no_telp', 'No Telepon', 'required', array('required' => '%s Harus diisi!!'));
        $this->form_validation->set_rules('password', 'Password', 'min_length[6]', array('min_length' => '%s minimal 6 karakter.'));

        if ($this->form_validation->run() == TRUE) {
            // Konfigurasi upload
            $config['upload_path'] = './img/profile-admin/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
            $config['max_size'] = '2000';
            $this->upload->initialize($config);

            // Data yang akan diupdate
            $data = array(
                'id_user' => $user->id_user,
                'nama_user' => $this->input->post('nama_user'),
                'username' => $this->input->post('username'),
                'no_telp' => $this->input->post('no_telp'),
            );

            // Periksa apakah password diisi
            if (!empty($this->input->post('password'))) {
                $data['password'] = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
            }

            // Jika ada file foto yang diunggah
            if ($this->upload->do_upload('foto')) {
                // Hapus foto lama jika ada, kecuali foto default
                if (!empty($user->foto) && $user->foto != 'default-pict.jpg') {
                    unlink('./img/profile-admin/' . $user->foto);
                }
                $upload_data = $this->upload->data();
                $data['foto'] = $upload_data['file_name'];

                // Update session khusus backend
                $this->session->set_userdata('foto_backend', $data['foto']); // Update session dengan foto baru
            } else {
                // Jika tidak ada foto baru, gunakan foto lama
                $data['foto'] = $user->foto;
                $this->session->set_userdata('foto_backend', $user->foto); // Pastikan session tetap sinkron
            }

            // Simpan perubahan ke database
            $this->m_user->edit($data);

            // Update session dengan data terbaru
            $this->session->set_userdata('nama_user', $this->input->post('nama_user'));
            $this->session->set_userdata('username', $this->input->post('username'));
            $this->session->set_userdata('no_telp', $this->input->post('no_telp'));

            $this->session->set_flashdata('pesan', 'Data berhasil diperbarui!');
            redirect('admin/akun');
        }

        // Data untuk ditampilkan di view
        $data = array(
            'title' => '<i class="nav-icon fas fa-user-edit"></i> Edit Profile',
            'user' => $user, // Data user yang akan diedit
            'isi' => 'member/ubahprofil',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }
}
