<?php 
	class Logins extends CI_Controller{
		
		public function __construct(){
			parent::__construct();
			$this->load->model('Login_Model');
			// $this->load->library('session');
		}

		public function index(){
			// Check if there's session
			if(isset($this->session->userdata['logged_in'])){
				redirect(base_url()."dashboards"); 
			}else{
				redirect(base_url()."dashboards"); 
			}
		}

		public function login(){
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			// Form validation
			$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

			$data = array(
						'username' => $username,
						'password' => $password 
						);

			// Check if form validation is not false
			if ($this->form_validation->run() != FALSE) {
				// Check if credentials is correct
				$is_admin_login_success = $this->Login_Model->login_query($data);
				if ($is_admin_login_success == TRUE) {
					// Fetch admin details
					$fetch_admin = $this->Login_Model->fetch_admin_query($data);
						if ($fetch_admin != false) {
							$session_data = array(
								'username' => $fetch_admin[0]->username,
								'password' => $fetch_admin[0]->password,
								);
						}
						// Add session
						$this->session->set_userdata('logged_in', $session_data);
						redirect(base_url()."dashboards"); 
				} else {
					$data = array(
						'title' => 'ASS',
						'error_message' => 'Invalid input!'
						);
					$this->load->view('pages/login_page', $data);
				} 
			}
		}

		public function logout() {
			// Removing session
			$session_data = array(
				'username' => '',
				'password' => ''
				);
			$this->session->unset_userdata('logged_in', $session_data);
			$data['title'] = "ASS";
			$this->load->view('pages/login_page', $data);
		}
	}
