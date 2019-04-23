<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('informatives_model');
		$this->load->model('links_model');
		$this->load->model('about_model');
	}
	
	public function index() {
		$links = $this->links_model->searchAll();
		$informatives = $this->informatives_model->searchByActiveStatus();
		$about = $this->about_model->searchAll();
		$this->load->view('index',[
			'links' => $links,
			'informatives' => $informatives,
			'about' => $about,
			'title' => 'PET - Geologia'
		]);
	}
}
