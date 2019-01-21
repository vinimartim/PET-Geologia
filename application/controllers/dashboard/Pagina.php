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

		$config['upload_path'] = FCPATH . 'assets/uploads';
		$config['allowed_types'] = 'jpg|jpeg|png';

		$this->load->library('upload',$config);

		if($this->upload->do_upload('url')) {
			$query = $this->upload->data();
			$url = $query['file_name'];
		} else {
			redirect('welcome');
		}

		$midia = array(
			'url' => $url
		);

		$pagina = array(
			'user_id' => $this->input->post('user_id'),
			'titulo' => $this->input->post('titulo'),
			'url' => $url,
			'conteudo' => $this->input->post('conteudo'),
			'atv_inicio' => $this->input->post('atv_inicio'),	
		);

		$this->load->model('midia_model');
		$this->midia_model->insert($midia);

		$this->load->model('pagina_model');
		$this->pagina_model->insert($pagina);
		redirect('dashboard/pagina/list');
	}

	public function cadastrar() {
		$this->load->view('dashboard/pagina_cadastrar', [
			'title' => 'Cadastrar página | Administrador'
		]);
	}

	public function editar() {
		$id = $this->input->get('id');
		
		$this->load->model('pagina_model');
		$paginas = $this->pagina_model->retorna($id);
		$dados = array('paginas' => $paginas);
		$this->load->view('dashboard/pagina_editar',$dados);
	}

	public function salvar($id) {
		$this->load->model('pagina_model');
		$this->pagina_model->salvar($id);
		//setar mensagem dps
		redirect('dashboard/pagina/list');
	}

	public function remover() {
		$id = $this->input->get('id');

		$this->load->model('pagina_model');
		$this->pagina_model->remover($id);
		redirect('dashboard/pagina/list');

	}
}