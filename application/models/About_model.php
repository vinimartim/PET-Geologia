<?php defined('BASEPATH') OR exit('No direct script access allowed');

class About_model extends CI_Model {	
	public function searchAll() {
		return $this->db->get('about')->row_array();
	}

	public function update($id, $about) {
		$this->db->where('id', $id);
		return $this->db->update('about', $about);
	}

	public function searchById($id) {
		return $this->db->get_where('about', array(
    		'id' => $id
    	))->row_array();
	}
}