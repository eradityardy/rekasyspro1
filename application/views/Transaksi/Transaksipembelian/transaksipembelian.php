<!-- Header-->

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1><?php echo $title ?></h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Dashboard</a></li>
                    <li class="active"><a href="<?php echo base_url() ?>transaksipembelian"><?php echo $title2 ?></a></li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title"><?php echo $title2 ?></strong>
                        <div class="float-right">
                            <a class="btn btn-sm btn-warning" href="<?php echo base_url ('transaksipembelian/TransaksiPembelianPDF') ?>">
                                <i class="fa fa-print"></i>&nbsp; Cetak PDF
                            </a>
                            <a class="btn btn-sm btn-success" href="<?php echo base_url ('transaksipembelian/tambahtransaksi') ?>">
                                <i class="fa fa-plus"></i>&nbsp; Tambah Pembelian
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Faktur</th>
                                    <th>Tanggal Beli</th>
                                    <th>Tanggal Jatuh Tempo Pembayaran</th>
                                    <th>Supplier</th>
                                    <th>Gudang</th>
                                    <th>Total Biaya</th>
                                    <th>Keterangan</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=0; foreach ($transaksipembelian->result_array() as $k) { $no++; 
                                    $sumprice = $k['sub_total'];
                                    $jth_tmpo = $k['jatuh_tempo'];
                                    $tgl_bli = $k['tgl_beli'];
                                    $tgl_tmpo = date('Y-m-d', strtotime('+'.$jth_tmpo.' days', strtotime($tgl_bli)));
                                ?>
                                <tr>
                                    <td><?php echo $no ?></td>
                                    <td><?php echo $k['no_faktur']; ?></td>
                                    <td><?php echo $k['tgl_beli']; ?></td>
                                    <td><?php echo $tgl_tmpo; ?></td>
                                    <td><?php echo $k['nama']; ?></td>
                                    <td><?php echo $k['nama_gud']; ?></td>
                                    <td align='right'><?php echo 'Rp. '.number_format($sumprice,2); ?></td>
                                    <td><?php echo $k['keterangan']; ?></td>
                                    <td>
                                        <a href="<?php echo base_url('transaksipembelian/lihattransaksi/'.$k['no_faktur']) ?>" class="btn btn-sm btn-secondary">
                                        <i class="fa fa-eye"></i> Detail
                                        </a>
                                        <a href="<?php echo base_url('transaksipembelian/edittransaksi/'.$k['id_tbm']) ?>" class="btn btn-sm btn-primary">
                                        <i class="fa fa-edit"></i> Edit
                                        </a>
                                        <a href="<?php echo base_url('transaksipembelian/hapustransaksi/'.$k['id_tbm']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda benar-benar akan menghapus Data?')">
                                        <i class="fa fa-trash"></i> Hapus
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>