<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Images_model extends CI_Model {
    public function insert($images) {
        return $this->db->insert('images',$images);
    }

    public function searchAll() {
        return $this->db->get('images')->result_array();
    }

    public function remove($id) {
    	$this->db->where('id', $id);
    	return $this->db->delete('images');
    }

    public function searchById($id) {
    	return $this->db->get_where('images', array(
    		'id' => $id
    	))->row_array();
    }
}