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
//De esta forma filtramos a los usuarios anonimos
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
	require_once '../_entidad/classUsuario.php';
	require_once '../_entidad/classAcceso.php';
	require_once '../_web/imprForm.php';
	?>
	<div class="container-fluid">
		<main class="container">
			<h1>Mantenimiento Usuarios</h1>
			<div class="row formulario formulario-crud" id="formBusq">
				<form action="../_web/controller.php?accion=mantenimentoUsuario&operacion=buscar" method="post" class="form-inline">
					<div class="col-xs-12">
						<fieldset>
							<legend>Buscar Usuarios</legend>
							<div id="elementosBusqueda">
							 <div class="form-group">
						    <label class="sr-only" for="tBusqueda">Tipo Busqueda</label>
						    <select name="tBusqueda" class="form-control" id="tBusqueda">
						    	<option value="">Filtro</option>
						    	<option value="nombre">Nombre</option>
						    	<option value="codUsuario">Código Usuario</option>
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
				  <?php
					echo'<input type="hidden" name="nAcceso" value="'.$_SESSION["nivelAcceso"].'">
							<input type="hidden" name="logDone" value="'.$_SESSION["logDone"].'">'

					   ?>
				</form>
			</div>

			<div class="row" id="nuevoElemento">
				<h2 class="col-xs-10 col-xs-offset-1"><span class="glyphicon glyphicon-chevron-down"></span> Nuevo Usuario </h2>	
			</div>

			<div class="row formulario formulario-crud" id="formNuevoElemento">
			<h3 class=infoProceso></h3>
			<div class="confirmDelete"></div>
			<div class="overFlowForms"></div>
				<form action="../_web/controller.php?accion=mantenimentoTiendas&operacion=alta" method="post" name="usuario">
					<div class="col-xs-12">
						<fieldset>
							<legend>Añadir Usuario</legend>
							<div class="row">
							  <div class="form-group col-xs-12 col-sm-6">
							    <label for="nombre">Nombre</label>
							    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre Usuario">
							    <span class="errValidacion">Nombre no valido</span>
							  </div>
							  <div class="form-group col-xs-12 col-sm-6">
							    <label for="email">Email</label>
							    <input type="mail" class="form-control" name="email" id="email" placeholder="Email">
							    <span class="errValidacion">Formato de correo incorrecto</span>
							  </div>
							  <div class="form-group col-xs-12 col-sm-6">
							    <label for="password">Contraseña</label>
							    <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña">
							    <span class="errValidacion checkPassword"></span>
							  </div>
							  <div class="form-group col-xs-12 col-sm-6">
							    <label for="password">Repetir Contraseña</label>
							    <input type="password" class="form-control" name="passwordCheck" id="passwordCheck" placeholder="Repetir Contraseña">
							  </div>
							  <div class="form-group col-xs-12 col-sm-6">
							    <label for="nacceso">Nivel Acceso</label>
							    <select class="form-control" name="nAcceso" id="nAcceso">
							    	<option value="">Nivel Acceso</option>
							    	<option value="adm">Administrador</option>
							    	<option value="gen">Gerente</option>
							    	<option value="emp">Empleado</option>
							    </select>
							    <span class="errValidacion">Seleccione Nivel de Acceso</span>
							  </div>
							  <?php
							  echo '<div class="form-group col-xs-12 col-sm-6">';
						    echo '<label for="accesoTienda">Acceso a Tienda</label>';
						    echo '<select name="accesoTienda" class="form-control" id="accesoTienda">';
					    	echo '<option value="">Acceso a Tienda</option>';
					    	echo '<option value="0">Acceso Administrador</option>';
					    	$TiendasSession = unserialize($_SESSION["TIENDAS"]);
						    	foreach ($TiendasSession as $key => $value) {
						    		echo '<option value="'.$key.'"> '.$key.' - '.$value.'</option>';
						    	}
						    echo '</select>';
						    echo '<span class="errValidacion">Seleccione una tienda</span>';
							  echo '</div>';
							 ?>
							</div>
						</fieldset>
					</div>
				</form>
			  <div class="col-xs-12 control-btn confInsert" >
		  		<div class="col-xs-6">
		  			<button class="btn btn-success" disabled><span class="glyphicon glyphicon-ok"></span></button>
		  		</div>
		  		<div class="col-xs-6">
		  			<button class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></button>
		  		</div>
			  </div>
			</div>

			<div class="row" id="resultadoBusquedaElementos">
				<h2 class="col-xs-10 col-xs-offset-1"><span class="glyphicon glyphicon-chevron-down"></span> Resultado Búsqueda
			</div>

			<div id="formsResaultadoBusqueda">
			<?php
			if(isset($_SESSION["listadoUsuarios"])  && !empty($_SESSION["listadoUsuarios"]) ){
				$usuarios = unserialize($_SESSION["listadoUsuarios"]);
				//Si hay usuarios listados los mostrara en su formulario, sino muestra que no existen usuarios
				if($usuarios && count($usuarios) > 0 && !empty($usuarios[0])){
					for ($i=0; $i < count($usuarios); $i++) { 
							$accesoUsuarios = $_SESSION["accesoTienda"];
							imprFormUsuario($usuarios[$i],$accesoUsuarios, $TiendasSession);
						}
				}else{
					echo "<div class='row'>";
					echo "<div class='col-xs-12'>";
					echo '<blockquote>
						  			<p class="bg-info" id="NoResult">No se encontraron usuarios...</p>
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
	<script type="text/javascript" src="../_recursos/js/validacionFormulario.js"></script>
	<script type="text/javascript" src="../_recursos/js/busquedasInputUsuario.js"></script>
</body>
</html>