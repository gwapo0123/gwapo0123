<?php include(APPPATH.'/views/templates/header.php'); ?>
<?php include(APPPATH.'/views/templates/navbar.php'); ?>
<div class="container">
	<h2 class="custom-margin-bottom">List of rented/not rented taxi</h2>      
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
						<th>Availability status</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$date = new DateTime();
						if(!empty($all_rentals)){
							foreach($all_rentals as $rental){
							echo "<tr>";
								echo "<td>".$rental->id."</td>";
								echo "<td>".$rental->driver_id."</td>";
								echo "<td>".$rental->taxi_id."</td>";
								echo "<td>".$rental->rental_date_from."</td>";
								echo "<td>".$rental->rental_date_to."</td>";
								echo "<td>".$rental->total_payment."</td>";
								if($date->format('Y-m-d') <= $rental->rental_date_to){
									echo "<td>RENTED</td>";
								}
								else{
									echo "<td>NOT RENTED</td>";
								}	
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