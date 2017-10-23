		<!-- ================================== CONTENIDO PRINCIPAL ================================== -->
        <!-- Main Content -->
          <div class="row">
			<!-- ========== PANEL PEDIDOS ==========  -->
            <div class="col-md-6">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <i class="fa fa-pause"></i> Pedidos Pendientes
                </div>
                <div class="panel-body ">

					
                  
                </div>
              </div>
            </div>
			<!-- ========== PANEL CUENTA ==========  -->
            <div class="col-md-6">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <i class="fa fa-user"></i> Cuenta
                </div>
                <div class="panel-body">

						<div class="widget">
							<div class="body">
								
								<?php 
									require_once 'db/conexion.php';
									$query ="SELECT * FROM cliente where usuario = '".$_SESSION["user"]."'";
									$resultado = $con -> query($query);
									while($row=$resultado->fetch_assoc()){
										echo $row["nombre"]." ".$row["apellidos"]."<br>";
										echo $row["direccion"]."<br>";
										echo $row["telefono"]."<br>";
										$pueblo = $row["localidad"];
										$query ="SELECT * FROM provincias where id_provincia in (SELECT id_provincia FROM municipios where id_municipio = '$pueblo')";
										$resultado = $con -> query($query);
										while($row=$resultado->fetch_assoc()){
											echo $row["provincia"]."<br>";
											
										}
										$query ="SELECT * FROM municipios where id_municipio = '$pueblo'";
										$resultado1 = $con -> query($query);
										while($row1=$resultado1->fetch_assoc()){
											echo $row1["nombre"]."<br>";
										}
										echo $row["email"];
										
									}
								?>
								<p><br></p>
					
								<p><i class="fa fa-pencil-square-o"></i><a href="index.php?page=modificar"> Modificar Cuenta</a></p>
								<p><i class="fa fa-trash-o"></i><a href="index.php?page=eliminar"> Eliminar Cuenta</a></p>
							</div>
						</div>
				                  
									  
									  
									  
                </div>
              </div>
            </div>				
			<!-- ========== PANEL PEDIDOS ==========  -->
            <div class="col-md-6">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <i class="fa fa-share-square-o"></i> Pedidos Enviados
                </div>
                <div class="panel-body ">

					
                  
                </div>
              </div>
            </div>
			<!-- ========== PANEL INGRESOS ==========  -->
            <div class="col-md-6">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <i class="fa fa-eur"></i> Ingresos
                </div>
                <div class="panel-body ">

					
                  
                </div>
              </div>
            </div>	

          </div>
		<!-- ================================== CONTENIDO PRINCIPAL : END ================================== -->