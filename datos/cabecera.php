		<!-- ============================================================= HEADER ============================================================= -->
		<header>
			<div class="container no-padding">
				<div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
					<!-- ============================================================= LOGO ============================================================= -->
					<div class="logo">
						<a href="index.php?page=maincliente">
							<img alt="logo" src="assets/images/icono.png" width="200"/>
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
							<i class="fa fa-envelope"></i> info@<span class="le-color">ecocir.com</span>
						</div>
					</div><!-- /.contact-row -->
					<!-- ============================================================= AREA BUSQUEDA ============================================================= -->
					<div class="search-area">
						<?php include("./datos/busqueda.php"); ?>

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