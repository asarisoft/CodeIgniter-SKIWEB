<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<h4 class="title_page"><?php echo $sell->subject ?></h4>
				<div class="panel-body">
					<p> Please crop image to (1060 x 50px) before upload</p>
		            <form action="<?php echo site_url("admin/sell/upload") ?>" id="form-upload"> 
		              <input type="hidden" value="<?php echo $sell_id ?>" name="id" id="input_id"/>            
		              <div class="fileinput fileinput-new input-group" data-provides="fileinput">
		                <div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
		                <span class="input-group-addon btn btn-default btn-file"><span class="fileinput-new"><i class="glyphicon glyphicon-paperclip"></i> Select file</span><span class="fileinput-exists"><i class="glyphicon glyphicon-repeat"></i> Change</span><input type="file" name="file[]" multiple="multiple" id="file"></span>
		                <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput"><i class="glyphicon glyphicon-remove"></i> Remove</a>
		                <a href="#" id="upload-btn" class="input-group-addon btn btn-info fileinput-exists"><i class="glyphicon glyphicon-open"></i> Upload</a>
		              </div>
		            </form>

		            <!-- <progress id="progress-bar" max="100" value="0"></progress> -->
		            <div class="progress" style="display:none;">
		              <div id="progress-bar" class="progress-bar progress-bar-info progress-bar-striped " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
		                20%
		              </div>
		            </div>

		            <div id="errormessage"></div>

		            <ul class="list-group"><ul>
				</div>
			</div>
		</div>
	</div>
</div> 

<script type="text/javascript">
	
	$(function () {
	var inputFile = $('input#file');
	var uploadURI = $('#form-upload').attr('action');
	var progressBar = $('#progress-bar');

	listFilesOnServer();

	$('#upload-btn').on('click', function(event) {
		var inputID = $('#input_id')[0].value;
		var filesToUpload = inputFile[0].files;
		$('#errormessage').hide();

		if (filesToUpload.length > 0 ) {
			var formData = new FormData();
			for (var i=0; i<filesToUpload.length; i++){
				file = filesToUpload[i];
				formData.append("file[]", file, file.name);
			}
			console.log(inputID);
			formData.append("id", inputID);
			$.ajax({
				url: uploadURI,
				type: 'post',
				data: formData,
				processData: false,
				contentType: false,
				success: function(data) {
					// console.log( data );
					listFilesOnServer();
					hideProgress();
				},
                error: function(data){
                    console.log( data );
                    $('#errormessage').show();
                    $('#errormessage').html(data.responseText);
                    hideProgress();
                },
				xhr: function() {
					var xhr = new XMLHttpRequest();
					xhr.upload.addEventListener("progress", function(event) {
						if (event.lengthComputable) {
							var percentComplete = Math.round( (event.loaded / event.total) * 100 );
							$('.progress').show();
							progressBar.css({width: percentComplete + "%"});
							progressBar.text(percentComplete + '%');
						};
					}, false);

					return xhr;
				}
			});
		}
	});

	$('body').on('click', '.remove-file', function () {
		var me = $(this);
		$.ajax({
			url: uploadURI,
			type: 'post',
			data: {file_to_remove: me.attr('data-file'), id:"<?php echo ($sell_id) ?>"},
			success: function() {
				me.closest('li').remove();
			}
		});

	})

	function listFilesOnServer () {
		var inputID = $('#input_id')[0].value;
		var items = [];
		$.getJSON("<?php echo base_url('admin/sell/filelist/'.$sell_id.'/') ?>", function(data) {
			$.each(data, function(index, element) {
				if (element != "thumb") {
				var image = '<img class="lst_thmb" src="<?php echo base_url('assets/img/sell/'.$sell_id.'/') ?>'+ element +'">';
				items.push('<li class="list-group-item">' + image + '<span class="element"> '+ element  + '</span><div class="pull-right"><a href="#" data-file="' + element + '" class="remove-file"><i class="glyphicon glyphicon-remove"></i></a></div></li>');
				}
			});
			$('.list-group').html("").html(items.join(""));
		});
	}

	$('body').on('change.bs.fileinput', function(e) {
		hideProgress();
	});

	function hideProgress() {
		$('.progress').hide();
		progressBar.text("0%");
		progressBar.css({width: "0%"});
	}
});
</script>

