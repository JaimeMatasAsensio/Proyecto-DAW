<!DOCTYPE html>
<html lang="es-ES">
<head>
	<title>Proyecto-DAW | ShopSphere</title>
	<meta charset="UTF-8">
  <meta name="author" content="Jaime Matas Asensio">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="../_recursos/img/Logo_Movil.jpg">
  <link rel="stylesheet" type="text/css" href="../_recursos/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../_recursos/css/estiloIndex.css">
  <script type="text/javascript" src="../_recursos/js/jquery-3.3.1.min.js"></script>
</head>
<body>
	<?php include "cabeceraVistas.php"; ?>
	<div class="container-fluid">
		<main class="container">
			<div class="row">
				<form action="">
					<div class="col-xs-12 col-sm-6">
						<fieldset>
							<legend>Datos de tienda</legend>
							<p>Formulario de tienda</p>
						</fieldset>
					</div>
					<div class="col-xs-12 col-sm-6">
						<fieldset>
							<legend>Datos Personales</legend>
							<p>Formulario datos personales</p>
						</fieldset>							
					</div>
					<div class="col-xs-12">
						<button class="btn btn-success"><span class="glyphicon glyphicon-ok"></span></button>
						<button class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></button>
					</div>
				</form>
				
			</div>
		</main>
	</div>
	<?php	include "pieVistas.php";	?>
</body>
<script type="text/javascript" src="../_recursos/js/bootstrap.min.js" charset="utf-8"></script>
</html>