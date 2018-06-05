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
			<h1>Mantenimiento Usuarios</h1>
			<div class="row formulario formulario-crud" id="formBusq">
				<form action="#" class="form-inline">
					<div class="col-xs-12">
						<fieldset>
							<legend>Buscar Usuario</legend>
							 
							 <div class="form-group">
						    <label class="sr-only" for="tBusqueda">Tipo Busqueda</label>
						    <select name="tBusqueda" lass="form-control" id="tBusqueda">
						    	<option value=""></option>
						    	<option value="nombre">Nombre</option>
						    	<option value="email">Email</option>
						    	<option value="nacceso">Nivel Acceso</option>
						    	
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

			<div class="row" id="nuevoElemento">
				<h2 class="col-xs-10 col-xs-offset-1"><span class="glyphicon glyphicon-chevron-down"></span> Nuevo Usuario </h2>	
			</div>

			<div class="row formulario formulario-crud" id="formNuevoElemento">
				<form action="../_web/controller.php?accion=mantenimentoTiendas&operacion=alta" method="post">
					<div class="col-xs-12">
						<fieldset>
							<legend>Añadir Usuario</legend>
							<div class="row">
							  <div class="form-group col-xs-12 col-sm-6">
							    <label for="nombre" class="hidden-xs">Nombre</label>
							    <input type="text" class="form-control" name="nombre" id="pais" placeholder="Nombre Usuario">
							  </div>
							  <div class="form-group col-xs-12 col-sm-6">
							    <label for="email" class="hidden-xs">Email</label>
							    <input type="mail" class="form-control" name="email" id="email" placeholder="Email">
							  </div>
							  <div class="form-group col-xs-12 col-sm-6">
							    <label for="password" class="hidden-xs">Contraseña</label>
							    <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña">
							  </div>
							 
							  <div class="form-group col-xs-12 col-sm-6">
							    <label for="nacceso" class="hidden-xs">Nivel Acceso</label>
							    <select class="form-control" name="nAcceso" id="nAcceso">
							    	<option value="">Nivel Acceso</option>
							    	<option value="adm">Administrador</option>
							    	<option value="gen">Gerente</option>
							    	<option value="emp">Empleado</option>
							    </select>
							  </div>
							</div>
						</fieldset>
					</div>
				</form>
			  <div class="col-xs-12 control-btn">
		  		<div class="col-xs-6">
		  			<button class="btn btn-success"><span class="glyphicon glyphicon-ok"></span></button>
		  		</div>
		  		<div class="col-xs-6">
		  			<button class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></button>
		  		</div>
			  </div>
			</div>

			<div class="row" id="resultadoBusquedaElementos">
				<h2 class="col-xs-10 col-xs-offset-1"><span class="glyphicon glyphicon-chevron-down"></span> Resultado Busqueda
			</div>

			<div id="formsResaultadoBusqueda">
				<div class="row formulario formulario-crud" id="formTiendaCodTienda">
					<form action="../_web/controller.php?accion=mantenimentoUsuarios&operacion=modificacion" method="post">
						<div class="col-xs-12">
							<fieldset>
								<legend>Usuario: 'codUsuario'</legend>
								<input type="hidden" name="codUsuario" value="">
								<div class="row">
							  <div class="form-group col-xs-12 col-sm-6">
							    <label for="nombre" class="hidden-xs">Nombre</label>
							    <input type="text" class="form-control" name="nombre" id="pais" placeholder="Nombre Usuario">
							  </div>
							  <div class="form-group col-xs-12 col-sm-6">
							    <label for="email" class="hidden-xs">Email</label>
							    <input type="mail" class="form-control" name="email" id="email" placeholder="Email">
							  </div>
							  <div class="form-group col-xs-12 col-sm-6">
							    <label for="password" class="hidden-xs">Contraseña</label>
							    <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña">
							  </div>
							 
							  <div class="form-group col-xs-12 col-sm-6">
							    <label for="nacceso" class="hidden-xs">Nivel Acceso</label>
							    <select class="form-control" name="nAcceso" id="nAcceso">
							    	<option value="">Nivel Acceso</option>
							    	<option value="adm">Administrador</option>
							    	<option value="gen">Gerente</option>
							    	<option value="emp">Empleado</option>
							    </select>
							  </div>
							</div>
							</fieldset>
						</div>
					</form>
				  <div class="col-xs-12 control-btn">
			  		<div class="col-xs-6 divMod">
			  			<button class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span></button>
			  		</div>
			  		<div class="col-xs-6 confMod">
			  			<button class="btn btn-success"><span class="glyphicon glyphicon-ok"></span></button><button class="btn btn-danger cancelMod"><span class="glyphicon glyphicon-remove"></span></button>
			  		</div>
			  		<div class="col-xs-6">
			  			<button class="btn btn-default"><span class="glyphicon glyphicon-trash"></span></span></button>
			  		</div>
				  </div>
				</div>
			</div>

		</main>
	</div>
	<?php	include "pieVistas.php";	?>
	<script type="text/javascript" src="../_recursos/js/bootstrap.min.js" charset="utf-8"></script>
</body>
</html>