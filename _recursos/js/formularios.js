"use strict";
/*Documento para implementar las funcionalidades de los formularios y sus validaciones */
/*
Jaime Matas Asensio
Proyecto DAW: ShopSphere
I.E.S. Maestre de Calatrava - Ciudad Real
2017
*/
//Array de tiendas que se almacenaran durante la modificacion
var arrTiendas = [];
var arrUsuarios = [];
var arrAcceso = [];
/*Acciones con JQuery*/
$(document).ready(function(){
  

  $( ".divMod button" ).click( function(element) {
    //Alpulsar sobre el icono buscara el button para que apartir de ahi obtenga el resto de elementos
    element.target = element.target.tagName == "BUTTON" ? element.target : element.target.parentElement;
    //obtenemos el boton de modificacion
    var btnMod = element.target;
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
        //instanciamos un objeto de tienda
        var tienda = new Tienda();
        //Guardamos los vlaores del formulario
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
        //Guardamos en el array
        arrTiendas.push(tienda);
        
        break;
      
      case "usuario":
        //instanciamos un objeto de usuario
        var usuario = new Usuario();
        //Guardamos los vlaores del formulario
        usuario.codUsuario = form[1].value;
        usuario.nombre = form[2].value;
        usuario.email = form[3].value;
        usuario.password = form[4].value;
        usuario.nivelAcceso = form[5].value;

        while(usuario.nivelAcceso == ""){
          usuario.nivelAcceso = form[6][i].selected ? form[6][i].value : "";
          i++;
        }

        //Guardamos la relaccion usuario-acceso en caso de que no sea un usuario administrador
        if(usuario.nivelAcceso != "adm"){
          var acceso  = new Acceso();
          acceso.codUsuario = form[1].value;
          var i = 1;
          while(acceso.codTienda == ""){
            acceso.codTienda = form[7][i].selected ? form[7][i].value : "";
            i++;
          }
        }else{
          usuario.nivelAcceso = 0;
        }
        //Guardamos en el array
        arrUsuarios.push(usuario);
        arrAcceso.push(acceso);
        break;
      
      case "producto":
        
        break;
      
      case "proveedores":
        
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
        //recuperamos el objeto de tienda que coincida con el cod del formulario que cancela la modificacion
        var tienda;
        for(var i = 0; i < arrTiendas.length ; i++){
          if(arrTiendas[i].codTienda == form[1].value){
            //Obtenemos el objeto, lo eliminamos del array y cortamos el bucle for
            tienda = arrTiendas[i];
            arrTiendas.splice(i,1);
            i = arrTiendas.length;
          }
        }
        //Recuperamos los antiguos valores al formulario
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

        $("span.errValidacion").css({zIndex: "-5"});
        
        break;
      
      case "usuario":
        //recuperamos el objeto de usuario que coincida con el cod del formulario que cancela la modificacion
        var usuario;
        for(var i = 0; i < arrUsuarios.length ; i++){
          if(arrUsuarios[i].codUsuario == form[1].value){
            //Obtenemos el objeto, lo eliminamos del array y cortamos el bucle for
            usuario = arrUsuarios[i];
            arrUsuarios.splice(i,1);
            i = arrUsuarios.length;
          }
        }
        //Recuperamos los antiguos valores al formulario
        form[2].value = usuario.nombre;
        form[3].value = usuario.email;
        form[4].value = usuario.password;
        form[5].value = usuario.password;
        
        for(var i = 1; i < form[6].length; i++){
          form[6][i].selected = form[6][i].value == usuario.nivelAcceso ? true : false ;
        }

        var acceso;
        for(var i = 0; i < arrAcceso.length ; i++){
          if(arrAcceso[i].codUsuario == form[1].value){
            //Obtenemos el objeto, lo eliminamos del array y cortamos el bucle for
            acceso = arrAcceso[i];
            arrAcceso.splice(i,1);
            i = arrAcceso.length;
          }
        }
        for(var i = 1; i < form[7].length; i++){
          form[7][i].selected = form[7][i].value == acceso.codTienda ? true : false ;
        }

        //Si existe un textArea respeta su tamaño
        for(var i = 2; i < form.length ; i++){
          form[i].parentElement.className = form.name == "descripcion" ? "form-group col-xs-12 col-sm-12" : "form-group col-xs-12 col-sm-6" ;
        }
        
        $("span.errValidacion").css({zIndex: "-5"});
        break;
      
      case "producto":
        //Formularios de productos
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

//-------------------------->INI - MODIFICACION<--------------------------//
  $( ".confMod button:first-child" ).click( function(element) {
//Accion de Modificacion al pulsar el boton de aceptar en un formulario
    //Obtenemos los elementos que pertenecen al boton donde se ha hecho click
    //Alpulsar sobre el icono buscara el button para que apartir de ahi obtenga el resto de elementos
    element.target = element.target.tagName == "BUTTON" ? element.target : element.target.parentElement;
    //Formulario
    var form = element.target.parentElement.parentElement.parentElement.children[3];
    //Capa de bloqueo del formulario
    var overFlow = element.target.parentElement.parentElement.parentElement.children[2];
    //Capa de mensaje de retorno
    var infoProcess = element.target.parentElement.parentElement.parentElement.children[0];
    
    overFlow.id = "onProcessOverFlow";
    infoProcess.id = "onProcessInfo";
    
    //Segun el nombre del formulario, que esta asociado a la tabla a la que hace referencia...
    //-------> INI - SWITCH MODIFICACION - FORMULARIOS
    switch (form.name) {
//---------->TIENDA
      case "tienda":
        //Divisiones de informacion y bloqueo del formulario mientras se realiza el AJAX
        $( "#onProcessInfo" ).text("");
        $( "#onProcessOverFlow" ).animate({zIndex:"1"});
      
        //Montar el obj, para convertirlo a JSON _TIENDA
        var tienda = new Tienda();
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
          json: JSON.stringify(tienda.getJSON)
        };
              
//------>INI - Envio de AJAX - Modificacion de TIENDA
        console.log("INI - Comunicacion AJAX - MODIFICACION TIENDA");
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
        console.log("FIN - Comunicacion AJAX - MODIFICACION TIENDA");
//------>FIN - Envio de AJAX - Modificacion de TIENDA
        break;
//--------->USUARIO  
      case "usuario":
         //Divisiones de informacion y bloqueo del formulario mientras se realiza el AJAX
         $( "#onProcessInfo" ).text("");
         $( "#onProcessOverFlow" ).animate({zIndex:"1"});
       
         //Instanciar el obj usuario, para convertirlo a JSON
         var usuario = new Usuario();
         usuario.codUsuario = form[1].value;
         usuario.nombre = form[2].value;
         usuario.email = form[3].value;
         usuario.password = form[5].value;
         usuario.nivelAcceso = form[6].value;
         
         //Instanciar el obj tienda, para pconvertirlo a JSON
         var acceso = new Acceso();
         acceso.codUsuario = form[1].value;
         acceso.codTienda = form[7].value;
         
         //Componer un JSON para el envio de datos al controlador
         var envioJSON = {
           codUsuario: usuario.codUsuario,
           nombre: usuario.nombre,
           password: usuario.password,
           email: usuario.email,
           nivelAcceso: usuario.nivelAcceso,
           acceso: acceso.codTienda
         };
         
         //Parametros de la peticion ajax para la modificacion de usario ---> stringify(envioJSON)
         var parametros = {
           accion: "mantenimentoUsuario",
           operacion:  "modificacion",
           json: JSON.stringify(envioJSON) 
         };
//------->INI - Envio de AJAX - Modifcacion USUARIO
        console.log("INI - Comunicacion AJAX - MODIFICACION USUARIO");
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
           var usuarioUpdated = JSON.parse(response);
           //Toma los nuevos valores y los inserta en el formulario
           //Valores para campos "escribibles"
           form[1].value = usuarioUpdated.codUsuario;
           form[2].value = usuarioUpdated.nombre;
           form[3].value = usuarioUpdated.email;
           form[4].value = usuarioUpdated.password;
           
           //Valores para campos de tipo select
            //Select de nivel de acceso
           for(var i = 1; i < form[5].length; i++){
             form[5][i].selected = form[5][i].value == usuarioUpdated.nivelAcceso ? true : false ;
           }
            //Select de acceso a tienda
           for(var i = 1; i < form[5].length; i++){
            form[5][i].selected = form[5][i].value == usuarioUpdated.codTienda ? true : false ;
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
           $( "#onProcessInfo" ).text(usuarioUpdated.msgReturn)
           
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
            //Obtenemos la capa de bloqueo 
            var aux = $( "#onProcessOverFlow" );
            //Tomamos su anchura y altura
            var width = aux[0].offsetWidth;
            var height = aux[0].offsetHeight
            //Parametros para a animacion de levantado de la capa de bloqueo
            width = "-=" + width + "px";
            height = "-=" + height + "px";
            //Animacion del levantado de bloqueo
            $( "#onProcessOverFlow" ).animate({height: height, width: width},500,function(){
              //Subimos la capa de informacion del proceso
              $( "#onProcessInfo" ).animate({zIndex: "1"});
              //Animacion para el desvanecimiento de la capa de informacion del proceso 
              $( "#onProcessInfo" ).animate({opacity:0,zIndex: "-100"},3000,function(){
                // devolvemos la capa de informacion del proceso a su estado original
                $( "#onProcessInfo" ).css({opacity:1, zIndex: "-100"});
                // devolvemos la capa de bloqueo a su estado original
                $( "#onProcessOverFlow" ).css({width:"100%" , height: "100%", zIndex: "-100"}); 
                //Removemos los id's identificativos del proceso de modificacion
                $("#onProcessInfo, #onProcessOverFlow").removeAttr("id");
                // removemos las marcas de validacion de los inputs
                for(var i = 2; i < form.length; i++){
                  form[i].parentElement.className = "form-group col-xs-12 col-sm-6";
                }
              }); 
              
            });  
         });
         console.log("FIN - Comunicacion AJAX - MODIFICACION USUARIO");
//------>FIN - Envio de AJAX - Modificacion USUARIO
        break;
//--------->PRODUCTO <--- Next to work
      case "producto":
        //Formularios de productos
        break;

      case "proveedor":
        //Formularios de proveedor
        break;
      case "empleado":
        //Formularios de empleado
        break;

      default:
        break;
    }
    //-------> FIN - SWITCH MODIFICACION - FORMULARIOS
  });
    /*Funcion de envio de datos por AJAX con JSON para la MODIFICACION de los Formularios*/
//-------------------------->FIN - MODIFICACION<-------------------------//

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
    var formsInsert = $( "#formNuevoElemento form div div.row div" );
    formsInsert = formsInsert[0];
    for(var j = 1 ; j < formsInsert.length ; j++){
      $(formsInsert[j].className).removeClass("has-error");
      $(formsInsert[j].className).removeClass("has-success");
      formsInsert[j].value = "";
      
    }      
    
    $("span.errValidacion").css({zIndex: "-5"});
    
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
    $("span.errValidacion").css({zIndex: "-5"});
  });
  /*Funcion de cancelacion de la inserccion del formulario de tienda. Limpia los campos de insercion de marcas de validacion y reinicia el formulario*/

//-------------------------->INI - ALTA<-------------------------//
  $( ".confInsert div:first-child button:first-child" ).click( function(element){
    //Obtenemos los elementos que pertenecen al boton donde se ha hecho click - Formulario de alta
    //Alpulsar sobre el icono buscara el button para que apartir de ahi obtenga el resto de elementos - Error de chromeS
    element.target = element.target.tagName == "BUTTON" ? element.target : element.target.parentElement;
    //El formulario de alta
    var form = element.target.parentElement.parentElement.parentElement.children[3];
    //Capa de bloqueo del formulario
    var overFlow = element.target.parentElement.parentElement.parentElement.children[2];
    //capa de mensaje de retorno 
    var infoProcess = element.target.parentElement.parentElement.parentElement.children[0];
        
    //Aplicamos id especiales a la capa de bloqueo y de informacion del proceso
    overFlow.id = "onProcessOverFlow";
    infoProcess.id = "onProcessInfo";
    
    //Segun el nombre del formulario, que esta asociado a la tabla a la que hace referencia...
    //-------> INI - SWITCH ALTA - FORMULARIOS
    switch (form.name) {
//---------->TIENDA
      case "tienda":
        //Divisiones de informacion y bloqueo del formulario mientras se realiza el AJAX
        $( "#onProcessInfo" ).text("");
        $( "#onProcessOverFlow" ).animate({zIndex:"1"});
      
        //Montar el obj, para convertirlo a JSON
        var tienda = new Tienda();
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
                
//------>INI - Envio de AJAX - Alta de TIENDA
        //Parametros de la peticion ajax para la alta de tienda
        var parametros = {
          accion: "mantenimentoTiendas",
          operacion:  "alta",
          json: JSON.stringify(tienda.getJSON)
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
          function redir(){
            location.href = "../_web/controller.php?accion=mantenimentoTiendas&operacion=buscar&tBusqueda=codTienda&busqueda=" + resultadoInserccion.codTienda ;
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
            //Recuperamos el codigo de la tienda para hacer la redireccion
            var tienda = JSON.stringify(jqXHR);
            //Levanta la capa de bloqueo y muestra el mensaje de retorno
            $( "#onProcessOverFlow" ).animate({height: height, width: width},500,function(){
              $( "#onProcessInfo" ).animate({zIndex: "1"}); 
              $( "#onProcessInfo" ).animate({opacity:0,zIndex: "-100"},3000,function(){
                $( "#onProcessInfo" ).css({opacity:1, zIndex: "-100"});
                $( "#onProcessOverFlow" ).css({width:"100%" , height: "100%", zIndex: "-100"});
                $( "#onProcessInfo" ).remove( "#onProcessInfo span" ); 
                $("#onProcessInfo, #onProcessOverFlow").removeAttr("id");
                for(var i = 1; i < form.length; i++){
                  form[i].parentElement.className = "form-group col-xs-12 col-sm-6";
                }
                window.setTimeout(function (){
                  location.href = "../_web/controller.php?accion=move&operacion=tiendas";
                }, 1000);
              }); 
              
            });  
        });
        
//------>FIN - Envio de AJAX - Alta de TIENDA       
        break;
//----------->USUARIO        
        case "usuario":
        //Divisiones de informacion y bloqueo del formulario mientras se realiza el AJAX
        $( "#onProcessInfo" ).text("");
        $( "#onProcessOverFlow" ).animate({zIndex:"1"});
        //Divisiones de informacion y bloqueo del formulario mientras se realiza el AJAX
        $( "#onProcessInfo" ).text("");
        $( "#onProcessOverFlow" ).animate({zIndex:"1"});
      
        //Instanciar el obj usuario, para convertirlo a JSON
        var usuario = new Usuario();
        usuario.codUsuario = "";
        usuario.nombre = form[1].value;
        usuario.email = form[2].value;
        usuario.password = form[3].value;
        usuario.nivelAcceso = form[5].value;
        
        //Instanciar el obj acceso, para pconvertirlo a JSON
        var acceso = new Acceso();
        acceso.codUsuario = "";
        acceso.codTienda = form[6].value;
        
        //Componer un JSON para el envio de datos al controlador
        var envioJSON = {
          codUsuario: usuario.codUsuario,
          nombre: usuario.nombre,
          password: usuario.password,
          email: usuario.email,
          nivelAcceso: usuario.nivelAcceso,
          acceso: acceso.codTienda
        };
        
        //Parametros de la peticion ajax para la alta de usario ---> stringify(envioJSON)
        var parametros = {
          accion: "mantenimentoUsuario",
          operacion:  "alta",
          json: JSON.stringify(envioJSON) 
        };
        console.log(parametros);
         
          //Envio de AJAX
  //------>INI - Envio de AJAX - Alta de USUARIO
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
            
            //Determinamos que tipo de nivel de acceso tiene el nuevo usuario
            var insertUsuario_nAcceso;
            switch (resultadoInserccion.nivelAcceso) {
              case "emp":
              insertUsuario_nAcceso = "Empleado";
                break;
              
              case "gen":
              insertUsuario_nAcceso = "Gerente";
                break;
              
              case "adm":
              insertUsuario_nAcceso = "Administrador";
                break;
              
              default:
                console.log("unknown resultadoInserccion.nivelAcceso");
                insertUsuario_nAcceso = "unknown";
                break;
            }
            //Añadimos la informacion al mensaje de retorno 
            $( "#onProcessInfo" ).text(resultadoInserccion.msgReturn);
            $( "#onProcessInfo ").append(
              "<span class='insertTiendaMsg'>cod.Usuario : " +resultadoInserccion.codUsuario + "</span>"+
              "<span class='insertTiendaMsg'>Nombre : " +resultadoInserccion.nombre + "</span>"+
              "<span class='insertTiendaMsg'>Nivel Acceso : " +insertUsuario_nAcceso + "</span>"
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
              //Tomamos la capa de bloqueo del formulario
              var aux = $( "#onProcessOverFlow" );
              //Obtenemos su altura y anchura
              var width = aux[0].offsetWidth;
              var height = aux[0].offsetHeight
              //Creamos los parametros de reduccion de la capa
              width = "-=" + width + "px";
              height = "-=" + height + "px";
              //Animamos la reduccion de la capa de bloqueo
              $( "#onProcessOverFlow" ).animate({height: height, width: width},500,function(){
                //Mostramos la capa de informacion
                $( "#onProcessInfo" ).animate({zIndex: "1"});
                //Animamos la capa de informacion 
                $( "#onProcessInfo" ).animate({opacity:0,zIndex: "-100"},3000,function(){
                  //Devolvemos los valores originales a  las capaas de bloquo e informacion
                  $( "#onProcessInfo" ).css({opacity:1, zIndex: "-100"});
                  $( "#onProcessOverFlow" ).css({width:"100%" , height: "100%", zIndex: "-100"});
                  //Eliminamos los span con la informacion de la capa de informacion
                  $( "#onProcessInfo" ).remove( "#onProcessInfo span" ); 
                  //Eliminamos los id's de las capas de proceso e informacion
                  $("#onProcessInfo, #onProcessOverFlow").removeAttr("id");
                  for(var i = 2; i < form.length; i++){
                    form[i].parentElement.className = "form-group col-xs-12 col-sm-6";
                    setTimeout(function(){
                      location.href = "../_web/controller.php?accion=move&operacion=usuarios";
                    },1000);
                  }
                }); 
                
              });  
          });
//------>FIN - Envio de AJAX - Alta de USUARIO
        
        break;
        
        case "producto":
        //Formularios de productos - suministro
        break;
        case "proveedor":
        //Formularios de productos
        break;
        case "empleado":
        //Formularios de productos
        break;
        case "proveedor":
        //Formularios de productos
        break;
        
        default:
        break;
      }
    //-------> FIN - SWITCH MODIFICACION - FORMULARIOS

  });
  /*Funcion de envio de datos por AJAX con JSON para la INSERCCION del formulario<--on working*/
//-------------------------->FIN - Alta<-------------------------//


//-------------------------->INI - BORRADO<-------------------------//
  $(".confDelete button").click(function(element){
    //Obtenemos los elementos relacionados con el boton
    //Realizamos esta accion por si el usuario hace click sobre el icono - error en chrome
    element.target = element.target.tagName == "BUTTON" ? element.target : element.target.parentElement;
    //Capa de confirmacion de borrado
    var confirmDelete = element.target.parentElement.parentElement.parentElement.children[1];
    //formulario del elemento que se Borrara
    var form = element.target.parentElement.parentElement.parentElement.children[3];
    //capa de bloqueo del formulario
    var overFlow = element.target.parentElement.parentElement.parentElement.children[2];
    //Capa de informacion del proceso
    var infoProcess = element.target.parentElement.parentElement.parentElement.children[0];
    //Conjunto completo de todos los elementos
    var conjuntoElementos = form.parentElement;

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
    //-------> INI - SWITCH BAJA - FORMULARIOS
    switch (form.name) {
//---------->TIENDA
      case "tienda":
        //Divisiones de informacion y bloqueo del formulario mientras se realiza el AJAX
        $( "#onProcessInfo" ).text("");
        $( "#onProcessOverFlow" ).animate({zIndex:"1"});
      
        //Montar el obj, para convertirlo a JSON. Solo necesitamos el codigo de la tienda a borrar
        var tienda = new Tienda();
        tienda.codTienda = form[1].value;
                
        //AJAX - borrar Tienda
        //Parametros de la peticion ajax para la modificacion de tienda
        var parametros = {
          accion: "mantenimentoTiendas",
          operacion:  "baja",
          json: JSON.stringify(tienda.getJSON)
        };
//------>INI - Envio de AJAX - Baja de TIENDA
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
            //Animacion se reduce la capa de bloqueo
            $( "#onProcessOverFlow" ).animate({height: height, width: width},500,function(){
              //En callBack...
              //trae hacia delante la capa de informacion de retorno
              $( "#onProcessInfo" ).animate({zIndex: "1"}); 
              //Lleva hacia atras la capa de informacion del retorno
              $( "#onProcessInfo" ).animate({opacity:0,zIndex: "-100"},2000,function(){
                //En callBack....
                //Restaura los valores de la capa de informacion del proceso
                $( "#onProcessInfo" ).css({opacity:1, zIndex: "-100"});
                //Restaura los valores de la capa de bloqueo
                $( "#onProcessOverFlow" ).css({width:"100%" , height: "100%", zIndex: "-100"}); 
                //Remueve los id's del proceso
                $("#onProcessInfo, #onProcessOverFlow").removeAttr("id");
                //restura las clases del formulario
                for(var i = 2; i < form.length; i++){
                  form[i].parentElement.className = "form-group col-xs-12 col-sm-6";
                }
                //Remueve la capa de confirmacion de borrado
                $(confirmDelete).remove();
                //Remueve la capa de bloqueo
                $(overFlow).remove();
                //Remueve la capa de informacion del proceso
                $(infoProcess).remove();
                //Eliminamos las etiquetas de validacion
                $("span.errValidacion").remove();
                //Efecto para la eliminacion de tienda-->desplaza la tienda
                $(conjuntoElementos).effect("drop",{},1000,function(){
                  //Remueve toda la capa del formulario
                  $(conjuntoElementos).remove();
                  //Redireccionamos para recargar el listado<--- duda el usuario puede estar haciendo un trabajo y decidir borrar una tienda. Si lo hace perderia el trabajo hecho al recargar la pagina
                  //setTimeout(function(){location.href = "../_web/controller.php?accion=move&operacion=tiendas" }, 1000);
                });
              }); 
              
            });  
        });
//------>FIN - Envio de AJAX - Baja de TIENDA        
        break;
//---------->USUARIO      
      case "usuario":
        //Divisiones de informacion y bloqueo del formulario mientras se realiza el AJAX
        $( "#onProcessInfo" ).text("");
        $( "#onProcessOverFlow" ).animate({zIndex:"1"});
      
        //Montar el obj, para convertirlo a JSON. Solo necesitamos el codigo de la usuario a borrar
        var usuario = new Usuario();
        usuario.codUsuario = form[1].value;
      
        //AJAX -  Borrar Usuario
        //Parametros de la peticion ajax para la modificacion de tienda
        var parametros = {
          accion: "mantenimentoUsuario",
          operacion:  "baja",
          json: JSON.stringify(usuario.getJSON)
        };
//------>FIN - Envio de AJAX - Baja de USUARIO
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
            //Animacion se reduce la capa de bloqueo
            $( "#onProcessOverFlow" ).animate({height: height, width: width},500,function(){
              //En callBack...
              //trae hacia delante la capa de informacion de retorno
              $( "#onProcessInfo" ).animate({zIndex: "1"}); 
              //Lleva hacia atras la capa de informacion del retorno
              $( "#onProcessInfo" ).animate({opacity:0,zIndex: "-100"},2000,function(){
                //En callBack....
                //Restaura los valores de la capa de informacion del proceso
                $( "#onProcessInfo" ).css({opacity:1, zIndex: "-100"});
                //Restaura los valores de la capa de bloqueo
                $( "#onProcessOverFlow" ).css({width:"100%" , height: "100%", zIndex: "-100"}); 
                //Remueve los id's del proceso
                $("#onProcessInfo, #onProcessOverFlow").removeAttr("id");
                //restura las clases del formulario
                for(var i = 2; i < form.length; i++){
                  form[i].parentElement.className = "form-group col-xs-12 col-sm-6";//<-----rompe estilos de formularios
                }
                //Remueve la capa de confirmacion de borrado
                $(confirmDelete).remove();
                //Remueve la capa de bloqueo
                $(overFlow).remove();
                //Remueve la capa de informacion del proceso
                $(infoProcess).remove();
                //Eliminamos las etiquetas de validacion
                $("span.errValidacion").remove();
                //Efecto para la eliminacion de usuario-->desplaza al formulario
                $(conjuntoElementos).effect("drop",{},1000,function(){
                  //Remueve toda la capa del formulario
                  $(conjuntoElementos).remove();
                  setTimeout(function(){
                    location.href = "../_web/controller.php?accion=move&operacion=usuarios";
                  },1000);
                });
              }); 
              
            });  
        });
//------>FIN - Envio de AJAX - Baja de USUARIO
        break;
      
      case "producto":
        //Formularios de productos
        break;
      
      case "proveedor":
        //Formularios de proveedor
        break;
      case "empleado":
        //Formularios de empleado
        break;
      
      default:
        break;
    }
    //-------> FIN - SWITCH BAJA - FORMULARIOS
    });
  });
//-------------------------->INI - BORRADO<-------------------------//
  //Funcion 

});//Fin del documentReady