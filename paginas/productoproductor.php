						<?php
						require_once 'db/conexion.php';
						
						$result1 = $con->query("SELECT * FROM imagenes WHERE id in (SELECT id_imagen FROM producto WHERE id_producto = '$producto')");
						while ($rowimg = $result1->fetch_assoc()) {  
							$img = $rowimg["imagen"];
						}

						$consulta = "SELECT * FROM producto WHERE id_producto = '$producto'";
						$producto = $con->query($consulta);
						if($producto->num_rows > 0){
							$row = $producto->fetch_assoc();

							$nombreproducto = $row["nombre"];
							
							echo '
							<div id="single-product" class="row">
								 <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
									<div class="product-item-holder size-big single-product-gallery small-gallery">
										<div id="owl-single-product">
											<div class="single-product-gallery-item" id="slide1">
												<img class="img-responsive" alt="" src="'.$img.'" />
											</div><!-- /.single-product-gallery-item -->

											<div class="single-product-gallery-item" id="slide2">
												<a data-rel="prettyphoto" href="images/products/product-gallery-01.jpg">
													<img class="img-responsive" alt="" src="assets/images/blank.gif" data-echo="https://www.natursan.net/wp-content/sandia.jpg" />
												</a>
											</div><!-- /.single-product-gallery-item -->

											<div class="single-product-gallery-item" id="slide3">
												<a data-rel="prettyphoto" href="images/products/product-gallery-01.jpg">
													<img class="img-responsive" alt="" src="assets/images/blank.gif" data-echo="https://static.vix.com/es/sites/default/files/styles/large/public/imj/elgrancatador/C/Como-hacer-un-martini-de-sandia-1.jpg?itok=YOXLnXBI" />
												</a>
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

							<!-- ========================================= SINGLE PRODUCT TAB ========================================= -->
							<section id="single-product-tab">
								<div class="no-container">
									<div class="tab-holder">
										<ul class="nav nav-tabs simple" >
											<li class="active"><a href="#reviews" data-toggle="tab">Opiniones (3)</a></li>
										</ul><!-- /.nav-tabs -->

										<div class="tab-content">
											<div class="tab-pane active" id="reviews">
												<div class="comments">
													<div class="comment-item">
														<div class="row no-margin">
															<div class="col-lg-1 col-xs-12 col-sm-2 no-margin">
																<div class="avatar">
																	<img alt="avatar" src="assets/images/default-avatar.jpg">
																</div><!-- /.avatar -->
															</div><!-- /.col -->

															<div class="col-xs-12 col-lg-11 col-sm-10 ">
																<div class="comment-body">
																	<div class="meta-info">
																		<div class="author inline">
																			<a href="#" class="bold">Alejandro Benito</a>
																		</div>
																		<div class="star-holder inline">
																			<div class="star" data-score="4"></div>
																		</div>
																		<div class="date inline pull-right">
																			12.07.2017
																		</div>
																	</div><!-- /.meta-info -->
																	<p class="comment-text">
																		Integer id purus ultricies nunc tincidunt congue vitae nec felis. Vivamus sit amet nisl convallis, faucibus risus in, suscipit sapien. Vestibulum egestas interdum tellus id venenatis. 
																	</p><!-- /.comment-text -->
																</div><!-- /.comment-body -->

															</div><!-- /.col -->

														</div><!-- /.row -->
													</div><!-- /.comment-item -->
												</div><!-- /.comments -->

												<!-- ========================================= COMENTARIOS ========================================= -->      
												<div class="add-review row">
													<div class="col-sm-8 col-xs-12 col-md-12">
														<div class="new-review-form">
															<h2>Añadir opinion</h2>
															<form id="contact-form" class="contact-form" method="post" >
																<div class="row field-row">
																	<div class="col-xs-12 col-sm-6">
																		<label>nombre*</label>
																		<input class="le-input" >
																	</div>
																	<div class="col-xs-12 col-sm-6">
																		<label>email*</label>
																		<input class="le-input" >
																	</div>
																</div><!-- /.field-row -->
																
																<div class="field-row star-row">
																	<label>tu voto</label>
																	<div class="star-holder">
																		<div class="star big" data-score="0"></div>
																	</div>
																</div><!-- /.field-row -->

																<div class="field-row">
																	<label>tu opinion</label>
																	<textarea rows="8" class="le-input"></textarea>
																</div><!-- /.field-row -->

																<div class="buttons-holder">
																	<button type="submit" class="le-button huge">enviar</button>
																</div><!-- /.buttons-holder -->
															</form><!-- /.contact-form -->
														</div><!-- /.new-review-form -->
													</div><!-- /.col -->
												</div><!-- /.add-review -->
												<!-- ========================================= COMENTARIOS: END ========================================= -->
											</div><!-- /.tab-pane #reviews -->
										</div><!-- /.tab-content -->
									</div><!-- /.tab-holder -->
								</div><!-- /.container -->
							</section><!-- /#single-product-tab -->
							<!-- ========================================= SINGLE PRODUCT TAB : END ========================================= -->      
							';
							
							
						}else{
							echo 'Producto no encontrado...';
						}
						?>