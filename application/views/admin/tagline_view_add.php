	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<h4 class="title_page"> Add Tagline </h4>
					<form action="<?php echo base_url('admin/tagline/save_data')?>" id="form"  enctype="multipart/form-data" method="post" class="form-horizontal">
						<div class="panel-body">
		                    <input type="hidden" value="" name="id"/> 
		                    <div class="form-body">
		                        
                                <div class="form-group">
                                    <label class="control-label col-md-2">Name</label>
                                    <div class="col-md-10">
                                        <input name="name" class="form-control" type="text" 
                                            value="" >
                                        <span class="help-block"><?php echo form_error('name'); ?></span>
                                    </div>
                                </div>

		                        <div class="form-group">
		                            <label class="control-label col-md-2">Baner Immage</label>
		                            <div class="col-md-10">
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

		                        <div class="form-group">
                                    <label class="control-label col-md-2">Position</label>
                                    <div class="col-md-10">
                                        <select name="position" class="form-control">
                                            <option value="Top Left">Top Left</option>
                                            <option value="Top Right">Top Right</option>
                                            <option value="Banner Top Left">Banner Top Left</option>
                                        </select>
                                        <span class="help-block"><?php echo form_error('sell_button'); ?></span>
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

