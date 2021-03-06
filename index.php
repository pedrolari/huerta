<?php
	session_start();
	error_reporting(0);
	$page = isset($_GET['page']) ? $_GET['page'] : 'main';
	$cat = isset($_GET['cat']) ? $_GET['cat'] : $page;
	$subcat = isset($_GET['subcat']) ? $_GET['subcat'] : null;
	$producto = isset($_GET['idproducto']) ? $_GET['idproducto'] : null;
	$nombre = isset($_GET['nombre']) ? $_GET['nombre'] : null;
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<!-- Meta -->
		
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta name="description" content="La Huerta de Benito - Productos frescos directamente a tu mesa">
		<meta name="author" content="Alejandro Benito">
	    <meta name="keywords" content="huerta ecologica, huerta, vegetariano, fresco, productos frescos">
	    <meta name="robots" content="all">

	    <title>ECOCIR - Productos frescos directamente a tu mesa</title>

	    <!-- Nucleo Bootstrap CSS -->
	    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
	    
	    <!-- CSS Personalizables -->
	    <link rel="stylesheet" href="assets/css/main.css">
	    <link rel="stylesheet" href="assets/css/green.css">
	    <link rel="stylesheet" href="assets/css/owl.carousel.css">
		<link rel="stylesheet" href="assets/css/owl.transitions.css">
		<link rel="stylesheet" href="assets/css/animate.min.css">

	    <!-- Fuentes -->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800' rel='stylesheet' type='text/css'>
		
		<!-- Iconos/Glyphs -->
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">
		
		<!-- Icono Fav -->
		<link rel="shortcut icon" href="assets/images/favicon.ico">
	</head>
<body>
	<div class="wrapper">
		<!-- ===== CABECERA & REGISTRO ===== -->
		<?php include("./datos/cabeceratop.php"); ?>
		<?php include("./datos/cabecera.php"); ?>
		<!-- ===== CONTENIDO PRINCIPAL ===== -->
		<div id="top-banner-and-menu">
			<div class="container">
				<div class="col-xs-12 col-sm-4 col-md-2 sidemenu-holder">
					<!-- ===== CATEGORIAS ===== -->
					<?php include("./datos/categorias.php"); ?>
					<!-- ===== MAS VENDIDOS ===== -->
					<?php
						if ($_SESSION['productor']==0){	
							include("./datos/topventascliente.php");
						} else {
							if ($_SESSION['productor']==1){	
								include("./datos/topventasproductor.php");
							} else {
								if ($_SESSION['productor']==2){	
									include("./datos/topventasadmin.php");
								}
							}
						}
					?>
					<!-- ===== NUEVOS ===== -->
					<?php include("./datos/nuevos.php"); ?>
					<!-- ===== OFERTAS ===== -->
					<?php include("./datos/ofertas.php"); ?>
				</div>
				<!-- ===== MAIN ===== -->
				<div class="row">
					<div class="col-md-8">
						<?php
							include("./paginas/".$page.".php");
						?>
					</div>
					<div class="col-md-2">
						<aside class="sidebar blog-sidebar">
							<?php 
								if (!empty($_SESSION['user'])){
									if ($page != "carrito" && $page != "checkout" && $_SESSION['productor']==0){	
										include("./datos/cuenta.php") ; 
										include("./datos/tagscliente.php");
										include("./datos/opiniones.php");
									} else {
										if ($page != "carrito" && $page != "checkout" && $_SESSION['productor']==1){	
										include("./datos/cuentaproductor.php") ; 
										include("./datos/tagsproductor.php");
										include("./datos/opiniones.php");
										} else {
											if ($page != "carrito" && $page != "checkout" && $_SESSION['productor']==2){	
											include("./datos/cuentaadmin.php") ; 
											include("./datos/tagsadmin.php");
											include("./datos/opiniones.php");
											}
										}
									}
								} else {
									if ($page != "carrito" && $page != "checkout"){
										include("./datos/quienes.php") ; 
										include("./datos/tags.php");
										include("./datos/opiniones.php");
									}
								}
							?>
						</aside>
					</div><!-- /.widget -->			
				</div>
			</div>
		</div>
		<!-- ===== FOOTER ===== -->
		<?php include("./datos/footer.php"); ?>
	</div><!-- /.wrapper -->

	<!-- JavaScripts placed at the end of the document so the pages load faster -->
	<script src="assets/js/jquery-1.10.2.min.js"></script>
	<script src="assets/js/jquery-migrate-1.2.1.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/gmap3.min.js"></script>
	<script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
	<script src="assets/js/owl.carousel.min.js"></script>
	<script src="assets/js/css_browser_selector.min.js"></script>
	<script src="assets/js/echo.min.js"></script>
	<script src="assets/js/jquery.easing-1.3.min.js"></script>
	<script src="assets/js/bootstrap-slider.min.js"></script>
    <script src="assets/js/jquery.raty.min.js"></script>
    <script src="assets/js/jquery.prettyPhoto.min.js"></script>
    <script src="assets/js/jquery.customSelect.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
	<script src="assets/js/scripts.js"></script>
	<script src="http://w.sharethis.com/button/buttons.js"></script>
	
	<!-- COMBO BOX ANIDADO PARA REGISTRO DE CLIENTES  -->
	<script language="javascript">
	$(document).ready(function(){
	   $("#provincia").change(function () {
			   $("#provincia option:selected").each(function () {
				id_provincia = $(this).val();
				$.post("localidades.php", { id_provincia: id_provincia }, function(data){
					$("#localidad").html(data);
				});            
			});
	   })
	});
	</script>
	<!-- COMBO BOX ANIDADO PARA ALTA DE PRODUCTO  -->
	<script language="javascript">
	$(document).ready(function(){
	   	$("#categoria").change(function () {
			   $("#categoria option:selected").each(function () {
				id_categoria = $(this).val();
				$.post("categorias.php", { id_categoria: id_categoria }, function(data){
					$("#subcategoria").html(data);
				});            
			});
	   })
	});
	</script>

	<!-- VENTANA MODAL  -->
	<script>
	$(document).ready(function(){
		$('.openBtn').on('click',function(){
			var dataURL = $(this).attr('data-href');
			$('.modal-body').load(dataURL,function(){
				$('#myModal').modal({show:true});
			});
		}); 
	});
	</script>
	
	<!-- REFFRESCO CARRITO  -->
	<script>
	$(document).ready(function(){
		$("#actualizar").click(function(){
			$('.cantidad').each(function(){
				idpronuevo = $(this).attr('id');
				cantpronuevo = $(this).val();
				//alert(idpronuevo +"---"+ cantpronuevo);
				$.post("index.php?page=carrito", { idpronuevo: idpronuevo, cantpronuevo: cantpronuevo }); 		

			});
		});
	});
	</script>

	
	<!-- DEVOLVER -->
	<script>
	$(document).ready(function(){
		$("#devolver").click(function(){
			$('.cantidaddevolucion').each(function(){
				idlineapedidodetalle = $(this).attr('id');
				cantprodevolucion = $(this).val();
				//alert(idlineapedidodetalle +""+ cantprodevolucion);
				$.post("index.php?page=mainclientedetalledevolucionok", { idlineapedidodetalle: idlineapedidodetalle, cantprodevolucion: cantprodevolucion }); 					
			});
		});
	});
	</script>
	
	<!-- DESCUENTOS  -->
	<script>
	$(document).ready(function(){
		$("#aplicardescuento").click(function(){
			$("input:checkbox:checked").each(function() {
					idprodescuento = $(this).attr('id');
					porciento = $('.'+idprodescuento).val();
			        //alert("El checkbox " + idprodescuento + " con valor " + porciento + " está seleccionado");
			        $.post("index.php?page=adminofertas", { idprodescuento: idprodescuento, porciento: porciento });
			});

		});
	});
	</script>


</body>
</html>