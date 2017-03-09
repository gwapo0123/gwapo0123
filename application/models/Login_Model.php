<?php 

Class Login_Model extends CI_Model {

	// Login admi
	public function login_query($data) {
		$select = "*";
		$from = "admin";
		$where = "username="."'".$data['username']."' AND password='".$data['password']."'";

		$this->db->select($select);
		$this->db->from($from);
		$this->db->where($where);

		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return true;
		} else {
			return false;
		}
	}

	// Fetch admin details
    public function fetch_admin_query($data) {
		$this->db->select("*");
		$this->db->from("admin");
		$this->db->where( "username="."'".$data['username']."' AND password='".$data['password']."'");
		
		$query = $this->db->get();

		if ($query->num_rows() != 0) {
			return $query->result();
		} else {
			return false;
		}
	}
}