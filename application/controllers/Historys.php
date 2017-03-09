<?php 
	class Historys extends CI_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->model('History_Model');
		}

		public function index(){
			$data['title'] = "History";
			$data['all_historys'] = $this->History_Model->fetch_all_history();
			$this->load->view('pages/history_page', $data);
		}	
	}
