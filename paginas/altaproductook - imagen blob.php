<?php
session_start();
//Archivo de conexión a la base de datos
require('../db/conexion.php');


//Creamos las variables necesarias
$nombreproducto = $_POST['nombreproducto'];
$descripcion = $_POST['descripcionproducto'];
$precio = $_POST['precioproducto'];
$stock = $_POST['stockproducto'];
$cate = $_POST['categoria'];
$subcate = $_POST['subcategoria'];

//Comprobamos que los inputs no estén vacíos, y si lo están, mandamos el mensaje correspondiente
if($_FILES['imagen']['error'] === 4) {
	die( 'Es necesario establecer una imagen' );
	//Si los inputs están seteados y el archivo no tiene errores, se procede
} else if($_FILES['imagen']['error'] === 0 ) {

	//Convertimos la información de la imagen en binario para insertarla en la BBDD
	$imagenBinaria = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

	//Nombre del archivo
	$nombreArchivo = $_FILES['imagen']['name'];

	//Extensiones permitidas
	$extensiones = array('jpg', 'jpeg', 'gif', 'png', 'bmp');

	//Obtenemos la extensión (en minúsculas) para poder comparar
	$extension = strtolower(end(explode('.', $nombreArchivo)));

	//Verificamos que sea una extensión permitida, si no lo es mostramos un mensaje de error
	if(!in_array($extension, $extensiones)) {
		die( 'Sólo se permiten archivos con las siguientes extensiones: '.implode(', ', $extensiones) );
	} else {
		//Si la extensión es correcta, procedemos a comprobar el tamaño del archivo subido
		//Y definimos el máximo que se puede subir
		//Por defecto el máximo es de 2 MB, pero se puede aumentar desde el .htaccess o en la directiva 'upload_max_filesize' en el php.ini

		$tamañoArchivo = $_FILES['imagen']['size']; //Obtenemos el tamaño del archivo en Bytes
		$tamañoArchivoKB = round(intval(strval( $tamañoArchivo / 1024 ))); //Pasamos el tamaño del archivo a KB

		$tamañoMaximoKB = "4096"; //Tamaño máximo expresado en KB
		$tamañoMaximoBytes = $tamañoMaximoKB * 1024; // -> 4194304 Bytes -> 4 MB

		//Comprobamos el tamaño del archivo, y mostramos un mensaje si es mayor al tamaño expresado en Bytes
		if($tamañoArchivo > $tamañoMaximoBytes) {
			die( "El archivo ".$nombreArchivo." es demasiado grande. El tamaño máximo del archivo es de ".$tamañoMaximoKB."Kb." );
		
		} else {
			//Si el tamaño es correcto, subimos los datos
			$consulta = $con->query("INSERT INTO imagenes (imagen) VALUES ('$imagenBinaria')");
			
			//Recogo el ID de la Imagen
			$result = $con->query("SELECT MAX(id) as maximage FROM imagenes");
			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {                
					$id_imagen = $row['maximage'];				
				}
			}
			
			$dni = 	$_SESSION['dni'];
			$idproduc = $_SESSION['id_producto'];
		
			$result1 = $con->query("INSERT INTO producto (nombre, descripcion, precio, stock, id_imagen, idcat) VALUES ('$nombreproducto', '$descripcion', '$precio', '$stock', '$id_imagen', '$subcate')");
			$result2 = $con->query("INSERT INTO productos_productor (dni_productor, id_producto) VALUES ('$dni', '$idproduc')");
				
		
			//Reiniciamos los inputs
				echo '<script>
				$("#enviarimagenes input,textarea, option, select").each(function(index) {
					$(this).val("");
				});
				</script>';

		};
	
	};
};
?>



