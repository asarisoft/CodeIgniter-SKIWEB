	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<h4 class="title_page"> Add Banner </h4>
					<form action="<?php echo base_url('admin/banner/update')?>" id="form"  enctype="multipart/form-data" method="post" class="form-horizontal">
						<div class="panel-body">
		                    <input type="hidden" value="<?php echo $banner->id ?>" name="id"/> 
		                    <input type="hidden" value="<?php echo $banner->file_name ?>" name="file_name"/> 
		                    <input type="hidden" value="<?php echo $banner->img_url ?>" name="img_url"/>

		                    <div class="form-body">
		                        <div class="form-group">
		                            <label class="control-label col-md-2">Status</label>
		                            <div class="col-md-10">
		                                 <select name="status" class="form-control" >
		                                    <option <?php if ($banner->status == "Draft") echo "selected"; ?> value="Draft">Draft</option>
		                                    <option <?php if ($banner->status == "Publish") echo "selected"; ?> value="Publish">Publish</option>
		                                </select>
		                                <span class="help-block"></span>
		                            </div>
		                        </div>

		                        <div class="form-group">
		                            <label class="control-label col-md-2">Image (1835 x 656 px)</label>
		                            <div class="col-md-2">
		                            	<img src="<?php echo base_url($banner->img_url) ?>" class="img_thumb_edit"></i>
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

