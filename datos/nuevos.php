<!-- ================================== NUEVOS ================================== -->	
					<aside class="sidebar blog-sidebar">
						<div class="widget">
						<h2 class="border">Nuevos</h1>
						<?php
						$cont=0;
						require_once 'db/conexion.php';
						$result = $con->query("SELECT * FROM producto Order by id_producto DESC");
						if ($result->num_rows > 0) {
							while ($row = $result->fetch_assoc()) {                
								if ($cont<5){
									echo ' 
									
									<div class="product-item">
										<div class="body">
											<div class="label-discount clear"></div>
											<div class="title">
												<i class="fa fa-check-square-o"></i><a href="index.php?page=producto"> '.$row["nombre"].'</a>
												<div class="brand">Stock: '.$row["stock"].' uds</div>
											</div>
										</div>
										<div class="prices">
											<div class="price-current pull-right">'.$row["precio"].'€</div>
										</div>
									</div>

									';
									$cont++;
								}
							}
						}else
						{
							echo "No hay productos";
						}
					?>					


						
					</div><!-- /.widget -->
					<!-- ================================== NUEVOS : END ================================== -->