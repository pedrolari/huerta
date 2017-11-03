<section id="cart-page">
    <div class="container">
        <!-- ========================================= CONTENIDO ========================================= -->
        <div class="col-xs-12 col-md-6 items-holder no-margin">
			
			<!-- ============= ITEM ============= -->
			<?php 
			require_once 'db/conexion.php'; 
			if(isset($_SESSION['cart'])){

				$resultado = $con->query($consulta);
				while ($row = $resultado->fetch_array()) {
					$nombreproducto=$_SESSION['cart'][$row['id_producto']]['nombre']; 
					$imagenproducto=$_SESSION['cart'][$row['id_producto']]['imagen']; 
					$precioproducto=$_SESSION['cart'][$row['id_producto']]['price'];
					$cantidadproducto=$_SESSION['cart'][$row['id_producto']]['quantity'];
					$id=$_SESSION['cart'][$row['id_producto']]['id'];

					//Consulta para la imagen
					$result1 = $con->query("SELECT * FROM imagenes WHERE id = '$imagenproducto'");
					while ($rowimg = $result1->fetch_assoc()) {  
						$img = $rowimg["imagen"];
					}
					echo '
					
					<div class="row no-margin cart-item">
						<div class="col-xs-12 col-sm-2 no-margin">
							<a href="#" class="thumb-holder">
								<img class="lazy" alt="" src="'.$img.'"  height="75"/>
							</a>
						</div>

						<div class="col-xs-12 col-sm-4 ">
							<div class="title">
								<a href="#">'. $nombreproducto.'</a>
							</div>
							<div class="brand">productor</div>
						</div> 

						<div class="col-xs-12 col-sm-3 no-margin">
							<div class="quantity">
								<div class="le-quantity"> 
									<form action="/paginas/actualizarcarrito.php" method="post">
										<a class="minus" id="menosuno" href="#reduce"></a>
										<input name="quantity" class="cantidad" id="'.$id.'" readonly="readonly" type="text" value="'.$cantidadproducto.'" />
										<a class="plus" id="masuno" href="#add"></a>
									</form>
								</div>
							</div>
						</div> 

						<div class="col-xs-12 col-sm-3">
							<div class="price">
								'. $precioproducto.' €
							</div>
							<a class="close-btn" href="#"></a>
						</div>
					</div><!-- /.cart-item -->
					
					';
					
				}		
				echo '<a class="le-button big pull-right" id="actualizar" href="index.php?page=carrito"><i class="fa fa-refresh" aria-hidden="true"></i> actualizar carrito</a>';				
			
			}else{ 
			echo '
			<section class="section section-page-title">
				<div class="page-header">
					<h2 class="page-title">No hay productos en el carrito</h2>
					<p class="page-subtitle">Añada productos al carrito de la compra</p>
				</div>
				<div class="buttons-holder" align="center">
					<a class="le-button big " href="index.php?page=maincliente"> continuar comprando </a>
				</div>
			</section><!-- /.section-page-title -->
			';
			}
			?>			
			



				
			</div>
			<!-- ========================================= CONTENT : END ========================================= -->

			<!-- ========================================= SIDEBAR ========================================= -->

			<div class="col-xs-12 col-md-4 no-margin sidebar ">
				<div class="widget cart-summary">
					<h1 class="border">carrito</h1>
					<div class="body">
						<ul class="tabled-data no-border inverse-bold">
							<li>
								<label>total carrito</label>
								<div class="value pull-right"><?php echo $totalprice; ?><span class="sign"> €</span></div>
							</li>
							<li>
								<label>envio</label>
								<div class="value pull-right">envio gratuito</div>
							</li>
						</ul>
						<ul id="total-price" class="tabled-data inverse-bold no-border">
							<li>
								<label>total pedido</label>
								<div class="value pull-right"><?php echo $totalprice; ?><span class="sign"> €</span></div>
							</li>
						</ul>
						<div class="buttons-holder">
							<a class="le-button big" href="index.php?page=pagarcarrito" >pagar</a>
							<a class="simple-link block" href="index.php?page=maincliente" ><i class="fa fa-arrow-right" aria-hidden="true"></i> continuar comprando</a>
							
						</div>
					</div>
				</div><!-- /.widget -->

				
				<!-- RETIRAR PARA QUE APAREZCA EL CUPON
				
				<div id="cupon-widget" class="widget">
					<h1 class="border">usar cupon</h1>
					<div class="body">
						<form>
							<div class="inline-input">
								<input data-placeholder="introduce el cupon" type="text" />
								<button class="le-button" type="submit">Aplicar</button>
							</div>
						</form>
					</div>
				</div>
				-->

				</div>

			<!-- ========================================= SIDEBAR : END ========================================= -->

    </div>
</section>