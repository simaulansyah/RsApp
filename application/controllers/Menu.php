<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function index()
    {
        if ($this->session->userdata['role_id'] != 1)
            redirect("auth");
        if (isset($this->session->userdata)) {
            //	$data['user'] = $this->db->get_where('tbl_user', ['id_user' => $this->session->userdata('id_user')])->row_array();
            $data['title'] = "Menu Management";
            $data['user'] = $this->db->get_where('tbl_user', array('id_user' => $this->session->userdata['user_id']))->row_array();
            $data['menu'] = $this->db->get('user_menu')->result_array();

            $this->form_validation->set_rules('menu', 'Menu', 'required');

            if ($this->form_validation->run() == FALSE) {

                $this->load->view("templates/dashboard_header", $data);
                $this->load->view("templates/dashboard_sidebar", $data);
                $this->load->view("templates/dashboard_topbar", $data);
                $this->load->view("menu/index", $data);
                $this->load->view("templates/dashboard_footer");
            } else {
                $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Success Add </div>');
                redirect('menu');
            }
        }
    }

    public function submenu()
    {


        $this->load->model('Menu_model', 'menu');

        $data['title'] = "Sub Menu Management";
        $data['user'] = $this->db->get_where('tbl_user', array('id_user' => $this->session->userdata['user_id']))->row_array();
        $data['submenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'ICON', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view("templates/dashboard_header", $data);
            $this->load->view("templates/dashboard_sidebar", $data);
            $this->load->view("templates/dashboard_topbar", $data);
            $this->load->view("menu/submenu", $data);
            $this->load->view("templates/dashboard_footer");
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')

            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Success Add submenu </div>');
            redirect('menu/submenu');
        }
    }


    public function deleteMenu()
    {
        //$this->load->model('Menu_model', 'menu');
        $this->load->model('Menu_model');
        $id = $this->input->post('daldel'); //daldel nama inputan hiden di view
        $this->Menu_model->hapusmenu($id); // mengirim data id ke model

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Success Menghapus Menu </div>');
            redirect('menu');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert"> Gagal Menghapus Menu </div>');
            redirect('menu');
        }



        redirect('menu');
    }

    public function delSub()
    {
        $this->load->model('Menu_model');
        $id = $this->input->post('daldelSub');
        $this->Menu_model->hapusSubmenu($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Success Menghapus SubMenu </div>');
            redirect('menu/submenu');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> gagal Menghapus SubMenu </div>');
            redirect('menu/submenu');
        }
    }
    public function editMenu()

    {
        $data['title'] = "Menu Management";
        $data['user'] = $this->db->get_where('tbl_user', array('id_user' => $this->session->userdata['user_id']))->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required|trim|callback_alpha_dash_space');

        if ($this->form_validation->run() == FALSE)
        {
                $this->load->view("templates/dashboard_header", $data);
                $this->load->view("templates/dashboard_sidebar", $data);
                $this->load->view("templates/dashboard_topbar", $data);
                $this->load->view("menu/index", $data);
                $this->load->view("templates/dashboard_footer");
        }
        else {
            $id = $this->input->post('id');
            $menu = $this->input->post('menu');
            $this->db->set('menu', $menu);
            $this->db->where('id', $id);
            $this->db->update('user_menu');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Success Edit </div>');
            redirect('menu');
        }

    }
    public function editSub()
    {

        $this->load->model('Menu_model', 'menu');

        $data['title'] = "Sub Menu Management";
        $data['user'] = $this->db->get_where('tbl_user', array('id_user' => $this->session->userdata['user_id']))->row_array();
        $data['submenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title','required|trim|callback_alpha_dash_space');
        $this->form_validation->set_rules('url', 'URL', 'required|trim');

        if ($this->form_validation->run() == FALSE)
        { 
            $this->load->view("templates/dashboard_header", $data);
            $this->load->view("templates/dashboard_sidebar", $data);
            $this->load->view("templates/dashboard_topbar", $data);
            $this->load->view("menu/submenu", $data);
            $this->load->view("templates/dashboard_footer");
        }else 
        {
            $id = $this->input->post('id');
            $data = array (
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            );
         
            $this->db->update('user_sub_menu', $data, array('id' => $id));
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Success Edit Sub </div>');
            redirect('menu/submenu');
        }

    }
    function alpha_dash_space($str)
    {
        return ( ! preg_match("/^([-a-z_ ])+$/i", $str)) ? FALSE : TRUE;
    } 
   
}
