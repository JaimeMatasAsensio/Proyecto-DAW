<?php
/*entidades*/


/*modelos*/


/*controlador*/
session_start();

$accion = $_REQUEST["accion"];

switch ($accion) {
	case 'nuevoRegistro':
		$_SESSION["nuevoRegistroSuscripcion"] = isset($_REQUEST["tSuscripcion"]) ? $_REQUEST["tSuscripcion"] : "";
		header("Location: ../_vistas/nuevoRegistro.php");
		break;
	
	default:
		# code...
		break;
}



?>