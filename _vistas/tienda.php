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

			<div class="row" id="nuevaTienda">
				<h2 class="col-xs-10 col-xs-offset-1"><span class="glyphicon glyphicon-chevron-down"></span> Nueva Tienda </h2>	
			</div>

			<div class="row formulario formulario-crud" id="formNuevaTienda">
				<form action="../_web/controller.php?accion=mantenimentoTiendas&operacion=alta" method="post">
					<div class="col-xs-12">
						<fieldset>
							<legend>Añadir Tienda</legend>
							<div class="row">
							  <div class="form-group col-xs-12 col-sm-6">
							    <label for="nombre" class="hidden-xs">Nombre</label>
							    <input type="text" class="form-control" name="nombre" id="pais" placeholder="Nombre Tienda">
							  </div>
							  <div class="form-group col-xs-12 col-sm-6">
							    <label for="pais" class="hidden-xs">Pais</label>
							    <input type="text" class="form-control" name="pais" id="pais" placeholder="Pais">
							  </div>
							  <div class="form-group col-xs-12 col-sm-6">
							    <label for="provincia" class="hidden-xs">Provincia</label>
							    <input type="text" class="form-control" name="provincia" id="Provincia" placeholder="Provincia">
							  </div>
							  <div class="form-group col-xs-12 col-sm-6">
							    <label for="poblacion" class="hidden-xs">Poblacion</label>
							    <input type="text" class="form-control" name="poblacion" id="poblacion" placeholder="Poblacion">
							  </div>
							  <div class="form-group col-xs-12 col-sm-6">
							    <label for="direccion" class="hidden-xs">Direccion</label>
							    <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Direccion">
							  </div>
							  <div class="form-group col-xs-12 col-sm-6">
							    <label for="numero" class="hidden-xs">Numero</label>
							    <input type="text" class="form-control" name="numero" id="numero" placeholder="Numero">
							  </div>
							  <div class="form-group col-xs-12 col-sm-6">
							    <label for="telefono" class="hidden-xs">Telefono</label>
							    <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Telefono">
							  </div>
							  <div class="form-group col-xs-12 col-sm-6">
							    <label for="movil" class="hidden-xs">Movil</label>
							    <input type="text" class="form-control" name="movil" id="movil" placeholder="Movil">
							  </div>
							  <div class="form-group col-xs-12 col-sm-6">
							    <label for="email"  class="hidden-xs">Email</label>
							    <input type="text" class="form-control" name="email" id="email" placeholder="Email">
							  </div>
							  <div class="form-group col-xs-12 col-sm-6">
							    <label for="pais" class="hidden-xs">Tipo de Suscripcion</label>
							    <select class="form-control" name="tSuscripcion" id="tSuscripcion">
							    	<option value="">Tipo Suscripcion</option>
							    	<option value="pre">Premium - 360€/año</option>
							    	<option value="nor">Normal - 250€/año</option>
							    	<option value="fre">Basica - ¡¡Gratis!!</option>
							    </select>
							  </div>
							  <div class="col-xs-12 control-btn">
							  		<div class="col-xs-6">
							  			<button class="btn btn-success"><span class="glyphicon glyphicon-ok"></span></button>
							  		</div>
							  		<div class="col-xs-6">
							  			<button class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></button>
							  		</div>
								  </div>
							  
							</div>
						</fieldset>
					</div>
				</form>
			</div>

			<div class="row" id="resultadoBusquedaTienda">
				<h2 class="col-xs-10 col-xs-offset-1"><span class="glyphicon glyphicon-chevron-down"></span> Resultado Busqueda
			</div>

			<div id="formsResaultadoBusqueda">
				<div class="row formulario formulario-crud" id="formTiendaCodTienda">
					<form action="../_web/controller.php?accion=mantenimentoTiendas&operacion=modificacion" method="post">
						<div class="col-xs-12">
							<fieldset>
								<legend>Tienda: 'codTienda'</legend>
								<div class="row">
								  <div class="form-group col-xs-12 col-sm-6">
								    <label for="nombre" class="hidden-xs">Nombre</label>
								    <input type="text" class="form-control" name="nombre" id="pais" placeholder="Nombre Tienda">
								  </div>
								  <div class="form-group col-xs-12 col-sm-6">
								    <label for="pais" class="hidden-xs">Pais</label>
								    <input type="text" class="form-control" name="pais" id="pais" placeholder="Pais">
								  </div>
								  <div class="form-group col-xs-12 col-sm-6">
								    <label for="provincia" class="hidden-xs">Provincia</label>
								    <input type="text" class="form-control" name="provincia" id="Provincia" placeholder="Provincia">
								  </div>
								  <div class="form-group col-xs-12 col-sm-6">
								    <label for="poblacion" class="hidden-xs">Poblacion</label>
								    <input type="text" class="form-control" name="poblacion" id="poblacion" placeholder="Poblacion">
								  </div>
								  <div class="form-group col-xs-12 col-sm-6">
								    <label for="direccion" class="hidden-xs">Direccion</label>
								    <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Direccion">
								  </div>
								  <div class="form-group col-xs-12 col-sm-6">
								    <label for="numero" class="hidden-xs">Numero</label>
								    <input type="text" class="form-control" name="numero" id="numero" placeholder="Numero">
								  </div>
								  <div class="form-group col-xs-12 col-sm-6">
								    <label for="telefono" class="hidden-xs">Telefono</label>
								    <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Telefono">
								  </div>
								  <div class="form-group col-xs-12 col-sm-6">
								    <label for="movil" class="hidden-xs">Movil</label>
								    <input type="text" class="form-control" name="movil" id="movil" placeholder="Movil">
								  </div>
								  <div class="form-group col-xs-12 col-sm-6">
								    <label for="email"  class="hidden-xs">Email</label>
								    <input type="text" class="form-control" name="email" id="email" placeholder="Email">
								  </div>
								  <div class="form-group col-xs-12 col-sm-6">
								    <label for="pais" class="hidden-xs">Tipo de Suscripcion</label>
								    <select class="form-control" name="tSuscripcion" id="tSuscripcion">
								    	<option value="">Tipo Suscripcion</option>
								    	<option value="pre">Premium - 360€/año</option>
								    	<option value="nor">Normal - 250€/año</option>
								    	<option value="fre">Basica - ¡¡Gratis!!</option>
								    </select>
								  </div>
								  <div class="col-xs-12 control-btn">
							  		<div class="col-xs-6">
							  			<button class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span></button>
							  		</div>
							  		<div class="col-xs-6">
							  			<button class="btn btn-default"><span class="glyphicon glyphicon-trash"></span></span></button>
							  		</div>
								  </div>
								  
								</div>
							</fieldset>
						</div>
					</form>
				</div>
			</div>
		</main>
	</div>
	<?php	include "pieVistas.php";	?>
	<script type="text/javascript" src="../_recursos/js/bootstrap.min.js" charset="utf-8"></script>
</body>
</html>