<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksipembelian extends MY_Controller {

    function __construct()
    {
		parent::__construct();
        $this->load->helper('url');
        $this->load->library('pdf');
        $this->load->model('transaksipembelian_model');
        $this->load->model('stockmaterial_model');
	}
    
    public function index()
    {
        $data['title'] = 'Transaksi';
        $data['title2'] = 'Pembelian Item';
        $data['transaksipembelian'] = $this->transaksipembelian_model->joinTableTransaksibeli();
        $this->render_backend('Transaksi/Transaksipembelian/transaksipembelian', $data);
    }

    public function lihattransaksi($kodex=0)
    {
        if ($this->uri->segment(3)==null) {
            echo "<script>alert('Kamu belum memilih data yang ingin diedit')</script>";
            $this->index();
        }
        $t_beli_masterdetail = $this->transaksipembelian_model->joinTablebelidetail(" WHERE no_faktur='$kodex'")->row_array();
        $data = array(
            'title'=>'Transaksi',
            'title2'=>'Pembelian Item',
            'title3'=>'Lihat Detail',
            'no_faktur'=>$t_beli_masterdetail['no_faktur'],
            'tgl_beli'=>$t_beli_masterdetail['tgl_beli'],
            'nama'=>$t_beli_masterdetail['nama'],
            'nama_gud'=>$t_beli_masterdetail['nama_gud'],
            'total'=>$t_beli_masterdetail['sub_total'],
            'data_detail'=>$this->transaksipembelian_model->show_transaksipembelian_detail($t_beli_masterdetail['no_faktur']),
        );
        $this->render_backend('Transaksi/Transaksipembelian/transaksipembelian_detail',$data);
    }

    public function tambahtransaksi()
    {
        $data['title'] = 'Transaksi';
        $data['title2'] = 'Pembelian Item';
        $data['title3'] = 'Tambah Pembelian';
        $data['data_sup'] = $this->transaksipembelian_model->getDatasupplier();
        $data['data_gud'] = $this->transaksipembelian_model->getDatagudang();
        $data['data_mat'] = $this->transaksipembelian_model->getDatamaterial();
        $this->render_backend('Transaksi/Transaksipembelian/transaksipembelian_tambah', $data);
    }

    public function simpantransaksi()
    {
        $no_faktur = $this->input->post('no_faktur');
        $tgl_beli = $this->input->post('tgl_beli');
        $jatuh_tempo = $this->input->post('jatuh_tempo');
        $supplier_id = $this->input->post('supplier_id');
        $gudang_id = $this->input->post('gudang_id');
        $keterangan = $this->input->post('keterangan');
        $data = array(
            'no_faktur' => $no_faktur,
            'tgl_beli' => $tgl_beli,
            'jatuh_tempo' => $jatuh_tempo,
            'supplier_id' => $supplier_id,
            'gudang_id' => $gudang_id,
            'keterangan' => $keterangan,
        );
        $result = $this->transaksipembelian_model->simpan('t_beli_master', $data);
        $this->tampilkan();
    }

    public function tampilkan()
    {
        echo $this->tampilhasil();
    }

    public function tampilhasil()
    { 
		$output =   '<div class="alert alert-primary" role="alert">
                        Tersimpan!
                    </div>';
		return $output;
    }
    
    public function simpandetail($gudangId = 0)
    {
        //save data ke pembelian detail
        $no_faktur = $this->input->post('no_faktur');
        $material_id = $this->input->post('material_id');
        $qty = $this->input->post('qty');
        $price = $this->input->post('price');

        //untuk ambil supplier
        $supplier_id1 = $this->input->post('supplier_id1');

        $stock_id = $this->stockmaterial_model->getStockId($gudangId,$material_id);
        if ($stock_id == null){
            $stock_id = 0;
        }

        if ($stock_id == 0){
            //jika belum ada data stok barang buat dulu 
            $dstock = array(
                'gudang_id' => $gudangId,
                'supplier_id' => $supplier_id1,
                'material_id' => $material_id,
                'qty_stock' => 0,
                'keterangan' => '-',
            );
            $result = $this->stockmaterial_model->simpan('t_stock_material',$dstock);
            if ($result > 0){
                $stock_id = $result;
            }
        }
        //jika sudah ada stok lanjut simpan data 
        if ($stock_id > 0){
            $data = array(
                'no_faktur' => $no_faktur,
                'material_id' => $material_id,
                'qty' => $qty,
                'price' => $price,
                'stock_id' => $stock_id,
            );
            $result = $this->transaksipembelian_model->simpan('t_beli_detail', $data);
            echo $this->tampilhasiltabel();
        }
    }

    public function updatedetail($gudangId = 0)
    {
        //save data ke pembelian detail
        $no_faktur = $this->input->post('no_faktur');
        $material_id = $this->input->post('material_id');
        $qty = $this->input->post('qty');
        $price = $this->input->post('price');

        //untuk ambil supplier
        $supplier_id1 = $this->input->post('supplier_id1');

        $stock_id = $this->stockmaterial_model->getStockId($gudangId,$material_id);
        if ($stock_id == null){
            $stock_id = 0;
        }

        if ($stock_id == 0){
            //jika belum ada data stok barang buat dulu 
            $dstock = array(
                'gudang_id' => $gudangId,
                'supplier_id' => $supplier_id1,
                'material_id' => $material_id,
                'qty_stock' => 0,
                'keterangan' => '-',
            );
            $result = $this->stockmaterial_model->simpan('t_stock_material',$dstock);
            if ($result > 0){
                $stock_id = $result;
            }
        }
        //jika sudah ada stok lanjut simpan data 
        if ($stock_id > 0){
            $data = array(
                'no_faktur' => $no_faktur,
                'material_id' => $material_id,
                'qty' => $qty,
                'price' => $price,
                'stock_id' => $stock_id,
            );
            $result = $this->transaksipembelian_model->simpan('t_beli_detail', $data);
            $this->tampilkandetail();
        }
    }

    public function tampilkandetail()
    {
        echo $this->tampilhasildetail();
    }

    public function tampilhasildetail()
    { 
		$output =   '<div class="alert alert-success" role="alert">
                        Material Tersimpan!
                    </div>';
		return $output;
    }

    public function tampilkantabel()
    {
        echo $this->tampilhasiltabel();
    }

    public function tampilhasiltabel()
    { 
        $no_faktur = $this->transaksipembelian_model->getNofaktur();
        $data_detail = $this->transaksipembelian_model->show_transaksipembelian_detail($no_faktur)->result_array();
        $output = '';
		foreach ($data_detail as $material) {
			$output .='
				<tr>
					<td>'.$material['nama_brg'].'</td>
					<td>'.$material['qty'].'</td>
					<td>'.$material['price'].'</td>
				</tr>
			';
		}
		return $output;
    }

    public function edittransaksi($kodex=0)
    {
        if ($this->uri->segment(3)==null) {
            echo "<script>alert('Kamu belum memilih data yang ingin diedit')</script>";
            $this->index();
        }
        $t_beli_master = $this->transaksipembelian_model->getTbelimaster(" WHERE id_tbm='$kodex'")->row_array();
        $data = array(
            'title'=>'Transaksi',
            'title2'=>'Pembelian Item',
            'title3'=>'Edit Pembelian',
            'id_tbm'=>$t_beli_master['id_tbm'],
            'no_faktur'=>$t_beli_master['no_faktur'],
            'tgl_beli'=>$t_beli_master['tgl_beli'],
            'jatuh_tempo'=>$t_beli_master['jatuh_tempo'],
            'supplier_id'=>$t_beli_master['supplier_id'],
            'gudang_id'=>$t_beli_master['gudang_id'],
            'keterangan'=>$t_beli_master['keterangan'],
            'data_sup'=>$this->transaksipembelian_model->getDatasupplier(),
            'data_gud'=>$this->transaksipembelian_model->getDatagudang(),
            'data_detail'=>$this->transaksipembelian_model->show_transaksipembelian_detail($t_beli_master['no_faktur']),
            'data_mat'=>$this->transaksipembelian_model->getDatamaterial(),
            'data_sto'=>$this->transaksipembelian_model->getDatastock(),
        );
        $this->render_backend('Transaksi/Transaksipembelian/transaksipembelian_edit',$data);
    }

    public function updatemaster()
    {
        $id_tbm = $this->input->post('id_tbm');
        $no_faktur = $this->input->post('no_faktur');
        $tgl_beli = $this->input->post('tgl_beli');
        $jatuh_tempo = $this->input->post('jatuh_tempo');
        $gudang_id = $this->input->post('gudang_id');
        $supplier_id = $this->input->post('supplier_id');
        $keterangan = $this->input->post('keterangan');
        $data = array(
            'no_faktur'=>$no_faktur,
            'tgl_beli'=>$tgl_beli,
            'jatuh_tempo'=>$jatuh_tempo,
            'gudang_id'=>$gudang_id,
            'supplier_id'=>$supplier_id,
            'keterangan'=>$keterangan,
        );
        $result = $this->transaksipembelian_model->update('t_beli_master', $data, array('id_tbm'=>$id_tbm));
        $this->tampilberhasilupdate();
    }

    public function tampilberhasilupdate()
    {
        echo $this->tampilhasilberhasilupdate();
    }

    public function tampilhasilberhasilupdate()
    { 
		$output =   '<div class="alert alert-primary" role="alert">
                        Terupdate!
                    </div>';
		return $output;
    }

    public function hapustransaksi($kodex=0)
    {
        if ($this->uri->segment(3)==null) {
            echo "<script>alert('Kamu belum memilih data yang ingin dihapus')</script>";
            redirect('transaksipembelian');
        }
        $result = $this->transaksipembelian_model->hapus('t_beli_master', array('id_tbm'=>$kodex));
        if ($result == 1) {
            echo "<script>alert('Data berhasil dihapus')</script>";
            redirect('transaksipembelian');
        }
        else {
            echo "<script>alert('Data gagal dihapus')</script>";
            redirect('transaksipembelian');
        }
    }

    public function hapusdetail($kodex=0)
    {
        if ($this->uri->segment(3)==null) {
            echo "<script>alert('Kamu belum memilih data yang ingin dihapus')</script>";
            redirect('transaksipembelian');
        }
        $result = $this->transaksipembelian_model->hapus('t_beli_detail', array('id_tbd'=>$kodex));
        if ($result == 1) {
            echo "<script>alert('Data berhasil dihapus')</script>";
            redirect('transaksipembelian');
        }
        else {
            echo "<script>alert('Data gagal dihapus')</script>";
            redirect('transaksipembelian');
        }
    }

    public function TransaksiPembelianPDF()
    {
        $pdf = new FPDF('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,7,'LAPORAN',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(190,7,'TRANSAKSI PEMBELIAN SUMATIRTA',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(28,6,'No Faktur',1,0,'C');
        $pdf->Cell(25,6,'Tanggal Beli',1,0,'C');
        $pdf->Cell(46,6,'Supplier',1,0,'C');
        $pdf->Cell(50,6,'Gudang',1,0,'C');
        $pdf->Cell(22,6,'Total Biaya',1,0,'C');
        $pdf->Cell(22,6,'Keterangan',1,1,'C');
        $pdf->SetFont('Arial','',10);
        $transaksipembelian = $this->transaksipembelian_model->joinTableTransaksibeli('transaksipembelian')->result();
        foreach ($transaksipembelian as $row){
            $pdf->Cell(28,6,$row->no_faktur,1,0,'C');
            $pdf->Cell(25,6,$row->tgl_beli,1,0,'C');
            $pdf->Cell(46,6,$row->nama,1,0,'C'); 
            $pdf->Cell(50,6,$row->nama_gud,1,0,'C');
            $pdf->Cell(22,6,$row->sub_total,1,0,'C');
            $pdf->Cell(22,6,$row->keterangan,1,1,'C');
        }
        $pdf->Output();
    }

    public function CheckFaktur()
    {
        $noFaktur = $this->input->post('no_faktur');
        $ada = $this->transaksipembelian_model->checkNoFaktur($noFaktur);
        print($ada);
    }
} ?>