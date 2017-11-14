    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">           
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <h4 class="title_page"> Edit gallery </h4>
                    <form action="<?php echo base_url('admin/gallery/update')?>" id="form"  enctype="multipart/form-data" method="post" class="form-horizontal">
                        <div class="panel-body">
                            <input type="hidden" value="<?php echo $gallery->id ?>" name="id"/> 
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label col-md-2">English Title</label>
                                    <div class="col-md-10">
                                        <input name="title_en" class="form-control" type="text" 
                                            value="<?php echo $gallery->title_en ?>">
                                        <span class="help-block"><?php echo form_error('title_en'); ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2">Inonesia Title</label>
                                    <div class="col-md-10">
                                        <input name="title_id" class="form-control" type="text" 
                                            value="<?php echo $gallery->title_id ?>">
                                        <span class="help-block"><?php echo form_error('title_id'); ?></span>
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

