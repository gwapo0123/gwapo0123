<?php 
	class Taxis extends CI_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->model('Taxi_Model');
		}

		public function index(){
			$data['title'] = "Taxi";
			$data['all_taxis'] = $this->Taxi_Model->fetch_all_taxis_query();
			$this->load->view('pages/taxi_page', $data);
		}

		// Add taxi
		public function add_taxi(){
			echo "add taxi";
			$plate_number = $this->input->post('plate_number');
			$brand = $this->input->post('brand');
			$body_number = $this->input->post('body_number');
			$last_change_oil_date = $this->input->post('last_change_oil_date');
			
			$data = array(
				'id' => $this->generate_taxi_id(),
				'plate_no' => $plate_number,
				'brand' => $brand,
				'body_no' => $body_number,
				'last_change_oil_date' => $last_change_oil_date
				);

			var_dump($data);
			$this->Taxi_Model->add_taxi_query($data);
		}

		// Edit taxi
		public function edit_taxi(){
			$id = $this->input->post('id');
			$plate_number = $this->input->post('plate_number');
			$brand = $this->input->post('brand');
			$body_number = $this->input->post('body_number');
			$last_change_oil_date = $this->input->post('last_change_oil_date');

			$data = array(
				'id' => $id,
				'plate_no' => $plate_number,
				'brand' => $brand,
				'body_no' => $body_number,
				'last_change_oil_date' => $last_change_oil_date
				);

			$this->Taxi_Model->edit_taxi_query($data);
		}

		public function delete_taxi($id){
			$this->Taxi_Model->delete_taxi_query($id);
		}

		// Generate driver id
		function generate_taxi_id($length = 5, $keyspace = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'){
			$str = 'T';
			$max = mb_strlen($keyspace, '8bit') - 1;
			for ($i = 0; $i < $length; ++$i) {
				$str .= $keyspace[rand(0 , $max)];
			}
			return $str;
		}
	}
