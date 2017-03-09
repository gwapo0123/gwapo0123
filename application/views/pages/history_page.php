<?php include(APPPATH.'/views/templates/header.php'); ?>
<?php include(APPPATH.'/views/templates/navbar.php'); ?>
<div class="container">
	<div class="row custom-margin-bottom">
		<div class="col-md-12">
			<button type="button" class="btn btn-default pull-right" onclick="window.print()">Print</button>
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
						if(!empty($all_historys)){
							foreach($all_historys as $history){
								echo "<tr>";
									echo "<td>".$history->id."</td>";
									echo "<td>".$history->driver_id."</td>";
									echo "<td>".$history->taxi_id."</td>";
									echo "<td>".$history->rental_date_from."</td>";
									echo "<td>".$history->rental_date_to."</td>";
									echo "<td>".$history->total_payment."</td>";
									echo "<td>";
									echo "<a class='btn btn-primary btn-block print-history'  data-id='".$history->id."' data-toggle='' data-target=''>Delete</a>";
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