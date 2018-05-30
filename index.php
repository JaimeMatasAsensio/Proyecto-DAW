<!DOCTYPE html>
<html lang="es-ES">
<head>
	<title>Proyecto-DAW | ShopSphere</title>
	<meta charset="UTF-8">
  <meta name="author" content="Jaime Matas Asensio">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
					<h3>¿Que es ShopSphere?</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia libero tempore repellat. Ipsum magni numquam debitis ipsam voluptatem, harum illo atque asperiores assumenda obcaecati! Ut, est. Ut quisquam obcaecati, facilis. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates deleniti illo ipsa quidem, amet iste.</p>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" id="cont1img">
					<div id="imgCont1">
						<img src="_recursos/img/imgIndex1.jpg" class="border-shopShpere-xs" alt="imagen 1 del index">
						<p id="Quees" class="hidden-sm hidden-md hidden-lg">¿Que es ShopSphere?</p>					
					</div>
					<div id="textoDesc" class="col-xs-12 hidden-sm hidden-md hidden-lg">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia libero tempore repellat. Ipsum magni numquam debitis ipsam voluptatem, harum illo atque asperiores assumenda obcaecati! Ut, est. Ut quisquam obcaecati, facilis. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates deleniti illo ipsa quidem, amet iste. Aut quas impedit fugit soluta facilis rerum animi hic. Assumenda ex omnis perspiciatis dolore itaque.</p>
					</div>
				</div>
			</div>
	
			<div id="cont2" class="row indexCont">
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" id="cont2img">
					<div id="imgCont2">
						<img src="_recursos/img/imgIndex2.jpg" class="border-shopShpere-xs" alt="imagen 2 del index">
						<p id="Vent" class="hidden-sm hidden-md hidden-lg">Ventajas de ShopSphere</p>					
					</div>
					<div id="textoVent" class="col-xs-12 hidden-sm hidden-md hidden-lg">
						<p><span class="glyphicon glyphicon-folder-open"></span>Organiza todo tu negocio</p>
						<p><span class="glyphicon glyphicon-leaf"></span>Sin necesidad de imprimir documentos</p>
						<p><span class="glyphicon glyphicon-check"></span>Controla tus proveedores y productos</p>
						<p><span class="glyphicon glyphicon-euro"></span> Ahorra más dinero en organizacion y gestion</p>

					</div>
				</div>
				<div class="col-sm-6 col-md-6 col-lg-6 hidden-xs" id="textVentEsc">
					<h3>Ventajas de ShopSphere</h3>
						<p><span class="glyphicon glyphicon-folder-open"></span> Organiza todo tu negocio</p>
						<p><span class="glyphicon glyphicon-leaf"></span> Sin necesidad de imprimir documentos</p>
						<p><span class="glyphicon glyphicon-check"></span> Controla tus proveedores y productos</p>
						<p><span class="glyphicon glyphicon-euro"></span> Ahorra más dinero en organizacion y gestion</p>

				</div>
			</div>
			

			<div id="cont3" class="row indexCont">
				<h2>Elije tu suscripcion</h2>
				<div class="col-xs-12 col-sm-4 suscripciones">
					<h3>Premium</h3>
					<div>
						<h4>Caracteristicas</h4>
						<ul>
							<li><span class="glyphicon glyphicon-tasks"></span>Capacidad sin limites</li>	
							<li><span class="glyphicon glyphicon-wrench"></span>Servicio Tecnico personal</li>	
							<li><span class="glyphicon glyphicon-flash"></span>Sin publicidad</li>	
							<li><span class="glyphicon glyphicon-euro"></span>360 año</li>	
						</ul>
						<div>
							<button class="btn-regIndex">Registrate</button>
						</div>
					</div>
				</div>

				<div class="col-xs-12 col-sm-4 suscripciones">
					<h3>Normal</h3>
					<div>
						<h4>Caracteristicas</h4>
						<ul>
							<li><span class="glyphicon glyphicon-tasks"></span>Capacidad limitada</li>	
							<li><span class="glyphicon glyphicon-wrench"></span>Servicio Tecnico 24h</li>	
							<li><span class="glyphicon glyphicon-flash"></span>Sin publicidad</li>	
							<li><span class="glyphicon glyphicon-euro"></span>250 año</li>	
						</ul>
						<div>
							<button class="btn-regIndex">Registrate</button>
						</div>
					</div>
				</div>

				<div class="col-xs-12 col-sm-4 suscripciones">
					<h3>Basica</h3>
					<div>
						<h4>Caracteristicas</h4>
						<ul>
							<li><span class="glyphicon glyphicon-tasks"></span>Capacidad muy limitada</li>	
							<li><span class="glyphicon glyphicon-wrench"></span>Servicio Tecnico 24h</li>	
							<li><span class="glyphicon glyphicon-flash"></span>Con publicidad</li>	
							<li><span class="glyphicon glyphicon-euro"></span>Gratis!</li>	
						</ul>
						<div>
							<button class="btn-regIndex">Registrate</button>
						</div>
					</div>
				</div>
			</div>

			<div id="cont4" class="row indexCont">
				<div id="div-registro" class="col-xs-12">
					<img src="_recursos/img/imgRegistro.jpg" class=" border-shopShpere-xs" id="imgRegistro" alt="Imgen de registro">
					<button class="btn btn-default">Registrate ya!</button>
				</div>
			</div>
			
		</main>
	</div>
	<?php	include "_web/pie.php";	?>
</body>
<script type="text/javascript" src="_recursos/js/bootstrap.min.js" charset="utf-8"></script>
</html>