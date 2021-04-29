<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produto extends CI_Controller {
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
		
		$this->template->load('template/template', 'produto/view');
	}


	public function view()
	{
		$registro = $this->produtos_model->get( $this->uri->segment(3) )[0];
		
		if(empty($registro)){
			redirect(base_url());
		}
		$cor = !empty(  $this->uri->segment(4) ) ? $this->uri->segment(4) : $registro['cor'];
		$dados['registro']  = $registro;
		$dados['registro']['imagens'] = $this->produtos_model->listaImagensProduto( $registro['id'],  $cor  );
		$dados['registro']['tamanhos'] = $this->produtos_model->listaTamanhoTenis( $registro['id'],  $cor  );
		$this->template->load('template/template', 'produto/view', $dados);
	}

	public function form()
	{
		
	}
}
