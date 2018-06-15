//Documento para implementar las busquedas en la usuario
/*
Jaime Matas Asensio
Proyecto DAW: ShopSphere
I.E.S. Maestre de Calatrava - Ciudad Real
2018
*/
$("#tBusqueda").change( function(){
  //Obtenemos el input de texto para la busqueda
  var elementBusqueda = $(this).parent().next().children("#busqueda");
  elementBusqueda.val("");
  //Si el valor del select es igual a nombre valida este valor para String de nombres
    //This->Select
  if($(this).val() == "nombre"){
    //Deshabilitamos por defecto el boton
    elementBusqueda.parent().next("button").attr("disabled", true);
    //Asignamos la funcion keyup para que valide mientras escribe
    elementBusqueda.keyup(function(){
      //expresion regular para no introducir numeros, solo letras y letras con acentos
      var pattrNombre = /^[áéíóúÁÉÍÓÚüÜñÑ]*([aA-zZ]+[áéíóúÁÉÍÓÚüÜñÑ]*\s*)+$/;
      //Obtenemos el valor del input de busqueda. this->input#busqueda
      var valorInputBusqueda = $(this).val();
      //si cumple la expresion regular habilita el boton de busqueda...
      if(pattrNombre.test(valorInputBusqueda)){
        elementBusqueda.parent().next("button").attr("disabled", false);
      }else{
        //...si no deshabilita el boton
        elementBusqueda.parent().next("button").attr("disabled", true);
      }
    });

  }else{
    //Si el valor del select es dustino a nombre valida este valor para codUsuario
    //Deshabilitamos por defecto el boton
    elementBusqueda.parent().next("button").attr("disabled", true);
    //Asignamos la funcion keyup para que valide mientras escribe
    elementBusqueda.keyup(function(){
      //expresion regular para introducir numeros solo 3
      var pattrNumero = /^\d{1,3}$/;
      //Obtenemos el valor del input de busqueda. this->input#busqueda
      var valorInputBusqueda = $(this).val();
      //si cumple la expresion regular habilita el boton de busqueda...
      if(pattrNumero.test(valorInputBusqueda)){
        elementBusqueda.parent().next("button").attr("disabled", false);
      }else{
        //...si no deshabilita el boton
        elementBusqueda.parent().next("button").attr("disabled", true);
      }
    })
  }
  
  
});
//Funcion para validar el input de busqueda bloqueando el boton de buscar

$("#formNuevoElemento form select[name=nAcceso]").change(function () {
  
  if( ( $(this).val() ) == "adm"){
    $("#formNuevoElemento form select[name=accesoTienda]").val("0");
  }else{
    $("#formNuevoElemento form select[name=accesoTienda]").val("");
  }
});
//Funcion para bloquear el select de acceso cuando el acceso es de administrador

$("#formNuevoElemento form select[name=accesoTienda]").change(function () {
  
  if( ( $(this).val() ) == "0"){
    $("#formNuevoElemento form select[name=nAcceso]").val("adm");
  }
});
//Funcion para bloquear el select de acceso cuando el acceso es de administrador