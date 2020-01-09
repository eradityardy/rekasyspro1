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
                    <li><a href="<?php echo base_url() ?>kategoripekerjaan"><?php echo $title2 ?></a></li>
                    <li class="active"><a href="<?php echo base_url() ?>kategoripekerjaan/editkategori"><?php echo $title3 ?></a></li>
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
                        <form action="<?php echo base_url() ?>kategoripekerjaan/updatekategori" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id_katpek" value="<?php echo $id_katpek ?>">
                            <div class="form-group">
                                <label for="kategori_pek"><h6>Kategori Pekerjaan</h6></label>
                                <input type="text" id="kategori_pek" name="kategori_pek" placeholder="Kategori Pekerjaan" class="form-control" value="<?php echo $kategori_pek ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="keterangan" class="form-control-label"><h6>Keterangan</h6></label>
                                <textarea name="keterangan" id="keterangan" rows="5" placeholder="Keterangan" class="form-control"><?php echo $keterangan ?></textarea>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-6">
                                    <input type="submit" name="updatekategori" class="btn btn-primary" value="Update">
                                </div>
                                <div class="col col-md-6">
                                    <a class="btn btn-warning float-right" href="<?php echo base_url() ?>kategoripekerjaan">
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