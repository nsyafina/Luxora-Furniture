<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{

    public function total_barang()
    {
        return $this->db->get('barang')->num_rows();
    }

    public function total_kategori()
    {
        return $this->db->get('kategori')->num_rows();
    }

    public function total_transaksi()
    {
        return $this->db->get('transaksi')->num_rows();
    }

    public function total_pelanggan()
    {
        return $this->db->get('pelanggan')->num_rows();
    }

    public function data_setting()
    {
        $this->db->select('*');
        $this->db->from('setting');
        $this->db->where('id', 1);
        return $this->db->get()->row();
    }

    public function edit($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('setting', $data);
    }

    public function cekData($where = null)
    {
        return $this->db->get_where('user', $where);
    }
}

/* End of file M_admin.php */
