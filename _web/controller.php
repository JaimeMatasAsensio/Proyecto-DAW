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
require_once "../_modelo/daoUsuarios.php";
require_once "../_modelo/daoTiendas.php";

/*controlador*/
session_start();

$accion = $_REQUEST["accion"];

switch ($accion) {
	case 'nuevoRegistro' :
		$_SESSION["nuevoRegistroSuscripcion"] = isset($_REQUEST["tSuscripcion"]) ? $_REQUEST["tSuscripcion"] : "";
		header("Location: ../_vistas/nuevoRegistro.php");
		break;

	case 'login' :
		if(isset($_SESSION["logDone"])){
			unset($_SESSION["logDone"]);
		}
		$_SESSION["login"] = isset($_REQUEST["login"]) ? $_REQUEST["login"] : "";
		header("Location: ../_vistas/login.php");
		break;

	case 'doLogin':
		if(isset($_POST["nombreUsuario"]) && isset($_POST["passUsuario"]) && !(empty($_POST["nombreUsuario"])) && !(empty($_POST["passUsuario"]))){
			$usuario = $_POST["nombreUsuario"];
			$pass = $_POST["passUsuario"];
			$daoUsuario = new daoUsuarios();
			
			$user = $daoUsuario->buscarUsuarioPorNombre($usuario);
			if($user){
				$ini = "-.^@#%{";
				$fin = "}%#@^.-";
				$pass = sha1($ini.$pass.$fin); 
				//echo "$pass:".trim($user->__GET("password")); 
				if($usuario == $user->__GET("nombre") && $pass == trim($user->__GET("password"))){
					$_SESSION["logDone"] = 1;
					$_SESSION["codUser"] = $user->__GET("codUsuario");
					$_SESSION["nivelAcceso"] = $user->__GET("nivelAcceso"); 

					switch ($_SESSION["nivelAcceso"]	) {
						case 'adm':
							//echo "Acceso para administrador";
							$daoTienda = new daoTiendas();
							$daoTienda->listarTiendas();
							$tiendas = $daoTienda->result;
							$codTiendas = array();
							$nombreTiendas = array();
							for( $i = 0; $i < count($tiendas) ; $i++){
								$codTiendas[] = $tiendas[$i]->__GET("codTienda");
								$codNombre[] = $tiendas[$i]->__GET("codTienda");
							}
							/*
							for( $i = 0; $i < count($codTiendas) ; $i++){
								echo "Codigo Tienda: " . $codTiendas[$i] ;
							}
							echo $tiendas[0]->toString();
							*/
							$_SESSION["codTiendas"] = serialize($codTiendas);
							$_SESSION["listadoTiendas"] = serialize($tiendas);
							header("Location: ../_vistas/tienda.php");
							break;
						case 'gen':
							echo "Acceso para gerente";
							break;
						case 'emp':
							echo "Acceso para empleado";
							break;
					}

				}else{
					$_SESSION["logDone"] = 0;
					header("Location: ../_vistas/login.php");		
				}
			}else{
				$_SESSION["logDone"] = 0;
				header("Location: ../_vistas/login.php");	
			}
			
		}else{
			$_SESSION["logDone"] = 0;
			header("Location: ../_vistas/login.php");
		}

		break;


	default:
		# code...
		break;
}



?>