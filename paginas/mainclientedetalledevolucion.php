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
							
							<?php
								$idpedidodevolucion = $_POST['numdevolucion'];
								echo '
								<div class="row field-row">
									<div class="col-xs-12 col-sm-12">
										<label for="nombrereg">Devolucion de productos del pedido numero: '.$idpedidodevolucion.'</label>
										<br><br>
									</div>
								</div>
								<div class="row field-row">
									<div class="col-xs-12 col-sm-3">
										Ref										
									</div>
									<div class="col-xs-12 col-sm-3">
										Nombre
									</div>
									<div class="col-xs-12 col-sm-3">
										Uds
									</div>
									<div class="col-xs-12 col-sm-3">
										Devolver
									</div>
								</div>
								
								<div class="row field-row">
									
								</div>								
								<form class="form-horizontal" role="form" method="post" action="index.php?page=mainclientedetalledevolucionok">
								';	
								include ("../db/conexion.php");
								$consulta = "SELECT * FROM lineapedido WHERE idpedido = '$idpedidodevolucion'";
								$producto = $con->query($consulta);
								if($producto->num_rows > 0){
									while ($row = $producto->fetch_assoc()){
										
										$idprodevoldetalle = $row['idproducto'];
										
										$idlineapedidodetalle = $row['idlineapedido'];
										
										
										$result1 = $con->query("SELECT * FROM producto where id_producto = '$idprodevoldetalle'");
										if ($result1->num_rows > 0) {
											while ($row1 = $result1->fetch_assoc()) {
												echo '
												
												<div class="row field-row">
												<br><br>
													
													<div class="col-xs-12 col-sm-3">
														'.$row['idproducto'].'
														
													</div>
													<div class="col-xs-12 col-sm-3">
														'.$row1['nombre'].'
													</div>
													<div class="col-xs-12 col-sm-3">
														'.$row['cantidad'].'
													</div>
													<div class="col-xs-12 col-sm-1 no-margin">
														<div class="quantity">
															<div class="le-quantity">  
																<input name="canti" class="cantidaddevolucion" id="'.$idlineapedidodetalle.'" type="number" min="0" max="'.$row['cantidad'].'"/>
															</div>
														</div>
													</div> 
												</div>
												
												';
											}
										}

									}	

								}else{
									echo 'No hay informacion del pedido</form>';
								}
							?>
								<br><br>
									<div class="prices">
											<input class="le-button big pull-right" id="devolver" type="submit" value="Devolver productos"> 
									</div>
							
						</div><!-- /.panel-faq -->
					</div><!-- /.accordion -->
					<!-- ========================================= BUSQUEDA PEDIDOS : END ========================================= --> 
				</div><!-- /.category-accordions -->
			</div>
		</div>
	</div>
  	<!-- ================================== CONTENIDO PRINCIPAL : END ================================== -->