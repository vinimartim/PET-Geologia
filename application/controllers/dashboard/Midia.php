<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Midia extends CI_Controller {

	public function list() {
		$this->load->model('midia_model');
		$midias = $this->midia_model->buscaTodas();
		$dados = array('midias',$midias);
		$this->load->view('dashboard/midia',$dados);
	}

	public function new() {
		$midia = array(
			'url' => $this->input->post('url');
		);

		$this->load->model('midia_model');
		$this->midia_model->insert($midia);
		redirect('dashboard/midia');
	}

	public function remover() {

	}
}
