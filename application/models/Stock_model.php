<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stock_model extends CI_Model
{
    public function addStock($post)
    {
        $params =  [
            'stock_id' => $post['id'],
            'type' => 'in',
            'kode_obat' => $post['kode_obat'],
            'detail' => $post['keterangan'],
            'suplier_id' => $post['suplier'] == '' ? null : $post['suplier'],
            'qty' => $post['stok'],
            'date' => $post['date'],
            'user_id' => $this->session->userdata("user_id")
        ];

        $this->db->insert('stock', $params);
    }
    public function getStock()
    {
        $query = $this->db->query('SELECT * FROM stock');
        $result = $query->result_array();
        return $result;
    }
}