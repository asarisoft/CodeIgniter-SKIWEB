	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			

<!-- 		<div class="row">
			<div class="col-lg-12">
				<h2 class="page-header">Edit Employee</h2>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
                    <h4 class="title_page">Home > User > Edit</h4>
					<div class="panel-body">
						<form action="<?php echo base_url('admin/employee/update')?>" id="form"  enctype="multipart/form-data" method="post" class="form-horizontal">
		               <input type="hidden" name="id" value="<?php echo $employee->id ?>"/> 
	                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-2">Username</label>
                            <div class="col-md-10">
                                <input name="username" class="form-control" type="text" 
                                	value="<?php echo $employee->username ?>">
                                <span class="help-block"><?php echo form_error('username'); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Name</label>
                            <div class="col-md-10">
                                <input name="name" class="form-control" type="text" 
                                	value="<?php echo $employee->name ?>">
                                <span class="help-block"><?php echo form_error('name'); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Jabatan</label>
                            <div class="col-md-10">
                                <input name="position" class="form-control" type="text"
                                	value="<?php echo $employee->position ?>">
                                <span class="help-block"><?php echo form_error('position'); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Hak Akses</label>
                            <div class="col-md-10">
                                <select name="role" class="form-control" >
                                    <option value="<?php echo $employee->role ?>" selected="true">
                                    	<?php echo $employee->role ?></option>
                                    <option value="Admin">Admin</option>
                                    <option value="Teknisi">Teknisi</option>
                                    <option value="Staff">Staff</option>
                                </select>
                                <span class="help-block"><?php echo form_error('role'); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Foto</label>
                            <div class="col-md-10">
                                <img src="<?php echo base_url($employee->image_url)?>" class="img-responsive img-thumbnail" 
                                    style="width:204px;height:auto;">
                                <input type="file" name="image" size="20" />
                                <span class="help-block"><?php echo $image_error; ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Password</label>
                            <div class="col-md-9">
                                <input name="password" value="<?php echo $employee->password ?>" class="form-control" type="password">
                                <span class="help-block"></span>
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

