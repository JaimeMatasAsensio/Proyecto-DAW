"use strict";
/*Documento para implemetar los distintos efectos realizado s con JQuery*/
/*
Jaime Matas Asensio
Proyecto DAW: ShopSphere
I.E.S. Maestre de Calatrava - Ciudad Real
2017
*/

$(document).ready(function(){
	
	$( "#btnMenuMovil" ).click( function() {
	  $( "#opcionesMovil" ).toggle("blind",{},500);
	});
	/*Efecto para el menu de movil*/
	
	$( "#Quees" ).click( function() {
	  $( "#textoDesc" ).toggle("blind",{},200);
	});
	/*Efecto para el texto de descripcion*/

	$( "#Vent" ).click( function() {
	  $( "#textoVent" ).toggle("blind",{},200);
	});
	/*Efecto para el texto de ventajas*/

	$( "#nuevoElemento" ).click( function() {
		$( "#formNuevoElemento" ).toggle("blind",{},200);
	});
	/*Efecto para el formulario de nuevos elementos*/

	$( "#resultadoBusquedaElementos" ).click( function() {
	  $( "#formsResaultadoBusqueda" ).toggle("blind",{},200);
	});
	/*Efecto para los resultados de busqueda de elementos*/

	$( ".divMod button" ).click( function() {
		$( this ).parent().hide();
		$( this ).parent().next().show();
	});
	//Efecto para mostrar los controles de modificacion

	$( ".cancelMod" ).click( function() {
		$( this ).parent().hide();
		$( this ).parent().prev().show();
		
	});
	//Efecto para ocultar los controles de modificacion 
	$(".formulario-crud input[type='file']").change(function(){
		var filename = $(this).val().split('\\').pop();
		var idname = $(this).attr('id');
		$('span.'+idname).next().find('span').html(filename);
	 });

});//Fin documentReady
