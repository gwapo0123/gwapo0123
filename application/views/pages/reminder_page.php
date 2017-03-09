<?php include(APPPATH.'/views/templates/header.php'); ?>
<?php include(APPPATH.'/views/templates/navbar.php'); ?>
<?php include(APPPATH.'/views/modals/add_reminder_modal.php'); ?>
<div class="container">
	<div class="row custom-margin-bottom">
		<div class="col-md-12">
			<button type="button" class="btn btn-default" data-toggle="modal" data-target="#add_reminder_modal">Add Reminder</button>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Title</th>
						<th>Message</th>
						<th>Date</th>
					</tr>
				</thead>
				<tbody>
					<?php
						if(!empty($all_reminders)){
							foreach($all_reminders as $reminder){
								echo "<tr>";
									echo "<td>".$reminder->title."</td>";
									echo "<td>".$reminder->message."</td>";
									echo "<td>".$reminder->date."</td>";
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