<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datatyperumah extends MY_Controller
{
    function __construct()
    {
		parent::__construct();
        $this->load->helper('url');
        $this->load->model('typerumah_model');
	}
    
    public function index()
    {
        $data['title'] = 'Master Data';
        $data['title2'] = 'Data Type Rumah';
        $data['typerumah'] = $this->typerumah_model->get_typerumah();
        if($this->session->userdata('role') == 'operator'){
            $this->render_backend('Masters/Typerumah/datatyperumah_operator', $data);
        }else{
            $this->render_backend('Masters/Typerumah/datatyperumah', $data);
        }
    }

    public function tambahtyperumah()
    {
        $data['title'] = 'Master Data';
        $data['title2'] = 'Data Type Rumah';
        $data['title3'] = 'Tambah Type Rumah';
        $this->render_backend('Masters/Typerumah/datatyperumah_tambah', $data);
    }

    function simpantyperumah()
    {
        $nama_type = $this->input->post('nama_type');
        $luas_tanah = $this->input->post('luas_tanah');
        $luas_bangunan = $this->input->post('luas_bangunan');
		$keterangan = $this->input->post('keterangan');
		$data = array(
            'nama_type' => $nama_type,
            'luas_tanah' => $luas_tanah,
            'luas_bangunan' => $luas_bangunan,
            'keterangan' => $keterangan,
		);
		$this->typerumah_model->add_typerumah($data, 'm_typerumah');
		redirect('datatyperumah');
    }

    public function edittyperumah($kodex=0)
    {
        if ($this->uri->segment(3)==null) {
            echo "<script>alert('Kamu belum memilih data yang ingin diedit')</script>";
            redirect('datatyperumah');
        }
        $m_typerumah = $this->typerumah_model->get_typerumah(" WHERE id_type='$kodex'")->row_array();
        $data = array(
            'title'=>'Master Data',
            'title2'=>'Data Type Rumah',
            'title3'=>'Edit Type Rumah',
            'id_type'=>$m_typerumah['id_type'],
            'nama_type'=>$m_typerumah['nama_type'],
            'luas_tanah'=>$m_typerumah['luas_tanah'],
            'luas_bangunan'=>$m_typerumah['luas_bangunan'],
            'keterangan'=>$m_typerumah['keterangan']
        );
        $this->render_backend('Masters/Typerumah/datatyperumah_edit',$data);
    }

    public function updatetyperumah()
    {
        if (!$_POST['updatetyperumah']) {
            redirect('datatyperumah');
        }
        $id_type = $this->input->post('id_type');
        $nama_type = $this->input->post('nama_type');
        $luas_tanah = $this->input->post('luas_tanah');
        $luas_bangunan = $this->input->post('luas_bangunan');
        $keterangan = $this->input->post('keterangan');
        $data = array(
            'nama_type'=>$nama_type,
            'luas_tanah'=>$luas_tanah,
            'luas_bangunan'=>$luas_bangunan,
            'keterangan'=>$keterangan
        );
        $result = $this->typerumah_model->edit_typerumah('m_typerumah', $data, array('id_type'=>$id_type));
        if ($result == 1) {
            echo "<script>alert('Data berhasil diupdate')</script>";
            redirect('datatyperumah');
        }
        else {
            echo "<script>alert('Data gagal diupdate')</script>";
            redirect('datatyperumah/edittyperumah/');
        }
    }

    public function hapustyperumah($kodex=0)
    {
        if ($this->uri->segment(3)==null) {
            echo "<script>alert('Kamu belum memilih data yang ingin dihapus')</script>";
            redirect('datatyperumah');
        }
        $result = $this->typerumah_model->delete_typerumah('m_typerumah', array('id_type'=>$kodex));
        if ($result == 1) {
            echo "<script>alert('Data berhasil dihapus')</script>";
            redirect('datatyperumah');
        }
        else {
            echo "<script>alert('Data gagal dihapus')</script>";
            redirect('datatyperumah');
        }
    }
} ?>