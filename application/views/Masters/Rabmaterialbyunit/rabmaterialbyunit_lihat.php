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
                    <li><a href="<?php echo base_url() ?>rabmaterialbyunit"><?php echo $title2 ?></a></li>
                    <li class="active"><a href="<?php echo base_url() ?>rabmaterialbyunit/lihatrabmaterialbyunit"><?php echo $title3 ?></a></li>
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
                            <a class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal_add_material">
                                <i class="fa fa-plus"></i>&nbsp; Tambah Material
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Material</th>
                                    <th>Quantity</th>
                                    <th>Harga</th>
                                    <th>Total Harga</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sumprice = 0;
                                    foreach($data->result_array() as $k):
                                        $unit_id = $k['id_unit'];
                                        $material_id = $k['material_id'];
                                        $nama_brg = $k['nama_brg'];
                                        $qty = $k['qty'];
                                        $price = $k['price'];
                                        $priceqty = $price*$qty;
                                        $sumprice+= $priceqty;
                                ?>
                                <tr>
                                    <td><?php echo $nama_brg ?></td>
                                    <td align='right'><?php echo number_format($qty,0); ?></td>
                                    <td align='right'><?php echo 'Rp. '.number_format($price,0); ?></td>
                                    <td align='right'><?php echo 'Rp. '.number_format($priceqty,0); ?></td>
                                    <td>
                                        <a href="<?php echo base_url('index.php/rabmaterialbyunit/hapusrabmaterialbyunit/'.$k['id_rmbu']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda benar-benar akan menghapus Data?')">
                                        <span class="fa fa-trash"></span> Hapus
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                        Total Biaya: Rp. <?php echo number_format($sumprice,0) ?>
                        <div class="box-tools pull-right">
                            <a href="<?php echo base_url('index.php/rabmaterialbyunit/') ?>" class="btn btn-warning">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ============ MODAL ADD MATERIAL =============== -->
<div class="modal fade" id="modal_add_material" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <div class="float-left">
            <h3 class="modal-title" id="myModalLabel">Tambah Material</h3>
        </div>
        <div class="float-right">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        </div>
    </div>

    <form class="form-horizontal" method="post" action="<?php echo base_url() ?>index.php/rabmaterialbyunit/simpanrabmaterialbyunit">
        <div class="modal-body">
            <div class="row form-group">
                <div class="col col-md-2">
                    <label class="control-label col-xs-3">Unit</label>
                </div>
                <div class="col col-md-10">
                    <select name="unit_id1" class="form-control" disabled>
                        <option value="">-- Pilih Unit --</option>
                        <?php                                
                        foreach ($data_unit as $row)
                        {  
                            if ($row->id_unit == $unit_id){
                                echo "<option value='".$row->id_unit."' selected='selected'>".$row->alamat."</option>";
                            }else{
                                echo "<option value='".$row->id_unit."'>".$row->alamat."</option>";
                            }
                        }
                        echo"</select>" ?>
                        <input type="hidden" name="unit_id" value="<?php echo $unit_id ?>"/>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-2">
                    <label class="control-label col-xs-3">Material</label>
                </div>
                <div class="col col-md-10">
                    <select id="material_id1" name="material_id1" class="form-control" required>
                        <option value="">-- Pilih Material --</option>
                        <?php                                
                        foreach ($data_material as $row)
                        {  
                            printf("<option value='%s|%s'>%s</option>",$row->id,$row->harga,$row->nama_brg);
                        }
                        echo"</select>" ?>
                        <input type="hidden" name="material_id" id="material_id" value=""/>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-2">
                    <label class="control-label col-xs-3">Quantity</label>
                </div>
                <div class="col col-md-10">
                    <input type="number" name="qty" class="form-control" placeholder="Quantity" required>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-2">
                    <label class="control-label col-xs-3">Harga</label>
                </div>
                <div class="col col-md-10">
                    <input type="number" id="price" name="price" class="form-control" placeholder="Harga" readonly>
                </div>
            </div>
        </div>

        <div class="modal-footer">
            <input type="submit" name="simpanrabmaterialbyunit" class="btn btn-primary" value="Simpan">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
        </div>
    </form>
    </div>
    </div>
</div>
<!--END MODAL ADD MATERIAL-->

<script src="<?php echo base_url().'assets/modal/js/jquery-2.2.4.min.js'?>"></script>
<script src="<?php echo base_url().'assets/modal/js/bootstrap.js'?>"></script>
<script src="<?php echo base_url().'assets/modal/js/jquery.dataTables.min.js'?>"></script>
<script src="<?php echo base_url().'assets/modal/js/moment.js'?>"></script>
<script>
    $(document).ready(function(){
        $('#mydata').DataTable();
    });
</script>
<script type="text/javascript">
    $(function(){
        $("#material_id1").change(function(){
            var dtval = this.value;
            var arval = dtval.split('|');
            var idval = arval[0];
            var hrval = arval[1];
            $("#material_id").val(idval);
            $("#price").val(hrval);
        });
    });
</script>