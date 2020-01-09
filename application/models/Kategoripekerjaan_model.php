<?php
class Kategoripekerjaan_model extends CI_Model
{
    function get_katpek($where = '')
    {
        return $this->db->query("SELECT * FROM m_kategori_pekerjaan".$where);
    }

    function add_katpek($data, $table)
    {
		$this->db->insert($table, $data);
    }
    
    function delete_katpek($tabel, $where)
    {
        $this->db->delete($tabel, $where);
    }

    function edit_katpek($tabel, $data, $where)
    {
        $this->db->update($tabel, $data, $where);
    }
} ?>