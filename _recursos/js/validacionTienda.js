"use strict";
/*Documento para implementar las validaciones de los formularios de Tienda. Este script se carga en el formulario de tiendas*/
/*
Jaime Matas Asensio
Proyecto DAW: ShopSphere
I.E.S. Maestre de Calatrava - Ciudad Real
2017
*/
function validarTienda (element){
  //Selector de la division del input a tratar
  element = element.target || element;
  var input = "form input[name=" + element.name + "]";
  //Segun el nombre del input recibe un tratamiento u otro
  switch (element.name) {
    //validacion para los input de nombre
    case "nombre":
      var exprNombre = /^[áéíóúÁÉÍÓÚüÜñÑ]*([aA-zZ]+[áéíóúÁÉÍÓÚüÜñÑ]*\s*)+$/;
      if(exprNombre.test(element.value) && element.value.length < 30){
        $(input).parent().removeClass("has-error");
        $(input).parent().addClass("has-success");
        $( ".confMod button:first-child" ).attr("disabled",false);
      }else{
        $(input).parent().removeClass("has-success");
        $(input).parent().addClass("has-error");
        $( ".confMod button:first-child" ).attr("disabled",true);
      }
      break;
    case "pais":
    //Validacion para los input de pais
      var exprNombre = /^[áéíóúÁÉÍÓÚüÜñÑ]*([aA-zZ]+[áéíóúÁÉÍÓÚüÜñÑ]*\s*)+$/;
      if(exprNombre.test(element.value) && element.value.length < 30){
        $(input).parent().removeClass("has-error");
        $(input).parent().addClass("has-success");
        $( ".confMod button:first-child" ).attr("disabled",false);
      }else{
        $(input).parent().removeClass("has-success");
        $(input).parent().addClass("has-error");
        $( ".confMod button:first-child" ).attr("disabled",true);
      }
      break; 
    case "provincia":
    //validacion para los input de provincia
      var exprNombre = /^[áéíóúÁÉÍÓÚüÜñÑ]*([aA-zZ]+[áéíóúÁÉÍÓÚüÜñÑ]*\s*)+$/;
      if(exprNombre.test(element.value) && element.value.length < 30){
        $(input).parent().removeClass("has-error");
        $(input).parent().addClass("has-success");
        $( ".confMod button:first-child" ).attr("disabled",false);
      }else{
        $(input).parent().removeClass("has-success");
        $(input).parent().addClass("has-error");
        $( ".confMod button:first-child" ).attr("disabled",true);
      }
      break;
    case "poblacion":
    //Validacion para los input de poblacion
      var exprNombre = /^[áéíóúÁÉÍÓÚüÜñÑ]*([aA-zZ]+[áéíóúÁÉÍÓÚüÜñÑ]*\s*)+$/;
      if(exprNombre.test(element.value) && element.value.length < 30){
        $(input).parent().removeClass("has-error");
        $(input).parent().addClass("has-success");
        $( ".confMod button:first-child" ).attr("disabled",false);
      }else{
        $(input).parent().removeClass("has-success");
        $(input).parent().addClass("has-error");
        $( ".confMod button:first-child" ).attr("disabled",true);
      }
      break;
    case "direccion":
    //validacion para los input de direccion
      var exprNombre = /^([aA-zZ]+[áéíóúÁÉÍÓÚüÜñÑ]*\s*\/*\s*)*[áéíóúÁÉÍÓÚüÜñÑ]*[aA-zZ]+([aA-zZ]+[áéíóúÁÉÍÓÚüÜñÑ]*\s*)+$/;
      if(exprNombre.test(element.value) && element.value.length < 50){
        $(input).parent().removeClass("has-error");
        $(element).parent().addClass("has-success");
        $( ".confMod button:first-child" ).attr("disabled",false);
      }else{
        $(input).parent().removeClass("has-success");
        $(input).parent().addClass("has-error");
        $( ".confMod button:first-child" ).attr("disabled",true);
        
      }
      break;
    case "numero":
    //validacion para los input de numero
      var exprNombre = /^\d{1,6}$/;
      if(exprNombre.test(element.value) && element.value.length < 6){
        $(input).parent().removeClass("has-error");
        $(input).parent().addClass("has-success");
        $( ".confMod button:first-child" ).attr("disabled",false);
      }else{
        $(input).parent().removeClass("has-success");
        $(input).parent().addClass("has-error");
        $( ".confMod button:first-child" ).attr("disabled",true);
      }
      break;
    case "telefono":
    //Validacion para los input de telefono
      var exprNombre = /^(\+\d\d)*\d{9}$/;
      if(exprNombre.test(element.value) && element.value.length < 12){
        $(input).parent().removeClass("has-error");
        $(input).parent().addClass("has-success");
        $( ".confMod button:first-child" ).attr("disabled",false);
      }else{
        $(input).parent().removeClass("has-success");
        $(input).parent().addClass("has-error");
        $( ".confMod button:first-child" ).attr("disabled",true);
      }
      break;
    case "movil":
    //Validacion para los input de movil
      var exprNombre = /^(\+\d\d)*\d{9}$/;
      if(exprNombre.test(element.value) && element.value.length < 12){
        $(input).parent().removeClass("has-error");
        $(input).parent().addClass("has-success");
        $( ".confMod button:first-child" ).attr("disabled",false);
      }else{
        $(input).parent().removeClass("has-success");
        $(input).parent().addClass("has-error");
        $( ".confMod button:first-child" ).attr("disabled",true);        
      }
      break;
    case "email":
      //Validacion para los input de email
      // patron para validar email obtenido de : http://w3.unpocodetodo.info/utiles/regex-ejemplos.php?type=email
      var exprNombre = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
      if(exprNombre.test(element.value) && element.value.length < 40){
        $(input).parent().removeClass("has-error");
        $(input).parent().addClass("has-success");
        $( ".confMod button:first-child" ).attr("disabled",false);
      }else{
        $(input).parent().removeClass("has-success");
        $(input).parent().addClass("has-error");
        $( ".confMod button:first-child" ).attr("disabled",true);
      }
      break;
    case "tSuscripcion":
    //Validacion para el select de tipo de suscripcion
      var exprNombre = /((pre)||(fre)||(nor)){1}/;
      input = "form select[name=" + element.name + "]";
      if(exprNombre.test(element.value) && element.value != ""){
        $(input).parent().removeClass("has-error");
        $(input).parent().addClass("has-success");
        $( ".confMod button:first-child" ).attr("disabled",false);
      }else{
        $(input).parent().removeClass("has-success");
        $(input).parent().addClass("has-error");
        $( ".confMod button:first-child" ).attr("disabled",true);
      }
      break;

    default:
      console.log("error... input no pertenece al formulario de tiendas...");
      break;
  }
  
}
//Funcion enviada a las validaciones de los inputs de formularios de tienda

$( "#resultadoBusquedaElementos" ).click( function() {
  
  $("form input").keyup(validarTienda);
  $("form input").focusin(validarTienda);
  $("form input").focusout(validarTienda);
  
  $("form select").change(validarTienda);
  $("form select").focusin(validarTienda);
  $("form select").focusout(validarTienda);

});
//Valida los elementos de una tienda cuando se pulsa una tecla, toma el foco o lo deja en el formulario de modificacion

$( "#nuevoElemento" ).click( function() {
  
  $("form input").keyup(validarTienda);
  $("form input").focusin(validarTienda);
  $("form input").focusout(validarTienda);
  
  $("form select").change(validarTienda);
  $("form select").focusin(validarTienda);
  $("form select").focusout(validarTienda);
});
//Valida los elementos de una tienda cuando se pulsa una tecla, toma el foco o lo deja en el formulario de alta
