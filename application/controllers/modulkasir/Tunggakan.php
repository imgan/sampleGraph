<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tunggakan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('kasir/model_tunggakan');
		if (empty($this->session->userdata('kodekaryawan')) && empty($this->session->userdata('namakasir'))) {
			$this->session->set_flashdata('category_error', 'Silahkan masukan username dan password');
			redirect('modulkasir/dashboard/login');
		}
	}

	function render_view($data)
	{
		$this->template->load('templatekasir', $data); //Display Page
	}

	public function index()
	{
		if ($this->session->userdata('kodekaryawan') != null && $this->session->userdata('namakasir') != null) {
			$my_siswa = $this->model_tunggakan->view('mssiswa')->result_array();
			$my_tahun = $this->model_tunggakan->gettahun('tbakadmk2')->result_array();
			$myps = $this->model_tunggakan->getsekolah()->result_array();
			$my_kelas = $this->model_tunggakan->view('tbkelas')->result_array();
			$my_tahun2 = $this->model_tunggakan->gettahun2('tbakadmk2')->result_array();
			$data = array(
				'page_content' 	=> '../pagekasir/tunggakan/view',
				'ribbon' 		=> '<li class="active">Tunggakan</li><li>Sample</li>',
				'page_name' 	=> 'Tunggakan',
				'my_tahun'		=> $my_tahun,
				'my_tahun2'		=> $my_tahun2,
				'my_siswa'      => $my_siswa,
				'myps'			=> $myps,
				'my_kelas'		=> $my_kelas
			);
			$this->render_view($data); //Memanggil function render_view
		} else {
		}
	}

	public function tampil()
	{
		if ($this->session->userdata('kodekaryawan') != null && $this->session->userdata('namakasir') != null) {
			$this->load->library('Configfunction');
			$IdTA = $this->configfunction->getidta();
			$IdTA = $IdTA[0]['ID'];
			$my_data = $this->db->query("SELECT
			saldopembayaran_sekolah.idsaldo,NIS,
			saldopembayaran_sekolah.Noreg,
			(SELECT z.NMSISWA FROM mssiswa z WHERE z.NOREG = saldopembayaran_sekolah.Noreg limit 1) AS Namacasis,
			saldopembayaran_sekolah.TotalTagihan,CONCAT('Rp. ',FORMAT(saldopembayaran_sekolah.TotalTagihan,2)) as totaltagihan2,
			saldopembayaran_sekolah.Bayar,CONCAT('Rp. ',FORMAT(saldopembayaran_sekolah.Bayar,2)) as bayar2,
			saldopembayaran_sekolah.Sisa,CONCAT('Rp. ',FORMAT(saldopembayaran_sekolah.Sisa,2)) as sisa2,
			(TA)as tas,
			saldopembayaran_sekolah.TA
			FROM saldopembayaran_sekolah
			Order by Noreg desc")->result_array();
			echo json_encode($my_data);
		} else {
			$this->load->view('pagekasir/login'); //Memanggil function render_view
		}
	}

	public function update()
    {
        $data_id = array(
            'idsaldo'  => $this->input->post('e_id')
        );
        $data = array(
            'TotalTagihan'  => $this->input->post('e_tot_tagihan_v'),
			'Bayar'  => $this->input->post('e_bayar_v'),
			'Sisa'  => $this->input->post('e_sisa_v'),
			'tipe_generate'  => 'N',
            'updatedAt' => date('Y-m-d H:i:s'),
        );
        $action = $this->model_tunggakan->update($data_id, $data, 'saldopembayaran_sekolah');
        echo json_encode($action);
    }

	public function tampil_byid()
    {
        $data = array(
            'idsaldo'  => $this->input->post('id'),
        );
		$my_data = $this->model_tunggakan->view_where('saldopembayaran_sekolah', $data)->result();
        echo json_encode($my_data);
    }

	public function generate()
	{
		if ($this->session->userdata('kodekaryawan') != null && $this->session->userdata('namakasir') != null) {
			$thnmasuk = $this->input->post('thnmasuk');
			$thn = $this->input->post('thnakad');
			$ps = $this->input->post('ps');
			$kelass = $this->input->post('kelas');
			$getsiswa = $this->db->query("select NOINDUK from mssiswa where TAHUN ='$thnmasuk' and ps = '$ps'")->result_array();
			if (count($getsiswa) > 0) {
				foreach ($getsiswa as $value){	
					$this->db->query("delete from saldopembayaran_sekolah where NIS = '$value[NOINDUK]' and TA = '".$thn."' and tipe_generate = 'Y' and ps = '$ps' and Kelas = '$kelass'");
				}
				$calonsiswa = $this->db->query("SELECT NOINDUK,PS, TAHUN, NOREG FROM mssiswa WHERE TAHUN = '$thnmasuk' AND NOT EXISTS (SELECT a.Noreg
											FROM saldopembayaran_sekolah a where
											a.Noreg = mssiswa.NOREG and a.TA ='".$thn."'  and tipe_generate = 'Y' and ps = '$ps' and Kelas = '$kelass'  )AND PS = '$ps' AND PS IS NOT NULL AND TAHUN IS NOT NULL ORDER BY PS,NOREG")->result_array();
				if (count($calonsiswa) > 0) {
					foreach ($calonsiswa as $value) {
						$tarif = $this->db->query("SELECT
													SUM(tb.Nominal)AS total
													FROM tarif_berlaku tb
													JOIN baginaikkelas bn ON bn.NIS = '$value[NOINDUK]'
													WHERE tb.kodesekolah='$value[PS]'
													AND tb.kodesekolah = bn.Kodesekolah
													AND tb.status = 'T' 
													AND tb.TA = bn.TA
													AND tb.ThnMasuk = bn.Thnmasuk
													AND tb.ThnMasuk = '$thnmasuk'
													AND tb.ta = '$thn'
													AND bn.Kelas = '$kelass'
													AND tb.Kodejnsbayar = 'SPP'");
						$n = $tarif->num_rows();
						if ($tarif) {
							$v = $tarif->result_array();
							$vtotal = $v[0]['total'];
							$naikkelas = $this->db->query("SELECT
						baginaikkelas.Kelas,
						baginaikkelas.NIS
						FROM baginaikkelas
						JOIN mssiswa ON baginaikkelas.NIS = mssiswa.NOINDUK
						WHERE baginaikkelas.TA='" . $thn . "'  AND mssiswa.NOREG='" . $value['NOREG'] . "' and Kelas = '$kelass' " );
							if (count($naikkelas->result_array()) > 0) {
								$kelas = $naikkelas->result_array();
								$vkelas = $kelas[0]['Kelas'];
								$vnis = $kelas[0]['NIS'];
								$kdsk = "select KDSK from tbps WHERE kdtbps = '" . $value['PS'] . "'";
								$kdsk = $this->db->query($kdsk)->row();
								$nominal = $this->db->query("select sum(Totalbayar) as bayar from pembayaran_sekolah join detail_bayar_sekolah on pembayaran_sekolah.Nopembayaran = detail_bayar_sekolah.Nopembayaran WHERE NIS = '" . $value['NOINDUK'] . "'
							and TA= '" . $thn . "' AND detail_bayar_sekolah.kodejnsbayar IN('SPP') and kodesekolah = '$ps' and Kelas = '$kelass' ")->row();
								if ($kdsk == NULL) {
									$kdsk = '';
								} else {
									$kdsk = $kdsk->KDSK;
								}
								// print_r(json_encode($kdsk));exit;
								if ($vkelas == '') {
									if ($value['PS'] == '1') {
										$t_kelas = 1;
									} else if ($kdsk = '2') {
										$t_kelas = 1;
									} else if ($kdsk = '3') {
										$t_kelas = 7;
									} else if ($kdsk = '2') {
										$t_kelas = 10;
									} else {
										$t_kelas = 0;
									}
								} else {
									$t_kelas = $vkelas;
								}
								$vsisa = $vtotal - $nominal->bayar;
								//jika ada datanya di delete lalu di insert
								$checkdata = $this->db->query("select count(*) as total from saldopembayaran_sekolah where NIS = '$vnis' and TA = '".$thn."' and tipe_generate = 'Y' and ps = '$ps' and Kelas = '$kelass'")->result_array();
								if (count($checkdata) > 0) {
									$this->db->query("delete from saldopembayaran_sekolah where NIS = '".$vnis."' and TA = '".$thn."' and tipe_generate = 'Y' and ps ='$ps' and Kelas = '$kelass' ");
								}
								$data = array(
									'NIS' => $vnis,
									'Noreg' => $value['NOREG'],
									'TotalTagihan' => $vtotal,
									'TA' => $thn,
									'Bayar' => $nominal->bayar,
									'ps' => $ps,
									'Sisa' => $vsisa,
									'tipe_generate' => 'Y',
									'Kelas' => $t_kelas,
									'createdAt' => date('Y-m-d H:i:s')
								);
								$insert = $this->model_tunggakan->insert($data, 'saldopembayaran_sekolah');
							}
						}
					}
				}
				echo json_encode(true);
			} else {
				echo json_encode(false);
			}
		} else {
			$this->load->view('pagekasir/login'); //Memanggil function render_view
		}
	}

	public function generate2()
	{
		if ($this->session->userdata('kodekaryawan') != null && $this->session->userdata('namakasir') != null) {
			$thnmasuk = $this->input->post('thnmasuk');
			$thn = $this->input->post('thnakad');
			$getsiswa = $this->db->query("select Nopembayaran from detail_bayar_sekolah where kodejnsbayar NOT IN ('FRM','SPP','KMT','CTR')")->result_array();
			if (count($getsiswa) > 0) {
				foreach ($getsiswa as $value){	
					$this->db->query("delete from detail_bayar_sekolah where Nopembayaran = '$value[Nopembayaran]'");
					$this->db->query("delete from pembayaran_sekolah where Nopembayaran = '$value[Nopembayaran]'");
				}
				echo json_encode(true);
			} else {
				echo json_encode(false);
			}
		} else {
			$this->load->view('pagekasir/login'); //Memanggil function render_view
		}
	}
}
