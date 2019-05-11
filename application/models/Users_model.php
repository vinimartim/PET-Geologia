<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {
    function insert($user) {
        return $this->db->insert('users',$user);
    }

    public function searchUser($username,$password) {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        return $this->db->get('users')->row_array();
    }

    function emailUnavailable($email) {  
        $this->db->where('email', $email);  
        $query = $this->db->get('users');  
        if($query->num_rows() > 0) {  
            return true;  
        } else {  
            return false;  
        }  
    }  

    function usernameUnavailable($username){  
        $this->db->where('username', $username);  
        $query = $this->db->get('users');  
        if($query->num_rows() > 0) {  
            return true;  
        } else {  
            return false;  
        }  
    } 

    public function searchAll() {
    	return $this->db->get('users')->result_array();
    }

    public function searchById($id) {
    	return $this->db->get_where('users', array(
    		'id' => $id
    	))->row_array();
    }

    public function update($id, $user) {
		$this->db->where('id', $id);
		return $this->db->update('users',$user);
    }

    public function search($search) {
        if(empty($search)) 
            return array();

        $search = $this->input->post('search');
        $this->db->or_like(array('name' => $search, 'username' => $search));
        $query = $this->db->get('users');
        return $query->result_array();
    }

    public function remove($id) {
        $this->db->where('id', $id);
        return $this->db->delete('users');
    }

}