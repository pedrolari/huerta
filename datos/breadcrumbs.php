<!-- ========================================= BREADCRUMB ========================================= -->
			<div id="breadcrumb-alt">
				<div class="container">
					<div class="breadcrumb-nav-holder minimal">
						<ul>
							<li class="dropdown breadcrumb-item">
								<a href="index.php?page=main" >Inicio</a>
							</li>
							<?php 
								if($page!="main" && $page!="mainproductor" && $page!="altaproducto" && $page!="listaproductos" && $page!="producto" && $page!="adminmain" && $page!="busquedausuario" && $page!="busquedaproducto"){
									
									if($cat==""){
										echo '
										<li class="dropdown breadcrumb-item">
											<a href="index.php?page='.$page.'">'.$page.'</a>
										</li>
										';
									}
									else{
										echo '
										<li class="dropdown breadcrumb-item">
											<a href="index.php?page='.$page.'">'.$cat.'</a>
										</li>
										<li class="breadcrumb-item current">
											<a href="index.php?page='.$page.'">'.$subcat.'</a>
										</li>
										';
									}
								}else {
									if($page=="altaproducto"){
										echo '
											<li class="dropdown breadcrumb-item">
												<a href="#">Productor</a>
											</li>
											<li class="breadcrumb-item current">
												<a href="index.php?page='.$page.'">Alta Producto</a>
											</li>
										';										
									}
									if($page=="listaproductos"){
										echo '
											<li class="dropdown breadcrumb-item">
												<a href="#">Productor</a>
											</li>
											<li class="breadcrumb-item current">
												<a href="index.php?page='.$page.'">Listado de Productos</a>
											</li>
										';										
									}
									if($page=="producto"){
										echo '
											<li class="dropdown breadcrumb-item">
												<a href="#">'.$cat.'</a>
											</li>
											<li class="dropdown breadcrumb-item">
												<a href="#">'.$subcat.'</a>
											</li>
											<li class="breadcrumb-item current">
												<a href="index.php?page=producto&cat='.$cat.'&subcat='.$subcat.'&idproducto='.$producto.'">'.$nombre.'</a>
											</li>
										';										
									}
									
									if($page=="adminmain"){
										echo '

											<li class="breadcrumb-item current">
												<a href="index.php?page='.$page.'">Administrador</a>
											</li>
										';										
									}									
									if($page=="busquedausuario"){
										echo '
											<li class="dropdown breadcrumb-item">
												<a href="#">Administrador</a>
											</li>
											<li class="breadcrumb-item current">
												<a href="index.php?page='.$page.'">Busqueda Avanzada por Usuario</a>
											</li>
										';										
									}
									if($page=="busquedaproducto"){
										echo '
											<li class="dropdown breadcrumb-item">
												<a href="#">Administrador</a>
											</li>
											<li class="breadcrumb-item current">
												<a href="index.php?page='.$page.'">Busqueda Avanzada por Producto</a>
											</li>
										';										
									}
								}
							?>
						</ul>
						<!-- /.breadcrumb-nav-holder -->
					</div>
				</div><!-- /.container -->
			</div>
			<!-- ========================================= BREADCRUMB : END ========================================= -->