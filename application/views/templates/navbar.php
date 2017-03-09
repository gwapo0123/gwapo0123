<nav class="navbar navbar-default navbar-static-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php echo base_url()?>/logins/index">Auto Swift System</a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-right">
				<?php
				 echo "<li><a href='".base_url()."dashboards/index'>Dashboard</a></li>";
				 echo "<li><a href='".base_url()."taxis/index'>Taxi</a></li>";
				 echo "<li><a href='".base_url()."drivers/index'>Driver</a></li>";
				 echo "<li><a href='".base_url()."rentals/index'>Rental</a></li>";
				 echo "<li><a href='".base_url()."historys/index'>History</a></li>";
				 echo "<li><a href='".base_url()."reminders/index'>Reminder</a></li>";
				 echo "<li><a href='".base_url()."logins/logout'>Logout</a></li>";
				?>
			</ul>
		</div>
	</div>
</nav>