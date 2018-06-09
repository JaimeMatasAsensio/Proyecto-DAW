<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es-ES">
<head>
	<title>Proyecto-DAW | ShopSphere</title>
	<meta charset="UTF-8">
  <meta name="author" content="Jaime Matas Asensio">
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
	 require_once '../_entidad/classEmpleado.php';
	 require_once '../_web/imprForm.php';
	 ?>
	<div class="container-fluid">
		<main class="container">
			<h1>Control de Empleados</h1>
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
		    	$TiendasSession = unserialize($_SESSION["TIENDAS"]);
		    	foreach ($TiendasSession as $key => $value) {
		    		echo '<option value="'.$key.'"> '.$key.' - '.$value.'</option>';
		    	}
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
							<legend>Buscar Empleado</legend>
							 <div id="elementosBusqueda">
							 <div class="form-group">
						    <label class="sr-only" for="tBusqueda">Tipo Busqueda</label>
						    <select name="tBusqueda" class="form-control" id="tBusqueda">
						    	<option value=""></option>
						    	<option value="nombre">Nombre</option>
						    	<option value="sueldo">Sueldo</option>
						    </select>
						  </div>

						  <div class="form-group">
						    <label class="sr-only" for="busqueda">Buscar</label>
						    <input type="text" class="form-control" name="busqueda" id="busqueda" placeholder="Buscar">
						  </div>
						  <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
							<div id="elementosBusqueda">
						</fieldset>
					</div>
				</form>
			</div>

			<div class="row" id="nuevoElemento">
				<h2 class="col-xs-10 col-xs-offset-1"><span class="glyphicon glyphicon-chevron-down"></span> Nuevo Empleado </h2>	
			</div>

			<div class="row formulario formulario-crud" id="formNuevoElemento">
				<form action="../_web/controller.php?accion=mantenimientoEmpleados&operacion=alta" method="post" enctype="multipart/form-data" >
					<div class="col-xs-12">
						<fieldset>
							<legend>Añadir Empleado</legend>
							<div class="row">
								<div class="col-xs-12 inputImg">
									<div>
										<img src="../_recursos/img/nuevoEmpleado.png" alt="Imagen de nuevo empleado">
									</div>
									<div>
										<span class="foto">
								    	<input type="file" name="foto" id="foto">
										</span>
										<label for="foto" class="inputFile"><span>Añadir Foto</span></label>
									</div>
								</div>
							  <div class="form-group col-xs-12 col-sm-6">
							    <label for="nombre" class="hidden-xs">Nombre</label>
							    <input type="text" class="form-control" name="nombre" id="pais" placeholder="Nombre Usuario">
							  </div>
							  <div class="form-group col-xs-12 col-sm-6">
							    <label for="apellido1" class="hidden-xs">1º Apellido</label>
							    <input type="text" class="form-control" name="apellido1" id="apellido1" placeholder="1º Apellido">
							  </div>
							  <div class="form-group col-xs-12 col-sm-6">
							    <label for="apellido2" class="hidden-xs">2º Apellido</label>
							    <input type="text" class="form-control" name="apellido2" id="apellido2" placeholder="2º Apellido">
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
							    <label for="sueldo" class="hidden-xs">Sueldo</label>
							    <input type="number" class="form-control" name="sueldo" id="sueldo" placeholder="Sueldo" min="0">
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
			if(isset($_SESSION["listadoEmpleados"])  && !empty($_SESSION["listadoEmpleados"]) ){

				$empleados = unserialize($_SESSION["listadoEmpleados"]);
				switch (gettype($empleados)) {
					case 'array':
						for ($i=0; $i < count($empleados); $i++) { 
							imprFormEmpleado($empleados[$i]);
						}
						break;
					case 'object':
					echo "es objeto<br>";
						imprFormEmpleado($empleados);
						break;
					default:
						echo "gettype de listadoProveedores : ".gettype($empleados);
						break;
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