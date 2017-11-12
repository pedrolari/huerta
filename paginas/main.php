						<!-- ================================== CONTENIDO PRINCIPAL ================================== -->
						<section id="gaming">
							<div class="grid-list-products">							
								<div class="tab-content">
									<!-- ================================== GRID VIEW ================================== -->
									<div id="grid-view" class="products-grid fade tab-pane in active">
										<div class="product-grid-holder">
											<div class="row no-margin">

											<?php
											require_once 'db/conexion.php';
											$CantidadMostrar=9;
											
											//Cortar descripcion...
											function cortarTexto($texto, $numMaxCaract){
												if (strlen($texto) <  $numMaxCaract){
													$textoCortado = $texto;
												}else{
													$textoCortado = substr($texto, 0, $numMaxCaract);
													$ultimoEspacio = strripos($textoCortado, " ");

													if ($ultimoEspacio !== false){
														$textoCortadoTmp = substr($textoCortado, 0, $ultimoEspacio);
														if (substr($textoCortado, $ultimoEspacio)){
															$textoCortadoTmp .= '...';
														}
														$textoCortado = $textoCortadoTmp;
													}elseif (substr($texto, $numMaxCaract)){
														$textoCortado .= '...';
													}
												}

											return $textoCortado;
											}

											// Validado de la variable GET
											$compag =(int)(!isset($_GET['pag'])) ? 1 : $_GET['pag']; 
											$TotalReg=$con->query("SELECT * FROM producto");
											//Se divide la cantidad de registro de la BD con la cantidad a mostrar 
											$TotalRegistro = ceil($TotalReg->num_rows/$CantidadMostrar);
											
											//Consulta SQL
											$registros = (($compag-1)*$CantidadMostrar);
											
									
											$consulta = "SELECT * FROM producto ORDER BY id_producto ASC LIMIT ".(($compag-1)*$CantidadMostrar)." , ".$CantidadMostrar;
											$producto = $con->query($consulta);
											if ($producto->num_rows > 0) {
												while ($row = $producto->fetch_assoc()) { 
												
													$idpro = $row["id_producto"];
													$des = $row["descuento"];
													$oferta = $row["oferta"];
													$precioactual = $row["precio"];

													$result1 = $con->query("SELECT * FROM imagenes WHERE id in (SELECT id_imagen FROM producto WHERE id_producto = '$idpro')");
													while ($rowimg = $result1->fetch_assoc()) {  
														$img = $rowimg["imagen"];
													}
													
													//CONSULTO LA CATEGORIA HIJA PARA HACER EL BREADCRUMB SIN PASAR POR CATEGORIAS
													$result2 = $con->query("SELECT * FROM categoria WHERE idcat in (SELECT idcat FROM producto WHERE id_producto = '$idpro')");
													while ($rowcat = $result2->fetch_assoc()) {  
														$cathija = $rowcat["nombre"];
														$catpa = $rowcat["id_catpadre"];
													}
													
													//CONSULTO LA CATEGORIA PADRE PARA HACER EL BREADCRUMB SIN PASAR POR CATEGORIAS
													$result2 = $con->query("SELECT * FROM categoria WHERE idcat='$catpa'");
													while ($rowcat = $result2->fetch_assoc()) {  
														$catpadre = $rowcat["nombre"];
													}
													
													$descrip =  $row["descripcion"];
													
													
													echo '
														<div class="col-xs-12 col-sm-4 no-margin product-item-holder hover">
															<div class="product-item">
															';
															// productos nuevos
															$result2 = $con->query("SELECT DATEDIFF( CURDATE(), fechaalta ) AS dias FROM productos_productor where id_producto = '$idpro'");
															while ($rowdato = $result2->fetch_assoc()) {  
																$dias = $rowdato["dias"];
															}
															if ($dias<=15){
																echo '	<div class="ribbon blue"><span>nuevo!</span></div>';
															}
															//productos oferta
															$result3 = $con->query("SELECT * from producto where oferta = 1 and id_producto = '$idpro'");
															if ($result3->num_rows > 0) {
																
																while ($rowoferta = $result3->fetch_assoc()) {
																	echo '<div class="ribbon green"><span>oferta!</span></div>';
																}
															}															
															echo '
																<div class="image">
																	<img alt="" height="150" src="'.$img.'" />
																</div>
																<div class="body">
																	<div class="label-discount clear"></div>
																	<div class="title">
																		<a href="index.php?page=producto&cat='.$catpadre.'&subcat='.$cathija.'&idproducto='.$idpro.'&nombre='.$row["nombre"].'">'.$row["nombre"].'</a>
																	</div>
																	<div class="brand">';echo cortarTexto($descrip, 80); echo'</div>
																	<div class="label-discount green">Stock: '.$row["stock"].' uds</div>
																		<a href="javascript:void(0);" data-href="paginas/getproducto.php?idproducto='.$idpro.'" class="openBtn"><i class="fa fa-plus-square-o"></i> informacion... </a>
																	</div>
																	<div class="prices">
																		';
																		
														
																		$precioantiguo = (($precioactual*100)/(100-$des));
																		if($oferta==1){
																			echo '
																				<div class="price-prev"><strike>'.$precioantiguo.' </strike>€</div>
																			';
																		}
																		echo '
																	<div class="price-current pull-right">'.$row["precio"].'€</div>
																</div>

															</div>
														</div>
														
														<!-- VENTANA MODAL -->
														<div class="modal fade" id="myModal" role="dialog">
															<div class="modal-dialog">
																<!-- Modal content-->
																<div class="modal-content">
																	<div class="modal-body">	
																			<!-- AQUI CARGA EL PRODUCTO -->																	
																	</div>
																	<div class="modal-footer">
																		
																		<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
																	</div>
																</div>
															</div>
														</div>
													';
												}
											}else
											{
												echo "No hay productos";
											}
											?>
											</div><!-- /.row -->
										</div><!-- /.product-grid-holder -->
										<?php
										echo '
										<div class="pagination-holder">
											<div class="row">
												<div class="col-xs-12 col-sm-12 text-left">
													<ul class="pagination ">';
													
											/*Sector de Paginacion */
													
													//Operacion matematica para botón siguiente y atrás 
													$IncrimentNum =(($compag +1)<=$TotalRegistro)?($compag +1):1;
													$DecrementNum =(($compag -1))<1?1:($compag -1);
													
													echo '<li><a href="index.php?page=main&pag='.$DecrementNum.'">Anterior</a></li>';
																
													//Se resta y suma con el numero de pag actual con el cantidad de 
													//números  a mostrar
													 $Desde=$compag-(ceil($CantidadMostrar/2)-1);
													 $Hasta=$compag+(ceil($CantidadMostrar/2)-1);
													 
													 //Se valida
													 $Desde=($Desde<1)?1: $Desde;
													 $Hasta=($Hasta<$CantidadMostrar)?$CantidadMostrar:$Hasta;
													 //Se muestra los números de paginas
													 for($i=$Desde; $i<=$Hasta;$i++){
														//Se valida la paginacion total
														//de registros
														if($i<=$TotalRegistro){
															//Validamos la pag activo
														  if($i==$compag){
														   echo '<li class="current"><a href="index.php?page=main&pag='.$i.'">'.$i.'</a></li>';
														  }else {
															echo '<li><a href="index.php?page=main&pag='.$i.'">'.$i.'</li>';
														  }     		
														}
													 }
													echo '<li><a href="index.php?page=main&pag='.$IncrimentNum.'">Siguiente</a></li>';
													echo '
													
													</ul>
												</div>
											</div><!-- /.row -->
										</div><!-- /.pagination-holder -->';
										?>
									</div><!-- /.products-grid #grid-view -->
								</div><!-- /.tab-content -->
							</div><!-- /.grid-list-products -->

						</section><!-- /#gaming --> 
						<!-- ================================== CONTENIDO PRINCIPAL : END ================================== -->