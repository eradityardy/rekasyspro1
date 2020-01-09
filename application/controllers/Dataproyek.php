<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dataproyek extends MY_Controller {

    function __construct()
    {
		parent::__construct();
        $this->load->helper('url');
        $this->load->model('proyek_model');
	}
    
    public function index()
    {
        $data['title'] = 'Master Data';
        $data['title2'] = 'Data Proyek';
        $data['proyek'] = $this->proyek_model->get_proyek();
        if($this->session->userdata('role') == 'operator'){
            $this->render_backend('Masters/Proyek/dataproyek_operator', $data);
        }else{
            $this->render_backend('Masters/Proyek/dataproyek', $data);
        }
    }

    public function tambahproyek()
    {
        $data['title'] = 'Master Data';
        $data['title2'] = 'Data Proyek';
        $data['title3'] = 'Tambah Proyek';
        $this->render_backend('Masters/Proyek/dataproyek_tambah', $data);
    }

    function simpanproyek()
    {
        $kode = $this->input->post('kode');
        $nama_pro = $this->input->post('nama_pro');
        $lokasi = $this->input->post('lokasi');
        $owner= $this->input->post('owner');
        $anggaran = $this->input->post('anggaran');
        $tgl_mulai = $this->input->post('tgl_mulai');
        $tgl_selesai = $this->input->post('tgl_selesai');
		$status = $this->input->post('status');
		$data = array(
            'kode' => $kode,
            'nama_pro' => $nama_pro,
            'lokasi' => $lokasi,
            'owner' => $owner,
            'anggaran' => $anggaran,
            'tgl_mulai' => $tgl_mulai,
            'tgl_selesai' => $tgl_selesai,
            'status' => $status,
		);
		$this->proyek_model->add_proyek($data, 'm_proyek');
		redirect('dataproyek');
    }
    
    function editproyek($kodex=0)
    {
        if ($this->uri->segment(3)==null) {
            echo "<script>alert('Kamu belum memilih data yang ingin diedit')</script>";
            redirect('dataproyek');
        }
        $m_proyek = $this->proyek_model->get_proyek(" WHERE id_pro='$kodex'")->row_array();
        $data = array(
            'title'=>'Master Data',
            'title2'=>'Data Proyek',
            'title3'=>'Edit Proyek',
            'id_pro'=>$m_proyek['id_pro'],
            'kode'=>$m_proyek['kode'],
            'nama_pro'=>$m_proyek['nama_pro'],
            'lokasi'=>$m_proyek['lokasi'],
            'owner'=>$m_proyek['owner'],
            'anggaran'=>$m_proyek['anggaran'],
            'tgl_mulai'=>$m_proyek['tgl_mulai'],
            'tgl_selesai'=>$m_proyek['tgl_selesai'],
            'status'=>$m_proyek['status'],
        );
        $this->render_backend('Masters/Proyek/dataproyek_edit',$data);
    }

    public function updateproyek()
    {
        if (!$_POST['updateproyek']) {
            redirect('dataproyek');
        }
        $id_pro = $this->input->post('id_pro');
        $kode=$this->input->post('kode');
        $nama_pro = $this->input->post('nama_pro');
        $lokasi = $this->input->post('lokasi');
        $owner = $this->input->post('owner');
        $anggaran = $this->input->post('anggaran');
        $tgl_mulai = $this->input->post('tgl_mulai');
        $tgl_selesai = $this->input->post('tgl_selesai');
        $status = $this->input->post('status');
        $data = array(
            'kode'=>$kode,
            'nama_pro'=>$nama_pro,
            'lokasi'=>$lokasi,
            'owner'=>$owner,
            'anggaran'=>$anggaran,
            'tgl_mulai'=>$tgl_mulai,
            'tgl_selesai'=>$tgl_selesai,
            'status'=>$status
        );
        $result = $this->proyek_model->edit_proyek('m_proyek', $data, array('id_pro'=>$id_pro));
        if ($result == 1) {
            echo "<script>alert('Data berhasil diupdate')</script>";
            redirect('dataproyek');
        }
        else {
            echo "<script>alert('Data gagal diupdate')</script>";
            redirect('dataproyek/editproyek/');
        }
    }

    public function hapusproyek($kodex=0)
    {
        if ($this->uri->segment(3)==null) {
            echo "<script>alert('Kamu belum memilih data yang ingin dihapus')</script>";
            redirect('dataproyek');
        }
        $result = $this->proyek_model->delete_proyek('m_proyek', array('id_pro'=>$kodex));
        if ($result == 1) {
            echo "<script>alert('Data berhasil dihapus')</script>";
            redirect('dataproyek');
        }
        else {
            echo "<script>alert('Data gagal dihapus')</script>";
            redirect('dataproyek');
        }
    }
}
?>