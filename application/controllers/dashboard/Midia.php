<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Midia extends CI_Controller {
	public function list() {
		$this->load->model('midia_model');
		$dados = $this->midia_model->buscaTodas();
		$this->load->view('dashboard/midia', [
			'midias' => $dados,
			'title' => 'Mídias'
		]);
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
		$adc_midia = $this->midia_model->insert($midia);

		if($adc_midia) {
			$this->session->set_flashdata('success','Mídia adicionada com sucesso!');
			redirect('dashboard/midia/list');
		} else {
			$this->session->set_flashdata('danger','Não foi possível adicionar a mídia');
		}
	}

	public function remover() {
		$id = $this->input->get('id'); //pegando o id

		$this->load->model('midia_model');
		$midia = $this->midia_model->retorna($id);

		$file = FCPATH . 'assets/uploads/' . $midia['url'];
		unlink($file);

		$rm_midia = $this->midia_model->remover($id);

		if($rm_midia) {
			$this->session->set_flashdata('success','Mídia removida com sucesso');
			redirect('dashboard/midia/list');
		} else {
			$this->session->set_flashdata('danger','Não foi possível remover a mídia');
			redirect('dashboard/midia/list');
		}

	}
}
