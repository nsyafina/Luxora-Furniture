<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_barang');
        $this->load->model('m_kategori');
    }

    // List all your items
    public function index($offset = 0)
    {
        $data = array(
            'title' => '<i class="fas fa-solid fa-couch"></i> Data Produk',
            'barang' => $this->m_barang->get_all_data(),
            'isi' => 'barang/v_barang',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

    // Add a new item
    public function add()
    {
        $this->form_validation->set_rules(
            'nama_barang',
            'Nama Barang',
            'required',
            array('required' => '%s Harus Diisi!')
        );
        $this->form_validation->set_rules(
            'id_kategori',
            'Kategori',
            'required',
            array('required' => '%s Harus Diisi!')
        );
        $this->form_validation->set_rules(
            'harga',
            'Harga',
            'required',
            array('required' => '%s Harus Diisi!')
        );
        $this->form_validation->set_rules(
            'berat',
            'Berat',
            'required',
            array('required' => '%s Harus Diisi!')
        );
        $this->form_validation->set_rules(
            'material',
            'Material',
            'required',
            array('required' => '%s Harus Diisi!')
        );
        $this->form_validation->set_rules(
            'warna',
            'Warna',
            'required',
            array('required' => '%s Harus Diisi!')
        );
        $this->form_validation->set_rules(
            'kapasitas',
            'Kapasitas',
            'required',
            array('required' => '%s Harus Diisi!')
        );

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './img/kategori/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico|jfif|wbep';
            $config['max_size'] = '2000';
            $this->upload->initialize($config);
            $field_name = "gambar";
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => '<i class="fas fa-plus"></i> Tambah Produk',
                    'kategori' => $this->m_kategori->get_all_data(),
                    'error_upload' => $this->upload->display_errors(),
                    'isi' => 'barang/v_add',
                );
                $this->load->view('layout/v_wrapper_backend', $data, FALSE);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './img/kategori/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'nama_barang' => $this->input->post('nama_barang'),
                    'id_kategori' => $this->input->post('id_kategori'),
                    'harga' => $this->input->post('harga'),
                    'berat' => $this->input->post('berat'),
                    'material' => $this->input->post('material'),
                    'warna' => $this->input->post('warna'),
                    'kapasitas' => $this->input->post('kapasitas'),
                    'gambar' => $upload_data['uploads']['file_name'],
                );
                $this->m_barang->add($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan!');
                redirect('barang');
            }
        }

        $data = array(
            'title' => '<i class="fas fa-plus"></i> Tambah Produk',
            'kategori' => $this->m_kategori->get_all_data(),
            'isi' => 'barang/v_add',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

    //Update one item
    public function edit($id_barang = NULL)
    {
        $this->form_validation->set_rules(
            'nama_barang',
            'Nama Barang',
            'required',
            array('required' => '%s Harus Diisi!')
        );
        $this->form_validation->set_rules(
            'id_kategori',
            'Kategori',
            'required',
            array('required' => '%s Harus Diisi!')
        );
        $this->form_validation->set_rules(
            'harga',
            'Harga',
            'required',
            array('required' => '%s Harus Diisi!')
        );
        $this->form_validation->set_rules(
            'berat',
            'Berat',
            'required',
            array('required' => '%s Harus Diisi!')
        );
        $this->form_validation->set_rules(
            'material',
            'Material',
            'required',
            array('required' => '%s Harus Diisi!')
        );
        $this->form_validation->set_rules(
            'warna',
            'Warna',
            'required',
            array('required' => '%s Harus Diisi!')
        );
        $this->form_validation->set_rules(
            'kapasitas',
            'Kapasitas',
            'required',
            array('required' => '%s Harus Diisi!')
        );

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './img/kategori/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico|jfif|wbep';
            $config['max_size'] = '2000';
            $this->upload->initialize($config);
            $field_name = "gambar";
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => 'Edit Produk',
                    'kategori' => $this->m_kategori->get_all_data(),
                    'barang' => $this->m_barang->get_data($id_barang),
                    'error_upload' => $this->upload->display_errors(),
                    'isi' => 'barang/v_edit',
                );
                $this->load->view('layout/v_wrapper_backend', $data, FALSE);
            } else {
                //hapus gambar
                $barang = $this->m_barang->get_data($id_barang);
                if ($barang->gambar != "") {
                    unlink('./img/kategori/' . $barang->gambar);
                }
                //end hapus gambar
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './img/kategori/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'id_barang' => $id_barang,
                    'nama_barang' => $this->input->post('nama_barang'),
                    'id_kategori' => $this->input->post('id_kategori'),
                    'harga' => $this->input->post('harga'),
                    'berat' => $this->input->post('berat'),
                    'material' => $this->input->post('material'),
                    'warna' => $this->input->post('warna'),
                    'kapasitas' => $this->input->post('kapasitas'),
                    'gambar' => $upload_data['uploads']['file_name'],
                );
                $this->m_barang->edit($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil Diedit!');
                redirect('barang');
            }
            //jika tanpa ganti gambar
            $data = array(
                'id_barang' => $id_barang,
                'nama_barang' => $this->input->post('nama_barang'),
                'id_kategori' => $this->input->post('id_kategori'),
                'harga' => $this->input->post('harga'),
                'berat' => $this->input->post('berat'),
                'material' => $this->input->post('material'),
                'warna' => $this->input->post('warna'),
                'kapasitas' => $this->input->post('kapasitas'),
            );
            $this->m_barang->edit($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Diedit!');
            redirect('barang');
        }

        $data = array(
            'title' => '<i class="fa fa-edit"></i> Edit Barang',
            'kategori' => $this->m_kategori->get_all_data(),
            'barang' => $this->m_barang->get_data($id_barang),
            'isi' => 'barang/v_edit',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

    //Delete one item
    public function delete($id_barang = NULL)
    {
        //hapus gambar
        $barang = $this->m_barang->get_data($id_barang);
        if ($barang->gambar != "") {
            unlink('./img/kategori/' . $barang->gambar);
        }
        //end hapus gambar
        $data = array(
            'id_barang' => $id_barang,
        );
        $this->m_barang->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus!');
        redirect('barang');
    }
}

/* End of file Barang.php */
