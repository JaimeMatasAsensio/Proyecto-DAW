<?php
/*entidades*/
require_once "../_entidad/classAcceso.php";
require_once "../_entidad/classEmpleado.php";
require_once "../_entidad/classProducto.php";
require_once "../_entidad/classProveedor.php";
require_once "../_entidad/classSuministro.php";
require_once "../_entidad/classTienda.php";
require_once "../_entidad/classUsuario.php";

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
	case 'doLogin':
		echo '... haciendo login';
		break;
	default:
		# code...
		break;
}



?>