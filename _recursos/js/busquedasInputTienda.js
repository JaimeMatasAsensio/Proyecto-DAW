"use strict";
//Documento para implementar las busquedas en la tienda

$("#tBusqueda").change( function(){
  var btnBusqueda = $(this).parent().next().next();
  btnBusqueda[0].disabled = "true";
  var elementsBusqueda = $(this).parent().next().children();
  elementsBusqueda[1].style.display = $(this).val() == "nombre" || $( this ).val() == "" || $( this ).val() == "codTienda" ? "inline-block" : "none";
  elementsBusqueda[2].style.display = $(this).val() == "tsuscripcion" ? "inline-block" : "none";

  elementsBusqueda[1].value = "";
  elementsBusqueda[2].value = "";

  if($(this).val() == "nombre" || $( this ).val() == "" || $( this ).val() == "codTienda"){
    elementsBusqueda[2].required = false;
    elementsBusqueda[1].required = true;
  }else{
    elementsBusqueda[2].required = true;
    elementsBusqueda[1].required = false;
  }
  
});
//Funcion para modificar el tipo de input en la busqueda

$( "#elementosBusqueda input[name=busqueda]" ).keypress( function (){
  var selectValue = $( this ).parent().prev().children( "select" ).val();
  switch (selectValue) {
    case "nombre":
      var exprNombre = /^[áéíóúÁÉÍÓÚüÜñÑ]*([aA-zZ]+[áéíóúÁÉÍÓÚüÜñÑ]*\s*)+$/;
      var valInput = $(this).val();
      if(exprNombre.test( valInput ) && valInput.length < 30){
        $( this ).parent().next("button").attr("disabled",false);
      }else{
        $( this ).parent().next("button").attr("disabled",true);
      }
      break;
    case "codTienda":
    var exprNombre = /^\d{1,3}$/;
    var valInput = $(this).val();
    if(exprNombre.test( valInput ) && valInput.length < 30){
      $( this ).parent().next("button").attr("disabled",false);
    }else{
      $( this ).parent().next("button").attr("disabled",true);
    }
      break;
  }
});
//Funcion para validar las busquedas en tienda