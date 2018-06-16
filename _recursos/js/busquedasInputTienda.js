"use strict";
//Documento para implementar las busquedas en la tienda

  $("#tBusqueda").change( function(){
    var btnBusqueda = $(this).parent().next().next();
    btnBusqueda[0].disabled = "true";
    var elementsBusqueda = $(this).parent().next().children();
    console.log(elementsBusqueda);
    if($(this).val() == "nombre" || $( this ).val() == "" || $( this ).val() == "codTienda"){
      elementsBusqueda[0].style.display = "inline-block";
      elementsBusqueda[1].style.display = "none";
    }
    
    if ($(this).val() == "tsuscripcion"){
      elementsBusqueda[1].style.display = "inline-block" ;
      elementsBusqueda[0].style.display = "none" ;
    }
    
  
    elementsBusqueda[1].value = "";
    elementsBusqueda[2].value = "";
    $( this ).parent().next().children().css({borderColor: "#ccc"});
    
  });
  //Funcion para modificar el tipo de input en la busqueda
  
  $( "#elementosBusqueda input[name=busqueda]" ).keyup( function (){
    var selectValue = $( this ).parent().prev().children( "select" ).val();
    switch (selectValue) {
      case "nombre":
        var exprNombre = /^[áéíóúÁÉÍÓÚüÜñÑ]*([aA-zZ]+[áéíóúÁÉÍÓÚüÜñÑ]*\s*)+$/;
        var valInput = $(this).val();
        if(exprNombre.test( valInput ) && valInput.length < 30){
          $( this ).parent().next("button").attr("disabled",false);
          $( this ).css({borderColor: "#3c763d"}); // color verde
        }else{
          $( this ).parent().next("button").attr("disabled",true);
          $( this ).css({borderColor: "#a94442"}); // color  rojo
        }
        break;
      case "codTienda":
      var exprNombre = /^\d{1,3}$/;
      var valInput = $(this).val();
      if(exprNombre.test( valInput ) && valInput.length < 30){
        $( this ).parent().next("button").attr("disabled",false);
        $( this ).css({borderColor: "#3c763d"}); // color verde
      }else{
        $( this ).parent().next("button").attr("disabled",true);
        $( this ).css({borderColor: "#a94442"}); // color  rojo
      }
        break;
    }
  });
    /*Validacion para busquedas por codigo o nombre*/
  
  $( "#elementosBusqueda select[name=selBusqueda]" ).change(function (){
    var valSelectBusqueda = $( this ).val();
    console.log(valSelectBusqueda);
    console.log($( this ).parent().next("button"));
    if( valSelectBusqueda ==  "pre" || valSelectBusqueda ==  "nor" || valSelectBusqueda ==  "fre"){
      console.log($( this ).parent().next("button"));
      $( this ).parent().next("button").attr("disabled", false);
      $( this ).css({borderColor: "#3c763d"}); // color verde
    }else{
      $( this ).css({borderColor: "#a94442"}); // color  rojo
      $( this ).parent().next("button").attr("disabled", true);
    }
  });
  /*Habilita el boton de busqueda siempre que suscripcion sea valida*/

