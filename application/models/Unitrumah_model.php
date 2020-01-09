<?php
class Unitrumah_model extends CI_Model
{
    function get_unitrumah($where = '')
    {
        return $this->db->query("SELECT * FROM m_unitrumah".$where);
    }

    function add_unitrumah($data, $table)
    {
		$this->db->insert($table, $data);
    }
    
    function delete_unitrumah($tabel, $where)
    {
        $this->db->delete($tabel, $where);
    }

    function edit_unitrumah($tabel, $data, $where)
    {
        $this->db->update($tabel, $data, $where);
    }

    public function joinTableUnRum()
    {
        $this->db->select('*');
        $this->db->from('vw_unitrumah');
        return $query=$this->db->get();
    }

    public function getdatatype()
    {
		$query = $this->db->query("SELECT * FROM m_typerumah");
        return $query->result();
    }

    public function getdatapro()
    {
		$query = $this->db->query("SELECT * FROM m_proyek");
        return $query->result();
    }

    public function getdatacus()
    {
		$query = $this->db->query("SELECT * FROM m_customer");
        return $query->result();
    }

    public function getdatapek()
    {
		$query = $this->db->query("SELECT * FROM m_pekerja");
        return $query->result();
    }
} ?>