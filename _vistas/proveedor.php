<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es-ES">
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
  <link rel="icon" type="image/x-icon" href="../_recursos/img/Logo_Movil.jpg">
  <link rel="stylesheet" type="text/css" href="../_recursos/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../_recursos/css/estiloIndex.css">
  <link rel="stylesheet" type="text/css" href="../_recursos/css/formularios.css">
  <script type="text/javascript" src="../_recursos/js/jquery-3.3.1.min.js"></script>
</head>
<body>
	<?php 
		include "cabeceraVistas.php";
		require_once '../_entidad/classProveedor.php';
		require_once '../_web/imprForm.php';
	?>
	<div class="container-fluid">
		<main class="container">
			<?php
			if( isset($_SESSION["nivelAcceso"]) && !empty($_SESSION["nivelAcceso"]) ){
				if( isset($_SESSION["nombreTienda"]) && !empty($_SESSION["nombreTienda"]) ){
					if ($nivelAcc == "gen") {
							echo "<h1>".$_SESSION["nombreTienda"]."</h1>";
							echo "<h3>Gestion Proveedores</h3>";
					}
					if ($nivelAcc == "emp") {
							echo "<h1>".$_SESSION["nombreTienda"]."</h1>";
							echo "<h3>Gestion Proveedores</h3>";
					}
				}
			}

			if( isset($_SESSION["nivelAcceso"]) && !empty($_SESSION["nivelAcceso"]) ){
				$nivelAcc = $_SESSION["nivelAcceso"];
				if ($nivelAcc == "adm") {
					echo "<h1>Gestion Proveedores - Usuario Administrador</h1>";
					echo '<div class="row formulario formulario-crud" id="selectorTienda">';
					echo '<form action="../_web/controller.php?accion=move&operacion=proveedores" method="post" class="form-inline">';
					echo '<div class="col-xs-12">';
					echo '<fieldset>';
					echo '<legend>Seleccionar tienda</legend>';
					echo '<div class="form-group">';
			    echo '<label class="sr-only" for="selectTienda">Tiendas</label>';
			    echo '<select name="selectTienda" class="form-control" id="selectTienda">';
		    	echo '<option value="">Tiendas</option>';
		    	$TiendasSession = unserialize($_SESSION["TIENDAS"]);
		    	$selectTienda = isset($_SESSION["selectTienda"]) && !empty($_SESSION["selectTienda"]) ? $_SESSION["selectTienda"] : -1;
		    	foreach ($TiendasSession as $key => $value) {
		    		if($key == $selectTienda){
		    			echo '<option value="'.$key.'" selected> '.$key.' - '.$value.'</option>';

		    		}else{
		    			echo '<option value="'.$key.'"> '.$key.' - '.$value.'</option>';
		    			
		    		}
		    	}
			    echo '</select>';
				  echo '</div>';
				  echo '<button type="submit" class="btn btn-info">Ir a tienda</button>';
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
							  <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-search"></span></button>
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
			<?php
			if(isset($_SESSION["listadoProveedores"])  && !empty($_SESSION["listadoProveedores"]) ){

				$proveedores = unserialize($_SESSION["listadoProveedores"]);
				if($proveedores){
					for ($i=0; $i < count($proveedores); $i++) { 
						imprFormProveedor($proveedores[$i]);		
					}
				}else{
					echo "<div class='row'>";
					echo "<div class='col-xs-12'>";
					echo '<blockquote>
						  			<p class="bg-info" id="NoResult">No dispone de Proveedores...</p>
									</blockquote>';
					echo "</div'>";

				}
			}
			?>
			</div>

		</main>
	</div>
	<?php	include "pieVistas.php";	?>
	<script type="text/javascript" src="../_recursos/js/bootstrap.min.js" charset="utf-8"></script>
</body>
</html>