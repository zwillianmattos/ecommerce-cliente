    <!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Carrinho</h1>
					<nav class="d-flex align-items-center">
						<a href="<?=base_url() ?>l">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">Carrinho</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
    <!-- End Banner Area -->
<?php 

if( !empty( $_SESSION['cart_item'] )) {
?>
    <!--================Cart Area =================-->
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
<?php
    
    foreach( $_SESSION['cart_item'] as $key => $prod) { 
        
?>
                            <tr class="linha-item">
                                <td>
                                    <input type="hidden" id="cor_<?=$prod['id']?>" value="<?=$prod['cor']?>">
                                    <div class="media vertical-align">
                                        <a href="<?php echo base_url('cart/removeCart/'.$prod['id']); ?>"
                                            class="btn btn-danger btn-sm" type="button">
                                            <i class="lnr lnr-trash"></i></a>
                                            
                                        <div class="d-flex">
                                            <img src="<?= $prod['bg'] ?>" alt="" width="150px">
                                        </div>
                                        <div class="media-body">
                                            <p><?= $prod['titulo'] ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h5 id="preco_<?=$prod['id']?>"><?= $prod['valor'] ?></h5>
                                </td>
                                <td>
                                    <div class="product_count">
                                        <input type="text" id="qtd_<?=$prod['id']?>" name="qty" id="sst" maxlength="12" value="<?= $prod['qtd'] ?>" title="Quantity:"
                                            class="input-text qty" onblur="calculaTotalItem( <?=$prod['id']?> )">
                                        <button onclick="calculaTotalItem( <?=$prod['id']?>, 'add' );"
                                            class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
                                        <button onclick="calculaTotalItem( <?=$prod['id']?>, 'rem' )"
                                            class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
                                    </div>
                                </td>
                                <td>
                                    <h5 id="subtot_<?=$prod['id']?>" class="subtot"><?= $prod['valor'] * $prod['qtd'] ?></h5>
                                </td>
                            </tr>
<?php 
    }

?>
                            <tr class="bottom_button">
                                <td>
                                <a class="gray_btn" href="/pedido/fechar">Fechar carrinho</a>
                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    
                                </td>
                            </tr>
                            <tr>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <h5>Subtotal</h5>
                                </td>
                                <td>
                                    <h5 id="total" >00</h5>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!--================End Cart Area =================-->
<?php 
} else {
    ?>
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <h1>Carrinho vazio</h1>
            </div>
        </div>
    </section>
    <?php 
}
?>    
<script>
$(document).ready( function() {
    total();
})


function calculaTotalItem( indice, op = false ){
    var preco = parseFloat( $('#preco_'+indice).text() );
    var qtd = $('#qtd_'+indice).val();
    if( op == 'add'){
        qtd++;
    } else if( op == 'rem' ){
        qtd--;
    }
    
    if( qtd <= 0 )
        qtd=1;

    $('#qtd_'+indice).val(qtd);
    $("#subtot_"+indice).text( preco * qtd );
    
    $.post('http://localhost:2000/cart/add', { produto: indice, cor: $('#cor_'+indice).val(), qtd: qtd } ,() => {});
    total();
}

function total() {
    var total = 0;

    $('.linha-item').each( (i, e) => {
        var x = $(e).find('.subtot');
        total += parseFloat( x.text() );
    })

    $('#total').text("R$"+ total);
}
</script>