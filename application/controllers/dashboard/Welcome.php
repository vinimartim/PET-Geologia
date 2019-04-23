<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct() {
		parent:: __construct();
		$this->load->model('users_model');
	}

	public function dashboard() {
		$this->load->view('dashboard/home',[
			'title' => 'Dashboard'
			]);
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
				'logged_in' => TRUE
			);

			$this->session->set_userdata($session);
			$this->session->set_flashdata('success','Usuário logado com sucesso');
			redirect('dashboard');
			
		} else {
			$this->session->set_flashdata('danger','Usuário ou senha inválidos');
			redirect('login');
		}
	}


	public function logout() {
		$this->session->unset_userdata('logged_in');
		$this->session->set_flashdata('success','Usuário deslogado com sucesso');
		redirect('/');
	}
}
