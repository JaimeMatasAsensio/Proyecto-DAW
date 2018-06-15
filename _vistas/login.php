<?php
/*
Jaime Matas Asensio
Proyecto DAW: ShopSphere
I.E.S. Maestre de Calatrava - Ciudad Real
2018
*/
session_start();

if(isset($_SESSION["codUser"]) && !empty($_SESSION["codUser"]) &&
 isset($_SESSION["nivelAcceso"]) && !empty($_SESSION["nivelAcceso"]) &&
	isset($_SESSION["logDone"]) && !empty($_SESSION["logDone"]) && $_SESSION["logDone"] == 1){
	switch ($_SESSION["nivelAcceso"]) {
		case "adm" :
			header("Location: ../_vistas/tienda.php");
			break;
		case "gen" :
			header("Location: ../_vistas/alertas.php");
			break;
		case "emp" :
			header("Location: ../_vistas/producto.php");
			break;

	}
	//Redireccion de usuarios en caso de que hagan login y retorno
}
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
	<?php include "cabeceraVistas.php"; ?>
	<div class="container-fluid">
		<main class="container">
			<div class="row indexCont">
				<h2 id="login"> ShopSphere </h2>
			</div>
			<div class="row formulario" id="formularioLogin">
				<form action="../_web/controller.php?accion=login&operacion=validarLogin" method="post">
					<div class="col-xs-12 col-sm-12">
						<fieldset>
							<legend>Acceso</legend>
							<div class="form-group">
						    <label for="nombreUsuario">Nombre de Usuario</label>
						    <input type="text" class="form-control" name="nombreUsuario" id="nombreUsuario" placeholder="Nombre de Usuario" maxlength="30">
						  </div>
						  <div class="form-group">
						    <label for="passUsuario">Password</label>
						    <input type="password" class="form-control" name="passUsuario" id="passUsuario" placeholder="Contraseña de usuario" maxlength="30">
						  </div>
						</fieldset>
					</div>
					<div class="col-xs-12" id="enlaceRecuperacion">
						<a href="onWork.php"><p class="bg-info border-shopShpere-xs">¿Olvido su contraseña?</p></a>
						<a href="onWork.php"><p class="bg-info border-shopShpere-xs">¿Olvido su usuario?</p></a>
					</div>
					<?php
					if(isset($_SESSION["logDone"]) && $_SESSION["logDone"] == -1){
						echo "<div class='col-xs-12' id='infoLogin'>";
						echo "<p class='bg-danger border-shopShpere-xs'>Usuario y contraseña incorrectos</p>";
						echo "</div>";
					}
					?>					
				</form>
				<div class="col-xs-12">
					<button class="btn btn-success" id="doLogin" name="doLogin"><span class="glyphicon glyphicon-ok"></span></button>
					<button class="btn btn-danger" id=cancelLogin name="cancelLogin"><span class="glyphicon glyphicon-remove"></span></button>
				</div>
				
			</div>
		</main>
	</div>
	<?php	include "pieVistas.php";	?>
	<script type="text/javascript" src="../_recursos/js/bootstrap.min.js" charset="utf-8"></script>
	<script type="text/javascript" src="../_recursos/js/formularioLogin.js" charset="utf-8"></script>
</body>
</html>