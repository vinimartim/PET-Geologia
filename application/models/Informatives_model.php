<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Informatives_model extends CI_Model {
    public function insert($informative) {
        return $this->db->insert('informatives',$informative);
    }

    public function searchAll() {
    	return $this->db->get('informatives')->result_array();
    }

    public function searchByActiveStatus() {
    	$this->db->where('home_active', '1');
    	return $this->db->get('informatives')->result_array();
    }

    public function searchById($id) {
    	return $this->db->get_where('informatives', array(
    		'id' => $id
    	))->row_array();
    }

    public function update($id, $informative) {
		$this->db->where('id', $id);
		return $this->db->update('informatives',$informative);
    }

    public function remove($id) {
    	$this->db->where('id', $id);
    	return $this->db->delete('informatives');
    }
}