<?php
session_start();
//Entidades y modelos necesarios para el funcionamiento del controlador
/*utilidad*/
require_once "imprForm.php";
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
require_once "../_modelo/daoProveedores.php";
require_once "../_modelo/daoEmpleados.php";

/*controlador*/

//Rutina de recuperacion de variables de usuario
//Iniciamos session

/*Estas variables estan reacionadas con el login y acceso del usuario se guardan antes de liberar todas las demas variables*/

//Recuperamos la accion de la peticion
$accion = isset($_REQUEST["accion"]) ? $_REQUEST["accion"] : "";
/*
Esta variable es el motor del controlador, segun el valor que tome, el controlador realizara unas acciones u otras
*/
switch ( $accion ) {
//Direccionamientos a nuevos registros
	case 'nuevoRegistro' :
		$_SESSION["nuevoRegistroSuscripcion"] = isset($_REQUEST["tSuscripcion"]) ? $_REQUEST["tSuscripcion"] : "";
		header("Location: ../_vistas/nuevoRegistro.php");
		break;
//Direccionamientos a login de usuario
	case 'login' :
		//Recupera la operacion asociada a la accion de 'login'
		$operacion = isset($_REQUEST["operacion"]) ? $_REQUEST["operacion"] : "";
		//Direccionamientos segun la operacion para la accion 'move'
		switch ($operacion) {
			//Redirije a la vista del formulario de login
			case 'doLogin' :
				header("Location: ../_vistas/login.php");
				break;
			//Rutina de acceso y redireccion a aplicacion o login 
			case "validarLogin" :

				if(isset($_POST["nombreUsuario"]) && isset($_POST["passUsuario"]) && 
					!(empty($_POST["nombreUsuario"])) && !(empty($_POST["passUsuario"]))){

					$usuario = $_POST["nombreUsuario"];
					$pass = $_POST["passUsuario"];
					$daoUsuario = new daoUsuarios();
		
					$user = $daoUsuario->buscarUsuarioPorNombre($usuario);
					if($user){
						//Si existe el usuario, pasamos a la comprobacion de nombre y contraseña

						//Crecion del Hash de la contraseña para comparar con BBDD
						$ini = "-.^@#%{";
						$fin = "}%#@^.-";
						$pass = sha1($ini.$pass.$fin); 
						

						if($usuario == $user->__GET("nombre") && $pass == trim($user->__GET("password"))){
							//Si el usuario existe y la contraseña coincide recuperamos variables reaccionadas con el login
							$_SESSION["logDone"] = 1;
							$_SESSION["codUser"] = $user->__GET("codUsuario");
							$_SESSION["nivelAcceso"] = $user->__GET("nivelAcceso"); 

							//Segun el nivel de Acceso se enviara al usuario a una pagina de inicio u otra
							switch ($_SESSION["nivelAcceso"]) {
								case 'adm':
									//La pagina Inicial del Administrador sera el CRUD de tiendas
									$daoTienda = new daoTiendas();
									$daoTienda->listarTiendas();
									$tiendas = $daoTienda->result;
									$TIENDAS = array();
									for( $i = 0; $i < count($tiendas) ; $i++){
										$TIENDAS[$tiendas[$i]->__GET("codTienda")] = $tiendas[$i]->__GET("nombre");
									}
									imprArray($TIENDAS);
									//Variablas necesarias para el mantenimento de tablas especificas de cada tienda
									$_SESSION["TIENDAS"] = serialize($TIENDAS);

									//Listado inicial de Tiendas
									$_SESSION["listadoTiendas"] = serialize($tiendas);
									//redireccion a la pagina inicial del usuario con sus variables de login
									header("Location: ../_vistas/tienda.php");
									break;
								case 'gen':
									//Acceso para el gerente
									break;
								case 'emp':
									//Acceso para el empleado
									break;
								default:
									echo "accion sent $accion, operacion sent '$operacion', unknown levelAccess ' ".$_SESSION["nivelAcceso"]." '";
									break;
							}

						}else{
							//Usuario y contraseña no existen
							$_SESSION["logDone"] = -1;
							header("Location: ../_vistas/login.php");		
						}
					}else{
						//no existe el usuario
						$_SESSION["logDone"] = -1;
						header("Location: ../_vistas/login.php");	
					}		
				}else{
					//El usuario ha enviado un formulario vacio
					$_SESSION["logDone"] = -1;
					header("Location: ../_vistas/login.php");
				}

				break;
			//Libera y destruye las variables de session. Redirije al usuario a la pagina inicial
			case 'logoff':
				session_unset();
				session_destroy();
				header("Location: ../index.php");
		    break;
			//En caso de no recocer la operacion esta seccion del switch llevara a una pagina de error
			default:
				echo "accion sent '$accion' ; unknown operacion '$operacion'";
				break;
		}
		break;
//Direccionamiento de los enlaces en Pie y cabecera de las vistas ... on process
	case 'move':
		//Recupera la operacion asociada a la accion de 'move'
		$operacion = isset($_REQUEST["operacion"]) ? $_REQUEST["operacion"] : "" ;
		//Direccionamientos segun la operacion para la accion de 'move'
		switch ($operacion) {
			//Carga de valores predeterminados para la vista de tiendas. Vista exclusiva del administrador
			case 'tiendas': 
				 //Si el login es existe, no esta vacio y es igual a '1' (login correcto)
				 if (isset($_SESSION["logDone"]) && !empty($_SESSION["logDone"]) && $_SESSION["logDone"] == 1 ){
				 		$daoTienda = new daoTiendas();
						$daoTienda->listarTiendas();
						$tiendas = $daoTienda->result;
						$_SESSION["listadoTiendas"] = serialize($tiendas);
						//redireccion a la pagina de tiendas
						header("Location: ../_vistas/tienda.php");
				 }else{
				 	//Si no cumple ninguna de las condiciones, redirige al index
				 	header("Location: ../index.php");
				 }
				break;
			//Carga de valores predeterminados para la vista de usuarios. Vista exclusiva del administrador
			case 'usuarios':
				if (isset($_SESSION["logDone"]) && !empty($_SESSION["logDone"]) && $_SESSION["logDone"] == 1 ){
				 		$daoUsuarios = new daoUsuarios();
						$daoUsuarios->listarUsuarios();
						$usuarios = $daoUsuarios->result;
						$_SESSION["listadoUsuarios"] = serialize($usuarios);
						//redireccion a la pagina de tiendas
						header("Location: ../_vistas/usuario.php");
				 }else{
				 	//Si no cumple ninguna de las condiciones, redirige al index
				 	header("Location: ../index.php");
				 }
				break;
			case 'empleados':
				if (isset($_SESSION["logDone"]) && !empty($_SESSION["logDone"]) && $_SESSION["logDone"] == 1 ){
				 		$daoEmpleados = new daoEmpleados();
				 		//Desserializa $_SESSION["codTiendas"] para saber si es un array
				 		$TiendasSession = unserialize($_SESSION["TIENDAS"]);
				 		$daoEmpleados->listarEmpleados(key($TiendasSession));

						$_SESSION["listadoEmpleados"] = serialize($daoEmpleados->result);
						//redireccion a la pagina de proveedores
						header("Location: ../_vistas/empleado.php");
				}else{
				 	//Si no cumple ninguna de las condiciones, redirige al index
				 	header("Location: ../index.php");
				 }	
				break;
			case 'proveedores':
			//Carga de valores predeterminados para la vista de proveedores. Vista accesible a usuarios 'Gerente' y 'Empleado'
				if (isset($_SESSION["logDone"]) && !empty($_SESSION["logDone"]) && $_SESSION["logDone"] == 1 ){
				 		$daoProveedores = new daoProveedores();
				 		//Desserializa $_SESSION["codTiendas"] para saber si es un array
				 		$TiendasSession = unserialize($_SESSION["TIENDAS"]);
				 		//
				 		$daoProveedores->listarProveedores(key($TiendasSession));
						$_SESSION["listadoProveedores"] = serialize($daoProveedores->result);
						//redireccion a la pagina de proveedores
						header("Location: ../_vistas/proveedor.php");
						
				 }else{
				 	//Si no cumple ninguna de las condiciones, redirige al index
				 	header("Location: ../index.php");
				 }
			break;
			case 'productos':
				
				break;
			case 'alertas':
				
				break;
			default:
			echo "Accion sent: $accion, unknown destiny ' $to ' ";
				break;
		}
		break;
//CRUD de Tiendas
	case 'mantenimentoTiendas':
		session_unset();
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
					"tipoSuscripcion" => $updateTienda->__GET("tipoSuscripcion"),
					"msgReturn" => "Modificacion completada con exito"
				);

				echo json_encode($returnTienda);

				break;

			case 'alta':
				
				break;

			case 'baja':
				
				break;

			case 'buscar':
				$tipoBusqueda = $_REQUEST["tBusqueda"];
				$paramBusqueda = $_REQUEST["busqueda"];
				echo "$tipoBusqueda ; $paramBusqueda";
				/*
				$daoTiendas = new daoTiendas();
				if($tipoBusqueda == "tsuscripcion"){
					$daoTiendas->buscarTiendaPorSuscripcion($paramBusqueda);
					$tiendas = $daoTiendas->result;
					$_SESSION["listadoTiendas"] = serialize($tiendas);
					//header("Location: ../_vistas/tienda.php");
				}
				if($tipoBusqueda == "nombre"){
					$paramBusqueda = "%".$paramBusqueda."%";
					$daoTiendas->buscarTiendaPorSuscripcion($paramBusqueda);
					$tiendas = $daoTiendas->result;
					$_SESSION["listadoTiendas"] = serialize($tiendas);
					//header("Location: ../_vistas/tienda.php");
				}
				if($tipoBusqueda == "codTienda"){
					$tiendas = $daoTiendas->buscarTienda($paramBusqueda);
					$_SESSION["listadoTiendas"] = serialize($tiendas);
					//header("Location: ../_vistas/tienda.php");
				}
				*/
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