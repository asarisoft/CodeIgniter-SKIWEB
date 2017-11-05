	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<h4 class="title_page"> Edit footer </h4>
					<form action="<?php echo base_url('admin/footer/update')?>" id="form"  enctype="multipart/form-data" method="post" class="form-horizontal">
						<div class="panel-body">
		                    <input type="hidden" value="<?php echo $footer->id ?>" name="id"/> 
		                    <input type="hidden" value="<?php echo $footer->file_name ?>" name="file_name"/> 
		                    <input type="hidden" value="<?php echo $footer->img_url ?>" name="img_url"/>

		                    <div class="form-body">
			                    <div class="form-group">
		                            <label class="control-label col-md-2">Description</label>
		                            <div class="col-md-10">
		                                <textarea name="description" id="description" class="form-control" type="text" rows="6"><?php echo $footer->description ?></textarea>
		                                <span class="help-block"><?php echo form_error('description'); ?></span>
		                            </div>
		                        </div>

		                        <div class="form-group">
		                            <label class="control-label col-md-2">Icon</label>
		                            <div class="col-md-2" style="background-color:black; margin-left: 15px; padding: 10px 0;">
		                            	<img src="<?php echo base_url($footer->img_url) ?>" class="img_thumb_edit" style="width: 50%; margin: 0 auto; display: block;"></i>
		                            </div>

		                            <div class="col-md-3">
		                                <input type="file" name="image" size="20" />
		                                <span class="help-block">
		                                	<?php 
		                                		if ($image_error) {
		                                			echo $image_error; }  
		                                		else { 
		                                			echo form_error('image'); } 
		                                	?>
		                                </span>
		                            </div>
		                        </div>
	                    	</div>
						</div>
						<div class="panel-footer">
							<button type="submit" id="btnSave" class="btn btn-info"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
		                </div>
	               	</form>
				</div>
			</div>
		</div>
	</div> 
</body>
</html>

