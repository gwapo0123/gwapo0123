<?php 
class Queries{
	
	// Login
	public function login($jsonObj){ 

		$con = mysqli_connect('localhost','root','','ASS');

		$sql = "SELECT *
	 		 	FROM driver 
	 		 	WHERE email_address = '$jsonObj->email_address' AND password = '$jsonObj->password'
	 		 	";

		$result = mysqli_query($con,$sql);
		$numberRow = mysqli_num_rows($result);
		$fetch = mysqli_fetch_assoc($result);

		if ($numberRow > 0) {
			echo json_encode($fetch);
		} 	
		else{
			echo "Error";
		}
		
		mysqli_close($con);
	}

	// Change password
	public function changePassword($fetchDriver, $jsonObj){
		
		$con = mysqli_connect('localhost','root','','ASS');
		
		if($fetchDriver['change_password_status'] == 0){	

			$sql = "UPDATE driver
					SET password = '$jsonObj->password',
					change_password_status = 1
					WHERE id = '$jsonObj->id'
					";

			$result = mysqli_query($con,$sql);

			mysqli_close($con);
		}else{
			echo "Error";
		}
	}

	// Fetch driver information
	public function fetchDriverInformation($jsonObj){
		
		$con = mysqli_connect('localhost','root','','ASS');

		$sql = "SELECT *
	 		 	FROM driver 
	 		 	WHERE id = '$jsonObj->id'
	 		 	";

		$result = mysqli_query($con,$sql);
		$numberRow = mysqli_num_rows($result);
		$fetch = mysqli_fetch_assoc($result);

		if($jsonObj->fetchJSON == "true"){
			if ($numberRow > 0) {
			echo json_encode($fetch);
			} 	
			else{
				echo "Error";
			}
		}
		
		mysqli_close($con);

		return $fetch;
	} 

	// Update driver information
	public function updateDriverInformation($jsonObj) { 

		$con = mysqli_connect('localhost','root', '','ASS');

		$image = $jsonObj->image;
		$path = "images/".$jsonObj->id."_pp.jpeg";

		$sql = "UPDATE driver 
				SET image = '$path',
				fname = '$jsonObj->fname', 
				mname = '$jsonObj->mname', 
				lname = '$jsonObj->lname', 
				complete_address = '$jsonObj->complete_address', 
				contact_no = '$jsonObj->contact_no', 
				emergency_no = '$jsonObj->emergency_no', 
				license_no = '$jsonObj->license_no' 
				WHERE id = '$jsonObj->id'
				";

		$result = mysqli_query($con,$sql);
		mysqli_close($con);
		file_put_contents($path, base64_decode($image));
	}

	// Update driver current location
	public function updateDriverLocation($jsonObj) { 

		$con = mysqli_connect('localhost','root', '','ASS');

		$sql = "UPDATE driver 
				SET lat = '$jsonObj->lat', lng = '$jsonObj->lng'
				WHERE id = '$jsonObj->id'
				";

		$result = mysqli_query($con,$sql);
		mysqli_close($con);
	}	

	// Fetch taxi information
	public function fetchTaxiInformation($jsonObj){
		
		$con = mysqli_connect('localhost','root','','ASS');

		$sql = "SELECT *
	 		 	FROM taxi 
	 		 	WHERE id = '$jsonObj->id'
	 		 	";

		$result = mysqli_query($con,$sql);
		$numberRow = mysqli_num_rows($result);
		$fetch = mysqli_fetch_assoc($result);

		if ($numberRow > 0) {
			echo json_encode($fetch);
		} 	
		else{
			echo "Error";
		}
		
		mysqli_close($con);
	} 


	// Fetch all taxi information
	public function fetchAllTaxiInformation(){
		
		$con = mysqli_connect('localhost','root','','ASS');

		$sql = "SELECT *
	 		 	FROM taxi 
	 		 	";

	 	$result = mysqli_query($con,$sql);
		$numberRow = mysqli_num_rows($result);
		
		$json= array();

		if($numberRow > 0){
			while($row = mysqli_fetch_assoc($result)){
				$json['all_taxi_information'][] = $row;
			}
			echo json_encode($json);
						    
		}
		else{
			echo json_encode(null);
		}
		
		mysqli_close($con);
	}

	// Fetch rental ID
	public function fetchRentalID($jsonObj){

		$con = mysqli_connect('localhost','root','','ASS');

		$sql = "SELECT * 
				FROM rental 
				WHERE rental.driver_id = '$jsonObj->id' AND
				CURDATE() BETWEEN rental_date_from AND rental_date_to
				";

		$result = mysqli_query($con,$sql);
		$numberRow = mysqli_num_rows($result);
		$fetch = mysqli_fetch_assoc($result);

		if ($numberRow > 0) {
			return $fetch['id'];
		} 	
			
		mysqli_close($con);
	}

	// Fetch rented taxi information
	public function fetchRentedTaxiInformation($rentalID){

		$con = mysqli_connect('localhost','root','','ASS');

		$sql = "SELECT * FROM rental WHERE id = 'rem1'
				";

		$result = mysqli_query($con,$sql);
		$numberRow = mysqli_num_rows($result);
		$fetch = mysqli_fetch_assoc($result);

		if ($numberRow > 0) {
			echo json_encode($fetch);
		} 	
		else{
			echo "Error";
		}
		
		mysqli_close($con);
	}

	// Fetch rental 
	public function fetchRental($rentalID){
	
		$con = mysqli_connect('localhost' , 'root', '', 'ASS');

		$sql = "SELECT rental.*, driver.fname, driver.mname, driver.lname
				FROM rental LEFT JOIN driver ON rental.driver_id = driver.id
				WHERE rental.id = '$rentalID' AND
				CURDATE() BETWEEN rental_date_from AND rental_date_to
				";

		$result = mysqli_query($con,$sql);
		$numberRow = mysqli_num_rows($result);
		$fetch = mysqli_fetch_assoc($result);

		if ($numberRow > 0) {
			echo json_encode($fetch);
		} 	
		else{
			echo "Error";
		}
		
		mysqli_close($con);
	}	

	// Fetch rental history
	public function fetchRentalHistory($jsonObj){
	
		$con = mysqli_connect('localhost' , 'root', '', 'ASS');

		$sql = "SELECT taxi.*, rental.* 
				FROM taxi LEFT JOIN rental 
				ON taxi.id = rental.taxi_id 
				WHERE rental.driver_id = '$jsonObj->id' AND CURDATE() > rental_date_to
				";

		$result = mysqli_query($con,$sql);
		$numberRow = mysqli_num_rows($result);

		$json= array();

		if($numberRow > 0){
			while($row = mysqli_fetch_assoc($result)){
				$json['rental_history'][] = $row;
			}
			echo json_encode($json);
						    
		}
		else{
			echo json_encode(null);
		}
		
		mysqli_close($con);
	}	

	
	public function fetchReminder($jsonObj){
	
		$con = mysqli_connect('localhost' , 'root', '', 'ASS');

		$sql = "SELECT reminder.*, reminder_status.status 
				FROM driver, reminder LEFT JOIN reminder_status ON reminder.id = reminder_status.reminderID 
				WHERE driver.id = '$jsonObj->id'
				ORDER BY date
				";	

		$result = mysqli_query($con,$sql);
		$numberRow = mysqli_num_rows($result);

		$json= array();

		if($numberRow > 0){
			while($row = mysqli_fetch_assoc($result)){
				$json['reminder'][] = $row;
			}
			echo json_encode($json);
						    
		}
		else{
			echo json_encode(null);
		}
		
		mysqli_close($con);
	}

	// Update reminder status
	public function updateReminderStatus($jsonObj) { 

		$con = mysqli_connect('localhost','root', '','ASS');

		$sql = "UPDATE reminder_status 
				SET status = '1' 
				WHERE driverID = '$jsonObj->driverID' AND reminderID = '$jsonObj->reminderID'
				";

		$result = mysqli_query($con,$sql);
		mysqli_close($con);
	}	
}

