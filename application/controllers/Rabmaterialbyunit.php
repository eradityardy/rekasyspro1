<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rabmaterialbyunit extends MY_Controller {

    function __construct()
    {
		parent::__construct();
        $this->load->helper('url');
        $this->load->model('rabmaterialbyunit_model');
	}
    
    public function index()
    {
        $data['title'] = 'Master Data';
        $data['title2'] = 'RAB Material By Unit';
        $data['rabmaterialbyunit'] = $this->rabmaterialbyunit_model->joinTableRabmaterialbyunit();
        $this->render_backend('Masters/Rabmaterialbyunit/rabmaterialbyunit', $data);
    }

    public function lihatrabmaterialbyunit($kodex=0)
    {
        if ($this->uri->segment(3)==null) {
            $this->index();
        }
        $x['data'] = $this->rabmaterialbyunit_model->show_material_by_unit_id($kodex);
        $x['unit_id'] = $kodex;
        $x['title'] = 'Master Data';
        $x['title2'] = 'RAB Material By Unit Rumah';
        $x['title3'] = 'Informasi Data';
        $x['data_unit'] = $this->rabmaterialbyunit_model->getDataunit();
        $x['data_material'] = $this->rabmaterialbyunit_model->getDatamaterial();
        $this->render_backend('Masters/Rabmaterialbyunit/rabmaterialbyunit_lihat',$x);
    }

    public function simpanrabmaterialbyunit()
    {
        $unit_id = $this->input->post('unit_id');
        $material_id = $this->input->post('material_id');
        $qty = $this->input->post('qty');
        $price = $this->input->post('price');
        $data = array(
            'unit_id'=>$unit_id,
            'material_id'=>$material_id,
            'price'=>$price,
            'qty'=>$qty,
        );
        $cek = $this->db->query("SELECT * FROM m_rab_material_byunit where unit_id='".$this->input->post('unit_id')."' AND material_id='".$this->input->post('material_id')."'")->num_rows();
        if ($cek<=0) {
            $result = $this->rabmaterialbyunit_model->add_rabmaterialbyunit($data, 'm_rab_material_byunit');
            if ($result == 1) {
                redirect('rabmaterialbyunit/lihatrabmaterialbyunit/'.$unit_id,'refresh');
            }
            else {
                redirect('rabmaterialbyunit/lihatrabmaterialbyunit/'.$unit_id,'refresh');
            }
        }
        else {
            echo "<script>alert('Data Material sudah ada')</script>";
			redirect('rabmaterialbyunit/lihatrabmaterialbyunit/'.$unit_id,'refresh');
        }
        
    }

    public function hapusrabmaterialbyunit($kodex=0)
    {
        if ($this->uri->segment(3)==null) {
            echo "<script>alert('Kamu belum memilih data yang ingin dihapus')</script>";
            redirect('rabmaterialbyunit');
        }
        $result = $this->rabmaterialbyunit_model->delete_rabmaterialbyunit('m_rab_material_byunit', array('id_rmbu'=>$kodex));
        if ($result == 1) {
            echo "<script>alert('Data berhasil dihapus')</script>";
            redirect('rabmaterialbyunit');
        }
        else {
            echo "<script>alert('Data gagal dihapus')</script>";
            redirect('rabmaterialbyunit');
        }
    }
} ?>