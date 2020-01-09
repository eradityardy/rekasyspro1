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
                    <li class="active"><a href="<?php echo base_url() ?>opnameprogress"><?php echo $title2 ?></a></li>
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
                            <a class="btn btn-sm btn-success" href="<?php echo base_url ('opnameprogress/tambahprogress') ?>">
                                <i class="fa fa-plus"></i>&nbsp; Tambah Progress
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Tanggal Pengerjaan</th>
                                    <th>Proyek</th>
                                    <th>Unit Rumah</th>
                                    <th>Customer</th>
                                    <th>Pekerjaan</th>
                                    <th>Nilai Progress</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=0; foreach ($opnameprogress->result_array() as $k) { $no++; ?>
                                <tr>
                                    <td><?php echo $no ?></td>
                                    <td><?php echo $k['tgl_progress']; ?></td>
                                    <td><?php echo $k['nama_pro']; ?></td>
                                    <td><?php echo $k['alamat']; ?></td>
                                    <td><?php echo $k['nama_cus']; ?></td>
                                    <td><?php echo $k['pekerjaan']; ?></td>
                                    <td><?php echo $k['persentase'];?> %</td>
                                    <td>
                                        <a href="<?php echo base_url('index.php/opnameprogress/editprogress/'.$k['id_op']) ?>" class="btn btn-sm btn-info">
                                        <i class="fa fa-edit"></i> Edit
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