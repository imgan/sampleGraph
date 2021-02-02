<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Biodataguru extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('payroll/model_guru');
		$this->load->model('payroll/model_jabatan');
	}

	function render_view($data)
	{
		$this->template->load('templatepayroll', $data); //Display Page
	}

	public function index()
	{
		if ($this->session->userdata('username_payroll') != null && $this->session->userdata('nama') != null) {

			$my_data = $this->model_guru->viewOrdering('sekolah','deskripsi','asc')->result_array();
			$myagama = $this->model_guru->view('tbagama')->result_array();
			$mypendidikan = $this->model_guru->view('mspendidikan')->result_array();
			$data = array(
				'page_content' 	=> '../pagepayroll/biodataguru/view',
				'ribbon' 		=> '<li class="active">Dashboard</li><li>Master Biodata Guru</li>',
				'page_name' 	=> 'Master Biodata Guru',
				'js' 			=> 'js_file',
				'myprogram' 	=> $my_data,
				'myagama'		=> $myagama,
				'mypendidikan' 	=> $mypendidikan
			);
			$this->render_view($data); //Memanggil function render_view
		} else {
			$this->load->view('pagepayroll/login'); //Memanggil function render_view
		}
	}

	public function simpan()
	{
		if ($this->session->userdata('username_payroll') != null && $this->session->userdata('nama') != null) {

			$data = array(
				'IdGuru'  => $this->input->post('IdGuru'),
				'GuruNoDapodik'  => $this->input->post('GuruNoDapodik'),
				'Tahunmasakerja'  => $this->input->post('Tahunmasakerja'),
				'GuruNama'  => $this->input->post('nama'),
				'GuruNPWP'  => $this->input->post('npwp'),
				'GuruTelp'  => $this->input->post('telepon'),
				'GuruAlamat'  => $this->input->post('alamat'),
				'GuruBase' => $this->input->post('program_sekolah'),
				'password'  => hash('sha512', md5($this->input->post('IdGuru'))),
				'GuruJeniskelamin'  => $this->input->post('jenis_kelamin'),
				'GuruPendidikanAkhir'  => $this->input->post('pendidikan_terakhir'),
				'GuruAgama'  => $this->input->post('agama'),
				'GuruEmail' => $this->input->post('email'),
				'GuruTglLahir'  => $this->input->post('tgl_lahir'),
				'GuruTempatLahir'  => $this->input->post('tempat_lahir'),
				'GuruStatus'  => $this->input->post('status'),
				'awal_kerja'  => $this->input->post('awal_kerja'),
				'GuruNik'  => $this->input->post('nik'),
				'createdAt' => date('Y-m-d H:i:s')
			);
			$count_id = $this->model_guru->view_count('tbguru', $data['IdGuru']);
			if ($count_id < 1) {
				$result = $this->model_guru->insert($data, 'tbguru');
				if ($result) {
					echo $result;
				} else {
					echo 'insert gagal';
				}
			} else {
				echo json_encode(401);
			}
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}

	public function tampil_byid()
	{
		if ($this->session->userdata('username_payroll') != null && $this->session->userdata('nama') != null) {

			$data = array(
				'IdGuru'  => $this->input->post('id'),
			);
			$my_data = $this->model_guru->view_where_v2('tbguru', $data)->result();
			echo json_encode($my_data);
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}

	public function tampil_byidrp()
	{
		if ($this->session->userdata('username_payroll') != null && $this->session->userdata('nama') != null) {

			$data = array(
				'IdGuru'  => $this->input->post('id'),
			);
			$my_data = $this->model_guru->view_where_v3('tbgururiwayat', $data)->result();
			echo json_encode($my_data);
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}

	public function import()
	{
		if ($this->session->userdata('username_payroll') != null && $this->session->userdata('nama') != null) {
			$files = $_FILES;
			$file = $files['file'];
			$fname = $file['tmp_name'];
			$file = $_FILES['file']['name'];
			$fname = $_FILES['file']['tmp_name'];
			$ext = explode('.', $file);
			/** Include path **/
			set_include_path(APPPATH . 'third_party/PHPExcel/Classes/');
			/** PHPExcel_IOFactory */
			include 'PHPExcel/IOFactory.php';
			$objPHPExcel = PHPExcel_IOFactory::load($fname);
			$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, false, true);
			$data_exist = [];

			foreach ($allDataInSheet as $ads) {
				if (array_filter($ads)) {
					array_push($data_exist, $ads);
				}
			}
			foreach ($data_exist as $key => $value) {
				if ($key == '0') {
					continue;
				} else {
					$arrayCustomerQuote = array(
						'IdGuru' => $value[0],
						'GuruNoDapodik' => $value[1],
						'GuruNama' => $value[2],
						'GuruTelp' => $value[3],
						'GuruAlamat' => $value[4],
						'GuruBase' => $value[5],
						'password' => hash('sha512', md5($value[0])),
						'GuruJenisKelamin' => $value[6],
						'GuruPendidikanAkhir' => $value[7],
						'GuruAgama' => $value[8],
						'GuruEmail' => $value[9],
						'GuruTglLahir' => $value[10],
						'GuruTempatLahir' => $value[11],
						'awal_kerja' => $value[12],
						'status' => $value[13],
						'createdAt'	=> date('Y-m-d H:i:s')
					);
					$data = array(
						"IdGuru" => $value[0],
					);
					$cek = $this->model_guru->cek($value[0])->num_rows();
					if ($cek > 0) {
						$result = $this->model_guru->update($data,  $arrayCustomerQuote, 'tbguru');
					} else {
						$result = $this->model_guru->insert($arrayCustomerQuote, 'tbguru');
					}
				}
			}
			if ($result) {
				$result = 1;
			}
			echo json_encode($result);
		} else {
			echo json_encode($result);
		}
	}

	public function insertguru($arrayBatch = array())
	{
		if (count($arrayBatch) > 0) {
			foreach ($arrayBatch as $data) {
				// Insert to guru
				$insertGuru['IdGuru'] = $data['IdGuru'];
				$insertGuru['GuruNoDapodik'] = $data['GuruNoDapodik'];
				$insertGuru['GuruNama'] = $data['GuruNama'];
				// $insertGuru['GuruTelp']    = $$data['GuruTelp'];
				$insertGuru['GuruAlamat']     = $data['GuruAlamat'];
				$insertGuru['GuruBase']  = $data['GuruBase'];
				// $insertGuru['GuruWaktu']   = $data['IdGuru'];
				$insertGuru['GuruJenisKelamin']  = $data['GuruJenisKelamin'];
				$insertGuru['GuruPendidikanAkhir']   = $data['GuruPendidikanAkhir'];
				$insertGuru['GuruAgama']  = $data['GuruAgama'];
				$insertGuru['GuruEmail']  = $data['GuruEmail'];
				$insertGuru['GuruTglLahir']  = $data['GuruTglLahir'];
				$insertGuru['GuruTempatLahir']  = $data['GuruTempatLahir'];
				$insertGuru['createdAt']  = date('Y-m-d H:i:s');
				$result = $this->model_guru->insert($insertGuru, 'tbguru');
			}
		} else {
			return false;
		}
		return $result;
	}
	public function tampil()
	{
		if ($this->session->userdata('username_payroll') != null && $this->session->userdata('nama') != null) {

			$my_data = $this->model_guru->view_guru('tbguru')->result_array();
			echo json_encode($my_data);
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}

	public function updatebiodata()
	{
		if ($this->session->userdata('username_payroll') != null && $this->session->userdata('nama') != null) {
			$data_id = array(
				'id'  => $this->input->post('e_id')
			);
			$data = array(
				'IdGuru'  => $this->input->post('e_IdGuru'),
				'GuruNoDapodik'  => $this->input->post('e_GuruNoDapodik'),
				'Tahunmasakerja'  => $this->input->post('e_Tahunmasakerja'),
				'GuruNama'  => $this->input->post('e_nama'),
				'GuruTelp'  => $this->input->post('e_telepon'),
				'GuruAlamat'  => $this->input->post('e_alamat'),
				'GuruBase' => $this->input->post('e_program_sekolah'),
				'GuruNik' => $this->input->post('e_nik'),
				'GuruNPWP' => $this->input->post('e_npwp'),
				'awal_kerja' => $this->input->post('e_awal_kerja'),
				'GuruJeniskelamin'  => $this->input->post('e_jenis_kelamin'),
				'GuruPendidikanAkhir'  => $this->input->post('e_pendidikan_terakhir'),
				'GuruAgama'  => $this->input->post('e_agama'),
				'GuruEmail' => $this->input->post('e_email'),
				'GuruTglLahir'  => $this->input->post('e_tgl_lahir'),
				'GuruTempatLahir'  => $this->input->post('e_tempat_lahir'),
				'GuruStatus'  => $this->input->post('e_status'),
				'updatedAt' => date('Y-m-d H:i:s')
			);
			$action = $this->model_guru->update($data_id, $data, 'tbguru');
			echo json_encode($action);
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}

	public function delete()
	{
		if ($this->session->userdata('username_payroll') != null && $this->session->userdata('nama') != null) {

			$data_id = array(
				'id'  => $this->input->post('id')
			);
			$data = array(
				'isdeleted'  => 1,
			);
			$action = $this->model_guru->update($data_id, $data, 'tbguru');
			echo json_encode($action);
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}
}
