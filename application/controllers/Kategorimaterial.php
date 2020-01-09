<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategorimaterial extends MY_Controller {

    function __construct()
    {
		parent::__construct();
        $this->load->helper('url');
        $this->load->model('kategorimaterial_model');
	}

    public function index()
    {
        $data['title'] = 'Master Data';
        $data['title2'] = 'Kategori Material';
        $data['katmet'] = $this->kategorimaterial_model->get_katmet();
        if($this->session->userdata('role') == 'operator'){
            $this->render_backend('Masters/Kategorimaterial/kategorimaterial_operator', $data);
        }else{
            $this->render_backend('Masters/Kategorimaterial/kategorimaterial', $data);
        }
    }

    public function tambahkategori()
    {
        $data['title'] = 'Master Data';
        $data['title2'] = 'Kategori Material';
        $data['title3'] = 'Tambah Kategori';
        $this->render_backend('Masters/Kategorimaterial/kategorimaterial_tambah', $data);
    }

    public function simpankategori()
    {
        $kategori_mat = $this->input->post('kategori_mat');
        $keterangan = $this->input->post('keterangan');
		$data = array(
            'kategori_mat' => $kategori_mat,
            'keterangan' => $keterangan
		);
		$this->kategorimaterial_model->add_katmet($data, 'm_kategori_material');
		redirect('kategorimaterial');
    }

    public function editkategori($kodex=0)
    {
        if ($this->uri->segment(3)==null) {
            echo "<script>alert('Kamu belum memilih data yang ingin diedit')</script>";
            redirect('kategorimaterial');
        }
        $m_kategori_material = $this->kategorimaterial_model->get_katmet(" WHERE id_katmet = '$kodex'")->row_array();
        $data = array(
            'title'=>'Master Data',
            'title2'=>'Kategori Material',
            'title3'=>'Edit Kategori',
            'id_katmet'=>$m_kategori_material['id_katmet'],
            'kategori_mat'=>$m_kategori_material['kategori_mat'],
            'keterangan'=>$m_kategori_material['keterangan'],
        );
        $this->render_backend('Masters/Kategorimaterial/kategorimaterial_edit',$data);
    }

    public function updatekategori()
    {
        if (!$_POST['updatekategori']) {
            redirect('kategorimaterial');
        }
        $id_katmet = $this->input->post('id_katmet');
        $kategori_mat = $this->input->post('kategori_mat');
        $keterangan = $this->input->post('keterangan');
        $data = array(
            'kategori_mat'=>$kategori_mat,
            'keterangan'=>$keterangan
        );
        $result = $this->kategorimaterial_model->edit_katmet('m_kategori_material', $data, array('id_katmet'=>$id_katmet));
        if ($result == 1) {
            echo "<script>alert('Data berhasil diupdate')</script>";
            redirect('kategorimaterial');
        }
        else {
            echo "<script>alert('Data gagal diupdate')</script>";
            redirect('kategorimaterial/editkategori/');
        }
    }

    public function hapuskategori($kodex=0)
    {
        if ($this->uri->segment(3)==null) {
            echo "<script>alert('Kamu belum memilih data yang ingin dihapus')</script>";
            redirect('kategorimaterial');
        }
        $result = $this->kategorimaterial_model->delete_katmet('m_kategori_material', array('id_katmet'=>$kodex));
        if ($result == 1) {
            echo "<script>alert('Data berhasil dihapus')</script>";
            redirect('kategorimaterial');
        }
        else {
            echo "<script>alert('Data gagal dihapus')</script>";
            redirect('kategorimaterial');
        }
    }
}