<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagina extends CI_Controller {
	public function list() {
		$this->load->model('pagina_model');
		$paginas = $this->pagina_model->buscaTodas();
		$dados = array('paginas' => $paginas);
		$this->load->view('dashboard/pagina_list',$dados);
	}

	public function new() {
		$pagina = array(
			'user_id' => $this->input->post('user_id'),
			'titulo' => $this->input->post('titulo'),
			'conteudo' => $this->input->post('conteudo')			
		);

		$this->load->model('pagina_model');
		$this->pagina_model->insert($pagina);
		redirect('dashboard/pagina/list');
	}

	public function cadastrar() {
		$this->load->view('dashboard/pagina_cadastrar', [
			'title' => 'Cadastrar página | Administrador'
		]);
	}
}