
	<!-- ================================== CONTENIDO PRINCIPAL ================================== -->
	<!-- Main Content -->
	<div class="row">
		<!-- ========== PANEL PEDIDOS ==========  -->
		<div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <i class="fa fa-search"></i> Devolucion de pedidos
                </div>
                <div class="panel-body ">
					<!-- ========================================= BUSQUEDA PEDIDOS ========================================= -->
					<div id="questions" class="panel-group panel-group-faq">
						<div class="panel panel-faq">
	
							<form role="form" name="registro" class="register-form cf-style-1" action="index.php?page=mainclientedevolucion" method="POST">					
								
								<div class="row field-row">
									<div class="col-xs-12 col-sm-12">
										<label for="nombrereg">Seleccione pedidos entre fechas:</label>
									</div>
								</div>
								<div class="row field-row">
									<div class="col-xs-12 col-sm-4">
										<label for="nombrereg">Seleccione una fecha:</label>
										<input type="date" name="primera" step="1" class="le-input"></label>
										
									</div>
									<div class="col-xs-12 col-sm-4">
										<label for="apellidosreg">Seleccione una fecha:</label>
										<input type="date" name="segunda" step="1" class="le-input">
									</div>
								</div>
								<div class="buttons-holder">
									<button type="submit" class="le-button" href="#collapseUno">Buscar pedidos</button>
								</div><!-- /.buttons-holder -->

							</form>	
							<div id="collapseUno" class="panel-collapse">
								<div class="panel-body">		
									<?php	
										require_once 'db/conexion.php';
										if(isset($_POST['primera']) && isset($_POST['segunda'])){
											$primera = $_POST['primera'];
											$segunda = $_POST['segunda'];
											echo '
												<form class="form-horizontal" role="form" method="post" action="index.php?page=mainclientedetalledevolucion">
													<div class="col-xs-12 col-sm-8">
														<label for="nombrereg">Selecciona un pedido para devolver: </label>
													</div>	
												
											';
												$result = $con->query("SELECT * FROM pedido where fecha between '$primera' and '$segunda'");
												if ($result->num_rows > 0) {
													while ($row = $result->fetch_assoc()) {     
														echo '
															<div class="col-xs-12  col-sm-8">
																<input class="le-radio" type="radio" name="numdevolucion" value="'.$row['idpedido'].'"> <div class="radio-label bold">Pedido numero:  '.$row['idpedido'].'</div>
															</div>													

														';
													}
												}
											echo '
														<div class="prices">
															<input class="le-button big pull-right" type="submit" value="Devolver pedido"> 
														</div>
													</form>
											';
										}
										else{
											echo "No se encontraron pedidos";
										}
									?>
								</div>
							</div>									
						</div><!-- /.panel-faq -->
					</div><!-- /.accordion -->
					<!-- ========================================= BUSQUEDA PEDIDOS : END ========================================= --> 
				</div><!-- /.category-accordions -->
			</div>
		</div>
	</div>
  	<!-- ================================== CONTENIDO PRINCIPAL : END ================================== -->