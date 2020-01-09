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
                    <li><a href="<?php echo base_url() ?>datacustomer"><?php echo $title2 ?></a></li>
                    <li class="active"><a href="<?php echo base_url() ?>datacustomer/tambahcustomer"><?php echo $title3 ?></a></li>
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
                        <form action="<?php echo base_url() ?>datacustomer/simpancustomer" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <div class="row form-group">
                                <div class="col col-md-6">
                                    <label for="nama_cus"><h6>Nama</h6></label>
                                    <input type="text" id="nama_cus" name="nama_cus" placeholder="Nama" class="form-control" required>
                                </div>
                                <div class="col col-md-3">
                                    <label for="hp_no"><h6>Nomor HP</h6></label>
                                    <input type="number" id="hp_no" name="hp_no" placeholder="Nomor HP" class="form-control" required>
                                </div>
                                <div class="col col-md-3">
                                    <label for="id_card"><h6>Nomor ID</h6></label>
                                    <input type="number" id="id_card" name="id_card" placeholder="ID Card" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-6">
                                    <label for="alamat" class="form-control-label"><h6>Alamat</h6></label>
                                    <textarea name="alamat" id="alamat" rows="5" placeholder="Alamat" class="form-control" required></textarea>
                                </div>
                                <div class="col col-md-6">
                                    <label for="keterangan" class="form-control-label"><h6>Keterangan</h6></label>
                                    <textarea name="keterangan" id="keterangan" rows="5" placeholder="Keterangan" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-6">
                                    <input type="submit" name="simpan" class="btn btn-primary" value="Simpan">
                                </div>
                                <div class="col col-md-6">
                                    <a class="btn btn-warning float-right" href="<?php echo base_url() ?>datacustomer">
                                        Kembali
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>