</body>
</html>
<script src="<?php echo base_url();?>/js/jquery-3.1.1.min.js"></script>
<script src="<?php echo base_url();?>/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>/js/jquery.dataTables.js"></script>
<script src="<?php echo base_url();?>/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url();?>/js/modal.js"></script>

<script src="<?php echo base_url();?>/js/bootstrap-select.min.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
    	$('#datatable').DataTable();
	});

	$('#div_google_map').ready( function() {
    var time = 5
    setInterval( function() {
        time--;
        if (time === 0) {
            location.reload()
        }    
    }, 1000 );
});
</script>