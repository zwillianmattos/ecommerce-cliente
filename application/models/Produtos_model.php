<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos_model extends CI_Model {
    private $table = 'tb_produtos';


    public function listAll(){
        $this->db->select('p.*, c.id as codCor, c.descricao AS cor, c.valor, ( c.valor * 1.2 ) as desconto ', false);
        $this->db->from("{$this->table} p" );
        $this->db->join("tb_cor c", "c.produto = p.id" );
        $query = $this->db->get();
        return $query->result_array();
    }

    public function listaTamanhoTenis( $id , $cor = false ){
        $this->db->select("t.descricao AS tamanho, t.indisponivel, t.qtd, p.id AS produto");
        $this->db->from("tb_tamanho t" );
        $this->db->join("tb_produtos p", "p.id = t.produto" );
        $this->db->join("tb_cor c", "c.id = t.cor" );
        $this->db->where("p.id", $id );
        $this->db->order_by('t.descricao');
        if( $cor ){
            $this->db->where("c.descricao", $cor );
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    public function listaImagensProduto( $id , $cor = false ){
        $this->db->select("i.id, i.url, c.id AS cor");
        $this->db->from("tb_imagens i" );
        $this->db->join("tb_cor c", "c.id = i.cor" );
        $this->db->join("{$this->table} p", "c.produto = p.id" );
        $this->db->where("c.produto", $id );
        if( $cor ){
            $this->db->where("c.descricao", $cor );
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    public function listaCoresTenis( $id ){
        $this->db->select("c.*");
        $this->db->from("tb_cor c" );
        $this->db->join("{$this->table} p", "c.produto = p.id" );
        $this->db->where("c.produto", $id );
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get($id, $cor = false) {
        $this->db->where('p.id', $id);
        if( $cor )
            $this->db->where('c.descricao', $cor);
        
        return $this->listAll();
    }

    /**
     * Busca os ultimos produtos cadastrados
     */
    public function buscaUltimos() {
        $this->db->limit(8);
        $this->db->order_by('p.id', 'desc');

        return $this->listAll();
    }

    public function buscaUltimosMaisCaros() {
        $this->db->limit(3);
        $this->db->order_by('p.id, c.valor', 'desc');
        return $this->listAll();
    }



 
}
