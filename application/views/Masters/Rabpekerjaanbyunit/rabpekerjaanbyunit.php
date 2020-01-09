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
                    <li class="active"><a href="<?php echo base_url() ?>rabpekerjaanbyunit"><?php echo $title2 ?></a></li>
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
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Proyek</th>
                                    <th>Alamat</th>
                                    <th>Customer</th>
                                    <th>Akumulasi Biaya</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no=0;
                                    $pemakaian = 0;
                                    foreach ($rabpekerjaanbyunit->result_array() as $k) { $no++; 
                                        $sumprice = $k['sum_rab']
                                ?>
                                <tr>
                                <td><?php echo $no ?></td>
                                <td><?php echo $k['nama_pro']; ?></td>
                                <td><?php echo $k['alamat']; ?></td>
                                <td><?php echo $k['nama_cus']; ?></td>
                                <td align='right'><?php echo 'Rp. '.number_format($sumprice,2); ?></td>
                                <td>
                                    <a href="<?php echo base_url('index.php/rabpekerjaanbyunit/lihatrabpekerjaanbyunit/'.$k['id_unit']) ?>" class="btn btn-sm btn-primary">
                                    <span class="fa fa-eye"></span> Lihat
                                    </a>
                                </td>
                                </tr>
                                </tbody>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>