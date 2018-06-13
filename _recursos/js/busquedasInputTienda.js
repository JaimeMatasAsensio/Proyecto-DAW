//Documento para implementar las busquedas en la tienda

$("#tBusqueda").change( function(){
    
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