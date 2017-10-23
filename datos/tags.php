						<!-- ========================================= ETIQUETAS ========================================= -->
						<?php			
						require_once 'db/conexion.php';
					
						//	Descomentando estas lineas meto todos los productos en tags y le asigno un contador aleatorio
						
						/*
						// Consulto todos los productos y los añado a tags
						$query = "SELECT id_producto, nombre FROM producto LIMIT 20";
						$resultado1 = $con -> query($query); 
						while ($row1=$resultado1->fetch_array())
						{
							$nombre = $row1["nombre"];
							$idprodu = $row1["id_producto"];
							$cont = rand(0, 5);
							$query = "INSERT INTO tags VALUES ('$idprodu','$nombre', '$cont')";
							$resultado2 = $con -> query($query); 
							
						}
						*/

						$palabras = array();
						$max = 0; // Es el mayor numero de cada termino
						 
						$query = "SELECT * FROM tags ORDER BY contador DESC LIMIT 205";
						$resultado = $con -> query($query); 
						while ($row=$resultado->fetch_array())
						{

							
							$id = $row['idproducto'];
							$tag = $row['tag'];
							$contador = $row['contador'];
							
							//CONSULTO LA CATEGORIA HIJA PARA HACER EL BREADCRUMB SIN PASAR POR CATEGORIAS
							$result2 = $con->query("SELECT * FROM categoria WHERE idcat in (SELECT idcat FROM producto WHERE id_producto = '$id')");
							while ($rowcat = $result2->fetch_assoc()) {  
								$cathija = $rowcat["nombre"];
								$catpa = $rowcat["id_catpadre"];
							}
							
							//CONSULTO LA CATEGORIA PADRE PARA HACER EL BREADCRUMB SIN PASAR POR CATEGORIAS
							$result3 = $con->query("SELECT * FROM categoria WHERE idcat='$catpa'");
							while ($rowcat = $result3->fetch_assoc()) {  
								$catpadre = $rowcat["nombre"];
							}
							
							//GUARDO EN UN ARRAY LAS VARIABLES NECESARIAS PARA PASARLAS AL LINK MAS ABAJO
							// actualiza la variable $max en caso de que el contador sea mayor
							if ($contador > $max) $max = $contador;
							$palabras[] = array('id' => $id, 'tag' => $tag, 'contador' => $contador, 'catpadre' => $catpadre, 'cathija' => $cathija);			
						}
						// desordena los resultados
						shuffle($palabras);
						?>			
						<div class="widget">
							<h2 class="border">Tags</h1>
						
							<div class="body">
								<div class="tagcloud">
									<?php 
										// imprimimos las tags conb el for each
										foreach ($palabras as $tag):
											// determinamos la popularidad mediante porcentaje
											$porciento = floor(($tag['contador']/ $max) * 100);
										// dependiendo del porcentaje asignamos el tamaño de letra
										if ($porciento < 20): 
											$size = '12'; 
										elseif ($porciento >= 20 and $porciento < 40):
											$size = '13'; 
										elseif ($porciento >= 40 and $porciento < 60):
											$size = '15';
										elseif ($porciento >= 60 and $porciento < 80):
											$size = '17';
										else:
											$size = '19';
										endif;
									?>
										<a style="font-size: <?php echo $size; ?>pt;" href="index.php?page=producto&cat=<?php echo $tag['catpadre'];?>&subcat=<?php echo $tag['cathija'];?>&idproducto=<?php echo $tag['id'];?>&nombre=<?php echo $tag['tag'];?>"><?php echo $tag['tag'];?></a>
									<?php endforeach; ?>
								</div><!-- /.tagcloud -->
							</div><!-- /.body -->
						</div><!-- /.widget -->
						<!-- ========================================= ETIQUETAS : END ========================================= -->