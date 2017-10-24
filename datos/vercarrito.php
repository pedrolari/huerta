						<?php
							
							if(isset($_GET['action']) && $_GET['action']=="carrito"){ 
								$id=$_GET['idproducto'];
								if(isset($_SESSION['cart'][$id])){ 
									$_SESSION['cart'][$id]['quantity']++; 
								}else{ 
									require_once 'db/conexion.php'; 
									$resul = $con->query("SELECT * FROM producto WHERE id_producto='$id'");
									while ($row = $resul->fetch_array()) {						
										$_SESSION['cart'][$row['id_producto']]=array("quantity" => 1, "price" => $row['precio']); 
									}										
								} 
							} 
						?>

						<!-- ============================================================= DESPLEGABLE CARRITO DE LA COMPRA ============================================================= -->
						<div class="top-cart-holder dropdown animate-dropdown">
							
							<div class="basket">
								
								<a class="dropdown-toggle" data-toggle="dropdown" href="#">
									<div class="basket-item-count">
										<span class="count">
										<!-------- MUESTRO UNIDADES DEL CARRITO --------->
										
										<?php 
											require_once 'db/conexion.php'; 
											if(isset($_SESSION['cart'])){

												//Guardo en $consulta todos los productos que tengo en el array de SESSION['cart']
												$consulta="SELECT * FROM producto WHERE id_producto IN ("; 
												foreach($_SESSION['cart'] as $id => $value) { 
													$consulta.=$id.","; 
												} 
												$consulta=substr($consulta, 0, -1).") ORDER BY id_producto ASC";
												
												$totalprice=0;
												$resultado = $con->query($consulta);

												while ($row = $resultado->fetch_array()) {
													$subtotal=$_SESSION['cart'][$row['id_producto']]['quantity']*$row['precio']; 
													$totalprice+=$subtotal;
													$cantidad=$_SESSION['cart'][$row['id_producto']]['quantity'];
													$totalcantidad+=$cantidad;
												}									  
												echo $totalcantidad;
											}else{ 
												echo "0"; 
											}
											
										
										?>
										
										</span>
										<img src="assets/images/icon-cart.png" alt="" />
									</div>

									<div class="total-price-basket"> 
										<span class="lbl">carrito:</span>
										<span class="total-price">
											<span class="value"><?php echo $totalprice ?></span><span class="sign">€</span>
										</span>
									</div>
								</a>
								<ul class="dropdown-menu">
									<li>
										<div class="basket-item">
											<div class="row">
												<div class="col-xs-4 col-sm-4 no-margin text-center">
													<div class="thumb">
														<img alt="" src="assets/images/products/product-small-01.jpg" />
													</div>
												</div>
												<div class="col-xs-8 col-sm-8 no-margin">
													<div class="title">Zanahorias</div>
													<div class="price">€5.00</div>
												</div>
											</div>
											<a class="close-btn" href="#"></a>
										</div>
									</li>
									<li>
										<div class="basket-item">
											<div class="row">
												<div class="col-xs-4 col-sm-4 no-margin text-center">
													<div class="thumb">
														<img alt="" src="assets/images/products/product-small-01.jpg" />
													</div>
												</div>
												<div class="col-xs-8 col-sm-8 no-margin">
													<div class="title">Tomates</div>
													<div class="price">€2.75</div>
												</div>
											</div>
											<a class="close-btn" href="#"></a>
										</div>
									</li>
									<li>
										<div class="basket-item">
											<div class="row">
												<div class="col-xs-4 col-sm-4 no-margin text-center">
													<div class="thumb">
														<img alt="" src="assets/images/products/product-small-01.jpg" />
													</div>
												</div>
												<div class="col-xs-8 col-sm-8 no-margin">
													<div class="title">Lechuga</div>
													<div class="price">€1.00</div>
												</div>
											</div>
											<a class="close-btn" href="#"></a>
										</div>
									</li>
									<li class="checkout">
										<div class="basket-item">
											<div class="row">
												<div class="col-xs-12 col-sm-6">
													<a href="index.php?page=carrito" class="le-button inverse">Ver carrito</a>
												</div>
												<div class="col-xs-12 col-sm-6">
													<a href="index.php?page=checkout" class="le-button">pagar</a>
												</div>
											</div>
										</div>
									</li>
								</ul>
							</div><!-- /.basket -->
						</div><!-- /.top-cart-holder -->
					</div><!-- /.top-cart-row-container -->
					<!-- ============================================================= DESPLEGABLE CARRITO DE LA COMPRA : END ============================================================= -->