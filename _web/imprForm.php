<?php
/*
Jaime Matas Asensio
Proyecto DAW: ShopSphere
I.E.S. Maestre de Calatrava - Ciudad Real
2018
*/
/*Funciones de impresion de formularios*/
function imprArray($array){
	$i = 0;
	foreach ($array as $key => $value) {
		echo "Element array no.".$i."; Key: ".$key."; Value: ".$value;
		echo "<br>";
		$i++;
	}
	echo "Num.Element: ".$i;
}
//Utilidad

function imprFormTienda($obj){
	echo '<div class="row formulario formulario-crud">';
	echo "<h3 class=infoProceso></h3>";
	echo '<div class="confirmDelete"></div>';
	echo '<div class="overFlowForms"></div>';
	echo'<form action="../_web/controller.php?accion=mantenimentoTiendas&operacion=modificacion" method="post" name="tienda">';
	echo '<div class="col-xs-12">';
	echo '<fieldset>';
	echo '<legend>Cod. Tienda: '.$obj->__GET("codTienda").'</legend>';
	echo '<input type="hidden" name="codTienda" value="'.$obj->__GET("codTienda").'">';
	echo '<div class="row">';
	echo '<div class="form-group col-xs-12 col-sm-6">';
	echo '<label for="nombre">Nombre</label>';
	echo '<input type="text" class="form-control" name="nombre" id="pais" placeholder="Nombre Tienda" value="'.$obj->__GET("nombre").'" disabled="true" required="true">';
	echo '<span class="errValidacion">Nombre no valido</span>';
	echo '</div>';
	echo '<div class="form-group col-xs-12 col-sm-6">';
	echo '<label for="pais">País</label>';
	echo '<input type="text" class="form-control" name="pais" id="pais" placeholder="País" value="'.$obj->__GET("pais").'" disabled="true" required="true">';
	echo '<span class="errValidacion">País no valido</span>';
	echo '</div>';
	echo '<div class="form-group col-xs-12 col-sm-6">';
	echo '<label for="provincia">Provincia</label>';
	echo '<input type="text" class="form-control" name="provincia" id="Provincia" placeholder="Provincia" value="'.$obj->__GET("provincia").'" disabled="true" required="true">';
	echo '<span class="errValidacion">Provincia no valida</span>';
	echo '</div>';
	echo '<div class="form-group col-xs-12 col-sm-6">';
	echo'<label for="poblacion">Población</label>';
	echo '<input type="text" class="form-control" name="poblacion" id="poblacion" placeholder="Población" value="'.$obj->__GET("poblacion").'" disabled="true" required="true">';
	echo '<span class="errValidacion">Población no valida</span>';
	echo '</div>';
	echo '<div class="form-group col-xs-12 col-sm-6">';
	echo '<label for="direccion">Dirección</label>';
	echo '<input type="text" class="form-control" name="direccion" id="direccion" placeholder="Dirección" value="'.$obj->__GET("direccion").'" disabled="true" required="true">';
	echo '<span class="errValidacion">Dirección no valida</span>';
	echo '</div>';
	echo '<div class="form-group col-xs-12 col-sm-6">';
	echo '<label for="numero">Número Dirección</label>';
	echo '<input type="text" class="form-control" name="numero" id="numero" placeholder="Número" value="'.$obj->__GET("numero").'" disabled="true" required="true">';
	echo '<span class="errValidacion">Número de dirección no valido</span>';
	echo '</div>';
	echo '<div class="form-group col-xs-12 col-sm-6">';
	echo '<label for="telefono">Teléfono</label>';
	echo '<input type="text" class="form-control" name="telefono" id="telefono" placeholder="Teléfono" value="'.$obj->__GET("telefono").'" disabled="true" required="true">';
	echo '<span class="errValidacion">Número de teléfono no valido</span>';
	echo '</div>';
	echo '<div class="form-group col-xs-12 col-sm-6">';
	echo '<label for="movil">Movil</label>';
	echo '<input type="text" class="form-control" name="movil" id="movil" placeholder="Móvil" value="'.$obj->__GET("movil").'" disabled="true" required="true">';
	echo '<span class="errValidacion">Número de móvil no valido</span>';
	echo '</div>';
	echo '<div class="form-group col-xs-12 col-sm-6">';
	echo '<label for="email">Email</label>';
	echo '<input type="text" class="form-control" name="email" id="email" placeholder="Email" value="'.$obj->__GET("email").'" disabled="true"  required="true">';
	echo '<span class="errValidacion">Formato de correo incorrecto</span>';
	echo '</div>';
	echo '<div class="form-group col-xs-12 col-sm-6">';
	echo '<label for="pais">Tipo de Suscripción</label>';
	echo '<select class="form-control" name="tSuscripcion" id="tSuscripcion" disabled="true"  required="true">';

	switch ($obj->__GET("tipoSuscripcion")) {
		case 'pre':
			echo '<option value="">Tipo Suscripción</option>';
			echo '<option value="pre" selected>Premium - 360€/año</option>';
			echo '<option value="nor">Normal - 250€/año</option>';
			echo '<option value="fre">Basica - ¡¡Gratis!!</option>';	
			break;
		case 'nor':
			echo '<option value="">Tipo Suscripción</option>';
			echo '<option value="pre">Premium - 360€/año</option>';
			echo '<option value="nor" selected>Normal - 250€/año</option>';
			echo '<option value="fre">Basica - ¡¡Gratis!!</option>';	
			break;
		case 'fre':
			echo '<option value="">Tipo Suscripción</option>';
			echo '<option value="pre">Premium - 360€/año</option>';
			echo '<option value="nor">Normal - 250€/año</option>';
			echo '<option value="fre" selected>Basica - ¡¡Gratis!!</option>';	
			break;
		default:
			echo '<option value="" selected>Tipo Suscripción</option>';
			echo '<option value="pre">Premium - 360€/año</option>';
			echo '<option value="nor">Normal - 250€/año</option>';
			echo '<option value="fre">Basica - ¡¡Gratis!!</option>';	
			break;
	}
		

	echo '</select>';
	echo '<span class="errValidacion">Seleccione una suscripción</span>';
	echo '</div>';
	echo '</div>';
	echo '</fieldset>';
	echo '</div>';
	echo '</form>';
	echo '<div class="col-xs-12 control-btn">';
	echo '<div class="col-xs-6 divMod">';
	echo '<button class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span></button>';
	echo '</div>';
	echo '<div class="col-xs-6 confMod">';
	echo '<button class="btn btn-success"><span class="glyphicon glyphicon-ok"></span></button><button class="btn btn-danger cancelMod"><span class="glyphicon glyphicon-remove"></span></button>';
	echo '</div>';
	echo '<div class="col-xs-6 confDelete">';
	echo '<button class="btn btn-default"><span class="glyphicon glyphicon-trash"></span></span></button>';
	echo '</div>';
	echo '</div>';
	echo '</div>';
}
//Funcion para la impresion del formulario de tienda pasando un objeto php

function imprFormUsuario($obj, $arrayUsuariosAcceso, $arrayTiendas){
	if($obj->__GET("codUsuario") != 0){
		echo '<div class="row formulario formulario-crud">
					<h3 class=infoProceso></h3>
					<div class="confirmDelete"></div>
					<div class="overFlowForms"></div>
					<form action="../_web/controller.php?accion=mantenimentoUsuarios&operacion=modificacion" method="post" name="usuario">
					<div class="col-xs-12">
					<fieldset>

					<legend>Usuario: \''.$obj->__GET("codUsuario").'\'</legend>
					<input type="hidden" name="codUsuario" value="'.$obj->__GET("codUsuario").'">
					<div class="row">

					<div class="form-group col-xs-12 col-sm-6">
					<label for="nombre">Nombre</label>
					<input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre Usuario" value="'.$obj->__GET("nombre").'" disabled>
					<span class="errValidacion">Nombre no valido</span>
					</div>

					<div class="form-group col-xs-12 col-sm-6">
					<label for="email">Email</label>
					<input type="mail" class="form-control" name="email" placeholder="Email" value="'.$obj->__GET("email").'" disabled>
					<span class="errValidacion">Formato de correo incorrecto</span>
					</div>

					<div class="form-group col-xs-12 col-sm-6">
					<label for="password">Nueva Contraseña</label>
					<input type="password" class="form-control" name="password" id="password" placeholder="Contraseña" value="'.$obj->__GET("password").'" disabled>
					<span class="errValidacion checkPassword"></span>
					</div>

					<div class="form-group col-xs-12 col-sm-6">
					<label for="passwordCheck">Repetir Contraseña</label>
					<input type="password" class="form-control" name="passwordCheck" id="passwordCheck" placeholder="Repetir Contraseña" value="'.$obj->__GET("password").'" disabled>
					</div>

					<div class="form-group col-xs-12 col-sm-6">
					<label for="nAcceso">Nivel Acceso</label>
					<select class="form-control" name="nAcceso" id="nAcceso" disabled>';
						switch ($obj->__GET("nivelAcceso")) {
							//Se bloquea el valor de nivel de acceso de administrador.
							/*El nivel de acceso de Administrador solo se puede obtener si un administrador lo crea.
								Los niveles de acceso de gerente y empleado pueden cambiarse entre si, pero no pueden
								tomar el valor de administrador*/
							case 'adm':
								echo '<option value="">Nivel Acceso</option>';
								echo '<option value="adm" selected>Administrador</option>';						
								break;
							case 'gen':
								echo '<option value="">Nivel Acceso</option>';
								echo '<option value="gen" selected>Gerente</option>';
								echo '<option value="emp">Empleado</option>';		
								break;
							case 'emp':
								echo '<option value="">Nivel Acceso</option>';
								echo '<option value="gen">Gerente</option>';
								echo '<option value="emp" selected>Empleado</option>';		
								break;
							default:
								echo '<option value="">Nivel Acceso</option>';
								echo '<option value="gen">Gerente</option>';
								echo '<option value="emp">Empleado</option>';	
								break;
						}

						
					echo '</select>
					<span class="errValidacion">Seleccione una opcion</span>
					</div>';
		echo '<div class="form-group col-xs-12 col-sm-6">';
							    echo '<label for="accesoTienda">Acceso a Tienda</label>';
							    echo '<select name="accesoTienda" class="form-control" id="accesoTienda" disabled>';
						    	echo '<option value="">Acceso a Tienda</option>';
						    		//recoremos el array de tiendas
						    	if(array_key_exists($obj->__GET("codUsuario"), $arrayUsuariosAcceso)){
							    	foreach ($arrayTiendas as $codTienda => $Nombre) {
							    		//si el acceso del usuario es igual al de esa tienda
								    		if($arrayUsuariosAcceso[$obj->__GET("codUsuario")] == $codTienda){
								    			//aparece seleccionada
								    			echo '<option value="'.$codTienda.'" selected>'.$codTienda.' - '.$Nombre.'</option>';	
								    		}else{
								    			//sino aparece como opcion del select
								    			echo '<option value="'.$codTienda.'">'.$codTienda.' - '.$Nombre.'</option>';	
								    		}
							    	}
						    	}else{
						    			echo '<option value="0" selected>Acceso Administrador</option>';
						    		}
						    	
						    	
							    echo '</select>';
							    echo '<span class="errValidacion">Seleccione una opcion</span>';
								  echo '</div>';
		echo '</div>
					</fieldset>
					</div>

					</form>

					<div class="col-xs-12 control-btn">
					<div class="col-xs-6 divMod">
					<button class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span></button>
					</div>
					<div class="col-xs-6 confMod">
					<button class="btn btn-success"><span class="glyphicon glyphicon-ok"></span></button><button class="btn btn-danger cancelMod"><span class="glyphicon glyphicon-remove"></span></button>
					</div>
					
					<div class="col-xs-6 confDelete">';
					echo	'<button class="btn btn-default"><span class="glyphicon glyphicon-trash"></span></span></button>';
		echo	'</div>

					</div>
					</div>';
		
	}
}
//Funcion para impresion del formulario de tienda pasando un objeto php

function imprFormProveedor($obj){
	echo	'<div class="row formulario formulario-crud">
					<h3 class=infoProceso></h3>
					<div class="confirmDelete"></div>
					<div class="overFlowForms"></div>
					<form action="../_web/controller.php?accion=mantenimentoUsuarios&operacion=modificacion" method="post">
						<div class="col-xs-12">
							<fieldset>
								<legend>Proveedor: \''.$obj->__GET("codProveedor").'\'</legend>
								<input type="hidden" name="codProveedor" value="'.$obj->__GET("codProveedor").'">
								<div class="row">
							  <div class="form-group col-xs-12">
							    <label for="nombre">Nombre Proveedor</label>
							    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre Proveedor" value="'.$obj->__GET("nombre").'" disabled>
							    <span class="errValidacion">Nombre no valido</span>
							  </div>
							  <div class="form-group col-xs-12 col-sm-4">
							    <label for="nombre">Nombre Contacto</label>
							    <input type="text" class="form-control" name="nombre" id="nombreContacto" placeholder="Nombre Contacto" value="'.$obj->__GET("nombreContacto").'" disabled>
							    <span class="errValidacion">Nombre contacto no valido</span>
							  </div>
							  <div class="form-group col-xs-12 col-sm-4">
							    <label for="apellido1Contacto">1º Apellido Contato</label>
							    <input type="text" class="form-control" name="apellido1Contacto" id="apellido1Contacto" placeholder="1º Apellido Contacto" value="'.$obj->__GET("apellido1Contacto").'" disabled>
							    <span class="errValidacion">1º Apellido no valido</span>
							  </div>
							  <div class="form-group col-xs-12 col-sm-4">
							    <label for="apellido2Contacto">2º Apellido Contacto</label>
							    <input type="text" class="form-control" name="apellido2Contacto" id="apellido2Contacto" placeholder="2º Apellido Contacto" value="'.$obj->__GET("apellido2Contacto").'" disabled>
							    <span class="errValidacion">2º Apellido no valido</span>
							  </div>
							  <div class="form-group col-xs-12 col-sm-4">
							    <label for="telefono">Telefono</label>
							    <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Telefono" value="'.$obj->__GET("telefono").'" disabled>
							    <span class="errValidacion">Número de teléfono no valido</span>
							  </div>
								<div class="form-group col-xs-12 col-sm-4">
							    <label for="Movil">Movil</label>
							    <input type="text" class="form-control" name="movil" id="movil" placeholder="Movil" value="'.$obj->__GET("movil").'" disabled>
							    <span class="errValidacion">Número de móvil no valido</span>
							  </div>
								
							  <div class="form-group col-xs-12 col-sm-4">
							    <label for="email">Email</label>
							    <input type="mail" class="form-control" name="email" id="email" placeholder="Email" value="'.$obj->__GET("email").'" disabled>
							    <span class="errValidacion">Formato de correo incorrecto</span>
							  </div>
							</div>
							</fieldset>
						</div>
					</form>
				  <div class="col-xs-12 control-btn">
			  		<div class="col-xs-6 divMod">
			  			<button class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span></button>
			  		</div>
			  		<div class="col-xs-6 confMod">
			  			<button class="btn btn-success"><span class="glyphicon glyphicon-ok"></span></button><button class="btn btn-danger cancelMod"><span class="glyphicon glyphicon-remove"></span></button>
			  		</div>
			  		<div class="col-xs-6 confDelete">
			  			<button class="btn btn-default"><span class="glyphicon glyphicon-trash"></span></span></button>
			  		</div>
				  </div>
				</div>';
}
//Funcion para la impresion del formulario de proveedores pasando un objeto php

function imprFormEmpleado($obj){
	echo	'<div class="row formulario formulario-crud" id="formTiendaCodTienda">
	<h3 class=infoProceso></h3>
	<div class="confirmDelete"></div>
	<div class="overFlowForms"></div>
	<form action="../_web/controller.php?accion=mantenimentoTiendas&operacion=modificacion" method="post">
	<div class="col-xs-12">
	<fieldset>
	<legend>Empleado: \''.$obj->__GET("codEmpleado").'\'</legend>
	<input type="hidden" name="codEmpleado" value="'.$obj->__GET("codEmpleado").'">
	<div class="row">
	<div class="col-xs-12 inputImg">
	<div>';
	if( !empty($obj->__GET("foto")) ){
		echo	'<img src="../_recursos/img/nuevoEmpleado.png" alt="Imagen de nuevo empleado">';
	}else{
		//Taratamiento de imagenes ... BUILDING...
		echo	'<img src="../_recursos/img/nuevoEmpleado.png" alt="Imagen de nuevo empleado">';
	}
	echo' </div>
	<div>
	<span class="foto">
		<input type="file" name="foto" id="foto">
	</span>
	<label for="foto" class="inputFile"><span>Añadir Foto</span></label>
	</div>
	</div>
	<div class="form-group col-xs-12 col-sm-6">
	<label for="nombre">Nombre</label>
	<input type="text" class="form-control" name="nombre" id="pais" placeholder="Nombre Usuario" value="'.$obj->__GET("nombre").'"  disabled>
	</div>
	<div class="form-group col-xs-12 col-sm-6">
	<label for="apellido1">1º Apellido</label>
	<input type="text" class="form-control" name="apellido1" id="apellido1" placeholder="1º Apellido" value="'.$obj->__GET("apellido1").'" disabled>
	</div>
	<div class="form-group col-xs-12 col-sm-6">
	<label for="apellido2">2º Apellido</label>
	<input type="text" class="form-control" name="apellido2" id="apellido2" placeholder="2º Apellido" value="'.$obj->__GET("apellido2").'"  disabled>
	</div>
	<div class="form-group col-xs-12 col-sm-6">
	<label for="telefono">Telefono</label>
	<input type="text" class="form-control" name="telefono" id="telefono" placeholder="Telefono" value="'.$obj->__GET("telefono").'"  disabled>
	</div>
	<div class="form-group col-xs-12 col-sm-6">
	<label for="movil">Movil</label>
	<input type="text" class="form-control" name="movil" id="movil" placeholder="Movil" value="'.$obj->__GET("movil").'"  disabled>
	</div>
	<div class="form-group col-xs-12 col-sm-6">
	<label for="sueldo" class="hidden-xs">Sueldo</label>
	<input type="number" class="form-control" name="sueldo" id="sueldo" placeholder="Sueldo" min="0" value="'.$obj->__GET("sueldo").'" disabled>
	</div>
	</div>
	</fieldset>
	</div>
	</form>
	<div class="col-xs-12 control-btn">
	<div class="col-xs-6 divMod">
	<button class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span></button>
	</div>
	<div class="col-xs-6 confMod">
	<button class="btn btn-success"><span class="glyphicon glyphicon-ok"></span></button><button class="btn btn-danger cancelMod"><span class="glyphicon glyphicon-remove"></span></button>
	</div>
	<div class="col-xs-6 confDelete">
	<button class="btn btn-default"><span class="glyphicon glyphicon-trash"></span></span></button>
	</div>
	</div>
	</div>';
}
//Funcion para la impresion del formulario de empleado pasando un objeto php

function imprFormProducto($obj){
	echo '<div class="row formulario formulario-crud">
	<h3 class=infoProceso></h3>
	<div class="confirmDelete"></div>
	<div class="overFlowForms"></div>
		<form action="../_web/controller.php?accion=mantenimentoTiendas&operacion=modificacion" method="post">
			<div class="col-xs-12">
				<fieldset>
					<legend>Producto: \''.$obj->__GET("codProducto").'\'</legend>
					<input type="hidden" name="codProducto" value="'.$obj->__GET("codProducto").'">
					<div class="row">
						<div class="col-xs-12 inputImg">
							<div>';
							if( !empty($obj->__GET("foto")) ){
								echo '<img src="../_recursos/img/nuevoProducto.png" alt="Imagen de nuevo producto">';
							}else{
								//Tratamiento de Imagenes... BUILDING...
								echo '<img src="../_recursos/img/nuevoProducto.png" alt="Imagen de nuevo producto">';
							}
				echo '</div>
							<div>
								<span class="foto">
						    	<input type="file" name="foto" id="foto">
								</span>
								<label for="foto" class="inputFile"><span>Añadir Foto</span></label>
							</div>
						</div>
					  <div class="form-group col-xs-12 col-sm-6">
					    <label for="nombre">Nombre</label>
					    <input type="text" class="form-control" name="nombre" id="pais" placeholder="Nombre Usuario" value="'.$obj->__GET("nombre").'" disabled>
					    <span class="errValidacion">Nombre no valido</span>
					  </div>
					  <div class="form-group col-xs-12 col-sm-6">
					    <label for="referencia">Referencia</label>
					    <input type="text" class="form-control" name="referencia" id="referencia" placeholder="Referencia" value="'.$obj->__GET("referencia").'" disabled>
					    <span class="errValidacion">Sin valor de referencia</span>
					  </div>
					  <div class="form-group col-xs-12 col-sm-4">
					    <label for="precio">Precio (€)</label>
					    <input type="text" class="form-control" name="precio" id="precio" placeholder="Precio (€)" value="'.$obj->__GET("precio").'" disabled>
					    <span class="errValidacion">Formato de precio no valido</span>
					  </div>
						<div class="form-group col-xs-12 col-sm-4">
					    <label for="IVA">IVA</label>
					    <input type="text" class="form-control" name="IVA" id="IVA" placeholder="IVA" value="'.$obj->__GET("IVA").'" disabled>
					    <span class="errValidacion">Formato de IVA no valido</span>
					  </div>
						<div class="form-group col-xs-12 col-sm-4">
					    <label for="descuento">Descuento</label>
					    <input type="text" class="form-control" name="descuento" id="descuento" placeholder="Descuento" value="'.$obj->__GET("descuento").'" disabled>
					    <span class="errValidacion">Formato de precio no valido</span>
					  </div>
						<div class="form-group col-xs-12 col-sm-4">
					    <label for="cantidad">Cantidad</label>
					    <input type="number" class="form-control" name="cantidad" id="cantidad" placeholder="Cantidad" min="0" value="'.$obj->__GET("cantidad").'" disabled>
					    <span class="errValidacion">Formato de cantidad no valida</span>
					  </div>
					  <div class="form-group col-xs-12 col-sm-4">
					    <label for="cantidadMin">Cantidad Minima</label>
					    <input type="number" class="form-control" name="cantidadMin" id="cantidadMin" placeholder="Cantidad Minima" min="0" value="'.$obj->__GET("cantidadMin").'" disabled>
					    	<span class="errValidacion">Formato de cantidad minima no valido</span>
					  </div>
						<div class="form-group col-xs-12 col-sm-4">
					    <label for="nuevo">Nuevo Producto</label>
					    <input type="checkbox" class="form-control" name="nuevo" id="nuevo" ';
					    if( $obj->__GET("nuevo") ){
					    	echo "checked";
					    }
					    echo '>
					  </div>
						<div class="form-group col-xs-12 col-sm-12">
					    <label for="descripcion" class="hidden-xs">Descripcion</label>
					    <textarea name="descripcion" id="descripcion" disabled>';
					    if( !empty($obj->__GET("descripcion")) ){
					    	echo $obj->__GET("descripcion");
					    }else{
					    	echo "Introduzca una Descripcion";
					    }

			 echo '</textarea>
			 			<span class="errValidacion">Sin valor de descripcion</span>
					  </div>								
				</div>
				</fieldset>
			</div>
		</form>
	  <div class="col-xs-12 control-btn">
			<div class="col-xs-6 divMod">
				<button class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span></button>
			</div>
			<div class="col-xs-6 confMod">
				<button class="btn btn-success"><span class="glyphicon glyphicon-ok"></span></button><button class="btn btn-danger cancelMod"><span class="glyphicon glyphicon-remove"></span></button>
			</div>
			<div class="col-xs-6 confDelete">
				<button class="btn btn-default"><span class="glyphicon glyphicon-trash"></span></span></button>
			</div>
	  </div>
	</div>';
}
//Funcion para la impresion del formulario de producto pasando un objeto php

function imprAlertaProducto($obj){
	echo'<div class="row alertasProductos">
			<h3 class="col-xs-12">Producto - \''.$obj->__GET("codProducto").'\' - '.$obj->__GET("referencia").'</h3>
			<div class="col-xs-12 imgAlerta">
				<div>';
				if( !empty($obj->__GET("foto")) ){
					echo '<img src="../_recursos/img/nuevoProducto.png" alt="Imagen de nuevo producto">';
				}else{
					//Tratamiento de Imagenes... BUILDING...
					echo '<img src="../_recursos/img/nuevoProducto.png" alt="Imagen de nuevo producto">';
				}
	echo '</div>
			</div>
			<div class="col-xs-12 itemAlerta">
				<p class="bg-primary">Nombre:<span class="dataAlert"> '.$obj->__GET("nombre").' </span> </p>
				<p class="bg-primary">Precio:<span class="dataAlert"> '.$obj->__GET("precio").' €  </span></p>
				<p class="bg-primary">I.V.A :<span class="dataAlert"> '.($obj->__GET("IVA") * 100).' %  </span></p>
				<p class="bg-primary">Descuento:<span class="dataAlert"> '.($obj->__GET("descuento") * 100).' %  </span> <span class=dataAlert></p>';
				if($obj->__GET("nuevo")){
	echo	'<p class="bg-primary">Estado:<span class="dataAlert"> Nuevo producto </span></p>';							
				}
				if($obj->__GET("cantidad") == 0){
	echo	'<p class="text-danger">Estado:<span class="dataAlertDanger"> Agotado </span></p>';
				}
				if($obj->__GET("cantidad") < $obj->__GET("cantidadMin")){
	echo	'<p class="text-danger">Estado: Quedan <span class="dataAlertDanger">'.$obj->__GET("cantidad").'</span> unidades</p>';
				}
				
	echo '</div>
			<div class=" controlAlerta">
				<button class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span></button>
			</div>
		</div>';
}
//Funcion para la impresion de las alertas de un producto que tenga cantidad menor a la cantidad minima puesta

?>