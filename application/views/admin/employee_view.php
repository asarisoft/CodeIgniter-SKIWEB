	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			

<!-- 		<div class="row">
			<div class="col-lg-12">
				<h2 class="page-header">
					<span class="icon_"><i class="fa fa-user-circle fa-lg"></i></span>
					<span class="menu_page">Employee</span>
				</h2>
			</div>
		</div> -->
				
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<h4 class="title_page">Home > User</h4>
					<div class="panel-heading">
					    <a href="employee/add" class="btn btn-success" onclick="add()"><i class="glyphicon glyphicon-plus"></i>Add</a>
    					<button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i>Reload</button>
					</div>
					<div class="panel-body">
						<table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
				            <thead>
				                <tr>
				                    <th>Username</th>
				                    <th>Nama</th>
				                    <th>Jabatan</th>
				                    <th>Hak Akses</th>
				                    <th style="width:70px;">Tindakan</th>
				                </tr>
				            </thead>
				            <tbody>
				            </tbody>
				        </table>
					</div>
				</div>
			</div>
		</div><!--/.row-->	
	</div> <!-- End Content -->


  	<script type="text/javascript">

		var save_method; //for save method string
		var table;

		$(document).ready(function() {
		    table = $('#table').DataTable({ 
		        "processing": true, //Feature control the processing indicator.
		        "serverSide": true, //Feature control DataTables' server-side processing mode.
		        "order": [], //Initial no order.
		        "ajax": {
		            "url": "<?php echo site_url('admin/employee/ajax_list')?>",
		            "type": "POST"
		        },
		        "columnDefs": [
		        { 
		            "targets": [ -1 ], //last column
		            "orderable": false, //set not orderable
		        },
		        ],

		    });

		});

		function reload_table()
		{
		    table.ajax.reload(null,false); //reload datatable ajax 
		}

		function delete_(id)	{
		    if(confirm('Yakin untuk menghapus data?'))
		    {
		        $.ajax({
		            url : "<?php echo site_url('admin/employee/delete')?>/"+id,
		            type: "POST",
		            dataType: "JSON",
		            success: function(data)
		            {
		                $('#modal_form').modal('hide');
		                reload_table();
		            },
		            error: function (jqXHR, textStatus, errorThrown)
		            {
		                alert('Error deleting data');
		            }
		        });

		    }
		}
    </script>
</body>

</html>