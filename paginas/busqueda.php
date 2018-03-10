<?php
	session_start();
	include ("../db/conexion.php");

	$nombrepro = $_POST['nombrepro'];
	
	$consultaavanzada = '';
	if($nombrepro != '') {
		$consultaavanzada = "producto.nombre LIKE '%$nombrepro%'";
	}
	
	//CONSULTA DE DATOS DE BUSQUEDA DE USUARIO
	$result = $con->query("SELECT producto.id_producto as id, producto.nombre as nombre, producto.precio as precio, producto.oferta as oferta, producto.idcat as categoria, DATEDIFF( CURDATE(), productos_productor.fechaalta ) as dias FROM categoria, producto, productos_productor WHERE producto.id_producto=productos_productor.id_producto AND producto.idcat=categoria.idcat AND $consultaavanzada");
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) { 
			
			$sc = $row["categoria"];
			$id = $row["id"];
			
			if ($row["oferta"]==1)
				$oferta = "Si";
			else
				$oferta = "No";
			
			if ($row["dias"]<15)
				$novedad = "Si";
			else
				$novedad = "No";
			
			// CONSULTA DE SUBCATEGORIA
			$result1 = $con->query("SELECT * FROM categoria WHERE idcat='$sc'");
			if ($result1->num_rows > 0) {
				while ($row1 = $result1->fetch_assoc()) {
					$subcat = $row1["nombre"];
					$idpadre = $row1["id_catpadre"];
				}
			}

			// CONSULTA DE CATEGORIA
			$result2 = $con->query("SELECT * FROM categoria WHERE idcat='$idpadre'");
			if ($result2->num_rows > 0) {
				while ($row2 = $result2->fetch_assoc()) {
					$cat = $row2["nombre"];
				}
			}

			$result1 = $con->query("SELECT * FROM imagenes WHERE id in (SELECT id_imagen FROM producto WHERE id_producto = '$id')");
			while ($rowimg = $result1->fetch_assoc()) {  
				$img = $rowimg["imagen"];
			}
			
			echo '
			    <div class="comment-item">
					<div class="row no-margin">
						<div class="col-lg-2 col-xs-12 col-sm-2 no-margin">
							<div class="avatar pull-right">
								<img src="'.$img.'" alt="'.$row["nombre"].'">
							</div>
						</div>
						<div class="col-xs-12 col-lg-10 col-sm-10 no-margin-right">
							<div class="comment-body">
								<div class="meta-info">
									<header class="row no-margin">
										<div class="pull-left">
											<h4 class="author"><a href="#">'.$row["nombre"].'</a></h4>
											<span class="date">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Categoria:</b> '.$cat.'</span>
											<span class="date"><b>Subcategoria:</b> '.$subcat.'</span>
										</div>
									</header>
								</div>
								
								<p class="comment-content"><span class="date"><b>Novedad:</b> '.$novedad.'</span>
								<span class="date"><b>Oferta:</b> '.$oferta.'</span>
								<span class="date"><b>Precio:</b> '.$row["precio"].' €</span></p>

							</div>
						</div>
					</div>
				</div>
			';
		}
	}	
	else{
		echo '
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="posts sidemeta">
						<div class="post format-standard">
							<div class="post-content">
								<h2 class="post-title">No se ha encontrado ningun producto</h2>
							</div>
						</div>
					</div>
				</div>
			</div>
			</div>
		';
	}
?>


