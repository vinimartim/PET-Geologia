<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
		$this->session->set_flashdata('success','Usuário deslogado com sucesso');
		redirect('/');
	}

	public function autenticar() {
		$this->load->model('user_model');
		$username = $this->input->post('username');
		$senha = md5($this->input->post('senha'));
		$user = $this->user_model->buscaUser($username,$senha);

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

	public function cadastrar() {
		$this->load->view('dashboard/user_cadastrar', [
			'title' => 'Cadastrar usuário | Administrador'
		]);
	}

	public function new() {
		$dados['erros'] = null;
		$dados['sucesso'] = null;

		$this->load->library('form_validation');
		$this->form_validation->set_rules('name','nome','required|min_length[5]|max_length[50]');
		$this->form_validation->set_rules('username','username','required|min_length[3]|max_length[12]');
		$this->form_validation->set_rules('senha','senha','required|min_length[3]');
		$this->form_validation->set_rules('senha2','confirmação de senha','required|matches[senha]');
		//$this->form_validation->set_error_delimiters('<p class="alert alert-danger">','</p>');
		
		if($this->form_validation->run() == FALSE) {
			/*
			$user = array(
				'name' => $this->input->post('name'),
				'username' => $this->input->post('username'),
				'senha' => md5($this->input->post('senha'))
			);

			$this->load->model('user_model');
			$adc_usuario = $this->user_model->insert($user);

			if($adc_usuario) {
				$this->session->set_flashdata('success','Usuário cadastrado com sucesso!');
				redirect('login');
			} else {
				redirect('dashboard/user/cadastrar');*/
			$dados['erros'] = validation_errors('<li>','</li>');
			
		} else {
			$dados['sucesso'] = 'Sucesso';
		}

		$this->load->view('dashboard/user_cadastrar',$dados);

	}
}
