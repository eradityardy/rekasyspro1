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
                    <li><a href="<?php echo base_url() ?>pemakaianmaterial"><?php echo $title2 ?></a></li>
                    <li class="active"><a href="<?php echo base_url() ?>pemakaianmaterial/tambahpemakaian"><?php echo $title3 ?></a></li>
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
                        <form action="<?php echo base_url() ?>pemakaianmaterial/simpanpemakaian" method="post" class="form-horizontal">
                            <div class="row form-group">
                                <div class="col col-md-6">
                                    <label for="tgl_pake"><h6>Tanggal Pemakaian</h6></label>
                                    <input type="date" id="tgl_pake" name="tgl_pake" class="form-control" required>
                                </div>
                                <div class="col col-md-6">
                                    <label for="unit_id1"><h6>Unit Rumah</h6></label>
                                    <select name="unit_id1" id="unit_id1" class="form-control" required>
                                        <option value="">-- Unit Rumah --</option>
                                        <?php                                
                                        foreach ($data_unit as $row)
                                        {  
                                            printf("<option value='%s|%s|%s|%s|%s|%s'>%s - %s</option>",$row->id_rmbu,$row->unit_id,$row->material_id,$row->nama_brg,$row->price,$row->qty,$row->alamat,$row->nama_brg);
                                        }
                                        echo"</select>" ?>
                                        <input type="hidden" name="rmbu_id" id="rmbu_id" value="">
                                        <input type="hidden" name="unit_id" id="unit_id" value="">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-12">
                                    <label for="stock_id1"><h6>Stock Material</h6></label>
                                    <select name="stock_id1" id="stock_id1" class="form-control" required>
                                        <option value="">-- Stock Material --</option>
                                        <?php                                
                                        foreach ($data_stock as $row)
                                        {  
                                            printf("<option value='%s|%s'>%s - %s - %s</option>",$row->id_stomat,$row->qty_stock,$row->nama_gud,$row->nama_brg,$row->nama);
                                        }
                                        echo"</select>" ?>
                                        <input type="hidden" name="stock_id" id="stock_id" value="">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-6">
                                    <label for="sisa_stock"><h6>Jumlah Stock</h6></label>
                                    <input type="number" id="sisa_stock" name="sisa_stock" class="form-control" readonly>
                                </div>
                                <div class="col col-md-6">
                                    <label for="sisa"><h6>Jumlah Anggaran Material</h6></label>
                                    <input type="number" id="sisa" name="sisa" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-12">
                                    <label><h6>*Jumlah pemakaian Material harus kurang dari jumlah Stock dan jumlah Anggaran*</h6></label>
                                </div>
                            </div>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Material</th>
                                        <th>Qty</th>
                                        <th>Harga</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <input type="text" id="material_id1" name="material_id" class="form-control" readonly>
                                            <input type="hidden" id="material_id" name="material_id" class="form-control" value="">
                                        </td>
                                        <td>
                                            <input type="number" id="qty" name="qty" class="form-control" required>
                                        </td>
                                        <td>
                                            <input type="number" id="price" name="price" class="form-control" readonly>
                                        </td>
                                        <td>
                                            <input type="number" id="tot_price" name="tot_price" class="form-control" readonly>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="form-group">
                                <div class="float-right">
                                    <a class="btn btn-warning float-right" href="<?php echo base_url() ?>pemakaianmaterial">
                                        Kembali
                                    </a>
                                </div>
                                <div class="float-left">
                                    <input type="submit" name="simpan" class="btn btn-primary" value="Simpan">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url().'assets/modal/js/jquery-2.2.4.min.js'?>"></script>
<script type="text/javascript">
    $(function(){
        $("#unit_id1").change(function(){
            var dtval = this.value;
            var arval = dtval.split('|');
            var idval = arval[0];
            var hrval = arval[1];
            var ioval = arval[2];
            var xyval = arval[3];
            var abval = arval[4];
            var alval = arval[5];
            $("#rmbu_id").val(idval);
            $("#unit_id").val(hrval);
            $("#material_id").val(ioval);
            $("#material_id1").val(xyval);
            $("#price").val(abval);
            $("#sisa").val(alval);
        });

        $("#stock_id1").change(function(){
            var akval = this.value;
            var adval = akval.split('|');
            var lsval = adval[0];
            var afval = adval[1];
            $("#stock_id").val(lsval);
            $("#sisa_stock").val(afval);
        });

        $('#qty').keyup(function(){
            //Ambil Nilai
            var qty1 = parseInt($('#qty').val());
            var sisa1 = parseInt($('#sisa').val());
            var sisa2 = parseInt($('#sisa_stock').val());
            var price1 = parseInt($('#price').val());

            //Perhitungan
            var sisamat = sisa1-qty1;
            var sisastok = sisa2-qty1;
            var totpak = qty1*price1;
            $('#sisa').val(sisamat);
            $('#sisa_stock').val(sisastok);
            $('#tot_price').val(totpak);
        });
    });
</script>