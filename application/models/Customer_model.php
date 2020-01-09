<?php
class Customer_model extends CI_Model
{
    function get_customer($where = '')
    {
        return $this->db->query("SELECT * FROM m_customer".$where);
    }

    function add_customer($data, $table)
    {
		$this->db->insert($table, $data);
    }
    
    function delete_customer($tabel, $where)
    {
        $this->db->delete($tabel, $where);
    }

    function edit_customer($tabel, $data, $where)
    {
        $this->db->update($tabel, $data, $where);
    }
} ?>