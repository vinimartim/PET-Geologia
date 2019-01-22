<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Midia extends CI_Controller {
	public function list() {
		$this->load->model('midia_model');
		$midias = $this->midia_model->buscaTodas();
		$dados = array('midias' => $midias);
		$this->load->view('dashboard/midia',$dados);
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

		$this->load->model('midia_model');
		$this->midia_model->insert($midia);
		redirect('dashboard/midia/list');
	}

	public function remover() {
		$id = $this->input->get('id'); //pegando o id

		$this->load->model('midia_model');
		$midia = $this->midia_model->retorna($id);

		$file = FCPATH . 'assets/uploads/' . $midia['url'];
		unlink($file);

		$this->midia_model->remover($id);
		redirect('dashboard/midia/list');

	}
}
