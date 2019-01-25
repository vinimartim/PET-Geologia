<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Midia_model extends CI_Model {
    public function insert($midia) {
        return $this->db->insert('midia',$midia);
    }

    public function buscaTodas() {
        return $this->db->get('midia')->result_array();
    }

    public function remover($id) {
    	$this->db->where('id', $id);
    	return $this->db->delete('midia');
    }

    public function retorna($id) {
    	return $this->db->get_where('midia', array(
    		'id' => $id
    	))->row_array();
    }
}