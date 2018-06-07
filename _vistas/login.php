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
			<div class="row formulario" id="formularioLogin">
				<form action="../_web/controller.php?accion=doLogin" method="post">
					<div class="col-xs-12 col-sm-12">
						<fieldset>
							<legend>Acceso ShopSphere</legend>
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
						<a href="#">¿Olvido su contraseña?</a>
						<a href="#">¿Olvido su usuario?</a>
					</div>
					<?php
					if(isset($_SESSION["logDone"]) && $_SESSION["logDone"] == 0){
						echo "<div class='col-xs-12' id='infoLogin'>";
						echo "<p class='text-danger'>Usuario y contraseña incorrectos</p>";
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