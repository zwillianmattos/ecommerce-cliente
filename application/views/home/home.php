	<!-- start banner Area -->
	<section class="banner-area">
	    <div class="container">
	        <div class="row fullscreen align-items-center justify-content-start">
	            <div class="col-lg-12">
	                <div class="active-banner-slider owl-carousel">

	                    <?php 
if( !empty($ultimosMaisCaros) ){

	foreach( $ultimosMaisCaros as $prod ){
		?>
	                    <!-- single-slide -->
	                    <div class="row single-slide align-items-center d-flex">
	                        <div class="col-lg-5 col-md-6">
	                            <div class="banner-content">
	                                <h2><?= $prod['titulo'] ?></h2>
	                                <p><?= !empty( $prod['descricao'] ) ? '': ''  ?></p>
	                                <div class="add-bag d-flex align-items-center">
	                                    <a class="add-btn" href="javascript:;" data-cor="<?= $prod['cor'] ?>" data-produto="<?= $prod['id'] ?>"><span class="lnr lnr-cross"></span></a>
	                                    <span class="add-text text-uppercase">Add to Bag</span>
	                                </div>
	                            </div>
	                        </div>
	                        <div class="col-lg-7">
	                            <div class="banner-img">
	                                <img class="img-fluid" src="<?= $prod['imagens'][0]['url'] ?>" alt="">
	                            </div>
	                        </div>
	                    </div>
	                    <!-- single-slide -->
	                    <?php
	}

}
					?>
	                </div>
	            </div>
	        </div>
	    </div>
	</section>
	<!-- End banner Area -->


	<!-- start product Area -->
	<section class="owl-carousel  section_gap">

	    <div class="container">
	        <div class="row justify-content-center">
	            <div class="col-lg-6 text-center">
	                <div class="section-title">
	                    <h1>Últimos produtos</h1>
	                    <p>Veja abaixo os últimos lançamentos.</p>
	                </div>
	            </div>
	        </div>
	        <div class="row">

	            <?php
					if(!empty($ultimosProdutos)) {

						foreach($ultimosProdutos as $prod){
							
							?>
	            <!-- single product -->
	            <div class="col-lg-3 col-md-6">
	                <div class="single-product">
	                    <img class="img-fluid" src="<?= $prod['imagens'][0]['url'] ?>" alt="">
	                    <div class="product-details">
	                        <h6><?= $prod['titulo'] ?></h6>
	                        <div class="price">
	                            <h6>R$ <?= $prod['valor'] ?></h6>
	                            <h6 class="l-through">R$ <?= $prod['desconto'] ?></h6>
	                        </div>
	                        <div class="prd-bottom">	
	                            <a  href="javascript:;" class="social-info add-btn" data-cor="<?= $prod['cor'] ?>" data-produto="<?= $prod['id'] ?>">
	                                <span class="ti-bag"></span>
	                                <p class="hover-text">add to bag</p>
	                            </a>
	                            <a href="<?= base_url("/produto/view/{$prod['id']}/{$prod['cor']}") ?>" class="social-info">
	                                <span class="lnr lnr-move"></span>
	                                <p class="hover-text">view more</p>
	                            </a>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <?php
						}
					}
					?>

	        </div>
	    </div>
	    </div>
	</section>
	<!-- end product Area -->
