<main id="authentication" class="inner-bottom-md">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<section class="section sign-in inner-right-xs">
					<h2 class="bordered">Autenticación</h2>
					<p>Hola, bienvenido a tu cuenta</p>

						<div class="social-auth-buttons">
							<div class="row">
								<div class="col-md-6">
									<button class="btn-block btn-lg btn btn-facebook"><i class="fa fa-facebook"></i> Login con Facebook</button>
								</div>
								<div class="col-md-6">
									<button class="btn-block btn-lg btn btn-twitter"><i class="fa fa-twitter"></i> Login con Twitter</button>
								</div>
							</div>
						</div>
					<form role="form" name="login" class="login-form cf-style-1" action="index.php?page=loginok" method="POST">					
						<div class="field-row">
                            <label for="email">Email / Usuario</label>
                            <input type="text" name="email" class="le-input" placeholder="introduce email o usuario" required>
                        </div><!-- /.field-row -->

                        <div class="field-row">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="le-input" placeholder="Contraseña del usuario" required>
                        </div><!-- /.field-row -->

                        <div class="field-row clearfix">
                        	<span class="pull-left">
                        		<label class="content-color"><input type="checkbox" class="le-checbox auto-width inline"> <span class="bold">Recordarme</span></label>
                        	</span>
                        	<span class="pull-right">
                        		<a href="#" class="content-color bold">Olvidaste el password ?</a>
                        	</span>
                        </div>

                        <div class="buttons-holder">
                            <button type="submit" class="le-button huge">Autenticacion segura</button>
                        </div><!-- /.buttons-holder -->
					</form><!-- /.cf-style-1 -->
					<!--<script src="assets/js/valida_login.js"></script>-->
				</section><!-- /.sign-in -->
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</main><!-- /.authentication -->