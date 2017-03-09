<?php include(APPPATH.'/views/templates/header.php'); ?>
<?php include(APPPATH.'/views/templates/navbar.php'); ?>
<?php include(APPPATH.'/views/modals/add_rental_modal.php'); ?>
<?php include(APPPATH.'/views/modals/edit_rental_modal.php'); ?>
<div class="container">
	<div class="row custom-margin-bottom">
		<div class="col-md-6">
			<a class="btn btn-default add-rental">Add Rental</a>
		</div>
		<div class="col-md-6">
			<button type="button" class="btn btn-default pull-right" onclick="window.print()">Print</button>
			<a href="<?php echo base_url(); ?>rentals/list_rented_not_rented" class="btn btn-default pull-right" style="margin-right: 5px">List rented/not rented</a>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Rental ID</th>
						<th>Driver ID</th>
						<th>Taxi ID</th>
						<th>Date from</th>
						<th>Date to</th>
						<th>Total payment</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						if(!empty($all_current_rentals)){
						foreach($all_current_rentals as $current_rental){
							echo "<tr>";
								echo "<td class = 'td_id'>".$current_rental->id."</td>";
								echo "<td class = 'td_driver_id'>".$current_rental->driver_id."</td>";
								echo "<td class = 'td_taxi_id'>".$current_rental->taxi_id."</td>";
								echo "<td class = 'td_date_from'>".$current_rental->rental_date_from."</td>";
								echo "<td class = 'td_date_to'>".$current_rental->rental_date_to."</td>";
								echo "<td class = 'td_total_payment'>".$current_rental->total_payment."</td>";
								echo "<td>";
									echo "<a class='btn btn-warning btn-block edit-rental' data-id='".$current_rental->id."'>Edit</a>";	
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
	$('.add-rental').click(function(){             
		console.log("Add rental");
		 $.ajax({
	        type:"post",
	        url: base_url + "/rentals/all_drivers/",
	        data: "",
	        success:function(data){
	         	var json = $.parseJSON(data);
	         	$.each(json,function(i,key){	
				     $('#add_rental_modal #lbl_driver').append( $('<option></option>').val(key.id).html(key.fname) )
				});
	        }
      	});	
		$.ajax({
	        type:"post",
	        url: base_url + "/rentals/all_taxis/",
	        data: "",
	        success:function(data){
	         	var json = $.parseJSON(data);
	         	$.each(json,function(i,key){
				     $('#add_rental_modal #lbl_taxi').append( $('<option></option>').val(key.id).html(key.id) )
				});
	        }
      	});	
		$('#add_rental_modal').modal('show');
	});

	$('.edit-rental').click(function(){             
		console.log("Edit rental");

		var id = $(this).closest("tr").find(".td_id").text();
		var driver_id = $(this).closest("tr").find(".td_driver_id").text();
		var taxi_id = $(this).closest("tr").find(".td_taxi_id").text();
		var date_from = $(this).closest("tr").find(".td_date_from").text();
		var date_to = $(this).closest("tr").find(".td_date_to").text();
		var total_payment = $(this).closest("tr").find(".td_total_payment").text();

		$('#edit_rental_modal #edit_lbl_id').val(id);
	 	$('#edit_rental_modal #edit_lbl_driver').val(driver_id);
	 	$('#edit_rental_modal #edit_lbl_taxi').val(taxi_id);
	 	$('#edit_rental_modal #edit_lbl_date_from').val(date_from);
	 	$('#edit_rental_modal #edit_lbl_date_to').val(date_to);
	 	$('#edit_rental_modal #edit_lbl_total_payment').val(total_payment);

	 	$('#edit_rental_modal').modal('show');	
	
	});
</script>