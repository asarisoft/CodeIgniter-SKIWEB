	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<h4 class="title_page"> Edit Page Content </h4>
					<form action="<?php echo base_url('admin/pagecontent/update')?>" id="form"  enctype="multipart/form-data" method="post" class="form-horizontal">
						<div class="panel-body">
		                    <input type="hidden" value="<?php echo $pagecontent->id ?>" name="id"/> 
		                    <input type="hidden" value="<?php echo $pagecontent->file_name ?>" name="file_name"/> 
		                    <input type="hidden" value="<?php echo $pagecontent->img_url ?>" name="img_url"/>
		                    <div class="form-body">
	                            <div class="form-group">
	                                <label class="control-label col-md-2">Number</label>
	                                <div class="col-md-10">
	                                    <input name="number" class="form-control" type="text" 
	                                        value="<?php echo $pagecontent->number ?>">
	                                    <span class="help-block"><?php echo form_error('number'); ?></span>
	                                </div>
	                            </div>

		                     	<div class="form-group">
		                            <label class="control-label col-md-2">Page</label>
		                            <div class="col-md-10">
		                                 <select name="page" class="form-control" readonly >
		                                    <option <?php if ($pagecontent->page == "recycle") echo "selected"; ?> value="recycle">recycle</option>
		                                    <option <?php if ($pagecontent->page == "business") echo "selected"; ?> value="business">business</option>
		                                </select>
		                                <span class="help-block"></span>
		                            </div>
		                        </div>

		                        <div class="form-group">
                                    <label class="control-label col-md-2">Title</label>
                                    <div class="col-md-10">
                                        <input name="title" class="form-control" type="text" 
                                            value="<?php echo $pagecontent->title ?>">
                                        <span class="help-block"><?php echo form_error('title'); ?></span>
                                    </div>
                                </div>

		                        <div class="form-group">
                                    <label class="control-label col-md-2">Language</label>
                                    <div class="col-md-10">
                                         <select name="language" class="form-control" >
                                            <option <?php if ($pagecontent->language == "en") echo "selected"; ?> value="en">En</option>
                                            <option <?php if ($pagecontent->language == "id") echo "selected"; ?> value="id">Id</option>
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>

		                        <div class="form-group">
		                            <label class="control-label col-md-2">Image (1290 x 358)</label>
		                            <div class="col-md-2">
		                            	<img src="<?php echo base_url($pagecontent->img_url) ?>" class="img_thumb_edit"></i>
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

		                        <div class="form-group">
                                    <label class="control-label col-md-2">Description</label>
                                    <div class="col-md-10">
                                        <textarea name="description" id="description" class="form-control" type="text" rows="6"><?php echo $pagecontent->description ?></textarea>
                                        <span class="help-block"><?php echo form_error('description'); ?></span>
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

