"use strict";
/*Documento para implementar los objetos de tienda*/
/*
Jaime Matas Asensio
Proyecto DAW: ShopSphere
I.E.S. Maestre de Calatrava - Ciudad Real
2017
*/
function TemplateError(){
  TemplateError.prototype = new Error(); 
  TemplateError.prototype.constructor = TemplateError;
  TemplateError.prototype.toString = function(){
    return this.name + " " + this.message;
  }
};
/*Plantilla de error para crear los errores especificos*/

function ConstructorCalledFunction(){
  this.name = "ConstructorCalledFunction";
  this.message = "Constructor llamado como función, se necesita el operador 'new'";
}
//Herencia de la plantilla de errores - COnstructor llamado como funcion
ConstructorCalledFunction.prototype = new TemplateError();
ConstructorCalledFunction.prototype.constructor = ConstructorCalledFunction;
ConstructorCalledFunction.prototype.toString = function(){
  return TemplateError.toString.call(this);
}
/*Error de llamada a constructores como funciones*/

function Tienda (){
  //validacion en la llamada del objeto tienda
  if(!(this instanceof Tienda)) throw new ConstructorCalledFunction();
  
  //Parametros del objeto tienda
  var _codTienda = "";
  var _nombre = "";
  var _pais = "";
  var _provincia = "";
  var _poblacion = "";
  var _direccion = "";
  var _numero = "";
  var _telefono = "";
  var _movil = "";
  var _email = "";
  var _tipoSuscripcion = "";

  // INI - Parametros de la clase tienda

  Object.defineProperty(this,"codTienda",{
    get: function(){ return _codTienda},
    set: function( codTienda ){ _codTienda = codTienda }
  });

  Object.defineProperty(this,"nombre",{
    get: function(){ return _nombre },
    set: function( nombre ){ _nombre = nombre }
  });

  Object.defineProperty(this,"pais",{
    get: function(){ return _pais },
    set: function( pais ){ _pais = pais }
  });

  Object.defineProperty(this,"provincia",{
    get: function(){ return _provincia },
    set: function( provincia ){ _provincia = provincia }
  });

  Object.defineProperty(this,"poblacion",{
    get: function(){ return _poblacion },
    set: function( poblacion ){ _poblacion = poblacion }
  });

  Object.defineProperty(this,"direccion",{
    get: function(){ return _direccion },
    set: function( direccion ){ _direccion = direccion }
  });

  Object.defineProperty(this,"numero",{
    get: function(){ return _numero },
    set: function( numero ){ _numero = numero }
  });

  Object.defineProperty(this,"telefono",{
    get: function(){ return _telefono },
    set: function( telefono ){ _telefono = telefono }
  });

  Object.defineProperty(this,"movil",{
    get: function(){ return _movil },
    set: function( movil ){ _movil = movil }
  });
  
  Object.defineProperty(this,"email",{
    get: function(){ return _email },
    set: function( email ){ _email = email }
  });

  Object.defineProperty(this,"tipoSuscripcion",{
    get: function(){ return _tipoSuscripcion },
    set: function( tipoSuscripcion ){ _tipoSuscripcion = tipoSuscripcion }
  });

  // FIN - Parametros de clase tienda

  // INI - metodods clase tienda
  Object.defineProperty(this,"getJSON",{
    get: function(){
      return {
        codTienda: this.codTienda,
        nombre: this.nombre,
        pais: this.pais,
        provincia: this.provincia,
        poblacion: this.poblacion,
        direccion: this.direccion,
        numero: this.numero,
        telefono: this.telefono,
        movil: this.movil,
        email: this.email,
        tipoSuscripcion: this.tipoSuscripcion
      }; 
    }
  });

  // FIN - metodods clase tienda
};
Tienda.prototype = {};
Tienda.prototype.constructor = Tienda;
//Funcion para la clase de tiendas