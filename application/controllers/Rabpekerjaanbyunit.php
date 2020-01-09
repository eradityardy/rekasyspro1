<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rabpekerjaanbyunit extends MY_Controller {

    function __construct()
    {
		parent::__construct();
        $this->load->helper('url');
        $this->load->model('rabpekerjaanbyunit_model');
	}
    
    public function index()
    {
        $data['title'] = 'Master Data';
        $data['title2'] = 'RAB Pekerjaan By Unit';
        $data['rabpekerjaanbyunit'] = $this->rabpekerjaanbyunit_model->joinTableRabpekerjaanbyunit();
        $this->render_backend('Masters/Rabpekerjaanbyunit/rabpekerjaanbyunit', $data);
    }

    public function lihatrabpekerjaanbyunit($kodex=0)
    {
        if ($this->uri->segment(3)==null) {
            $this->index();
        }
        $x['data'] = $this->rabpekerjaanbyunit_model->show_pekerjaan_by_unit_id($kodex);
        $x['type_id'] = $kodex;
        $x['title'] = 'Master Data';
        $x['title2'] = 'RAB Pekerjaan Unit Rumah';
        $x['title3'] = 'Informasi Data';
        $x['data_unit'] = $this->rabpekerjaanbyunit_model->getDataunit();
        $x['data_pekerjaan'] = $this->rabpekerjaanbyunit_model->getDatapekerjaan();
        $this->render_backend('Masters/Rabpekerjaanbyunit/rabpekerjaanbyunit_lihat',$x);
    }

    public function simpanrabpekerjaanbyunit()
    {
        $unit_id = $this->input->post('unit_id');
        $pekerjaan_id = $this->input->post('pekerjaan_id');
        $price = $this->input->post('price');
        $data = array(
            'unit_id'=>$unit_id,
            'pekerjaan_id'=>$pekerjaan_id,
            'price'=>$price,
        );
        $cek = $this->db->query("SELECT * FROM m_rab_pekerjaan_byunit where unit_id='".$this->input->post('unit_id')."' AND pekerjaan_id='".$this->input->post('pekerjaan_id')."'")->num_rows();
        if ($cek<=0) {
            $result = $this->rabpekerjaanbyunit_model->add_rabpekerjaanbyunit($data, 'm_rab_pekerjaan_byunit');
            if ($result == 1) {
                redirect('rabpekerjaanbyunit/lihatrabpekerjaanbyunit/'.$unit_id,'refresh');
            }
            else {
                redirect('rabpekerjaanbyunit/lihatrabpekerjaanbyunit/'.$unit_id,'refresh');
            }
        }
        else {
            echo "<script>alert('Data Pekerjaan sudah ada')</script>";
			redirect('rabpekerjaanbyunit/lihatrabpekerjaanbyunit/'.$unit_id,'refresh');
        }
    }

    public function hapusrabpekerjaanbyunit($kodex=0)
    {
        if ($this->uri->segment(3)==null) {
            echo "<script>alert('Kamu belum memilih data yang ingin dihapus')</script>";
            redirect('rabpekerjaanbyunit');
        }
        $result = $this->rabpekerjaanbyunit_model->delete_rabpekerjaanbyunit('m_rab_pekerjaan_byunit', array('id'=>$kodex));
        if ($result == 1) {
            echo "<script>alert('Data berhasil dihapus')</script>";
            redirect('rabpekerjaanbyunit');
        }
        else {
            echo "<script>alert('Data gagal dihapus')</script>";
            redirect('rabpekerjaanbyunit');
        }
    }
} ?>