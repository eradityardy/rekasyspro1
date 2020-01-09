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
                    <li><a href="<?php echo base_url() ?>datapekerjaan"><?php echo $title2 ?></a></li>
                    <li class="active"><a href="<?php echo base_url() ?>datapekerjaan/tambahpekerjaan"><?php echo $title3 ?></a></li>
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
                        <form action="<?php echo base_url() ?>datapekerjaan/simpanpekerjaan" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <div class="row form-group">
                                <div class="col col-md-6">
                                    <label for="kategori"><h6>Kategori Pekerjaan</h6></label>
                                    <select name="kategori_id" class="form-control" required>
                                        <option value="">- Pilih Kategori -</option>
                                        <?php                                
                                        foreach ($data_katpek as $row) {  
                                            echo "<option value='".$row->id_katpek."'>".$row->kategori_pek."</option>";
                                            }
                                            echo"</select>"
                                        ?>
                                </div>
                                <div class="col col-md-6">
                                    <label for="kode"><h6>Pekerjaan</h6></label>
                                    <input type="text" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan" class="form-control" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-6">
                                    <label for="satuan"><h6>Satuan</h6></label>
                                    <input type="text" id="satuan" name="satuan" placeholder="Satuan" class="form-control" required>
                                </div>
                                <div class="col col-md-6">
                                    <label for="std_harga"><h6>Harga</h6></label>
                                    <input type="number" id="std_harga" name="std_harga" placeholder="Harga" class="form-control" required>
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
                                    <a class="btn btn-warning float-right" href="<?php echo base_url() ?>datapekerjaan">
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