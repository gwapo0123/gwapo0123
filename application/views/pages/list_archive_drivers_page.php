<?php include(APPPATH.'/views/templates/header.php'); ?>
<?php include(APPPATH.'/views/templates/navbar.php'); ?>
<div class="container">
	<h2 class="custom-margin-bottom">Archive Drivers</h2>      
	<div class="row">
		<div class="col-md-12">
			<table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>ID</th>
						<th>Email Address</th>
						<th>Name</th>
						<th>Address</th>
						<th>Contact number</th>
						<th>Emergency number</th>
						<th>License number</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						if(!empty($all_archive_drivers)){
	    					foreach($all_archive_drivers as $archive_driver){
								echo "<tr>";
									echo "<td class='td_id'>".$archive_driver->id."</td>";
									echo "<td class='td_email_address'>".$archive_driver->email_address."</td>";
									echo "<td class='td_full_name' data-fname='".$archive_driver->fname."' data-mname='".$archive_driver->mname."' data-lname='".$archive_driver->lname."'>".$archive_driver->fname." ".ucfirst(substr($archive_driver->mname, 0, 1)).". ".$archive_driver->lname."</td>";
									echo "<td class='td_complete_address'>".$archive_driver->complete_address."</td>";
									echo "<td class='td_contact_number'>".$archive_driver->contact_no."</td>";
									echo "<td class='td_emergency_number'>".$archive_driver->emergency_no."</td>";
									echo "<td class='td_license_number'>".$archive_driver->license_no."</td>";
									echo "<td>";
										echo "<a class='btn btn-success unarchive-driver' data-id='".$archive_driver->id."' onclick='javascript:window.location.reload()'>UNARCHIVE</a>";	
									echo "</td>";
								echo "</tr>";
							}
	    				}
					?>
				</tbody>
			</table>
		</div>
	</div>	
</div>
<?php include(APPPATH.'/views/templates/footer.php'); ?>

<script type="text/javascript">
	$('.unarchive-driver').click(function(){             
		var driver_id = $(this).data('id');
		console.log(driver_id);
		 $.ajax({
	        type:"post",
	        url: base_url + "/drivers/unarchive_driver",
	        data: {driver_id:driver_id},
	        success:function(res){
	          console.log(res);
	        }
      	});	
	});
</script>