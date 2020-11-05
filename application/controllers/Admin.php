<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//load model admin
		$this->load->model('Auth_model');

		//sesion untuk mengamankan ketika di back tidak login lagi
		if (!$this->session->userdata('user_id')) {
			redirect('auth');
		}
	}

	public function index()
	{
		if ($this->session->userdata['role_id'] != 1)
			redirect("auth");
		if (isset($this->session->userdata)) {
			$data['title'] = "Admin";
			//	$data['user'] = $this->db->get_where('tbl_user', ['id_user' => $this->session->userdata('id_user')])->row_array();
			$data['user'] = $this->db->get_where('tbl_user', array('id_user' => $this->session->userdata['user_id']))->row_array();
			$this->load->view("templates/dashboard_header");
			$this->load->view("templates/dashboard_sidebar", $data);
			$this->load->view("templates/dashboard_topbar", $data);
			$this->load->view("/dashboard", $data);
			$this->load->view("templates/dashboard_footer");
		} else {

			redirect("auth");
		}
	}
}
