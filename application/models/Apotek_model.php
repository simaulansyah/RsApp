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
    public function editMObat($id)
    {
       $query = $this->db->get_where('obat', array('id' => $id))->row();
       return $query;
    }
    public function UpdateDataObat($data,$id)
    {
       $query = $this->db->update('obat', $data, array('id' => $id)); 
       
    }

    public function getSuplier()
    {
        $query = $this->db->query('SELECT * FROM suplier');
        $result = $query->result_array();
        return $result;

    }

    public function update_stock_in($data)
    {
    
        $qty = $data['stok'];
        $kode_obat = $data['kode_obat'];

        $sql = "UPDATE obat SET stok = stok + '$qty' WHERE kode_obat = '$kode_obat'";

        $this->db->query($sql);

    }

 
}