<?php include(APPPATH.'/views/templates/header.php'); ?>
<?php include(APPPATH.'/views/templates/navbar.php'); ?>

<?php include(APPPATH.'/views/modals/add_driver_modal.php'); ?>
<?php include(APPPATH.'/views/modals/edit_driver_modal.php'); ?>
<?php include(APPPATH.'/views/modals/archive_driver_modal.php'); ?>

<div class="container">
	<div class="row custom-margin-bottom">
		<div class="col-md-6">
			<button type="button" class="btn btn-default" data-toggle="modal" data-target="#add_driver_modal">Add Driver</button>
		</div>
		<div class="col-md-6">
			<button type="button" class="btn btn-default pull-right" onclick="window.print()">Print</button>
			<a href="<?php echo base_url(); ?>drivers/list_archive_drivers" class="btn btn-default pull-right" style="margin-right: 5px">Archive Drivers</a>
		</div>
	</div>
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
						if(!empty($all_drivers)){
	    					foreach($all_drivers as $driver){
								echo "<tr>";
									echo "<td class='td_id'>".$driver->id."</td>";
									echo "<td class='td_email_address'>".$driver->email_address."</td>";
									echo "<td class='td_full_name' data-fname='".$driver->fname."' data-mname='".$driver->mname."' data-lname='".$driver->lname."'>".$driver->fname." ".ucfirst(substr($driver->mname, 0, 1)).". ".$driver->lname."</td>";
									echo "<td class='td_complete_address'>".$driver->complete_address."</td>";
									echo "<td class='td_contact_number'>".$driver->contact_no."</td>";
									echo "<td class='td_emergency_number'>".$driver->emergency_no."</td>";
									echo "<td class='td_license_number'>".$driver->license_no."</td>";
									echo "<td>";
										echo "<a class='btn btn-warning edit-driver'>Edit</a>";	
										echo "<a class='btn btn-danger archive-driver' data-id='".$driver->id."' onclick='javascript:window.location.reload()'>Archive</a>";
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
	$('.edit-driver').click(function(){             
		var id = $(this).closest("tr").find(".td_id").text();
		var email_address = $(this).closest("tr").find(".td_email_address").text();
		var first_name = $(this).closest("tr").find(".td_full_name").attr("data-fname");
		var middle_name = $(this).closest("tr").find(".td_full_name").attr("data-mname");
		var last_name = $(this).closest("tr").find(".td_full_name").attr("data-lname");
		var complete_address = $(this).closest("tr").find(".td_complete_address").text();
		var contact_number = $(this).closest("tr").find(".td_contact_number").text();
		var emergency_number = $(this).closest("tr").find(".td_emergency_number").text();
		var license_number = $(this).closest("tr").find(".td_license_number").text();

			$('#edit_driver_modal #lbl_id').val(id);
		 	$('#edit_driver_modal #lbl_email_address').val(email_address);
		 	$('#edit_driver_modal #lbl_first_name').val(first_name);
		 	$('#edit_driver_modal #lbl_middle_name').val(middle_name);
		 	$('#edit_driver_modal #lbl_last_name').val(last_name);
		 	$('#edit_driver_modal #lbl_complete_address').val(complete_address);
		 	$('#edit_driver_modal #lbl_contact_number').val(contact_number);
		 	$('#edit_driver_modal #lbl_emergency_number').val(emergency_number);
		 	$('#edit_driver_modal #lbl_license_number').val(license_number);

		 	$('#edit_driver_modal').modal('show');
	});	

	$('.archive-driver').click(function(){             
		var driver_id = $(this).data('id');
		console.log(driver_id);

		  $.ajax({
	        type:"post",
	        url: base_url + "/drivers/archive_driver/"+driver_id,
	        data: "",
	        success:function(data){
	          console.log(data);
	        }
      	});	
	});
</script>
