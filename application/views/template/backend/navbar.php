<div class="navbar-header">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-bars"></i>
    </button>
    <a class="navbar-brand" href="./"><span class="logo-lg"><b>Reka</b>System</span></a>
    <a class="navbar-brand hidden" href="./"><span class="logo-mini"><b>R</b></span></a>
</div>

<div id="main-menu" class="main-menu collapse navbar-collapse">
    <ul class="nav navbar-nav">
        <li>
            <a href="<?php echo base_url() ?>dashboard"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
        </li>
        <!-- /.menu-title -->
        <h3 class="menu-title">Data</h3>
        <li class="menu-item-has-children dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="menu-icon ti ti-package"></i>Master Data</a>
            <ul class="sub-menu children dropdown-menu">
                <li><i class="ti ti-package"></i><a href="<?php echo base_url() ?>dataproyek">Data Proyek</a></li>
                <li><i class="ti ti-package"></i><a href="<?php echo base_url() ?>kategorimaterial">Data Kategori Material</a></li>
                <li><i class="ti ti-package"></i><a href="<?php echo base_url() ?>datamaterial">Data Material</a></li>
                <li><i class="ti ti-package"></i><a href="<?php echo base_url() ?>kategoripekerjaan">Data Kategori Pekerjaan</a></li>
                <li><i class="ti ti-package"></i><a href="<?php echo base_url() ?>datapekerjaan">Data Pekerjaan</a></li>
                <li><i class="ti ti-package"></i><a href="<?php echo base_url() ?>datapekerja">Data Pekerja</a></li>
                <li><i class="ti ti-package"></i><a href="<?php echo base_url() ?>datacustomer">Data Customer</a></li>
                <li><i class="ti ti-package"></i><a href="<?php echo base_url() ?>datasupplier">Data Supplier</a></li>
                <li><i class="ti ti-package"></i><a href="<?php echo base_url() ?>datakaryawan">Data Karyawan</a></li>
                <li><i class="ti ti-package"></i><a href="<?php echo base_url() ?>datatyperumah">Data Type Rumah</a></li>
                <li><i class="ti ti-package"></i><a href="<?php echo base_url() ?>dataunitrumah">Data Unit Rumah</a></li>
                <li><i class="ti ti-package"></i><a href="<?php echo base_url() ?>rabmaterialbytype">RAB Material Type Rumah</a></li>
                <li><i class="ti ti-package"></i><a href="<?php echo base_url() ?>rabmaterialbyunit">RAB Material Unit Rumah</a></li>
                <li><i class="ti ti-package"></i><a href="<?php echo base_url() ?>rabpekerjaanbytype">RAB Pekerjaan Type Rumah</a></li>
                <li><i class="ti ti-package"></i><a href="<?php echo base_url() ?>rabpekerjaanbyunit">RAB Pekerjaan Unit Rumah</a></li>
            </ul>
        </li>
        <li class="menu-item-has-children dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="menu-icon fa fa-laptop"></i>Transaksi</a>
            <ul class="sub-menu children dropdown-menu">
                <li><i class="fa fa-exchange"></i><a href="<?php echo base_url() ?>transaksipembelian">Pembelian Material</a></li>
                <li><i class="fa fa-exchange"></i><a href="<?php echo base_url() ?>pemakaianmaterial">Pemakaian Material</a></li>
                <li><i class="fa fa-exchange"></i><a href="<?php echo base_url() ?>opnameprogress">Opname Progress</a></li>
                <li><i class="fa fa-exchange"></i><a href="<?php echo base_url() ?>stockmaterial">Stock Material</a></li>
            </ul>
        </li>
        <h3 class="menu-title">Users</h3>
        <li class="menu-item">
            <a href="<?php echo base_url() ?>users" aria-haspopup="true" aria-expanded="false"><i class="menu-icon fa fa-user"></i>Data Pengguna</a>
        </li>
        <!-- /.menu-title -->
    </ul>
</div><!-- /.navbar-collapse -->
