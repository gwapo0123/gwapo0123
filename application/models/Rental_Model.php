<?php 
Class Rental_Model extends CI_Model {
		
	// Add rental
	public function add_rental_query($data){
    	$this->db->insert('rental', $data);
	}

	// Fetch all rentals
	public function fetch_all_rentals() {
		$this->db->select('*');
        $this->db->from('rental');
        
        $query = $this->db->get();

        if ($query->num_rows() != 0) {
			return $query->result();
		} else {
			return false;
		}
    }

    // Fetch all rentals
	public function fetch_all_current_rentals() {
		$this->db->select('*');
        $this->db->from('rental');
        $this->db->where('CURDATE() <= rental_date_to');
        
        $query = $this->db->get();

        if ($query->num_rows() != 0) {
			return $query->result();
		} else {
			return false;
		}
    }

    // Extend date to
	public function extend_date_to_query($data){
		$this->db->set('rental_date_to', $data['rental_date_to']);
		$this->db->set('total_payment', $data['total_payment']);
		$this->db->where('id', $data['id']);
		$this->db->update('rental');
	}
}
