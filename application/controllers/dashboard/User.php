<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function list() {
		$this->load->model('user_model');
		$dados = $this->user_model->buscaTodos();
		$this->load->view('dashboard/user_list',[
			'users' => $dados,
			'title'  => 'Usuários'
		]);
	}

	public function login() {
		$this->load->view('dashboard/login', [
			'title' => 'Login'
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
			'title' => 'Cadastrar usuário'
		]);
	}

	public function new() {
		$user = array(
			'name' => $this->input->post('name'),
			'username' => $this->input->post('username'),
			'senha' => md5($this->input->post('senha'))
		);

		$this->load->model('user_model');
		$adc_usuario = $this->user_model->insert($user);

		if($adc_usuario) {
			$this->session->set_flashdata('success','Usuário cadastrado com sucesso!');
			redirect('dashboard/user/list');
		} else {
			redirect('dashboard/user/cadastrar');
		}
	}

	public function filtrar() {
		$this->load->model('user_model');
		$dados = $this->user_model->pesquisa($_POST);
		$this->load->view('dashboard/user_list',[
			'users' => $dados,
			'title' => 'Usuários'
		]);
	}

	public function remover() {
		$id = $this->input->get('id');

		$this->load->model('user_model');
		$rm_user = $this->user_model->remover($id);

		if($rm_user) {
			$this->session->set_flashdata('success', 'Usuário removido com sucesso!');
			redirect('dashboard/user/list');
		} else {
			$this->session->set_flashdata('danger', 'Não foi possível remover o usuário');
			redirect('dashboard/user/list');
		}

	}
}
