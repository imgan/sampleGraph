<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tahun_akad2 extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('model_tahun_akademik');
        if (empty($this->session->userdata('username')) && empty($this->session->userdata('nama'))) {
            $this->session->set_flashdata('category_error', 'Silahkan masukan username dan password');
            redirect('dashboard/login');
        }
    }

    function render_view($data)
    {
        $this->template->load('template', $data); //Display Page

    }

    public function index()
    {
        if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {
            $mysekolah = $this->model_tahun_akademik->getsekolah()->result_array();
            $data = array(
                'page_content'  => 'tahun_akademik/view2',
                'ribbon'        => '<li class="active">Tahun Akademik</li>',
                'page_name'     => 'Tahun Akademik',
                'mysekolah'     => $mysekolah
            );
            $this->render_view($data); //Memanggil function render_view
        } else {
            $this->load->view('page/login'); //Memanggil function render_view
        }
    }

    public function tampil()
    {
        if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {
            $my_data = $this->model_tahun_akademik->viewjoin('tbakadmk2')->result();
            echo json_encode($my_data);
        } else {
            $this->load->view('page/login'); //Memanggil function render_view
        }
    }

    public function tampil_byid()
    {
        if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {
            $data = array(
                'id'  => $this->input->post('id'),
            );
            $my_data = $this->model_tahun_akademik->view_where('tbakadmk2', $data)->result();
            echo json_encode($my_data);
        } else {
            $this->load->view('page/login'); //Memanggil function render_view
        }
    }

    public function simpan()
    {
        if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {
            $data = array(
                'SEMESTER'  => $this->input->post('semester'),
                'TAHUN'  => $this->input->post('tahun'),
                'THNAKAD'  => $this->input->post('tahun_akad'),
                'UTSUAS'  => $this->input->post('uts_uas'),
                'INDEK'  => $this->input->post('indek'),
                'THNDAPODIK'  => $this->input->post('thndapodik'),
                'KDSEKOLAH'  => $this->input->post('kdsekolah'),
                'createdAt' => date('Y-m-d H:i:s'),
            );
            $action = $this->model_tahun_akademik->insert($data, 'tbakadmk2');
            echo json_encode($action);
        } else {
            $this->load->view('page/login'); //Memanggil function render_view
        }
    }

    public function update()
    {
        if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {
            $data_id = array(
                'ID'  => $this->input->post('e_id')
            );
            $data = array(
                'SEMESTER'  => $this->input->post('e_semester'),
                'TAHUN'  => $this->input->post('e_tahun'),
                'THNAKAD'  => $this->input->post('e_tahun_akad'),
                'UTSUAS'  => $this->input->post('e_uts_uas'),
                'INDEK'  => $this->input->post('e_indek'),
                'THNDAPODIK'  => $this->input->post('e_thndapodik'),
                'KDSEKOLAH'  => $this->input->post('e_kdsekolah'),
                'updatedAt' => date('Y-m-d H:i:s'),
            );

            $action = $this->model_tahun_akademik->update($data_id, $data, 'tbakadmk2');
            echo json_encode($action);
        } else {
            $this->load->view('page/login'); //Memanggil function render_view
        }
    }
}
