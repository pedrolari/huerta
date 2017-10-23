<?php
	session_start();
	include ("../db/conexion.php");

	$dni = 	$_SESSION['dni'];
	$idproduc = $_SESSION['id_producto'];
	$nombreproducto = $_POST['nombreproducto'];
	$descripcion = $_POST['descripcionproducto'];
	$precio = $_POST['precioproducto'];
	$stock = $_POST['stockproducto'];
	$cate = $_POST['categoria'];
	$subcate = $_POST['subcategoria'];
				
	$random=rand(1,999999);
	
	if ((($_FILES["imagen"]["type"] == "image/gif")
		|| ($_FILES["imagen"]["type"] == "image/jpeg")
		|| ($_FILES["imagen"]["type"] == "image/jpg")
		|| ($_FILES["imagen"]["type"] == "image/png"))){
		//Verificamos que sea una imagen
		if ($_FILES["imagen"]["error"] > 0){
			//verificamos que venga algo en el input file
			echo "Error numero: " . $_FILES["imagen"]["error"] . "<br>";
		}else{
			//subimos la imagen

			$imagen= $random.'_'.$_FILES["imagen"]["name"];
			
			if(file_exists("assets/images/uploads/".$random.'_'.$_FILES["imagen"]["name"])){
				echo $_FILES["imagen"]["name"] . " Ya existe. ";
			}else{
				move_uploaded_file($_FILES["imagen"]["tmp_name"],
				"assets/images/uploads/" .$random.'_'.$_FILES["imagen"]["name"]);
				$src = "assets/images/uploads/".$imagen;
				$consulta = $con->query("INSERT INTO imagenes (imagen) VALUES ('$src')");
				
				//Recogo el ID de la Imagen
				$result = $con->query("SELECT MAX(id) as maximage FROM imagenes");
				if ($result->num_rows > 0) {
					while ($row = $result->fetch_assoc()) {                
						$id_imagen = $row['maximage'];				
					}
				}
				
				$result2 = $con->query("INSERT INTO producto (nombre, descripcion, precio, stock, id_imagen, idcat) VALUES ('$nombreproducto', '$descripcion', '$precio', '$stock', '$id_imagen', '$subcate')");
				$result3 = $con->query("INSERT INTO productos_productor (dni_productor, id_producto) VALUES ('$dni', '$idproduc')");
				
				//Reiniciamos los inputs
				echo '<script>
				$("#envioimagen input,textarea,option,select").each(function(index) {
					$(this).val("");
				});
				</script>';
			
				print "<script>window.location='index.php?page=altaproducto';</script>";	
			}
		}
	}else{
		
		print "<script>alert(\"Formato de imagen no soportado.\\nPor favor revisa la imagen introducida.\\nSolo se permiten .gif, .jpeg, .jpg y .png.\");window.location='index.php?page=altaproducto';</script>";
	}

?>


