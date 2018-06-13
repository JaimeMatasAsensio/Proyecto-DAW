"use strict";
/*Documento para implementar los objetos de usuario*/
/*
Jaime Matas Asensio
Proyecto DAW: ShopSphere
I.E.S. Maestre de Calatrava - Ciudad Real
2018
*/
//Clase JavaScript de Usuario
function Usuario (){
  //validacion en la llamada del objeto acceso
  if(!(this instanceof Usuario)) throw new ConstructorCalledFunction();
  
  //Parametros del objeto aceso
  var _codUsuario = "";
  var _nombre = "";
  var _password = "";
  var _email = "";
  var _nivelAcceso = "";
 

  // INI - Parametros de la clase aceso

  Object.defineProperty(this,"codUsuario",{
    get: function(){ return _codUsuario},
    set: function( codUsuario ){ _codUsuario = codUsuario }
  });

  Object.defineProperty(this,"nombre",{
    get: function(){ return _nombre },
    set: function( nombre ){ _nombre = nombre }
  });

  Object.defineProperty(this,"password",{
    get: function(){ return _password },
    set: function( password ){ _password = password }
  });

  Object.defineProperty(this,"email",{
    get: function(){ return _email },
    set: function( email ){ _email = email }
  });

  Object.defineProperty(this,"nivelAcceso",{
    get: function(){ return _nivelAcceso },
    set: function( nivelAcceso ){ _nivelAcceso = nivelAcceso }
  });

  // FIN - Parametros de clase aceso

  // INI - metodods clase aceso
  Object.defineProperty(this,"getJSON",{
    get: function(){
      return {
        codUsuario: this.codUsuario,
        nombre: this.nombre,
        password: this.password,
        email: this.email,
        nivelAcceso: this.nivelAcceso
      }; 
    }
  });

  // FIN - metodods clase aceso
};
Usuario.prototype = {};
Usuario.prototype.constructor = Usuario;
//Funcion para la clase de Usuario