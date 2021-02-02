<?php

class Model_honorguru extends CI_model
{
    public function view($table)
    {
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

    public function view_count($field, $table, $data_id)
    {
        return $this->db->query("select ".$field." from " . $table . " where ".$field." = '". $data_id . "' and isdeleted != 1")->num_rows();
    }

    public function view_honor($bulan, $tahun, $unit)
    {
        if(!empty($unit)){
            return $this->db->query("SELECT a.*, b.GuruNama, a.JMLJAM+a.TAMBAHANJAM as totaljam
                                FROM htguru a
                                JOIN tbguru b ON a.IdGuru = b.IdGuru
                                JOIN tbps ps ON ps.KDSK = b.GuruBase
                                AND MONTH(a.PERIODE) = $bulan
                                AND YEAR(a.PERIODE) = $tahun
                                WHERE ps.id = $unit");
        }else{
            return $this->db->query("SELECT a.*, b.GuruNama, a.JMLJAM+a.TAMBAHANJAM as totaljam
                                FROM htguru a
                                JOIN tbguru b ON a.IdGuru = b.IdGuru
                                JOIN tbps ps ON ps.KDSK = b.GuruBase
                                AND MONTH(a.PERIODE) = $bulan
                                AND YEAR(a.PERIODE) = $tahun");
        }
        
    }

    public function view_unit()
    {
        return $this->db->query("SELECT ps.KDSK id, ps.DESCRTBPS
        FROM tbguru tg
        JOIN tbps ps ON ps.KDSK = tg.GuruBase
        JOIN tbjs js ON ps.KDTBJS = js.KDTBJS
        GROUP BY ps.KDSK, ps.DESCRTBPS
        ORDER BY ps.KDSK");
    }

    public function view_unit2()
    {
        return $this->db->query("SELECT ps.KDUNIT id, ps.DESCRTBPS
        FROM tbguru tg
        JOIN tbps ps ON ps.KDSK = tg.GuruBase
        JOIN tbjs js ON ps.KDTBJS = js.KDTBJS
        GROUP BY ps.KDUNIT
        ORDER BY ps.KDSK");
    }
}
