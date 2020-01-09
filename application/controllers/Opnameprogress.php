<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Opnameprogress extends MY_Controller {

    function __construct()
    {
		parent::__construct();
        $this->load->helper('url');
        $this->load->library('pdf');
        $this->load->model('opnameprogress_model');
	}
    
    public function index()
    {
        $data['title'] = 'Transaksi';
        $data['title2'] = 'Opname Progress';
        $data['opnameprogress'] = $this->opnameprogress_model->joinTableOpnameprogress();
        if($this->session->userdata('role') == 'operator'){
            $this->render_backend('Transaksi/Opnameprogress/opnameprogress_operator', $data);
        }else{
            $this->render_backend('Transaksi/Opnameprogress/opnameprogress', $data);
        }
    }

    public function tambahprogress()
    {
        $data['title'] = 'Transaksi';
        $data['title2'] = 'Opname Progress';
        $data['title3'] = 'Tambah Progress';
        $data['data_unit'] = $this->opnameprogress_model->getDataunit();
        $this->render_backend('Transaksi/Opnameprogress/opnameprogress_tambah', $data);
    }

    public function simpanprogress()
    {
        $tgl_progress = $this->input->post('tgl_progress');
        $rpbu_id = $this->input->post('rpbu_id');
        $unit_id = $this->input->post('unit_id');
        $pekerjaan_id = $this->input->post('pekerjaan_id');
        $persentase = $this->input->post('persentase');
        $price = $this->input->post('price');
		$data = array(
            'tgl_progress' => $tgl_progress,
            'rpbu_id' => $rpbu_id,
            'unit_id' => $unit_id,
            'pekerjaan_id' => $pekerjaan_id,
            'persentase' => $persentase,
            'price' => $price,
		);
		$this->opnameprogress_model->add_opnameprogress($data, 't_opname_progress');
		redirect('opnameprogress');
    }

    public function editprogress($kodex=0)
    {
        if ($this->uri->segment(3)==null) {
            echo "<script>alert('Kamu belum memilih data yang ingin diedit')</script>";
            redirect('opnameprogress');
        }
        $t_opname_progress = $this->opnameprogress_model->get_opnameprogress(" WHERE id_op='$kodex'")->row_array();
        $data = array(
            'title'=>'Transaksi',
            'title2'=>'Opname Progress',
            'title3'=>'Edit Progress',
            'id_op'=>$t_opname_progress['id_op'],
            'tgl_progress'=>$t_opname_progress['tgl_progress'],
            'rpbu_id'=>$t_opname_progress['rpbu_id'],
            'unit_id'=>$t_opname_progress['unit_id'],
            'pekerjaan_id'=>$t_opname_progress['pekerjaan_id'],
            'persentase'=>$t_opname_progress['persentase'],
            'price'=>$t_opname_progress['price'],
            'data_unit'=>$this->opnameprogress_model->getDataunit(),
        );
        $this->render_backend('Transaksi/Opnameprogress/opnameprogress_edit',$data);
    }

    public function updateprogress()
    {
        if (!$_POST['updateprogress']) {
            redirect('opnameprogress');
        }
        $id_op = $this->input->post('id_op');
        $tgl_progress = $this->input->post('tgl_progress');
        $rpbu_id = $this->input->post('rpbu_id');
        $unit_id = $this->input->post('unit_id');
        $pekerjaan_id = $this->input->post('pekerjaan_id');
        $persentase = $this->input->post('persentase');
        $price = $this->input->post('price');
        $data = array(
            'tgl_progress'=>$tgl_progress,
            'rpbu_id'=>$rpbu_id,
            'unit_id'=>$unit_id,
            'pekerjaan_id'=>$pekerjaan_id,
            'persentase'=>$persentase,
            'price'=>$price,
        );
        $result = $this->opnameprogress_model->edit_opnameprogress('t_opname_progress', $data, array('id_op'=>$id_op));
        if ($result == 1) {
            echo "<script>alert('Data berhasil diupdate')</script>";
            redirect('opnameprogress');
        }
        else {
            echo "<script>alert('Data gagal diupdate')</script>";
            redirect('opnameprogress/editprogress/');
        }
    }

    public function hapusprogress($kodex=0)
    {
        if ($this->uri->segment(3)==null) {
            echo "<script>alert('Kamu belum memilih data yang ingin dihapus')</script>";
            redirect('opnameprogress');
        }
        $result = $this->opnameprogress_model->delete_opnameprogress('t_opname_progress', array('id_op'=>$kodex));
        if ($result == 1) {
            echo "<script>alert('Data berhasil dihapus')</script>";
            redirect('opnameprogress');
        }
        else {
            echo "<script>alert('Data gagal dihapus')</script>";
            redirect('opnameprogress');
        }
    }

    public function OpnameProgressPDF()
    {
        $pdf = new FPDF('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,7,'LAPORAN',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(190,7,'OPNAME PROGRESS SUMATIRTA',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(36,6,'Tanggal Pengerjaan',1,0,'C');
        $pdf->Cell(27,6,'Proyek',1,0,'C');
        $pdf->Cell(43,6,'Unit Rumah',1,0,'C');
        $pdf->Cell(30,6,'Customer',1,0,'C');
        $pdf->Cell(26,6,'Pekerjaan',1,0,'C');
        $pdf->Cell(28,6,'Nilai Progress',1,1,'C');
        $pdf->SetFont('Arial','',10);
        $opnameprogress = $this->opnameprogress_model->joinTableOpnameprogress('opnameprogress')->result();
        foreach ($opnameprogress as $row){
            $pdf->Cell(36,6,$row->tgl_progress,1,0,'C');
            $pdf->Cell(27,6,$row->nama_pro,1,0,'C');
            $pdf->Cell(43,6,$row->alamat,1,0,'C'); 
            $pdf->Cell(30,6,$row->nama_cus,1,0,'C');
            $pdf->Cell(26,6,$row->pekerjaan,1,0,'C');
            $pdf->Cell(28,6,$row->persentase,1,1,'C');
        }
        $pdf->Output();
    }
} ?>