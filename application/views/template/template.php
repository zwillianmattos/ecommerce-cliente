<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="img/fav.png">
	<!-- Author Meta -->
	<meta name="author" content="CodePixar">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>Karma Shop</title>
	<!--
		CSS
		============================================= -->
	<link rel="stylesheet" href="<?= base_url('assets/css/linearicons.css'); ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/font-awesome.min.css'); ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/themify-icons.css'); ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css'); ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/owl.carousel.css'); ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/nice-select.css'); ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/nouislider.min.css'); ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/ion.rangeSlider.css'); ?>" />
	<link rel="stylesheet" href="<?= base_url('assets/css/ion.rangeSlider.skinFlat.css'); ?>" />
	<link rel="stylesheet" href="<?= base_url('assets/css/magnific-popup.css'); ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/main.css'); ?>">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
	<script src="<?= base_url('assets/js/vendor/jquery-2.2.4.min.js'); ?>"></script>
</head>

<body>

	<!-- Start Header Area -->
	<header class="header_area sticky-header">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light main_box">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="<?= base_url() ?>"><img src="<?= base_url('assets/img/logo.png');?>" alt=""></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<ul class="nav navbar-nav menu_nav ml-auto">
							<li class="nav-item active"><a class="nav-link" href="<?= base_url() ?>">Home</a></li>
							<li class="nav-item"><a class="nav-link" href="contact.html">Admin</a></li>
							
<?php if( !empty( getSession('logged') ) ): ?>
<li class="nav-item"><a href="#" class="nav-link"  > <?= getSession('cliente')['nome'] 	?></a><li>
<li class="nav-item"><a href="<?= base_url('cliente/sair') ?>" class="nav-link"  > Sair</a><li> 
<?php else:?>	
<li class="nav-item"><a href="<?= base_url('cliente/login') ?>" class="nav-link"  > Login</a><li> 
<?php endif;?>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li class="nav-item"><a href="<?= base_url('cart') ?>" class="cart"><span class="ti-bag"></span></a></li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
	</header>
	<!-- End Header Area -->
	<?= $contents ?>
	<!-- start footer Area -->
	<footer class="footer-area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-3  col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6>Sobre</h6>
						<p>
							Ecommerce da fib
						</p>
					</div>
				</div>
				<div class="col-lg-4  col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<!-- <h6>Newsletter</h6>
						<p>Stay update with our latest</p>
						<div class="" id="mc_embed_signup">

							<form target="_blank" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
							 method="get" class="form-inline">

								<div class="d-flex flex-row">

									<input class="form-control" name="EMAIL" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '"
									 required="" type="email">


									<button class="click-btn btn btn-default"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
									<div style="position: absolute; left: -5000px;">
										<input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
									</div>

									<div class="col-lg-4 col-md-4">
												<button class="bb-btn btn"><span class="lnr lnr-arrow-right"></span></button>
											</div>  
								</div>
								<div class="info"></div>
							</form>
						</div> -->
					</div>
				</div>
				<div class="col-lg-3  col-md-6 col-sm-6">
					
				</div>
			</div>
			<div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
				<p class="footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script>  Feito por Willian de Mattos
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</p>
			</div>
		</div>
	</footer>
	<!-- End footer Area -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	 crossorigin="anonymous"></script>
	<script src="<?= base_url('assets/js/vendor/bootstrap.min.js'); ?>"></script>
	<script src="<?= base_url('assets/js/jquery.ajaxchimp.min.js'); ?>"></script>
	<script src="<?= base_url('assets/js/jquery.nice-select.min.js'); ?>"></script>
	<script src="<?= base_url('assets/js/jquery.sticky.js'); ?>"></script>
	<script src="<?= base_url('assets/js/nouislider.min.js'); ?>"></script>
	<script src="<?= base_url('assets/js/countdown.js'); ?>"></script>
	<script src="<?= base_url('assets/js/jquery.magnific-popup.min.js'); ?>"></script>
	<script src="<?= base_url('assets/js/owl.carousel.min.js'); ?>"></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="<?= base_url('assets/js/gmaps.min.js'); ?>"></script>
	<script src="<?= base_url('assets/js/main.js'); ?>"></script>
</body>

</html>