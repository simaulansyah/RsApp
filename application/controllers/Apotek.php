<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Apotek extends CI_Controller
{
    public function index()
    {
        if ($this->session->userdata['role_id'] != 3)
            redirect("auth");
        if (isset($this->session->userdata)) {
            //	$data['user'] = $this->db->get_where('tbl_user', ['id_user' => $this->session->userdata('id_user')])->row_array();
            $data['title'] = "Apotek";
            $data['user'] = $this->db->get_where('tbl_user', array('id_user' => $this->session->userdata['user_id']))->row_array();
            $data['menu'] = $this->db->get('user_menu')->result_array();
            $this->load->view("templates/dashboard_header", $data);
            $this->load->view("templates/dashboard_sidebar", $data);
            $this->load->view("templates/dashboard_topbar", $data);
            $this->load->view("/dashboard", $data);
            $this->load->view("templates/dashboard_footer");
        } else {

            redirect("auth");
        }
    }
}
