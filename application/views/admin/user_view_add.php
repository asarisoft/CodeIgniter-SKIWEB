    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">           
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <h4 class="title_page"> Add user </h4>
                    <form action="<?php echo base_url('admin/user/save_data')?>" id="form"  enctype="multipart/form-data" method="post" class="form-horizontal">
                        <div class="panel-body">

                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label col-md-2">Name</label>
                                    <div class="col-md-10">
                                        <input name="name" class="form-control" type="text" 
                                            value="">
                                        <span class="help-block"><?php echo form_error('name'); ?></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">Email</label>
                                    <div class="col-md-10">
                                        <input name="email" class="form-control" type="email" 
                                            value="">
                                        <span class="help-block"><?php echo form_error('email'); ?></span>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-2">Username</label>
                                    <div class="col-md-10">
                                        <input name="username" class="form-control" type="text" 
                                            value="">
                                        <span class="help-block"><?php echo form_error('username'); ?></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">Password</label>
                                    <div class="col-md-10">
                                        <input name="password" class="form-control" type="password" 
                                            value="">
                                        <span class="help-block"><?php echo form_error('password'); ?></span>
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

