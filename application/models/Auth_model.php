<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{

    function logged_id()
    {
        return $this->session->userdata('id_user');
    }

    public function cek_login($username)
    {
        $hasil = $this->db->where('nama_user', $username)->limit(1)->get('tbl_user');
        if ($hasil->num_rows() > 0) {
            return $hasil->row();
        } else {
            return array();
        }
    }
    public function m_jabatan()
    {
        $query = $this->db->query('SELECT nama_jabatan FROM tbl_jabatan');
        $result = $query->result_array();
        return $result;
    }

    public function get_user()
    {
        $query = $this->db->query('SELECT * FROM tbl_user');
        $result = $query->result_array();
        return $result;
    }
}
