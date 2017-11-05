	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<h4 class="title_page"> Edit bannerpage </h4>
					<form action="<?php echo base_url('admin/bannerpage/update')?>" id="form"  enctype="multipart/form-data" method="post" class="form-horizontal">
						<div class="panel-body">
		                    <input type="hidden" value="<?php echo $bannerpage->id ?>" name="id"/> 
		                    <input type="hidden" value="<?php echo $bannerpage->file_name ?>" name="file_name"/> 
		                    <input type="hidden" value="<?php echo $bannerpage->img_url ?>" name="img_url"/>

		                    <div class="form-body">

		                    	<div class="form-group">
		                            <label class="control-label col-md-2">Page</label>
		                            <div class="col-md-10">
		                                 <select name="page" class="form-control" readonly>
		                                    <option <?php if ($bannerpage->page == "Buy") echo "selected"; ?> value="Buy">Buy</option>
		                                    <option <?php if ($bannerpage->page == "Sell") echo "selected"; ?> value="Sell">Sell</option>
		                                    <option <?php if ($bannerpage->page == "Rent") echo "selected"; ?> value="Rent">Rent</option>
											<option <?php if ($bannerpage->page == "About") echo "selected"; ?> value="About">About</option>
											<option <?php if ($bannerpage->page == "Contact") echo "selected"; ?> value="Contact">Contact</option>
											<option <?php if ($bannerpage->page == "Blog") echo "selected"; ?> value="Blog">Blog</option>
		                                </select>
		                                <span class="help-block"></span>
		                            </div>
		                        </div>
<!-- 
		                        <div class="form-group">
		                            <label class="control-label col-md-2">Status</label>
		                            <div class="col-md-10">
		                                 <select name="status" class="form-control" >
		                                    <option <?php if ($bannerpage->status == "Draft") echo "selected"; ?> value="Draft">Draft</option>
		                                    <option <?php if ($bannerpage->status == "Publish") echo "selected"; ?> value="Publish">Publish</option>
		                                </select>
		                                <span class="help-block"></span>
		                            </div>
		                        </div> -->

		                        <div class="form-group">
		                            <label class="control-label col-md-2">Baner Image</label>
		                            <div class="col-md-2">
		                            	<img src="<?php echo base_url($bannerpage->img_url) ?>" class="img_thumb_edit"></i>
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

