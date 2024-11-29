<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Belanja extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_transaksi');
    }

    // List all your items
    public function index()
    {
        if (empty($this->cart->contents())) {
            redirect('home');
        }
        $data = array(
            'title' => 'Keranjang Belanja',
            'isi' => 'v_belanja',
        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
    }

    // Add a new item
    public function add()
    {
        $redirect_page = $this->input->post('redirect_page');
        $data = array(
            'id' => $this->input->post('id'),
            'qty' => $this->input->post('qty'),
            'price' => $this->input->post('price'),
            'name' => $this->input->post('name'),
        );
        $this->cart->insert($data);
        $this->session->set_flashdata('pesan', 'Barang Berhasil Ditambahkan Ke Keranjang!');
        redirect($redirect_page, 'refresh');
    }

    public function update()
    {
        $i = 1;
        foreach ($this->cart->contents() as $items) {
            $data = array(
                'rowid' => $items['rowid'],
                'qty' => $this->input->post($i . '[qty]'),

            );
            $this->cart->update($data);
            $i++;
        }
        $this->session->set_flashdata('pesan', 'Keranjang berhasil di update!');
        redirect('belanja');
    }

    public function delete($rowid)
    {
        $this->cart->remove($rowid);
        redirect('belanja');
    }

    public function clear()
    {
        $this->cart->destroy();
        redirect('belanja');
    }

    public function checkout()
    {
        $this->pelanggan_login->proteksi_halaman();
        $this->load->library('form_validation'); // Load library form_validation

        // Set aturan validasi form
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required', array('required' => '%s harus diisi!'));
        $this->form_validation->set_rules('kota', 'Kota', 'required', array('required' => '%s harus diisi!'));
        $this->form_validation->set_rules('expedisi', 'Expedisi', 'required', array('required' => '%s harus diisi!'));
        $this->form_validation->set_rules('paket', 'Paket', 'required', array('required' => '%s harus diisi!'));

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'CheckOut Product',
                'isi' => 'v_checkout',
            );
            $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
        } else {
            //simpan  ke tabel transaksi
            $data = array(
                'id_pelanggan' => $this->session->userdata('id_pelanggan'),
                'no_order' => $this->input->post('no_order'),
                'tgl_order' => date('Y-m-d'),
                'nama_penerima' => $this->input->post('nama_penerima'),
                'hp_penerima' => $this->input->post('hp_penerima'),
                'alamat' => $this->input->post('alamat'),
                'provinsi' => $this->input->post('provinsi'),
                'kota' => $this->input->post('kota'),
                'kode_pos' => $this->input->post('kode_pos'),
                'expedisi' => $this->input->post('expedisi'),
                'paket' => $this->input->post('paket'),
                'estimasi' => $this->input->post('estimasi'),
                'ongkir' => $this->input->post('ongkir'),
                'berat' => $this->input->post('berat'),
                'sub_total' => $this->input->post('sub_total'),
                'grand_total' => $this->input->post('grand_total'),
                'status_bayar' => '0',
                'status_order' => '0',
            );
            $this->m_transaksi->simpan_transaksi($data);
            //simpan  ke tabel rinci transaksi
            $i = 1;
            foreach ($this->cart->contents() as $item) {
                $data_rinci = array(
                    'no_order' => $this->input->post('no_order'),
                    'id_barang' => $item['id'],
                    'qty' => $this->input->post('qty' . $i++)
                );
                $this->m_transaksi->simpan_rinci_transaksi($data_rinci);
            }
            //==========================================
            $this->session->set_flashdata('pesan', 'Pesanan berhasil di proses!!');
            $this->cart->destroy();
            redirect('pesanan_saya');
        }
    }
}
