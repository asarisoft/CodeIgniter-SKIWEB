    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">           
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <h4 class="title_page"> Add blog  </h4>
                    <form action="<?php echo base_url('admin/blog/save_data')?>" id="form"  enctype="multipart/form-data" method="post" class="form-horizontal">
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

                                <div class="form-group">
                                    <label class="control-label col-md-2">Date</label>
                                    <div class="col-md-10">
                                        <input name="date" class="datepicker form-control" type="text" 
                                            value="">
                                        <span class="help-block"><?php echo form_error('date'); ?></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">Status</label>
                                    <div class="col-md-10">
                                        <select name="status" class="form-control">
                                            <option value="Draft">Draft</option>
                                            <option value="Publish">Publish</option>
                                        </select>
                                        <span class="help-block"><?php echo form_error('status'); ?></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">Image (319px x 250px)</label>
                                    <div class="col-md-2">
                                        <img id="image_preview" class="img_thumb_edit"></i>
                                    </div>
                                    <div class="col-md-3">
                                        <input id="image_source" onchange="previewImage();" type="file" name="image" size="20" />
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

                                <div class="form-group">
                                    <label class="control-label col-md-2">Content</label>
                                    <div class="col-md-10">
                                        <textarea name="content" id="content" class="form-control" type="text" rows="6"></textarea>
                                        <span class="help-block"><?php echo form_error('content'); ?></span>
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

<script type="text/javascript">
    $('.datepicker').datepicker({
        autoclose: true,
        format: "yyyy/mm/dd",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true,
        todayHighlight: true,  
    });
</script>
</body>
</html>

