<?php 
	class Dashboards extends CI_Controller{
		
		public function __construct(){
			parent::__construct();
			$this->load->library('googlemaps');
			$this->load->model('Driver_Model');
			$this->load->model('Dashboard_Model');
		}

		public function index(){
			$data['title'] = "Dashboard";

			$this->intialize_map();		

			$rented_drivers = $this->Driver_Model->fetch_all_rented_drivers_query();
			
			if(!empty($rented_drivers)){				
				foreach($rented_drivers as $rented_driver){
						$marker = array();	
						$middle_name = ucfirst(substr($rented_driver->mname, 0, 1)).".";
						// $marker['id'] = $rented_driver->id;
						$marker['title'] = "$rented_driver->fname $middle_name $rented_driver->lname";
						$marker['position'] = "$rented_driver->lat, $rented_driver->lng";
						$marker['icon'] = base_url()."/images/ass_new_logo.png";
						$marker['icon_scaledSize'] = '50,50';
						
						$this->googlemaps->add_marker($marker);
				}
			}
			$data['map'] = $this->googlemaps->create_map();
			$this->load->view('pages/dashboard_page', $data);
		}

		public function intialize_map(){
			$config['center'] = '10.309910, 123.893031';
			$this->googlemaps->initialize($config);
		}

		public function fetch_all_rented_drivers(){
			$result = $this->Driver_Model->fetch_all_rented_drivers_query();
			return $result;
		}

		public function fetch_all_rented_drivers_json(){
			$result = $this->Driver_Model->fetch_all_rented_drivers_query();
			echo json_encode($result);
		}

		public function search_rented_driver(){
			echo "search";


			$id = $this->input->post('driver_id');


			$driver = $this->Driver_Model->fetch_driver_query($id);
			var_dump($driver);

			$fname = $this->input->post('first_name');
			$mname = $this->input->post('middle_name');
			$lname = $this->input->post('last_name');
			$lat = $this->input->post('lat');
			$lng = $this->input->post('lng');

			$this->intialize_map();	

			$marker = array();	

			$middle_name = ucfirst(substr($mname, 0, 1)).".";
			$markfnameer['title'] = "$fname $middle_name $lname";
			$marker['position'] = "$lat, $lng";
			$marker['icon'] = base_url()."/images/ass_new_logo.png";
			$marker['icon_scaledSize'] = '50,50';
			
			$this->googlemaps->add_marker($marker);

			$data['map'] = $this->googlemaps->create_map();

			// $data['title'] = "Dashboard";
			$this->load->view('pages/dashboard_page', $data);
		}
	}

