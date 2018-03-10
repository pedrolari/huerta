						<?php
						require_once 'db/conexion.php';

						if(isset($_GET['action']) && $_GET['action']=="comentario"){ 
							// $nombre_comen = $_POST['nombre_coment'];
							// $email_comen = $_POST['email_coment'];
							$star_comen = $_POST['star_coment'];
							$mensaje_coment = $_POST['mensaje_coment'];

							$dni_comen = $_SESSION["dni"];
							$result3 = $con->query("SELECT * FROM cliente where dni = '$dni_comen'");
							while ($row3 = $result3->fetch_assoc()) {  
								$nombre_comen = $row3["nombre"];
								$email_comen = $row3["email"];
							}
							echo '<script language="javascript">alert($nombre_comen);</script>'; 
							
							$resul = $con->query("INSERT INTO comentarios (idproducto, nombre, email, mensaje, valoracion, fecha) VALUES ('$producto', '$nombre_comen', '$email_comen', '$mensaje_coment', '$star_comen', CURRENT_DATE)");
						}

						$result1 = $con->query("SELECT * FROM imagenes WHERE id in (SELECT id_imagen FROM producto WHERE id_producto = '$producto')");
						while ($rowimg = $result1->fetch_assoc()) {  
							$img = $rowimg["imagen"];
						}

						$consulta = "SELECT * FROM producto WHERE id_producto = '$producto'";
						$res = $con->query($consulta);
						if($res->num_rows > 0){
							$row = $res->fetch_assoc();

							$nombreproducto = $row["nombre"];
							
							echo '
							<div id="single-product" class="row">
								 <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
									<div class="product-item-holder size-big single-product-gallery small-gallery">
										<div id="owl-single-product">
											<div class="single-product-gallery-item" id="slide1">
												<img class="img-responsive" alt="" src="'.$img.'" />
											</div><!-- /.single-product-gallery-item -->

										</div><!-- /.single-product-slider -->


									</div><!-- /.single-product-gallery -->
								</div><!-- /.gallery-holder -->
								<div class="no-margin col-xs-12 col-sm-7 body-holder">
									<div class="body">
										
										

										<div class="title"><a href="#">'.$row['nombre'].'</a></div>
										<div class="brand">productor</div>


										<a class="btn-add-to-wishlist" href="#">añadir a la lista de deseos</a>
										

										<div class="excerpt">
											<p>'.$row['descripcion'].'</p>
										</div>
										
										<div class="prices">
											<div class="price-current">'.$row['precio'].'€</div>
											<div class="availability"><label>Disponibilidad:</label><span class="available"> '.$row['stock'].' uds. en stock</span></div>
										</div>

										<div class="qnt-holder">
											<div class="le-quantity">
												<form>
													<a class="minus" href="#reduce"></a>
													<input name="quantity" readonly="readonly" type="text" value="1" />
													<a class="plus" href="#add"></a>
												</form>
											</div>
											<a id="addto-cart" href="cart.html" class="le-button huge">añadir al carrito</a>
										</div><!-- /.qnt-holder -->
									</div><!-- /.body -->
								</div><!-- /.body-holder -->
							</div><!-- /.row #single-product -->
							'; 
							include("./paginas/comentarioscliente.php");    

						}else{
							echo 'Producto no encontrado...';
						}
						?>