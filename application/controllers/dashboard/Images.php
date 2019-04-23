<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Images extends CI_Controller {
	function __construct() {
		parent:: __construct();
		$this->load->model('images_model');
	}

	public function list() {
		$data = $this->images_model->searchAll();
		$this->load->view('dashboard/images/images', [
			'images' => $data,
			'title' => 'Imagens'
		]);
	}

	public function insert() {
		$config['upload_path'] = FCPATH . 'assets/uploads';
		$config['allowed_types'] = 'jpg|jpeg|png';

		$this->load->library('upload',$config);

		if($this->upload->do_upload('url')) {
			$query = $this->upload->data();
			$url = $query['file_name'];
		} else {
			redirect('welcome');
		}

		$image = array(
			'url' => $url
		);

		$add_image = $this->images_model->insert($image);

		if($add_image) {
			$this->session->set_flashdata('success','Imagem adicionada com sucesso!');
		} else {
			$this->session->set_flashdata('danger','Não foi possível adicionar a imagem');
		}
		redirect('dashboard/images/list');
	}

	public function remove() {
		$id = $this->input->get('id'); //pegando o id

		$image = $this->images_model->searchById($id);

		$file = FCPATH . 'assets/uploads/' . $image['url'];
		unlink($file);

		$rmv_image = $this->images_model->remove($id);

		if($rmv_image) {
			$this->session->set_flashdata('success','Imagem removida com sucesso');
			redirect('dashboard/images/list');
		} else {
			$this->session->set_flashdata('danger','Não foi possível remover a imagem');
			redirect('dashboard/images/list');
		}

	}
}
