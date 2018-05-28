"use strict";
/*Documento para implemetar los distintos efectos realizado s con JQuery*/
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
});//Fin documentReady
