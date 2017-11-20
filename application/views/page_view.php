<div class="container container-about1" style="background: url('<?php echo base_url($banner->img_url)?>') !important; z-index: -2"></div>


<div class="container container-about2 container-recycle">
	<img class="ver_green ver_green_rec_first" src="<?php echo base_url('assets/img/ver-green.png')?>">
	<div class="row container-text container-text-recycle">
		<div class="col-md-6 rec-left" >
		    <ul class="list">	
		    	<?php foreach ($datas as $key => $value) { if ($key < 2) {?>
			    <li class="detail1"><a class="table-content" href="<?php echo base_url($lang.'/home/'.$value->page.'?number='.$value->number)?>"><span class="span1" style="padding-right: 10px"><?php echo $value->title ?></span><span class="number"><?php echo $value->number ?></span></a></li>
     			<?php } } ?>
		    </ul> 
	    </div>

		<div class="col-md-6 rec-right">
			 <ul class="list">
			 <?php foreach ($datas as $key => $value) { if ($key > 1) {?>
			    <li class="detail1"><a class="table-content" href="<?php echo base_url($lang.'/home/'.$value->page.'?number='.$value->number)?>"><span class="span1" style="padding-right: 10px"><?php echo $value->title ?></span><span class="number"><?php echo $value->number ?></span></a></li>
     			<?php } } ?>
		    </ul> 
		</div>
	</div>
	
	<img class="bottom-image" src="<?php echo base_url('assets/img/bottom-right.png')?>">
	<?php include "footer_text.php" ?>
</div>

