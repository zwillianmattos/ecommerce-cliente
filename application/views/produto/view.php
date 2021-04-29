	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Tênis</h1>
					<nav class="d-flex align-items-center">
						<a href="<?=base_url() ?>l">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">Comprar<span class="lnr lnr-arrow-right"></span></a>
						<a href="#"><?= $registro['titulo'] ?></a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Single Product Area =================-->
	<div class="product_image_area">
		<div class="container">
			<div class="row s_product_inner">
				<div class="col-lg-6">
					<div class="s_Product_carousel">

						<?php
							foreach( $registro['imagens'] as $i ){
								?>
						<div class="single-prd-item">
							<img class="img-fluid" src="<?= $i['url'] ?>" alt="">
						</div>
								<?php 
							}
						?>
					</div>
				</div>
				<div class="col-lg-5 offset-lg-1">
					<div class="s_product_text">
						<h3><?= $registro['titulo'] ?></h3>
						<h2>R$ <?= $registro['valor'] ?></h2>
						<ul class="list">
							<li><a class="active" href="#"><span>Modelo</span> : <?= $registro['cor'] ?></a></li>
							<li><a class="active" href="#"><span>Tamanhos</span> </a></li>
							<li>
							<?php 
							 	if(!empty( $registro['tamanhos'])){
									foreach( $registro['tamanhos'] as $t ){
										?>
										<a class="btn  <?= $t['indisponivel'] ? 'desactive' : 'active' ?>" href="javascript:;"><?= $t['tamanho'] ?></a>
										<?php
									}
								} else {
									?>
									<p>Fora do estoque</p>
									<?php
								}
								
							?>
							</li>
							<!-- <li><a href="#"><span>Availibility</span> : In Stock</a></li> -->	
						</ul>
						<p></p>
						<div class="product_count">
							<label for="qty">Quantity:</label>
							<input type="text" name="qty" id="sst" maxlength="12" value="1" title="Quantity:" class="input-text qty">
							<button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
							 class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
							<button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
							 class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
						</div>
						<div class="card_area d-flex align-items-center">
							<a class="primary-btn" href="#">Add to Cart</a>
							<a class="icon_btn" href="#"><i class="lnr lnr lnr-diamond"></i></a>
							<a class="icon_btn" href="#"><i class="lnr lnr lnr-heart"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--================End Single Product Area =================-->

	<!--================Product Description Area =================-->
	<section class="product_description_area">
		<div class="container">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<li class="nav-item ">
					<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
				</li>
			</ul>
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
				<?= $registro['descricao'] ?>
				</div>
			</div>
		</div>
	</section>
	<!--================End Product Description Area =================-->
