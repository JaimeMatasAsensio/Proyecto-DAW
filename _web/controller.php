<?php
/*entidades*/


/*modelos*/


/*controlador*/
session_start();

$accion = $_REQUEST["accion"];

switch ($accion) {
	case 'nuevoRegistro' :
		$_SESSION["nuevoRegistroSuscripcion"] = isset($_REQUEST["tSuscripcion"]) ? $_REQUEST["tSuscripcion"] : "";
		header("Location: ../_vistas/nuevoRegistro.php");
		break;
	case 'login' :
		$_SESSION["login"] = isset($_REQUEST["login"]) ? $_REQUEST["login"] : "";
		header("Location: ../_vistas/login.php");
		break;
	default:
		# code...
		break;
}



?>