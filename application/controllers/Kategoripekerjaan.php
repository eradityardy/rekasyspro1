<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategoripekerjaan extends MY_Controller {

    function __construct()
    {
		parent::__construct();
        $this->load->helper('url');
        $this->load->model('kategoripekerjaan_model');
	}

    public function index()
    {
        $data['title'] = 'Master Data';
        $data['title2'] = 'Kategori Pekerjaan';
        $data['katpek'] = $this->kategoripekerjaan_model->get_katpek();
        if($this->session->userdata('role') == 'operator'){
            $this->render_backend('Masters/Kategoripekerjaan/kategoripekerjaan_operator', $data);
        }else{
            $this->render_backend('Masters/Kategoripekerjaan/kategoripekerjaan', $data);
        }
    }

    public function tambahkategori()
    {
        $data['title'] = 'Master Data';
        $data['title2'] = 'Kategori Pekerjaan';
        $data['title3'] = 'Tambah Kategori';
        $this->render_backend('Masters/Kategoripekerjaan/kategoripekerjaan_tambah', $data);
    }

    public function simpankategori()
    {
        $kategori_pek = $this->input->post('kategori_pek');
        $keterangan = $this->input->post('keterangan');
		$data = array(
            'kategori_pek' => $kategori_pek,
            'keterangan' => $keterangan
		);
		$this->kategoripekerjaan_model->add_katpek($data, 'm_kategori_pekerjaan');
		redirect('kategoripekerjaan');
    }

    public function editkategori($kodex=0)
    {
        if ($this->uri->segment(3)==null) {
            echo "<script>alert('Kamu belum memilih data yang ingin diedit')</script>";
            redirect('kategoripekerjaan');
        }
        $m_kategori_pekerjaan = $this->kategoripekerjaan_model->get_katpek(" WHERE id_katpek = '$kodex'")->row_array();
        $data = array(
            'title'=>'Master Data',
            'title2'=>'Kategori Pekerjaan',
            'title3'=>'Edit Kategori',
            'id_katpek'=>$m_kategori_pekerjaan['id_katpek'],
            'kategori_pek'=>$m_kategori_pekerjaan['kategori_pek'],
            'keterangan'=>$m_kategori_pekerjaan['keterangan'],
        );
        $this->render_backend('Masters/Kategoripekerjaan/kategoripekerjaan_edit',$data);
    }

    public function updatekategori()
    {
        if (!$_POST['updatekategori']) {
            redirect('kategoripekerjaan');
        }
        $id_katpek = $this->input->post('id_katpek');
        $kategori_pek = $this->input->post('kategori_pek');
        $keterangan = $this->input->post('keterangan');
        $data = array(
            'kategori_pek'=>$kategori_pek,
            'keterangan'=>$keterangan
        );
        $result = $this->kategoripekerjaan_model->edit_katpek('m_kategori_pekerjaan', $data, array('id_katpek'=>$id_katpek));
        if ($result == 1) {
            echo "<script>alert('Data berhasil diupdate')</script>";
            redirect('kategoripekerjaan');
        }
        else {
            echo "<script>alert('Data gagal diupdate')</script>";
            redirect('kategoripekerjaan/editkategori/');
        }
    }

    public function hapuskategori($kodex=0)
    {
        if ($this->uri->segment(3)==null) {
            echo "<script>alert('Kamu belum memilih data yang ingin dihapus')</script>";
            redirect('kategoripekerjaan');
        }
        $result = $this->kategoripekerjaan_model->delete_katpek('m_kategori_pekerjaan', array('id_katpek'=>$kodex));
        if ($result == 1) {
            echo "<script>alert('Data berhasil dihapus')</script>";
            redirect('kategoripekerjaan');
        }
        else {
            echo "<script>alert('Data gagal dihapus')</script>";
            redirect('kategoripekerjaan');
        }
    }
}