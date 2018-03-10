
	<!-- ================================== CONTENIDO PRINCIPAL ================================== -->
	<!-- Main Content -->
	<div class="row">
		<!-- ========== PANEL PEDIDOS ==========  -->
		<div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <i class="fa fa-search"></i> Estas son tus listas de deseos 
                  			<?php 
								require_once 'db/conexion.php';
								$query ="SELECT * FROM cliente where usuario = '".$_SESSION["user"]."'";
								$resultado = $con -> query($query);
								while($row=$resultado->fetch_assoc()){
									echo $row["nombre"];
								}
							?>:
                </div>
                <div class="panel-body ">
					<!-- ========================================= BUSQUEDA PEDIDOS ========================================= -->
					<div id="questions" class="panel-group panel-group-faq">
						<div class="panel panel-faq">
	
							
							<div id="collapseUno" class="panel-collapse">
								<div class="panel-body">		
									
								</div>
							</div>									
						</div><!-- /.panel-faq -->
					</div><!-- /.accordion -->
					<!-- ========================================= BUSQUEDA PEDIDOS : END ========================================= --> 
				</div><!-- /.category-accordions -->
			</div>
		</div>
	</div>
  	<!-- ================================== CONTENIDO PRINCIPAL : END ================================== -->