		<!-- ============================================================= HEADER ============================================================= -->
		<header>
			<div class="container no-padding">
				<div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
					<!-- ============================================================= LOGO ============================================================= -->
					<div class="logo">
						<a href="index.html">
							<img alt="logo" src="assets/images/Logo.jpg" width="300"/>
							<!--<img alt="logo" src="assets/images/logo.svg" width="233" height="54"/>-->
							<!--<object id="sp" type="image/svg+xml" data="assets/images/logo.svg" width="233" height="54"></object>-->
						</a>
					</div><!-- /.logo -->
					<!-- ============================================================= LOGO : END ============================================================= -->
				</div><!-- /.logo-holder -->
				<div class="col-xs-12 col-sm-12 col-md-6 top-search-holder no-margin">
					<div class="contact-row">
						<div class="phone inline">
							<i class="fa fa-phone"></i> (+34) 923 00 00 00 
						</div>
						<div class="contact inline">
							<i class="fa fa-envelope"></i> abenitoc@<span class="le-color">salesianospizarrales.com</span>
						</div>
					</div><!-- /.contact-row -->
					<!-- ============================================================= AREA BUSQUEDA ============================================================= -->
					<div class="search-area">
						<form>
							<div class="control-group">
								<input class="search-field" placeholder="Buscar producto" />

								<ul class="categories-filter animate-dropdown">
									<li class="dropdown">

										<a class="dropdown-toggle"  data-toggle="dropdown" href="category-grid.html">todas las categorias</a>

										<ul class="dropdown-menu" role="menu" >
											<li role="presentation"><a role="menuitem" tabindex="-1" href="category-grid.html">verduras</a></li>
											<li role="presentation"><a role="menuitem" tabindex="-1" href="category-grid.html">hortalizas</a></li>
											<li role="presentation"><a role="menuitem" tabindex="-1" href="category-grid.html">fruta</a></li>
											<li role="presentation"><a role="menuitem" tabindex="-1" href="category-grid.html">huevos</a></li>
											<li role="presentation"><a role="menuitem" tabindex="-1" href="category-grid.html">legumbres</a></li>
											<li role="presentation"><a role="menuitem" tabindex="-1" href="category-grid.html">frutos secos</a></li>
											<li role="presentation"><a role="menuitem" tabindex="-1" href="category-grid.html">despensa</a></li>
										</ul>
									</li>
								</ul>
								<a class="search-button" href="#" ></a>    
							</div>
						</form>
					</div><!-- /.search-area -->
					<!-- ============================================================= AREA BUSQUEDA : END ============================================================= -->
				</div><!-- /.top-search-holder -->
				<div class="col-xs-12 col-sm-12 col-md-3 top-cart-row no-margin">
					<div class="top-cart-row-container">
						<div class="wishlist-compare-holder">
							<div class="wishlist ">
								<a href="#"><i class="fa fa-heart"></i> lista de<br>deseos <span class="value">(21)</span> </a>
							</div>
						</div>
						<?php include("./datos/vercarrito.php");?>
				</div><!-- /.top-cart-row -->
			</div><!-- /.container -->
			<?php include("./datos/breadcrumbs.php"); ?>
		<!-- ============================================================= HEADER : END ============================================================= -->		