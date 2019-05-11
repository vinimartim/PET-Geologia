<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {
	function __construct() {
		parent:: __construct();
		$this->load->model('about_model');

		if(empty($this->session->userdata['logged_in'])){
			$this->session->set_flashdata('danger','Você não possui permissão para acessar essa página');
			redirect('login');
		}
	}

	public function index() {
		$data = $this->about_model->searchAll();
		$this->load->view('dashboard/about/about', [
			'about' => $data,
			'title' => 'Sobre nós'
		]);
	}

	public function editForm($id) {
		$data = $this->about_model->searchById($id);
		
		$this->load->view('dashboard/about/about_edit', [
			'about' => $data,
			'title' => 'Editar sobre nós'
		]);
	}

	public function update($id) {
		$about = array('content' => $this->input->post('content'));
		$save_about = $this->about_model->update($id, $about);

		if($save_about) {
			$this->session->set_flashdata('success', 'Alterações salvas com sucesso');
		} else {
			$this->session->set_flashdata('danger', 'Não foi possível salvar as alterações');
		}
		redirect('dashboard/about');
	}


}