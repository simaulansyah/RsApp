<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Apotek_model extends CI_Model
{
    public function getdata_obat()
    {
        $query = $this->db->query('SELECT * FROM obat');
        $result = $query->result_array();
        return $result;
    }
    public function getJenisObat()
    {
        $query = $this->db->query('SELECT jenis FROM jenis_obat');
        $result = $query->result_array();
        return $result;
    }
    public function getKonsumen()
    {
        $query = $this->db->query('SELECT konsumen FROM konsumen');
        $result = $query->result_array();
        return $result;
    }

    public function getQty()
    {
        $query = $this->db->query('SELECT qty FROM qty');
        $result = $query->result_array();
        return $result;
    }

    public function setDataObat($data)
    {
        $this->db->insert('obat', $data);
    }

    public function delObat($id)
    {
        $this->db->where('id', $id); // nama_field
        $this->db->delete('obat'); // nama_tabel

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert"> Success Menghapus Menu </div>');
            redirect('Apotek/dataObat');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert"> Gagal Menghapus Menu </div>');
            redirect('Apotek/dataObat');
        }

    }
 
}