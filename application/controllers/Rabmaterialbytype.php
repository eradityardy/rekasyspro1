<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rabmaterialbytype extends MY_Controller {

    function __construct()
    {
		parent::__construct();
        $this->load->helper('url');
        $this->load->model('rabmaterialbytype_model');
	}
    
    public function index()
    {
        $data['title'] = 'Master Data';
        $data['title2'] = 'RAB Material By Type';
        $data['rabmaterialbytype'] = $this->rabmaterialbytype_model->joinTableRabmaterialbytype();
        $this->render_backend('Masters/Rabmaterialbytype/rabmaterialbytype', $data);
    }

    public function lihatrabmaterialbytype($kodex=0)
    {
        if ($this->uri->segment(3)==null) {
            $this->index();
        }
        $x['data'] = $this->rabmaterialbytype_model->show_material_by_type_id($kodex);
        $x['type_id'] = $kodex;
        $x['title'] = 'Master Data';
        $x['title2'] = 'RAB Material Type Rumah';
        $x['title3'] = 'Informasi Data';
        $x['data_type'] = $this->rabmaterialbytype_model->getDatatype();
        $x['data_material'] = $this->rabmaterialbytype_model->getDatamaterial();
        $this->render_backend('Masters/Rabmaterialbytype/rabmaterialbytype_lihat',$x);
    }

    public function simpanrabmaterialbytype()
    {
        $type_id = $this->input->post('type_id');
        $material_id = $this->input->post('material_id');
        $qty = $this->input->post('qty');
        $price = $this->input->post('price');
        $data = array(
            'type_id'=>$type_id,
            'material_id'=>$material_id,
            'price'=>$price,
            'qty'=>$qty,
        );
        $cek = $this->db->query("SELECT * FROM m_rab_material_bytype where type_id='".$this->input->post('type_id')."' AND material_id='".$this->input->post('material_id')."'")->num_rows();
        if ($cek<=0) {
            $result = $this->rabmaterialbytype_model->add_rabmaterialbytype($data, 'm_rab_material_bytype');
            if ($result == 1) {
                redirect('rabmaterialbytype/lihatrabmaterialbytype/'.$type_id,'refresh');
            }
            else {
                redirect('rabmaterialbytype/lihatrabmaterialbytype/'.$type_id,'refresh');
            }
        }
        else {
            echo "<script>alert('Data Material sudah ada')</script>";
			redirect('rabmaterialbytype/lihatrabmaterialbytype/'.$type_id,'refresh');
        }
    }

    public function hapusrabmaterialbytype($kodex=0)
    {
        if ($this->uri->segment(3)==null) {
            echo "<script>alert('Kamu belum memilih data yang ingin dihapus')</script>";
            redirect('rabmaterialbytype');
        }
        $result = $this->rabmaterialbytype_model->delete_rabmaterialbytype('m_rab_material_bytype', array('id_rmbt'=>$kodex));
        if ($result == 1) {
            echo "<script>alert('Data berhasil dihapus')</script>";
            redirect('rabmaterialbytype');
        }
        else {
            echo "<script>alert('Data gagal dihapus')</script>";
            redirect('rabmaterialbytype');
        }
    }
} ?>