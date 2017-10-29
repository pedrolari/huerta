<!-- ================================== TOP VENTAS ================================== -->	
<aside class="sidebar blog-sidebar">	


<div class="widget">
	<h2 class="border">Ofertas</h1>
	<?php
	$cont=0;
	require_once 'db/conexion.php';
	//CONSULTA PARA SACAR EL PRODUCTO MAS NUEVO DE OFERTA INTRODUCIDO EN LA BBDD
	$result = $con->query("SELECT producto.nombre, producto.stock, producto.id_imagen, producto.precio, productos_productor.id_producto FROM producto, productos_productor WHERE producto.id_producto = productos_productor.id_producto AND producto.oferta=1 ORDER by productos_productor.fechaalta DESC");
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();

			$resultimagen = $con->query("SELECT * FROM imagenes WHERE id = '".$row['id_imagen']."'");
			while ($rowimg = $resultimagen->fetch_assoc()) {  
				$img = $rowimg["imagen"];
			}
			echo '
				<div class="product-item">

					<div class="image">
						<img alt="" width="100px" src="'.$img.'" />
					</div>
					<div class="body">
						<div class="label-discount">OFERTA !</div>

						<div class="title">
							<a href="producto.html">'.$row['nombre'].'</a>
							<div class="brand">Stock: '.$row['stock'].' uds</div>
						</div>
					</div>
					<div class="prices">
						<div class="price-current pull-right">'.$row['precio'].' €</div>
					</div>
				</div>
			';
		
	}
	?>
</div><!-- /.widget -->
<!-- ================================== TOP VENTAS : END ================================== -->	