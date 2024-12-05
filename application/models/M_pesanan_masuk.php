<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pesanan_masuk extends CI_Model
{
    public function pesanan()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('status_order=0');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
    }

    /*public function pesanan() {
        $this->db->select('transaksi.*, rinci_transaksi.id_barang, rinci_transaksi.qty');
        $this->db->from('transaksi');
        $this->db->join('rinci_transaksi', 'transaksi.no_order = rinci_transaksi.no_order');
        $this->db->where('transaksi.status_order=0');
        $this->db->order_by('transaksi.id_transaksi', 'desc');
        return $this->db->get()->result();
    }*/
    // Lakukan modifikasi serupa untuk fungsi pesanan_diproses, pesanan_dikirim, dan pesanan_selesai

    public function pesanan_diproses()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('status_order=1');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
    }

    public function pesanan_dikirim()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('status_order=2');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
    }

    public function pesanan_selesai()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('status_order=3');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
    }

    public function update_order($data)
    {
        $this->db->where('id_transaksi', $data['id_transaksi']);
        $this->db->update('transaksi', $data);
    }
}
