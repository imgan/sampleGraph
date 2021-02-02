<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	function render_view($data)
	{
		$this->template->load('template', $data); //Display Page
	}
	function crousel()
	{
		$this->load->view('crouselmenu');
	}

	public function index()
	{
		if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {
			$data = array(
				'page_content' 	=> 'dashboard',
				'ribbon' 		=> '<li class="active">Dashboard</li>',
				'page_name' 	=> 'Dashboard',
			);
			$this->render_view($data); //Memanggil function render_view
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}
}
