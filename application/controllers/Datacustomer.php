<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datacustomer extends MY_Controller {

    function __construct()
    {
		parent::__construct();
        $this->load->helper('url');
        $this->load->model('customer_model');
	}

    public function index()
    {
        $data['title'] = 'Master Data';
        $data['title2'] = 'Data Customer';
        $data['customer'] = $this->customer_model->get_customer();
        if($this->session->userdata('role') == 'operator'){
            $this->render_backend('Masters/Customer/datacustomer_operator', $data);
        }else{
            $this->render_backend('Masters/Customer/datacustomer', $data);
        }
    }

    public function tambahcustomer()
    {
        $data['title'] = 'Master Data';
        $data['title2'] = 'Data Customer';
        $data['title3'] = 'Tambah Customer';
        $this->render_backend('Masters/Customer/datacustomer_tambah', $data);
    }

    function simpancustomer()
    {
        $nama_cus = $this->input->post('nama_cus');
        $alamat = $this->input->post('alamat');
        $id_card = $this->input->post('id_card');
        $hp_no = $this->input->post('hp_no');
        $keterangan = $this->input->post('keterangan');
		$data = array(
            'nama_cus' => $nama_cus,
            'alamat' => $alamat,
            'id_card' => $id_card,
            'hp_no' => $hp_no,
            'keterangan' => $keterangan,
		);
		$this->customer_model->add_customer($data, 'm_customer');
		redirect('datacustomer');
    }

    public function editcustomer($kodex=0)
    {
        if ($this->uri->segment(3)==null) {
            echo "<script>alert('Kamu belum memilih data yang ingin diedit')</script>";
            $this->index();
        }
        $m_customer = $this->customer_model->get_customer(" WHERE id_cus='$kodex'")->row_array();
        $data = array(
            'title'=>'Master Data',
            'title2'=>'Data Customer',
            'title3'=>'Edit Customer',
            'id_cus'=>$m_customer['id_cus'],
            'nama_cus'=>$m_customer['nama_cus'],
            'alamat'=>$m_customer['alamat'],
            'id_card'=>$m_customer['id_card'],
            'hp_no'=>$m_customer['hp_no'],
            'keterangan'=>$m_customer['keterangan'],
        );
        $this->render_backend('Masters/Customer/datacustomer_edit',$data);
    }

    public function updatecustomer()
    {
        if (!$_POST['updatecustomer']) {
            redirect('datacustomer');
        }
        $id_cus = $this->input->post('id_cus');
        $nama_cus = $this->input->post('nama_cus');
        $alamat = $this->input->post('alamat');
        $id_card = $this->input->post('id_card');
        $hp_no = $this->input->post('hp_no');
        $keterangan = $this->input->post('keterangan');
        $data = array(
            'nama_cus'=>$nama_cus,
            'alamat'=>$alamat,
            'id_card'=>$id_card,
            'hp_no'=>$hp_no,
            'keterangan'=>$keterangan
        );
        $result = $this->customer_model->edit_customer('m_customer', $data, array('id_cus'=>$id_cus));
        if ($result == 1) {
            echo "<script>alert('Data berhasil diupdate')</script>";
            redirect('datacustomer');
        }
        else {
            echo "<script>alert('Data gagal diupdate')</script>";
            redirect('datacustomer');
        }
    }

    public function hapuscustomer($kodex=0)
    {
        if ($this->uri->segment(3)==null) {
            echo "<script>alert('Kamu belum memilih data yang ingin dihapus')</script>";
            redirect('datacustomer');
        }
        $result = $this->customer_model->delete_customer('m_customer', array('id_cus'=>$kodex));
        if ($result == 1) {
            echo "<script>alert('Data berhasil dihapus')</script>";
            redirect('datacustomer');
        }
        else {
            echo "<script>alert('Data gagal dihapus')</script>";
            redirect('datacustomer');
        }
    }
}