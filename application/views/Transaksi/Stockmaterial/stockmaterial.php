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
                    <li class="active"><a href="<?php echo base_url() ?>stockmaterial"><?php echo $title2 ?></a></li>
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
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Gudang</th>
                                    <th>Kode</th>
                                    <th>Material</th>
                                    <th>Stok</th>
                                    <th>Satuan</th>
                                    <th>Supplier</th>
                                    <th>Keterangan</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $count=0;
                                    foreach ($stockmaterial->result() as $row) :
                                        $count++;
                                ?>
                                <tr>
                                    <td><?php echo $count;?></td>
                                    <td><?php echo $row->nama_gud;?></td>
                                    <td><?php echo $row->kode;?></td>
                                    <td><?php echo $row->nama_brg;?></td>
                                    <td><?php echo $row->qty_stock;?></td>
                                    <td><?php echo $row->satuan;?></td>
                                    <td><?php echo $row->nama;?></td>
                                    <td><?php echo $row->keterangan;?></td>
                                    <td>
                                        <a href="<?php echo base_url('stockmaterial/hapusstock/'.$row->id_stomat) ?>" class="btn btn-danger btn-sm delete-record" data-id="<?php echo $row->id_stomat;?>" onclick="return confirm('Apakah anda benar-benar akan menghapus Data?')"><i class="fa fa-trash"></i> Hapus</a>
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