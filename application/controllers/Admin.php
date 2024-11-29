<?php

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_admin');
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
            'title' => '<i class="nav-icon fas fa-dollar-sign" style="margin-right: 5px;"></i> Transaksi Pesanan',
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

    public function myProfil()
    {
        $user = $this->m_admin->cekData(['username' => $this->session->userdata('username')])->row_array();
        // Cek apakah data ditemukan
        if ($user) {
            // Simpan data foto dan nama pengguna di session
            $this->session->set_userdata('foto', $user['foto']);
            $this->session->set_userdata('nama_user', $user['nama_user']);
            $data = [
                'title' => '<i class="nav-icon fas fa-user"></i> Profile Saya',
                'foto' => $user['foto'],
                'nama_user' => $user['nama_user'],
                'username' => $user['username'],
                'alamat' => $user['alamat'],
                'no_telp' => $user['no_telp'],
                'isi' => 'member/index',
            ];
            $this->load->view('layout/v_wrapper_backend', $data, FALSE);  // Pastikan layout dipanggil dengan data yang benar
        }
    }

    public function ubahProfil()
    {
        $user = $this->m_admin->cekData(['username' => $this->session->userdata('username')])->row_array();
        if ($user) {
            $data = [
                'title' => '<i class="nav-icon fas fa-edit"></i> Ubah Profile',
                'foto' => $user['foto'],
                'nama_user' => $user['nama_user'],
                'username' => $user['username'],
                'alamat' => $user['alamat'],
                'no_telp' => $user['no_telp'],
                'isi' => 'member/ubahprofil',
            ];
        }

        // Validasi form
        $this->form_validation->set_rules('nama_user', 'Nama Lengkap', 'required|trim', [
            'required' => 'Nama tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('username', 'Username', 'required|trim', [
            'required' => 'Username tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'Alamat tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('no_telp', 'No Telp', 'required|trim', [
            'required' => 'No Telp tidak Boleh Kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/v_wrapper_backend', $data, FALSE);  // Pastikan layout dipanggil dengan data yang benar
        } else {
            // Ambil data input dari form
            $nama_user = $this->input->post('nama_user', true);
            $username = $this->input->post('username', true);
            $alamat = $this->input->post('alamat', true);
            $no_telp = $this->input->post('no_telp', true);

            // Jika ada gambar yang akan diupload
            $upload_image = $_FILES['foto']['name'];
            if ($upload_image) {
                $config['upload_path'] = 'img/profile/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '3000';
                $config['max_width'] = '1024';
                $config['max_height'] = '1000';
                $config['file_name'] = 'pro' . time();
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $gambar_lama = $user['foto'];
                    if ($gambar_lama != 'foto-profile.jpeg') {
                        unlink(FCPATH . 'img/profile/' . $gambar_lama);
                    }
                    $gambar_baru = $this->upload->data('file_name');
                    $this->db->set('foto', $gambar_baru);
                }
            }

            // Perbarui data user berdasarkan id_user yang sedang login (gunakan id_user, bukan username)
            $this->db->set('nama_user', $nama_user);
            $this->db->set('alamat', $alamat);
            $this->db->set('no_telp', $no_telp);
            $this->db->set('username', $username);
            $this->db->where('id_user', $user['id_user']);  // Update berdasarkan id_user
            $this->db->update('user');

            // Perbarui session 'nama_user'
            $this->session->set_userdata('nama_user', $nama_user);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Profil Berhasil diubah </div>');
            redirect('admin/myProfil');
        }
    }
}
