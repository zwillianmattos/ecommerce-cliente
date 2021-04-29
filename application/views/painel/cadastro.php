	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
	    <div class="container">
	        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
	            <div class="col-first">
	                <h1>Nova conta</h1>
	                <nav class="d-flex align-items-center">
	                    <a href="<?= base_url() ?>">Home<span class="lnr lnr-arrow-right"></span></a>
	                    <a href="#">Nova conta</a>
	                </nav>
	            </div>
	        </div>
	    </div>
	</section>
	<!-- End Banner Area -->

	<!--================Login Box Area =================-->
	<section class="login_box_area section_gap">
	    <div class="container">
	        <h3>Cadastro</h3>
	        <!-- <div class="row"> -->
	        <form class="row login_form" id="cadastro" action="/cliente/cadastro" method="post" id="contactForm" novalidate="novalidate">
	            <div class="col-lg-6">

	                <h4>Informações Básicas</h4>
	                <div class="col-md-12 form-group">
	                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome"
	                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nome'" required="required">
	                </div>
	                <div class="col-md-12 form-group">
	                    <input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF"
	                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'CPF'" required="required" >
	                </div>
	                <div class="col-md-12 form-group">
	                    <input type="text" class="form-control" id="email" name="email" placeholder="Email"
	                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" required="required">
	                </div>
	                <div class="col-md-12 form-group">
	                    <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha"
	                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Senha'" required="required" >
	                </div>
	            </div>
	            <div class="col-lg-6">
	                <h4>Endereço de entrega</h4>
	                <div class="col-md-6 form-group">
	                    <input type="text" class="form-control" id="cep" name="cep" placeholder="CEP"
	                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'CEP'" >
	                </div>
	                <div class="col-md-12 form-group">
	                    <input type="text" class="form-control" id="uf" name="uf" placeholder="UF"
	                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'UF'" >
	                </div>
	                <div class="col-md-12  form-group">
	                    <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade"
	                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Cidade'" >
	                </div>
	                <div class="col-md-12 form-group">
	                    <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro"
	                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Bairro'"  >
	                </div>
	                <div class="col-md-12 form-group">
	                    <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Endereço"
	                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Endereço'" value="" >
	                </div>
	            </div>
	            <div class="col-md-12 form-group">
	                <button type="submit" value="submit" class="primary-btn">Cadastrar</button>
	            </div>
	        </form>
	        <!-- </div> -->
	    </div>
	</section>

    <script>
    
        $(document).ready( function() {

            $("#cadastro").validate();
        })
    
    </script>
	<!--================End Login Box Area =================-->