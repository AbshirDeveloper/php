<?php

class model_user extends CI_model {

	public function connection_test(){
	
	$query = $this->db->get('dayn');
	return $query->result();
	}
	
	public function get_user(){
		$query = $this->db->query('select * from dayn');
		return $query->result();
	}

}


?>
