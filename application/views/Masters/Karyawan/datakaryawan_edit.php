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
                    <li><a href="<?php echo base_url() ?>datakaryawan"><?php echo $title2 ?></a></li>
                    <li class="active"><a href="<?php echo base_url() ?>datakaryawan/editkaryawan"><?php echo $title3 ?></a></li>
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
                        <form action="<?php echo base_url() ?>datakaryawan/updatekaryawan" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <div class="row form-group">
                                <input type="hidden" name="id_kar" value="<?php echo $id_kar ?>">
                                <div class="col col-md-4">
                                    <label for="nama_kar"><h6>Nama</h6></label>
                                    <input type="text" id="nama_kar" name="nama_kar" placeholder="Nama" class="form-control" value="<?php echo $nama_kar ?>" required>
                                </div>
                                <div class="col col-md-4">
                                    <label for="no_hp"><h6>Bagian</h6></label>
                                    <select name="bagian_id" class="form-control" required>
                                        <option value="">-- Pilih Bagian --</option>
                                        <?php                                
                                        foreach ($data_bag as $row)
                                        {  
                                            if ($row->id_bag == $bagian_id){
                                                echo "<option value='".$row->id_bag."' selected='selected'>".$row->nama_bag."</option>";
                                            }else{
                                                echo "<option value='".$row->id_bag."'>".$row->nama_bag."</option>";
                                            }
                                        }
                                        echo"</select>" ?>
                                </div>
                                <div class="col col-md-4">
                                    <label for="hp_no"><h6>Nomor HP</h6></label>
                                    <input type="number" id="hp_no" name="hp_no" placeholder="Nomor HP" class="form-control" value="<?php echo $hp_no ?>">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-6">
                                    <label for="alamat" class="form-control-label"><h6>Alamat</h6></label>
                                    <textarea name="alamat" id="alamat" rows="5" placeholder="Alamat" class="form-control" required><?php echo $alamat ?></textarea>
                                </div>
                                <div class="col col-md-6">
                                    <label for="keterangan" class="form-control-label"><h6>Keterangan</h6></label>
                                    <textarea name="keterangan" id="keterangan" rows="5" placeholder="Keterangan" class="form-control"><?php echo $keterangan ?></textarea>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-6">
                                    <input type="submit" name="updatekaryawan" class="btn btn-primary" value="Update">
                                </div>
                                <div class="col col-md-6">
                                    <a class="btn btn-warning float-right" href="<?php echo base_url() ?>datakaryawan">
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