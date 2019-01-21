<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Midia_model extends CI_Model {
    public function insert($midia) {
        $this->db->insert('midia',$midia);
    }
}