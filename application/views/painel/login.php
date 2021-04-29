	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Login</h1>
					<nav class="d-flex align-items-center">
						<a href="<?= base_url() ?>">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">Login</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Login Box Area =================-->
	<section class="login_box_area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<img class="img-fluid" src="<?= base_url('assets/img/login.jpg') ?>" alt="">
						<div class="hover">
							<h4>Novo no site ?</h4>
							<p>Crie uma conta grátis agora</p>
							<a class="primary-btn" href="/cliente/cadastro">Criar minha conta</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Log in to enter</h3>
						<form class="row login_form" action="" method="post" id="contactForm" novalidate="novalidate">
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="email" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Senha'">
							</div>
							
							<div class="col-md-12 form-group">
                                <button type="submit" value="submit" class="primary-btn">Entrar</button>
                                <p><?= $mensagem ?></p>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->