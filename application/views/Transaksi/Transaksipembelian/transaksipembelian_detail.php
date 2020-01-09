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
                    <li class="active"><a href="<?php echo base_url() ?>transaksipembelian/lihattransaksi"><?php echo $title3 ?></a></li>
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
                        <div class="float-left">
                            <strong class="card-title"><?php echo $no_faktur ?></strong> <br>
                            <div class="card-title"><?php echo $nama_gud ?></div>
                        </div>
                        <div class="float-right">
                            <strong class="card-title"><?php echo $tgl_beli ?></strong> <br>
                            <div class="card-title"><?php echo $nama ?></div>
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
                                </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                        <div class="float-left">
                            Total Harga: <?php echo 'Rp. '.number_format($total,0) ?>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-warning float-right" href="<?php echo base_url() ?>transaksipembelian">
                                Kembali
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>