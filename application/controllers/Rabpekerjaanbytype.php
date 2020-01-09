<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rabpekerjaanbytype extends MY_Controller {

    function __construct()
    {
		parent::__construct();
        $this->load->helper('url');
        $this->load->model('rabpekerjaanbytype_model');
	}
    
    public function index()
    {
        $data['title'] = 'Master Data';
        $data['title2'] = 'RAB Pekerjaan By Type';
        $data['rabpekerjaanbytype'] = $this->rabpekerjaanbytype_model->joinTableRabpekerjaanbytype();
        $this->render_backend('Masters/Rabpekerjaanbytype/rabpekerjaanbytype', $data);
    }

    public function lihatrabpekerjaanbytype($kodex=0)
    {
        if ($this->uri->segment(3)==null) {
            $this->index();
        }
        $x['data'] = $this->rabpekerjaanbytype_model->show_pekerjaan_by_type_id($kodex);
        $x['type_id'] = $kodex;
        $x['title'] = 'Master Data';
        $x['title2'] = 'RAB Pekerjaan Type Rumah';
        $x['title3'] = 'Informasi Data';
        $x['data_type'] = $this->rabpekerjaanbytype_model->getDatatype();
        $x['data_pekerjaan'] = $this->rabpekerjaanbytype_model->getDatapekerjaan();
        $this->render_backend('Masters/Rabpekerjaanbytype/rabpekerjaanbytype_lihat',$x);
    }

    public function simpanrabpekerjaanbytype()
    {
        $type_id = $this->input->post('type_id');
        $pekerjaan_id = $this->input->post('pekerjaan_id');
        $price = $this->input->post('price');
        $data = array(
            'type_id'=>$type_id,
            'pekerjaan_id'=>$pekerjaan_id,
            'price'=>$price,
        );
        $cek = $this->db->query("SELECT * FROM m_rab_pekerjaan_bytype where type_id='".$this->input->post('type_id')."' AND pekerjaan_id='".$this->input->post('pekerjaan_id')."'")->num_rows();
        if ($cek<=0) {
            $result = $this->rabpekerjaanbytype_model->add_rabpekerjaanbytype($data, 'm_rab_pekerjaan_bytype');
            if ($result == 1) {
                redirect('rabpekerjaanbytype/lihatrabpekerjaanbytype/'.$type_id,'refresh');
            }
            else {
                redirect('rabpekerjaanbytype/lihatrabpekerjaanbytype/'.$type_id,'refresh');
            }
        }
        else {
            echo "<script>alert('Data Pekerjaan sudah ada')</script>";
			redirect('rabpekerjaanbytype/lihatrabpekerjaanbytype/'.$type_id,'refresh');
        }
    }

    public function hapusrabpekerjaanbytype($kodex=0)
    {
        if ($this->uri->segment(3)==null) {
            echo "<script>alert('Kamu belum memilih data yang ingin dihapus')</script>";
            redirect('rabpekerjaanbytype');
        }
        $result = $this->rabpekerjaanbytype_model->delete_rabpekerjaanbytype('m_rab_pekerjaan_bytype', array('id_rpbt'=>$kodex));
        if ($result == 1) {
            echo "<script>alert('Data berhasil dihapus')</script>";
            redirect('rabpekerjaanbytype');
        }
        else {
            echo "<script>alert('Data gagal dihapus')</script>";
            redirect('rabpekerjaanbytype');
        }
    }
} ?>