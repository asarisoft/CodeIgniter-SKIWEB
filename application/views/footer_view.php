


<!-- Javascript  .............................................. -->
<script src="<?php echo base_url('assets/js/jquery-3.2.1.min.js')?>"></script>
<script src="<?php echo base_url('assets/bootstrap-4.0/js/popper.js')?>"></script>
<script src="<?php echo base_url('assets/bootstrap-4.0/js/bootstrap.min.js')?>"></script>


<!-- Fancy Box Gallery -->
<script type="text/javascript" src="<?php echo base_url('assets/source/jquery.fancybox.pack.js?v=2.1.5')?>"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			/*
			 *  Simple image gallery. Uses default settings
			 */

			$('.fancybox').fancybox();
		});

		$(function () {
            $('.video').fancybox({
                width: 640,
                height: 400,
                type: 'iframe'
            });
        });
	</script>

</body>