<!-- ========================================= ULTIMOS POSTS ========================================= -->
<div class="widget">
	<h2 class="border">Ultimas opiniones</h1>
	<div class="body">
		
			<ul class="recent-post-list">
				<?php
				require_once 'db/conexion.php'; 
				$post = $con->query("SELECT * FROM comentarios ORDER BY fecha DESC LIMIT 3");
				if($post->num_rows > 0){
					while ($row = $post->fetch_assoc()) {  
						$contador = $row['suma'];
						echo '
						<li class="sidebar-recent-post-item">
							<div class="media">
								<a href="#" class=" pull-left">
									<img alt="" width="15" src="assets/images/default-avatar.jpg">
								</a>
								<div class="media-body">
									<h5><strong>'.$row['nombre'].'</strong></h5>
									<h5>'.$row['mensaje'].'</h5>
									<div class="posted-date">'.$row['fecha'].'</div>
								</div>
							</div>
						</li>
						';
					}
				} else {
					echo 'Aun no hay comentarios';
				}
				?>
			</ul><!-- /.recent-post-list -->
		<!-- /.sidebar-recent-post-item -->
	</div><!-- /.body -->
</div><!-- /.widget -->
<!-- ========================================= ULTIMOS POSTS : END ========================================= -->