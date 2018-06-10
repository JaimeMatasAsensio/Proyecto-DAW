<?php
/*
Jaime Matas Asensio
Proyecto DAW: ShopSphere
I.E.S. Maestre de Calatrava - Ciudad Real
2018
*/
require_once '../_entidad/classProveedor.php';
require_once '../_conexion/libreria_PDO.php';

 class daoProveedores{
 
    private $con;    //Propiedad para guardar el objeto conexion

    public $result = array();  //Array de objetos para devolver el resultado

    public function __CONSTRUCT(){
      try{
        $this->con = new BD();
      }catch(Exception $e){
        die($e->getMessage());
      }
    }
	  //Funcion constructor del modelo de datos proveedor
    public function listarProveedores($codTienda){
      try {
      $consulta = "SELECT * FROM proveedor_".$codTienda." WHERE 1";
      $param = array();
      $this->con->ConsultaNormalAssoc($consulta, $param);
      $this->result = array();
        foreach ($this->con->datos as $fila){
          $proveedor = new proveedor();   
          $proveedor->__SET("codProveedor", $fila['codProveedor']);
          $proveedor->__SET("nombre", $fila['nombre']);
          $proveedor->__SET("nombreContacto", $fila['nombreContacto']);
          $proveedor->__SET("apellido1Contacto", $fila['apellido1Contacto']);
          $proveedor->__SET("apellido2Contacto", $fila['apellido2Contacto']);
          $proveedor->__SET("telefono", $fila['telefono']);
          $proveedor->__SET("movil", $fila['movil']);
          $proveedor->__SET("email", $fila['email']);
          $this->result[] = $proveedor;
        }

      }catch (Exception $e){
        echo($e->getMessage());
      }
    }
    //Funcion modelo de datos proveedor listado de proveedores, devuelve un array de objetos por result
    public function buscarProveedor($codProveedor,$codTienda){
      try {
        $consulta = "SELECT * FROM proveedor_$codTienda WHERE codProveedor = :codProveedor";
        $param = array(":codProveedor" => $codProveedor);
        $this->con->ConsultaNormalAssoc($consulta, $param);
        $fila = $this->con->datos[0];
        if(!empty($fila)){
          $proveedor = new proveedor();   
          $proveedor->__SET("codProveedor", $fila['codProveedor']);
          $proveedor->__SET("nombre", $fila['nombre']);
          $proveedor->__SET("nombreContacto", $fila['nombreContaco']);
          $proveedor->__SET("apellido1Contacto", $fila['apellido1Contacto']);
          $proveedor->__SET("apellido2Contacto", $fila['apellido2Contacto']);
          $proveedor->__SET("telefono", $fila['telefono']);
          $proveedor->__SET("movil", $fila['movil']);
          $proveedor->__SET("email", $fila['email']);
          return $proveedor;
        }else{
          return false;
        }

      }catch (Exception $e){
        echo($e->getMessage());
      }  
    }
    //Funcion modelo de datos proveedor busqueda por clave proveedor, devuelve un objeto por return

    public function buscarProveedorPorNombre($nombre,$codTienda){
      try {
        $consulta = "SELECT * FROM proveedor_$codTienda WHERE nombre LIKE %:nombre%";
        $param = array(":nombre" => $nombre);
        $this->con->ConsultaNormalAssoc($consulta, $param);
        $fila = $this->con->datos[0];
        if(!empty($fila)){
          $proveedor = new proveedor();   
          $proveedor->__SET("codProveedor", $fila['codProveedor']);
          $proveedor->__SET("nombre", $fila['nombre']);
          $proveedor->__SET("nombreContacto", $fila['nombreContaco']);
          $proveedor->__SET("apellido1Contacto", $fila['apellido1Contacto']);
          $proveedor->__SET("apellido2Contacto", $fila['apellido2Contacto']);
          $proveedor->__SET("telefono", $fila['telefono']);
          $proveedor->__SET("movil", $fila['movil']);
          $proveedor->__SET("email", $fila['email']);
          return $proveedor;

        }else{
          return false;
        }

      }catch (Exception $e){
        echo($e->getMessage());
      }  
    }
    //Funcion modelo de datos proveedor busqueda pro nombre, devuelve un array de objetos por result

    public function buscarProveedorPorEmail($email,$codTienda){
      try {
        $consulta = "SELECT * FROM proveedor_$codTienda WHERE email LIKE %:email%";
        $param = array(":email" => $email);
        $this->con->ConsultaNormalAssoc($consulta, $param);
        $fila = $this->con->datos[0];
        if(!empty($fila)){
          $proveedor = new proveedor();   
          $proveedor->__SET("codProveedor", $fila['codProveedor']);
          $proveedor->__SET("nombre", $fila['nombre']);
          $proveedor->__SET("nombreContacto", $fila['nombreContaco']);
          $proveedor->__SET("apellido1Contacto", $fila['apellido1Contacto']);
          $proveedor->__SET("apellido2Contacto", $fila['apellido2Contacto']);
          $proveedor->__SET("telefono", $fila['telefono']);
          $proveedor->__SET("movil", $fila['movil']);
          $proveedor->__SET("email", $fila['email']);
          return $proveedor;
        }else{
          return false;
        }

      }catch (Exception $e){
        echo($e->getMessage());
      }  
    }
    //Funcion modelo de datos proveedor busqueda por email, devuelve un array de objetos por result

    public function eliminarProveedor($codProveedor,$codTienda){
      try {
      $consulta = "DELETE FROM proveedor_$codTienda WHERE codProveedor = :codProveedor";
      $param = array(":codProveedor" => $codProveedor);
      $this->result = $this->con->ConsultaSimple($consulta, $param);
      
      }catch (Exception $e){
        echo($e->getMessage());
      }  
    }
    //Funcion modelo de datos proveedor, elemina por codigo

    public function insertarProveedor($obj,$codTienda){
      try {
      $consulta = "INSERT INTO proveedor_$codTienda(codProveedor, nombre, nombreContacto, apellido1Contacto, apellido2Contacto, telefono, movil,email) VALUES (?,?,?,?,?,?,?,?)";
      $param = array(
        $obj->__GET("codProveedor"),
        $obj->__GET("nombre"),
        $obj->__GET("nombreContacto"),
        $obj->__GET("apellido1Contacto"),
        $obj->__GET("apellido2Contacto"),
        $obj->__GET("telefono"),
        $obj->__GET("movil"),
        $obj->__GET("email")

      );
      $this->result = $this->con->ConsultaSimple($consulta, $param);
      
      }catch (Exception $e){
        echo($e->getMessage());
      }  
    }
    //Funcion modelo de datos proveedor, inserta un nuevo registro

    public function actualizarProveedor($obj,$codTienda){
      try {
      $consulta = "UPDATE proveedor_$codTienda SET nombre=?,nombreContacto=?, apellido1Contacto=?, apellido2Contacto=?, telefono=?, movil=?, email=? WHERE codProveedor=?";
      $param = array(
        $obj->__GET("nombre"),
        $obj->__GET("nombreContacto"),
        $obj->__GET("apellido1Contacto"),
        $obj->__GET("apellido2Contacto"),
        $obj->__GET("telefono"),
        $obj->__GET("movil"),
        $obj->__GET("email"),
        $obj->__GET("codProveedor")

      );
      $this->result = $this->con->ConsultaSimple($consulta, $param);
      
      }catch (Exception $e){
        echo($e->getMessage());
      }  
    }
    //Funcion modelo de datos proveedor, actualiza un registro existente
}
