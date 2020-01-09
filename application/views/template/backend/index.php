<!DOCTYPE html>
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
            <?php echo $navbarnya; ?>
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">
            <?php echo $headernya; ?>
        </header><!-- /header -->
        
        <!-- Konten -->
            <?php echo $contentnya; ?>
        <!-- /Konten -->

    </div><!-- /#right-panel -->

    <!-- Right Panel -->
    <script src="<?php echo base_url ('assets/vendors/jquery/dist/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url ('assets/vendors/popper.js/dist/umd/popper.min.js') ?>"></script>
    <script src="<?php echo base_url ('assets/vendors/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url ('assets/js/main.js') ?>"></script>
    
</body>
</html>