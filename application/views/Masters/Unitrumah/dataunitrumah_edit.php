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
                    <li><a href="<?php echo base_url() ?>dataunitrumah"><?php echo $title2 ?></a></li>
                    <li class="active"><a href="<?php echo base_url() ?>dataunitrumah/editunitrumah"><?php echo $title3 ?></a></li>
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
                        <form action="<?php echo base_url() ?>dataunitrumah/updateunitrumah" method="post" class="form-horizontal">
                            <div class="row form-group">
                                <input type="hidden" name="id_unit" value="<?php echo $id_unit ?>">
                                <div class="col col-md-6">
                                    <label for="proyek_id"><h6>Proyek</h6></label>
                                    <select name="proyek_id" class="form-control" required>
                                        <option value="">-- Pilih Proyek --</option>
                                        <?php                                
                                        foreach ($data_pro as $row)
                                        {  
                                            if ($row->id_pro == $proyek_id){
                                                echo "<option value='".$row->id_pro."' selected='selected'>".$row->nama_pro."</option>";
                                            }else{
                                                echo "<option value='".$row->id_pro."'>".$row->nama_pro."</option>";
                                            }
                                        }
                                        echo"</select>" ?>
                                </div>
                                <div class="col col-md-6">
                                    <label for="type_id"><h6>Type Rumah</h6></label>
                                    <select name="type_id" class="form-control" required>
                                        <option value="">-- Pilih Type Rumah --</option>
                                        <?php                                
                                        foreach ($data_type as $row)
                                        {  
                                            if ($row->id_type == $type_id){
                                                echo "<option value='".$row->id_type."' selected='selected'>".$row->nama_type."</option>";
                                            }else{
                                                echo "<option value='".$row->id_type."'>".$row->nama_type."</option>";
                                            }
                                        }
                                        echo"</select>" ?>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-12">
                                    <label for="alamat" class="form-control-label"><h6>Alamat</h6></label>
                                    <textarea name="alamat" id="alamat" rows="3" placeholder="Alamat" class="form-control" required><?php echo $alamat ?></textarea>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-6">
                                    <label for="luas_bangunan"><h6>Luas Bangunan</h6></label>
                                    <input type="text" id="luas_bangunan" name="luas_bangunan" placeholder="Luas Bangunan" class="form-control" value="<?php echo $luas_bangunan ?>" required>
                                </div>
                                <div class="col col-md-6">
                                    <label for="luas_tanah"><h6>Luas Tanah</h6></label>
                                    <input type="text" id="luas_tanah" name="luas_tanah" placeholder="Luas Tanah" class="form-control" value="<?php echo $luas_tanah ?>" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-4">
                                    <label for="pekerja_id"><h6>Pekerja</h6></label>
                                    <select name="pekerja_id" class="form-control" required>
                                        <option value="">-- Pekerja --</option>
                                        <?php                                
                                        foreach ($data_pek as $row)
                                        {  
                                            if ($row->id_pek == $pekerja_id){
                                                echo "<option value='".$row->id_pek."' selected='selected'>".$row->nama_pek."</option>";
                                            }else{
                                                echo "<option value='".$row->id_pek."'>".$row->nama_pek."</option>";
                                            }
                                        }
                                        echo"</select>" ?>
                                </div>
                                <div class="col col-md-4">
                                    <label for="status_pekerjaan"><h6>Status Pekerjaan</h6></label>
                                    <select name="status_pekerjaan" class="form-control" required>
                                        <option value="">-- Pilih Status Pekerjaan --</option>
                                        <option>Standar</option>
                                        <option>Perluasan/Penambahan</option>
                                    </select>
                                </div>
                                <div class="col col-md-4">
                                    <label for="status_progress"><h6>Status Progress</h6></label>
                                    <select name="status_progress" class="form-control" required>
                                        <option value="">-- Pilih Status Progress --</option>
                                        <option>Progress</option>
                                        <option>Selesai</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-6">
                                    <label for="customer_id"><h6>Customer</h6></label>
                                    <select name="customer_id" class="form-control" required>
                                        <option value="">-- Pilih Customer --</option>
                                        <?php                                
                                        foreach ($data_cus as $row)
                                        {  
                                            if ($row->id_cus == $customer_id){
                                                echo "<option value='".$row->id_cus."' selected='selected'>".$row->nama_cus."</option>";
                                            }else{
                                                echo "<option value='".$row->id_cus."'>".$row->nama_cus."</option>";
                                            }
                                        }
                                        echo"</select>" ?>
                                </div>
                                <div class="col col-md-6">
                                    <label for="status_beli"><h6>Status Beli</h6></label>
                                    <select name="status_beli" class="form-control" required>
                                        <option value="">-- Pilih Status Pembelian --</option>
                                        <option>Booking</option>
                                        <option> </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-4">
                                    <label for="mulai_bangun"><h6>Mulai Bangun</h6></label>
                                    <input type="date" id="mulai_bangun" name="mulai_bangun" placeholder="Mulai Bangun" class="form-control" value="<?php echo $mulai_bangun ?>" required>
                                </div>
                                <div class="col col-md-4">
                                    <label for="selesai_bangun"><h6>Selesai Bangun</h6></label>
                                    <input type="date" id="selesai_bangun" name="selesai_bangun" placeholder="Selesai Bangun" class="form-control" value="<?php echo $selesai_bangun?>">
                                </div>
                                <div class="col col-md-4">
                                    <label for="tst_kunci"><h6>Serah Terima Kunci</h6></label>
                                    <input type="date" id="tst_kunci" name="tst_kunci" placeholder="Luas Tanah" class="form-control" value="<?php echo $tst_kunci ?>" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-12">
                                    <label for="keterangan" class="form-control-label"><h6>Keterangan</h6></label>
                                    <textarea name="keterangan" id="keterangan" rows="3" placeholder="Keterangan" class="form-control" required><?php echo $keterangan ?></textarea>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-6">
                                    <input type="submit" name="updateunitrumah" class="btn btn-primary" value="Update">
                                </div>
                                <div class="col col-md-6">
                                    <a class="btn btn-warning float-right" href="<?php echo base_url() ?>dataunitrumah">
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