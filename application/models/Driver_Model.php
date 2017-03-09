<?php 
Class Driver_Model extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->model('Dashboard_Model');
	}	
		
	// Add new driver
	public function add_driver_query($data){
    	$this->db->insert('driver', $data);
	}

	// Fetch all drivers
	public function fetch_all_drivers_query() {
        $this->db->select('*');
        $this->db->from('driver');
               
        $query = $this->db->get();

        if ($query->num_rows() != 0) {
			return $query->result();
		} else {
			return false;
		}
    }

    // Fetch all drivers
	public function fetch_all_archive_drivers_query() {
        $this->db->select('*');
        $this->db->from('driver');
        $this->db->where('archive_status', '1');

        $query = $this->db->get();

        if ($query->num_rows() != 0) {
			return $query->result();
		} else {
			return false;
		}
    }

	// Fetch all unarchive drivers
	public function fetch_all_unarchive_drivers_query() {
        $this->db->select('*');
        $this->db->from('driver');
        $this->db->where('archive_status', '0');
        
        $query = $this->db->get();

        if ($query->num_rows() != 0) {
			return $query->result();
		} else {
			return false;
		}
    }

    // Fetch all rented driveres
	public function fetch_all_rented_drivers_query() {
		$this->db->select('*');
        $this->db->from('driver');
        $this->db->where("EXISTS(SELECT * FROM rental WHERE driver.id=rental.driver_id)");

        $query = $this->db->get();	

        if ($query->num_rows() != 0) {
			return $query->result();
		} else {
			return false;
		}
    }

    // Select driver
    public function fetch_driver_query($id) {
		$this->db->select("*");
		$this->db->from("driver");
		$this->db->where("id", $id);
		
		$query = $this->db->get();

		if ($query->num_rows() != 0) {
			return $query->result();
		} else {
			return false;
		}
	}

	// Edit driver
	public function edit_driver_query($data){
		$this->db->where('id', $data['id']);
		$this->db->update('driver', $data);
	}

	// Set archive status
	public function set_archive_status($id){
		$this->db->set('archive_status', '1');
		$this->db->where('id', $id);
		$this->db->update('driver');
	}

	// Set archive status
	public function set_unarchive_status($id){
		$this->db->set('archive_status', '0');
		$this->db->where('id', $id);
		$this->db->update('driver');
	}
}
