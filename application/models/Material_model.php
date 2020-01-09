<?php
class Material_model extends CI_Model
{
    function get_material($where = '')
    {
        return $this->db->query("SELECT * FROM m_material".$where);
    }

    function add_material($data, $table)
    {
		$this->db->insert($table, $data);
    }
    
    function delete_material($tabel, $where)
    {
        $this->db->delete($tabel, $where);
    }

    function edit_material($tabel, $data, $where)
    {
        $this->db->update($tabel, $data, $where);
    }

    public function getdatakategori()
    {
		$query = $this->db->query("SELECT * FROM m_kategori_material");
        return $query->result();
    }

    function jointablematerial()
    {
        $this->db->select('*');
        $this->db->from('vw_material_supplier');
        return $query=$this->db->get();
    }
} ?>