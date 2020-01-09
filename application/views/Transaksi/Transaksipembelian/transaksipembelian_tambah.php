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
                    <li><a href="<?php echo base_url() ?>transaksipembelian"><?php echo $title2 ?></a></li>
                    <li class="active"><a href="<?php echo base_url() ?>transaksipembelian/tambahtransaksi"><?php echo $title3 ?></a></li>
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
                        <form id="form_master" class="form-horizontal">
                            <div id="tampil_hasil"></div>
                            <div class="row form-group">
                                <div class="col col-md-6">
                                    <label for="no_faktur"><h6>No Faktur</h6></label>
                                    <input type="text" id="no_faktur1" name="no_faktur" placeholder="Nomor Faktur" class="form-control" required>
                                </div>
                                <div class="col col-md-4">
                                    <label for="tgl_beli"><h6>Tanggal Pembelian</h6></label>
                                    <input type="date" id="tgl_beli" name="tgl_beli" class="form-control" required>
                                </div>
                                <div class="col col-md-2">
                                    <label for="jatuh_tempo"><h6>Batas Tempo</h6></label>
                                    <input type="number" id="jatuh_tempo" name="jatuh_tempo" class="form-control" placeholder="Jumlah Hari Jatuh Tempo Bayar">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-6">
                                    <label for="gudang_id"><h6>Gudang</h6></label>
                                    <select name="gudang_id" id="gudang_id" class="form-control" required>
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
                                    <select name="supplier_id" id="supplier_id" class="form-control" required>
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
                                <div class="col col-md-12">
                                    <label for="keterangan" class="form-control-label"><h6>Keterangan</h6></label>
                                    <textarea name="keterangan" id="keterangan" rows="5" placeholder="Keterangan" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="float-left">
                                    <button id="submit" class="btn btn-primary">
                                        Simpan
                                    </button>
                                </div>
                                <div class="float-right">
                                    <a class="btn btn-warning float-right" href="<?php echo base_url() ?>transaksipembelian">
                                        Kembali
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Tabel Detail</strong>
                    </div>
                    <div class="card-body">
                        <form id="form_detail" class="form-horizontal">
                            <div id="tampil_hasil_detail"></div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="material_id1"><h6>Material</h6></label>
                                    <select name="material_id1" id="material_id1" class="form-control" required>
                                        <option value="">-- Pilih Material --</option>
                                        <?php                                
                                        foreach ($data_mat as $row)
                                        {  
                                            printf("<option value='%s|%s'>%s</option>",$row->id,$row->harga,$row->nama_brg);
                                        }
                                        echo"</select>" ?>
                                        <input type="hidden" name="material_id" id="material_id" value="">
                                        <input type="hidden" name="no_faktur" id="no_faktur" value="">
                                        <input type="hidden" name="supplier_id1" id="supplier_id1" value="">
                                </div>
                                <div class="col col-md-2">
                                    <label for="qty"><h6>Quantity</h6></label>
                                    <input type="number" id="qty" name="qty" class="form-control" min="0" placeholder="Qty" required>
                                </div>
                                <div class="col col-md-3">
                                    <label for="price"><h6>Harga</h6></label>
                                    <input type="number" id="price" name="price" class="form-control" placeholder="Harga" Readonly>
                                </div>
                                <div class="col col-md-4">
                                    <label for="stock_id"><h6>Total Harga</h6></label>
                                    <input type="number" id="tot_price" name="tot_price" class="form-control" placeholder="Total" Readonly>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-6"> 
                                    <div class="float-left">
                                        <button id="submitdetail" class="btn btn-success">
                                            Simpan
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <table class="table table-bordered" id="table_detail">
                            <thead>
                                <tr>
                                    <th>Material</th>
                                    <th>Quantity</th>
                                    <th>Harga</th>
                                </tr>
                            </thead>
                            <tbody id="list_material">
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" language="javascript">
    $(document).ready(function() {
        //untuk simpan master
        $("#submit").click(function(){
            $.ajax({
                url : "<?php echo base_url(); ?>index.php/Transaksipembelian/simpantransaksi", 
                type: "POST", 
                data: $("#form_master").serialize(),
                success: function(data)
                {
                    $('#tampil_hasil').html(data);
                }
            });
            return false;
        });

        $("#no_faktur1").change(function()
        { 
            var nof = this.value;
            var url = "<?php echo base_url(); ?>index.php/Transaksipembelian/CheckFaktur";
            $.post(url,{no_faktur: nof}, function(data, status){
                if (data > 0){
                    alert("No Faktur : " + nof + " sudah ada!");
                }
            });
        });

        //untuk simpan detail
        $("#table_detail").hide();
        $(document).on('click','#submitdetail',function(){
            $("#table_detail").show();
            var gudangId = $("#gudang_id").val();
            $.ajax({
                url : "<?php echo base_url(); ?>index.php/Transaksipembelian/simpandetail/"+gudangId, 
                type: "POST", 
                data: $("#form_detail").serialize(),
                success: function(data)
                {
                    $('#list_material').html(data);
                }
            });
            return false;
        });

        //untuk load list barang di awal
        $('#list_material').load("<?php echo base_url();?>index.php/Transaksipembelian/tampilkantabel");

        $(document).on('change','#material_id1',function() {
            var dtval = this.value;
            var arval = dtval.split('|');
            var idval = arval[0];
            var hrval = arval[1];
            $("#material_id").val(idval);
            $("#price").val(hrval);
        });

        $(document).on('change','#supplier_id',function() {
            var supplier = parseInt($('#supplier_id').val());
            $('#supplier_id1').val(supplier);
        });

        $(document).on('keyup','#qty',function() {
            var qty1 = parseInt($('#qty').val());
            var price1 = parseInt($('#price').val());

            var tot = qty1*price1;
            $('#tot_price').val(tot);
        });

        $(document).on('keyup','#no_faktur1',function() {
            var no_fakturm = parseInt($('#no_faktur1').val());
            $('#no_faktur').val(no_fakturm);
        });
    });
</script>
