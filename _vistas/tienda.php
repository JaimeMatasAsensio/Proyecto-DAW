<?php
/*
Jaime Matas Asensio
Proyecto DAW: ShopSphere
I.E.S. Maestre de Calatrava - Ciudad Real
2018
*/
session_start();
//Determinimanos si se ha realizado un login correcto
if(isset($_SESSION["logDone"]) && !empty($_SESSION["logDone"]) && $_SESSION["logDone"] != 1) {
	header("Location: ../index.php");
}
//De esta forma evitamos que usuarios anonimos entren a esta parte de la aplicacion
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
	require_once '../_entidad/classTienda.php';
	require_once '../_web/imprForm.php';
	?>
	<div class="container-fluid">
		<main class="container">
			<h1>Mantenimiento Tiendas</h1>
			<div class="row formulario formulario-crud" id="formBusq">
				<form action="../_web/controller.php?accion=mantenimentoTiendas&operacion=buscar" method="post" class="form-inline" id="f0" >
					<div class="col-xs-12">
						<fieldset>

							<legend>Buscar Tienda</legend>
							<div id="elementosBusqueda">
							 <div class="form-group">
						    <label class="sr-only" for="tBusqueda">Tipo Busqueda</label>
						    <select name="tBusqueda" class="form-control" id="tBusqueda">
						    	<option value="">Filtro</option>
						    	<option value="codTienda">Código Tienda</option>
						    	<option value="nombre">Nombre</option>
						    	<option value="tsuscripcion">Tipo Suscripción</option>
						    </select>
						  </div>

						  <div class="form-group">
						    <input type="text" class="form-control" name="busqueda" placeholder="Buscar">
						    <select name="selBusqueda" class="form-control">
						    	<option value="">-----</option>
							    <option value="pre">Premium - 360€/año</option>
							    <option value="nor">Normal - 250€/año</option>
							    <option value="fre">Básica - ¡¡Gratis!!</option>
						    </select>
						  </div>
						  <button type="submit" class="btn btn-info" disabled><span class="glyphicon glyphicon-search"></span></button>
						   <?php
						echo'<input type="hidden" name="nAcceso" value="'.$_SESSION["nivelAcceso"].'">
								<input type="hidden" name="logDone" value="'.$_SESSION["logDone"].'">'

						   ?>
							</div>

						</fieldset>
					</div>
				</form>
			</div>

			<div class="row" id="nuevoElemento">
				<h2 class="col-xs-10 col-xs-offset-1"><span class="glyphicon glyphicon-chevron-down"></span> Nueva Tienda </h2>	
			</div>

			<div class="row formulario formulario-crud" id="formNuevoElemento">
			<h3 class=infoProceso></h3>
			<div class="confirmDelete"></div>
			<div class="overFlowForms"></div>
				<form action="../_web/controller.php?accion=mantenimentoTiendas&operacion=alta" method="post" name="tienda">
					<div class="col-xs-12">
						<fieldset>
							<legend>Añadir Tienda</legend>
							<div class="row">
							  <div class="form-group col-xs-12 col-sm-6">
							    <label for="nombre">Nombre</label>
							    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre Tienda">
							    <span class="errValidacion">Nombre no válido</span>
							  </div>
							  <div class="form-group col-xs-12 col-sm-6">
							    <label for="pais">País</label>
							    <input type="text" class="form-control" name="pais" id="pais" placeholder="País">
							    <span class="errValidacion">País no válido</span>
							  </div>
							  <div class="form-group col-xs-12 col-sm-6">
							    <label for="provincia">Provincia</label>
							    <input type="text" class="form-control" name="provincia" id="provincia" placeholder="Provincia">
							    <span class="errValidacion">Provincia no válida</span>
							  </div>
							  <div class="form-group col-xs-12 col-sm-6">
							    <label for="poblacion">Población</label>
							    <input type="text" class="form-control" name="poblacion" id="poblacion" placeholder="Población">
							    <span class="errValidacion">Población no válida</span>
							  </div>
							  <div class="form-group col-xs-12 col-sm-6">
							    <label for="direccion">Dirección</label>
							    <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Dirección">
							    <span class="errValidacion">Dirección no válida</span>
							  </div>
							  <div class="form-group col-xs-12 col-sm-6">
							    <label for="numero">Número Dirección</label>
							    <input type="text" class="form-control" name="numero" id="numero" placeholder="Número">
							    <span class="errValidacion">Número dirección no válido</span>
							  </div>
							  <div class="form-group col-xs-12 col-sm-6">
							    <label for="telefono" >Teléfono</label>
							    <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Teléfono">
							    <span class="errValidacion">Número de teléfono no válido</span>
							  </div>
							  <div class="form-group col-xs-12 col-sm-6">
							    <label for="movil">Móvil</label>
							    <input type="text" class="form-control" name="movil" id="movil" placeholder="Movil">
							    <span class="errValidacion">Número de móvil no válido</span>
							  </div>
							  <div class="form-group col-xs-12 col-sm-6">
							    <label for="email">Email</label>
							    <input type="text" class="form-control" name="email" id="email" placeholder="Email">
							    <span class="errValidacion">Formato de correo incorrecto</span>
							  </div>
							  <div class="form-group col-xs-12 col-sm-6">
							    <label for="tSuscripcion">Tipo de Suscripción</label>
							    <select class="form-control" name="tSuscripcion" id="tSuscripcion">
							    	<option value="">Tipo Suscripción</option>
							    	<option value="pre">Premium - 360€/año</option>
							    	<option value="nor">Normal - 250€/año</option>
							    	<option value="fre">Basica - ¡¡Gratis!!</option>
							    </select>
							    <span class="errValidacion">Seleccione una suscripción</span>
							  </div>
							</div>
						</fieldset>
					</div>
				</form>
			  <div class="col-xs-12 control-btn confInsert">
		  		<div class="col-xs-6">
		  			<button class="btn btn-success" disabled><span class="glyphicon glyphicon-ok"></span></button>
		  		</div>
		  		<div class="col-xs-6">
		  			<button class="btn btn-danger cancelInsert"><span class="glyphicon glyphicon-remove"></span></button>
		  		</div>
			  </div>
			</div>

			<div class="row" id="resultadoBusquedaElementos">
				<h2 class="col-xs-10 col-xs-offset-1"><span class="glyphicon glyphicon-chevron-down"></span> Resultado Búsqueda </h2>
			</div>
			<div id="formsResaultadoBusqueda">
			<?php
			if(isset($_SESSION["listadoTiendas"])  && !empty($_SESSION["listadoTiendas"]) ){
				$tiendas = unserialize($_SESSION["listadoTiendas"]);

				if(!empty($tiendas) && gettype($tiendas[0]) == "object" ){

					for ($i=0; $i < count($tiendas); $i++) { 
						imprFormTienda($tiendas[$i]);
					}

				}else{
					echo "<div class='row'>";
					echo "<div class='col-xs-12'>";
					echo '<blockquote>
						  			<p class="bg-info" id="NoResult">No dispone de tiendas...</p>
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
	<script type="text/javascript" src="../_recursos/js/validacionFormulario.js" charset="utf-8"></script>
	<script type="text/javascript" src="../_recursos/js/busquedasInputTienda.js" charset="utf-8"></script>
</body>
</html>