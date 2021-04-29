<?php 
function getCart() {
    $ret = [
        'status' => false,
        'mensagem' => 'Ocorreu um erro ao atualizar carrinho'
    ];
    
    try {
        
        $cart = $_SESSION["cart_item"];
        
        $ret = [
            'status' => true,
            'mensagem' => '',
            'cart' => $cart
        ];
    }catch( Exception $e ){
        $ret = [
            'status' => false,
            'mensagem' => $e->getMessage(),
            'cart' => []
        ];
    }
    echo json_encode($ret, JSON_NUMERIC_CHECK);
}

function saveCart($dados) {
    $ci = & get_instance();
    
    $produto = $dados['produto'];
    $cor = $dados['cor'];
    $qtd = $dados['qtd'];
    
    $cart = [];
    $productByCode =  $ci->produtos_model->get( $produto, $cor );
    $img = $ci->produtos_model->listaImagensProduto( $produto,  $cor );

    if(!empty($_SESSION["cart_item"])) {
        if(in_array($productByCode[0]["id"], array_keys($_SESSION["cart_item"] ) )) {
            foreach($_SESSION["cart_item"] as $k => $v) {
                    if($productByCode[0]["id"] == $k ) {

                        if( $cor == $_SESSION["cart_item"][$k]["cor"] ) {

                            if(empty($_SESSION["cart_item"][$k]["qtd"])) {
                                $_SESSION["cart_item"][$k]["qtd"] = 0;
                            } else if( !empty($_SESSION["cart_item"][$k]["qtd"]) && $qtd == -1 ) {
                                $_SESSION["cart_item"][$k]["qtd"] += 1;
                            } else {
                                $_SESSION["cart_item"][$k]["qtd"] = $qtd;
                            }
                        } else {
                            $productByCode[0]['qtd'] = 1;
                            $productByCode[0]['bg'] = $img[0]['url'];
                            $_SESSION["cart_item"][$productByCode[0]['id']] = $productByCode[0];
                        }
                    }
            }
        } else {
            $productByCode[0]['qtd'] = 1;
            $productByCode[0]['bg'] = $img[0]['url'];
            $_SESSION["cart_item"][$productByCode[0]['id']] = $productByCode[0];
        }   
    } else {
        $productByCode[0]['qtd'] = 1;
        $productByCode[0]['bg'] = $img[0]['url'];
        $_SESSION["cart_item"][$productByCode[0]['id']] = $productByCode[0];
    }

    return $_SESSION["cart_item"];
}

function removeCart($produto) {
    if(!empty($_SESSION["cart_item"])) {
		foreach($_SESSION["cart_item"] as $k => $v) {
			if($produto == $k)
				unset($_SESSION["cart_item"][$k]);				
			if(empty($_SESSION["cart_item"]))
				unset($_SESSION["cart_item"]);
		}
    }
    
    return $_SESSION["cart_item"];
}

function clearCart(){
    unset($_SESSION["cart_item"]);   
    return true;
}