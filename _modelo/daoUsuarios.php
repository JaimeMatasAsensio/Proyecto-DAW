<?php

require_once '../_entidad/classUsuario.php';
require_once '../_conexion/libreria_PDO.php';

 class daoUsuarios{
 
    private $con;    //Propiedad para guardar el objeto conexion

    public $result = array();  //Array de objetos para devolver el resultado

    public function __CONSTRUCT(){
      try{
        $this->con = new BD();
      }catch(Exception $e){
        die($e->getMessage());
      }
    }
	  //Funcion constructor del modelos de datos de usuario

    public function listarUsuarios(){
      try {
      $consulta = "SELECT * FROM usuario WHERE 1";
      $param = array();
      $this->con->ConsultaNormalAssoc($consulta, $param);
      $this->result = array();
        foreach ($this->con->datos as $fila){
          $usuario = new usuario();   
          $usuario->__SET("codUsuario", $fila['codUsuario']);
          $usuario->__SET("nombre", $fila['nombre']);
          $usuario->__SET("password", $fila['password']);
          $usuario->__SET("email", $fila['email']);
          $usuario->__SET("nivelAcceso", $fila['nivelAcceso']);
          $this->result[] = $usuario;
        }
      }catch (Exception $e){
        echo($e->getMessage());
      }
    }
    //Funcion modelo de datos usuario lista usuarios, devuelve un array de objetos por result

    public function buscarUsuario($codUsuario){
      try {
        $consulta = "SELECT * FROM usuario WHERE codUsuario = :codUsuario";
        $param = array(":codUsuario" => $codUsuario);
        $this->con->ConsultaNormalAssoc($consulta, $param);
        $fila = $this->con->datos[0];
        if(!empty($fila)){
          $usuario = new usuario();   
          $usuario->__SET("codUsuario", $fila['codUsuario']);
          $usuario->__SET("nombre", $fila['nombre']);
          $usuario->__SET("password", $fila['password']);
          $usuario->__SET("email", $fila['email']);
          $usuario->__SET("nivelAcceso", $fila['nivelAcceso']);

          return $usuario;
        }else{
          return false;
        }

      }catch (Exception $e){
        echo($e->getMessage());
      }  
    }
    //Funcion modelo de datos usuario busqueda por clave, devuelve un objeto por return

    public function buscarUsuarioPorNombre($nombre){
      try {
        $consulta = "SELECT * FROM usuario WHERE nombre LIKE :nombre";
        $param = array(":nombre" => $nombre);
        $this->con->ConsultaNormalAssoc($consulta, $param);
        $fila = $this->con->datos[0];
        if(!empty($fila)){
          $usuario = new usuario();   
          $usuario->__SET("codUsuario", $fila['codUsuario']);
          $usuario->__SET("nombre", $fila['nombre']);
          $usuario->__SET("password", $fila['password']);
          $usuario->__SET("email", $fila['email']);
          $usuario->__SET("nivelAcceso", $fila['nivelAcceso']);

          return $usuario;
        }else{
          return false;
        }

      }catch (Exception $e){
        echo($e->getMessage());
      }  
    }
    //Funcion modelo de datos usuario busqueda por nombre, devuelve un array de objetos por result

    public function buscarUsuarioPorEmail($email){
      try {
        $consulta = "SELECT * FROM usuario WHERE email = :email";
        $param = array(":email" => $email);
        $this->con->ConsultaNormalAssoc($consulta, $param);
        $fila = $this->con->datos[0];
        if(!empty($fila)){
          $usuario = new usuario();   
          $usuario->__SET("codUsuario", $fila['codUsuario']);
          $usuario->__SET("nombre", $fila['nombre']);
          $usuario->__SET("password", $fila['password']);
          $usuario->__SET("email", $fila['email']);
          $usuario->__SET("nivelAcceso", $fila['nivelAcceso']);

          return $usuario;
        }else{
          return false;
        }

      }catch (Exception $e){
        echo($e->getMessage());
      }  
    }
    //Funcion modelo de datos usuario busqueda por email, devuelve un objeto por return

    public function eliminarUsuario($codUsuario){
      try {
      $consulta = "DELETE FROM usuario WHERE codUsuario = :codUsuario";
      $param = array(":codUsuario" => $codUsuario);
      $this->result = $this->con->ConsultaSimple($consulta, $param);
      
      }catch (Exception $e){
        echo($e->getMessage());
      }  
    }
    //Funcion modelo de datos usuario elimina por clave

    public function insertarUsuario($obj){
      try {
      $consulta = "INSERT INTO usuario(codUsuario, nombre, password, email, nivelAcceso) VALUES (?,?,?,?,?,?,?,?)";
      $param = array(
        $obj->__GET("codUsuario"),
        $obj->__GET("nombre"),
        $obj->__GET("password"),
        $obj->__GET("email"),
        $obj->__GET("nivelAcceso"),
      );
      $this->result = $this->con->ConsultaSimple($consulta, $param);
      
      }catch (Exception $e){
        echo($e->getMessage());
      }  
    }
    //Funcion modelo de datos usuario inserta un nuevo registro

    public function actualizarUsuario($obj){
      try {
      $consulta = "UPDATE articulos SET nombre=?,password=?,email=?,nivelAcceso=? WHERE codUsuario=?";
      $param = array(
        $obj->__GET("nombre"),
        $obj->__GET("password"),
        $obj->__GET("email"),
        $obj->__GET("nivelAcceso"),
        $obj->__GET("codUsuario")
      );
      $this->result = $this->con->ConsultaSimple($consulta, $param);
      
      }catch (Exception $e){
        echo($e->getMessage());
      }  
    }
    //Funcion modelo de datos usuario actualiza un registro existente
}
