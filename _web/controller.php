<?php
/*
Jaime Matas Asensio
Proyecto DAW: ShopSphere
I.E.S. Maestre de Calatrava - Ciudad Real
2018
*/
session_start();

//De esta forma evitamos que usuarios anonimos entren a esta parte de la aplicacion

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
require_once "../_modelo/daoProductos.php";
require_once "../_modelo/daoAcceso.php";

/*controlador*/

//Recuperamos la accion de la peticion
$accion = isset($_REQUEST["accion"]) ? $_REQUEST["accion"] : "";
/*
Esta variable es el motor del controlador, segun el valor que tome, el controlador realizara unas acciones u otras
*/
switch ( $accion ) {
	case 'nuevoRegistro' :
//Direccionamientos a NUEVOS_REGISTROS
		$_SESSION["nuevoRegistroSuscripcion"] = isset($_REQUEST["tSuscripcion"]) ? $_REQUEST["tSuscripcion"] : "";
		header("Location: ../_vistas/onWork.php");
		break;
	case 'login' :
//Direccionamientos a LOGIN
		//Recupera la operacion asociada a la accion de 'login'
		$operacion = isset($_REQUEST["operacion"]) ? $_REQUEST["operacion"] : "";
		//Direccionamientos segun la operacion para la accion 'LOGIN'
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
					$user = $daoUsuario->buscarUsuarioLogin($usuario);
					if($user){
						//Si existe el usuario, pasamos a la comprobacion de nombre y contraseña

						//Crecion del Hash de la contraseña para comparar con BBDD
						$ini = "-.^@#%{";
						$fin = "}%#@^.-";
						$pass = sha1($ini.$pass.$fin); 
						
						
						if($usuario == $user->__GET("nombre") && $pass == trim($user->__GET("password"))){
							//Si el usuario existe y la contraseña coincide creamos variables reaccionadas con el login
							$_SESSION["logDone"] = 1;
							$_SESSION["codUser"] = $user->__GET("codUsuario");
							$_SESSION["nivelAcceso"] = $user->__GET("nivelAcceso"); 

							//Segun el nivel de Acceso se enviara al usuario a una pagina de inicio u otra
							switch ($_SESSION["nivelAcceso"]) {
								case 'adm':
									//La pagina Inicial del Administrador sera el CRUD de tiendas
									//Recuperamos todas las tiendas ya que un usuario administrador tendra acceso a todas
									$daoTienda = new daoTiendas();
									$daoTienda->listarTiendas();
									$tiendas = $daoTienda->result;
									$TIENDAS = array();
									for( $i = 0; $i < count($tiendas) ; $i++){
										$TIENDAS[ $tiendas[$i]->__GET("codTienda") ] = $tiendas[$i]->__GET("nombre");
									}
									//Variablas necesarias para el mantenimento de tablas especificas de cada tienda
									$_SESSION["TIENDAS"] = serialize($TIENDAS);

									//Listado inicial de Tiendas
									$_SESSION["listadoTiendas"] = serialize($tiendas);
									//redireccion a la pagina inicial del usuario con sus variables de login
									header("Location: ../_vistas/tienda.php");
									break;
								case 'gen':
									//La pagina de inicio de los gerentes sean las alertas
									//Recuperamos el codTienda a la que tiene acceso el usuario
									$daoAcceso = new daoAcceso();
									$codTiendaAcceso = $daoAcceso->buscarAccesoPorCodUsuario($_SESSION["codUser"]);
									//Almacenamos la tienda en la variable de sesion
									$daoTiendas = new daoTiendas();
									$tiendaAcceso = $daoTiendas->buscarTienda($codTiendaAcceso->__GET("codTienda"));
									
									$TIENDAS[ $tiendaAcceso->__GET("codTienda") ] = $tiendaAcceso->__GET("nombre");
									$_SESSION["TIENDAS"] = serialize($TIENDAS);

									//Guardamos el nombre de la tienda para mostrarsela al usuario
									$nombreTienda = $tiendaAcceso->__GET("nombre");
									$_SESSION["nombreTienda"] = $nombreTienda;
									
									//Instancia del modelo para alertas
				 					$daoProductos = new daoProductos();

									//Obtenemos los datos en la precarga de alertas
									$TiendasSession = unserialize($_SESSION["TIENDAS"]);
						 			$daoProductos->alertaProductos(key($TiendasSession));
						 			

						 			//Obtenemos el listado de alertas para la vista alerta
									$_SESSION["listadoAlertas"] = serialize($daoProductos->result);

									//redireccion a la pagina de proveedores
									header("Location: ../_vistas/alertas.php");
									
									break;
								case 'emp':
									//La pagina de inicio de los empleados seran los productos
									//Recuperamos el codTienda a la que tiene acceso el usuario
									$daoAcceso = new daoAcceso();
									$codTiendaAcceso = $daoAcceso->buscarAccesoPorCodUsuario($_SESSION["codUser"]);
									//Almacenamos la tienda en la variable de sesion
									$daoTiendas = new daoTiendas();
									$tiendaAcceso = $daoTiendas->buscarTienda($codTiendaAcceso->__GET("codTienda"));
									
									$TIENDAS[ $tiendaAcceso->__GET("codTienda") ] = $tiendaAcceso->__GET("nombre");
									$_SESSION["TIENDAS"] = serialize($TIENDAS);

									//Guardamos el nombre de la tienda para mostrarsela al usuario
									$nombreTienda = $tiendaAcceso->__GET("nombre");
									$_SESSION["nombreTienda"] = $nombreTienda;
									
									//Instancia del modelo para alertas
				 					$daoProductos = new daoProductos();

									//Obtenemos los datos en la precarga de alertas
									$TiendasSession = unserialize($_SESSION["TIENDAS"]);
						 			$daoProductos->listarProductos(key($TiendasSession));
						 			

						 			//Obtenemos el listado de alertas para la vista alerta
									$_SESSION["listadoProductos"] = serialize($daoProductos->result);

									//redireccion a la pagina de proveedores
									header("Location: ../_vistas/producto.php");
									
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
				//Eliminamos las variables de sesion
				$_SESSION["logDone"] = 0;
				$_SESSION["codUser"] = "";
				$_SESSION["nivelAcceso"] = ""; 
				
				session_unset();
				session_destroy();
				header("Location: ../index.php");
		    break;
			//En caso de no recocer la operacion esta seccion del switch llevara a una pagina de error
			default:
				echo "accion sent '$accion' ; unknown operacion '$operacion'";
				break;
		}
		// FIN -SWITCH ACCION = login, operacion = Interacciones con el login
		break;

	case 'move':
//Direccionamiento de los enlaces en Pie y cabecera de las vistas 
		//Recupera la operacion asociada a la accion de 'move'
		$operacion = isset($_REQUEST["operacion"]) ? $_REQUEST["operacion"] : "" ;
		//Direccionamientos segun la operacion para la accion de 'MOVE'
		switch ($operacion) {
			case 'tiendas': 
			//Carga de valores predeterminados para la vista de tiendas. Vista exclusiva del administrador
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
			case 'usuarios':
			//Carga de valores predeterminados para la vista de usuarios. Vista exclusiva del administrador
				if (isset($_SESSION["logDone"]) && !empty($_SESSION["logDone"]) && $_SESSION["logDone"] == 1 ){
				 		//Insatancia del modelo de datos de usuario
				 		$daoUsuarios = new daoUsuarios();
				 		//Consulta del listado de usuarios
						$daoUsuarios->listarUsuarios();
						//Almacenamiento del resultade
						$usuarios = $daoUsuarios->result;
						$_SESSION["listadoUsuarios"] = serialize($usuarios);
						//Instanciacion del modelo de datos de Acceso
						$daoAcceso = new daoAcceso();
				 		//Consulta del listado de acceso de usuarios
						$daoAcceso->listarAccesosUsuarios();
						//Almacenamiento del resultado, array[codUsuario] = codTienda
						$acceso = $daoAcceso->result[0];
						$_SESSION["accesoTienda"] = $acceso;
						//redireccion a la pagina de usuarios
						header("Location: ../_vistas/usuario.php");
				 }else{
				 	//Si no cumple ninguna de las condiciones, redirige al index
				 	header("Location: ../index.php");
				 }
				break;
			case 'empleados':
			//Carga de valores predeterminados para la vista de empleados. Vista accesible a usuarios 'Administrador' y 'Gerente'
				if (isset($_SESSION["logDone"]) && !empty($_SESSION["logDone"]) && $_SESSION["logDone"] == 1 ){
				 		//Instancia del modelo para empleados
				 		$daoEmpleados = new daoEmpleados();
				 		//Si se ha echo una seleccion de la tienda [solo administrador], recuperamos la clave enviada
				 		$selectTienda = isset($_REQUEST["selectTienda"]) && !empty($_REQUEST["selectTienda"]) ? $_REQUEST["selectTienda"] : false ;
				 		 
				 		if($selectTienda){
				 			//Lista los empleados que pertenezcan a una tienda determinada
				 			//echo "Codigo Tienda Seleccionada : ".$selectTienda;
				 			$daoEmpleados->listarEmpleados($selectTienda);
				 			$_SESSION["selectTienda"] = $selectTienda;
				 		}else{
				 			//Si es la primera vez que el usuario se mueve a esta vista, cargara la unica tienda para usuarios [Gerente] y la primera tienda para usuarios [Administrador]
				 			$TiendasSession = unserialize($_SESSION["TIENDAS"]);
				 			$daoEmpleados->listarEmpleados(key($TiendasSession));
				 			$_SESSION["selectTienda"] = key($TiendasSession);
				 		}

				 		//Obtenemos el listado de empleados para la vista empleados
						$_SESSION["listadoEmpleados"] = serialize($daoEmpleados->result);
						//redireccion a la pagina de proveedores
						header("Location: ../_vistas/empleado.php");
				}else{
				 	//Si no cumple ninguna de las condiciones, redirige al index
				 	header("Location: ../index.php");
				 }	
				break;
			case 'proveedores':
			//Carga de valores predeterminados para la vista de proveedores. Vista accesible a usuarios todos los usuarios
				if (isset($_SESSION["logDone"]) && !empty($_SESSION["logDone"]) && $_SESSION["logDone"] == 1 ){
				 		$daoProveedores = new daoProveedores();
				 		//Desserializa $_SESSION["codTiendas"] para saber si es un array
				 		$TiendasSession = unserialize($_SESSION["TIENDAS"]);
				 		//Si se ha echo una seleccion de la tienda [solo administrador], recuperamos la clave enviada
				 		$selectTienda = isset($_REQUEST["selectTienda"]) && !empty($_REQUEST["selectTienda"]) ? $_REQUEST["selectTienda"] : false ;
				 		if ($selectTienda){
				 			//Lista los empleados que pertenezcan a una tienda determinada
				 			//echo "Codigo Tienda Seleccionada : ".$selectTienda;
				 			$daoProveedores->listarProveedores($selectTienda);
				 			$_SESSION["listadoProveedores"] = serialize($daoProveedores->result);
				 			$_SESSION["selectTienda"] = $selectTienda;
				 		}else{
				 			//Si es la primera vez que el usuario se mueve a esta vista, cargara la unica tienda para usuarios [Gerente] y la primera tienda para usuarios [Administrador]
					 		$daoProveedores->listarProveedores(key($TiendasSession));
							$_SESSION["listadoProveedores"] = serialize($daoProveedores->result);
							$_SESSION["selectTienda"] = key($TiendasSession);
				 		}

						//redireccion a la pagina de proveedores
						header("Location: ../_vistas/proveedor.php");
						
				 }else{
				 	//Si no cumple ninguna de las condiciones, redirige al index
				 	header("Location: ../index.php");
				 }
				break;
			case 'productos':
			//Carga valores predeterminados para la vista de productos.Vista accesible a todos los usuarios
				if (isset($_SESSION["logDone"]) && !empty($_SESSION["logDone"]) && $_SESSION["logDone"] == 1 ){
				 		//Instancia del modelo para productos
				 		$daoProductos = new daoProductos();
				 		//Si se ha echo una seleccion de la tienda [solo administrador], recuperamos la clave enviada
				 		$selectTienda = isset($_REQUEST["selectTienda"]) && !empty($_REQUEST["selectTienda"]) ? $_REQUEST["selectTienda"] : false ;
				 		 
				 		if($selectTienda){
				 			//Lista los empleados que pertenezcan a una tienda determinada
				 			//echo "Codigo Tienda Seleccionada : ".$selectTienda;
				 			$daoProductos->listarProductos($selectTienda);
				 			$_SESSION["selectTienda"] = $selectTienda;
				 		}else{
				 			//Si es la primera vez que el usuario se mueve a esta vista, cargara la unica tienda para usuarios [Gerente] y la primera tienda para usuarios [Administrador]
				 			$TiendasSession = unserialize($_SESSION["TIENDAS"]);
				 			$daoProductos->listarProductos(key($TiendasSession));
				 			$_SESSION["selectTienda"] = key($TiendasSession);
				 		}

				 		//Obtenemos el listado de productos para la vista producto
						$_SESSION["listadoProductos"] = serialize($daoProductos->result);
						//redireccion a la pagina de proveedores
						header("Location: ../_vistas/producto.php");
					}else{
				 		//Si no cumple ninguna de las condiciones, redirige al index
				 		header("Location: ../index.php");
				 	}
				break;
			case 'alertas':
			//Carga valores predeterminados para la vista de alertas.Vista accesible a todos los usuarios
					if (isset($_SESSION["logDone"]) && !empty($_SESSION["logDone"]) && $_SESSION["logDone"] == 1 ){
				 		//Instancia del modelo para alertas
				 		$daoProductos = new daoProductos();
				 		//Si se ha echo una seleccion de la tienda [solo administrador], recuperamos la clave enviada
				 		$selectTienda = isset($_REQUEST["selectTienda"]) && !empty($_REQUEST["selectTienda"]) ? $_REQUEST["selectTienda"] : false ;
				 		 
				 		if($selectTienda){
				 			//Lista los empleados que pertenezcan a una tienda determinada
				 			//echo "Codigo Tienda Seleccionada : ".$selectTienda;
				 			$daoProductos->alertaProductos($selectTienda);
				 			$_SESSION["selectTienda"] = $selectTienda;
				 		}else{
				 			//Si es la primera vez que el usuario se mueve a esta vista, cargara la unica tienda para usuarios [Gerente] y la primera tienda para usuarios [Administrador]
				 			$TiendasSession = unserialize($_SESSION["TIENDAS"]);
				 			$daoProductos->alertaProductos(key($TiendasSession));
				 			$_SESSION["selectTienda"] = key($TiendasSession);
				 		}

				 		//Obtenemos el listado de empleados para la vista empleados
						$_SESSION["listadoAlertas"] = serialize($daoProductos->result);
						//redireccion a la pagina de proveedores
						header("Location: ../_vistas/alertas.php");
					}else{
				 		//Si no cumple ninguna de las condiciones, redirige al index
				 		header("Location: ../index.php");
				 	}
				break;
			default:
			echo "Accion sent: $accion, unknown destiny ' $to ' ";
				break;
		}
		// FIN - SWITCH ACCION = move, Operacion = redirecciones a vistas
		break;
	case 'mantenimentoTiendas':
//CRUD de Tiendas
		$operacion = $_REQUEST["operacion"] ? $_REQUEST["operacion"] : "";
		switch ($operacion) {
			//Accion de UPDATE sobre la tabla de tiendas
			case 'modificacion':
			//Operacion de MODIFICACION sobre la tabla de tiendas
				//Obtenemos el JSON enviado por AJAX
				$datos = isset($_REQUEST["json"]) ? $_REQUEST["json"] : "";
				//Decodificamos el JSON para que sea un array asociativo
				$datos = json_decode($datos,true);
				//Instanciamos un objeto de tienda
				$updateTienda = new tienda();
				foreach ($datos as $key => $value) {
					$updateTienda->__SET($key,$value);
				}
				//Instancia del modelo de datos
				$daoTiendas = new daoTiendas();
				//Actualizamos los datos de tienda
				$daoTiendas->actualizarTienda($updateTienda);
				//Buscamos la tienda actualizada
				$returnTienda = $daoTiendas->buscarTienda($updateTienda->__GET("codTienda"));
				//Creamos un array asociativo para convertirlo a JSON
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
				//Codificacion y devolucion del JSON - solo necesita un echo :D
				echo json_encode($returnTienda);

				break;

			case 'alta':
			//Operacion de ALTA sobre la tabla de tiendas
				//Obtenemos el JSON enviado por AJAX
				$datos = isset($_REQUEST["json"]) ? $_REQUEST["json"] : "";
				//Decodificamos el JSON para que sea un array asociativo
				$datos = json_decode($datos,true);
				//Instanciamos un objeto de tienda
				$insertTienda = new tienda();
				foreach ($datos as $key => $value) {
					$insertTienda->__SET($key,$value);
				}
				//Instancia del modelo de datos--->Modificar funcion de insertar tienda para que cree tablas
				$daoTiendas = new daoTiendas();
				//Generamos un nuevo codigo de tienda basandonos en el ultimo codigo
				$codTiendaNuevo = $daoTiendas->obtenerUltimoCodigo();//
				$codTiendaNuevo++;
				//Añadimos el nuevo codigo al objeto de tienda
				$insertTienda->__SET("codTienda", $codTiendaNuevo);

				//Insertamos el registro de la nueva tienda en la tabla de tiendas y las tablas que necesita
				$daoTiendas->insertarTienda($insertTienda);

				//retorno AJAX
				$returnTienda = array(
					"codTienda" => $insertTienda->__GET("codTienda"),
					"nombre" => $insertTienda->__GET("nombre"),
					"tipoSuscripcion" => $insertTienda->__GET("tipoSuscripcion"),
					"msgReturn" => "Nueva tienda Creada con exito"
				);
				//Codificacion y devolucion del JSON - solo necesita un echo :D
				echo json_encode($returnTienda);
				
				break;

			case 'baja':
			//Operacion de BAJA sobre la tabla de tiendas
				//Obtenemos el JSON enviado por AJAX
				$datos = isset($_REQUEST["json"]) ? $_REQUEST["json"] : "";
				//Decodificamos el JSON para que sea un array asociativo
				$datos = json_decode($datos,true);
				//Instanciamos el modelo de datos de tienda
				$daoTiendas = new daoTiendas();
				//Borramos la tienda y todas las tablas, usuarios y accesos relaccionada con esta
				$daoTiendas->eliminarTienda($datos["codTienda"]);

				$retornoDelete = array("msgReturn" => "Tienda con codigo: ' ".$datos["codTienda"]." '  eliminada del sistema");

				echo json_encode($retornoDelete);
				break;
			
			case 'buscar':
			//Operacion de busqueda sobre la tabla de tiendas
				//Recepcion de los parametros de busqueda
				$tipoBusqueda = $_REQUEST["tBusqueda"];
				$stringBusqueda = $_REQUEST["busqueda"];
				$selectBusqueda = $_REQUEST["selBusqueda"];
				//Recuperacion de variables IMPROTANTES para la sesion
				$_SESSION["nivelAcceso"] = $_REQUEST["nAcceso"];
				$_SESSION["logDone"] = $_REQUEST["logDone"];
				//echo "Tipode Busqueda : $tipoBusqueda ;Busqueda por Nombre/cod: $stringBusqueda ;Busqueda por suscripcion: $selectBusqueda <br>";
				//Tipos de busqueda para la vista de TIENDAS
				switch ($tipoBusqueda) {
					case 'codTienda':
						//Instancia del modelo de datos
						$daoTiendas = new daoTiendas();
						//Buscamos Tienda por codigo
						$tienda=$daoTiendas->buscarTienda($stringBusqueda);
						//Se carga el resultado de la consulta en un array 
						$tiendas[] = $tienda;

						//Se almacena el array en la variable de sesion de listado de tiendas
						$_SESSION["listadoTiendas"] = serialize($tiendas);
						//Redireccion a la vista con los datos de consulta
						header("Location: ../_vistas/tienda.php");
						break;
					case 'nombre':
						//Instancia del modelo de datos
						$daoTiendas = new daoTiendas();
						//Añadimos caracteres comodin a la consulta
						$stringBusqueda = "%".$stringBusqueda."%";
						$daoTiendas->buscarTiendaPorNombre($stringBusqueda);
						//Se almacena el array de la consulta en la variable de session de listado de tiendas
						$_SESSION["listadoTiendas"] = serialize($daoTiendas->result);
						//Redireccion a la vista con los datos de la consulta
						header("Location: ../_vistas/tienda.php");
						break;
					case 'tsuscripcion':
						//Instancia del modelo de datos
						$daoTiendas = new daoTiendas();
						//Buscamos
						$daoTiendas->buscarTiendaPorSuscripcion($selectBusqueda);
						//Se almacena el array de la consulta en la variable de session de listado de tiendas
						$daoTiendas->result;
						$_SESSION["listadoTiendas"] = serialize($daoTiendas->result);
						//Redireccion a la vista de tienda con los datos de la consulta
						header("Location: ../_vistas/tienda.php");
						break;
					
					default:
						//Encaso de forzar un fallo en el filtro de la busqueda estara esta opcion
						//Se carga un resultado de consulta vacia en un array 
						$tiendas[] = 0;

						//Se almacena el array en la consulta vacia
						$_SESSION["listadoTiendas"] = serialize($tiendas);
						header("Location: ../_vistas/tienda.php");
						break;
				}
				// FIN - SWITCH ACCION = mantenimientoTiendas, OPERACION = buscar, TIPO_BUSQUEDA = Opciones de busqueda en la vista de tiendas

				break;
			
			default:
				echo "Accion sent: $accion, unknown operacion ' $operacion ' ";
				break;
			//FIN - SWITCH accion = mantenimientoTiendas
		}
		break;
		// FIN - SWITCH ACCION = mantenimientoTiendas, OPERACION ----> CRUD
	case 'mantenimentoUsuario':
//CRUD de Usuarios-Acceso
		$operacion = $_REQUEST["operacion"] ? $_REQUEST["operacion"] : "";
		switch ($operacion) {
			//operacion de MODIFICACION sobre la tabla de usuarios
			case 'modificacion':
			//Operacion de MODIFICACION sobre la tabla de usuarios
				//Obtenemos el JSON enviado por AJAX
				$datos = isset($_REQUEST["json"]) ? $_REQUEST["json"] : "";			
				//Decodificamos el JSON para que sea un array asociativo
				$datos = json_decode($datos,true);
				//Instanciamos un objeto de USUARIO
				$updateUsuario = new usuario();
				//Recorremos el array asociativo del objeto JSON tomando los valores relacionados con la tabla usuario
				foreach ($datos as $key => $value) {
					if($key != "acceso"){
						$updateUsuario->__SET($key,$value);
					}
				}
				//Instanciamos el modelo de datos de usuario
				$daoUsuarios = new daoUsuarios();
				//Comprobamos si la contraseña ha cambiado
				$testPassword = $daoUsuarios->buscarUsuario($updateUsuario->__GET("codUsuario"));
				// si la contraseña enviada es distinta de la almacenada en la tabla...
				if($testPassword->__GET("password") != $updateUsuario->__GET("password")){
						//... componemos el Hash sobre la nueva contraseña y la codificamos con sha1
						$ini = "-.^@#%{";
						$fin = "}%#@^.-";
						$pass = sha1($ini.$updateUsuario->__GET("password").$fin);
						$updateUsuario->__SET("password",$pass);
				}
				//Creamos la variable updatedAcceso
				$updatedAcceso = "";
				//Instanciamos un objeto de ACCESO
				$updateAcceso = new acceso();
				//Controlamos la modificacion de usuarios con nivel de acceso Administrador
				if($datos["acceso"] != 0){
					//Recorremos el array asociativo del objeto JSON tomando los valores relacionados con la tabla de acceso
					foreach ($datos as $key => $value) {
						//En funcion del valor de la key, asignamos un valor u otro al objeto de acceso
						switch ($key) {
							case 'codUsuario':
								$updateAcceso->__SET("codUsuario", $value);
								break;
							case 'acceso':
								$updateAcceso->__SET("codTienda", $value);
								break;
						}
					}
					//Instancia del modelo de datos para acceso
					$daoAcceso = new daoAcceso();
					//Actualizamos los datos del acceso
					$daoAcceso->actualizarAcceso($updateAcceso);
					//Instancia del modelo de datos para acceso
					$daoAcceso = new daoAcceso();
					//Buscamos su acceso asociado
					$updatedAcceso = $daoAcceso->buscarAccesoPorCodUsuario($updateUsuario->__GET("codUsuario"));
				}else{
					//instancioamos updatedAcceso como un objeto
					$updatedAcceso = new acceso();
					//Si es un usuario administrador creado, su codigo de tienda de acceso siempre sera 0
					$updatedAcceso->__SET("codUsuario", $updateUsuario->__GET("codUsuario"));
					$updatedAcceso->__SET("codTienda", 0);
				}
				
				//Instancia del modelo de datos para usuario
				$daoUsuarios = new daoUsuarios($updateUsuario);
				//Actualizamos los datos de usuario
				$daoUsuarios->actualizarUsuario($updateUsuario);
				//Buscamos el usuario actualizado y su acceso
				$updatedUsuario = $daoUsuarios->buscarUsuario($updateUsuario->__GET("codUsuario"));
				//Creamos un array asociativo para convertirlo a JSON
				$returnUsuario = array(
					"codUsuario" => $updatedUsuario->__GET("codUsuario"),
					"nombre" => $updatedUsuario->__GET("nombre"),
					"email" => $updatedUsuario->__GET("email"),
					"password" => $updatedUsuario->__GET("password"),
					"nivelAcceso" => $updatedUsuario->__GET("nivelAcceso"),
					"acceso" => $updatedAcceso->__GET("codTienda"),
					"msgReturn" => "Modificacion completada con exito"
				);
				//Codificacion y devolucion del JSON del USUARIO-ACCESO - solo necesita un echo :D
				echo json_encode($returnUsuario);
				
				break;
				
			case 'alta':
			//Operacion de ALTA sobre la tabla de usuarios
				//Obtenemos el JSON enviado por AJAX
				$datos = isset($_REQUEST["json"]) ? $_REQUEST["json"] : 0;
				//Decodificamos el JSON para que sea un array asociativo
				$datos = json_decode($datos,true);
				//Instanciamos un objeto de USUARIO
				$insertUsuario = new usuario();
				//Recorremos el array asociativo del objeto JSON tomando los valores relacionados con la tabla usuario
				foreach ($datos as $key => $value) {
					if($key != "acceso"){
						$insertUsuario->__SET($key,$value);
					}
				}
				//Instanciamos el modelo de datos de usuario
				$daoUsuarios = new daoUsuarios();
				//Obtenemos la ultima clave de usuario
				$ultimoCodUsuario = $daoUsuarios->obtenerUltimoCodigo();
				//La añadimos al objeto antes de insertarlo
				$ultimoCodUsuario++;
				$insertUsuario->__SET("codUsuario", $ultimoCodUsuario);
				//En funcion del tipo de acceso insertamos el acceso
				//Si el nivel de acceso es distinto del de administrador, insertamos en tabla de acceso
				if($datos["acceso"] != 0){
					//Instanciamos un objeto de ACCESO
					$insertAcceso = new acceso();
					//Tomamos el valor del codigo de tienda del acceso del JSON
					$insertAcceso->__SET("codTienda", $datos["acceso"]);
					//Tomamos el codigo de usuario nuevo
					$insertAcceso->__SET("codUsuario", $insertUsuario->__GET("codUsuario"));
					//Instancia del modelo de datos para acceso
					$daoAcceso = new daoAcceso();
					//Insertamos el acceso para usuarios distintos al de administrador
					$daoAcceso->insertarAcceso($insertAcceso);
				}
				//Insertamos el nuevo Usuario
				$daoUsuarios->insertarUsuario($insertUsuario);
				//Buscamos el usuario insertado 
				$updatedUsuario = $daoUsuarios->buscarUsuario($insertUsuario->__GET("codUsuario"));
				//retorno AJAX
				$returnUsuario = array(
					"codUsuario" => $updatedUsuario->__GET("codUsuario"),
					"nombre" => $updatedUsuario->__GET("nombre"),
					"nivelAcceso" => $updatedUsuario->__GET("nivelAcceso"),
					"msgReturn" => "Nueva Usuario creado con exito"
				);
				//Codificacion y devolucion del JSON - solo necesita un echo :D
				echo json_encode($returnUsuario);
				
				break;
				
			case 'baja':
			//Operacion de BAJA sobre la tabla de usuarios
				//Obtenemos el JSON enviado por AJAX
				$datos = isset($_REQUEST["json"]) ? $_REQUEST["json"] : "";
				//Decodificamos el JSON para que sea un array asociativo
				$datos = json_decode($datos,true);
				//Instanciamos el modelo de datos de usuario
				$daoUsuarios = new daoUsuarios();
				//Borramos al usuario de la tabla de usuario
				$daoUsuarios->eliminarUsuario($datos["codUsuario"]);
				//Instanciamos el modelo de datos de acceso
				$daoAcceso = new daoAcceso();
				//Borramos el acceso para este usuario
				$daoAcceso->eliminarAcceso($datos["codUsuario"]);

				$retornoDelete = array("msgReturn" => "Usuario con codigo: ' ".$datos["codUsuario"]." '  eliminado del sistema");

				echo json_encode($retornoDelete);
				break;
				
			//Busquedas de tienda por distintos parametros
			case 'buscar':
			//Operacion de busqueda sobre la tabla de usuario
				//Recepcion de los parametros de busqueda
				$tipoBusqueda = $_REQUEST["tBusqueda"];
				$stringBusqueda = $_REQUEST["busqueda"];
				//Recuperacion de variables IMPROTANTES para la sesion
				$_SESSION["nivelAcceso"] = $_REQUEST["nAcceso"];
				$_SESSION["logDone"] = $_REQUEST["logDone"];
				echo "Tipode Busqueda : $tipoBusqueda ;Busqueda por Nombre/cod: $stringBusqueda  <br>";
				//Tipos de Busqueda para la vista USUARIOS
				switch ($tipoBusqueda) {
					case 'codUsuario':
						//Insatancia del modelo de datos de usuario
				 		$daoUsuarios = new daoUsuarios();
				 		//Consulta busqueda de usuario por codigo
				 		$usuarios = array();
						$usuarios[] = $daoUsuarios->buscarUsuario($stringBusqueda);
						//Serializamos el resultado de busqueda
						$_SESSION["listadoUsuarios"] = serialize($usuarios);
						//Instanciacion del modelo de datos de Acceso
						$daoAcceso = new daoAcceso();
				 		//Consulta del listado de acceso de usuarios
						$daoAcceso->listarAccesosUsuarios();
						//Almacenamiento del resultado, array[codUsuario] = codTienda
						$acceso = $daoAcceso->result[0];
						$_SESSION["accesoTienda"] = $acceso;
						//redireccion a la pagina de usuarios
						header("Location: ../_vistas/usuario.php");
						break;
					case 'nombre':
						//Insatancia del modelo de datos de usuario
				 		$daoUsuarios = new daoUsuarios();
				 		//Consulta busqueda de usuario por nombre	
				 		$stringBusqueda = "%".$stringBusqueda."%";			 		
						$daoUsuarios->buscarUsuarioPorNombre($stringBusqueda);
						$usuarios = $daoUsuarios->result;
						//Serializamos el resultado de busqueda
						$_SESSION["listadoUsuarios"] = serialize($usuarios);
						//Instanciacion del modelo de datos de Acceso
						$daoAcceso = new daoAcceso();
				 		//Consulta del listado de acceso de usuarios
						$daoAcceso->listarAccesosUsuarios();
						//Almacenamiento del resultado, array[codUsuario] = codTienda
						$acceso = $daoAcceso->result[0];
						$_SESSION["accesoTienda"] = $acceso;
						//redireccion a la pagina de usuarios
						header("Location: ../_vistas/usuario.php");
						break;
					
					default:
						//Encaso de forzar un fallo en el filtro de la busqueda estara esta opcion
						//Se carga un resultado de consulta vacia 
						$usuarios[] = 0;

						//Se almacena el array en la consulta vacia
						$_SESSION["listadoUsuarios"] = serialize($usuarios);
						header("Location: ../_vistas/usuarios.php");
						break;
				}
				// FIN - SWITCH ACCION = mantenimientoTiendas, OPERACION = buscar, TIPO_BUSQUEDA = busquedas para la vista de

				break;
			default:
				echo "Accion sent: $accion, unknown operacion ' $operacion ' ";
				break;
		}
		break;
		// FIN - SWITCH ACCION = mantenimientoUsuario, OPERACION----> CRUD
	default:
		echo "unknown ACCION sent ' $accion ' ";
		break;
	//FIN - SWITCH - ACCION
}



?>