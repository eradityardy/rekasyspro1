<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dataunitrumah extends MY_Controller {

    function __construct()
    {
		parent::__construct();
        $this->load->helper('url');
        $this->load->model('unitrumah_model');
	}
    
    public function index()
    {
        $data['title'] = 'Master Data';
        $data['title2'] = 'Data Unit Rumah';
        $data['unitrumah'] = $this->unitrumah_model->joinTableUnRum();
        if($this->session->userdata('role') == 'operator'){
            $this->render_backend('Masters/Unitrumah/dataunitrumah_operator', $data);
        }else{
            $this->render_backend('Masters/Unitrumah/dataunitrumah', $data);
        }
    }

    public function tambahunitrumah()
    {
        $data['title'] = 'Master Data';
        $data['title2'] = 'Data Unit Rumah';
        $data['title3'] = 'Tambah Unit Rumah';
        $data['data_type'] = $this->unitrumah_model->getdatatype();
        $data['data_pro'] = $this->unitrumah_model->getdatapro();
        $data['data_cus'] = $this->unitrumah_model->getdatacus();
        $data['data_pek'] = $this->unitrumah_model->getdatapek();
        $this->render_backend('Masters/Unitrumah/dataunitrumah_tambah', $data);
    }

    function simpanunitrumah()
    {
        $type_id = $this->input->post('type_id');
        $proyek_id = $this->input->post('proyek_id');
        $alamat = $this->input->post('alamat');
        $luas_bangunan = $this->input->post('luas_bangunan');
        $luas_tanah = $this->input->post('luas_tanah');
        $status_pekerjaan = $this->input->post('status_pekerjaan');
        $status_progress = $this->input->post('status_progress');
        $customer_id = $this->input->post('customer_id');
        $status_beli = $this->input->post('status_beli');
        $mulai_bangun = $this->input->post('mulai_bangun');
        $selesai_bangun = $this->input->post('selesai_bangun');
        $tst_kunci = $this->input->post('tst_kunci');
        $pekerja_id = $this->input->post('pekerja_id');
        $keterangan = $this->input->post('keterangan');
        $data = array(
            'type_id'=>$type_id,
            'proyek_id'=>$proyek_id,
            'alamat'=>$alamat,
            'luas_bangunan'=>$luas_bangunan,
            'luas_tanah'=>$luas_tanah,
            'status_pekerjaan'=>$status_pekerjaan,
            'status_progress'=>$status_progress,
            'customer_id'=>$customer_id,
            'status_beli'=>$status_beli,
            'mulai_bangun'=>$mulai_bangun,
            'selesai_bangun'=>$selesai_bangun,
            'tst_kunci'=>$tst_kunci,
            'pekerja_id'=>$pekerja_id,
            'keterangan'=>$keterangan,
        );
		$this->unitrumah_model->add_unitrumah($data, 'm_unitrumah');
		redirect('dataunitrumah');
    }

    public function editunitrumah($kodex=0)
    {
        if ($this->uri->segment(3)==null) {
            echo "<script>alert('Kamu belum memilih data yang ingin diedit')</script>";
            redirect('dataunitrumah');
        }
        $m_unitrumah = $this->unitrumah_model->get_unitrumah(" WHERE id_unit='$kodex'")->row_array();
        $data = array(
            'title'=>'Master Data',
            'title2'=>'Data Unit Rumah',
            'title3'=>'Edit Unit Rumah',
            'id_unit'=>$m_unitrumah['id_unit'],
            'type_id'=>$m_unitrumah['type_id'],
            'proyek_id'=>$m_unitrumah['proyek_id'],
            'alamat'=>$m_unitrumah['alamat'],
            'luas_tanah'=>$m_unitrumah['luas_tanah'],
            'luas_bangunan'=>$m_unitrumah['luas_bangunan'],
            'status_pekerjaan'=>$m_unitrumah['status_pekerjaan'],
            'status_progress'=>$m_unitrumah['status_progress'],
            'customer_id'=>$m_unitrumah['customer_id'],
            'status_beli'=>$m_unitrumah['status_beli'],
            'mulai_bangun'=>$m_unitrumah['mulai_bangun'],
            'selesai_bangun'=>$m_unitrumah['selesai_bangun'],
            'tst_kunci'=>$m_unitrumah['tst_kunci'],
            'pekerja_id'=>$m_unitrumah['pekerja_id'],
            'keterangan'=>$m_unitrumah['keterangan'],
            'data_type'=>$this->unitrumah_model->getdatatype(),
            'data_pro'=>$this->unitrumah_model->getdatapro(),
            'data_cus'=>$this->unitrumah_model->getdatacus(),
            'data_pek'=>$this->unitrumah_model->getdatapek(),
        );
        $this->render_backend('Masters/Unitrumah/dataunitrumah_edit',$data);
    }

    public function updateunitrumah()
    {
        if (!$_POST['updateunitrumah']) {
            redirect('dataunitrumah');
        }
        $id_unit = $this->input->post('id_unit');
        $type_id = $this->input->post('type_id');
        $proyek_id = $this->input->post('proyek_id');
        $alamat = $this->input->post('alamat');
        $luas_tanah = $this->input->post('luas_tanah');
        $luas_bangunan = $this->input->post('luas_bangunan');
        $status_pekerjaan = $this->input->post('status_pekerjaan');
        $status_progress = $this->input->post('status_progress');
        $customer_id = $this->input->post('customer_id');
        $status_beli = $this->input->post('status_beli');
        $mulai_bangun = $this->input->post('mulai_bangun');
        $selesai_bangun = $this->input->post('selesai_bangun');
        $tst_kunci = $this->input->post('tst_kunci');
        $pekerja_id = $this->input->post('pekerja_id');
        $keterangan = $this->input->post('keterangan');
        $data = array(
            'type_id'=>$type_id,
            'proyek_id'=>$proyek_id,
            'alamat'=>$alamat,
            'luas_tanah'=>$luas_tanah,
            'luas_bangunan'=>$luas_bangunan,
            'status_pekerjaan'=>$status_pekerjaan,
            'status_progress'=>$status_progress,
            'customer_id'=>$customer_id,
            'status_beli'=>$status_beli,
            'mulai_bangun'=>$mulai_bangun,
            'selesai_bangun'=>$selesai_bangun,
            'tst_kunci'=>$tst_kunci,
            'pekerja_id'=>$pekerja_id,
            'keterangan'=>$keterangan
        );
        $result = $this->unitrumah_model->edit_unitrumah('m_unitrumah', $data, array('id_unit'=>$id_unit));
        if ($result == 1) {
            echo "<script>alert('Data berhasil diupdate')</script>";
            redirect('dataunitrumah');
        }
        else {
            echo "<script>alert('Data gagal diupdate')</script>";
            redirect('dataunitrumah/editunitrumah/');
        }
    }

    public function hapusunitrumah($kodex=0)
    {
        if ($this->uri->segment(3)==null) {
            echo "<script>alert('Kamu belum memilih data yang ingin dihapus')</script>";
            redirect('dataunitrumah');
        }
        $result = $this->unitrumah_model->delete_unitrumah('m_unitrumah', array('id_unit'=>$kodex));
        if ($result == 1) {
            echo "<script>alert('Data berhasil dihapus')</script>";
            redirect('dataunitrumah');
        }
        else {
            echo "<script>alert('Data gagal dihapus')</script>";
            redirect('dataunitrumah');
        }
    }
} ?>