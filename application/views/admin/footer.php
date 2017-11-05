    <script type="text/javascript">
        var save_method; 
        var table;
        $(document).ready(function() {
            table = $('#table').DataTable({ 
                "processing": true, 
                "serverSide": true,
                "order": [],
                "ajax": {
                    "url": "<?php echo site_url()?>" + "admin/<?php echo ($model_name) ?>/ajax_list",
                    "type": "POST"
                },
                "columnDefs": [{ 
                    "targets": [ -1 ], 
                    "orderable": false, 
                }],

            });
        });

        function reload_table() {
            table.ajax.reload(null,false); 
        }

        function delete_(id)    {
            if(confirm('Are you sure to delete data?')) {
                $.ajax({
                    url : "<?php echo site_url()?>" + "admin/<?php echo ($model_name) ?>/delete/" + id,
                    type: "POST",
                    dataType: "JSON",
                    success: function(data) {
                        $('#modal_form').modal('hide');
                        reload_table();
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert('Error deleting data');
                    }
                });
            }
        }
    </script>

</body>
</html>