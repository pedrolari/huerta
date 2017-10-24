<!-- ========================================= CATEGORIAS ========================================= -->
<div class="widget accordion-widget category-accordions">
    <h2 class="border">Categorias</h1>
    <div class="accordion">
		<?php
		require_once 'db/conexion.php';
		$query ="SELECT * FROM categoria where id_catpadre=0";
		$resultado = $con -> query($query);
		while ($row=$resultado->fetch_array()) {
			echo '
			<!-- ========== CATEGORIAS PADRE ========= -->
			<div class="accordion-group">
				<div class="accordion-heading">
					<a class="accordion-toggle collapsed" data-toggle="collapse" href="#'.$row["nombre"].'">'.$row["nombre"].'</a>
				</div>
				<!-- ========== CATEGORIAS HIJAS ========= -->
				<div id="'.$row["nombre"].'" class="accordion-body collapse">
					<div class="accordion-inner">
						<ul>
				';
				$query1 ="SELECT * FROM categoria where id_catpadre=".$row["idcat"]." order by nombre ASC";
				$resultado1 = $con -> query($query1);
				while ($row1=$resultado1->fetch_array()) {
					
					if ($tipouser==0 && $_SESSION["user"]){
						echo '
						<li><a href="index.php?page=gridproductocliente&cat='.$row["nombre"].'&subcat='.$row1["nombre"].'">'.$row1["nombre"].'</a></li>
						';
					}else{
					
						echo '
						<li><a href="index.php?page=gridproducto&cat='.$row["nombre"].'&subcat='.$row1["nombre"].'">'.$row1["nombre"].'</a></li>
						';
					}
				}
				echo '
						</ul>
					</div>
				</div>
			</div><!-- /.accordion-group -->
				';
		}
		?>
    </div><!-- /.accordion -->
</div><!-- /.category-accordions -->
<!-- ========================================= CATEGORIAS ========================================= --> 

