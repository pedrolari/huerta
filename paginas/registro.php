<main id="authentication" class="inner-bottom-md">
	<div class="container">
		<div class="row">
			<div class="col-md-5">
				<section class="section register inner-left-xs">
					<h2 class="bordered">Registro</h2>
					<p>Crea tu cuenta introduciendo tus datos</p>

					<form role="form" name="registro" class="register-form cf-style-1" action="index.php?page=registrook" method="POST">
						<div class="field-row">
							<label for="dnireg">Dni</label>
                            <input type="text" name="dnireg" class="le-input">
                        </div><!-- /.field-row -->						
						<div class="field-row">
							<label for="nombrereg">Nombre</label>
                            <input type="text" name="nombrereg" class="le-input" required>
                        </div><!-- /.field-row -->
						<div class="field-row">
							<label for="apellidosreg">Apellidos</label>
                            <input type="text" name="apellidosreg" class="le-input" required>
                        </div><!-- /.field-row -->
						<div class="field-row">
							<label for="direcreg">Direccion</label>
                            <input type="text" name="direcreg" class="le-input" required>
                        </div><!-- /.field-row -->						
						<div class="field-row">
							<label for="telefonoreg">Telefono</label>
                            <input type="text" name="telefonoreg" class="le-input" required>
                        </div><!-- /.field-row -->	
						
						<div class="field-row">
							<label for="provreg">Provincia</label>
							<select name="provreg" class="le-input" id="provincia" required>
								<option value="0">Seleccionar Provincia</option>
							<?php
								require_once 'db/conexion.php';
								$result = $con->query("SELECT * FROM provincias");
								if ($result->num_rows > 0) {
									while ($row = $result->fetch_assoc()) {                
										echo '<option name="provreg" value="'.$row['id_provincia'].'">'.$row['provincia'].'</option>';
									}
								}
							?>
							</select>
						</div><!-- /.field-row -->
						<div class="field-row">
							<label for="localreg">Localidad</label>
							<select name="localreg" class="le-input" id="localidad" required>';
							</select>
						</div><!-- /.field-row -->						
						<div class="field-row">
							<label for="emailreg">Email</label>
                            <input type="text" name="emailreg" class="le-input" required>
                        </div><!-- /.field-row -->
						<div class="field-row">
							<label for="user">Usuario</label>
                            <input type="text" name="user" class="le-input" required>
                        </div><!-- /.field-row -->						
						<div class="field-row">
							<label for="passreg">Password</label>
                            <input type="text" name="passreg" class="le-input" required>
                        </div><!-- /.field-row -->
						<div class="field-row">
							<label for="passrepetirreg">Confirma Password</label>
                            <input type="text" name="passrepetirreg" class="le-input" required>
                        </div><!-- /.field-row -->						
                        <div class="buttons-holder">
                            <button type="submit" class="le-button huge">Registrarme</button>
                        </div><!-- /.buttons-holder -->
					</form>
					<!--<script src="assets/js/valida_registro.js"></script>-->
				</section><!-- /.register -->
			</div>	
				<div class="col-md-3">
					<section class="section register inner-left-xs">
						<h2 class="semi-bold">Beneficios :</h2>
						<ul class="list-unstyled list-benefits">
							<li><i class="fa fa-check primary-color"></i> Productos directos del agricultor</li>
							<li><i class="fa fa-check primary-color"></i> Descuentos por pedido</li>
							<li><i class="fa fa-check primary-color"></i> Sin esperas, directo a tu mesa</li>
						</ul>
				</section><!-- /.register -->
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</main><!-- /.authentication -->