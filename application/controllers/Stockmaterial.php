<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stockmaterial extends MY_Controller {

    function __construct()
    {
		parent::__construct();
        $this->load->helper('url');
        $this->load->library('pdf');
        $this->load->model('stockmaterial_model');
	}
    
    public function index()
    {
        $data['title'] = 'Transaksi';
        $data['title2'] = 'Stock Material';
        $data['stockmaterial'] = $this->stockmaterial_model->joinTableStockmaterial();
        $this->render_backend('Transaksi/Stockmaterial/stockmaterial', $data);
    }

    public function tambahstock()
    {
        $data['title'] = 'Transaksi';
        $data['title2'] = 'Stock Material';
        $data['title3'] = 'Tambah Stock';
        $data['data_gud'] = $this->stockmaterial_model->getDatagudang();
        $data['data_mat'] = $this->stockmaterial_model->getDatamaterial();
        $data['data_sup'] = $this->stockmaterial_model->getDatasupplier();
        $this->render_backend('Transaksi/Stockmaterial/stockmaterial_tambah', $data);
    }

    public function simpanstock()
    {
        $gudang_id = $this->input->post('gudang_id');
        $supplier_id = $this->input->post('supplier_id');
        $material_id = $this->input->post('material_id');
        $qty_stock = $this->input->post('qty_stock');
        $keterangan = $this->input->post('keterangan');
		$data = array(
            'gudang_id' => $gudang_id,
            'supplier_id' => $supplier_id,
            'material_id' => $material_id,
            'qty_stock' => $qty_stock,
            'keterangan' => $keterangan,
		);
        $cek = $this->db->query("SELECT * FROM t_stock_material WHERE gudang_id='".$this->input->post('gudang_id')."' AND supplier_id='".$this->input->post('supplier_id')."' AND material_id='".$this->input->post('material_id')."'")->num_rows();
        if ($cek<=0) {
            $result = $this->stockmaterial_model->simpan('t_stock_material',$data);
            if ($result == 1) {
                echo "<script>alert('Data berhasil disimpan')</script>";
                redirect('stockmaterial');
            }
            else {
                echo "<script>alert('Data gagal disimpan')</script>";
                redirect('stockmaterial/tambahstock');
            }
        }
        else {
            echo "<script>alert('Data Material sudah ada')</script>";
			$this->tambahstock();
        }
    }

    public function hapusstock($kodex=0)
    {
        if ($this->uri->segment(3)==null) {
            echo "<script>alert('Kamu belum memilih data yang ingin dihapus')</script>";
            redirect('stockmaterial');
        }
        $result = $this->stockmaterial_model->hapus('t_stock_material', array('id_stomat'=>$kodex));
        if ($result == 1) {
            echo "<script>alert('Data berhasil dihapus')</script>";
            redirect('stockmaterial');
        }
        else {
            echo "<script>alert('Data gagal dihapus')</script>";
            redirect('stockmaterial');
        }
    }
}