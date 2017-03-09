<?php 
	class Drivers extends CI_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->model('Driver_Model');
		}

		// Index
		public function index(){
			$data['title'] = "Driver";
			$data['all_drivers'] = $this->Driver_Model->fetch_all_unarchive_drivers_query();
			$this->load->view('pages/driver_page', $data);

			// $this->test();
		}

		// Generate driver id
		function generate_driver_id($length = 5, $keyspace = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'){
			$str = 'D';
			$max = mb_strlen($keyspace, '8bit') - 1;
			for ($i = 0; $i < $length; ++$i) {
				$str .= $keyspace[rand(0, $max)];
			}
			return $str;
		}

		// Add driver
		public function add_driver(){

			$first_name = $this->input->post('first_name');
			$middle_name = $this->input->post('middle_name');
			$last_name = $this->input->post('last_name');
			$email_address = $this->input->post('email_address');
			$complete_address = $this->input->post('complete_address');
			$contact_number = $this->input->post('contact_number');
			$emergency_number = $this->input->post('emergency_number');
			$license_number = $this->input->post('license_number');

			$data = array(
				'id' => $this->generate_driver_id(),
				'fname' => $first_name,
				'mname' => $middle_name,
				'lname' => $last_name,
				'email_address' => $email_address,
				'complete_address' => $complete_address,
				'contact_no' => $contact_number,
				'emergency_no' => $emergency_number,
				'license_no' => $license_number
				);

			$this->Driver_Model->add_driver_query($data);
		}	

		public function archive_driver($id){
			$this->Driver_Model->set_archive_status($id);
		}

		public function unarchive_driver(){
			$id = $this->input->post('driver_id');
			$this->Driver_Model->set_unarchive_status($id);
		}

		// Edit driver
		public function edit_driver(){

			$id = $this->input->post('id');
			$first_name = $this->input->post('first_name');
			$middle_name = $this->input->post('middle_name');
			$last_name = $this->input->post('last_name');
			$email_address = $this->input->post('email_address');
			$complete_address = $this->input->post('complete_address');
			$contact_number = $this->input->post('contact_number');
			$emergency_number = $this->input->post('emergency_number');
			$license_number = $this->input->post('license_number');

			$data = array(
				'id' => $id,
				'fname' => $first_name,
				'mname' => $middle_name,
				'lname' => $last_name,
				'email_address' => $email_address,
				'complete_address' => $complete_address,
				'contact_no' => $contact_number,
				'emergency_no' => $emergency_number,
				'license_no' => $license_number
				);

			$this->Driver_Model->edit_driver_query($data);
		}

		public function list_archive_drivers(){
			$data['title'] = "Driver";
			$data['all_archive_drivers'] = $this->Driver_Model->fetch_all_archive_drivers_query();
			$this->load->view('pages/list_archive_drivers_page', $data);	
		}

		public function test(){
			 var_dump($this->Driver_Model->fetch_all_rented_drivers_query());
		}
	}
