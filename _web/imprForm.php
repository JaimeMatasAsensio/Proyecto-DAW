<?php
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
	echo '<div class="overFlowForms">';
	echo '</div>';
	echo'<form action="../_web/controller.php?accion=mantenimentoTiendas&operacion=modificacion" method="post" name="tienda">';
	echo '<div class="col-xs-12">';
	echo '<fieldset>';
	echo '<legend>Cod. Tienda: '.$obj->__GET("codTienda").'</legend>';
	echo '<input type="hidden" name="codTienda" value="'.$obj->__GET("codTienda").'">';
	echo '<div class="row">';
	echo '<div class="form-group col-xs-12 col-sm-6">';
	echo '<label for="nombre" class="hidden-xs">Nombre</label>';
	echo '<input type="text" class="form-control" name="nombre" id="pais" placeholder="Nombre Tienda" value="'.$obj->__GET("nombre").'" disabled="true" required="true">';
	echo '</div>';
	echo '<div class="form-group col-xs-12 col-sm-6">';
	echo '<label for="pais" class="hidden-xs">Pais</label>';
	echo '<input type="text" class="form-control" name="pais" id="pais" placeholder="Pais" value="'.$obj->__GET("pais").'" disabled="true" required="true">';
	echo '</div>';
	echo '<div class="form-group col-xs-12 col-sm-6">';
	echo '<label for="provincia" class="hidden-xs">Provincia</label>';
	echo '<input type="text" class="form-control" name="provincia" id="Provincia" placeholder="Provincia" value="'.$obj->__GET("provincia").'" disabled="true" required="true">';
	echo '</div>';
	echo '<div class="form-group col-xs-12 col-sm-6">';
	echo'<label for="poblacion" class="hidden-xs">Poblacion</label>';
	echo '<input type="text" class="form-control" name="poblacion" id="poblacion" placeholder="Poblacion" value="'.$obj->__GET("poblacion").'" disabled="true" required="true">';
	echo '</div>';
	echo '<div class="form-group col-xs-12 col-sm-6">';
	echo '<label for="direccion" class="hidden-xs">Direccion</label>';
	echo '<input type="text" class="form-control" name="direccion" id="direccion" placeholder="Direccion" value="'.$obj->__GET("direccion").'" disabled="true" required="true">';
	echo '</div>';
	echo '<div class="form-group col-xs-12 col-sm-6">';
	echo '<label for="numero" class="hidden-xs">Numero</label>';
	echo '<input type="text" class="form-control" name="numero" id="numero" placeholder="Numero" value="'.$obj->__GET("numero").'" disabled="true" required="true">';
	echo '</div>';
	echo '<div class="form-group col-xs-12 col-sm-6">';
	echo '<label for="telefono" class="hidden-xs">Telefono</label>';
	echo '<input type="text" class="form-control" name="telefono" id="telefono" placeholder="Telefono" value="'.$obj->__GET("telefono").'" disabled="true" required="true">';
	echo '</div>';
	echo '<div class="form-group col-xs-12 col-sm-6">';
	echo '<label for="movil" class="hidden-xs">Movil</label>';
	echo '<input type="text" class="form-control" name="movil" id="movil" placeholder="Movil" value="'.$obj->__GET("movil").'" disabled="true" required="true">';
	echo '</div>';
	echo '<div class="form-group col-xs-12 col-sm-6">';
	echo '<label for="email"  class="hidden-xs">Email</label>';
	echo '<input type="text" class="form-control" name="email" id="email" placeholder="Email" value="'.$obj->__GET("email").'" disabled="true"  required="true">';
	echo '</div>';
	echo '<div class="form-group col-xs-12 col-sm-6">';
	echo '<label for="pais" class="hidden-xs">Tipo de Suscripcion</label>';
	echo '<select class="form-control" name="tSuscripcion" id="tSuscripcion" disabled="true"  required="true">';

	switch ($obj->__GET("tipoSuscripcion")) {
		case 'pre':
			echo '<option value="">Tipo Suscripcion</option>';
			echo '<option value="pre" selected>Premium - 360€/año</option>';
			echo '<option value="nor">Normal - 250€/año</option>';
			echo '<option value="fre">Basica - ¡¡Gratis!!</option>';	
			break;
		case 'nor':
			echo '<option value="">Tipo Suscripcion</option>';
			echo '<option value="pre">Premium - 360€/año</option>';
			echo '<option value="nor" selected>Normal - 250€/año</option>';
			echo '<option value="fre">Basica - ¡¡Gratis!!</option>';	
			break;
		case 'fre':
			echo '<option value="">Tipo Suscripcion</option>';
			echo '<option value="pre">Premium - 360€/año</option>';
			echo '<option value="nor">Normal - 250€/año</option>';
			echo '<option value="fre" selected>Basica - ¡¡Gratis!!</option>';	
			break;
		default:
			echo '<option value="" selected>Tipo Suscripcion</option>';
			echo '<option value="pre">Premium - 360€/año</option>';
			echo '<option value="nor">Normal - 250€/año</option>';
			echo '<option value="fre">Basica - ¡¡Gratis!!</option>';	
			break;
	}
		

	echo '</select>';
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
	echo '<div class="col-xs-6">';
	echo '<button class="btn btn-default"><span class="glyphicon glyphicon-trash"></span></span></button>';
	echo '</div>';
	echo '</div>';
	echo '</div>';
}
//Funcion para la impresion del formulario de tienda pasando un objeto php

function imprFormUsuario($obj){
echo '<div class="row formulario formulario-crud">
			<form action="../_web/controller.php?accion=mantenimentoUsuarios&operacion=modificacion" method="post">
			<div class="col-xs-12">
			<fieldset>

			<legend>Usuario: \''.$obj->__GET("codUsuario").'\'</legend>
			<input type="hidden" name="codUsuario" value="'.$obj->__GET("codUsuario").'">
			<div class="row">

			<div class="form-group col-xs-12 col-sm-6">
			<label for="nombre" class="hidden-xs">Nombre</label>
			<input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre Usuario" value="'.$obj->__GET("nombre").'" disabled>
			</div>

			<div class="form-group col-xs-12 col-sm-6">
			<label for="email" class="hidden-xs">Email</label>
			<input type="mail" class="form-control" name="email" id="email" placeholder="Email" value="'.$obj->__GET("email").'" disabled>
			</div>

			<div class="form-group col-xs-12 col-sm-6">
			<label for="password" class="hidden-xs">Nueva Contraseña</label>
			<input type="password" class="form-control" name="password" id="password" placeholder="Contraseña" value="'.$obj->__GET("password").'" disabled>
			</div>

			<div class="form-group col-xs-12 col-sm-6">
			<label for="nacceso" class="hidden-xs">Nivel Acceso</label>
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

			<div class="col-xs-6">
			<button class="btn btn-default"><span class="glyphicon glyphicon-trash"></span></span></button>
			</div>

			</div>
			</div>';
}
//Funcion para impresion del formulario de tienda pasando un objeto php

function imprFormProveedor($obj){
			echo	'<div class="row formulario formulario-crud">
					<form action="../_web/controller.php?accion=mantenimentoUsuarios&operacion=modificacion" method="post">
						<div class="col-xs-12">
							<fieldset>
								<legend>Proveedor: \''.$obj->__GET("codProveedor").'\'</legend>
								<input type="hidden" name="codProveedor" value="'.$obj->__GET("codProveedor").'">
								<div class="row">
							  <div class="form-group col-xs-12">
							    <label for="nombre" class="hidden-xs">Nombre Proveedor</label>
							    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre Proveedor" value="'.$obj->__GET("nombre").'" disabled>
							  </div>
							  <div class="form-group col-xs-12 col-sm-4">
							    <label for="nombre" class="hidden-xs">Nombre Contacto</label>
							    <input type="text" class="form-control" name="nombre" id="nombreContacto" placeholder="Nombre Contacto" value="'.$obj->__GET("nombreContacto").'" disabled>
							  </div>
							  <div class="form-group col-xs-12 col-sm-4">
							    <label for="apellido1Contacto" class="hidden-xs">1º Apellido Contato</label>
							    <input type="text" class="form-control" name="apellido1Contacto" id="apellido1Contacto" placeholder="1º Apellido Contacto" value="'.$obj->__GET("apellido1Contacto").'" disabled>
							  </div>
							  <div class="form-group col-xs-12 col-sm-4">
							    <label for="apellido2Contacto" class="hidden-xs">2º Apellido Contacto</label>
							    <input type="text" class="form-control" name="apellido2Contacto" id="apellido2Contacto" placeholder="2º Apellido Contacto" value="'.$obj->__GET("apellido2Contacto").'" disabled>
							  </div>
							  <div class="form-group col-xs-12 col-sm-4">
							    <label for="telefono" class="hidden-xs">Telefono</label>
							    <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Telefono" value="'.$obj->__GET("telefono").'" disabled>
							  </div>
								<div class="form-group col-xs-12 col-sm-4">
							    <label for="Movil" class="hidden-xs">Movil</label>
							    <input type="text" class="form-control" name="movil" id="movil" placeholder="Movil" value="'.$obj->__GET("movil").'" disabled>
							  </div>
								
							  <div class="form-group col-xs-12 col-sm-4">
							    <label for="email" class="hidden-xs">Email</label>
							    <input type="mail" class="form-control" name="email" id="email" placeholder="Email" value="'.$obj->__GET("email").'" disabled>
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
			  		<div class="col-xs-6">
			  			<button class="btn btn-default"><span class="glyphicon glyphicon-trash"></span></span></button>
			  		</div>
				  </div>
				</div>';
}
//Funcion para la impresion del formulario de proveedores pasando un objeto php

function imprFormEmpleado($obj){
echo	'<div class="row formulario formulario-crud" id="formTiendaCodTienda">
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
<label for="nombre" class="hidden-xs">Nombre</label>
<input type="text" class="form-control" name="nombre" id="pais" placeholder="Nombre Usuario" value="'.$obj->__GET("nombre").'"  disabled>
</div>
<div class="form-group col-xs-12 col-sm-6">
<label for="apellido1" class="hidden-xs">1º Apellido</label>
<input type="text" class="form-control" name="apellido1" id="apellido1" placeholder="1º Apellido" value="'.$obj->__GET("apellido1").'" disabled>
</div>
<div class="form-group col-xs-12 col-sm-6">
<label for="apellido2" class="hidden-xs">2º Apellido</label>
<input type="text" class="form-control" name="apellido2" id="apellido2" placeholder="2º Apellido" value="'.$obj->__GET("apellido2").'"  disabled>
</div>
<div class="form-group col-xs-12 col-sm-6">
<label for="telefono" class="hidden-xs">Telefono</label>
<input type="text" class="form-control" name="telefono" id="telefono" placeholder="Telefono" value="'.$obj->__GET("telefono").'"  disabled>
</div>
<div class="form-group col-xs-12 col-sm-6">
<label for="movil" class="hidden-xs">Movil</label>
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
<div class="col-xs-6">
<button class="btn btn-default"><span class="glyphicon glyphicon-trash"></span></span></button>
</div>
</div>
</div>';
}
//Funcion para la impresion del formulario de empleado pasando un objeto php
?>