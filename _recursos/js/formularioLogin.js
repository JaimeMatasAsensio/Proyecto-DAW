"use strict";
/*Documento para implementar las acciones o validaciones en el formulario de login */
/*
Jaime Matas Asensio
Proyecto DAW: ShopSphere
I.E.S. Maestre de Calatrava - Ciudad Real
2017
*/

function doLogin(){
  console.log("hago log in");
  document.forms[0].submit();
}
/*Funcion que envia el formulario de login al controlador*/

function cancelLogin(){
  console.log("no hago login");
  window.location.href = "../index.php";
}
/*Funcion que cancela el login y envia al usuario a la pagina principal*/


document.getElementById("doLogin").addEventListener("click", doLogin);
/*Evento de iniciar el login sobre el boton de aceptar*/

document.getElementById("cancelLogin").addEventListener("click",cancelLogin);
/*Evento de cancelar el login sobre el boton cancelar*/