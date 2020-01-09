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
                    <li class="active"><a href="<?php echo base_url() ?>dataunitrumah"><?php echo $title2 ?></a></li>
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
                            <a class="btn btn-sm btn-success" href="<?php echo base_url ('dataunitrumah/tambahunitrumah') ?>">
                                <i class="fa fa-plus"></i>&nbsp; Tambah Data
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Type</th>
                                    <th>Proyek</th>
                                    <th>Alamat</th>
                                    <th>Luas Bangunan</th>
                                    <th>Luas Tanah</th>
                                    <th>Status Pekerjaan</th>
                                    <th>Status Progress</th>
                                    <th>Customer</th>
                                    <th>Status Pembelian</th>
                                    <th>Mulai Bangun</th>
                                    <th>Selesai Bangun</th>
                                    <th>Tanggal Terima Kunci</th>
                                    <th>Pekerja</th>
                                    <th>Keterangan</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $count=0;
                                    foreach ($unitrumah->result() as $row) :
                                        $count++;
                                ?>
                                <tr>
                                    <td><?php echo $count;?></td>
                                    <td><?php echo $row->nama_type;?></td>
                                    <td><?php echo $row->nama_pro;?></td>
                                    <td><?php echo $row->alamat;?></td>
                                    <td><?php echo $row->luas_bangunan;?></td>
                                    <td><?php echo $row->luas_tanah;?></td>
                                    <td><?php echo $row->status_pekerjaan;?></td>
                                    <td><?php echo $row->status_progress;?></td>
                                    <td><?php echo $row->nama_cus;?></td>
                                    <td><?php echo $row->status_beli;?></td>
                                    <td><?php echo $row->mulai_bangun;?></td>
                                    <td><?php echo $row->selesai_bangun;?></td>
                                    <td><?php echo $row->tst_kunci;?></td>
                                    <td><?php echo $row->nama_pek;?></td>
                                    <td><?php echo $row->keterangan;?></td>
                                    <td>
                                        <a href="<?php echo base_url('dataunitrumah/editunitrumah/'.$row->id_unit) ?>" class="btn btn-info btn-sm update-record" data-id="<?php echo $row->id_unit;?>" data-name="<?php echo $row->alamat;?>"><i class="fa fa-edit"></i> Edit</a>
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