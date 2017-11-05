    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">           
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <h4 class="title_page"> Add Rent </h4>
                    <form action="<?php echo base_url('admin/rent/save_data')?>" id="form"  enctype="multipart/form-data" method="post" class="form-horizontal">
                        <div class="panel-body">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-lg-6">

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Subject</label>
                                        <div class="col-md-9">
                                            <input name="subject" class="form-control" type="text" 
                                                value="" maxlength="80">
                                            <span class="help-block"><?php echo form_error('subject'); ?></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Place</label>
                                        <div class="col-md-9">
                                            <input name="place" class="form-control" type="text" 
                                                value="">
                                            <span class="help-block"><?php echo form_error('place'); ?></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Agent</label>
                                        <div class="col-md-9">
                                            <input id="agent_id" name="agent_id" class="form-control" type="hidden" >
                                            <input name="agent" class="form-control" type="text" >
                                            <span class="help-block"><?php echo form_error('agent_id'); ?></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Price</label>
                                        <div class="col-md-9">
                                            <input name="price" class="form-control" type="number" 
                                                value="">
                                            <span class="help-block"><?php echo form_error('price'); ?></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Price Text</label>
                                        <div class="col-md-9">
                                            <input name="price_text" class="form-control" type="text" 
                                                value="">
                                            <span class="help-block"><?php echo form_error('price_text'); ?></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Show Price</label>
                                        <div class="col-md-9">
                                            <select name="rent_button" class="form-control">
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                            <span class="help-block"><?php echo form_error('rent_button'); ?></span>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6" >

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Latitude</label>
                                        <div class="col-md-9">
                                            <input name="_lat" class="form-control" type="text" 
                                                value="">
                                            <span class="help-block"><?php echo form_error('_lat'); ?></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Longitude</label>
                                        <div class="col-md-9">
                                            <input name="_long" class="form-control" type="text" 
                                                value="">
                                            <span class="help-block"><?php echo form_error('_long'); ?></span>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="control-label col-md-3">Category</label>
                                        <div class="col-md-9">
                                            <select name="category" class="form-control">
                                                <option value="Apartemen">Apartemen</option>
                                                <option value="Land">Land</option>
                                                <option value="House">Houses</option>
                                                <option value="Other">Others</option>
                                                <option value="Other">Australia</option>
                                            </select>
                                            <span class="help-block"><?php echo form_error('category'); ?></span>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="control-label col-md-3">Tagline</label>
                                        <div class="col-md-9">
                                            <?php if(sizeof($tag) > 0): ?>
                                                <select name="tags[]" class="form-control" multiple="multiple">
                                                    <?php foreach($tag as $tg): ?>
                                                        <option 
                                                            value="<?php echo $tg['id'] ?>" >
                                                            <?php echo $tg['name'] ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            <?php endif; ?>
                                            <span class="help-block"><?php echo form_error('city'); ?></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Image (345 x 269)</label>
                                        <div class="col-md-4">
                                            <img id="image_preview" class="img_thumb_edit"></i>
                                        </div>
                                        <div class="col-md-2">
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

                                </div>
                                </div> <!-- end row -->


                                <div class="form-group" style="padding-left: 4px">
                                    <div class="col-md-12">
                                        <label class="control-label" style=" padding: 0;margin: 10px -18px;">
                                        Address</label>
                                        <input name="address" class="form-control" type="text" 
                                            value="">
                                        <span class="help-block"><?php echo form_error('address'); ?></span>
                                    </div>
                                </div>

                                <div class="form-group" style="padding-left: 4px">
                                    <div class="col-md-12">
                                        <label class="control-label" style=" padding: 0;margin: 10px -18px;">Description</label>
                                        <textarea name="description" id="description" class="form-control" type="text" rows="10"></textarea>
                                        <span class="help-block"><?php echo form_error('description'); ?></span>
                                    </div>
                                </div>


                                <!-- Row Details  -->
                                <div class="row">
                                    <!-- left  -->
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">City</label>
                                            <div class="col-md-9">
                                                <?php if(sizeof($city) > 0): ?>
                                                    <select id="select1" class="form-control" name="city">
                                                        <?php foreach($city as $ct): ?>
                                                            <option 
                                                                value="<?php echo $ct['city'] ?>" 
                                                                code="<?php echo $ct['city'] ?>">
                                                                <?php echo $ct['city'] ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                <?php endif; ?>
                                                <span class="help-block"><?php echo form_error('city'); ?></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3">Size land</label>
                                            <div class="col-md-9">
                                                <input name="size_land" class="form-control" type="text" 
                                                    value="">
                                                <span class="help-block"><?php echo form_error('size_land'); ?></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3">Bedroom</label>
                                            <div class="col-md-9">
                                                <input name="bedroom" class="form-control" type="number" 
                                                    value="">
                                                <span class="help-block"><?php echo form_error('bedroom'); ?></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3">Bathroom</label>
                                            <div class="col-md-9">
                                                <input name="bathroom" class="form-control" type="number" 
                                                    value="">
                                                <span class="help-block"><?php echo form_error('bathroom'); ?></span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Right  -->
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Area</label>
                                            <div class="col-md-9">
                                                <?php if(sizeof($area) > 0): ?>
                                                    <select name="area" id="select2" class="form-control" >
                                                        <?php foreach($area as $ar): ?>
                                                            <option 
                                                                value="<?php echo $ar['area'] ?>" 
                                                                code="<?php echo $ar['city'] ?>">
                                                                <?php echo $ar['area'] ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                <?php endif; ?>
                                                <span class="help-block"><?php echo form_error('area'); ?></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3">Size Building</label>
                                            <div class="col-md-9">
                                                <input name="size_building" class="form-control" type="text" 
                                                    value="">
                                                <span class="help-block"><?php echo form_error('size_building'); ?></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Orientation</label>
                                            <div class="col-md-9">
                                                <input name="orientation" class="form-control" type="text" 
                                                    value="">
                                                <span class="help-block"><?php echo form_error('orientation'); ?></span>
                                            </div>
                                        </div>
<!--                                         <div class="form-group">
                                            <label class="control-label col-md-3">Price Level</label>
                                            <div class="col-md-9">
                                                <select name="price_level" class="form-control">
                                                    <option value="< 1M">< 1M</option>
                                                    <option value="1 - 2M">1 - 2M</option>
                                                    <option value="2 - 3M">2 - 3M</option>
                                                    <option value="> 3M">> 3M</option>
                                                </select>
                                                <span class="help-block"><?php echo form_error('price_level'); ?></span>
                                            </div>
                                        </div> -->
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

<script src="<?php echo base_url('assets/js/bootstrap3-typeahead.min.js')?>"></script>
<script type="text/javascript">
    $(document).ready(function(e){
        var site_url = "<?php echo site_url(); ?>";
        var input = $("input[name=agent]");
        $.get(site_url+'admin/user/json_search_agent', function(data){
            input.typeahead({
                source: data,
                minLength: 0,
            });
        }, 'json');

        input.keyup(function(){
            $('#phone').val('');
            $('#email').val('');
        });

        input.change(function(){
            $("#agent_id").val("-1");   
            var current = input.typeahead("getActive");
            if (input.val() == current.name) {
                $('#agent_id').val(current.id);
                $('#phone').val(current.phone);
                $('#email').val(current.address);
            } else {
                $("#agent_id").val("-1");   
            }
        });
    });


    // Area Drop Down 
    $("#select1").change(function() {
        if($(this).data('options') === undefined) {
            $(this).data('options', $('#select2 option').clone());
      
        }
        var code = $('option:selected', this).attr('code');
        var options = $(this).data('options').filter('[code="'+ code +'"]');
        $('#select2').html(options);
    });
</script>


</body>
</html>

