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
			<h1>Sistema alertas</h1>
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
		<div class="row alertasProductos">
			<h3 class="col-xs-12">Producto - 'codProducto'</h3>
			<div class="col-xs-12 imgAlerta">
				<div>
					<img src="../_recursos/img/nuevoProducto.png" alt="Imagen de nuevo producto">
				</div>
			</div>
			<div class="col-xs-12 itemAlerta">
				<p class="text-info">Nombre: Nombre Producto</p>
				<p class="text-info">Referencia: Nombre Producto</p>
				<p class="text-info">Cantidad: Nombre Producto</p>
				<p class="text-danger">Estado: Agotado</p>
			</div>
			<div class=" controlAlerta">
				<button class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span></button>
			</div>
		</div>
		
		<div class="row alertasProductos">
			<h3 class="col-xs-12">Producto - 'codProducto'</h3>
			<div class="col-xs-12 imgAlerta">
				<div>
					<img src="../_recursos/img/nuevoProducto.png" alt="Imagen de nuevo producto">
				</div>
			</div>
			<div class="col-xs-12 itemAlerta">
				<p class="text-info">Nombre: Nombre Producto</p>
				<p class="text-info">Referencia: Nombre Producto</p>
				<p class="text-info">Cantidad: Nombre Producto</p>
				<p class="text-warning">Estado: Pocas unidades</p>
			</div>
			<div class=" controlAlerta">
				<button class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span></button>
			</div>
		</div>
			

		</main>
	</div>
	<?php	include "pieVistas.php";	?>
	<script type="text/javascript" src="../_recursos/js/bootstrap.min.js" charset="utf-8"></script>
</body>
</html>