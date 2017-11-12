	<!-- ================================== CONTENIDO PRINCIPAL ================================== -->
	<!-- Main Content -->
	<div class="row">
		<!-- ========== PANEL PEDIDOS ==========  -->
		<div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <i class="fa fa-usd"></i> Descuentos
                </div>
                <div class="panel-body ">
					<!-- ========================================= Arbol de Busqueda ========================================= -->
					<div id="questions" class="panel-group panel-group-faq">
						<div class="panel panel-faq">
							<div class="panel-heading">
								<h4 class="panel-title">
										Seleciona las categorias para realizar descuentos
								</h4>
							</div>
							<div class="panel">
								<div class="panel-body">
									<form class="form-horizontal" role="form" method="post" id="descuento" action="index.php?page=adminofertas">
									  <div class="form-group">
										<label for="Categoria" class="col-lg-2 control-label">Categoria</label>
										<div class="col-lg-6">
											<select  id="categoria" name="categoria" class="form-control" required>
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
									  </div>
									  <div class="form-group">
										<label for="Subcategoria" class="col-lg-2 control-label">Subcategoria</label>
										<div class="col-lg-6">
											<select id="subcategoria" name="subcategoria" class="form-control" required>
											</select>
										</div>
									  </div>
									  <div class="form-group">
										<div class="col-lg-offset-2 col-lg-6">
										  <button type="submit" class="btn btn-primary btn-block" href="#collapseUno">Buscar productos</button>
										</div>
										<div class="col-lg-4">
										</div>
									  </div>
									</form>
								</div>
							</div>
						</div><!-- /.panel-faq -->
						<!-- ==================== Busqueda por Usuario: END ==================== -->
						<!-- ==================== RESULTADOS BUSQUEDA ==================== -->
						<div id="collapseUno" class="panel-collapse">
							<div class="panel-body">		
								<?php	
									require_once 'db/conexion.php';
									if(isset($_POST['subcategoria'])){
										
										$subcategoria = $_POST['subcategoria'];
										echo '
											<form class="form-horizontal" role="form" method="post" action="index.php?page=adminofertas">
											<div class="form-group">
												<div class="col-xs-12 col-sm-8">
													<label for="nombrereg">Marca los productos y los descuentos: </label>
												</div>	
											</div>
										';
										$result = $con->query("SELECT * FROM producto where idcat='$subcategoria'");
										if ($result->num_rows > 0) {
											while ($row = $result->fetch_assoc()) {     
												echo '
		
													<div class="col-xs-12  col-sm-4">
														<input class="le-checkbox big" type="checkbox" id="'.$row['id_producto'].'" name="descuento"> <div class="radio-label bold"> '.$row['nombre'].'</div>
													</div>													
													<div class="col-xs-12  col-sm-2">
													<input class="le-input '.$row['id_producto'].'" type="text" name="'.$row['id_producto'].'" placeholder=" %"> 
													</div>	
												';
											}
										}
										echo '
												<div class="form-group">
													<div class="prices">
														<input class="le-button big pull-right" id="aplicardescuento" type="submit" value="Aplicar" href="#collapseDos">
													</div>
												</div>
												</form>
										';
									}
									else{
										echo "No se encontraron productos";
									}
								?>
							</div>
						</div>	
						<!-- ==================== RESULTADOS BUSQUEDA: END ==================== -->

						<!-- ==================== DESCUENTOS REALIZADOS ==================== -->
						<div id="collapseDos" class="panel-collapse">
							<div class="panel-body">		
								<div class="form-group">
									<div class="col-xs-12 col-sm-8">
										<?php
											session_start();
											if(isset($_POST['idprodescuento']) && isset($_POST['porciento'])){
												$idprodes = $_POST['idprodescuento'];
												$prodescu = $_POST['porciento'];
												
												require_once 'db/conexion.php';
												$result = $con->query("SELECT * FROM producto where id_producto='$idprodes'");
												if ($result->num_rows > 0) {
													while ($row = $result->fetch_assoc()) {
														$precioantes=$row['precio'];
														$total = ($precioantes -(($precioantes * $prodescu) / 100));
														$result4 = $con->query("UPDATE producto SET precio='$total', oferta='1', descuento='$prodescu' WHERE id_producto='$idprodes' ");
													}
												}
											}		
										?>
									</div>	
								</div>
							</div>
						</div>	
						<!-- ==================== DESCUENTOS REALIZADOS: END ==================== -->
					</div><!-- /.accordion -->
				</div><!-- /.category-accordions -->
				<!-- ========================================= CATEGORY TREE : END ========================================= -->
			</div>
		</div>
	</div>
  	<!-- ================================== CONTENIDO PRINCIPAL : END ================================== -->