<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pedido_model extends CI_Model
{
    private $table = 'tb_pedido';

    public function get($id){
        $this->db->where('id',$id);
        $this->db->from("{$this->table} p" );
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getItens($pedido){
        $this->db->select('pd.*, p.qtd');
        $this->db->where('pedido',$pedido);
        $this->db->join('tb_produtos pd', 'pd.id = p.produto');
        $this->db->from("tb_itens p" );
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insert($dados, $itens)
    {
        $err = [];

        $this->db->trans_start();

        $this->db->insert($this->table, $dados);
        $err[] = $this->db->error();

        $codPedido = $this->db->insert_id();
        
        $itens = [];
        foreach ($_SESSION['cart_item'] as $key => $prod) {
            $itens[] = [
                'pedido' => $codPedido,
                'produto' => $prod['id'],
                'qtd' => $prod['qtd']
            ];
        }

        $this->db->insert_batch('tb_itens', $itens);
        $err[] = $this->db->error();

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            return $err;
        }

        return  $codPedido;
    }
}
