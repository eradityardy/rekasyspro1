<?php
class Pemakaianmaterial_model extends CI_Model
{
    function add_pemakaianmaterial($data, $table)
    {
		$this->db->insert($table, $data);
    }
    
    function delete_pemakaianmaterial($tabel, $where)
    {
        $this->db->delete($tabel, $where);
    }

    function edit_pemakaianmaterial($tabel, $data, $where)
    {
        $this->db->update($tabel, $data, $where);
    }

    function get_pemakaianmaterial($where = '')
    {
        return $this->db->query("SELECT * FROM t_pakai_material".$where);
    }

    public function joinTablePemakaianmaterial()
    {
        $this->db->select('*');
        $this->db->from('vw_t_pake_material');
        return $query=$this->db->get();
    }

    public function getDataunit()
    {
		$query = $this->db->query("SELECT * FROM vw_tambah_pake");
        return $query->result();
    }

    public function getDatastock()
    {
		$query = $this->db->query("SELECT * FROM vw_stock_material");
        return $query->result();
    }
} ?>