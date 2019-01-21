<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->model('pagina_model');
		$paginas = $this->pagina_model->buscaPaginasIniciais();
		$dados = array('paginas' => $paginas);
		$this->load->view('index.php',$dados);
	}
}
