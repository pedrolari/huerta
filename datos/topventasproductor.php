<?php

	require_once 'db/conexion.php';
	//CONSULTA PARA SACAR EL PRODUCTO MAS VENDIDO EN LA BBDD
	$result = $con->query("SELECT lineapedido.idproducto, SUM(lineapedido.cantidad) as TotalVentas, producto.id_imagen, producto.nombre, producto.stock, producto.precio FROM lineapedido, producto WHERE lineapedido.idproducto = producto.id_producto GROUP BY idproducto ORDER BY SUM(cantidad) DESC LIMIT 0,1");
	while ($row = $result->fetch_assoc()) {  
		$idproductomasvendido = $row["idproducto"];


			$resultimagen = $con->query("SELECT * FROM imagenes WHERE id = '".$row['id_imagen']."'");
			while ($rowimg = $resultimagen->fetch_assoc()) {  
				$img = $rowimg["imagen"];
			}
			echo '
			<aside class="sidebar blog-sidebar">
			<div class="widget">
			<h2 class="border">Top Ventas</h1>
				<div class="product-item">

					<div class="image">
						<img alt="" width="100px" src="'.$img.'" />
					</div>
					<div class="body">
						<div class="label-discount">Mas Vendido!</div>

						<div class="title">
							';
							$result1 = $con->query("SELECT * FROM producto WHERE id_producto = '".$row['idproducto']."'");
							while ($row1 = $result1->fetch_assoc()) {  
								$subcatproducto = $row1["idcat"];


								$result2 = $con->query("SELECT * FROM categoria WHERE idcat = '$subcatproducto'");
								while ($row2 = $result2->fetch_assoc()) {  
									$catpadreproducto = $row2["id_catpadre"];
								}
							}

							

							echo '

							<a href="index.php?page=productoproductor&cat='.$catpadreproducto.'&subcat='.$subcatproducto.'&idproducto='.$row['idproducto'].'&nombre='.$row["nombre"].'">'.strtoupper($row['nombre']).'</a>


							
							<div class="brand">Stock: <strong>'.$row['stock'].' uds</strong></div>
						</div>
					</div>
					<div class="prices">
						<div class="price-current pull-right"><strong>'.$row['precio'].' €</strong></div>
					</div>
				</div>
			</div><!-- /.widget -->
			';

	}


?>
