//Documento para implementar las busquedas en la usuario
/*
Jaime Matas Asensio
Proyecto DAW: ShopSphere
I.E.S. Maestre de Calatrava - Ciudad Real
2018
*/
$("#tBusqueda").change( function(){
  
  var pattrnNumero = "/^\d{1,3}$/";
  var elementBusqueda = $(this).parent().next().children();
  
  
  if($(this).val() == "nombre"){
    elementBusqueda.find("#busqueda").keyup(function(){
      var pattrNombre = "/^[áéíóúÁÉÍÓÚüÜñÑ]*([aA-zZ]+[áéíóúÁÉÍÓÚüÜñÑ]*\s*)+$/";
      if(pattrNombre.test($(this).val)){
        elementBusqueda.parent().next().attr("disabled", false);
      }else{
        elementBusqueda.parent().next().attr("disabled", true);
      }
    })
  }else{
    elementBusqueda.find("#busqueda").keyup(function(){
      if(pattrNumero.test($(this).val)){
        var pattrnNumero = "/^\d{1,3}$/";
        elementBusqueda.parent().next().attr("disabled", false);
      }else{
        elementBusqueda.parent().next().attr("disabled", true);
      }
    })
  }
  console.log(elementBusqueda.find("#busqueda"));
});
//Funcion para modificar el tipo de input en la busqueda