<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datakaryawan extends MY_Controller {

    function __construct()
    {
		parent::__construct();
        $this->load->helper('url');
        $this->load->model('karyawan_model');
	}

    public function index()
    {
        $data['title'] = 'Master Data';
        $data['title2'] = 'Data Karyawan';
        $data['karyawan'] = $this->karyawan_model->jointablekarbag();
        if($this->session->userdata('role') == 'operator'){
            $this->render_backend('Masters/Karyawan/datakaryawan_operator', $data);
        }else{
            $this->render_backend('Masters/Karyawan/datakaryawan', $data);
        }
    }

    public function tambahkaryawan()
    {
        $data['title'] = 'Master Data';
        $data['title2'] = 'Data Karyawan';
        $data['title3'] = 'Tambah Karyawan';
        $data['data_bag'] = $this->karyawan_model->getdatabag();
        $this->render_backend('Masters/Karyawan/datakaryawan_tambah', $data);
    }

    function simpankaryawan()
    {
        $nama_kar = $this->input->post('nama_kar');
        $bagian_id = $this->input->post('bagian_id');
        $alamat = $this->input->post('alamat');
        $hp_no = $this->input->post('hp_no');
        $keterangan = $this->input->post('keterangan');
		$data = array(
            'nama_kar' => $nama_kar,
            'bagian_id' => $bagian_id,
            'alamat' => $alamat,
            'hp_no' => $hp_no,
            'keterangan' => $keterangan,
		);
		$this->karyawan_model->add_karyawan($data, 'm_karyawan');
		redirect('datakaryawan');
    }

    public function editkaryawan($kodex=0)
    {
        if ($this->uri->segment(3)==null) {
            echo "<script>alert('Kamu belum memilih data yang ingin diedit')</script>";
            redirect('datakaryawan');
        }
        $m_karyawan = $this->karyawan_model->get_karyawan(" WHERE id_kar = '$kodex'")->row_array();
        $data = array(
            'title'=>'Master Data',
            'title2'=>'Data Karyawan',
            'title3'=>'Edit Karyawan',
            'id_kar'=>$m_karyawan['id_kar'],
            'nama_kar'=>$m_karyawan['nama_kar'],
            'bagian_id'=>$m_karyawan['bagian_id'],
            'alamat'=>$m_karyawan['alamat'],
            'hp_no'=>$m_karyawan['hp_no'],
            'keterangan'=>$m_karyawan['keterangan'],
            'data_bag'=>$this->karyawan_model->getdatabag(),
        );
        $this->render_backend('Masters/Karyawan/datakaryawan_edit',$data);
    }

    public function updatekaryawan()
    {
        if (!$_POST['updatekaryawan']) {
            redirect('datakaryawan');
        }
        $id_kar = $this->input->post('id_kar');
        $nama_kar = $this->input->post('nama_kar');
        $bagian_id = $this->input->post('bagian_id');
        $alamat = $this->input->post('alamat');
        $hp_no = $this->input->post('hp_no');
        $keterangan = $this->input->post('keterangan');
        $data = array(
            'nama_kar'=>$nama_kar,
            'alamat'=>$alamat,
            'bagian_id'=>$bagian_id,
            'hp_no'=>$hp_no,
            'keterangan'=>$keterangan
        );
        $result = $this->karyawan_model->edit_karyawan('m_karyawan', $data, array('id_kar'=>$id_kar));
        if ($result == 1) {
            echo "<script>alert('Data berhasil diupdate')</script>";
            redirect('datakaryawan');
        }
        else {
            echo "<script>alert('Data gagal diupdate')</script>";
            redirect('datakaryawan/editkaryawan/');
        }
    }

    public function hapuskaryawan($kodex=0)
    {
        if ($this->uri->segment(3)==null) {
            echo "<script>alert('Kamu belum memilih data yang ingin dihapus')</script>";
            redirect('datakaryawan');
        }
        $result = $this->karyawan_model->delete_karyawan('m_karyawan', array('id_kar'=>$kodex));
        if ($result == 1) {
            echo "<script>alert('Data berhasil dihapus')</script>";
            redirect('datakaryawan');
        }
        else {
            echo "<script>alert('Data gagal dihapus')</script>";
            redirect('datakaryawan');
        }
    }
}