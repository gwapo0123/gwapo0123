<?php 
Class Taxi_Model extends CI_Model {
		
	// Add new taxi
	public function add_taxi_query($data){
    	$this->db->insert('taxi', $data);
	}

	// Fetch all taxi
	public function fetch_all_taxis_query() {
        $this->db->select('*');
        $this->db->from('taxi');
        
        $query = $this->db->get();

        if ($query->num_rows() != 0) {
			return $query->result();
		} else {
			return false;
		}
    }

	public function delete_taxi_query($id){
		$this->db->where('id', $id);
		$this->db->delete('taxi');
	}

	public function edit_taxi_query($data){
		$this->db->where('id', $data['id']);
		$this->db->update('taxi', $data);
	}
}
