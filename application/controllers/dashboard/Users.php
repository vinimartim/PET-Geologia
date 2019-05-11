<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	function __construct() {
		parent:: __construct();
		$this->load->model('users_model');

		if(empty($this->session->userdata['logged_in'])){
			$this->session->set_flashdata('danger','Você não possui permissão para acessar essa página');
			redirect('login');
		}
	}

	public function index() {
		$data = $this->users_model->searchAll();
		$this->load->view('dashboard/users/users_list',[
			'users' => $data,
			'title'  => 'Usuários'
		]);
	}

	public function newForm() {
		$this->load->view('dashboard/users/users_new', [
			'title' => 'Cadastrar usuário'
		]);
	}

	public function insert() {
		$user = array(
			'name' => $this->input->post('name'),
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email'),
			'phone' => $this->input->post('phone'),
			'password' => md5($this->input->post('password'))
		);
		
		if($this->users_model->insert($user)) {
			$this->session->set_flashdata('success','Usuário cadastrado com sucesso!');
		} else {
			$this->session->set_flashdata('danger','Usuário não foi cadastrado!');
		}
		redirect('dashboard/users/list');
	}

	//---------------------------------
	// EMAIL EXISTS (true or false)
	//---------------------------------
	private function emailExists($email) {
		$this->db->where('email', $email);
		$query = $this->db->get('users');
		if( $query->num_rows() > 0 ) {
			 return TRUE; 
		} else {
			return FALSE; 
		}
	}

	//---------------------------------
	// AJAX REQUEST, IF EMAIL EXISTS
	//---------------------------------
	function registerEmailExists() {
		if (array_key_exists('email',$_POST)) {
			if ($this->emailExists($this->input->post('email')) == TRUE) {
				echo json_encode(FALSE);
			} else {
				echo json_encode(TRUE);
			}
		}
	}

	//---------------------------------
	// USERNAME EXISTS (true or false)
	//---------------------------------
	private function usernameExists($username) {
		$this->db->where('username', $username);
		$query = $this->db->get('users');
		if( $query->num_rows() > 0 ) { return TRUE; } else { return FALSE; }
	}

	//---------------------------------
	// AJAX REQUEST, IF USERNAME EXISTS
	//---------------------------------
	function registerUsernameExists() {
		if (array_key_exists('username',$_POST)) {
			if ( $this->usernameExists($this->input->post('username')) == TRUE ) {
				echo json_encode(FALSE);
			} else {
				echo json_encode(TRUE);
			}
		}
	}

	public function editForm($id) {
		$data = $this->users_model->searchById($id);

		$this->load->view('dashboard/users/users_edit', [
			'users' => $data,
			'title' => 'Editar usuário'
		]);
	}

	public function update($id) { //pega o id pelo atributo action do html
		$user = array(
			'name' => $this->input->post('name'),
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email'),
			'phone' => $this->input->post('phone'),
			'password' => md5($this->input->post('password'))
		);

		$save_user = $this->users_model->update($id, $user);

		if($save_user) {
			$this->session->set_flashdata('success', 'Usuário editado com sucesso');
		} else {
			$this->session->set_flashdata('danger', 'Usuário não pode ser editado');
		}
		redirect('dashboard/users');
	}

	public function remove() {
		$id = $this->input->get('id');

		$rmv_user = $this->users_model->remove($id);

		if($rmv_user) {
			$this->session->set_flashdata('success', 'Usuário removido com sucesso!');
			
		} else {
			$this->session->set_flashdata('danger', 'Não foi possível remover o usuário');
		}
		redirect('dashboard/users');
	}

	public function filter() {
		$data = $this->users_model->search($_POST);
		$this->load->view('dashboard/users/users_list',[
			'users' => $data,
			'title' => 'Usuários'
		]);
	}

}
