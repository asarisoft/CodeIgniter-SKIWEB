<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Admin Ozindo Property</title>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/img/icon.ico')?>" />

    <link rel = "stylesheet" type = "text/css" 
        href = "<?php echo base_url('assets/bootstrap-datepicker/css/datepicker.css')?>" >

    <link rel = "stylesheet" type = "text/css" 
        href = "<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>">

    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url('assets/css/styles.css')?>">

    <link rel = "stylesheet" type = "text/css" 
        href = "<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" >

    <link rel = "stylesheet" type = "text/css" 
        href = "<?php echo base_url('assets/font-awesome/css/font-awesome.min.css')?>" >

    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url('assets/css/my_style.css')?>">

    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url('assets/css/image_upload.css')?>">


    <script type = 'text/javascript' src = "<?php echo base_url('assets/js/lumino.glyphs.js')?>"></script>
    <script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
    <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
    <script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap3-typeahead.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/jasny-bootstrap.min.js')?>"></script>    
    <script src="<?php echo base_url('assets/js/custom.js')?>"></script>

    <!-- textarea tinymce -->
    <script src="<?php echo base_url('assets/js/tinymce/tinymce.min.js')?>"></script>
    <script>
    tinymce.init({
        selector: "textarea",
        theme: "modern",
        paste_data_images: true,
        plugins: [
          "advlist autolink lists link image charmap print preview hr anchor pagebreak",
          "searchreplace wordcount visualblocks visualchars code fullscreen",
          "insertdatetime media nonbreaking save table contextmenu directionality",
          "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
        toolbar2: "print preview media | forecolor backcolor emoticons",
        image_advtab: true,
        file_picker_callback: function(callback, value, meta) {
          if (meta.filetype == 'image') {
            $('#upload').trigger('click');
            $('#upload').on('change', function() {
              var file = this.files[0];
              var reader = new FileReader();
              reader.onload = function(e) {
                callback(e.target.result, {
                  alt: ''
                });
              };
              reader.readAsDataURL(file);
            });
          }
        },
      });
    </script>

</head>
<body>

    <input name="image" type="file" id="upload" class="hidden" onchange="">

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="" data-target="#sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" target="blank" href="<?php echo base_url(); ?>"><b>Ozindo</b> Admin</a>
                <ul class="user-menu">
                    <li class="dropdown pull-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> <?php echo $this->session->userdata('name')?> <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="<?php echo base_url('admin/authentication/logout')?>"><span class="icon_"><i class="fa fa-sign-out fa-lg"></i></span> Log Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
                            
        </div>
    </nav> 

    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
        <ul class="nav menu" style="margin-top: 20px; padding-bottom: 40px;">
            <!-- <li class="parent "><a data-toggle="collapse" href="#sub-item-1">
                <em class="fa fa-home">&nbsp;</em> Home <span data-toggle="" href="
                #sub-item-1" class="icon pull-right"></span>
                </a>
                <ul class="children collapse" id="sub-item-1">
                    <li><a class="" href="<?php echo site_url()?>admin/banner.html">
                        <span class="fa fa-file-image-o">&nbsp;</span> Banner
                    </a></li>
                    <li><a class="" href="<?php echo site_url()?>admin/banner-text.html">
                        <span class="fa fa-text-width">&nbsp;</span> Text under banner
                    </a></li>
                    <li><a class="" href="<?php echo site_url()?>admin/info-summary.html">
                        <span class="fa fa-info-circle">&nbsp;</span> Info sumary
                    </a></li>
                </ul>
            </li>
            <li class="parent"><a data-toggle="collapse" href="#sub-item-2">
                <em class="fa fa-cart-plus ">&nbsp;</em> Sell & Rent<span data-toggle="collapse" href="
                #sub-item-2" class="icon pull-right"></span>
                </a>
                <ul class="children collapse" id="sub-item-2">
                    <li><a class="" href="<?php echo site_url()?>admin/tagline.html">
                        <span class="fa fa-tags">&nbsp;</span> Tagline
                    </a></li>
                    <li><a class="" href="<?php echo site_url()?>admin/city-area.html">
                        <span class="fa fa-street-view">&nbsp;</span> City area
                    </a></li>
                    <li><a class="" href="<?php echo site_url()?>admin/sell.html">
                        <span class="fa fa-bars">&nbsp;</span> Sell
                    </a></li>                    
                    <li><a class="" href="<?php echo site_url()?>admin/rent.html">
                        <span class="fa fa-exchange">&nbsp;</span> Rent
                    </a></li>
                </ul>
            </li>

            <li class="parent"><a data-toggle="collapse" href="#sub-item-3">
                <span class="icon_"><i class="fa fa fa-address-card-o "></i></span> About <span data-toggle="collapse" href="
                #sub-item-3" class="icon pull-right"></span>
                </a>
                <ul class="children collapse" id="sub-item-3">
                    <li><a class="" href="<?php echo site_url()?>admin/about.html">
                        <span class="fa fa-grav">&nbsp;</span> About
                    </a></li>
                    <li><a class="" href="<?php echo site_url()?>admin/user.html">
                        <span class="fa fa-users">&nbsp;</span> Team list
                    </a></li>
                    <li><a class="" href="<?php echo site_url()?>admin/testimony.html">
                        <span class="fa fa-star-o">&nbsp;</span> Testimony
                    </a></li>
                </ul>
            </li> -->
<!-- 
            <li><a href="<?php echo base_url('admin/buy.html')?>"><span class="icon_"><i class="fa fa-cart-arrow-down "></i></span>Buy</a></li> -->

            <li><a href="<?php echo site_url()?>admin/footer.html"><span class="fa fa-window-minimize">&nbsp;</span> Footer</a></li>

<!--             <li><a class="" href="<?php echo site_url()?>admin/downloadable.html"><span class="fa fa-file-pdf-o">&nbsp;</span> File download</a></li> -->

<!--             <li><a href="<?php echo base_url('admin/banner-page.html')?>"><span class="icon_"><i class="fa fa fa-picture-o "></i></span>Banner page</a></li> -->

<!--             <li><a href="<?php echo base_url('admin/blog.html')?>"><span class="icon_"><i class="fa fa fa-rss "></i></span>Blog</a></li>
 -->
            <li><a href="<?php echo site_url()?>admin/banner.html"><span class="icon_"><i class="fa fa-file-image-o"></i></span>Slider Banner</a></li>

            <li><a href="<?php echo base_url('admin/user.html')?>"><span class="icon_"><i class="fa fa-user-o "></i></span>User</a></li>

            
        </ul>
    </div> 