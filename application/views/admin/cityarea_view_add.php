	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<h4 class="title_page"> Add city area </h4>
					<div class="panel-body">
						<form action="<?php echo base_url('admin/cityarea/save_data')?>" id="form"  method="post" class="form-horizontal">
	                    <input type="hidden" value="" name="id"/> 
	                    <div class="form-body">
	                        <div class="form-group">
	                            <label class="control-label col-md-2">City</label>
	                            <div class="col-md-10">
	             					<input name="city" class="form-control" id="city" type="text">
                                	<span class="help-block"><?php echo form_error('city'); ?></span>
	                            </div>
	                        </div>
	                        <div class="form-group">
	                            <label class="control-label col-md-2">Area</label>
	                            <div class="col-md-10">
	                                <input name="area" class="form-control" type="text">
	                                <span class="help-block"><?php echo form_error('area'); ?></span>
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
		</div><!--/.row-->	
	</div> <!-- End Content -->

	<script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
	<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap3-typeahead.min.js')?>"></script>
	<script>
	$(document).ready(function(e){
		var site_url = "<?php echo site_url(); ?>";
		var input = $("input[name=city]");
			$.get(site_url+'admin/cityarea/json_search_parent_city', function(data){
						input.typeahead({
						    source: data,
						    minLength: 1,
						});
			}, 'json');

			input.change(function(){
				var current = input.typeahead("getActive");
			});

	});
	</script>

</body>
</html>

