<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datapekerja extends MY_Controller {

    function __construct()
    {
		parent::__construct();
        $this->load->helper('url');
        $this->load->model('pekerja_model');
	}

    public function index()
    {
        $data['title'] = 'Master Data';
        $data['title2'] = 'Data Pekerja';
        $data['pekerja'] = $this->pekerja_model->get_pekerja();
        if($this->session->userdata('role') == 'operator'){
            $this->render_backend('Masters/Pekerja/datapekerja_operator', $data);
        }else{
            $this->render_backend('Masters/Pekerja/datapekerja', $data);
        }
    }

    public function tambahpekerja()
    {
        $data['title'] = 'Master Data';
        $data['title2'] = 'Data Pekerja';
        $data['title3'] = 'Tambah Pekerja';
        $this->render_backend('Masters/Pekerja/datapekerja_tambah', $data);
    }

    function simpanpekerja()
    {
        $nama_pek = $this->input->post('nama_pek');
        $alamat = $this->input->post('alamat');
        $hp_no = $this->input->post('hp_no');
        $keterangan = $this->input->post('keterangan');
		$data = array(
            'nama_pek' => $nama_pek,
            'alamat' => $alamat,
            'hp_no' => $hp_no,
            'keterangan' => $keterangan,
		);
		$this->pekerja_model->add_pekerja($data, 'm_pekerja');
		redirect('datapekerja');
    }

    public function editpekerja($kodex=0)
    {
        if ($this->uri->segment(3)==null) {
            echo "<script>alert('Kamu belum memilih data yang ingin diedit')</script>";
            redirect('datapekerja');
        }
        $m_pekerja = $this->pekerja_model->get_pekerja(" WHERE id_pek='$kodex'")->row_array();
        $data = array(
            'title'=>'Master Data',
            'title2'=>'Data Pekerja',
            'title3'=>'Tambah Pekerja',
            'id_pek'=>$m_pekerja['id_pek'],
            'nama_pek'=>$m_pekerja['nama_pek'],
            'alamat'=>$m_pekerja['alamat'],
            'hp_no'=>$m_pekerja['hp_no'],
            'keterangan'=>$m_pekerja['keterangan'],
        );
        $this->render_backend('Masters/Pekerja/datapekerja_edit',$data);
    }

    public function updatepekerja()
    {
        if (!$_POST['updatepekerja']) {
            redirect('datapekerja');
        }
        $id_pek = $this->input->post('id_pek');
        $nama_pek = $this->input->post('nama_pek');
        $alamat = $this->input->post('alamat');
        $hp_no = $this->input->post('hp_no');
        $keterangan = $this->input->post('keterangan');
        $data = array(
            'nama_pek'=>$nama_pek,
            'alamat'=>$alamat,
            'hp_no'=>$hp_no,
            'keterangan'=>$keterangan
        );
        $result = $this->pekerja_model->edit_pekerja('m_pekerja', $data, array('id_pek'=>$id_pek));
        if ($result == 1) {
            echo "<script>alert('Data berhasil diupdate')</script>";
            redirect('datapekerja');
        }
        else {
            echo "<script>alert('Data gagal diupdate')</script>";
            redirect('datapekerja/editpekerja/');
        }
    }

    public function hapuspekerja($kodex=0)
    {
        if ($this->uri->segment(3)==null) {
            echo "<script>alert('Kamu belum memilih data yang ingin dihapus')</script>";
            redirect('datapekerja');
        }
        $result = $this->pekerja_model->delete_pekerja('m_pekerja', array('id_pek'=>$kodex));
        if ($result == 1) {
            echo "<script>alert('Data berhasil dihapus')</script>";
            redirect('datapekerja');
        }
        else {
            echo "<script>alert('Data gagal dihapus')</script>";
            redirect('datapekerja');
        }
    }
}