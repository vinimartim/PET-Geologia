<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct() {
		parent:: __construct();
		$this->load->model('users_model');

		if(empty($this->session->userdata['logged_in'])){
			$this->session->set_flashdata('danger','Você não possui permissão para acessar essa página');
			redirect('login');
		}
	}

	public function dashboard() {
		$this->load->view('dashboard/home',[
			'title' => 'Dashboard'
		]);
	}
}
