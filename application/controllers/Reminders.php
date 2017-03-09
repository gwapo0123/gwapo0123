<?php 
	class Reminders extends CI_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->model('Driver_Model');
			$this->load->model('Reminder_Model');
		}

		public function index(){
			$data['title'] = "Reminder";
			$data['all_reminders'] = $this->Reminder_Model->fetch_all_reminders_query();
			$this->load->view('pages/reminder_page', $data);
		}

		// Add reminder
		public function add_reminder(){
			echo "add reminder";
			$reminder_id = $this->generate_reminder_id();
			$title = $this->input->post('title');
			$message = $this->input->post('message');
						
			$date = new DateTime();

			$data = array(
				'id' => $reminder_id,
				'title' => $title,
				'message' => $message,
				'date' => $date->format('Y-m-d H:i:s')
				);		
			
			$drivers = $this->Driver_Model->fetch_all_drivers_query();
				foreach ($drivers as $driver) {
					$driver_data = array(
							'driverID' => $driver->id,
							'reminderID' => $reminder_id,
							'status' => '0'
						);

					var_dump($driver_data);
					$this->Reminder_Model->add_reminder_status($driver_data);
				}	
			$this->Reminder_Model->add_reminder_query($data);
		}

		// Generate reminder id
		function generate_reminder_id($length = 5, $keyspace = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'){
			$str = 'RM';
			$max = mb_strlen($keyspace, '8bit') - 1;
			for ($i = 0; $i < $length; ++$i) {
				$str .= $keyspace[rand(0 , $max)];
			}
			return $str;
		}
	}
