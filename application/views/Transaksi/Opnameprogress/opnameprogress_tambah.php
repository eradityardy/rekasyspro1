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
                    <li><a href="<?php echo base_url() ?>opnameprogress"><?php echo $title2 ?></a></li>
                    <li class="active"><a href="<?php echo base_url() ?>opnameprogress/tambahprogress"><?php echo $title3 ?></a></li>
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
                        <form action="<?php echo base_url() ?>opnameprogress/simpanprogress" method="post" class="form-horizontal">
                            <div class="row form-group">
                                <div class="col col-md-6">
                                    <label for="tgl_progress"><h6>Tanggal Pengerjaan</h6></label>
                                    <input type="date" id="tgl_progress" name="tgl_progress" class="form-control" required>
                                </div>
                                <div class="col col-md-6">
                                    <label for="unit_id1"><h6>Unit Rumah</h6></label>
                                    <select name="unit_id1" id="unit_id1" class="form-control" required>
                                        <option value="">-- Unit Rumah --</option>
                                        <?php                                
                                        foreach ($data_unit as $row)
                                        {  
                                            printf("<option value='%s|%s|%s|%s|%s'>%s - %s</option>",$row->id,$row->unit_id,$row->pekerjaan_id,$row->pekerjaan,$row->price,$row->alamat,$row->pekerjaan);
                                        }
                                        echo"</select>" ?>
                                        <input type="hidden" name="rpbu_id" id="rpbu_id" value="">
                                        <input type="hidden" name="unit_id" id="unit_id" value="">
                                </div>
                            </div>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Pekerjaan</th>
                                        <th>Persentase</th>
                                        <th>Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <input type="text" id="pekerjaan_id1" name="pekerjaan_id1" class="form-control" Readonly>
                                            <input type="hidden" id="pekerjaan_id" name="pekerjaan_id" class="form-control" value="">
                                        </td>
                                        <td>
                                            <input type="number" id="persentase" name="persentase" class="form-control" min="0" max="100" required>
                                        </td>
                                        <td>
                                            <input type="number" id="price" name="price" class="form-control" Readonly>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="form-group">
                                <div class="float-right">
                                    <a class="btn btn-warning float-right" href="<?php echo base_url() ?>opnameprogress">
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
            $("#rpbu_id").val(idval);
            $("#unit_id").val(hrval);
            $("#pekerjaan_id").val(ioval);
            $("#pekerjaan_id1").val(xyval);
            $("#price").val(abval);
        });
    });
</script>