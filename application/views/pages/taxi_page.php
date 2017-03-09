<?php include(APPPATH.'/views/templates/header.php'); ?>
<?php include(APPPATH.'/views/templates/navbar.php'); ?>
<?php include(APPPATH.'/views/modals/add_taxi_modal.php'); ?>
<?php include(APPPATH.'/views/modals/edit_taxi_modal.php'); ?>
<?php include(APPPATH.'/views/modals/delete_taxi_modal.php'); ?>
<div class="container">
	<div class="row custom-margin-bottom">
		<div class="col-md-6">
			<button type="button" class="btn btn-default" data-toggle="modal" data-target="#add_taxi_modal">Add Taxi</button>
		</div>
		<div class="col-md-6">
			<button type="button" class="btn btn-default pull-right" onclick="window.print()">Print</button>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>ID</th>
						<th>Plate number</th>
						<th>Brand</th>
						<th>Body number</th>
						<th>Last change oil date</th>
						<th>Availability Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						if(!empty($all_taxis)){
							foreach($all_taxis as $taxi){
								echo "<tr>";
									echo "<td class = 'td_id'>".$taxi->id."</td>";
									echo "<td class = 'td_plate_no'>".$taxi->plate_no."</td>";
									echo "<td class = 'td_brand'>".$taxi->brand."</td>";
									echo "<td class = 'td_body_no'>".$taxi->body_no."</td>";
									echo "<td class = 'td_last_change_oil_date'>".$taxi->last_change_oil_date."</td>";
									if($taxi->availability_status == 0) {
										echo "<td>ACTIVE</td>";
									}
									else{
										echo "<td>NOT ACTIVE</td>";
									}
									echo "<td>";
										echo "<a class='btn btn-warning edit-taxi'>Edit</a>";	
										echo "<a class='btn btn-danger delete-taxi'  data-id='".$taxi->id."' data-toggle='' data-target='' onclick='javascript:window.location.reload()'>Delete</a>";
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
	$('.edit-taxi').click(function(){             
		var id = $(this).closest("tr").find(".td_id").text();
		var plate_number = $(this).closest("tr").find(".td_plate_no").text();
		var brand = $(this).closest("tr").find(".td_brand").text();
		var body_number = $(this).closest("tr").find(".td_body_no").text();
		var last_change_oil_date = $(this).closest("tr").find(".td_last_change_oil_date").text();

			$('#edit_taxi_modal #lbl_id').val(id);
		 	$('#edit_taxi_modal #lbl_plate_number').val(plate_number);
		 	$('#edit_taxi_modal #lbl_brand').val(brand);
		 	$('#edit_taxi_modal #lbl_body_number').val(body_number);
		 	$('#edit_taxi_modal #lbl_last_change_oil_date').val(last_change_oil_date);

		 	$('#edit_taxi_modal').modal('show');
	});	

	$('.delete-taxi').click(function(){             
		var taxi_id = $(this).data('id');
		 $.ajax({
	        type:"post",
	        url: base_url + "/taxis/delete_taxi/"+taxi_id,
	        data: "",
	        success:function(data){
	          console.log(data);
	        }
      	});	
	});
</script>
