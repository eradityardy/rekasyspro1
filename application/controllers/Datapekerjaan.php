<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datapekerjaan extends MY_Controller {

    function __construct()
    {
		parent::__construct();
        $this->load->helper('url');
        $this->load->model('pekerjaan_model');
	}

    public function index()
    {
        $data['title'] = 'Master Data';
        $data['title2'] = 'Data Pekerjaan';
        $data['pekerjaan'] = $this->pekerjaan_model->jointablepekerjaan();
        if($this->session->userdata('role') == 'operator'){
            $this->render_backend('Masters/Pekerjaan/datapekerjaan_operator', $data);
        }else{
            $this->render_backend('Masters/Pekerjaan/datapekerjaan', $data);
        }
    }

    public function tambahpekerjaan()
    {
        $data['title'] = 'Master Data';
        $data['title2'] = 'Data Pekerjaan';
        $data['title3'] = 'Tambah Pekerjaan';
        $data['data_katpek'] = $this->pekerjaan_model->getdatakatpek();
        $this->render_backend('Masters/Pekerjaan/datapekerjaan_tambah', $data);
    }

    function simpanpekerjaan()
    {
        $kategori_id = $this->input->post('kategori_id');
        $pekerjaan = $this->input->post('pekerjaan');
        $satuan = $this->input->post('satuan');
        $std_harga = $this->input->post('std_harga');
        $keterangan = $this->input->post('keterangan');
		$data = array(
            'kategori_id' => $kategori_id,
            'pekerjaan' => $pekerjaan,
            'satuan' => $satuan,
            'std_harga' => $std_harga,
            'keterangan' => $keterangan,
		);
		$this->pekerjaan_model->add_pekerjaan($data, 'm_pekerjaan');
		redirect('datapekerjaan');
    }

    function editpekerjaan($kodex=0)
    {
        if ($this->uri->segment(3)==null) {
            echo "<script>alert('Kamu belum memilih data yang ingin diedit')</script>";
            redirect('datapekerjaan');
        }
        $m_pekerjaan = $this->pekerjaan_model->get_pekerjaan(" WHERE id='$kodex'")->row_array();
        $data = array(
            'title'=>'Master Data',
            'title2'=>'Data Pekerjaan',
            'title3'=>'Edit Pekerjaan',
            'id'=>$m_pekerjaan['id'],
            'kategori_id'=>$m_pekerjaan['kategori_id'],
            'pekerjaan'=>$m_pekerjaan['pekerjaan'],
            'satuan'=>$m_pekerjaan['satuan'],
            'std_harga'=>$m_pekerjaan['std_harga'],
            'keterangan'=>$m_pekerjaan['keterangan'],
            'data_katpek'=>$this->pekerjaan_model->getdatakatpek(),
        );
        $this->render_backend('Masters/Pekerjaan/datapekerjaan_edit',$data);
    }

    function updatepekerjaan()
    {
        if (!$_POST['updatepekerjaan']) {
            redirect('datapekerjaan');
        }
        $id = $this->input->post('id');
        $kategori_id = $this->input->post('kategori_id');
        $pekerjaan = $this->input->post('pekerjaan');
        $satuan = $this->input->post('satuan');
        $std_harga = $this->input->post('std_harga');
        $keterangan = $this->input->post('keterangan');
        $data = array(
            'kategori_id'=>$kategori_id,
            'pekerjaan'=>$pekerjaan,
            'satuan'=>$satuan,
            'std_harga'=>$std_harga,
            'keterangan'=>$keterangan
        );
        $result = $this->pekerjaan_model->edit_pekerjaan('m_pekerjaan', $data, array('id'=>$id));
        if ($result == 1) {
            echo "<script>alert('Data berhasil diupdate')</script>";
            redirect('datapekerjaan');
        }
        else {
            echo "<script>alert('Data gagal diupdate')</script>";
            redirect('datapekerjaan/editpekerjaan/');
        }
    }

    public function hapuspekerjaan($kodex=0)
    {
        if ($this->uri->segment(3)==null) {
            echo "<script>alert('Kamu belum memilih data yang ingin dihapus')</script>";
            redirect('datapekerjaan');
        }
        $result = $this->pekerjaan_model->delete_pekerjaan('m_pekerjaan', array('id'=>$kodex));
        if ($result == 1) {
            echo "<script>alert('Data berhasil dihapus')</script>";
            redirect('datapekerjaan');
        }
        else {
            echo "<script>alert('Data gagal dihapus')</script>";
            redirect('datapekerjaan');
        }
    }
} ?>