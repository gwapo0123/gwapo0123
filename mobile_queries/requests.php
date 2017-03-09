<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	if (isset($_POST["request"]) && isset($_POST["json"])){

		require_once('queries.php');

		$request = $_POST['request'];

		$json = $_POST['json'];
		$jsonObj = json_decode($json);

		$query = new Queries();

		switch ($request) {
			// Login
			case 'login':
				$query->login($jsonObj);
				break;
			//  Change password
			case 'change_password':
				$fetchDriver = $query->fetchDriverInformation($jsonObj);
				$query->changePassword($fetchDriver, $jsonObj);
				break;
			// Fetch driver information
			case 'fetch_driver_information':
				$query->fetchDriverInformation($jsonObj);
				break;	
			// Update driver information
			case 'update_driver_information':
				$query->updateDriverInformation($jsonObj);
				$query->fetchDriverInformation($jsonObj);
				break;
			// Update driver location
			case 'update_driver_location':
				$query->updateDriverLocation($jsonObj);
				break;
			// Fetch taxi information
			case 'fetch_taxi_information':
				$query->fetchTaxiInformation($jsonObj);
				break;	
			// Fetch all taxi information
			case 'fetch_all_taxi_information':
				$query->fetchAllTaxiInformation();
				break;	
			// Fetch rented taxi information
			case 'fetch_rented_taxi_information':
				$rentalID = $query->fetchRentalID($jsonObj);
				$query->fetchRentedTaxiInformation($rentalID);
				break;
			// Fetch rental 
			case 'fetch_rental':
				$rentalID = $query->fetchRentalID($jsonObj);
				$query->fetchRental($rentalID);
				break;
			// Fetch rental history
			case 'fetch_rental_history':
				$query->fetchRentalHistory($jsonObj);
				break;
			// Reminder
			case 'reminder':
				$query->fetchReminder($jsonObj);
				break;
			// Update reminder status
			case 'reminder_status':
				$query->updateReminderStatus($jsonObj);
				break;
		}
	}
	else {
		echo "No data supplied";
	}
}

