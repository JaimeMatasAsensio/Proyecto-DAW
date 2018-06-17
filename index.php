<?php
/*
Jaime Matas Asensio
Proyecto DAW: ShopSphere
I.E.S. Maestre de Calatrava - Ciudad Real
2018
*/
?>
<!DOCTYPE html>
<html lang="es-ES">
<?php
session_start();
	if( isset($_SESSION["nivelAcceso"]) && !empty($_SESSION["nivelAcceso"]) &&
		isset($_SESSION["logDone"]) && !empty($_SESSION["logDone"]) && $_SESSION["logDone"] == 1){

		header("Location: _web/controller.php?accion=recuperarSession");
		
	}
	//Redireccion si existe una sesion activa
?>
<head>
	<title>Proyecto-DAW | ShopSphere</title>
	<meta charset="UTF-8">
  <meta name="author" content="Jaime Matas Asensio">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <?php 
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); 
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
		header("Cache-Control: no-store, no-cache, must-revalidate"); 
		header("Cache-Control: post-check=0, pre-check=0", false); 
		header("Pragma: no-cache"); 
		?> 
  <link rel="icon" type="image/x-icon" href="_recursos/img/Logo_Movil.jpg">
  <link rel="stylesheet" type="text/css" href="_recursos/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="_recursos/css/estiloIndex.css">
  <script type="text/javascript" src="_recursos/js/jquery-3.3.1.min.js"></script>
</head>
<body>
	<?php include "_web/cabecera.php"; ?>
	<div class="container-fluid">
		<main class="container">
			<div id="cont0" class="row indexCont">
				<h1>Bienvenido</h1>
				<div>
					<img src="_recursos/img/Logo_Cuadrado.jpg" alt="Logo de la empresa">
				</div>
			</div>

			<div id="cont1" class="row indexCont">
				<div class="col-sm-6 col-md-6 col-lg-6 hidden-xs" id="textDesEsc">
					<h3>ShopSphere</h3>
					<p>ShopSphere es una aplicación de gestión de tienda. Con esta aplicación podrás gestionar todo tu negocio, proveedores, productos, empleados. La interfaz sencilla y amigable te ayudará a mejorar tu negocio y a obtener mejor margen de beneficios. El servicio es gratuito pero si quieres mejorar el servicio puede pagar una suscripción anual para una mejor experiencia. </p>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" id="cont1img">
					<div id="imgCont1">
						<img src="_recursos/img/imgIndex1.jpg" class="border-shopShpere-xs" alt="imagen 1 del index">
						<p id="Quees" class="hidden-sm hidden-md hidden-lg">ShopSphere</p>					
					</div>
					<div id="textoDesc" class="col-xs-12 hidden-sm hidden-md hidden-lg">
						<p>ShopSphere es una aplicación de gestión de tienda. Con esta aplicación podrás gestionar todo tu negocio, proveedores, productos, empleados. La interfaz sencilla y amigable te ayudará a mejorar tu negocio y a obtener mejor margen de beneficios. El servicio es gratuito pero si quieres mejorar el servicio puede pagar una suscripción anual para una mejor experiencia. </p>
					</div>
				</div>
			</div>
	
			<div id="cont2" class="row indexCont">
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" id="cont2img">
					<div id="imgCont2">
						<img src="_recursos/img/imgIndex2.jpg" class="border-shopShpere-xs" alt="imagen 2 del index">
						<p id="Vent" class="hidden-sm hidden-md hidden-lg">Ventajas</p>					
					</div>
					<div id="textoVent" class="col-xs-12 hidden-sm hidden-md hidden-lg">
						<p><span class="glyphicon glyphicon-folder-open"></span>Organiza todo tu negocio</p>
						<p><span class="glyphicon glyphicon-leaf"></span>Sin necesidad de imprimir documentos</p>
						<p><span class="glyphicon glyphicon-check"></span>Controla tus proveedores y productos</p>
						<p><span class="glyphicon glyphicon-euro"></span> Ahorra más dinero en organización y gestión</p>

					</div>
				</div>
				<div class="col-sm-6 col-md-6 col-lg-6 hidden-xs" id="textVentEsc">
					<h3>Ventajas</h3>
						<p><span class="glyphicon glyphicon-folder-open"></span> Organiza todo tu negocio</p>
						<p><span class="glyphicon glyphicon-leaf"></span> Sin necesidad de imprimir documentos</p>
						<p><span class="glyphicon glyphicon-check"></span> Controla tus proveedores y productos</p>
						<p><span class="glyphicon glyphicon-euro"></span> Ahorra más dinero en organizacion y gestion</p>

				</div>
			</div>
			

			<div id="cont3" class="row indexCont">
				<h2> Suscripciones</h2>
				<div class="col-xs-12 col-sm-4 suscripciones">
					<h3>Premium</h3>
					<div>
						<h4>Características</h4>
						<ul>
							<li><span class="glyphicon glyphicon-tasks"></span>Capacidad sin límites</li>	
							<li><span class="glyphicon glyphicon-wrench"></span>Servicio Técnico personal</li>	
							<li><span class="glyphicon glyphicon-flash"></span>Sin publicidad</li>	
							<li><span class="glyphicon glyphicon-euro"></span>360 año</li>	
						</ul>
						<div>
							<form action="_web/controller.php?accion=nuevoRegistro" method="post">
								<input type="hidden" name="tSuscripcion" value="pre">
								<button class="btn-regIndex">Regístrate</button>
							</form>
						</div>
					</div>
				</div>

				<div class="col-xs-12 col-sm-4 suscripciones">
					<h3>Normal</h3>
					<div>
						<h4>Características</h4>
						<ul>
							<li><span class="glyphicon glyphicon-tasks"></span>Capacidad limitada</li>	
							<li><span class="glyphicon glyphicon-wrench"></span>Servicio Técnico 24h</li>	
							<li><span class="glyphicon glyphicon-flash"></span>Sin publicidad</li>	
							<li><span class="glyphicon glyphicon-euro"></span>250 año</li>	
						</ul>
						<div>
							<form action="_web/controller.php?accion=nuevoRegistro" method="post">
								<input type="hidden" name="tSuscripcion" value="nor">
								<button class="btn-regIndex">Regístrate</button>
							</form>
						</div>
					</div>
				</div>

				<div class="col-xs-12 col-sm-4 suscripciones">
					<h3>Básica</h3>
					<div>
						<h4>Características</h4>
						<ul>
							<li><span class="glyphicon glyphicon-tasks"></span>Capacidad muy limitada</li>	
							<li><span class="glyphicon glyphicon-wrench"></span>Servicio Técnico 24h</li>	
							<li><span class="glyphicon glyphicon-flash"></span>Con publicidad</li>	
							<li><span class="glyphicon glyphicon-euro"></span>Gratis!</li>	
						</ul>
						<div>
							<form action="_web/controller.php?accion=nuevoRegistro" method="post">
								<input type="hidden" name="tSuscripcion" value="fre">
								<button class="btn-regIndex">Regístrate</button>
							</form>
						</div>
					</div>
				</div>
			</div>

			<div id="cont4" class="row indexCont" >
				<div id="div-registro" class="col-xs-12">
					<img src="_recursos/img/imgRegistro.jpg" class=" border-shopShpere-xs" id="imgRegistro" alt="Imgen de registro">
					<form action="_web/controller.php?accion=nuevoRegistro" method="post">
						<input type="hidden" name="tSuscripcion" value="">
						<button class="btn-regIndex">Regístrate</button>
					</form>
				</div>
			</div>
			
		</main>
	</div>
	<?php	include "_web/pie.php";	?>
<script type="text/javascript" src="_recursos/js/bootstrap.min.js" charset="utf-8"></script>
</body>
</html>