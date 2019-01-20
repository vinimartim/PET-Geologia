<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    public function insert($user) {
        $this->db->insert('user',$user);
    }

    public function buscaUser($username,$senha) {
        $this->db->where('username', $username);
        $this->db->where('senha', $senha);
        return $this->db->get('user')->row_array();
    }

    public function buscaTodos() {
    	return $this->db->get('user')->result_array();
    }

}