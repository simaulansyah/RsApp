<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kasir extends CI_Controller
{

    public function index()
    {
        if ($this->session->userdata['role_id'] != 2)
            redirect("auth");
        if (isset($this->session->userdata)) {
            $data['title'] = "Kasir";
            //	$data['user'] = $this->db->get_where('tbl_user', ['id_user' => $this->session->userdata('id_user')])->row_array();
            $data['user'] = $this->db->get_where('tbl_user', array('id_user' => $this->session->userdata['user_id']))->row_array();
            $this->load->view("templates/dashboard_header", $data);
            $this->load->view("templates/dashboard_sidebar", $data);
            $this->load->view("templates/dashboard_topbar", $data);
            $this->load->view("/dashboard");
            $this->load->view("templates/dashboard_footer");
        } else {

            redirect("auth");
        }
    }
}
