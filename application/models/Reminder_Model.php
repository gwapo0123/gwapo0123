<?php 
Class Reminder_Model extends CI_Model {
		
	// Add new reminder
	public function add_reminder_query($data){
    	$this->db->insert('reminder', $data);
	}

	// Fetch all reminders
	public function fetch_all_reminders_query() {
        $this->db->select('*');
        $this->db->from('reminder');
        
        $query = $this->db->get();

        if ($query->num_rows() != 0) {
			return $query->result();
		} else {
			return false;
		}
    }

    // Add reminder_status
	public function add_reminder_status($driver_data) {
       $this->db->insert('reminder_status', $driver_data);
    }
}
