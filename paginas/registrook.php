<?php
				
if(!empty($_POST)){
	if(isset($_POST["dnireg"]) &&isset($_POST["nombrereg"]) &&isset($_POST["apellidosreg"]) &&isset($_POST["direcreg"]) &&isset($_POST["telefonoreg"]) &&isset($_POST["localreg"]) &&isset($_POST["provreg"]) &&isset($_POST["user"]) &&isset($_POST["emailreg"]) &&isset($_POST["passreg"]) &&isset($_POST["passrepetirreg"])){
		if($_POST["dnireg"]!=""&& $_POST["nombrereg"]!=""&& $_POST["apellidosreg"]!=""&& $_POST["direcreg"]!=""&&$_POST["telefonoreg"]!=""&&$_POST["localreg"]!=""&&$_POST["provreg"]!=""&&$_POST["emailreg"]!=""&&$_POST["user"]!=""&&$_POST["passreg"]!=""&&$_POST["passreg"]==$_POST["passrepetirreg"]){
			
			require_once 'db/conexion.php';
			
			$dnireg = $_POST["dnireg"];
			$nombrereg = $_POST["nombrereg"];
			$apellidosreg = $_POST["apellidosreg"];
			$direccion = $_POST["direcreg"];
			$telefonoreg = $_POST["telefonoreg"];
			$localreg = $_POST["localreg"];
			$provreg = $_POST["provreg"];
			$emailreg = $_POST["emailreg"];
			$user = $_POST["user"];
			$passreg = $_POST["passreg"];
			
			$found=false;
			$query ="select * from cliente where dni='$dnireg'";
			$resultado = $con -> query($query);
			while ($row=$resultado->fetch_array()) {
				$found=true;
				break;
			}
			if($found){
				print "<script>alert(\"DNI de usuario o email ya estan registrados.\");window.location='index.php?page=registro';</script>";
			}
			
			$resultado = $con->query("insert into cliente (dni, nombre, apellidos, direccion, telefono, localidad, email, usuario, password) VALUES ('$dnireg','$nombrereg','$apellidosreg','$direccion','$telefonoreg','$localreg','$emailreg','$user','$passreg')");
			if($resultado!=null){
				print "<script>alert(\"Registro exitoso. Proceda a logearse\");window.location='index.php?page=login';</script>";
			}
		}
	}
}



?>