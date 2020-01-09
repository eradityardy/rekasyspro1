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
                    <li><a href="<?php echo base_url() ?>stockmaterial"><?php echo $title2 ?></a></li>
                    <li class="active"><a href="<?php echo base_url() ?>stockmaterial/tambahstock"><?php echo $title3 ?></a></li>
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
                        <form action="<?php echo base_url() ?>stockmaterial/simpanstock" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <div class="row form-group">
                                <div class="col col-md-6">
                                    <label for="gudang_id"><h6>Gudang</h6></label>
                                    <select name="gudang_id" class="form-control" required>
                                        <option value="">-- Pilih Gudang --</option>
                                        <?php                                
                                        foreach ($data_gud as $row) {  
                                            echo "<option value='".$row->id_gud."'>".$row->nama_gud."</option>";
                                            }
                                            echo"</select>"
                                        ?>
                                </div>
                                <div class="col col-md-6">
                                    <label for="supplier_id"><h6>Supplier</h6></label>
                                    <select name="supplier_id" class="form-control" required>
                                        <option value="">-- Pilih Supplier --</option>
                                        <?php                                
                                        foreach ($data_sup as $row) {  
                                            echo "<option value='".$row->id."'>".$row->nama."</option>";
                                            }
                                            echo"</select>"
                                        ?>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-6">
                                    <label for="material_id"><h6>Material</h6></label>
                                    <select name="material_id" class="form-control" required>
                                        <option value="">-- Pilih Material --</option>
                                        <?php                                
                                        foreach ($data_mat as $row) {  
                                            echo "<option value='".$row->id."'>".$row->nama_brg."</option>";
                                            }
                                            echo"</select>"
                                        ?>
                                </div>
                                <div class="col col-md-6">
                                    <label for="qty_stock"><h6>Stock Material</h6></label>
                                    <input type="number" id="qty_stock" name="qty_stock" placeholder="Jumlah Stock" class="form-control" required>
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
                                    <a class="btn btn-warning float-right" href="<?php echo base_url() ?>stockmaterial">
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