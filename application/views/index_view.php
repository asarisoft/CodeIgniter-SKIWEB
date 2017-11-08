<!-- <div class="container" style="background-color: white !important"> -->
<!--  <div class="big-text">
    <h2 > TOGETHER CREATING </h2>
    <h2 > A BRIGTHER FUTURE </h2>
    
    <H3 class="h3-home"> PT SUGAWARA KADII INDONESIA </H3>
    <H3 class="h3-service"> SERVICE </H3>
    </div> -->

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <?php foreach($slide_banner as $key => $banner) { ?>
            <div class="carousel-item <?php if($key==0) { echo 'active'; } ?>">
                <img class="d-block img-fluid" src="<?php echo base_url($banner->img_url)?>" alt="First slide">
            </div>
        <?php } ?>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
    </a>
</div>
<div class="footer footer-home">
    <p style=""><?php echo $footer->description ?></p>
    <p style="font-weight: bold; font-size: 15px; margin: 3px 0;">
        <?php echo $footer->description2 ?>
    </p>
    <p ><?php echo $footer->description3 ?></p>
</div>
<!-- </div> -->
