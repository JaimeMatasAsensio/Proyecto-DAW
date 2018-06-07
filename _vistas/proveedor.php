<!DOCTYPE html>
<html lang="es-ES">
<head>
	<title>Proyecto-DAW | ShopSphere</title>
	<meta charset="UTF-8">
  <meta name="author" content="Jaime Matas Asensio">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Cache-Control" content="no-cache">
  <meta http-equiv="Expires" content="0">
	<meta http-equiv="Last-Modified" content="0">
	<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
	<meta http-equiv="Pragma" content="no-cache"> 
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
			<h1>Control de Proveedores</h1>
			<?php
			if( isset($_SESSION["nivelAcceso"]) && !empty($_SESSION["nivelAcceso"]) ){
				$nivelAcc = $_SESSION["nivelAcceso"];
				if ($nivelAcc == "adm") {
					echo '<div class="row formulario formulario-crud" id="selectorTienda">';
					echo '<form action="#" class="form-inline">';
					echo '<div class="col-xs-12">';
					echo '<fieldset>';
					echo '<legend>Seleccionar tienda</legend>';
					echo '<div class="form-group">';
			    echo '<label class="sr-only" for="selectTienda">Tiendas</label>';
			    echo '<select name="selectTienda" class="form-control" id="selectTienda">';
		    	echo '<option value="">Tiendas</option>';
		    	echo '<option value="codTienda">codTienda - Nombre Tienda</option>';
		    	echo '<option value="codTienda">codTienda1 - Nombre Tienda1</option>';
		    	echo '<option value="codTienda">codTienda2 - Nombre Tienda2</option>';
		    	echo '<option value="codTienda">codTienda3 - Nombre Tienda3</option>';
			    echo '</select>';
				  echo '</div>';
				  echo '<button type="submit" class="btn btn-default">Ir a tienda</button>';
					echo '</fieldset>';
					echo '</div>';
					echo '</form>';
					echo '</div>';
				}
			}
			?>
			<div class="row formulario formulario-crud" id="formBusq">
				<form action="#" class="form-inline">
					<div class="col-xs-12">
						<fieldset>
							<legend>Buscar Proveedor</legend>
							<div id="elementosBusqueda">
								<div class="form-group">
							    <label class="sr-only" for="tBusqueda">Tipo Busqueda</label>
							    <select name="tBusqueda" lass="form-control" id="tBusqueda">
							    	<option value=""></option>
							    	<option value="nombre">Nombre</option>
							    	<option value="nombreContacto">Nombre del Contacto</option>
							    </select>
							  </div>
							  <div class="form-group">
							    <label class="sr-only" for="busqueda">Buscar</label>
							    <input type="text" class="form-control" name="busqueda" id="busqueda" placeholder="Buscar">
							  </div>
							  <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
						</div>
						</fieldset>
					</div>
				</form>
			</div>

			<div class="row" id="nuevoElemento">
				<h2 class="col-xs-10 col-xs-offset-1"><span class="glyphicon glyphicon-chevron-down"></span> Nuevo Proveedor </h2>	
			</div>

			<div class="row formulario formulario-crud" id="formNuevoElemento">
				<form action="../_web/controller.php?accion=mantenimentoTiendas&operacion=alta" method="post">
					<div class="col-xs-12">
						<fieldset>
							<legend>Añadir Proveedor</legend>
							<div class="row">
							  <div class="form-group col-xs-12">
							    <label for="nombre" class="hidden-xs">Nombre Proveedor</label>
							    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre Proveedor">
							  </div>
							  <div class="form-group col-xs-12 col-sm-4">
							    <label for="nombre" class="hidden-xs">Nombre Contacto</label>
							    <input type="text" class="form-control" name="nombre" id="nombreContacto" placeholder="Nombre Contacto">
							  </div>
							  <div class="form-group col-xs-12 col-sm-4">
							    <label for="apellido1Contacto" class="hidden-xs">1º Apellido Contato</label>
							    <input type="text" class="form-control" name="apellido1Contacto" id="apellido1Contacto" placeholder="1º Apellido Contacto">
							  </div>
							  <div class="form-group col-xs-12 col-sm-4">
							    <label for="apellido2Contacto" class="hidden-xs">2º Apellido Contacto</label>
							    <input type="text" class="form-control" name="apellido2Contacto" id="apellido2Contacto" placeholder="2º Apellido Contacto">
							  </div>
							  <div class="form-group col-xs-12 col-sm-4">
							    <label for="telefono" class="hidden-xs">Telefono</label>
							    <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Telefono">
							  </div>
								<div class="form-group col-xs-12 col-sm-4">
							    <label for="Movil" class="hidden-xs">Movil</label>
							    <input type="text" class="form-control" name="movil" id="movil" placeholder="Movil">
							  </div>
								
							  <div class="form-group col-xs-12 col-sm-4">
							    <label for="email" class="hidden-xs">Email</label>
							    <input type="mail" class="form-control" name="email" id="email" placeholder="Email">
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
								<legend>Proveedor: 'codProveedor'</legend>
								<input type="hidden" name="codProveedor" value="">
								<div class="row">
							  <div class="form-group col-xs-12">
							    <label for="nombre" class="hidden-xs">Nombre Proveedor</label>
							    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre Proveedor">
							  </div>
							  <div class="form-group col-xs-12 col-sm-4">
							    <label for="nombre" class="hidden-xs">Nombre Contacto</label>
							    <input type="text" class="form-control" name="nombre" id="nombreContacto" placeholder="Nombre Contacto">
							  </div>
							  <div class="form-group col-xs-12 col-sm-4">
							    <label for="apellido1Contacto" class="hidden-xs">1º Apellido Contato</label>
							    <input type="text" class="form-control" name="apellido1Contacto" id="apellido1Contacto" placeholder="1º Apellido Contacto">
							  </div>
							  <div class="form-group col-xs-12 col-sm-4">
							    <label for="apellido2Contacto" class="hidden-xs">2º Apellido Contacto</label>
							    <input type="text" class="form-control" name="apellido2Contacto" id="apellido2Contacto" placeholder="2º Apellido Contacto">
							  </div>
							  <div class="form-group col-xs-12 col-sm-4">
							    <label for="telefono" class="hidden-xs">Telefono</label>
							    <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Telefono">
							  </div>
								<div class="form-group col-xs-12 col-sm-4">
							    <label for="Movil" class="hidden-xs">Movil</label>
							    <input type="text" class="form-control" name="movil" id="movil" placeholder="Movil">
							  </div>
								
							  <div class="form-group col-xs-12 col-sm-4">
							    <label for="email" class="hidden-xs">Email</label>
							    <input type="mail" class="form-control" name="email" id="email" placeholder="Email">
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