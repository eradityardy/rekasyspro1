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
                    <li class="active"><a href="<?php echo base_url() ?>transaksipembelian/edittransaksi"><?php echo $title3 ?></a></li>
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
                                <input type="hidden" name="id_tbm" value="<?php echo $id_tbm ?>">
                                <div class="col col-md-6">
                                    <label for="no_faktur"><h6>No Faktur</h6></label>
                                    <input type="text" id="no_faktur" name="no_faktur" placeholder="Nomor Faktur" class="form-control" value="<?php echo $no_faktur ?>" Readonly>
                                </div>
                                <div class="col col-md-4">
                                    <label for="tgl_beli"><h6>Tanggal Pembelian</h6></label>
                                    <input type="date" id="tgl_beli" name="tgl_beli" class="form-control" value="<?php echo $tgl_beli ?>" required>
                                </div>
                                <div class="col col-md-2">
                                    <label for="jatuh_tempo"><h6>Batas Tempo</h6></label>
                                    <input type="number" id="jatuh_tempo" name="jatuh_tempo" class="form-control" placeholder="Jumlah Hari Jatuh Tempo Bayar" value="<?php echo $jatuh_tempo ?>">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-6">
                                    <label for="gudang_id"><h6>Gudang</h6></label>
                                    <select name="gudang_id" id="gudang_id" class="form-control" Readonly>
                                        <option value="">-- Pilih Gudang --</option>
                                        <?php                                
                                        foreach ($data_gud as $row)
                                        {  
                                            if ($row->id_gud == $gudang_id){
                                                echo "<option value='".$row->id_gud."' selected='selected'>".$row->nama_gud."</option>";
                                            }else{
                                                echo "<option value='".$row->id_gud."'>".$row->nama_gud."</option>";
                                            }
                                        }
                                        echo"</select>" ?>
                                </div>
                                <div class="col col-md-6">
                                    <label for="supplier_id"><h6>Supplier</h6></label>
                                    <select name="supplier_id" id="supplier_id" class="form-control" required>
                                        <option value="">-- Pilih Supplier --</option>
                                        <?php                                
                                        foreach ($data_sup as $row)
                                        {  
                                            if ($row->id == $supplier_id){
                                                echo "<option value='".$row->id."' selected='selected'>".$row->nama."</option>";
                                            }else{
                                                echo "<option value='".$row->id."'>".$row->nama."</option>";
                                            }
                                        }
                                        echo"</select>" ?>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-12">
                                    <label for="keterangan" class="form-control-label"><h6>Keterangan</h6></label>
                                    <textarea name="keterangan" id="keterangan" rows="5" placeholder="Keterangan" class="form-control"><?php echo $keterangan ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="float-left">
                                    <button id="update" class="btn btn-primary">
                                        Update
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
                                <div class="col col-md-5">
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
                                        <input type="hidden" name="no_faktur" id="no_faktur2" value="">
                                        <input type="hidden" name="supplier_id1" id="supplier_id1" value="">
                                </div>
                                <div class="col col-md-3">
                                    <label for="qty"><h6>Quantity</h6></label>
                                    <input type="text" id="qty26" name="qty" class="form-control" min="0" placeholder="Qty" required>
                                </div>
                                <div class="col col-md-4">
                                    <label for="price"><h6>Harga</h6></label>
                                    <input type="number" id="price" name="price" class="form-control" placeholder="Harga" Readonly>
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
                            <tbody id="list-material">
                                <?php
                                    foreach($data_detail->result_array() as $k):
                                        $material_id = $k['material_id'];
                                        $nama_brg = $k['nama_brg'];
                                        $qty = $k['qty'];
                                        $price = $k['price'];
                                        $sub_total = $k['sub_total'];
                                ?>
                                <tr>
                                    <td><?php echo $nama_brg ?></td>
                                    <td align='right'><?php echo number_format($qty,0); ?></td>
                                    <td align='right'><?php echo 'Rp. '.number_format($price,0); ?></td>
                                    <td align='right'><?php echo 'Rp. '.number_format($sub_total,0); ?></td>
                                    <td>
                                        <a href="<?php echo base_url('index.php/transaksipembelian/hapusdetail/'.$k['id_tbd']) ?>" class="btn btn-danger" onclick="return confirm('Apakah anda benar-benar akan menghapus Data?')">
                                            <span class="fa fa-trash"></span> Hapus
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach;?>
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
        //untuk update master
        $("#update").click(function() {
            $.ajax({
                url : "<?php echo base_url(); ?>index.php/Transaksipembelian/updatemaster", 
                type: "POST", 
                data: $("#form_master").serialize(),
                success: function(data)
                {
                    $('#tampil_hasil').html(data);
                    document.getElementById('no_faktur2').value = document.getElementById('no_faktur').value;
                    document.getElementById('supplier_id1').value = document.getElementById('supplier_id').value;
                }
            });
            return false;
        });

        //untuk simpan detail
        $(document).on('click','#submitdetail',function(){
            var nofaknofak = $("#no_faktur2").val();
            if (nofaknofak == 0)
            {
                alert("Update Master Terlebih Dahulu!")
            }
            else
            {
                var gudangId = $("#gudang_id").val();
                $.ajax({
                    url : "<?php echo base_url(); ?>index.php/Transaksipembelian/updatedetail/"+gudangId, 
                    type: "POST", 
                    data: $("#form_detail").serialize(),
                    success: function(data)
                    {
                        alert("Data Material sudah Berhasil Tersimpan!")
                    }
                });
                return false;
            }
        });

        //untuk pemilihan material
        $(document).on('change','#material_id1',function() {
            var dtval = this.value;
            var arval = dtval.split('|');
            var idval = arval[0];
            var hrval = arval[1];
            $("#material_id").val(idval);
            $("#price").val(hrval);
        });
    });
</script>