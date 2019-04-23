<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	function __construct() {
		parent:: __construct();
		$this->load->model('users_model');
	}

	public function list() {
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
			'password' => md5($this->input->post('password'))
		);

		$add_user = $this->users_model->insert($user);

		if($add_user) {
			$this->session->set_flashdata('success','Usuário cadastrado com sucesso!');
		} else {
			$this->session->set_flashdata('danger','Usuário não foi cadastrado!');
		}
		redirect('dashboard/users/list');
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
			'password' => md5($this->input->post('password'))
		);

		$save_user = $this->users_model->update($id, $user);

		if($save_user) {
			$this->session->set_flashdata('success', 'Usuário editado com sucesso');
		} else {
			$this->session->set_flashdata('danger', 'Usuário não pode ser editado');
		}
		redirect('dashboard/users/list');
	}

	public function remove() {
		$id = $this->input->get('id');

		$rmv_user = $this->users_model->remove($id);

		if($rmv_user) {
			$this->session->set_flashdata('success', 'Usuário removido com sucesso!');
			
		} else {
			$this->session->set_flashdata('danger', 'Não foi possível remover o usuário');
		}
		redirect('dashboard/users/list');
	}

	public function filter() {
		$data = $this->users_model->search($_POST);
		$this->load->view('dashboard/users/users_list',[
			'users' => $data,
			'title' => 'Usuários'
		]);
	}

}
