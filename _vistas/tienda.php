<!DOCTYPE html>
<html lang="es-ES">
<head>
	<title>Proyecto-DAW | ShopSphere</title>
	<meta charset="UTF-8">
  <meta name="author" content="Jaime Matas Asensio">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Cache-Control" content="no-cache"> 
  <link rel="icon" type="image/x-icon" href="../_recursos/img/Logo_Movil.jpg">
  <link rel="stylesheet" type="text/css" href="../_recursos/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../_recursos/css/estiloIndex.css">
  <link rel="stylesheet" type="text/css" href="../_recursos/css/formularios.css">
  <script type="text/javascript" src="../_recursos/js/jquery-3.3.1.min.js"></script>
</head>
<body>
	<?php include "cabeceraVistas.php"; ?>
	<div class="container-fluid">
		<main class="container">
			<h1>Mantenimiento Tiendas</h1>
			<div class="row formulario formulario-crud" id="formBusq">
				<form action="#" class="form-inline">
					<div class="col-xs-12">
						<fieldset>
							<legend>Buscar Tienda</legend>
							 
							 <div class="form-group">
						    <label class="sr-only" for="tBusqueda">Tipo Busqueda</label>
						    <select name="tBusqueda" lass="form-control" id="tBusqueda">
						    	<option value=""></option>
						    	<option value="nombre">Nombre</option>
						    	<option value="tsuscripcion">Tipo Suscripcion</option>
						    </select>
						  </div>

						  <div class="form-group">
						    <label class="sr-only" for="busqueda">Buscar</label>
						    <input type="text" class="form-control" name="busqueda" id="busqueda" placeholder="Buscar">
						  </div>
						  <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>

						</fieldset>
					</div>
				</form>
			</div>

			<div class="row formulario formulario-crud" id="">
				<form action="#">
					<div class="col-xs-12">
						<fieldset>
							<legend>Nueva Tienda</legend>
							<div class="row">
							  <div class="form-group col-xs-12">
							    <label for="nombre">Nombre</label>
							    <input type="text" class="form-control" name="nombre" id="pais" placeholder="Nombre Tienda">
							  </div>
							  <div class="form-group col-xs-12">
							    <label for="pais">Pais</label>
							    <input type="text" class="form-control" name="pais" id="pais" placeholder="Pais">
							  </div>
							  <div class="col-xs-12">
							  	<button class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span></button>
							  	<button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
							  </div>
							  
							</div>
						</fieldset>
					</div>
				</form>
			</div>
		</main>
	</div>
	<?php	include "pieVistas.php";	?>
	<script type="text/javascript" src="../_recursos/js/bootstrap.min.js" charset="utf-8"></script>
	<script type="text/javascript" src="../_recursos/js/formularioLogin.js" charset="utf-8"></script>
</body>
</html>