    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Compra</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="single-product.html">Compra</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Checkout Area =================-->
    <section class="checkout_area section_gap">
        <div class="container">
            <div class="returning_customer">
                <?php 
                    if(!getSession('logged')):
                ?>
                <div class="check_title">
                    <h2>Ops! <a href="<?= base_url('cliente/login')?>">Você precisa realizar login para finalizar o pedido</a></h2>
                </div>

                <?php endif; ?>
            </div>
            <?php 
                if(getSession('logged') && !empty($_SESSION['cart_item']) ):
            ?>
             <form class=" contact_form" action="<?= base_url('pedido/finalizar')?>" method="post" >
            <div class="billing_details">
                <div class="row">
                    <div class="col-lg-8">
                        <h3>Dados da compra</h3>
                        
                       <div class="row">
                            <div class="col-md-6 form-group ">
                                <input type="text" class="form-control" id="nome" name="nome" disabled value=" <?= getSession('cliente')['nome'] 	?>">
                                <span class="placeholder" data-placeholder="Nome" ></span>
                            </div>
                            <div class="col-md-6 form-group ">
                                <input type="text" class="form-control" id="cpf" name="cpf" disabled value=" <?= getSession('cliente')['cpf'] 	?>">
                                <span class="placeholder" data-placeholder="CPF"></span>
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="text" class="form-control" id="email" name="email" placeholder="Email" disabled value=" <?= getSession('cliente')['email'] 	?>">
                            </div>
                            <!-- <div class="col-md-6 form-group"></div>
                            <div class="col-md-6 form-group ">
                                <input type="text" class="form-control" id="tel" name="tel"  value=" <?= getSession('cliente')['tel'] 	?>" placeholder="Telefone">
                          
                            </div> -->
                </div>
                            <h4>Endereço de entrega</h4>
                            <div class="row">
                            <div class="col-md-12 form-group ">
                                <input type="text" class="form-control" id="endereco" name="endereco" required value=" <?= getSession('cliente')['endereco'] 	?>">
                                <span class="placeholder" data-placeholder="Endereço"></span>
                            </div>
                            <div class="col-md-12 form-group ">
                                <input type="text" class="form-control" id="bairro" name="bairro" required value=" <?= getSession('cliente')['bairro'] 	?>">
                                <span class="placeholder" data-placeholder="Bairro"></span>
                            </div>
                            <div class="col-md-4 form-group ">
                                <input type="text" class="form-control" id="cidade" name="cidade" required value=" <?= getSession('cliente')['cidade'] 	?>">
                                <span class="placeholder" data-placeholder="Cidade"></span>
                            </div>
                            <div class="col-md-4 form-group ">
                                <input type="text" class="form-control" id="uf" name="uf" required value=" <?= getSession('cliente')['uf'] 	?>">
                                <span class="placeholder" data-placeholder="UF"></span>
                            </div>
                            <div class="col-md-4 form-group">
                                <input type="text" class="form-control" id="cep" name="cep" placeholder="CEP" required value=" <?= getSession('cliente')['cep'] 	?>">
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="creat_account">
                                    <input type="checkbox" name="update_endereco" id="f-option2" name="selector">
                                    <label for="f-option2">Atualizar endereço de entrega</label>
                                </div>
                            </div>
                </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="order_box">
                            <h2>Sua compra</h2>
                            <ul class="list">
                                <li><a href="#">Produto <span>Total</span></a></li>
<?php
    $subtotal = 0;
    $frete = 10;
    foreach( $_SESSION['cart_item'] as $key => $prod) {     
        $frete += $frete * 0.5;
        $subtotal +=  $prod['valor'] *  $prod['qtd'];
?>
                                <li><a href="#" title="<?= $prod['titulo'] ?>"><?= substr($prod['titulo'], 0, 15) ?>...<span class="middle">x<?= $prod['qtd'] ?></span> <span class="last">R$ <?= $prod['valor'] *  $prod['qtd']?></span></a></li>
<?php
   }  
?>  
                                <input type="hidden" class="form-control" value="<?= $subtotal + $frete ?>"  name="valor_total">
                                <input type="hidden" class="form-control" value="<?= $frete ?>" id="frete" name="frete">
                            </ul>
                            <ul class="list list_2">
                                <li><a href="#">Subtotal <span>R$ <?= $subtotal ?></span></a></li>
                                <li><a href="#">Taxa de etrega <span>R$ <?= $frete ?></span></a></li>
                                <li><a href="#">Total <span>R$ <?= $subtotal + $frete ?> </span></a></li>
                            </ul>
                            <div class="payment_item active">
                                <div class="radion_btn">
                                    <input type="radio" id="f-option5" name="fomapagto"  value="1" onchange="ativa(1)" checked>
                                    <label for="f-option5">Boleto</label>
                                    <div class="check"></div>
                                </div>
                                <p>Pagamento via boleto</p>
                            </div>
                            <div class="payment_item ">
                                <div class="radion_btn">
                                    <input type="radio" id="f-option6" name="fomapagto" value="2" onchange="ativa(0)" >
                                    <label for="f-option6">Cartão de Crédito </label>
                                    <img src="img/product/card.jpg" alt="">
                                    <div class="check"></div>
                                </div>
                                <div class="row cartaocampos">
                                    <div class="col-md-8 form-group p_star">
                                        <input type="text" class="form-control" id="num_card" name="num_card">
                                        <span class="placeholder" data-placeholder="Número Cartão"></span>
                                    </div>
                                    <div class="col-md-4 form-group p_star">
                                        <input type="text" class="form-control" id="cvv" name="cvv">
                                        <span class="placeholder" data-placeholder="CVV"></span>
                                    </div>
                                    <div class="col-md-6 form-group p_star">
                                        <input type="text" class="form-control" id="data_exp" name="data_exp">
                                        <span class="placeholder" data-placeholder="Data exp"></span>
                                    </div>
                                    <div class="col-md-6 form-group p_star">
                                        <select name="bandeira">
                                            <option value="">Bandeira</option>                                        
                                            <option value="2">Visa </option>
                                            <option value="3">Master </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button class="primary-btn" type="submit">Finalizar compra</button>
                        </div>
                    </div>
                </div>
            </div>
            </form>
            <?php endif; ?>
        </div>
    </section>
    <script>
        $(document).ready(function(){
            ativa(1);

            $(".contact_form").validate();
        })
        
        function ativa( remove = false ){
            if( remove ){
                $('.cartaocampos').hide();
                $('.cartaocampos input, .cartaocampos select').attr('required', false);
            }else{
                $('.cartaocampos').show();
                $('.cartaocampos input, .cartaocampos select').attr('required', true);
            }
        }  
    </script>
    <!--================End Checkout Area =================-->