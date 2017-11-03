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
	
							<form role="form" name="registro" class="register-form cf-style-1" action="#" method="POST">					
								
								<div class="row field-row">
									<div class="col-xs-12 col-sm-12">
										<label for="nombrereg">Seleccione pedidos entre fechas:</label>
									</div>
								</div>
								<div class="row field-row">
									<div class="col-xs-12 col-sm-4">
										<label for="nombrereg">Seleccione una fecha:</label>
										<input type="date" name="primera" step="1" class="le-input" value="<?php echo date("Y-m-d");?>"></label>
										
									</div>
									<div class="col-xs-12 col-sm-4">
										<label for="apellidosreg">Seleccione una fecha:</label>
										<input type="date" name="segunda" step="1" class="le-input" value="<?php echo date("Y-m-d");?>">
									</div>
								</div>
								<div class="buttons-holder">
									<button type="submit" class="le-button" data-toggle="collapse" data-parent="#questions" href="#collapseUno">Buscar</button>
								</div><!-- /.buttons-holder -->

							</form>	
									
							<?php	
								session_start();
								include ("../db/conexion.php");

								$primera = $_POST['primera'];
								$segunda = $_POST['segunda'];
								$consultaavanzada = '';
								
								$result = $con->query("SELECT * from pedido where fecha BETWEEN '$primera' AND '$segunda'");
								if ($result->num_rows > 0) {
									while ($row = $result->fetch_assoc()) { 
									
									}
									
								}
								if(){
									echo '
									<div id="collapseUno" class="panel-collapse collapse">
										<div class="panel-body">

											
											
										</div>
									</div>
									';									
								}
								else {
									echo "No se han encontrado pedidos entre las fechas indicadas";	
								}
							?>
						</div><!-- /.panel-faq -->
					</div><!-- /.accordion -->
					<!-- ========================================= BUSQUEDA PEDIDOS : END ========================================= --> 
				</div><!-- /.category-accordions -->
			</div>
		</div>
	</div>
  	<!-- ================================== CONTENIDO PRINCIPAL : END ================================== -->