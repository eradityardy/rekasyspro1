<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Rekasys</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="<?php echo base_url ('assets/vendors/bootstrap/dist/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url ('assets/vendors/font-awesome/css/font-awesome.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url ('assets/vendors/themify-icons/css/themify-icons.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url ('assets/vendors/flag-icon-css/css/flag-icon.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url ('assets/vendors/selectFX/css/cs-skin-elastic.css') ?>">

    <link rel="stylesheet" href="<?php echo base_url ('assets/css/style.css') ?>">
    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url ('assets/css/bootstrap-select.css') ?>">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- jQuery 2.2.3 -->
    <script src="<?php echo base_url() ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src=".<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="<?php echo base_url() ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url() ?>assets/plugins/fastclick/fastclick.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/bootstrap/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.js"></script>
</head>

<body>
    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

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
                            <li><i class="ti ti-loop"></i><a href="<?php echo base_url() ?>transaksipembelian">Pembelian Item</a></li>
                            <li><i class="ti ti-loop"></i><a href="<?php echo base_url() ?>pemakaianmaterial">Pemakaian Material</a></li>
                            <li><i class="ti ti-loop"></i><a href="<?php echo base_url() ?>opnameprogress">Opname Progress</a></li>
                        </ul>
                    </li>
                    <h3 class="menu-title">Users</h3>
                    <li class="menu-item">
                        <a href="<?php echo base_url() ?>users" aria-haspopup="true" aria-expanded="false"><i class="menu-icon fa fa-user"></i>Data Pengguna</a>
                    </li>
                    <!-- /.menu-title -->
                </ul>
            </div><!-- /.navbar-collapse -->
            
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">
            <div class="header-menu">
                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                    
                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="<?php echo base_url ('assets/images/avatar.png') ?>" alt="User Avatar">
                        </a>
                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="#"><i class="fa fa-user"></i> My Profile</a>
                            <a class="nav-link" href="<?php echo base_url() ?>auth/logout"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </header><!-- /header -->
        
        <!-- Konten -->
            <?php $this->load->view($konten); ?>
        <!-- /Konten -->

    </div><!-- /#right-panel -->

    <!-- Right Panel -->
    <script src="<?php echo base_url ('assets/vendors/jquery/dist/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url ('assets/vendors/popper.js/dist/umd/popper.min.js') ?>"></script>
    <script src="<?php echo base_url ('assets/vendors/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url ('assets/js/main.js') ?>"></script>
    
</body>
</html>
