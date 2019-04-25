<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Links extends CI_Controller {
	function __construct() {
		parent:: __construct();
		$this->load->model('links_model');
	}

	public function list() {
		$data = $this->links_model->searchAll();
		$this->load->view('dashboard/links/links_list',[
			'links' => $data,
			'title' => 'Links página inicial'
		]);
	}

	public function newForm() {
		$this->load->view('dashboard/links/links_new',[
			'title' => 'Cadastrar novo link'
		]);
	}

	public function insert() {
		$link = array(
			'title' => $this->input->post('title'),
			'description' => $this->input->post('description'),
			'icon' => $this->input->post('icon'),
			'home_section' => $this->input->post('home_section'),
			'url' => $this->input->post('url')
		);

		$add_link = $this->links_model->insert($link);

		if($add_link) {
			$this->session->set_flashdata('success', 'Link adicionado com sucesso');
		} else {
			$this->session->set_flashdata('danger', 'Não foi possível adicionar o link');
		}
		redirect('dashboard/links');
	}

	public function editForm($id) {
		$link = $this->links_model->searchById($id);
		$this->load->view('dashboard/links/links_edit',[
			'link' => $link,
			'title' => 'Editar link'
		]);
	}

	public function update($id) {
		$link = array(
			'title' => $this->input->post('title'),
			'description' => $this->input->post('description'),
			'icon' => $this->input->post('icon'),
			'url' => $this->input->post('url'),
			'home_section' =>$this->input->post('home_section')
		);
		
		$save_link = $this->links_model->update($id, $link);

		if($save_link) {
			$this->session->set_flashdata('success', 'Link editado com sucesso!');
		} else {
			$this->session->set_flashdata('danger', 'Não foi possível editar o link');
		}
		redirect('dashboard/links');
	}

	public function remove() {
		$id = $this->input->get('id');

		$rmv_link = $this->links_model->remove($id);

		if($rmv_link) {
			$this->session->set_flashdata('success', 'Link removido com sucesso!');
			
		} else {
			$this->session->set_flashdata('danger', 'Não foi possível remover o link');
		}
		redirect('dashboard/links');
	}
}