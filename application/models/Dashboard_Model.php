<?php 
Class Dashboard_Model extends CI_Model {
	public function check_driver_have_rental($id){
		$this->db->select("*");
		$this->db->from("rental");
		$this->db->where("driver_id = '".$id."' AND CURDATE() BETWEEN rental_date_from AND rental_date_to");

		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return true;
		} else {
			return false;
		}
	}
}
