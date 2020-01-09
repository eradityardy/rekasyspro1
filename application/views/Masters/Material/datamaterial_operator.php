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
                    <li class="active"><a href="<?php echo base_url() ?>datamaterial"><?php echo $title2 ?></a></li>
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
                            <a class="btn btn-sm btn-success" href="<?php echo base_url ('datamaterial/tambahmaterial') ?>">
                                <i class="fa fa-plus"></i>&nbsp; Tambah Data
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Kode</th>
                                    <th>Kategori</th>
                                    <th>Material</th>
                                    <th>Satuan</th>
                                    <th>Harga</th>
                                    <th>Keterangan</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $count=0;
                                    foreach ($material->result() as $row) :
                                        $count++;
                                ?>
                                <tr>
                                    <td><?php echo $count;?></td>
                                    <td><?php echo $row->kode;?></td>
                                    <td><?php echo $row->kategori_mat;?></td>
                                    <td><?php echo $row->nama_brg;?></td>
                                    <td><?php echo $row->satuan;?></td>
                                    <td align="right"><?php echo 'Rp. '.number_format($row->harga,2);?></td>
                                    <td><?php echo $row->keterangan;?></td>
                                    <td>
                                        <a href="<?php echo base_url('datamaterial/editmaterial/'.$row->id) ?>" class="btn btn-info btn-sm update-record" data-id="<?php echo $row->id;?>" data-name="<?php echo $row->nama_brg;?>"><i class="fa fa-edit"></i> Edit</a>
                                    </td>
                                </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>