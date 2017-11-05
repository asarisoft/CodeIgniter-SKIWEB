	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<h4 class="title_page"> Edit about <a class="btn btn-sm btn-info" 
                    style="float: right; background: red;" href="<?php echo base_url('about') ?>" title="Preview" target="_blank"><i class="glyphicon glyphicon-eye-open"></i></a></h4>
					<form action="<?php echo base_url('admin/about/update')?>" id="form"  enctype="multipart/form-data" method="post" class="form-horizontal">
						<div class="panel-body">
		                    <input type="hidden" value="<?php echo $about->id ?>" name="id"/> 
		                    <input type="hidden" value="<?php echo $about->top_img_url ?>" name="top_img_url"/>
		                    <input type="hidden" value="<?php echo $about->second_img_url ?>" name="second_img_url"/>
		                    <input type="hidden" value="<?php echo $about->third_img_url ?>" name="third_img_url"/>

		                    <input type="hidden" value="<?php echo $about->top_file_name ?>" name="top_file_name"/>
		                    <input type="hidden" value="<?php echo $about->second_file_name ?>" name="second_file_name"/>
		                    <input type="hidden" value="<?php echo $about->third_file_name ?>" name="third_file_name"/>

		                    <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Top Text</label>
                                    <div class="col-md-9">
                                        <textarea name="top_text" id="content" class="form-control" type="text" rows="6"><?php echo $about->top_text ?></textarea>
                                        <span class="help-block"><?php echo form_error('top_text'); ?></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Secont Text</label>
                                    <div class="col-md-9">
                                        <textarea name="second_text" id="content" class="form-control" type="text" rows="6"><?php echo $about->second_text ?></textarea>
                                        <span class="help-block"><?php echo form_error('second_text'); ?></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Third Text</label>
                                    <div class="col-md-9">
                                        <textarea name="third_text" id="content" class="form-control" type="text" rows="6"><?php echo $about->third_text ?></textarea>
                                        <span class="help-block"><?php echo form_error('third_text'); ?></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Advice Australia</label>
                                    <div class="col-md-9">
                                        <textarea name="advice_australia" id="content" class="form-control" type="text" rows="6"><?php echo $about->advice_australia ?></textarea>
                                        <span class="help-block"><?php echo form_error('advice_australia'); ?></span>
                                    </div>
                                </div>

		                        <div class="form-group">
		                            <label class="control-label col-md-3">Top Img (1280 x 500 px)</label>
		                            <div class="col-md-3">
		                            	<img src="<?php echo base_url($about->top_img_url) ?>" class="img_thumb_edit"></i>
		                            </div>
		                            <div class="col-md-3">
		                                <input type="file" name="top_img" size="20" />
		                                <span class="help-block">
		                                	<?php 
		                                		if ($image_error1) {
		                                			echo $image_error1; }  
		                                		else { 
		                                			echo form_error('top_img'); } 
		                                	?>
		                                </span>
		                            </div>
		                        </div>

		                        <div class="form-group">
		                            <label class="control-label col-md-3">Second Image (1280 x 500 px)</label>
		                            <div class="col-md-3">
		                            	<img src="<?php echo base_url($about->second_img_url) ?>" class="img_thumb_edit"></i>
		                            </div>

		                            <div class="col-md-3">
		                                <input type="file" name="second_img" size="20" />
		                                <span class="help-block">
		                                	<?php 
		                                		if ($image_error2) {
		                                			echo $image_error2; }  
		                                		else { 
		                                			echo form_error('second_img'); } 
		                                	?>
		                                </span>
		                            </div>
		                        </div>

		                        <div class="form-group">
		                            <label class="control-label col-md-3">Third Image (1280 x 500 px)</label>
		                            <div class="col-md-3">
		                            	<img src="<?php echo base_url($about->third_img_url) ?>" class="img_thumb_edit"></i>
		                            </div>

		                            <div class="col-md-3">
		                                <input type="file" name="third_img" size="20" />
		                                <span class="help-block">
		                                	<?php 
		                                		if ($image_error3) {
		                                			echo $image_error3; }  
		                                		else { 
		                                			echo form_error('third_img'); } 
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

