<?php 
	require_once 'db/conexion.php';
    if(isset($_GET['action']) && $_GET['action']=="carrito"){ 
        
		//Inicializamos el contador de productos seleccionados.
		$xTotal = 0;

		//compruebo que sea entero
		$id=intval($_GET['idproducto']); 
		
		//Si ya hay un producto le aumento en 1 la cantidad, sino hago la consulta en la BBDD
        if(isset($_SESSION['carrito'][$id])){ 
            $_SESSION['carrito'][$id]['cantidad']++; 
        }else{ 
            $consulta="SELECT * FROM producto WHERE id_producto={$id}"; 
            $resultado=mysql_query($consulta); 
            if(mysql_num_rows($resultado)!=0){ 
                $row_s=mysql_fetch_array($resultado); 
                //$_SESSION['carrito'][$row_s['id_producto']]=array("cantidad" => 1, "precio" => $row_s['precio']); 
				$_SESSION['carrito'][$row_s['id_producto']]=array("precio" => $row_s['precio']); 
            }else{ 
                $message="This product id it's invalid!"; 
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
											if(isset($_SESSION['carrito'])){ 
												  
												foreach($_SESSION['carrito'] as $id => $x) { 
													
													echo $_SESSION['carrito'][$row_s['id_producto']]=array("precio" => $row_s['precio']);
													
													//$coste = $precio * $x;
													//Contador del total de productos añadidos al carro
													//$xTotal = $xTotal + $x;
												} 

										
											 //echo $xTotal; 
													  
												} 												  
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
											<span class="sign">€</span><span class="value">3219,00</span>
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