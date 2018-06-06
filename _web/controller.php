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

$accion = isset($_REQUEST["accion"]) ? $_REQUEST["accion"] : "";

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
				//Crecion del Hash de la contraseña para comparar con BBDD
				$ini = "-.^@#%{";
				$fin = "}%#@^.-";
				$pass = sha1($ini.$pass.$fin); 
				

				if($usuario == $user->__GET("nombre") && $pass == trim($user->__GET("password"))){
					
					$_SESSION["logDone"] = 1;
					$_SESSION["codUser"] = $user->__GET("codUsuario");
					$_SESSION["nivelAcceso"] = $user->__GET("nivelAcceso"); 

					//Segun el nivel de Acceso se enviara al usuario a una pagina de inicio u otra
					switch ($_SESSION["nivelAcceso"]) {
						case 'adm':
							//La pagina Inicial del Administrador seran las tiendas
							$daoTienda = new daoTiendas();
							$daoTienda->listarTiendas();
							$tiendas = $daoTienda->result;
							$codTiendas = array();
							$nombreTiendas = array();
							for( $i = 0; $i < count($tiendas) ; $i++){
								$codTiendas[] = $tiendas[$i]->__GET("codTienda");
								$nombreTiendas[] = $tiendas[$i]->__GET("codTienda");
							}
							
							//Variablas necesarias para el mantenimento de tablas especificas de cada tienda
							$_SESSION["codTiendas"] = serialize($codTiendas);
							$_SESSION["nombreTiendas"] = serialize($nombreTiendas);
							
							//Listado inicial de Tiendas
							$_SESSION["listadoTiendas"] = serialize($tiendas);
							header("Location: ../_vistas/tienda.php");
							break;
						case 'gen':
							echo "Acceso para gerente";
							break;
						case 'emp':
							echo "Acceso para empleado";
							break;
						default:
							echo "accion sent $accion, unknown levelAccess ' ".$_SESSION["nivelAcceso"]." '";
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
	case 'logoff':
		//Cierre de sesion del usuario
		session_unset();
		session_destroy();
		header("Location: ../index.php");
		break;
	case 'move':
		//Direccionamiento de los enlaces en Pie y cabecera de las vistas
		$to = isset($_REQUEST["to"]) ? $_REQUEST["to"] : "" ;
		switch ($to) {
			case 'tiendas':
				
				break;
			case 'usuarios':
				
				break;
			case 'empleados':
				
				break;
			case 'productos':
				
				break;
			case 'proveedores':
				
				break;
			case 'alertas':
				
				break;
			default:
			echo "Accion sent: $accion, unknown destiny ' $to ' ";
				break;
		}
		break;
	case 'mantenimentoTiendas':
		$operacion = $_REQUEST["operacion"] ? $_REQUEST["operacion"] : "";
		switch ($operacion) {
			case 'modificacion':
				$datos = isset($_REQUEST["json"]) ? $_REQUEST["json"] : "";
				$datos = json_decode($datos,true);
				$updateTienda = new tienda();
				foreach ($datos as $key => $value) {
					$updateTienda->__SET($key,$value);
				}

				$daoTiendas = new daoTiendas();
				$daoTiendas->actualizarTienda($updateTienda);
				$returnTienda = $daoTiendas->buscarTienda($updateTienda->__GET("codTienda"));
				
				$returnTienda = array(
					"codTienda" => $updateTienda->__GET("codTienda"),
					"nombre" => $updateTienda->__GET("nombre"),
					"pais" => $updateTienda->__GET("pais"),
					"provincia" => $updateTienda->__GET("provincia"),
					"poblacion" => $updateTienda->__GET("poblacion"),
					"direccion" => $updateTienda->__GET("direccion"),
					"numero" => $updateTienda->__GET("numero"),
					"telefono" => $updateTienda->__GET("telefono"),
					"movil" => $updateTienda->__GET("movil"),
					"email" => $updateTienda->__GET("email"),
					"tipoSuscripcion" => $updateTienda->__GET("tipoSuscripcion")
				);

				echo json_encode($returnTienda);

				break;

			case 'alta':
				
				break;

			case 'baja':
				
				break;

			case 'buscar':
				
				break;
			
			default:
				echo "Accion sent: $accion, unknown operacion ' $operacion ' ";
				break;
		}
		break;
	default:
		echo "unknown ACCION sent ' $accion ' ";
		break;
}



?>