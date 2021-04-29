<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Painel extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('painel_model');
    }
    
	public function login()
	{
        $dados['mensagem'] = '';
        
        if( $this->input->post() ){
            $email = $this->input->post('email');
            $senha = $this->input->post('senha');   

            $exec = $this->painel_model->buscaCliente($email, $senha);
            if( !empt($exec) ){
                setSession([
                    'cliente' => $exec,
                    'logged' => true
                ]);
            } else {
                $dados['mensagem'] = 'Usuário ou senha incorretos';
            }
        }
        
		$this->template->load('template/template', 'painel/login', $dados);
	}

}
