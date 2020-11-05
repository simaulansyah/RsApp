<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('Auth_model');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
    }


    public function index()
    {

        if ($this->session->userdata('id_user')) {
            redirect('admin');
        }

        $this->load->view('templates/auth_header');
        $this->load->view('templates/auth_footer');
        $this->load->view('login');
    }


    public function login()
    {
    }

    public function user()
    {

        if (!$this->session->userdata('user_id')) {
            redirect('auth');
        }


        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['user'] = $this->db->get_where('tbl_user', ['id_user' =>
        $this->session->userdata('user_id')])->row_array();

        $this->form_validation->set_rules('name', 'name', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view("templates/dashboard_header");
            $this->load->view("templates/dashboard_sidebar", $data);
            $this->load->view('profile', $data);
            $this->load->view("templates/dashboard_footer");
        } else {

            $id = $this->input->post('id');
            $name = $this->input->post('name');
            $jabatan = $this->input->post('jabatan');

            // cek jika ada gambar
            $upload_image = $_FILES['foto']['name'];

            if ($upload_image) {
                $config['upload_path']          = './assets/img';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {

                    $old_image = $data['user']['image'];
                    if ($old_image != "default.jpg") {
                        unlink(FCPATH . 'assets/img' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('foto', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }


            $this->db->set('nama_user', $name);
            $this->db->set('jabatan', $jabatan);

            $this->db->where('id_user', $id);
            $this->db->update('tbl_user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">data berhasil di ubah</div>');
            //$this->session->set_userdata('name', $name);
            redirect('auth/user');
        }
    }

    public function proses_login()
    {

        $this->load->library('session');
        if ($this->Auth_model->logged_id()) {
            //jika memang session sudah terdaftar, maka redirect ke halaman dahsboard
            redirect("admin");
        } else {

            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if ($this->form_validation->run() == FALSE) {

                $errors = validation_errors();
                $this->session->set_flashdata('form_error', $errors);
                redirect('auth');
            } else {

                $username = htmlspecialchars($this->input->post('username'));
                $pass = htmlspecialchars($this->input->post('password'));
                $jabatan = $this->input->post('jabatan');

                // CEK KE DATABASE BERDASARKAN username
                $cek_login = $this->Auth_model->cek_login($username);

                if ($cek_login == NULL) {
                    echo '<script>alert("Username yang Anda masukan salah.");window.location.href="' . base_url('auth') . '";</script>';
                } else {

                    if ($pass == $cek_login->password && $jabatan == $cek_login->jabatan) {


                        $session_data = array(
                            'user_id'   => $cek_login->id_user,
                            'role_id'   => $cek_login->role_id
                        );
                        $this->session->set_userdata($session_data);
                        if ($this->session->userdata['role_id'] == 1) {
                            redirect('admin');
                        }
                        if ($this->session->userdata['role_id'] == 2) {
                            redirect('kasir');
                        }
                        if ($this->session->userdata['role_id'] == 3) {
                            redirect('apotek');
                        } else {
                            redirect('welcome');
                        }
                    } else {
                        echo '<script>alert("jabatan atau Password yang Anda masukan tidak sesuai.");window.location.href="' . base_url('auth') . '";</script>';
                    }
                }
            }
        }
    }

    public function proses_register()
    {
        # code...
    }

    public function logout()
    {
        unset($_SESSION['user_id']);
        //$this->session->unset_userdata(array('user_name' => ''));
        redirect('auth');
    }
}
