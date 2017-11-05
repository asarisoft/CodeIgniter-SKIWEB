	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<h4 class="title_page"> Category edit </h4>
					<form action="<?php echo base_url('admin/buycategory/update')?>" id="form"  enctype="multipart/form-data" method="post" class="form-horizontal">
						<div class="panel-body">
		                    <input type="hidden" value="<?php echo $buycategory->id ?>" name="id"/> 
		                    <div class="form-body">
		                    	<div class="form-group">
		                            <label class="control-label col-md-2">Name</label>
		                            <div class="col-md-10">
		                                <input name="name" class="form-control" type="text" 
		                                	value="<?php echo $buycategory->name ?>">
		                                <span class="help-block"><?php echo form_error('name'); ?></span>
		                            </div>
		                        </div>
		                        <div class="form-group">
		                            <label class="control-label col-md-2">Sequence</label>
		                            <div class="col-md-10">
		                                <input name="sequence" class="form-control" type="number" 
		                                	value="<?php echo $buycategory->sequence ?>">
		                                <span class="help-block"><?php echo form_error('sequence'); ?></span>
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

