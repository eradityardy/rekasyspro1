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
                    <li class="active"><a href="<?php echo base_url() ?>datakaryawan"><?php echo $title2 ?></a></li>
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
                            <a class="btn btn-sm btn-success" href="<?php echo base_url ('datakaryawan/tambahkaryawan') ?>">
                                <i class="fa fa-plus"></i>&nbsp; Tambah Data
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Bagian</th>
                                    <th>Alamat</th>
                                    <th>No HP</th>
                                    <th>Keterangan</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $count=0;
                                    foreach ($karyawan->result() as $row) :
                                        $count++;
                                ?>
                                <tr>
                                    <td><?php echo $count;?></td>
                                    <td><?php echo $row->nama_kar;?></td>
                                    <td><?php echo $row->nama_bag;?></td>
                                    <td><?php echo $row->alamat;?></td>
                                    <td><?php echo $row->hp_no;?></td>
                                    <td><?php echo $row->keterangan;?></td>
                                    <td>
                                        <a href="<?php echo base_url('datakaryawan/editkaryawan/'.$row->id_kar) ?>" class="btn btn-info btn-sm update-record" data-id="<?php echo $row->id_kar;?>" data-name="<?php echo $row->nama_kar;?>"><i class="fa fa-edit"></i> Edit</a>
                                        <a href="<?php echo base_url('datakaryawan/hapuskaryawan/'.$row->id_kar) ?>" class="btn btn-danger btn-sm delete-record" data-id="<?php echo $row->id_kar;?>" onclick="return confirm('Apakah anda benar-benar akan menghapus Data?')"><i class="fa fa-trash"></i> Hapus</a>
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