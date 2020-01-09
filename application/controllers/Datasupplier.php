<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datasupplier extends MY_Controller {

    function __construct()
    {
		parent::__construct();
        $this->load->helper('url');
        $this->load->model('supplier_model');
	}
    
    public function index()
    {
        $data['title'] = 'Master Data';
        $data['title2'] = 'Data Supplier';
        $data['supplier'] = $this->supplier_model->get_supplier();
        if($this->session->userdata('role') == 'operator'){
            $this->render_backend('Masters/Supplier/datasupplier_operator', $data);
        }else{
            $this->render_backend('Masters/Supplier/datasupplier', $data);
        }
    }

    public function tambahsupplier()
    {
        $data['title'] = 'Master Data';
        $data['title2'] = 'Data Supplier';
        $data['title3'] = 'Tambah Supplier';
        $this->render_backend('Masters/Supplier/datasupplier_tambah', $data);
    }

    function simpansupplier()
    {
        $nama = $this->input->post('nama');
        $hp_no = $this->input->post('hp_no');
        $alamat = $this->input->post('alamat');
		$keterangan = $this->input->post('keterangan');
		$data = array(
            'nama' => $nama,
            'hp_no' => $hp_no,
            'alamat' => $alamat,
            'keterangan' => $keterangan,
		);
		$this->supplier_model->add_supplier($data, 'm_supplier');
		redirect('datasupplier');
    }

    public function editsupplier($kodex=0)
    {
        if ($this->uri->segment(3)==null) {
            echo "<script>alert('Kamu belum memilih data yang ingin diedit')</script>";
            redirect('datasupplier');
        }
        $m_supplier = $this->supplier_model->get_supplier(" WHERE id = '$kodex'")->row_array();
        $data = array(
            'title'=>'Master Data',
            'title2'=>'Data Supplier',
            'title3'=>'Edit Supplier',
            'id'=>$m_supplier['id'],
            'nama'=>$m_supplier['nama'],
            'alamat'=>$m_supplier['alamat'],
            'hp_no'=>$m_supplier['hp_no'],
            'keterangan'=>$m_supplier['keterangan'],
        );
        $this->render_backend('Masters/Supplier/datasupplier_edit',$data);
    }

    public function updatesupplier()
    {
        if (!$_POST['updatesupplier']) {
            redirect('datasupplier');
        }
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $hp_no = $this->input->post('hp_no');
        $keterangan = $this->input->post('keterangan');
        $data = array(
            'nama'=>$nama,
            'alamat'=>$alamat,
            'hp_no'=>$hp_no,
            'keterangan'=>$keterangan
        );
        $result = $this->supplier_model->edit_supplier('m_supplier', $data, array('id'=>$id));
        if ($result == 1) {
            echo "<script>alert('Data berhasil diupdate')</script>";
            redirect('datasupplier');
        }
        else {
            echo "<script>alert('Data gagal diupdate')</script>";
            redirect('datasupplier/editsupplier/');
        }
    }

    public function hapussupplier($kodex=0)
    {
        if ($this->uri->segment(3)==null) {
            echo "<script>alert('Kamu belum memilih data yang ingin dihapus')</script>";
            redirect('datasupplier');
        }
        $result = $this->supplier_model->delete_supplier('m_supplier', array('id'=>$kodex));
        if ($result == 1) {
            echo "<script>alert('Data berhasil dihapus')</script>";
            redirect('datasupplier');
        }
        else {
            echo "<script>alert('Data gagal dihapus')</script>";
            redirect('datasupplier');
        }
    }
} ?>