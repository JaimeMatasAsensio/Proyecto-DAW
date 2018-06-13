"use strict";
/*Documento para implementar los objetos de acceso*/
/*
Jaime Matas Asensio
Proyecto DAW: ShopSphere
I.E.S. Maestre de Calatrava - Ciudad Real
2018
*/
//Clase JavaScript de Acceso
function Acceso (){
  //validacion en la llamada del objeto acceso
  if(!(this instanceof Acceso)) throw new ConstructorCalledFunction();
  
  //Parametros del objeto acceso
  var _codUsuario = "";
  var _codTienda = "";
 

  // INI - Parametros de la clase acceso

  Object.defineProperty(this,"codUsuario",{
    get: function(){ return _codUsuario},
    set: function( codUsuario ){ _codUsuario = codUsuario }
  });
  
  Object.defineProperty(this,"codTienda",{
    get: function(){ return _codTienda},
    set: function( codTienda ){ _codTienda = codTienda }
  });

  // FIN - Parametros de clase acceso

  // INI - metodods clase acceso
  Object.defineProperty(this,"getJSON",{
    get: function(){
      return {
        codUsuario: this.codUsuario,
        codTienda: this.codTienda
      }; 
    }
  });

  // FIN - metodods clase acceso
};
Acceso.prototype = {};
Acceso.prototype.constructor = Acceso;
//Funcion para la clase de Acceso