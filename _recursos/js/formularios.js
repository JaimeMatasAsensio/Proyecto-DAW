"use strict";
/*Documento para implementar las funcionalidades de los formularios y sus validaciones */
/*
Jaime Matas Asensio
Proyecto DAW: ShopSphere
I.E.S. Maestre de Calatrava - Ciudad Real
2017
*/
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

  $( ".divMod button" ).click( function(element) {
    
    //Capas de Bloqueo de otros formularios <---onWork: levantar las capas de bloqueo de otros formularios durante la modificacion
    var othersOverFlow = $( "div.overFlowForms" );
    console.log(othersOverFlow);

    //obtenemos el boton de modificacion
    var btnMod = element.target
    //Obtenemos la division de los controles de modificacion
    var divControlMod = btnMod.parentElement.nextElementSibling;
    //Obtenemos el formulario al que pertenece el boton de modificacion
    var form = divControlMod.parentElement.parentElement.children[3];
    //Deshabilita el boton de aceptar modificacion
    divControlMod.children[0].disabled = "true";
    //Habilita los campos del formulario
    for( var i = 1; i < form.length ; i++){
      var type = form[i].type;
      if(type != "hidden"){
        form[i].disabled = false;
      }
    }
    //guarda los valores previos en el formulario
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
        var i = 1;
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
    var form = $( this ).parent().parent().prev();
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
        
        for(var i = 1; i < form[11].length; i++){
          form[11][i].selected = form[11][i].value == tienda.tipoSuscripcion ? true : false ;
        }

        for(var i = 2; i < form.length ; i++){
          form[i].parentElement.className = form.tagName == "TEXTAREA" ? "form-group col-xs-12 col-sm-12" : "form-group col-xs-12 col-sm-6" ;
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

  //-------------------------->ini-Modificacion<--------------------------//
  $( ".confMod button:first-child" ).click( function(element) {
    //Obtenemos los elementes que pertenecen al boton donde se ha hecho click
    //Formulario
    var form = element.target.parentElement.parentElement.parentElement.children[3];
    //Capa de bloqueo del formulario
    var overFlow = element.target.parentElement.parentElement.parentElement.children[2];
    //Capa de mensaje de retorno
    var infoProcess = element.target.parentElement.parentElement.parentElement.children[0];
    var othersOverFlow = $( "div.overFlowForms:not(#onProcessOverFlow)" )
    /*
    console.log(form);
    console.log(form[4]);
    console.log(overFlow);
    console.log(infoProcess);
    */
    overFlow.id = "onProcessOverFlow";
    infoProcess.id = "onProcessInfo";
    
    //Segun el nombre del formulario, que esta asociado a la tabla a la que hace referencia...
    switch (form.name) {
      case "tienda":
        //Divisiones de informacion y bloqueo del formulario mientras se realiza el AJAX
        $( "#onProcessInfo" ).text("");
        $( "#onProcessOverFlow" ).animate({zIndex:"1"});
      
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
        tienda.tipoSuscripcion = form[11].value;
                
        //AJAX - Modoifcacion Tienda
        //Parametros de la peticion ajax para la modificacion de tienda
        var parametros = {
          accion: "mantenimentoTiendas",
          operacion:  "modificacion",
          json: JSON.stringify(tienda)
        };
        //Envio de AJAX
        $.ajax({
          data: parametros,
          url: "../_web/controller.php",
          type: "post"
        }).done(function(response,estado,jqXHR){
          console.log("---------->Retorno de AJAX : DONE<-----------");
          console.log(response);
          console.log(estado);
          console.log(jqXHR);
          console.log("---------->Retorno de AJAX : DONE<-----------");
          //Peticion terminada con resultado correcto
          var tiendaUpdated = JSON.parse(response);
          //Toma los nuevos valores y los inserta en el formulario
          form[1].value = tiendaUpdated.codTienda;
          form[2].value = tiendaUpdated.nombre;
          form[3].value = tiendaUpdated.pais;
          form[4].value = tiendaUpdated.provincia;
          form[5].value = tiendaUpdated.poblacion;
          form[6].value = tiendaUpdated.direccion;
          form[7].value = tiendaUpdated.numero;
          form[8].value = tiendaUpdated.telefono;
          form[9].value =  tiendaUpdated.movil;
          form[10].value = tiendaUpdated.email;
          for(var i = 1; i < form[11].length; i++){
            form[11][i].selected = form[11][i].value == tiendaUpdated.tipoSuscripcion ? true : false ;
          }
          //Deshabilita la modificacion de campos
          for( var i = 1; i < form.length ; i++){
            var type = form[i].type;
            if(type != "hidden"){
              form[i].disabled = true;
            }
          }
          //Oculta la division de control de modificacion y muestra de la division de modificacion
          $( ".divMod" ).show();
          $(".confMod").hide();
          $( "#onProcessInfo" ).text(tiendaUpdated.msgReturn)
          
        }).fail(function(jqXHR,estado,error){
          //Errores en la peticion de AJAX
          console.log("---------->Retorno de AJAX : FAIL<-----------");
          console.log(error);
          console.log(estado);
          console.log(jqXHR);
          console.log("---------->Retorno de AJAX : FAIL<-----------");
          
        }).always(function(jqXHR,estado){
          // AJAX completado
          console.log("---------->Retorno de AJAX : ALWAYS<-----------");
          console.log(estado);
          console.log(jqXHR);
          console.log("---------->Retorno de AJAX : ALWAYS<-----------");
          //Animaciones tras la peticion AJAX y resultado  
            var aux = $( "#onProcessOverFlow" );
            var width = aux[0].offsetWidth;
            var height = aux[0].offsetHeight
            width = "-=" + width + "px";
            height = "-=" + height + "px";
            $( "#onProcessOverFlow" ).animate({height: height, width: width},500,function(){
              $( "#onProcessInfo" ).animate({zIndex: "1"}); 
              $( "#onProcessInfo" ).animate({opacity:0,zIndex: "-100"},3000,function(){
                $( "#onProcessInfo" ).css({opacity:1, zIndex: "-100"});
                $( "#onProcessOverFlow" ).css({width:"100%" , height: "100%", zIndex: "-100"}); 
                $("#onProcessInfo, #onProcessOverFlow").removeAttr("id");
                for(var i = 2; i < form.length; i++){
                  form[i].parentElement.className = "form-group col-xs-12 col-sm-6";
                }
              }); 
              
            });  
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
  /*Funcion de envio de datos por AJAX con JSON para la MODIFICACION del Formulario*/
  //-------------------------->fin-Modificacion<-------------------------//

  $( "#resultadoBusquedaElementos" ).click( function() {
    var formsBusqueda = $( "#formsResaultadoBusqueda div.row.formulario.formulario-crud form" );
    for(var i = 0 ; i < formsBusqueda.length ; i++){
      for(var j = 2 ; j < formsBusqueda[i].length ; j++){
        formsBusqueda[i][j].parentElement.className = formsBusqueda[i][j].tagName == "TEXTAREA" ? "form-group col-xs-12 col-sm-12" : "form-group col-xs-12 col-sm-6" ;
      }      
    }
  });
  //Funcion para quitar las marcas de validacion en los formularios de MODIFICACION cuando secierra la seccion 

  $( "#nuevoElemento" ).click( function() {
    var formsInsert = $( "#formNuevoElemento form" );
    formsInsert = formsInsert[0];
    for(var j = 1 ; j < formsInsert.length ; j++){
      formsInsert[j].parentElement.className = "form-group col-xs-12 col-sm-6";
    }      
    
    
  });
  //Funcion para resetar los input y quitar las marcas de validacion en los formularios de INSERCCION

  $( ".confInsert div:last-child button:last-child" ).click( function(){
    //$( this ) --> Boton cancelar del formulario de insercion
    //Recogemos el formulario de inserccion;
    var form = $( this ).parent().parent().prev();
    form = form[0];
    //Reiniciamos los valores y quitamos las marcas de validacion
    for( var i = 1; i < form.length ; i++){
      var type = form[i].type;
      if(type != "hidden"){
        form[i].value = "";
        form[i].parentElement.className = form.tagName == "TEXTAREA" ? "form-group col-xs-12 col-sm-12" : "form-group col-xs-12 col-sm-6" ;
      }
    }
  });
  /*Funcion de cancelacion de la inserccion del formulario de tienda. Limpia los campos de insercion de marcas de validacion y reinicia el formulario*/

//-------------------------->ini-Alta<-------------------------//
  $( ".confInsert div:first-child button:first-child" ).click( function(element){
    //Obtenemos los elementes que pertenecen al boton donde se ha hecho click
    //El formulario de alta
    var form = element.target.parentElement.parentElement.parentElement.children[3];
    //Capa de bloqueo del formulario
    var overFlow = element.target.parentElement.parentElement.parentElement.children[2];
    //capa de mensaje de retorno 
    var infoProcess = element.target.parentElement.parentElement.parentElement.children[0];
    
    /*
    console.log(form);
    console.log(overFlow);
    console.log(infoProcess);
    */
    
    //Aplicamos id especiales a la capa de bloqueo y de informacion del proceso
    overFlow.id = "onProcessOverFlow";
    infoProcess.id = "onProcessInfo";
    
    //Segun el nombre del formulario, que esta asociado a la tabla a la que hace referencia...
    switch (form.name) {
      case "tienda":
        //Divisiones de informacion y bloqueo del formulario mientras se realiza el AJAX
        $( "#onProcessInfo" ).text("");
        $( "#onProcessOverFlow" ).animate({zIndex:"1"});
      
        //Montar el obj, para convertirlo a JSON
        tienda.codTienda = "nuevo";
        tienda.nombre = form[1].value;
        tienda.pais = form[2].value;
        tienda.provincia = form[3].value;
        tienda.poblacion = form[4].value;
        tienda.direccion = form[5].value;
        tienda.numero = form[6].value;
        tienda.telefono = form[7].value;
        tienda.movil = form[8].value;
        tienda.email = form[9].value;
        tienda.tipoSuscripcion = form[10].value;
                
        //AJAX - ALTA Tienda
        //Parametros de la peticion ajax para la alta de tienda
        var parametros = {
          accion: "mantenimentoTiendas",
          operacion:  "alta",
          json: JSON.stringify(tienda)
        };
        //Envio de AJAX
        
        $.ajax({
          data: parametros,
          url: "../_web/controller.php",
          type: "post"
        }).done(function(response,estado,jqXHR){
          //Realiza este ?callBack¿ siempre que se completa la peticion AJAX al servidor
          console.log("----------->INI-Retorno de AJAX : DONE<-----------");
          console.log(response);
          console.log(estado);
          console.log(jqXHR);
          console.log("----------->FIN-Retorno de AJAX : DONE<-----------");
          //Peticion terminada con resultado correcto

          //Obtenemos el objeto JSON con la tienda del Retorno
          var resultadoInserccion = JSON.parse(response);
          
          //Determinamos que tipo de suscripcion tiene la nueva tienda
          var insertTiendaSuscripcion;
          switch (resultadoInserccion.tipoSuscripcion) {
            case "fre":
            insertTiendaSuscripcion = "Gratis";
              break;
            
            case "nor":
            insertTiendaSuscripcion = "Normal";
              break;
            
            case "pre":
            insertTiendaSuscripcion = "Premium";
              break;
            
            default:
              console.log("unknown resultadoInserccion.tipoSuscripcion");
              insertTiendaSuscripcion = "unknown";
              break;
          }
          //Añadimos la informacion al mensaje de retorno 
          $( "#onProcessInfo" ).text(resultadoInserccion.msgReturn);
          $( "#onProcessInfo ").append(
            "<span class='insertTiendaMsg'>cod.Tienda : " +resultadoInserccion.codTienda + "</span>"+
            "<span class='insertTiendaMsg'>Nombre : " +resultadoInserccion.codTienda + "</span>"+
            "<span class='insertTiendaMsg'>Suscripcion : " +insertTiendaSuscripcion + "</span>"
          );
        }).fail(function(jqXHR,estado,error){
          //Errores en la peticion de AJAX
          console.log("----------->INI-Retorno de AJAX : FAIL<-----------");
          console.log(error);
          console.log(estado);
          console.log(jqXHR);
          console.log("----------->FIN-Retorno de AJAX : FAIL<-----------");
          
        }).always(function(jqXHR,estado,jqXHR_last){
          // realiza este ?callBack¿ SIEMPRE que termine la peticion AJAX
          console.log("----------->INI-Retorno de AJAX : ALWAYS<-----------");
          console.log(estado);
          console.log(jqXHR);
          console.log(jqXHR_last);
          console.log("----------->FIN-Retorno de AJAX : ALWAYS<-----------");
          //Animaciones tras la peticion AJAX y resultado  
            var aux = $( "#onProcessOverFlow" );
            var width = aux[0].offsetWidth;
            var height = aux[0].offsetHeight
            width = "-=" + width + "px";
            height = "-=" + height + "px";
            //Levanta la capa de bloqueo y muestra el mensaje de retorno
            $( "#onProcessOverFlow" ).animate({height: height, width: width},500,function(){
              $( "#onProcessInfo" ).animate({zIndex: "1"}); 
              $( "#onProcessInfo" ).animate({opacity:0,zIndex: "-100"},10000,function(){
                $( "#onProcessInfo" ).css({opacity:1, zIndex: "-100"});
                $( "#onProcessOverFlow" ).css({width:"100%" , height: "100%", zIndex: "-100"});
                $( "#onProcessInfo" ).remove( "#onProcessInfo span" ); 
                $("#onProcessInfo, #onProcessOverFlow").removeAttr("id");
                for(var i = 2; i < form.length; i++){
                  form[i].parentElement.className = "form-group col-xs-12 col-sm-6";
                }
              }); 
              
            });  
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
  /*Funcion de envio de datos por AJAX con JSON para la INSERCCION del formulario<--on working*/
//-------------------------->fin-Alta<-------------------------//

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

//-------------------------->ini-Borrado<-------------------------//
  $(".confDelete button").click(function(element){
    //Obtenemos los elementos relacionados con el boton 
    //Capa de confirmacion de borrado
    var confirmDelete = element.target.parentElement.parentElement.parentElement.children[1];
    //formulario del elemento que se Borrara
    var form = element.target.parentElement.parentElement.parentElement.children[3];
    //capa de bloqueo del formulario
    var overFlow = element.target.parentElement.parentElement.parentElement.children[2];
    //Capa de informacion del proceso
    var infoProcess = element.target.parentElement.parentElement.parentElement.children[0];
    //Conjunto completo de todos los elementos
    var conjutoElementos = form.parentElement;

    //Creacion de elementos para confirmar el borrado de la tienda, son objetos de JQuery
    var pregunta = $("<h3 class='preguntaBorrado'>¿Borrar este elemento?</h3>");
    var divBotones = $("<div class='confirmarBorrado'></div>");
    var botonAceptar = $('<button class="btn btn-success"><span class="glyphicon glyphicon-ok"></span></button>');
    var botonCancelar = $('<button class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></button>');
    //Añadimos los botones a su division
    divBotones.append(botonAceptar);
    divBotones.append(botonCancelar);
    //Añadimos los elementos a la capa de confirmacion
    confirmDelete.append(pregunta[0]);
    confirmDelete.append(divBotones[0]);
    //Levantamos la capa de bloqueo y la capa de conformacion
    overFlow.style.zIndex = "45";
    confirmDelete.style.zIndex = "50";
    //Añadimos los eventos onclick en los botones
    //Evento de cancelar borrado - Remueve las capas
    botonCancelar.click(function (){
      overFlow.style.zIndex = "-100";
      confirmDelete.style.zIndex = "-100";
      divBotones.remove();
      pregunta.remove();
    });
    //Evento de aceptar borrado - inicia la comunicacion AJAX
    botonAceptar.click(function (){
      //Eliminamos la capa de confirmacion de borrado
      divBotones.remove();
      pregunta.remove();
      confirmDelete.style.zIndex = "-100";

      //Damos indices unicos a las capas de bloqueo y informacion del retorno
      overFlow.id = "onProcessOverFlow";
      infoProcess.id = "onProcessInfo";
    
    //Segun el nombre del formulario, que esta asociado a la tabla a la que hace referencia...
    switch (form.name) {
      case "tienda":
        //Divisiones de informacion y bloqueo del formulario mientras se realiza el AJAX
        $( "#onProcessInfo" ).text("");
        $( "#onProcessOverFlow" ).animate({zIndex:"1"});
      
        //Montar el obj, para convertirlo a JSON. Solo necesitamos el codigo de la tienda a borrar
        tienda.codTienda = form[1].value;
                
        //AJAX - borrar Tienda
        //Parametros de la peticion ajax para la modificacion de tienda
        var parametros = {
          accion: "mantenimentoTiendas",
          operacion:  "baja",
          json: JSON.stringify(tienda)
        };
        //Envio de AJAX
        $.ajax({
          data: parametros,
          url: "../_web/controller.php",
          type: "post"
        }).done(function(response,estado,jqXHR){
          console.log("---------->Retorno de AJAX : DONE<-----------");
          console.log(response);
          console.log(estado);
          console.log(jqXHR);
          console.log("---------->Retorno de AJAX : DONE<-----------");
          //Peticion terminada con resultado correcto
          var tiendaUpdated = JSON.parse(response);
          
          //Oculta la division de control de modificacion y muestra de la division de modificacion
          $( ".divMod" ).show();
          $(".confMod").hide();
          $( "#onProcessInfo" ).text(tiendaUpdated.msgReturn)
          
        }).fail(function(jqXHR,estado,error){
          //Errores en la peticion de AJAX
          console.log("---------->Retorno de AJAX : FAIL<-----------");
          console.log(error);
          console.log(estado);
          console.log(jqXHR);
          console.log("---------->Retorno de AJAX : FAIL<-----------");
          
        }).always(function(jqXHR,estado){
          // AJAX completado
          console.log("---------->Retorno de AJAX : ALWAYS<-----------");
          console.log(estado);
          console.log(jqXHR);
          console.log("---------->Retorno de AJAX : ALWAYS<-----------");
          //Animaciones tras la peticion AJAX y resultado  
            var aux = $( "#onProcessOverFlow" );
            var width = aux[0].offsetWidth;
            var height = aux[0].offsetHeight
            width = "-=" + width + "px";
            height = "-=" + height + "px";
            $( "#onProcessOverFlow" ).animate({height: height, width: width},500,function(){
              $( "#onProcessInfo" ).animate({zIndex: "1"}); 
              $( "#onProcessInfo" ).animate({opacity:0,zIndex: "-100"},3000,function(){
                $( "#onProcessInfo" ).css({opacity:1, zIndex: "-100"});
                $( "#onProcessOverFlow" ).css({width:"100%" , height: "100%", zIndex: "-100"}); 
                $("#onProcessInfo, #onProcessOverFlow").removeAttr("id");
                for(var i = 2; i < form.length; i++){
                  form[i].parentElement.className = "form-group col-xs-12 col-sm-6";
                }
              }); 
              
            });  
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
  });
//-------------------------->fin-Borrado<-------------------------//
  //Funcion 

});//Fin del documentReady