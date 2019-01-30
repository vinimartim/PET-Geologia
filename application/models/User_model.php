<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    public function insert($user) {
        return $this->db->insert('user',$user);
    }

    public function buscaUser($username,$senha) {
        $this->db->where('username', $username);
        $this->db->where('senha', $senha);
        return $this->db->get('user')->row_array();
    }

    public function buscaTodos() {
    	return $this->db->get('user')->result_array();
    }

    public function pesquisa($busca) {
        if(empty($busca)) 
            return array();

        $busca = $this->input->post('busca');
        $this->db->or_like(array('name' => $busca, 'username' => $busca));
        $query = $this->db->get('user');
        return $query->result_array();
    }

}