<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sugawara Kadii Indonesia</title>
    <link rel="shortcut icon" type="image/x-icon"  />
    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url('assets/bootstrap-4.0/css/bootstrap.min.css') ?>">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url('assets/font-awesome/css/font-awesome.min.css') ?>">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url('assets/css/front.css') ?>">
</head>
<body>
<div class="page-header">
	<img class="logo" src="<?php echo base_url('assets/img/logo.png') ?>">

	<div class="row ct"> 
		<div class="ct_container">
			<h6 class="company-title">PT SUGAWARA KADII INDONESIA</h6>
		</div >
		<div class="col pl-0 ct_row_right">
			<hr style="">
		</div>
	</div>

	<div class="search pl-0">
		<img src="<?php echo base_url('assets/img/top-search.png')?>">
		<div>
			<b>IND | ENG </b>
			<input class="ml-3" type="text">
			<button class="bt-search"><span class="icon_"><i class="fa fa-search fa-lg"></i></span></button>
		</div>
	</div>
	<div class="clearfix"></div>

	<nav class="navbar navbar-expand-md">
	  <a class="navbar-brand" href="#"></a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item <?php if ($active_menu == 'index') { echo 'active'; }?>">
	        <a class="nav-link " href="<?php echo site_url('home')?>">HOME<span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item <?php if ($active_menu == 'about') { echo 'active'; }?>">
	        <a class="nav-link" href="<?php echo site_url('home/about')?>">ABOUT US<span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item <?php if ($active_menu == 'recycle') { echo 'active'; }?>">
	        <a class="nav-link" href="<?php echo site_url('home/recycle')?>">RECYCLE<span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item <?php if ($active_menu == 'business') { echo 'active'; }?>">
	        <a class="nav-link" href="<?php echo site_url('home/business')?>">BUSINESS<span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item <?php if ($active_menu == 'gallery') { echo 'active'; }?>">
	        <a class="nav-link" href="#">GALLERY<span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item <?php if ($active_menu == 'contact') { echo 'active'; }?>">
	        <a class="nav-link" href="<?php echo site_url('home/contact')?>">CONTACT<span class="sr-only">(current)</span></a>
	      </li>
<!-- 	      <li class="nav-item dropdown">
	        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          Dropdown
	        </a>
	        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
	          <a class="dropdown-item" href="#">Action</a>
	          <a class="dropdown-item" href="#">Another action</a>
	          <div class="dropdown-divider"></div>
	          <a class="dropdown-item" href="#">Something else here</a>
	        </div>
	      </li>
 -->	</ul>
	  </div>
	</nav>
	<div class="clearfix"></div>
</div>