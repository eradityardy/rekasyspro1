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
                    <li class="active"><a href="<?php echo base_url() ?>pemakaianmaterial"><?php echo $title2 ?></a></li>
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
                            <a class="btn btn-sm btn-warning" href="<?php echo base_url ('pemakaianmaterial/PemakaianMaterialPDF') ?>">
                                <i class="fa fa-print"></i>&nbsp; Cetak PDF
                            </a>
                            <a class="btn btn-sm btn-success" href="<?php echo base_url ('pemakaianmaterial/tambahpemakaian') ?>">
                                <i class="fa fa-plus"></i>&nbsp; Tambah Pemakaian
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Tanggal Pemakaian</th>
                                    <th>Proyek</th>
                                    <th>Unit Rumah</th>
                                    <th>Customer</th>
                                    <th>Material</th>
                                    <th>Jumlah Pemakaian</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=0; foreach ($pemakaianmaterial->result_array() as $k) { $no++; ?>
                                <tr>
                                    <td><?php echo $no ?></td>
                                    <td><?php echo $k['tgl_pake']; ?></td>
                                    <td><?php echo $k['nama_pro']; ?></td>
                                    <td><?php echo $k['alamat']; ?></td>
                                    <td><?php echo $k['nama_cus']; ?></td>
                                    <td><?php echo $k['nama_brg']; ?></td>
                                    <td><?php echo $k['qty'];?> <?php echo $k['satuan'];?></td>
                                    <td>
                                        <a href="<?php echo base_url('pemakaianmaterial/editpemakaian/'.$k['id_pake']) ?>" class="btn btn-sm btn-info">
                                        <i class="fa fa-edit"></i> Edit
                                        </a>
                                        <a href="<?php echo base_url('pemakaianmaterial/hapuspemakaian/'.$k['id_pake']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda benar-benar akan menghapus Data?')">
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