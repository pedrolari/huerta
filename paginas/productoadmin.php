						<?php
						require_once 'db/conexion.php';
						
						if(isset($_GET['action']) && $_GET['action']=="comentario"){ 
							$nombre_comen = $_POST['nombre_coment'];
							$email_comen = $_POST['email_coment'];
							$star_comen = $_POST['star_coment'];
							$mensaje_coment = $_POST['mensaje_coment'];

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
									</div><!-- /.body -->
								</div><!-- /.body-holder -->
							</div><!-- /.row #single-product -->
							';
							include("./paginas/comentariosadmin.php");
						}else{
							echo 'Producto no encontrado...';
						}
						?>