	<!-- ================================== CONTENIDO PRINCIPAL ================================== -->
	<!-- Main Content -->
	<div class="row">
		<!-- ========== PANEL PEDIDOS ==========  -->
		<div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <i class="fa fa-search"></i> Busqueda Avanzada
                </div>
                <div class="panel-body ">
					<!-- ========================================= Arbol de Busqueda ========================================= -->
					<div id="questions" class="panel-group panel-group-faq">
						<div class="panel panel-faq">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#questions" href="#collapseUno">
										<i class="fa fa-user" aria-hidden="true"></i> Busqueda por usuario
									</a>
								</h4>
							</div>
							<div id="collapseUno" class="panel-collapse collapse">
								<div class="panel-body">
									<!-- ==================== FORMULARIO Busqueda por Usuario ==================== -->											
									<form role="form" name="registro" class="register-form cf-style-1" action="index.php?page=busquedausuario" method="POST">					
										<div class="row field-row">
											<div class="col-xs-12 col-sm-6">
												<label for="nombrereg">Nombre</label>
												<input type="text" name="nombreuser" class="le-input" >
											</div>
											<div class="col-xs-12 col-sm-6">
												<label for="apellidosreg">Apellidos</label>
												<input type="text" name="apellidosuser" class="le-input" >
											</div>
										</div>
										<div class="row field-row">
											<div class="col-xs-12 col-sm-6">
											<label for="provreg">Provincia</label>
												<select name="provuser" class="le-input" id="provincia" >
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
											</div>
											<div class="col-xs-12 col-sm-6">
												<label for="localreg">Localidad</label>
												<select name="localuser" class="le-input" id="localidad">';
												</select>
											</div>
										</div><!-- /.field-row -->
										<div class="row field-row">
											<div class="col-xs-12 col-sm-6">
												<label for="user">Usuario</label>
												<input type="text" name="useruser" class="le-input">
											</div>
										</div><!-- /.field-row -->										
										<div class="buttons-holder">
											<button type="submit" class="le-button">Buscar</button>
										</div><!-- /.buttons-holder -->
									</form>	
									<!-- ==================== FORMULARIO Busqueda por Usuario: END ==================== -->		
								</div>
							</div>
						</div><!-- /.panel-faq -->
						<!-- ==================== Busqueda por Usuario: END ==================== -->
						<!-- ==================== Busqueda por Producto ==================== -->
						<div id="questions" class="panel-group panel-group-faq">
							<div class="panel panel-faq">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#questions" href="#collapseDos">
											<i class="fa fa-shopping-cart" aria-hidden="true"></i> Busqueda por producto
										</a>
									</h4>
								</div>
								<div id="collapseDos" class="panel-collapse collapse">
									<div class="panel-body">
										<!-- ==================== FORMULARIO Busqueda por Producto ==================== -->											
										<form role="form" name="registro" class="register-form cf-style-1" action="index.php?page=busquedaproducto" method="POST">					
											<div class="row field-row">
												<div class="col-xs-12 col-sm-6">
													<label for="nombrereg">Nombre producto</label>
													<input type="text" name="nombrepro" class="le-input" >
												</div>

												<div class="col-xs-12 col-sm-6">
													<label for="provreg">Categoria</label>
													<select  id="categoria" name="categoria" class="le-input" >
													<option value="">Seleccione Categoria</option>
													<?php
														require_once 'db/conexion.php';
														$result = $con->query("SELECT * FROM categoria where id_catpadre=0");
														if ($result->num_rows > 0) {
															while ($row = $result->fetch_assoc()) {                
																echo '<option name="categoria" value="'.$row['idcat'].'">'.$row['nombre'].'</option>';
															}
														}
													?>
													</select>
												</div>	
											
											</div><!-- /.field-row -->											
															
											<div class="row field-row">
												<div class="col-xs-12 col-sm-3">
													<label for="user">Rango Precio</label>
													<div class="col-xs-12">
														<input class="le-radio" type="radio" name="preciopro" value="0"> <div class="radio-label bold"> <4€</div>
													</div>
													<div class="col-xs-12">
														<input class="le-radio" type="radio" name="preciopro" value="1"> <div class="radio-label bold"> >4€</div>
													</div>														
												</div>
												<div class="col-xs-12 col-sm-3">
													<label for="user">Otros</label>
													<div class="col-xs-12">
														<input class="le-checkbox big" type="checkbox" name="ofertaspro" value="1"/> <div class="radio-label bold">Ofertas</div>
													</div>
													<div class="col-xs-12">
														<input class="le-checkbox big" type="checkbox" name="novedadespro" value="1"/> <div class="radio-label bold">Novedades</div>
													</div>
												</div>													
												<div class="col-xs-12 col-sm-6">
													<label for="Subcategoria" class="col-lg-2 control-label">Subcategoria</label>
													<select id="subcategoria" name="subcategoria" class="le-input"></select>
												</div>	
											</div><!-- /.field-row -->											
											<div class="buttons-holder">
												<button type="submit" class="le-button">Buscar</button>
											</div><!-- /.buttons-holder -->
										</form>	
										<!-- ==================== FORMULARIO Busqueda por Producto: END ==================== -->	
									</div>
								</div>
							</div><!-- /.panel-faq -->
						</div>
						<!-- ==================== Busqueda por Producto: END ==================== -->
					</div><!-- /.accordion -->
				</div><!-- /.category-accordions -->
				<!-- ========================================= CATEGORY TREE : END ========================================= -->  
			</div>
		</div>
	</div>
  	<!-- ================================== CONTENIDO PRINCIPAL : END ================================== -->