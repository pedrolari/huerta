<!-- ================================== TOP VENTAS ================================== -->	
					<aside class="sidebar blog-sidebar">
						<div class="widget">
						<h2 class="border">Ofertas</h1>
						<?php
						$cont=0;
						require_once 'db/conexion.php';
						$result = $con->query("SELECT * FROM producto WHERE oferta=1 Order by id_producto ASC");
						if ($result->num_rows > 0) {
							while ($row = $result->fetch_assoc()) {
						
							}
						}
						?>
						<div class="product-item">

							<div class="image">
								<img alt="" width="100px" src="assets/images/blank.gif" data-echo="https://biotrendies.com/wp-content/uploads/2015/06/calabaza.jpg" />
							</div>
							<div class="body">
								<div class="label-discount clear"></div>
								<div class="title">
									<a href="producto.html">CALABAZA</a>
									<div class="brand">Stock: 10uds</div>
								</div>
							</div>
							<div class="prices">
								<div class="price-current pull-right">2.30€</div>
							</div>
						</div>
					</div><!-- /.widget -->
					<!-- ================================== TOP VENTAS : END ================================== -->	