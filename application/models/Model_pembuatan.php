<?php

class Model_pembuatan extends CI_model
{

    public function proses($jurusan, $tahun)
    {
        return  $this->db->query("SELECT*
		FROM calon_siswa
		WHERE kodesekolah='$jurusan' AND thnmasuk='$tahun' AND Noreg NOT IN(SELECT Noreg FROM mssiswa where PS = '$jurusan') AND is_tdklulus = 0
		Order by  Namacasis ASC ");
    }
    public function getnis($thn, $kode)
    {
        return $this->db->query("SELECT RIGHT(NOINDUK,3)AS ni FROM mssiswa WHERE TAHUN=$thn AND PS=$kode
        Order by NOINDUK DESC LIMIT 1");	
    }
    public function generate($thn, $kode)
    {
        return $this->db->query("SELECT * FROM mssiswa WHERE TAHUN=$thn AND PS=$kode AND NOINDUK is null
		Order by NOREG ASC");
	}

	public function gettahun()
    {
        return $this->db->query("SELECT distinct(TAHUN) as TAHUN FROM tbakadmk2
		Order by TAHUN DESC");
	}
	
    public function getdata()
    {
        return $this->db->query("SELECT a.Noreg,a.thnmasuk,b.Nopembayaran,a.Namacasis, 
        DATE_FORMAT(b.tglentri,'%d-%m-%Y')tglbayar,b.useridd,b.TotalBayar,CONCAT('Rp. ',FORMAT(b.TotalBayar,2)) as totalbayar2,
        c.DESCRTBPS, d.DESCRTBJS from pembayaran_sekolah b 
        join calon_siswa a on b.Noreg = a.Noreg
        join detail_bayar_sekolah e on b.Nopembayaran = e.Nopembayaran
        join tbps c on b.kodesekolah = c.KDTBPS
        join tbjs d on c.KDTBJS = d.KDTBJS WHERE b.Noreg NOT IN(SELECT Noreg FROM mssiswa) and e.kodejnsbayar = 'FRM' Order by b.Nopembayaran desc
        ");
    }

    public function getjurusan()
    {
        return $this->db->query("
        SELECT tbps.KDTBPS,	tbps.DESCRTBPS, tbjs.DESCRTBJS FROM	tbps INNER JOIN tbjs ON tbps.KDTBJS = tbjs.KDTBJS ORDER BY id DESC");
    }
    public function viewOrdering($table, $order, $ordering)
    {
        $this->db->where('isdeleted !=', 1);
        $this->db->order_by($order, $ordering);
        return $this->db->get($table);
    }

    public function viewWhereOrdering($table, $data, $order, $ordering)
    {
        $this->db->where($data);
        $this->db->where('isdeleted !=', 1);
        $this->db->order_by($order, $ordering);
        return $this->db->get($table);
    }

    public function view_where($table, $data)
    {
        $this->db->where($data);
        $this->db->where('isdeleted !=', 1);
        return $this->db->get($table);
    }

    public function view_count($table, $data_id)
    {
        return $this->db->query("select NOINDUK from " . $table . " where NOINDUK = '" . $data_id['NOINDUK'] . "' and isdeleted != 1")->num_rows();
    }

    public function insert($data, $table)
    {
        $result = $this->db->insert($table, $data);
        return $result;
    }

    function update($where, $data, $table)
    {
        $this->db->where($where);
        return $this->db->update($table, $data);
    }

    function delete($where, $table)
    {
        $this->db->where($where);
        return $this->db->delete($table);
    }

    function truncate($table)
    {
        $this->db->truncate($table);
    }
}
