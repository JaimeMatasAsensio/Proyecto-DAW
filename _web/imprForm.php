<?php
/*Funciones de impresion de formularios*/
function imprFormTienda($obj){
echo '<div class="row formulario formulario-crud" id="formTiendaCodTienda">';
echo'<form action="../_web/controller.php?accion=mantenimentoTiendas&operacion=modificacion" method="post" name="tienda">';
echo '<div class="col-xs-12">';
echo '<fieldset>';
echo '<legend>Cod. Tienda: '.$obj->__GET("codTienda").'</legend>';
echo '<input type="hidden" name="codTienda" value="'.$obj->__GET("codTienda").'">';
echo '<div class="row">';
echo '<div class="form-group col-xs-12 col-sm-6">';
echo '<label for="nombre" class="hidden-xs">Nombre</label>';
echo '<input type="text" class="form-control" name="nombre" id="pais" placeholder="Nombre Tienda" value="'.$obj->__GET("nombre").'" disabled="true">';
echo '</div>';
echo '<div class="form-group col-xs-12 col-sm-6">';
echo '<label for="pais" class="hidden-xs">Pais</label>';
echo '<input type="text" class="form-control" name="pais" id="pais" placeholder="Pais" value="'.$obj->__GET("pais").'" disabled="true">';
echo '</div>';
echo '<div class="form-group col-xs-12 col-sm-6">';
echo '<label for="provincia" class="hidden-xs">Provincia</label>';
echo '<input type="text" class="form-control" name="provincia" id="Provincia" placeholder="Provincia" value="'.$obj->__GET("provincia").'" disabled="true">';
echo '</div>';
echo '<div class="form-group col-xs-12 col-sm-6">';
echo'<label for="poblacion" class="hidden-xs">Poblacion</label>';
echo '<input type="text" class="form-control" name="poblacion" id="poblacion" placeholder="Poblacion" value="'.$obj->__GET("poblacion").'" disabled="true">';
echo '</div>';
echo '<div class="form-group col-xs-12 col-sm-6">';
echo '<label for="direccion" class="hidden-xs">Direccion</label>';
echo '<input type="text" class="form-control" name="direccion" id="direccion" placeholder="Direccion" value="'.$obj->__GET("direccion").'" disabled="true">';
echo '</div>';
echo '<div class="form-group col-xs-12 col-sm-6">';
echo '<label for="numero" class="hidden-xs">Numero</label>';
echo '<input type="text" class="form-control" name="numero" id="numero" placeholder="Numero" value="'.$obj->__GET("numero").'" disabled="true">';
echo '</div>';
echo '<div class="form-group col-xs-12 col-sm-6">';
echo '<label for="telefono" class="hidden-xs">Telefono</label>';
echo '<input type="text" class="form-control" name="telefono" id="telefono" placeholder="Telefono" value="'.$obj->__GET("telefono").'" disabled="true">';
echo '</div>';
echo '<div class="form-group col-xs-12 col-sm-6">';
echo '<label for="movil" class="hidden-xs">Movil</label>';
echo '<input type="text" class="form-control" name="movil" id="movil" placeholder="Movil" value="'.$obj->__GET("movil").'" disabled="true">';
echo '</div>';
echo '<div class="form-group col-xs-12 col-sm-6">';
echo '<label for="email"  class="hidden-xs">Email</label>';
echo '<input type="text" class="form-control" name="email" id="email" placeholder="Email" value="'.$obj->__GET("email").'" disabled="true">';
echo '</div>';
echo '<div class="form-group col-xs-12 col-sm-6">';
echo '<label for="pais" class="hidden-xs">Tipo de Suscripcion</label>';
echo '<select class="form-control" name="tSuscripcion" id="tSuscripcion" disabled="true">';

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

?>