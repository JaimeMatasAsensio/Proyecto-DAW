"use strict";
/*Documento para implementar las funcionalidades de los formularios y sus validaciones */

/*Acciones con JQuery*/
$(document).ready(function(){
  /*Objetos planos para recoger valores y realizar JSON*/
  var tienda = {
    codTienda: "",
    nombre: "",
    pais: "",
    provincia: "",
    poblacion: "",
    direccion: "",
    numero: "",
    telefono: "",
    movil: "",
    email: "",
    tipoSuscripcion: ""
  };
  
    /*Objeto Tienda */

  function resetTienda(tienda){
    tienda.codTienda = "";
    tienda.nombre =  "";
    tienda.pais = "";
    tienda.provincia = "";
    tienda.poblacion = "";
    tienda.direccion = "";
    tienda.numero = "";
    tienda.telefono = "";
    tienda.movil = "";
    tienda.email = "";
    tienda.tipoSuscripcion = "";   
  }
  /*Reset de valores del objeto Tienda */

  $( ".divMod button" ).click( function() {
    var form = $( ".divMod" ).parent().prev();
    form = form[0];
    for( var i = 1; i < form.length ; i++){
      var type = form[i].type;
      if(type != "hidden"){
        form[i].disabled = false;
      }
    }
    switch (form.name) {
      case "tienda":
        tienda.codTienda = form[1].value;
        tienda.nombre = form[2].value;
        tienda.pais = form[3].value;
        tienda.provincia = form[4].value;
        tienda.poblacion = form[5].value;
        tienda.direccion = form[6].value;
        tienda.numero = form[7].value;
        tienda.telefono = form[8].value;
        tienda.movil = form[9].value;
        tienda.email = form[10].value;
        var i = 0;
        while(tienda.tipoSuscripcion == ""){
          tienda.tipoSuscripcion = form[11][i].selected?form[11][i].value:"";
          i++;
        }
        break;
      
      case "usuario":
        
        break;
      
      case "producto":
        
        break;
      
      default:
        break;
    }
	});
  /*Habilita los campos del formulario y toma los valores por si se cancela la modificacion*/

  $( ".confMod button.cancelMod" ).click( function() {
		var form = $( ".divMod" ).parent().prev();
    form = form[0];
    
    switch (form.name) {
      case "tienda":
        form[1].value = tienda.codTienda;
        form[2].value = tienda.nombre;
        form[3].value = tienda.pais;
        form[4].value = tienda.provincia;
        form[5].value = tienda.poblacion;
        form[6].value = tienda.direccion;
        form[7].value = tienda.numero;
        form[8].value = tienda.telefono;
        form[9].value =  tienda.movil;
        form[10].value = tienda.email;
        
        for(var i = 0; i < form[11].length; i++){
          form[11][i].selected = form[11][i].value == tienda.tipoSuscripcion ? true : false ;
        }
        resetTienda(tienda);
        break;
      
      case "usuario":
        //Formulario de usuarios
        break;
      
      case "producto":
        //Formularios de productos
        break;
      
      default:
        break;
    }

    for( var i = 1; i < form.length ; i++){
      var type = form[i].type;
      if(type != "hidden"){
        form[i].disabled = true;
      }
    }
    
	});
  /*Deshabilita los campos del formulario de modificacion y recoje los valores antiguos*/


  $( ".confMod button:first-child" ).click( function() {
    var form = $( ".divMod" ).parent().prev();
    form = form[0];
    switch (form.name) {
      case "tienda":
        //Validar antes de enviar

        //Montar el obj, para convertirlo a JSON
        tienda.codTienda = form[1].value;
        tienda.nombre = form[2].value;
        tienda.pais = form[3].value;
        tienda.provincia = form[4].value;
        tienda.poblacion = form[5].value;
        tienda.direccion = form[6].value;
        tienda.numero = form[7].value;
        tienda.telefono = form[8].value;
        tienda.movil = form[9].value;
        tienda.email = form[10].value;
        var i = 0;
        while(tienda.tipoSuscripcion == ""){
          tienda.tipoSuscripcion = form[11][i].selected?form[11][i].value:"";
          i++;
        }
        //AJAX
        var parametros = {
          accion: "mantenimentoTiendas",
          operacion:  "modificacion",
          json: JSON.stringify(tienda)
        };
        $.ajax({
          data: parametros,
          url: "../_web/controller.php",
          type: "post"
        }).done(function(response,estado,jqXHR){
          var tiendaUpdated = JSON.parse(response);
          console.log(tiendaUpdated);
        }).fail(function(jqXHR,estado,error){
          console.log(error);
          console.log(estado);
        }); 
        break;
      
      case "usuario":
        //Formularios de usuarios
        break;
      
      case "producto":
        //Formularios de productos
        break;
      
      default:
        break;
    }
  });
  /*Funcion de envio de datos por ajax con JSON*/
  


});//Fin del documentReady