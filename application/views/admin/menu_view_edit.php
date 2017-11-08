    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">           
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <h4 class="title_page"> Edit menu </h4>
                    <form action="<?php echo base_url('admin/menu/update')?>" id="form"  enctype="multipart/form-data" method="post" class="form-horizontal">
                        <div class="panel-body">
                            <input type="hidden" value="<?php echo $menu->id ?>" name="id"/> 
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label col-md-2">Name</label>
                                    <div class="col-md-10">
                                        <input name="name" class="form-control" type="text" 
                                            value="<?php echo $menu->name ?>">
                                        <span class="help-block"><?php echo form_error('name'); ?></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">Url</label>
                                    <div class="col-md-10">
                                        <input name="url" class="datepicker form-control" type="text" 
                                            value="<?php echo $menu->url ?>">
                                        <span class="help-block"><?php echo form_error('url'); ?></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">Queue</label>
                                    <div class="col-md-10">
                                        <input name="queue" class="datepicker form-control" type="number" 
                                            value="<?php echo $menu->queue ?>">
                                        <span class="help-block"><?php echo form_error('queue'); ?></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">Language</label>
                                    <div class="col-md-10">
                                         <select name="language" class="form-control" >
                                            <option <?php if ($menu->language == "en") echo "selected"; ?> value="en">En</option>
                                            <option <?php if ($menu->language == "id") echo "selected"; ?> value="id">Id</option>
                                        </select>
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

