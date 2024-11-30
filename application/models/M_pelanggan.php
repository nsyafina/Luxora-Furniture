<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_pelanggan extends CI_Model
{

    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('pelanggan');
        $this->db->order_by('id_pelanggan', 'desc');
        return $this->db->get()->result();
    }

    public function register($data)
    {
        $this->db->insert('pelanggan', $data);
    }

    public function edit($data)
    {
        $this->db->where('id_pelanggan', $data['id_pelanggan']);
        $this->db->update('pelanggan', $data);
    }
    public function get_by_email($email)
    {
        return $this->db->where('email', $email)->get('pelanggan')->row();
    }

    public function cekData($where = null)
    {
        return $this->db->get_where('pelanggan', $where);
    }
}

/* End of file M_pelanggan.php */
