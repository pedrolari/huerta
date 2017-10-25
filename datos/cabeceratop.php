
		<!-- ============================================================= CABECERA & REGISTRO ============================================================= -->
		<nav class="top-bar animate-dropdown">
			<div class="container">
				<div class="col-xs-12 col-sm-6 no-margin">
					<ul>
						<?php
						if (isset($_SESSION['user'])){
							if ($_SESSION['productor']==0){
								echo '<li><a href="index.php?page=maincliente">Inicio</a></li>';
							}
							if ($_SESSION['productor']==1){
								echo '<li><a href="index.php?page=mainproductor">Inicio</a></li>';
							}
							if ($_SESSION['productor']==2){
								echo '<li><a href="index.php?page=adminmain">Inicio</a></li>';
							}
						}
						if (!isset($_SESSION['user'])){
								echo '<li><a href="index.php?page=main">Inicio</a></li>';
						}
						?>
						<li><a href="index.php?page=contacto">Contacto</a></li>
					</ul>
				</div><!-- /.col -->

				<div class="col-xs-12 col-sm-6 no-margin">
					<ul class="right">
					<?php if(!isset($_SESSION["user"])):?>
						<li><a href="index.php?page=registro">Registro</a></li>
						<li><a href="index.php?page=login">Login</a></li>
					<?php else:?>
						<li><a href="#">Bienvenido,
							<?php 
								require_once 'db/conexion.php';
								$query ="SELECT * FROM cliente where usuario = '".$_SESSION["user"]."'";
								$resultado = $con -> query($query);
								while($row=$resultado->fetch_assoc()){
									echo $row["nombre"];
								}
							?></a>
						</li>
						<li><a href="index.php?page=logout">Desconectar</a></li>
					<?php endif;?>
					</ul>
				</div><!-- /.col -->
			</div><!-- /.container -->
		</nav><!-- /.top-bar -->
		<!-- ============================================================= CABECERA & REGISTRO : END ============================================================= -->