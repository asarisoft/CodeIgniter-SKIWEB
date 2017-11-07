    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">           
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <h4 class="title_page"> Add gallery  </h4>
                    <form action="<?php echo base_url('admin/gallery/save_data')?>" id="form"  enctype="multipart/form-data" method="post" class="form-horizontal">
                        <div class="panel-body">

                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label col-md-2">Title</label>
                                    <div class="col-md-10">
                                        <input name="title" class="form-control" type="text" 
                                            value="">
                                        <span class="help-block"><?php echo form_error('title'); ?></span>
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

