/*Documento para implementar las acciones o validaciones en el formulario de login */

function doLogin(){
  document.submit(); 
}
/*Funcion que envia el formulario de login al controlador*/

function cancelLogin(){
  document.history.back();
}
/*Funcion que cancela el login y envia al usuario a la pagina principal*/

var btnDoLogin = document.forms[0].elements["doLogin"].addEventListener("onclick", doLogin);
var btnCancelLogin = document.forms[0].elements["cancelLogin"].addEventListener("onclick",cancelLogin);