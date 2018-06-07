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
  //Segun el nombre del input recibe un tratamiento u otro
  switch (element.name) {
    case "nombre":
    //validacion para los input de nombre
      var exprNombre = /^[áéíóúÁÉÍÓÚüÜñÑ]*([aA-zZ]+[áéíóúÁÉÍÓÚüÜñÑ]*\s*)+$/;
      //Comprueba la longitud y que admite la expresion regular
      if(exprNombre.test(element.value) && element.value.length < 30){
        //si todo es true
        $( this ).parent().removeClass("has-error");
        $( this ).parent().addClass("has-success");
        //Antes de habilitar el envio, busca que ho exista la clase "has-error" en otros inputs
        var divInputs = element.parentElement.parentElement.children;
        //busca en las divisiones del Formulario la classe "has-error"
        for(var i = 0; i < divInputs.length ; i++){
          if(divInputs[i].className == "form-group col-xs-12 col-sm-6 has-success"){
            //Si no encuentra una division con la clase "has-error" habilita el boton de enviar
            //
            $( this ).parent().parent().parent().parent().parent().next().find("button.btn.btn-success").attr("disabled",false);
            
          }else{
            //Si encuentra una division con la clase "has-error" deshabilita el boton de enviado y no revisa otras divisiones
            $( this ).parent().parent().parent().parent().parent().next().find("button.btn.btn-success").attr("disabled",true);
            
            i = divInputs.length; 
          }
        }
      }else{
        //Si falla los requisitos de la validaion deshabilita el boton de envio
        $( this ).parent().removeClass("has-success");
        $( this ).parent().addClass("has-error");
        $( this ).parent().parent().parent().parent().parent().next().find("button.btn.btn-success").attr("disabled",true);
        
      }
      break;
    case "pais":
    //Validacion para los input de pais
      var exprNombre = /^[áéíóúÁÉÍÓÚüÜñÑ]*([aA-zZ]+[áéíóúÁÉÍÓÚüÜñÑ]*\s*)+$/;
      if(exprNombre.test(element.value) && element.value.length < 30){
        $( this ).parent().removeClass("has-error");
        $( this ).parent().addClass("has-success");
        //Antes de habilitar el envio, busca que ho exista la clase "has-error" en otros inputs
        var divInputs = element.parentElement.parentElement.children;
        for(var i = 0; i < divInputs.length ; i++){
          if(divInputs[i].className == "form-group col-xs-12 col-sm-6 has-success" ){
            $( this ).parent().parent().parent().parent().parent().next().find("button.btn.btn-success").attr("disabled",false);
            
          }else{
            $( this ).parent().parent().parent().parent().parent().next().find("button.btn.btn-success").attr("disabled",true);
            
            i = divInputs.length; 
          }
        }
      }else{
        $( this ).parent().removeClass("has-success");
        $( this ).parent().addClass("has-error");
        $( this ).parent().parent().parent().parent().parent().next().find("button.btn.btn-success").attr("disabled",true);
        
      }
      break; 
    case "provincia":
    //validacion para los input de provincia
      var exprNombre = /^[áéíóúÁÉÍÓÚüÜñÑ]*([aA-zZ]+[áéíóúÁÉÍÓÚüÜñÑ]*\s*)+$/;
      if(exprNombre.test(element.value) && element.value.length < 30){
        $( this ).parent().removeClass("has-error");
        $( this ).parent().addClass("has-success");
        //Antes de habilitar el envio, busca que ho exista la clase "has-error" en otros inputs
        var divInputs = element.parentElement.parentElement.children;
        for(var i = 0; i < divInputs.length ; i++){
          if(divInputs[i].className == "form-group col-xs-12 col-sm-6 has-success"){
            $( this ).parent().parent().parent().parent().parent().next().find("button.btn.btn-success").attr("disabled",false);
            
          }else{
            $( this ).parent().parent().parent().parent().parent().next().find("button.btn.btn-success").attr("disabled",true);
            
            i = divInputs.length; 
          }
        }
      }else{
        $( this ).parent().removeClass("has-success");
        $( this ).parent().addClass("has-error");
        $( this ).parent().parent().parent().parent().parent().next().find("button.btn.btn-success").attr("disabled",true);
        
      }
      break;
    case "poblacion":
    //Validacion para los input de poblacion
      var exprNombre = /^[áéíóúÁÉÍÓÚüÜñÑ]*([aA-zZ]+[áéíóúÁÉÍÓÚüÜñÑ]*\s*)+$/;
      if(exprNombre.test(element.value) && element.value.length < 30){
        $( this ).parent().removeClass("has-error");
        $( this ).parent().addClass("has-success");
        //Antes de habilitar el envio, busca que ho exista la clase "has-error" en otros inputs
        var divInputs = element.parentElement.parentElement.children;
        for(var i = 0; i < divInputs.length ; i++){
          if(divInputs[i].className == "form-group col-xs-12 col-sm-6 has-success"){
            $( this ).parent().parent().parent().parent().parent().next().find("button.btn.btn-success").attr("disabled",false);
            
          }else{
            $( this ).parent().parent().parent().parent().parent().next().find("button.btn.btn-success").attr("disabled",true);
            
            i = divInputs.length; 
          }
        }
      }else{
        $( this ).parent().removeClass("has-success");
        $( this ).parent().addClass("has-error");
        $( this ).parent().parent().parent().parent().parent().next().find("button.btn.btn-success").attr("disabled",true);
        
      }
      break;
    case "direccion":
    //validacion para los input de direccion
      var exprNombre = /^([aA-zZ]+[áéíóúÁÉÍÓÚüÜñÑ]*\s*\/*\s*)*[áéíóúÁÉÍÓÚüÜñÑ]*[aA-zZ]+([aA-zZ]+[áéíóúÁÉÍÓÚüÜñÑ]*\s*)+$/;
      if(exprNombre.test(element.value) && element.value.length < 50){
        $( this ).parent().removeClass("has-error");
        $( this ).parent().addClass("has-success");
        //Antes de habilitar el envio, busca que ho exista la clase "has-error" en otros inputs
        var divInputs = element.parentElement.parentElement.children;
        for(var i = 0; i < divInputs.length ; i++){
          if(divInputs[i].className == "form-group col-xs-12 col-sm-6 has-success"){
            $( this ).parent().parent().parent().parent().parent().next().find("button.btn.btn-success").attr("disabled",false);
            
          }else{
            $( this ).parent().parent().parent().parent().parent().next().find("button.btn.btn-success").attr("disabled",true);
            
            i = divInputs.length; 
          }
        }
      }else{
        $( this ).parent().removeClass("has-success");
        $( this ).parent().addClass("has-error");
        $( this ).parent().parent().parent().parent().parent().next().find("button.btn.btn-success").attr("disabled",true);
       
        
      }
      break;
    case "numero":
    //validacion para los input de numero
      var exprNombre = /^\d{1,6}$/;
      if(exprNombre.test(element.value) && element.value.length < 6){
        $( this ).parent().removeClass("has-error");
        $( this ).parent().addClass("has-success");
        //Antes de habilitar el envio, busca que ho exista la clase "has-error" en otros inputs
        var divInputs = element.parentElement.parentElement.children;
        for(var i = 0; i < divInputs.length ; i++){
          if(divInputs[i].className == "form-group col-xs-12 col-sm-6 has-success"){
            $( this ).parent().parent().parent().parent().parent().next().find("button.btn.btn-success").attr("disabled",false);
            
          }else{
            $( this ).parent().parent().parent().parent().parent().next().find("button.btn.btn-success").attr("disabled",true);
            
            i = divInputs.length; 
          }
        }
      }else{
        $( this ).parent().removeClass("has-success");
        $( this ).parent().addClass("has-error");
        $( this ).parent().parent().parent().parent().parent().next().find("button.btn.btn-success").attr("disabled",true);
        
      }
      break;
    case "telefono":
    //Validacion para los input de telefono
      var exprNombre = /^(\+\d\d)*\d{9}$/;
      if(exprNombre.test(element.value) && element.value.length < 12){
        $( this ).parent().removeClass("has-error");
        $( this ).parent().addClass("has-success");
        //Antes de habilitar el envio, busca que ho exista la clase "has-error" en otros inputs
        var divInputs = element.parentElement.parentElement.children;
        for(var i = 0; i < divInputs.length ; i++){
          if(divInputs[i].className == "form-group col-xs-12 col-sm-6 has-success"){
            $( this ).parent().parent().parent().parent().parent().next().find("button.btn.btn-success").attr("disabled",false);
            
          }else{
            $( this ).parent().parent().parent().parent().parent().next().find("button.btn.btn-success").attr("disabled",true);
            
            i = divInputs.length; 
          }
        }
      }else{
        $( this ).parent().removeClass("has-success");
        $( this ).parent().addClass("has-error");
        $( this ).parent().parent().parent().parent().parent().next().find("button.btn.btn-success").attr("disabled",true);
        
      }
      break;
    case "movil":
    //Validacion para los input de movil
      var exprNombre = /^(\+\d\d)*\d{9}$/;
      if(exprNombre.test(element.value) && element.value.length < 12){
        $( this ).parent().removeClass("has-error");
        $( this ).parent().addClass("has-success");
        //Antes de habilitar el envio, busca que ho exista la clase "has-error" en otros inputs
        var divInputs = element.parentElement.parentElement.children;
        for(var i = 0; i < divInputs.length ; i++){
          if(divInputs[i].className == "form-group col-xs-12 col-sm-6 has-success"){
            $( this ).parent().parent().parent().parent().parent().next().find("button.btn.btn-success").attr("disabled",false);
           
          }else{
            $( this ).parent().parent().parent().parent().parent().next().find("button.btn.btn-success").attr("disabled",true);
           
            i = divInputs.length; 
          }
        }
      }else{
        $( this ).parent().removeClass("has-success");
        $( this ).parent().addClass("has-error");
        $( this ).parent().parent().parent().parent().parent().next().find("button.btn.btn-success").attr("disabled",true);
       
      }
      break;
    case "email":
    /*Validacion para los input de email
    patron para validar email obtenido de : http://w3.unpocodetodo.info/utiles/regex-ejemplos.php?type=email*/
      var exprNombre = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)+$/;
      if(exprNombre.test(element.value) && element.value.length < 40){
        $( this ).parent().removeClass("has-error");
        $( this ).parent().addClass("has-success");
        //Antes de habilitar el envio, busca que ho exista la clase "has-error" en otros inputs
        var divInputs = element.parentElement.parentElement.children;
        for(var i = 0; i < divInputs.length ; i++){
          if(divInputs[i].className == "form-group col-xs-12 col-sm-6 has-success"){
            $( this ).parent().parent().parent().parent().parent().next().find("button.btn.btn-success").attr("disabled",false);
        
          }else{
            $( this ).parent().parent().parent().parent().parent().next().find("button.btn.btn-success").attr("disabled",true);
        
            i = divInputs.length; 
          }
        }
      }else{
        $( this ).parent().removeClass("has-success");
        $( this ).parent().addClass("has-error");
        $( this ).parent().parent().parent().parent().parent().next().find("button.btn.btn-success").attr("disabled",true);
        
      }
      break;
    case "tSuscripcion":
    //Validacion para el select de tipo de suscripcion
      var exprNombre = /((pre)||(fre)||(nor)){1}/;
      if(exprNombre.test(element.value) && element.value != ""){
        $( this ).parent().removeClass("has-error");
        $( this ).parent().addClass("has-success");
        //Antes de habilitar el envio, busca que ho exista la clase "has-error" en otros inputs
        var divInputs = element.parentElement.parentElement.children;
        for(var i = 0; i < divInputs.length ; i++){
          if(divInputs[i].className == "form-group col-xs-12 col-sm-6 has-success"){
            $( this ).parent().parent().parent().parent().parent().next().find("button.btn.btn-success").attr("disabled",false);
            
          }else{
            $( this ).parent().parent().parent().parent().parent().next().find("button.btn.btn-success").attr("disabled",true);
            
            i = divInputs.length; 
          }
        }
      }else{
        $( this ).parent().removeClass("has-success");
        $( this ).parent().addClass("has-error");
        $( this ).parent().parent().parent().parent().parent().next().find("button.btn.btn-success").attr("disabled",true);
        
      }
      break;

    default:
      console.log("error... input no pertenece al formulario de tiendas...");
      break;
  }
  
}
//Funcion enviada a las validaciones de los inputs de formularios de tienda

$( "#resultadoBusquedaElementos" ).click( function() {
  
  $("#formsResaultadoBusqueda form input").keyup(validarTienda);
  $("#formsResultadoBusqueda form input").focusin(validarTienda);
  $("#formsResaultadoBusqueda form input").focusout(validarTienda);
  
  $("#formsResaultadoBusqueda form select").change(validarTienda);
  $("#formsResultadoBusqueda form select").focusin(validarTienda);
  $("#formsResaultadoBusqueda form select").focusout(validarTienda);

});
//Valida los elementos de una tienda cuando se pulsa una tecla, toma el foco o lo deja en el formulario de modificacion

$( "#nuevoElemento" ).click( function() {
  
  $("#formNuevoElemento form input").keyup(validarTienda);
  //$("form input").focusin(validarTienda);
  $("#formNuevoElemento form input").focusout(validarTienda);
  
  $("#formNuevoElemento form select").change(validarTienda);
  //$("form select").focusin(validarTienda);
  $("#formNuevoElemento form select").focusout(validarTienda);
});
//Valida los elementos de una tienda cuando se pulsa una tecla, toma el foco o lo deja en el formulario de alta
