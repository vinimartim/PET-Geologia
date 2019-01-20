<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function dashboard() {
		$this->load->view('dashboard/home');
	}

	public function list() {
		$this->load->model('user_model');
		$users = $this->user_model->buscaTodos();
		$dados = array('users' => $users);
		$this->load->view('dashboard/user_list',$dados);
	}

	public function login() {
		$this->load->view('dashboard/login', [
			'title' => 'Login | Administrador'
		]);
	}

	public function logout() {
		$this->session->unset_userdata('logged_in');
		$this->session->set_flashdata('success' ,'Deslogado com sucesso');
		
		redirect('/');
	}

	public function autenticar() {
		$this->load->model('user_model');
		$username = $this->input->post('username');
		$senha = md5($this->input->post('senha'));
		$user = $this->user_model->buscaUser($username,$senha);

		$session = array (
			'id' => $user['id'],
			'name' => $user['name'],
			'username' => $user['username'],
			'logged_in' => TRUE
		);

		if($session) {
			$this->session->set_userdata($session);
			redirect('dashboard/welcome/dashboard');
		} else {
			$this->session->set_flashdata('danger', 'danger');
			redirect('dashboard/login');
		}
	}

	public function cadastrar() {
		$this->load->view('dashboard/user_cadastrar', [
			'title' => 'Cadastrar usuário | Administrador'
		]);
	}

	public function new() {
		$user = array(
			'name' => $this->input->post('name'),
			'username' => $this->input->post('username'),
			'senha' => md5($this->input->post('senha'))
		);

		$this->load->model('user_model');
		$this->user_model->insert($user);
		redirect('welcome');
	}
}
