<?php
	session_start();
	include ("../db/conexion.php");

	$nombreuser = $_POST['nombreuser'];
	$apellidosuser = $_POST['apellidosuser'];
	$localuser = $_POST['localuser'];
	$useruser = $_POST['useruser'];
	
	$consultaavanzada = '';
	if($nombreuser != '') {
		$consultaavanzada = "cliente.nombre LIKE '%$nombreuser%'";
	}
	if($apellidosuser != '') {
		if($consultaavanzada != '') {
			$consultaavanzada .= " AND cliente.apellidos LIKE '%$apellidosuser%'";
		} else {
			$consultaavanzada = "cliente.apellidos LIKE '%$apellidosuser%'";
		}
	}
	if($localuser != '') {
		if($consultaavanzada != '') {
		$consultaavanzada .= " AND cliente.localidad LIKE '$localuser'";
		} else {
		$consultaavanzada = "cliente.localidad LIKE '$localuser'";
		}
	}
	if($useruser != '') {
		if($consultaavanzada != '') {
		$consultaavanzada .= " AND cliente.usuario LIKE '%$useruser%'";
		} else {
		$consultaavanzada = "cliente.usuario LIKE '%$useruser%'";
		}
	}
	
	// CONSULTA DE DATOS DE BUSQUEDA DE USUARIO
	$result = $con->query("SELECT municipios.nombre as localidad, provincias.provincia as ciudad, cliente.nombre, cliente.apellidos, cliente.usuario FROM cliente, municipios, provincias WHERE municipios.id_provincia = provincias.id_provincia AND municipios.id_municipio = cliente.localidad AND $consultaavanzada");
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {                
			echo '
			    <div class="comment-item">
					<div class="row no-margin">
						<div class="col-lg-2 col-xs-12 col-sm-2 no-margin">
							<div class="avatar pull-right">
								<img src="assets/images/default-avatar.jpg" alt="avatar">
							</div>
						</div>
						<div class="col-xs-12 col-lg-8 col-sm-10 no-margin-right">
							<div class="comment-body">
								<div class="meta-info">
									<header class="row no-margin">
										<div class="pull-left">
											<h4 class="author"><a href="#">'.$row["nombre"].' '.$row["apellidos"].'</a></h4>
											<span class="date">- Usuario: '.$row["usuario"].'</span>
										</div>
									</header>
								</div>
								
								<p class="comment-content" >Provincia: '.$row["ciudad"].'</p>
								<p class="comment-content">Localidad: '.$row["localidad"].'</p>
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
									<h2 class="post-title">No se ha Encontrado ningun Usuario</h2>
								</div>
							</div>
						</div>
					</div>
				</div>
				</div>
			';

	}
?>


