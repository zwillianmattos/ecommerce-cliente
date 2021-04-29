<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

	private $cart;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('produtos_model');
	}
    public function index() {
        //session_destroy();

        $this->template->load('template/template', 'cart/index');
    }
    public function removeCart(){
        $id = $this->uri->segment(3);
        
        removeCart($id);

        redirect(base_url('cart'));
    }
	public function add()
	{
        $ret = [
            'status' => false,
            'mensagem' => 'Ocorreu um erro ao atualizar carrinho'
        ];
        
        try {
    
            $dados = [
                'produto' => $this->input->post('produto'),
                'cor' => $this->input->post('cor'),
                'qtd' => !empty( $this->input->post('qtd') ) ? $this->input->post('qtd') : -1,
            ];
            saveCart($dados);
            
            $ret = [
                'status' => true,
                'mensagem' => 'Item acionado a sacola',
            ];
        }catch( Exception $e ){
            $ret = [
                'status' => false,
                'mensagem' => $e->getMessage()
            ];
        }

        echo json_encode($ret, JSON_NUMERIC_CHECK);
	}

}
