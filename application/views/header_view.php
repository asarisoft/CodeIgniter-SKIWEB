<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sugawara Kadii Indonesia</title>
        <link rel="shortcut icon" type="image/x-icon" href = "<?php echo base_url('assets/img/icon.ico') ?>"  />
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url('assets/bootstrap-4.0/css/bootstrap.min.css') ?>">
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url('assets/font-awesome/css/font-awesome.min.css') ?>">
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url('assets/css/front.css') ?>">
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url('assets/css/animate.css') ?>">
        <!-- Gallery FancyBox -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/source/jquery.fancybox.css?v=2.1.5')?>" media="screen" />
    </head>
    <body>
        <div class="page-header">
            <img class="logo" src="<?php echo base_url('assets/img/logo.png') ?>">
            <div class="row ct">
                <div class="ct_container">
  <!--                   <?php echo substr($_SERVER["REQUEST_URI"], 8); ?> -->
                    <h6 class="company-title">PT SUGAWARA KADII INDONESIA</h6>
                </div >
            </div>
            <div class="search pl-0">
                <b><a class="lang" href="<?php echo base_url('/id/'.substr($_SERVER["REQUEST_URI"], 8)) ?>"> IND </a> | <a class="lang" href="<?php echo base_url('/en/'.substr($_SERVER["REQUEST_URI"], 8)) ?>">ENG </a></b>
            </div>
            <div class="clearfix"></div>
            <nav class="navbar navbar-expand-md">
                <a class="navbar-brand" href="#"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">

                    	<?php foreach($menu as $index => $mn) { ?>
                        <li class="nav-item <?php if ($active_menu == $mn->url) { echo 'active'; }?>">
                            <a class="nav-link " href="<?php echo site_url($lang.'/home/'.$mn->url)?>"><?php echo $mn->name ?><span class="sr-only">(current)</span></a>
                        </li>
                        <?php } ?>
                        
                    </ul>
                </div>
            </nav>
            <div class="clearfix"></div>
        </div>
