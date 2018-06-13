"use strict";
/*Documento para implementar los objetos de error*/
/*
Jaime Matas Asensio
Proyecto DAW: ShopSphere
I.E.S. Maestre de Calatrava - Ciudad Real
2018
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
