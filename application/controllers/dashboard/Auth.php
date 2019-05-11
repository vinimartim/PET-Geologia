<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct() {
		parent:: __construct();
		$this->load->model('users_model');
	}
		
	public function loginForm() {
		$this->load->view('dashboard/login', [
			'title' => 'Login'
		]);
	}
		
	public function auth() {
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		
		$user = $this->users_model->searchUser($username,$password);
	
		if($user) {
			$session = array (
				'id' => $user['id'],
				'name' => $user['name'],
				'username' => $user['username'],
				'email' => $user['email'],
				'logged_in' => TRUE
			);

			$this->session->set_userdata($session);
			$this->session->set_flashdata('success','Usuário logado com sucesso');
			redirect('dashboard/home');
			
		} else {
			$this->session->set_flashdata('danger','Usuário ou senha inválidos');
			redirect('login');
		}
	}


	public function logout() {
		$this->session->unset_userdata('logged_in');
		redirect('/');
	}
}
