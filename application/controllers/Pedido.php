<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedido extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(['pedido_model', 'clientes_model']);
    }

    public function index() {
        redirect(base_url('pedido/fechar'));
    }
    
    public function fechar() {
        $this->template->load('template/template', 'pedido/index');
    }

    public function cupom() {
        $id = $this->uri->segment(3);
        
        $pedido = $this->pedido_model->get($id);
        $itensPedido = $this->pedido_model->getItens($id);
        $this->load->view('pedido/cupom');
    }

    public function finalizar() {
        if( getSession('logged') ){

            $dados = [
                'cliente' => getSession('cliente')['id'],
                'forma_pagto' => $this->input->post('fomapagto'),
                'frete' => $this->input->post('frete'),
                'valor_total' =>$this->input->post('valor_total'), 
            ];

            $endereco = [];
            if( $this->input->post('update_endereco') ){
                $endereco = [
                    'endereco' => $this->input->post('endereco'),
                    'bairro' => $this->input->post('bairro'),
                    'cidade' => $this->input->post('cidade'),
                    'uf' => $this->input->post('uf'),
                    'cep' => $this->input->post('cep'),
                ];

                $exec = $this->clientes_model->update($endereco, getSession('cliente')['id']);
                if( $exec !== true ) {
                    exit($exec);
                }
            }

            if( $dados['forma_pagto'] == 2 ){
                $dados['num_card'] = $this->input->post('num_card');
                $dados['cvv'] = $this->input->post('cvv');
                $dados['data_exp'] = $this->input->post('data_exp');
                $dados['bandeira'] = $this->input->post('bandeira');
            }

            $exec = $this->pedido_model->insert($dados, getSession('cliente')['id']);
            if( $exec != true ) {
                exit($exec);
            }

            unset($_SESSION['cart_item']);
            redirect(base_url('pedido/cupom/'.$exec));
        }
    }
}
