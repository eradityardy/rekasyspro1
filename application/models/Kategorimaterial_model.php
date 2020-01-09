<?php
class Kategorimaterial_model extends CI_Model
{
    function get_katmet($where = '')
    {
        return $this->db->query("SELECT * FROM m_kategori_material".$where);
    }

    function add_katmet($data, $table)
    {
		$this->db->insert($table, $data);
    }
    
    function delete_katmet($tabel, $where)
    {
        $this->db->delete($tabel, $where);
    }

    function edit_katmet($tabel, $data, $where)
    {
        $this->db->update($tabel, $data, $where);
    }
} ?>