<?php 
	class Rentals extends CI_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->model('Driver_Model');
			$this->load->model('Taxi_Model');
			$this->load->model('Rental_Model');
		}

		public function index(){
			$data['title'] = "Rental";
			$data['all_current_rentals'] = $this->Rental_Model->fetch_all_current_rentals();
			$this->load->view('pages/rental_page', $data);
		}

		// Generate rental id
		function generate_rental_id($length = 5, $keyspace = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'){
			$str = 'RM';
			$max = mb_strlen($keyspace, '8bit') - 1;
			for ($i = 0; $i < $length; ++$i) {
				$str .= $keyspace[rand(0, $max)];
			}
			return $str;
		}

		public function list_rented_not_rented(){
			$data['title'] = "Rental";
			$data['all_rentals'] = $this->Rental_Model->fetch_all_rentals();
			$this->load->view('pages/list_rented_not_rented_page', $data);	
		}

		public function all_drivers(){
			$result = $this->Driver_Model->fetch_all_unarchive_drivers_query();
			echo json_encode($result);
		}

		public function all_taxis(){
			$result = $this->Taxi_Model->fetch_all_taxis_query();
			echo json_encode($result);	
		}

		public function add_rental(){
			$driver_id = $this->input->post('driver_id');
			$taxi_id = $this->input->post('taxi_id');
			$date_from = $this->input->post('date_from');
			$date_to = $this->input->post('date_to');

			$total_payment = $date_to - $date_from;

			$date_f = strtotime($date_from);
			$date_t = strtotime($date_to);
			$diff_seconds = $date_t - $date_f;
			$days = $diff_seconds / 86400;
			$total_payment = $days * 1000;

			$data = array(
				'id' => $this->generate_rental_id(),
				'driver_id' => $driver_id,
				'taxi_id' => $taxi_id,
				'rental_date_from' => $date_from,
				'rental_date_to' => $date_to,
				'total_payment' => $total_payment
				);
			$this->Rental_Model->add_rental_query($data);
		}

		public function extend_date_to(){

			$id = $this->input->post('id');
			$date_from = $this->input->post('date_from');
			$date_to = $this->input->post('date_to');

			$date_f = strtotime($date_from);
			$date_t = strtotime($date_to);
			$diff_seconds = $date_t - $date_f;
			$days = $diff_seconds / 86400;
			$total_payment = $days * 1000;

			$data = array(
				'id' => $id,
				'rental_date_from' => $date_from,
				'rental_date_to' => $date_to,
				'total_payment' => $total_payment
				);
			$this->Rental_Model->extend_date_to_query($data);	
		}
	}
