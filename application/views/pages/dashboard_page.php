<?php include(APPPATH.'/views/templates/header.php'); ?>
<?php include(APPPATH.'/views/templates/navbar.php'); ?>

<div class="container" id = "div_google_map">
	<div class="row">
		<div class="col-md-8">
		</div>
		<div class="col-md-3">
			<select name="" id = "search_select" class="selectpicker pull-right" data-live-search="true">
			</select> 	         
		</div>
		<div class="col-md-1">
			<button type ="button" id = "search_button" class="btn btn-default btn-block"><i class="glyphicon glyphicon-search"></i></button>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-md-12">
		<?php echo $map['js']; ?>
		<?php echo $map['html']; ?>
		</div>
	</div>
</div>

<?php include(APPPATH.'/views/templates/footer.php'); ?>

<script type="text/javascript">
$( document ).ready(function() {
    $.ajax({
	        type:"post",
	        url: base_url + "/dashboards/fetch_all_rented_drivers_json/",
	        data: "",
	        success:function(data){
	         	var json = $.parseJSON(data);
	         	$.each(json,function(i,key){
	         		var full_name = key.fname + " " + key.mname.charAt(0) + ". " + key.lname
				     $('#search_select').append( $('<option></option>').val(key.id).html(full_name) )
				});
	        }
      	});	
});	

$('#search_button').click(function(){             
		var driver_id = $("#search_select option:selected").val();
		console.log(driver_id);
		 $.ajax({
	        type:"post",
	        url: base_url + "/dashboards/search_rented_driver/"+driver_id,
	        data: {},
	        success:function(res){
	          // console.log(res);
	        }
      	});	
	});
</script>;