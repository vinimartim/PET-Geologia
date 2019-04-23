<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Links_model extends CI_Model {
    public function searchAll() {
        return $this->db->get('links')->result_array();
	}
	
	public function insert($link) {
		return $this->db->insert('links', $link);
	}

	public function searchById($id) {
		return $this->db->get_where('links', array(
			'id' => $id
		))->row_array();
	}

	public function update($id, $link) {
		$this->db->where('id', $id);
		return $this->db->update('links', $link);
	}

	public function remove($id) {
		$this->db->where('id', $id);
		return $this->db->delete('links');
	}
}