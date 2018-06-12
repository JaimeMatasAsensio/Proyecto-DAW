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
							echo "<h3>Sistema de alertas</h3>";
					}
					if ($nivelAcc == "emp") {
							echo "<h1>".$_SESSION["nombreTienda"]."</h1>";
							echo "<h3>Sistema de alertas</h3>";
					}
				}
			}
			
			if( isset($_SESSION["nivelAcceso"]) && !empty($_SESSION["nivelAcceso"]) ){
				$nivelAcc = $_SESSION["nivelAcceso"];
				if ($nivelAcc == "adm") {
					
					echo "<h1>Sistema de alertas - Usuario Administrador</h1>";
					
					echo '<div class="row formulario formulario-crud" id="selectorTienda">';
					echo '<form action="../_web/controller.php?accion=move&operacion=alertas" method="post" class="form-inline">';
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
			//Murestra un formulario de seleccion de tiendas solo para el administrador
			if(isset($_SESSION["listadoAlertas"])  && !empty($_SESSION["listadoAlertas"]) ){
				
				$productos = unserialize($_SESSION["listadoAlertas"]);
				if($productos){
					echo "<div class='row'>";
					echo "<div class='col-xs-12'>";
					echo '<blockquote>
						  			<p class="bg-danger" id="NoResult"><span class="glyphicon glyphicon-alert"></span> Hay productos con stock minimo y/o agotados </p>
								</blockquote>';
					echo "</div'>";
					for ($i=0; $i < count($productos); $i++) { 
						imprAlertaProducto($productos[$i]);
					}
				}else{
					echo "<div class='row'>";
					echo "<div class='col-xs-12'>";
					echo '<blockquote>
						  			<p class="bg-primary" id="NoResult"><span class="glyphicon glyphicon-thumbs-up"></span> Sin alertas de Productos</p>
								</blockquote>';
					echo "</div'>";
				}
					
			}
			?>

		</main>
	</div>
	<?php	include "pieVistas.php";	?>
	<script type="text/javascript" src="../_recursos/js/bootstrap.min.js" charset="utf-8"></script>
</body>
</html>