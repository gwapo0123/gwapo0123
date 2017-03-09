<?php 
Class History_Model extends CI_Model {
		
	// Fetch all history
	public function fetch_all_history() {
		 $this->db->select('*');
        $this->db->from('rental');
        
        $query = $this->db->get();

        if ($query->num_rows() != 0) {
			return $query->result();
		} else {
			return false;
		}
    }
}
