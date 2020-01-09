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
                    <li><a href="<?php echo base_url() ?>datatyperumah"><?php echo $title2 ?></a></li>
                    <li class="active"><a href="<?php echo base_url() ?>datatyperumah/tambahtyperumah"><?php echo $title3 ?></a></li>
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
                        <form action="<?php echo base_url() ?>datatyperumah/simpantyperumah" method="post" class="form-horizontal">
                            <div class="row form-group">
                                <div class="col col-md-4">
                                    <label for="nama_type"><h6>Type Rumah</h6></label>
                                    <input type="text" id="nama_type" name="nama_type" placeholder="Type Rumah" class="form-control" required>
                                </div>
                                <div class="col col-md-4">
                                    <label for="luas_tanah"><h6>Luas Tanah</h6></label>
                                    <input type="number" id="luas_tanah" name="luas_tanah" placeholder="Luas Tanah" class="form-control" required>
                                </div>
                                <div class="col col-md-4">
                                    <label for="luas_bangunan"><h6>Luas Bangunan</h6></label>
                                    <input type="number" id="luas_bangunan" name="luas_bangunan" placeholder="Luas Bangunan" class="form-control" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-12">
                                    <label for="keterangan" class="form-control-label"><h6>Keterangan</h6></label>
                                    <textarea name="keterangan" id="keterangan" rows="5" placeholder="Keterangan" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-6">
                                    <input type="submit" name="simpan" class="btn btn-primary" value="Simpan">
                                </div>
                                <div class="col col-md-6">
                                    <a class="btn btn-warning float-right" href="<?php echo base_url() ?>datatyperumah">
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