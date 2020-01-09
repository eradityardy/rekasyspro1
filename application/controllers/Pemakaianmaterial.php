<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemakaianmaterial extends MY_Controller {

    function __construct()
    {
		parent::__construct();
        $this->load->helper('url');
        $this->load->library('pdf');
        $this->load->library('form_validation');
        $this->load->model('pemakaianmaterial_model');
	}
    
    public function index()
    {
        $data['title'] = 'Transaksi';
        $data['title2'] = 'Pemakaian Material';
        $data['pemakaianmaterial'] = $this->pemakaianmaterial_model->joinTablePemakaianmaterial();
        $this->render_backend('Transaksi/Pemakaianmaterial/pemakaianmaterial', $data);
    }

    public function tambahpemakaian()
    {
        $data['title'] = 'Transaksi';
        $data['title2'] = 'Pemakaian Material';
        $data['title3'] = 'Tambah Pemakaian';
        $data['data_unit'] = $this->pemakaianmaterial_model->getDataunit();
        $data['data_stock'] = $this->pemakaianmaterial_model->getDatastock();
        $this->render_backend('Transaksi/Pemakaianmaterial/pemakaianmaterial_tambah', $data);
    }

    public function simpanpemakaian()
    {
        $tgl_pake = $this->input->post('tgl_pake');
        $rmbu_id = $this->input->post('rmbu_id');
        $unit_id = $this->input->post('unit_id');
        $material_id = $this->input->post('material_id');
        $stock_id = $this->input->post('stock_id');
        $qty = $this->input->post('qty');
        $price = $this->input->post('price');
		$data = array(
            'tgl_pake' => $tgl_pake,
            'rmbu_id' => $rmbu_id,
            'unit_id' => $unit_id,
            'material_id' => $material_id,
            'stock_id' => $stock_id,
            'qty' => $qty,
            'price' => $price,
		);
		$this->pemakaianmaterial_model->add_pemakaianmaterial($data, 't_pakai_material');
		redirect('pemakaianmaterial');
    }

    public function editpemakaian($kodex=0)
    {
        if ($this->uri->segment(3)==null) {
            echo "<script>alert('Kamu belum memilih data yang ingin diedit')</script>";
            redirect('pemakaianmaterial');
        }
        $t_pakai_material = $this->pemakaianmaterial_model->get_pemakaianmaterial(" WHERE id_pake='$kodex'")->row_array();
        $data = array(
            'title'=>'Transaksi',
            'title2'=>'Pemakaian Material',
            'title3'=>'Edit Pemakaian',
            'id_pake'=>$t_pakai_material['id_pake'],
            'tgl_pake'=>$t_pakai_material['tgl_pake'],
            'rmbu_id'=>$t_pakai_material['rmbu_id'],
            'unit_id'=>$t_pakai_material['unit_id'],
            'material_id'=>$t_pakai_material['material_id'],
            'stock_id'=>$t_pakai_material['stock_id'],
            'qty'=>$t_pakai_material['qty'],
            'price'=>$t_pakai_material['price'],
            'data_unit'=>$this->pemakaianmaterial_model->getDataunit(),
            'data_stock'=>$this->pemakaianmaterial_model->getDatastock(),
        );
        $this->render_backend('Transaksi/Pemakaianmaterial/pemakaianmaterial_edit',$data);
    }

    public function updatepemakaian()
    {
        if (!$_POST['updatepemakaian']) {
            redirect('pemakaianmaterial');
        }
        $id_pake = $this->input->post('id_pake');
        $tgl_pake = $this->input->post('tgl_pake');
        $rmbu_id = $this->input->post('rmbu_id');
        $unit_id = $this->input->post('unit_id');
        $material_id = $this->input->post('material_id');
        $stock_id = $this->input->post('stock_id');
        $qty = $this->input->post('qty');
        $price = $this->input->post('price');
        $data = array(
            'tgl_pake'=>$tgl_pake,
            'rmbu_id'=>$rmbu_id,
            'unit_id'=>$unit_id,
            'material_id'=>$material_id,
            'stock_id'=>$stock_id,
            'qty'=>$qty,
            'price'=>$price,
        );
        $result = $this->pemakaianmaterial_model->edit_pemakaianmaterial('t_pakai_material', $data, array('id_pake'=>$id_pake));
        if ($result == 1) {
            echo "<script>alert('Data berhasil diupdate')</script>";
            redirect('pemakaianmaterial');
        }
        else {
            echo "<script>alert('Data gagal diupdate')</script>";
            redirect('pemakaianmaterial/editpemakaian/');
        }
    }

    public function hapuspemakaian($kodex=0)
    {
        if ($this->uri->segment(3)==null) {
            echo "<script>alert('Kamu belum memilih data yang ingin dihapus')</script>";
            redirect('pemakaianmaterial');
        }
        $result = $this->pemakaianmaterial_model->delete_pemakaianmaterial('t_pakai_material', array('id_pake'=>$kodex));
        if ($result == 1) {
            echo "<script>alert('Data berhasil dihapus')</script>";
            redirect('pemakaianmaterial');
        }
        else {
            echo "<script>alert('Data gagal dihapus')</script>";
            redirect('pemakaianmaterial');
        }
    }
}