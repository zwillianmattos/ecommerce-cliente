<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loja extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('produtos_model');

	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$ultimosMaisCaros = $this->produtos_model->buscaUltimosMaisCaros();
		$dados['ultimosMaisCaros'] = [];
		foreach($ultimosMaisCaros as $key => $tenis ) {
			$dados['ultimosMaisCaros'][$key]  = $tenis;
			$dados['ultimosMaisCaros'][$key]['titulo'] = $tenis['titulo']. ' - ' . $tenis['cor'];
			$dados['ultimosMaisCaros'][$key]['imagens'] = $this->produtos_model->listaImagensProduto( $tenis['id'], $tenis['cor']  );
		}
		
		$ultimosProdutos = $this->produtos_model->buscaUltimos();
		$dados['ultimosProdutos'] = [];
		foreach($ultimosProdutos as $key => $tenis ) {
			$dados['ultimosProdutos'][$key]  = $tenis;
			$dados['ultimosProdutos'][$key]['imagens'] = $this->produtos_model->listaImagensProduto( $tenis['id'], $tenis['cor']  );
		}
		
		
		$this->template->load('template/template', 'home/home', $dados);
	}

}
