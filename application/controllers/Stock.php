<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stock extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
        $this->load->model('Apotek_model', 'obat');
        $this->load->model('Stock_model', 'stock');
       
    }

    public function stock_in_data()
    {
        $data['title'] = "Data Stock";
        $data['user'] = $this->db->get_where('tbl_user', array('id_user' => $this->session->userdata['user_id']))->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['stock'] = $this->stock->getStock();

        $this->load->view("templates/dashboard_header", $data);
        $this->load->view("templates/dashboard_sidebar", $data);
        $this->load->view("templates/dashboard_topbar", $data);
        $this->load->view("Transaksi/stock_in/stock_in_data", $data);
        $this->load->view("templates/dashboard_footer", $data);
    }

    public function stock_in_add()
    {
                        $data['title'] = "Stock_in";
                        $data['user'] = $this->db->get_where('tbl_user', array('id_user' => $this->session->userdata['user_id']))->row_array();
                        $data['menu'] = $this->db->get('user_menu')->result_array();
                        $data['obat'] = $this->obat->getdata_obat();
                        $data['suplier'] = $this->obat->getSuplier();
                        
               
                    $this->load->view("templates/dashboard_header", $data);
                    $this->load->view("templates/dashboard_sidebar", $data);
                    $this->load->view("templates/dashboard_topbar", $data);
                    $this->load->view("Transaksi/stock_in/stock_in_form", $data);
                    $this->load->view("templates/dashboard_footer", $data);
        //$this->load->view("Transaksi/stock_in/stock_in_form");


    }

    public function stockProses()
    {
        if (isset($_POST['in_add']))
        {
            $post = $this->input->post(null, TRUE);
            $this->stock->addStock($post);
            $this->obat->update_stock_in($post);
            
            if ($this->db->affected_rows() > 0 ){
                $this->session->set_flashdata('succes', 'database berhasil di isi');

            }
            
        }
       redirect('stock/in/add');
    }

}