<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_laporan');
    }

    public function index()
    {
        $data = array(
            'title' => '<i class="nav-icon fas fa-fw fa-file-alt"></i> Laporan Transaksi',
            'isi' => 'v_laporan',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

    public function lap_harian()
    {
        $tanggal = $this->input->post('tanggal');
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data = array(
            'title' => '<i class="nav-icon fas fa-fw fa-file-alt"></i> Laporan Penjualan Harian',
            'tanggal' => $tanggal,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'laporan' => $this->m_laporan->lap_harian($tanggal, $bulan, $tahun),
            'isi' => 'v_laporan_harian',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

    public function lap_bulanan()
    {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data = array(
            'title' => '<i class="nav-icon fas fa-fw fa-file-alt"></i> Laporan Penjualan Bulanan',
            'bulan' => $bulan,
            'tahun' => $tahun,
            'laporan' => $this->m_laporan->lap_bulanan($bulan, $tahun),
            'isi' => 'v_laporan_bulanan',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

    public function lap_tahunan()
    {
        $tahun = $this->input->post('tahun');

        $data = array(
            'title' => '<i class="nav-icon fas fa-fw fa-file-alt"></i> Laporan Penjualan Tahunan',
            'tahun' => $tahun,
            'laporan' => $this->m_laporan->lap_tahunan($tahun),
            'isi' => 'v_laporan_tahunan',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }
}

/* End of file Laporan.php */