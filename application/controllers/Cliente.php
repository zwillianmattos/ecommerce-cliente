<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('clientes_model');
    }
    
    public function cadastro() {
        $dados['mensagem'] = '';
        if( getSession('logged') ){
            redirect(base_url());
        }

        if( $this->input->post() ){
            
            $dados = $this->input->post();

            $exec = $this->clientes_model->insert( $dados );
            if( !empty($exec) ){
                redirect(base_url('cliente/login'));
            } else {
                $dados['mensagem'] = 'Usuário ou senha incorretos';
            }
        } 
        $this->template->load('template/template', 'painel/cadastro',  $dados);        
    }

	public function login()
	{
        $dados['mensagem'] = '';
        
        if( getSession('logged') ){
            redirect(base_url());
        }

        if( $this->input->post() ){
            $email = $this->input->post('email');
            $senha = $this->input->post('senha');   

            $exec = $this->clientes_model->buscaCliente($email, md5( $senha ) );
            if( !empty($exec) ){
                setSession([
                    'cliente' => $exec[0],
                    'logged' => true
                ]);

                redirect(base_url());
            } else {
                $dados['mensagem'] = 'Usuário ou senha incorretos';
            }
        } 
        $this->template->load('template/template', 'painel/login', $dados);
	}

    public function sair(){
        setSession([
            'cliente' => '',
            'logged' => false
        ]);

        redirect(base_url());
    }

	public function form()
	{
		
	}
}
