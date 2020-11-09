<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Apotek extends CI_Controller
{
    public function index()
    {
        if ($this->session->userdata['role_id'] == 1 || $this->session->userdata['role_id'] == 3  ) 
            
            {
                if (isset($this->session->userdata)) {
                    //	$data['user'] = $this->db->get_where('tbl_user', ['id_user' => $this->session->userdata('id_user')])->row_array();
                    $data['title'] = "Apotek";
                    $data['user'] = $this->db->get_where('tbl_user', array('id_user' => $this->session->userdata['user_id']))->row_array();
                    $data['menu'] = $this->db->get('user_menu')->result_array();
                    $this->load->view("templates/dashboard_header", $data);
                    $this->load->view("templates/dashboard_sidebar", $data);
                    $this->load->view("templates/dashboard_topbar", $data);
                    $this->load->view("/apotek", $data);
                    $this->load->view("templates/dashboard_footer");
                } else {
        
                    redirect("auth");
                }

            }
            else {
                redirect("auth");
            }
    
    }
    public function dataObat()
    {
        if ($this->session->userdata['role_id'] == 1 || $this->session->userdata['role_id'] == 3  ) 
        {
            if (isset($this->session->userdata)) {
                //	$data['user'] = $this->db->get_where('tbl_user', ['id_user' => $this->session->userdata('id_user')])->row_array();

                $this->load->model('Apotek_model', 'obat');

                $data['title'] = "Data Obat";
                $data['user'] = $this->db->get_where('tbl_user', array('id_user' => $this->session->userdata['user_id']))->row_array();
                $data['menu'] = $this->db->get('user_menu')->result_array();
                $data['obat'] = $this->obat->getdata_obat();
                $data['jenis'] = $this->obat->getJenisObat();
                $data['konsumen'] = $this->obat->getKonsumen();
                $data['qty'] = $this->obat->getQty();
                $this->load->view("templates/dashboard_header", $data);
                $this->load->view("templates/dashboard_sidebar", $data);
                $this->load->view("templates/dashboard_topbar", $data);
                $this->load->view("/dataObat", $data);
                $this->load->view("templates/dashboard_footer");
            } else {
    
                redirect("auth");
            }

        }
        else {
            redirect("auth");
        }
        
    }

    public function tambahdataobat()
    {
        $this->load->model('Apotek_model', 'obat');

        $data['title'] = "Data Obat";
        $data['user'] = $this->db->get_where('tbl_user', array('id_user' => $this->session->userdata['user_id']))->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['obat'] = $this->obat->getdata_obat();
        $data['jenis'] = $this->obat->getJenisObat();
        $data['konsumen'] = $this->obat->getKonsumen();
        $data['qty'] = $this->obat->getQty();

        $this->form_validation->set_rules('kode_obat','KODE_OBAT','required|is_unique');
        $this->form_validation->set_rules('nama_obat', 'NAMA_OBAT', 'required');
        $this->form_validation->set_rules('jenis', 'JENIS', 'required');
        $this->form_validation->set_rules('konsumen', 'KONSUMEN', 'required');
        $this->form_validation->set_rules('qty', 'QTY', 'required');

        if ($this->form_validation->run() == false)
        { 
            $this->load->view("templates/dashboard_header", $data);
                $this->load->view("templates/dashboard_sidebar", $data);
                $this->load->view("templates/dashboard_topbar", $data);
                $this->load->view("/dataObat", $data);
                $this->load->view("templates/dashboard_footer");
            
        } else {


            $this->load->model('Apotek_model');
            $model = new Apotek_model();
            $data = [
                'kode_obat' => $this->input->post('kode_obat'),
                'nama_obat' => $this->input->post('nama_obat'),
                'jenis_obat' => $this->input->post('jenis'),
                'konsumen' => $this->input->post('konsumen'),
                'stok' => 0,
                'qty' => $this->input->post('qty'),
                'poto_obat' => $this->input->post('foto'),
                'lain-lain' => $this->input->post('lain-lain'),
            ];
            $model->setDataObat($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Success menginputkan obat </div>');
            redirect('apotek/dataObat');
            
        }
       
    }
    public function hapusObat($id)
    {
        $this->load->model('Apotek_model');
        $this->Apotek_model->delObat($id);
    } 
}
