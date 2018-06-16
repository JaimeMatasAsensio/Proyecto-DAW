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
	require_once '../_entidad/classProducto.php';
	require_once '../_web/imprForm.php';
	?>
	<div class="container-fluid">
		<main class="container">
			<?php
			if( isset($_SESSION["nivelAcceso"]) && !empty($_SESSION["nivelAcceso"]) ){
				if( isset($_SESSION["nombreTienda"]) && !empty($_SESSION["nombreTienda"]) ){
					if ($nivelAcc == "gen") {
							echo "<h1>".$_SESSION["nombreTienda"]."</h1>";
							echo "<h3>Gestion Productos</h3>";
					}
					if ($nivelAcc == "emp") {
							echo "<h1>".$_SESSION["nombreTienda"]."</h1>";
							echo "<h3>Gestion Productos</h3>";
					}
				}
			}
			if( isset($_SESSION["nivelAcceso"]) && !empty($_SESSION["nivelAcceso"]) ){
				$nivelAcc = $_SESSION["nivelAcceso"];
				if ($nivelAcc == "adm") {
					echo "<h1>Gestion Productos - Usuario Administrador</h1>";
					echo '<div class="row formulario formulario-crud" id="selectorTienda">';
					echo '<form action="../_web/controller.php?accion=move&operacion=productos" method="post" class="form-inline">';
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
							<legend>Buscar Producto</legend>
							 <div id="elementosBusqueda">
							 <div class="form-group">
						    <label class="sr-only" for="tBusqueda">Tipo Busqueda</label>
						    <select name="tBusqueda" class="form-control" id="tBusqueda">
						    	<option value=""></option>
						    	<option value="nombre">Nombre</option>
						    	<option value="referencia">Referencia</option>
						    	<option value="proveedor">Proveedor</option>
						    	<option value="Precio">Precio</option>
						    </select>
						  </div>
						  <div class="form-group">
						    <label class="sr-only" for="busqueda">Buscar</label>
						    <input type="text" class="form-control" name="busqueda" id="busqueda" placeholder="Buscar">
						  </div>
						  <button type="submit" class="btn btn-info" disabled><span class="glyphicon glyphicon-search"></span></button>
							</div>						
						</fieldset>
					</div>
				</form>
			</div>

			<div class="row" id="nuevoElemento">
				<h2 class="col-xs-10 col-xs-offset-1"><span class="glyphicon glyphicon-chevron-down"></span> Nuevo producto </h2>	
			</div>

			<div class="row formulario formulario-crud" id="formNuevoElemento">
				<h3 class=infoProceso></h3>
				<div class="confirmDelete"></div>
				<div class="overFlowForms"></div>
				<form action="../_web/controller.php?accion=mantenimientoProductos&operacion=alta" method="post" enctype="multipart/form-data" >
					<div class="col-xs-12">
						<fieldset>
							<legend>Añadir Producto</legend>
							<div class="row">
								<div class="col-xs-12 inputImg">
									<div>
										<img src="../_recursos/img/nuevoProducto.png" alt="Imagen de nuevo producto">
									</div>
									<div>
										<span class="foto">
								    	<input type="file" name="foto" id="foto">
										</span>
										<label for="foto" class="inputFile"><span>Añadir Foto</span></label>
									</div>
								</div>
							  <div class="form-group col-xs-12 col-sm-6">
							    <label for="nombre">Nombre</label>
							    <input type="text" class="form-control" name="nombre" id="pais" placeholder="Nombre Usuario">
							    <span class="errValidacion">Nombre contacto no valido</span>
							  </div>
							  <div class="form-group col-xs-12 col-sm-6">
							    <label for="referencia">Referencia</label>
							    <input type="text" class="form-control" name="referencia" id="referencia" placeholder="Referencia">
							    <span class="errValidacion">Sin valor de referencia</span>
							  </div>
							  <div class="form-group col-xs-12 col-sm-4">
							    <label for="precio">Precio (€)</label>
							    <input type="text" class="form-control" name="precio" id="precio" placeholder="Precio (€)">
							    <span class="errValidacion">Formato de precion no valido</span>
							  </div>
								<div class="form-group col-xs-12 col-sm-4">
							    <label for="IVA">IVA</label>
							    <input type="text" class="form-control" name="IVA" id="IVA" placeholder="IVA">
							    <span class="errValidacion">Formato de IVA no valido</span>
							  </div>
								<div class="form-group col-xs-12 col-sm-4">
							    <label for="descuento">Descuento</label>
							    <input type="text" class="form-control" name="descuento" id="descuento" placeholder="Descuento">
							    <span class="errValidacion">Formato de descuento no valido</span>
							  </div>
								<div class="form-group col-xs-12 col-sm-4">
							    <label for="cantidad">Cantidad</label>
							    <input type="number" class="form-control" name="cantidad" id="cantidad" placeholder="Cantidad" min="0">
							    <span class="errValidacion">Formato de cantidad no valido</span>
							  </div>
							  <div class="form-group col-xs-12 col-sm-4">
							    <label for="cantidadMin">Cantidad Minima</label>
							    <input type="number" class="form-control" name="cantidadMin" id="cantidadMin" placeholder="Cantidad Minima" min="0">
							    <span class="errValidacion">Formato de cantidad minima no valido</span>
							  </div>
								<div class="form-group col-xs-12 col-sm-4">
							    <label for="nuevo">Nuevo Producto</label>
							    <input type="checkbox" class="form-control" name="nuevo" id="nuevo">
							  </div>
								<div class="form-group col-xs-12 col-sm-12">
							    <label for="descripcion">Descripcion</label>
							    <textarea name="descripcion" id="descripcion">Introduzca una Descripcion</textarea>
							    <span class="errValidacion">Sin valor de descripcion</span>
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
			if(isset($_SESSION["listadoProductos"])  && !empty($_SESSION["listadoProductos"]) ){

				$productos = unserialize($_SESSION["listadoProductos"]);
				if($productos){
					for ($i=0; $i < count($productos); $i++) { 
						imprFormProducto($productos[$i]);
					}
				}else{
					echo "<div class='row'>";
					echo "<div class='col-xs-12'>";
					echo '<blockquote>
						  			<p class="bg-info" id="NoResult">No dispone de Empleados...</p>
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