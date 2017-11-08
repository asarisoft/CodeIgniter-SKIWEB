	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<h4 class="title_page"> Edit footer </h4>
					<form action="<?php echo base_url('admin/footer/update')?>" id="form"  enctype="multipart/form-data" method="post" class="form-horizontal">
						<div class="panel-body">
		                    <input type="hidden" value="<?php echo $footer->id ?>" name="id"/> 
		                    <div class="form-body">
			                    <div class="form-group">
		                            <label class="control-label col-md-2">Line 1</label>
		                            <div class="col-md-10">
		                                <textarea name="description" id="descriptiondd" class="form-control" type="text" rows="6"><?php echo $footer->description ?></textarea>
		                                <span class="help-block"><?php echo form_error('description'); ?></span>
		                            </div>
		                        </div>
			                    <div class="form-group">
		                            <label class="control-label col-md-2">Line 2</label>
		                            <div class="col-md-10">
		                                <textarea name="description2" id="description2" class="form-control" type="text" rows="6"><?php echo $footer->description2 ?></textarea>
		                                <span class="help-block"><?php echo form_error('description2'); ?></span>
		                            </div>
		                        </div>
		                        <div class="form-group">
		                            <label class="control-label col-md-2">Line 3</label>
		                            <div class="col-md-10">
		                                <textarea name="description3" id="description3" class="form-control" type="text" rows="6"><?php echo $footer->description3 ?></textarea>
		                                <span class="help-block"><?php echo form_error('description3'); ?></span>
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

