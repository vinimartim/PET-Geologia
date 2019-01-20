<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pagina_model extends CI_Model {
    public function insert($pagina) {
        $this->db->insert('pagina',$pagina);
    }

    public function buscaTodas() {
    	return $this->db->get('pagina')->result_array();
    }

}