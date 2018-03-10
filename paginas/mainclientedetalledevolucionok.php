<?php
	// if(isset($_POST['idlineapedidodetalle']) && isset($_POST['cantprodevolucion'])){
		$lineapedidoid = $_POST['idlineapedidodetalle'];
		$cantdevolucion = $_POST['cantprodevolucion'];
		

		$result1 = $con->query("select pedido.dnicliente, pedido.idpedido from pedido, lineapedido where pedido.idpedido=lineapedido.idpedido and lineapedido.idlineapedido = '$lineapedidoid'");
		while ($row11 = $result1->fetch_assoc()) {  
			$dnicliente1 = $row11['dnicliente'];
			
			echo $dnicliente1;
		}

		$result7= $con->query("select idpedido from pedido WHERE dnicliente NOT IN ("'$dnicliente1'")");
		while ($row7 = $result7->fetch_assoc()) { 
			$pedidoeliminar = $row7['idpedido'] 
			$con->query("DELETE FROM lineapedido WHERE idpedido = '$pedidoeliminar'");
		}

		/*
		$result1 = $con->query("SELECT * FROM lineapedido WHERE idlineapedido = '$lineapedidoid'");
		while ($row1 = $result1->fetch_assoc()) {  
			$restado = ($row1["cantidad"]-$cantdevolucion);
			$lineapedidoidproducto = $row1["idproducto"];
			$pedidoid = $row1["idpedido"];

			if(($restado)>0){

				$result3 = $con->query("SELECT * FROM producto WHERE id_producto='$lineapedidoidproducto'");
				while ($row3 = $result3->fetch_assoc()) {
					$productostock = $row3["stock"];
					$precioproducto = $row3["precio"];
				}
				//CALCULO EL PRECIO DE LA LINEA PEDIDO ACTUALIZADA
				$preciofinal = $precioproducto * $restado;

				// SI NO DEVUELVO TODOS LOS PRODUCTOS ACTUALIZO CON LA CANTIDAD LA LINEA DE PEDIDO
				$con->query("UPDATE lineapedido SET cantidad='$restado', precio='$preciofinal' WHERE idlineapedido='$lineapedidoid'");
				$totalcantidad = ($productostock + $cantdevolucion);

				//ACTUALIZO EL PRODUCTO CON LA DEVOLUCION DE UNIDADES
				$result4 = $con->query("UPDATE producto SET stock='$totalcantidad' WHERE id_producto='$lineapedidoidproducto'");

				//ACTUALIZO EL PRECIO TOTAL DEL PEDIDO
				$result8 = $con->query("SELECT SUM(precio) as preciototal FROM lineapedido WHERE idpedido='$pedidoid'");
				while ($row8 = $result8->fetch_assoc()) {
					$sumprecio = $row8["preciototal"];
				}

				$result9 = $con->query("UPDATE pedido SET total='$sumprecio' WHERE idpedido='$pedidoid'");

			}
			if(($restado)==0){
				$result6 = $con->query("SELECT * FROM producto WHERE id_producto='$lineapedidoidproducto'");
				while ($row6 = $result6->fetch_assoc()) {
					$productostock = $row6["stock"];
					$precioproducto = $row6["precio"];
				}

				// SI DEVUELVO TODOS LOS PRODUCTOS BORRO LA LINEA DE PEDIDO
				$result5= $con->query("DELETE FROM lineapedido WHERE idlineapedido='$lineapedidoid'");

				$totalcantidad2 = ($productostock + $cantdevolucion);
				
				//ACTUALIZO EL PRODUCTO CON LA DEVOLUCION DE UNIDADES
				$con->query("UPDATE producto SET stock='$totalcantidad2' WHERE id_producto='$lineapedidoidproducto'");

				//ACTUALIZO EL PRECIO TOTAL DEL PEDIDO
				$result8 = $con->query("SELECT SUM(precio) as preciototal FROM lineapedido WHERE idpedido='$pedidoid'");
				while ($row8 = $result8->fetch_assoc()) {
					$sumprecio = $row8["preciototal"];
				}

				$result9 = $con->query("UPDATE pedido SET total='$sumprecio' WHERE idpedido='$pedidoid'");
			}
		}



		//si hacemos una consulta a lineapedido con idpeddido y no sale ninguna eliminamos pedido de pedido
		$result2 = $con->query("SELECT * FROM lineapedido WHERE idpedido = '$pedidoid'");
		if ($result2->num_rows == 0) {
			$result7 = $con->query("DELETE FROM pedido WHERE idpedido='$pedidoid'");
		}

		*/
	// }		

?>



	<!-- ========================================= CONTENIDO ========================================= -->
	<div class="container">
        
		<div class="col-md-7">
			<section class="section section-page-title">
				<div class="page-header">
					<h2 class="page-title">Pedido Devuelto </h2>
					<p class="page-subtitle">Su pedido se ha devuelto correctamente.</p>
				</div>
			</section><!-- /.section-page-title -->

		</div>
		<div class="col-md-8">
			<ul class="services list-unstyled row m-t-35">
				<li class="col-md-4">
					<div class="service">
						<div class="service-icon primary-bg"><i class="fa fa-truck"></i></div>
						<h3>Envio Inmediato</h3>
						
					</div>
				</li>
				<li class="col-md-4">
					<div class="service">
						<div class="service-icon primary-bg"><i class="fa fa-life-saver"></i></div>
						<h3>Soporte 24/7</h3>
						
					</div>
				</li>
				<li class="col-md-4">
					<div class="service">
						<div class="service-icon primary-bg"><i class="fa fa-star"></i></div>
						<h3>Calidad</h3>
						
					</div>
				</li>
			</ul><!-- /.services -->
				
			<center><a class="le-button big " href="index.php?page=maincliente"> continuar comprando </a></center>
				
		</div>

	</div>

			
			
	<!-- ========================================= CONTENIDO: END ========================================= -->