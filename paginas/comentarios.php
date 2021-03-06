
<?php 
	require_once 'db/conexion.php'; 
	
	$resultado = $con->query("SELECT COUNT(*) as suma FROM comentarios WHERE idproducto = '$producto'");
	if($resultado->num_rows > 0){

		while ($row = $resultado->fetch_assoc()) {  
			$contador = $row['suma'];
		}

		echo '
		<!-- ========================================= SINGLE PRODUCT TAB ========================================= -->
		<section id="single-product-tab">
			<div class="no-container">
				<div class="tab-holder">
					<ul class="nav nav-tabs simple" >
						<li class="active"><a href="#reviews" data-toggle="tab">Comentarios ('.$contador.')</a></li>
					</ul><!-- /.nav-tabs -->

					<div class="tab-content">
						<div class="tab-pane active" id="reviews">
		';

				
					$resul = $con->query("SELECT * FROM comentarios WHERE idproducto = '$producto'");
					while ($row1 = $resul->fetch_assoc()) {  
						$comen_nombre = $row1["nombre"];
						$comen_valoracion = $row1["valoracion"];
						$comen_fecha = $row1["fecha"];
						$comen_comentario = $row1["mensaje"];
						echo '
							<div class="comments">
								<div class="comment-item">
									<div class="row no-margin">
										<div class="col-lg-1 col-xs-12 col-sm-2 no-margin">
											<div class="avatar">
												<img alt="avatar" src="assets/images/default-avatar.jpg">
											</div><!-- /.avatar -->
										</div><!-- /.col -->
				
										<div class="col-xs-12 col-lg-11 col-sm-10 ">
											<div class="comment-body">
												<div class="meta-info">
													<div class="author inline">
														<a href="#" class="bold">'.$comen_nombre.'</a>
													</div>
													<div class="star-holder inline">
														<div class="star" data-score="'.$comen_valoracion.'"></div>
													</div>
													<div class="date inline pull-right">
														'.$comen_fecha.'
													</div>
												</div><!-- /.meta-info -->
												<p class="comment-text">'.$comen_comentario.'</p><!-- /.comment-text -->
											</div><!-- /.comment-body -->

										</div><!-- /.col -->

									</div><!-- /.row -->
								</div><!-- /.comment-item -->
							</div><!-- /.comments -->	
							';
					}
	}

	

?>

				</div><!-- /.tab-pane #reviews -->
			</div><!-- /.tab-content -->
		</div><!-- /.tab-holder -->
	</div><!-- /.container -->
</section><!-- /#single-product-tab -->
<!-- ========================================= SINGLE PRODUCT TAB : END ========================================= -->      
