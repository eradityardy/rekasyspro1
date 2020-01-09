<?php
class Stockmaterial_model extends CI_Model
{
    public function simpan($tabel, $data)
    {
        $result = $this->db->insert($tabel, $data);
        if ($result == 1){
            return $this->db->insert_id();
        }else{
            return $result;
        }
    }

    public function hapus($tabel, $where)
    {
        return $this->db->delete($tabel, $where);
    }

    public function update($tabel, $data, $where)
    {
        return $this->db->update($tabel, $data, $where);
    }

    public function joinTableStockmaterial()
    {
        $this->db->order_by('nama_gud', 'ASC');
        $this->db->select('*');
        $this->db->from('vw_stock_material');
        return $query=$this->db->get();
    }

    public function getDatasupplier()
    {
		$query = $this->db->query("SELECT * FROM m_supplier");
        return $query->result();
    }

    public function getDatagudang()
    {
		$query = $this->db->query("SELECT * FROM m_gudang");
        return $query->result();
    }

    public function getDatamaterial()
    {
		$query = $this->db->query("SELECT * FROM m_material");
        return $query->result();
    }

    public function getStockId($gudangId = 0, $materialId = 0)
    {
		$query = $this->db->query("SELECT id_stomat FROM t_stock_material Where gudang_id = $gudangId And material_id = $materialId");
        if ($query->num_rows() > 0)
        {
            $row = $query->row(); 
            return $row->id_stomat;
        }else{
            return 0;
        }
    }
} ?>