<?php
class Pekerjaan_model extends CI_Model
{
    function get_pekerjaan($where = '')
    {
        return $this->db->query("SELECT * FROM m_pekerjaan".$where);
    }

    function add_pekerjaan($data, $table)
    {
		$this->db->insert($table, $data);
    }
    
    function delete_pekerjaan($tabel, $where)
    {
        $this->db->delete($tabel, $where);
    }

    function edit_pekerjaan($tabel, $data, $where)
    {
        $this->db->update($tabel, $data, $where);
    }

    public function getdatakatpek()
    {
		$query = $this->db->query("SELECT * FROM m_kategori_pekerjaan");
        return $query->result();
    }

    public function jointablepekerjaan()
    {
        $this->db->select('*');
        $this->db->from('vw_pekerjaan');
        return $query=$this->db->get();
    }
} ?>