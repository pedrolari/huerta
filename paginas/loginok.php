<?php

if(!empty($_POST)){
	if(isset($_POST["email"]) &&isset($_POST["password"])){
		if($_POST["email"]!=""&&$_POST["password"]!=""){
			require_once 'db/conexion.php';
			
			$emailreg = $_POST["email"];
			$passreg = $_POST["password"];
			
			$user=null;
			$query= "select * from cliente where usuario='$emailreg' or email='$emailreg' and password='$passreg'";
			$resultado = $con->query($query);
			while ($r=$resultado->fetch_array()) {
				$user=$r["usuario"];
				$dni=$r["dni"];
				$tipouser=$r["productor"];
				break;
			}
			if($user==null){
				print "<script>alert(\"Acceso invalido.\");window.location='index.php?page=login';</script>";
			}else{
				
				$_SESSION["user"]=$user;
				$_SESSION["dni"]=$dni;
				$_SESSION["productor"]=$tipouser;
				if ($tipouser==0){
					print "<script>window.location='index.php?page=maincliente';</script>";
				}
				if ($tipouser==1){
					print "<script>window.location='index.php?page=mainproductor';</script>";
				}
				if ($tipouser==2){
					print "<script>window.location='index.php?page=adminmain';</script>";
				}
								
			}
		}
	}
}



?>