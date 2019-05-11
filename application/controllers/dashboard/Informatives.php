<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informatives extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('informatives_model');
		$this->load->model('images_model');

		if(empty($this->session->userdata['logged_in'])){
			$this->session->set_flashdata('danger','Você não possui permissão para acessar essa página');
			redirect('login');
		}
	}

	public function index() {
		$data = $this->informatives_model->searchAll();
		$this->load->view('dashboard/informatives/informatives_list',[
			'informatives' => $data,
			'title' => 'Informativos'
		]);
	}
	
	public function newForm() {
		$data = $this->images_model->searchAll();
		$this->load->view('dashboard/informatives/informatives_new',[
			'images' => $data,
			'title' => 'Cadastrar informativo'
		]);
	}

	public function insert() {
		$informative = array(
			'user_id' => $this->input->post('user_id'),
			'title' => $this->input->post('title'),
			'url' => $this->input->post('url'),
			'content' => $this->input->post('content'),
			'home_active' => $this->input->post('home_active'),	
		);

		$add_informative = $this->informatives_model->insert($informative);

		if($add_informative) {
			$this->session->set_flashdata('success', 'Informativo adicionado com sucesso!');
		} else {
			$this->session->set_flashdata('danger', 'Não foi possível adicionar a página');
		}
		redirect('dashboard/informatives');	
	}

	public function editForm($id) {
		$data['informatives'] = $this->informatives_model->searchById($id);
		$data['images'] = $this->images_model->searchAll();

		$this->load->view('dashboard/informatives/informatives_edit',[
			'images' => $data['images'],
			'informatives' => $data['informatives'],
			'title' => 'Editar página'
		]); 
	}

	public function update($id) {
		$informative = array(
			'user_id' => $this->input->post('user_id'),
			'title' => $this->input->post('title'),
			'content' => $this->input->post('content'),
			'home_active' => $this->input->post('home_active'),
			'url' => $this->input->post('url')	
		);
		$upd_informative = $this->informatives_model->update($id, $informative);
		
		if($upd_informative) {
			$this->session->set_flashdata('success','Informativo editado com sucesso!');
		} else {
			$this->session->set_flashdata('danger','Não foi ´possível editar o informativo');
		}
		redirect('dashboard/informatives');
	}

	public function remove() {
		$id = $this->input->get('id');

		$rmv_informative = $this->informatives_model->remove($id);

		if($rmv_informative) {
			$this->session->set_flashdata('success', 'Página removida com sucesso!');
		} else {
			$this->session->set_flashdata('danger', 'Não foi possível remover a página');
		}
		redirect('dashboard/informatives');
	}
}