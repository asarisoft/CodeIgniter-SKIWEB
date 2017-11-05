    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">           
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <h4 class="title_page"> Edit Buy </h4>
                    <form action="<?php echo base_url('admin/buy/update')?>" id="form"  enctype="multipart/form-data" method="post" class="form-horizontal">
                        <div class="panel-body">
                            <input type="hidden" value="<?php echo $buy->id ?>" name="id"/> 
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label col-md-2">Subject</label>
                                    <div class="col-md-10">
                                        <input name="subject" class="form-control" type="text" 
                                            value="<?php echo $buy->subject ?>">
                                        <span class="help-block"><?php echo form_error('subject'); ?></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">Place</label>
                                    <div class="col-md-10">
                                        <input name="place" class="form-control" type="text" 
                                            value="<?php echo $buy->place ?>">
                                        <span class="help-block"><?php echo form_error('place'); ?></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">Phone</label>
                                    <div class="col-md-10">
                                        <input name="phone" class="form-control" type="text" 
                                            value="<?php echo $buy->phone ?>">
                                        <span class="help-block"><?php echo form_error('phone'); ?></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">Address</label>
                                    <div class="col-md-10">
                                        <input name="address" class="form-control" type="text" 
                                            value="<?php echo $buy->address ?>">
                                        <span class="help-block"><?php echo form_error('address'); ?></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">Price</label>
                                    <div class="col-md-10">
                                        <input name="price" class="form-control" type="text" 
                                            value="<?php echo $buy->price ?>">
                                        <span class="help-block"><?php echo form_error('price'); ?></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">Category</label>
                                    <div class="col-md-10">
                                         <select name="category" class="form-control" >
                                            <option <?php if ($buy->category == "Land") echo "selected"; ?> value="Land">Land</option>
                                            <option <?php if ($buy->category == "Houses") echo "selected"; ?> value="Houses">Houses</option>
                                            <option <?php if ($buy->category == "Others") echo "selected"; ?> value="Others">Others</option>
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">Description</label>
                                    <div class="col-md-10">
                                        <textarea name="description" id="description" class="form-control" type="text" rows="6"><?php echo $buy->description ?></textarea>
                                        <span class="help-block"><?php echo form_error('description'); ?></span>
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

