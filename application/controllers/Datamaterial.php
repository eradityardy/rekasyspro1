<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datamaterial extends MY_Controller {

    function __construct()
    {
		parent::__construct();
        $this->load->helper('url');
        $this->load->model('material_model');
	}
    
    public function index()
    {
        $data['title'] = 'Master Data';
        $data['title2'] = 'Data Material';
        $data['material'] = $this->material_model->jointablematerial();
        if($this->session->userdata('role') == 'operator'){
            $this->render_backend('Masters/Material/datamaterial_operator', $data);
        }else{
            $this->render_backend('Masters/Material/datamaterial', $data);
        }
    }

    public function tambahmaterial()
    {
        $data['title'] = 'Master Data';
        $data['title2'] = 'Data Material';
        $data['title3'] = 'Tambah Material';
        $data['data_kat'] = $this->material_model->getdatakategori();
        $this->render_backend('Masters/Material/datamaterial_tambah', $data);
    }

    function simpanmaterial()
    {
        $kode = $this->input->post('kode');
        $kategori_id = $this->input->post('kategori_id');
        $nama_brg = $this->input->post('nama_brg');
        $satuan = $this->input->post('satuan');
        $harga = $this->input->post('harga');
        $keterangan = $this->input->post('keterangan');
		$data = array(
            'kode' => $kode,
            'kategori_id' => $kategori_id,
            'nama_brg' => $nama_brg,
            'satuan' => $satuan,
            'harga' => $harga,
            'keterangan' => $keterangan,
		);
		$this->material_model->add_material($data, 'm_material');
		redirect('datamaterial');
    }
    
    function editmaterial($kodex=0)
    {
        if ($this->uri->segment(3)==null) {
            echo "<script>alert('Kamu belum memilih data yang ingin diedit')</script>";
            redirect('datamaterial');
        }
        $m_material = $this->material_model->get_material(" WHERE id='$kodex'")->row_array();
        $data = array(
            'title'=>'Master Data',
            'title2'=>'Data Material',
            'title3'=>'Edit Material',
            'id'=>$m_material['id'],
            'kode'=>$m_material['kode'],
            'kategori_id'=>$m_material['kategori_id'],
            'nama_brg'=>$m_material['nama_brg'],
            'satuan'=>$m_material['satuan'],
            'harga'=>$m_material['harga'],
            'keterangan'=>$m_material['keterangan'],
            'data_kat'=>$this->material_model->getdatakategori(),
        );
        $this->render_backend('Masters/Material/datamaterial_edit',$data);
    }

    public function updatematerial()
    {
        if (!$_POST['updatematerial']) {
            redirect('datamaterial');
        }
        $id = $this->input->post('id');
        $kode = $this->input->post('kode');
        $kategori_id = $this->input->post('kategori_id');
        $nama_brg = $this->input->post('nama_brg');
        $satuan = $this->input->post('satuan');
        $harga = $this->input->post('harga');
        $keterangan = $this->input->post('keterangan');
        $data = array(
            'kode'=>$kode,
            'kategori_id'=>$kategori_id,
            'nama_brg'=>$nama_brg,
            'satuan'=>$satuan,
            'harga'=>$harga,
            'keterangan'=>$keterangan
        );
        $result = $this->material_model->edit_material('m_material', $data, array('id'=>$id));
        if ($result == 1) {
            echo "<script>alert('Data berhasil diupdate')</script>";
            redirect('datamaterial');
        }
        else {
            echo "<script>alert('Data gagal diupdate')</script>";
            redirect('datamaterial/editmaterial/');
        }
    }

    public function hapusmaterial($kodex=0)
    {
        if ($this->uri->segment(3)==null) {
            echo "<script>alert('Kamu belum memilih data yang ingin dihapus')</script>";
            redirect('datamaterial');
        }
        $result = $this->material_model->delete_material('m_material', array('id'=>$kodex));
        if ($result == 1) {
            echo "<script>alert('Data berhasil dihapus')</script>";
            redirect('datamaterial');
        }
        else {
            echo "<script>alert('Data gagal dihapus')</script>";
            redirect('datamaterial');
        }
    }
}
?>