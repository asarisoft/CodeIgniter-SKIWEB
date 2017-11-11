<div class="container container-gallery">
	<div class="row container-gallery-text">
	<h2 style="display: block; display: block; width: 100vw; margin-bottom: 15px;"><b>GALLERY</b></h2>

 	<div class="row row-gallery">
 		<?php foreach ($gallery as $key => $value) { ?>
 			
 		
		<div class="col-md-6 col-sm-12">
			<p class="p-gallery"><?php echo $value['title'] ?></p>
			<p>
			<?php foreach ($value['photos'] as $pkey => $img_url) { ?>
			<a class="fancybox" href="<?php echo base_url('assets/img/gallery/'.$value['id'].'/'.$img_url)?>" data-fancybox-group="gallery1" title=""><img src="<?php echo base_url('assets/img/gallery/'.$value['id'].'/'.$img_url)?>" alt="" /></a>
 			<?php } ?>
 			</p>
		</div>

		<?php } ?> 

	</div>
	</div>

	<img class="bottom-image" src="<?php echo base_url('assets/img/bottom-right.png')?>">
	<?php include "footer_text.php" ?>
</div>