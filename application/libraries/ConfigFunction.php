<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Configfunction
{
    function __construct()
    {
        $this->CI =& get_instance();
    }

    function picture($id, $w = 100, $h = 100)
    {
        $url = "//graph.facebook.com/$id/picture?width=$w&height=$h";
        return $url;
    }
    
    function jump($page)
    {
        echo "<script>location=('$page');</script>";
    }
    function info($string, $type = null)
    {
        if ($type == 'OK') {
            $class = "success";
            $icon = "fa-check";
        } elseif ($type == 'NO') {
            $class = "danger";
            $icon = "fa-warning";
        } else {
            $class = "warning";
            $icon = "fa-info-circle";
        }
        return "<p class='text-$class'><i class='fa $icon'></i> $string</p>";
    }
    function timeAgo($tanggal)
    {
        $ayeuna = date('Y-m-d H:i:s');
        $detik = strtotime($ayeuna) - strtotime($tanggal);
        if ($detik <= 0) {
            return "Baru saja";
        } else {
            if ($detik < 60) {
                return $detik . " detik yang lalu";
            } else {
                $menit = $detik / 60;
                if ($menit < 60) {
                    return number_format($menit, 0) . " menit yang lalu";
                } else {
                    $jam = $menit / 60;
                    if ($jam < 24) {
                        return number_format($jam, 0) . " jam yang lalu";
                    } else {
                        $hari = $jam / 24;
                        if ($hari < 2) {
                            return "Kemarin";
                        } elseif ($hari < 3) {
                            return number_format($hari, 0) . " hari yang lalu";
                        } else {
                            return $tanggal;
                        }
                    }
                }
            }
        }
    }
    function size($bytes = 0)
    {
        $size = $bytes;
        $b = "B";
        if ($size > 1024) {
            $size = number_format($bytes / 1024, 2, '.', '');
            $b = "KB";
            if ($size > 1024) {
                $size = number_format($bytes / 1024 / 1024, 2, '.', '');
                $b = "MB";
                if ($size > 1024) {
                    $size = number_format($bytes / 1024 / 1024 / 1024, 2, '.', '');
                    $b = "GB";
                    if ($size > 1024) {
                        $size = number_format($bytes / 1024 / 1024 / 1024 / 1024, 2, '.', '');
                        $b = "TB";
                    }
                }
            }
        }
        $size = str_replace('.00', '', $size);
        return $size . ' ' . $b;
    }
    function buat_tanggal($format, $time = null)
    {
        $time = ($time == null) ? time() : strtotime($time);
        $str = date($format, $time);
        for ($t = 1; $t <= 9; $t++) {
            $str = str_replace("0$t ", "$t ", $str);
        }
        $str = str_replace("Jan", "Januari", $str);
        $str = str_replace("Feb", "Februari", $str);
        $str = str_replace("Mar", "Maret", $str);
        $str = str_replace("Apr", "April", $str);
        $str = str_replace("May", "Mei", $str);
        $str = str_replace("Jun", "Juni", $str);
        $str = str_replace("Jul", "Juli", $str);
        $str = str_replace("Aug", "Agustus", $str);
        $str = str_replace("Sep", "September", $str);
        $str = str_replace("Oct", "Oktober", $str);
        $str = str_replace("Nov", "Nopember", $str);
        $str = str_replace("Dec", "Desember", $str);
        $str = str_replace("Mon", "Senin", $str);
        $str = str_replace("Tue", "Selasa", $str);
        $str = str_replace("Wed", "Rabu", $str);
        $str = str_replace("Thu", "Kamis", $str);
        $str = str_replace("Fri", "Jum&#39;at", $str);
        $str = str_replace("Sat", "Sabtu", $str);
        $str = str_replace("Sun", "Minggu", $str);
        return $str;
    }
    function enum($bool)
    {
        $bool = ($bool == 1) ? 'Ya' : 'Tidak';
        return $bool;
    }
    function html2str($str)
    {
        $str = str_replace('"', "”", $str);
        $str = str_replace("'", "’", $str);
        $str = str_replace("<", "&lt;", $str);
        $str = str_replace(">", "&gt;", $str);
        return $str;
    }

    function fdebug($v_string)
    {
        $v_ret = '<div class="example-wrap">
					<h4 class="example-title">Setting Theme</h4>
					<div class="example">
					  <pre class="ace-editor" id="exampleTheme" data-plugin="ace" data-mode="html" data-theme="twilight"
					  style="width: 100%;">
					 ' . $v_string . '
					</pre>
					</div>
				  </div>';

        return $v_ret;
    }

    public function getthnakdkeuangan()
    {
        $result = $this->CI->db->query('SELECT THNAKAD, ID,SEMESTER,TAHUN, INDEK FROM tbakadmk WHERE INDEK=(SELECT MAX(INDEK) FROM tbakadmk)')->result_array();
        return $result;
    }

    public function getthnakd()
    {
        $result = $this->CI->db->query('SELECT THNAKAD, ID,SEMESTER,TAHUN, INDEK FROM tbakadmk2 WHERE INDEK=(SELECT MAX(INDEK) FROM tbakadmk2)')->result_array();
        return $result;
    }

    public function getthnpsb()
    {
        $result = $this->CI->db->query('SELECT distinct(THNAKAD) FROM tbakadmk3 WHERE INDEK=(SELECT MAX(INDEK) FROM tbakadmk3)')->result_array();
        return $result;
    }

    public function getidthnakd()
    {
        $result = $this->CI->db->query('SELECT ID FROM tbakadmk2 WHERE INDEK=(SELECT MAX(INDEK) FROM tbakadmk2)')->result_array();
        return $result;
    }

    public function getthnakd2()
    {
        $result = $this->CI->db->query('SELECT THNAKAD FROM tbakadmk2 WHERE INDEK=(SELECT MAX(INDEK) FROM tbakadmk2)')->result_array();
        return $result;
        
    }

    public function getidta()
    {
        $result = $this->CI->db->query('SELECT * FROM tbakadmk WHERE INDEK=(SELECT MAX(INDEK) FROM tbakadmk)')->result_array();
        return $result;
    }

    public function get_sysconfig()
    {
        $result = $this->CI->db->query('SELECT address, UPPER(name_school) name_school, no_telp FROM sys_config WHERE 1')->row();
        return $result;
    }

    public function insertlog($username, $nip,$date,$ip)
    {
        $result = $this->CI->db->query("INSERT INTO user_log
        VALUES ('','$nip','$username','login','$ip','$date')");
        return $result;
    }

    function getbulan($bln)
    {
        switch ($bln) {
            case 1:
                return "Januari";
                break;
            case 2:
                return "Februari";
                break;
            case 3:
                return "Maret";
                break;
            case 4:
                return "April";
                break;
            case 5:
                return "Mei";
                break;
            case 6:
                return "Juni";
                break;
            case 7:
                return "Juli";
                break;
            case 8:
                return "Agustus";
                break;
            case 9:
                return "September";
                break;
            case 10:
                return "Oktober";
                break;
            case 11:
                return "November";
                break;
            case 12:
                return "Desember";
                break;
        }
    }

    function gethari($tgl)
    {
        if (date("D", strtotime($tgl)) == 'Sun') {
            return "Minggu";
        }
        if (date("D", strtotime($tgl)) == 'Mon') {
            return "Senin";
        }
        if (date("D", strtotime($tgl)) == 'Tue') {
            return "Selasa";
        }
        if (date("D", strtotime($tgl)) == 'Wed') {
            return "Rabu";
        }
        if (date("D", strtotime($tgl)) == 'Thu') {
            return "Kamis";
        }
        if (date("D", strtotime($tgl)) == 'Fri') {
            return "Jumat";
        }
        if (date("D", strtotime($tgl)) == 'Sat') {
            return "Sabtu";
        }
    }
}
