    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">           
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <h4 class="title_page"> Edit contact </h4>
                    <form action="<?php echo base_url('admin/contact/update')?>" id="form"  enctype="multipart/form-data" method="post" class="form-horizontal">
                        <div class="panel-body">
                            <input type="hidden" value="<?php echo $contact->id ?>" name="id"/> 
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label col-md-2">Email</label>
                                    <div class="col-md-10">
                                        <input name="email" class="form-control" type="text" 
                                            value="<?php echo $contact->email ?>">
                                        <span class="help-block"><?php echo form_error('email'); ?></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">Address</label>
                                    <div class="col-md-10">
                                        <input name="address" class="form-control" type="text" 
                                            value="<?php echo $contact->address ?>">
                                        <span class="help-block"><?php echo form_error('address'); ?></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">Phone</label>
                                    <div class="col-md-10">
                                        <input name="phone" class="form-control" type="text" 
                                            value="<?php echo $contact->phone ?>">
                                        <span class="help-block"><?php echo form_error('phone'); ?></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">Fax</label>
                                    <div class="col-md-10">
                                        <input name="fax" class="form-control" type="text" 
                                            value="<?php echo $contact->fax ?>">
                                        <span class="help-block"><?php echo form_error('fax'); ?></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">Email Receiver</label>
                                    <div class="col-md-10">
                                        <input name="email_receiver" class="form-control" type="text" 
                                            value="<?php echo $contact->email_receiver ?>">
                                        <span class="help-block"><?php echo form_error('email_receiver'); ?></span>
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

