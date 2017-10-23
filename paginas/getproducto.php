<?php

if(!empty($_GET['idproducto'])){
	require_once '../db/conexion.php';


	$result1 = $con->query("SELECT * FROM imagenes WHERE id in (SELECT id_imagen FROM producto WHERE id_producto = {$_GET['idproducto']})");
	while ($rowimg = $result1->fetch_assoc()) {  
		$img = $rowimg["imagen"];
	}

    $consulta = "SELECT * FROM producto WHERE id_producto = {$_GET['idproducto']}";
    $producto = $con->query($consulta);
    if($producto->num_rows > 0){
        $row = $producto->fetch_assoc();
				
		echo '
		<div id="single-product" class="row">
			 <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
				<div class="product-item-holder size-big single-product-gallery small-gallery">
					<div id="owl-single-product">
						<div class="single-product-gallery-item" id="slide1">
							<a data-rel="prettyphoto" href="images/products/product-gallery-01.jpg">
								<img class="img-responsive" alt="" src="'.$img.'" />
							</a>
						</div><!-- /.single-product-gallery-item -->

					</div><!-- /.single-product-slider -->

				</div><!-- /.single-product-gallery -->
			</div><!-- /.gallery-holder -->
			<div class="no-margin col-xs-12 col-sm-7 body-holder">
				<div class="body">
					<div class="star-holder inline"><div class="star" data-score="3"></div></div>
					<div class="availability"><label>Disponibilidad:</label><span class="available"> '.$row['stock'].' uds. en stock</span></div>

					<div class="title"><a href="#">'.$row['nombre'].'</a></div>
					<div class="brand">productor</div>


					<a class="btn-add-to-wishlist" href="#">añadir a la lista de deseos</a>
					

					<div class="excerpt">
						<p>'.$row['descripcion'].'</p>
					</div>
					
					<div class="prices">
						<div class="price-current pull-right">'.$row['precio'].'€</div>

					</div>

				</div><!-- /.body -->
				
			</div><!-- /.body-holder -->
		</div><!-- /.row #single-product -->		
		';
		
		
    }else{
        echo 'Producto no encontrado...';
    }
}else{
    echo 'Producto no encontrado...';
}
?>