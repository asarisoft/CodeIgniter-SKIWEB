	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<h4 class="title_page"> Info summary Edit </h4>
					<form action="<?php echo base_url('admin/infosummary/update')?>" id="form"  enctype="multipart/form-data" method="post" class="form-horizontal">
						<div class="panel-body">
		                    <input type="hidden" value="<?php echo $infosummary->id ?>" name="id"/> 
		                    <input type="hidden" value="<?php echo $infosummary->file_name ?>" name="file_name"/> 
		                    <input type="hidden" value="<?php echo $infosummary->img_url ?>" name="img_url"/>

		                    <div class="form-body">
			                    <div class="form-group">
		                            <label class="control-label col-md-2">Description</label>
		                            <div class="col-md-10">
		                                <textarea name="description" id="description" class="form-control" type="text" rows="6"><?php echo $infosummary->description ?></textarea>
		                                <span class="help-block"><?php echo form_error('description'); ?></span>
		                            </div>
		                        </div>

		                        <div class="form-group">
		                            <label class="control-label col-md-2">URL</label>
		                            <div class="col-md-10">
		                                <input name="url" class="form-control" type="text" 
		                                	value="<?php echo ($infosummary->url ? $infosummary->url : base_url()) ?>">
		                                <span class="help-block"><?php echo form_error('url'); ?></span>
		                            </div>
		                        </div>

		                        <div class="form-group">
		                            <label class="control-label col-md-2">Icon (PNG 118 x 118) </label>
		                            <div class="col-md-2" style="background: black; margin-left: 14px; padding: 12px;">
		                            	<img src="<?php echo base_url($infosummary->img_url) ?>" class="img_thumb_edit"></i>
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

