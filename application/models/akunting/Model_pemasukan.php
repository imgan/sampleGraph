<?php

class Model_pemasukan extends CI_model
{
    public function view($table)
    {
        $this->db->where('isdeleted !=', 1);
        return $this->db->get($table);
    }

    public function viewOrdering()
    {
        return  $this->db->query('SELECT a.*, b.no_jurnal, b.kode_jurnal, b.nama_jurnal FROM
        jenispembayaran a left join jurnal b on a.no_jurnal = b.no_jurnal 
        
        where a.isdeleted != 1 ');
    }

    public function viewWhereOrdering($table, $data, $order, $ordering)
    {
        $this->db->where($data);
        $this->db->where('isdeleted !=', 1);
        $this->db->order_by($order, $ordering);
        return $this->db->get($table);
    }

    public function view_jurnal()
    {
        return $this->db->query("SELECT no_jurnal, kode_jurnal, nama_jurnal FROM jurnal WHERE JR = '3' ORDER BY nama_jurnal");
    }

    public function view_where($table, $data)
    {
        $this->db->where($data);
        $this->db->where('isdeleted !=', 1);
        return $this->db->get($table);
    }

    // public function view_count($table, $data_id)
    // {
    //     return $this->db->query("select RUANG from " . $table . " where RUANG = '" . $data_id['RUANG'] . "' and isdeleted != 1")->num_rows();
    // }

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