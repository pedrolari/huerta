<?php 
	require_once 'db/conexion.php'; 
	$dni = $_SESSION["dni"];
	//realizamos el INSERT de NUEVO PEDIDO
	$resPedido = $con->query("INSERT INTO pedido (dnicliente, fecha, total) VALUES ('$dni',CURRENT_DATE, '$totalprice')");
	
	//Calculo del id MAX de pedido insertado para asignarselo a linea pedido
	$resMAXidpedido = $con->query("SELECT MAX(idpedido) as max FROM pedido");
	while ($rowmax = $resMAXidpedido->fetch_assoc()) {  
		$idMaxPedido = $rowmax["max"];
	}
	
	// GENERO LA CONSULTA CON LOS PRODUCTOS AÑADIDOS AL CARRITO MEDIANTE EL FOREACH
	if(isset($_SESSION['cart'])){
		$consulta="SELECT * FROM producto WHERE id_producto IN ("; 
		foreach($_SESSION['cart'] as $id => $value) { 
			$consulta.=$id.","; 
		} 
		$consulta=substr($consulta, 0, -1).") ORDER BY id_producto ASC";
		$resultado = $con->query($consulta);
		while ($row = $resultado->fetch_array()) {
			$idpropedido=$row['id_producto'];
			$cantidadproducto=$_SESSION['cart'][$row['id_producto']]['quantity'];
			$totalLinea=$_SESSION['cart'][$row['id_producto']]['quantity']*$row['precio'];
			
			// INSERTO LA LINEA DE PEDIDO 
			$resLineaPedido = $con->query("INSERT INTO lineapedido (idpedido, idproducto, cantidad, precio) VALUES ('$idMaxPedido', '$idpropedido', '$cantidadproducto', '$totalLinea')");
			
			//ACTUALIZAR STOCK
			$resUpdateStock = $con->query("UPDATE producto SET stock=(stock-'$cantidadproducto') WHERE id_producto='$idpropedido'");
			
		}
			//MUESTRO MENSAJE DE PEDIDO REALIZADO
			include("./paginas/pedidorealizado.php");

			//VACIAR CARRITO
			unset($_SESSION['cart']);
	
	}else{ 
		//MUESTRO MENSAJE DE QUE NO HAY PRODUCTOS EN LA CESTA
		include("./paginas/sinproductoscarrito.php"); 
	}
?>

        
