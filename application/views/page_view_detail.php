<div class="container container-about1">

</div>

<div class="container container-about2">
	<img class="ver_green ver_green_rec_first" src="<?php echo base_url('assets/img/ver-green.png')?>">
	<div class="row container-text container-text-general">
		<div class="col-md-7 content-left" >
			<div class="col-md-11 col-sm-10 col-xs-10 in-1">
			<h4 class="title-bottom"> RECYCLE </h4>
			<h5 class="title-content"><?php echo $active->title ?></h5>
			<?php echo $active->description ?>
			</div>
			<div class="col-md-1 col-sm-2 col-xs-2 line-number">
				<img class="middle-line" align="top" src="<?php echo base_url('assets/img/line-2.png')?>">
				<h2 class="middle-number"><b><?php echo $active->number ?></b></h2>
			</div>
		</div>
		<div class="col-md-5 content-right">
			<ul class="list">
				<?php foreach ($datas as $key => $value) { if ($value->id != $active->id ) {?>
			    <li class="detail1"><a class="table-content" href="<?php echo base_url($lang.'/home/'.$value->page.'?number='.$value->number)?>"><span style="padding-right: 10px"><?php echo $value->title ?></span><span class="number"><?php echo $value->number ?></span></a></li>
			    <?php } } ?>
		    </ul> 
		</div>
	</div>

	<img class="bottom-image" src="<?php echo base_url('assets/img/bottom-right.png')?>">
	<?php include "footer_text.php" ?>
</div>