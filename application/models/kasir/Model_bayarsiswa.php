<?php

class Model_bayarsiswa extends CI_model
{

    public function getkelas($data)
    {
        return $this->db->query("select TAHUN from mssiswa where NOINDUK = '".$data."'");
    }

    public function view_tagihan($siswa, $kelas, $thnakad ,$thn){
        return $this->db->query("SELECT *,
                                    FORMAT(mq.nom_spp-mq.byr_spp, 0) blmbyr_spp,
                                    FORMAT(mq.nom_gdg-mq.byr_gdg, 0) blmbyr_gdg,
                                    FORMAT(mq.nom_srg-mq.byr_srg, 0) blmbyr_srg,
                                    FORMAT(mq.nom_kgt-mq.byr_kgt, 0) blmbyr_kgt,
                                    FORMAT(mq.nom_spp, 0) nominal_spp,
                                    FORMAT(mq.nom_gdg, 0) nominal_gdg,
                                    FORMAT(mq.nom_srg, 0) nominal_srg,
                                    FORMAT(mq.nom_kgt, 0) nominal_kgt,
                                    FORMAT(TotalTagihan2-(byr_spp+byr_gdg+byr_srg+byr_kgt), 0) blm_bayar
                                FROM
                                (SELECT
                                    (SELECT z.THNAKAD FROM tbakadmk z WHERE z.ID=saldopembayaran_sekolah.TA) AS TAS,
                                    mssiswa.TAHUN,
                                    mssiswa.PS,
                                    mssiswa.NOREG,
                                    mssiswa.NOINDUK,
                                    saldopembayaran_sekolah.Sisa as  Sisa2,
                                    FORMAT(saldopembayaran_sekolah.Sisa, 0) Sisa,
                                    saldopembayaran_sekolah.Kelas,
                                    mssiswa.NMSISWA,
                                    saldopembayaran_sekolah.TotalTagihan TotalTagihan2,
                                    FORMAT(saldopembayaran_sekolah.TotalTagihan, 0) TotalTagihan,
                                    (SELECT 
                                        ROUND(Nominal-(Nominal*saldopembayaran_sekolah.pot_spp/100), 0)
                                        FROM tarif_berlaku
                                        WHERE ThnMasuk = mssiswa.TAHUN
                                        AND kodesekolah = mssiswa.PS
                                        AND Kodejnsbayar='SPP'
                                        AND ThnMasuk='$thn'
                                        AND TA='$thnakad') nom_spp,
                                    (SELECT 
                                        ROUND(Nominal-(Nominal*saldopembayaran_sekolah.pot_gdg/100), 0)
                                        FROM tarif_berlaku
                                        WHERE ThnMasuk = mssiswa.TAHUN
                                        AND kodesekolah = mssiswa.PS
                                        AND Kodejnsbayar='GDG'
                                        AND ThnMasuk='$thn'
                                        AND TA='$thnakad') nom_GDG,
                                    (SELECT
                                        ROUND(Nominal-(Nominal*saldopembayaran_sekolah.pot_srg/100), 0)
                                        FROM tarif_berlaku
                                        WHERE ThnMasuk = mssiswa.TAHUN
                                        AND kodesekolah = mssiswa.PS
                                        AND Kodejnsbayar='SRG'
                                        AND ThnMasuk='$thn'
                                        AND TA='$thnakad') nom_SRG,
                                    (SELECT
                                        ROUND(Nominal-(Nominal*saldopembayaran_sekolah.pot_kgt/100), 0)
                                        FROM tarif_berlaku
                                        WHERE ThnMasuk = mssiswa.TAHUN
                                        AND kodesekolah = mssiswa.PS
                                        AND Kodejnsbayar='KGT'
                                        AND ThnMasuk='$thn'
                                        AND TA='$thnakad') nom_KGT,
                                    (SELECT
                                        SUM((SELECT SUM(z.nominalbayar)
                                            FROM detail_bayar_sekolah z
                                            WHERE z.Nopembayaran=pembayaran_sekolah.Nopembayaran
                                            AND z.kodejnsbayar='SPP'
                                            AND TA='$thnakad'))
                                        FROM
                                            pembayaran_sekolah
                                        WHERE NIS = mssiswa.NOINDUK
                                        AND Kelas = saldopembayaran_sekolah.Kelas
                                        AND TA='$thnakad') byr_spp,
                                    (SELECT
                                        SUM((SELECT SUM(z.nominalbayar)
                                            FROM detail_bayar_sekolah z
                                            WHERE z.Nopembayaran=pembayaran_sekolah.Nopembayaran
                                            AND z.kodejnsbayar='GDG'
                                            AND TA='$thnakad'))
                                        FROM
                                            pembayaran_sekolah
                                        WHERE NIS = mssiswa.NOINDUK
                                        AND Kelas = saldopembayaran_sekolah.Kelas
                                        AND TA='$thnakad') byr_gdg,
                                    (SELECT
                                        SUM((SELECT SUM(z.nominalbayar)
                                            FROM detail_bayar_sekolah z
                                            WHERE z.Nopembayaran=pembayaran_sekolah.Nopembayaran
                                            AND z.kodejnsbayar='SRG'
                                            AND TA='$thnakad'))
                                        FROM
                                            pembayaran_sekolah
                                        WHERE NIS = mssiswa.NOINDUK
                                        AND Kelas = saldopembayaran_sekolah.Kelas
                                        AND TA='$thnakad') byr_srg,
                                    (SELECT
                                        SUM((SELECT SUM(z.nominalbayar)
                                            FROM detail_bayar_sekolah z
                                            WHERE z.Nopembayaran=pembayaran_sekolah.Nopembayaran
                                            AND z.kodejnsbayar='KGT'
                                            AND TA='$thnakad'))
                                        FROM
                                            pembayaran_sekolah
                                        WHERE NIS = mssiswa.NOINDUK
                                        AND Kelas = saldopembayaran_sekolah.Kelas
                                        AND TA='$thnakad') byr_kgt,
                                    (SELECT
                                        idtarif
                                        FROM tarif_berlaku
                                        WHERE ThnMasuk = mssiswa.TAHUN
                                        AND kodesekolah = mssiswa.PS
                                        AND TA ='$thnakad'
                                        AND ThnMasuk='$thn'
                                        AND Kodejnsbayar='SPP') id_spp,
                                    (SELECT
                                        idtarif
                                        FROM tarif_berlaku
                                        WHERE ThnMasuk = mssiswa.TAHUN
                                        AND kodesekolah = mssiswa.PS
                                        AND Kodejnsbayar='GDG'
                                        AND ThnMasuk='$thn'
                                        AND TA='$thnakad') id_gdg,
                                    (SELECT
                                        idtarif
                                        FROM tarif_berlaku
                                        WHERE ThnMasuk = mssiswa.TAHUN
                                        AND kodesekolah = mssiswa.PS
                                        AND Kodejnsbayar='SRG'
                                        AND ThnMasuk='$thn'
                                        AND TA='$thnakad') id_srg,
                                    (SELECT
                                        idtarif
                                        FROM tarif_berlaku
                                        WHERE ThnMasuk = mssiswa.TAHUN
                                        AND kodesekolah = mssiswa.PS
                                        AND Kodejnsbayar='KGT'
                                        AND ThnMasuk='$thn'
                                        AND TA='$thnakad') id_kgt
                                    FROM saldopembayaran_sekolah
                                    INNER JOIN mssiswa ON saldopembayaran_sekolah.NOREG = mssiswa.NOREG
                                    WHERE NIS = '$siswa' AND Kelas='$kelas' and TA = '$thnakad') mq");
    }

    public function pembsis_detail($siswa, $kelas){
        return $this->db->query("SELECT
                                    saldopembayaran_sekolah.idsaldo,
                                    saldopembayaran_sekolah.NIS,
                                    saldopembayaran_sekolah.Noreg,
                                    saldopembayaran_sekolah.idtarif,
                                    saldopembayaran_sekolah.TotalTagihan TotalTagihan,
                                    saldopembayaran_sekolah.Bayar Bayar,
                                    saldopembayaran_sekolah.Sisa Sisa,
                                    saldopembayaran_sekolah.TA,
                                    (SELECT z.nama FROM tbkelas z WHERE z.id_kelas=saldopembayaran_sekolah.Kelas)AS Kelas
                                    FROM saldopembayaran_sekolah
                                    WHERE NIS='$siswa' OR saldopembayaran_sekolah.Noreg='$siswa'
                                    ORDER BY Kelas DESC");
	}
	
	public function getDataDelete($nopembayaran){
        return $this->db->query("SELECT
                                    NIS,
									Kelas,
									TA 
									from pembayaran_sekolah
                                    where Nopembayaran = $nopembayaran");
    }

    public function pemb_sekolah($siswa, $kelas){
        return $this->db->query("SELECT
                                    pembayaran_sekolah.Nopembayaran,Noreg,
                                    pembayaran_sekolah.NIS,
                                    pembayaran_sekolah.Noreg,
                                    (SELECT z.nama FROM tbkelas z WHERE z.id_kelas=pembayaran_sekolah.Kelas)AS Kelas,
                                    DATE_FORMAT(pembayaran_sekolah.tglentri,'%d-%m-%Y')tglentri,
                                    (SELECT COUNT(DISTINCT No_bukti)AS cnt FROM transaksi_buk WHERE transaksi_buk.No_bukti=pembayaran_sekolah.Nopembayaran) pemb_buk,
                                    (SELECT nama from tbpengawas where nip = pembayaran_sekolah.useridd) useridd,
                                    pembayaran_sekolah.TotalBayar,
                                    pembayaran_sekolah.TA
                                    FROM pembayaran_sekolah
                                    WHERE pembayaran_sekolah.NIS='".$siswa."' OR pembayaran_sekolah.Noreg='".$siswa."' AND pembayaran_sekolah.Kelas IS NOT NULL
                                    ORDER BY UNIX_TIMESTAMP(pembayaran_sekolah.tglentri) desc");
    }

    public function pemb_sekolah_q2($siswa, $kelas){
        return $this->db->query("SELECT
                                    pembayaran_sekolah.NIS,Noreg,
                                    (SELECT z.nama FROM tbkelas z WHERE z.id_kelas=pembayaran_sekolah.Kelas)AS Kelas,
                                    DATE_FORMAT(pembayaran_sekolah.tglentri,'%d-%m-%Y')tglentri,
                                    jenispembayaran.namajenisbayar,
                                    detail_bayar_sekolah.nominalbayar as nominalbayar,
                                    tarif_berlaku.Nominal,
                                    (tarif_berlaku.Nominal- detail_bayar_sekolah.nominalbayar)AS sisa,
                                    (SELECT nama from tbpengawas where nip = pembayaran_sekolah.useridd) useridd,
                                    detail_bayar_sekolah.NodetailBayar,
                                    pembayaran_sekolah.TA
                                    FROM
                                    pembayaran_sekolah
                                    INNER JOIN detail_bayar_sekolah ON pembayaran_sekolah.Nopembayaran = detail_bayar_sekolah.Nopembayaran
                                    INNER JOIN tarif_berlaku ON detail_bayar_sekolah.idtarif = tarif_berlaku.idtarif
                                    INNER JOIN jenispembayaran ON detail_bayar_sekolah.kodejnsbayar = jenispembayaran.Kodejnsbayar
                                    WHERE jenispembayaran.Kodejnsbayar NOT IN('SPP') and pembayaran_sekolah.NIS='$siswa'
                                    ORDER BY UNIX_TIMESTAMP(pembayaran_sekolah.tglentri) desc");
    }

    public function view($table)
    {
        $this->db->where('isdeleted !=' ,1);
        return $this->db->get($table);
    }

    public function view_misi($table)
    {
        $this->db->where('jenis =', '2');
        return $this->db->get($table);
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
        return $this->db->query('select IdGuru from ' . $table . ' where IdGuru = ' . $data_id . ' and isdeleted != 1')->num_rows();
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
