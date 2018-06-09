<?php

require_once '../_entidad/classEmpleado.php';
require_once '../_conexion/libreria_PDO.php';
require_once '../_web/imprForm.php';

 class daoEmpleados{
 
    private $con;    //Propiedad para guardar el objeto conexion

    public $result = array();  //Array de objetos para devolver el resultado

    public function __CONSTRUCT(){
      try{
        $this->con = new BD();
      }catch(Exception $e){
        die($e->getMessage());
      }
    }
	  // Funcion cosntructor del modelo de datos empleado

    public function listarEmpleados($codTienda){
      try {
      $consulta = "SELECT * FROM empleado_".$codTienda." WHERE 1";
      $param = array();
      $this->con->ConsultaNormalAssoc($consulta, $param);
      $this->result = array();
        foreach ($this->con->datos as $fila){
          $empleado = new empleado();   
          $empleado->__SET("codEmpleado", $fila['codEmpleado']);
          $empleado->__SET("nombre", $fila['nombre']);
          $empleado->__SET("foto", $fila['foto']);
          $empleado->__SET("apellido1", $fila['apellido1']);
          $empleado->__SET("apellido2", $fila['apellido2']);
          $empleado->__SET("telefono", $fila['telefono']);
          $empleado->__SET("movil", $fila['movil']);
          $empleado->__SET("sueldo", $fila['sueldo']);
          $empleado->__SET("codUsuario", $fila['codUsuario']);
          $this->result[] = $empleado;
        }
        $aux = $this->result;

      }catch (Exception $e){
        echo($e->getMessage());
      }
    }
    //Funcion del modelo de datos empleado listado de empleados, devuelve un array de objetos por result

    public function buscarEmpleado($codEmpleado,$codTienda){
      try {
        $consulta = "SELECT * FROM empleado_$codTienda WHERE codEmpleado = :codEmpleado";
        $param = array(":codEmpleado" => $codProveedor);
        $this->con->ConsultaNormalAssoc($consulta, $param);
        $fila = $this->con->datos[0];
        if(!empty($fila)){
          $empleado = new empleado();   
          $empleado->__SET("codEmpleado", $fila['codEmpleado']);
          $empleado->__SET("nombre", $fila['nombre']);
          $empleado->__SET("foto", $fila['foto']);
          $empleado->__SET("apellido1", $fila['apellido1']);
          $empleado->__SET("apellido2", $fila['apellido2']);
          $empleado->__SET("telefono", $fila['telefono']);
          $empleado->__SET("movil", $fila['movil']);
          $empleado->__SET("sueldo", $fila['sueldo']);
          $empleado->__SET("codUsuario", $fila['codUsuario']);
          return $empleado;
        }else{
          return false;
        }

      }catch (Exception $e){
        echo($e->getMessage());
      }  
    }
    //Funcion del modelo de datos empleado busqueda por clave, devuelve un objeto por return

    public function buscarEmpleadoPorNombre($nombre,$codTienda){
      try {
        $consulta = "SELECT * FROM empleado_$codTienda WHERE nombre LIKE %:nombre%";
        $param = array(":nombre" => $nombre);
        $this->con->ConsultaNormalAssoc($consulta, $param);
        $this->result = array();
          foreach ($this->con->datos as $fila){
            $empleado = new empleado();   
            $empleado->__SET("codEmpleado", $fila['codEmpleado']);
            $empleado->__SET("nombre", $fila['nombre']);
            $empleado->__SET("foto", $fila['foto']);
            $empleado->__SET("apellido1", $fila['apellido1']);
            $empleado->__SET("apellido2", $fila['apellido2']);
            $empleado->__SET("telefono", $fila['telefono']);
            $empleado->__SET("movil", $fila['movil']);
            $empleado->__SET("sueldo", $fila['sueldo']);
            $empleado->__SET("codUsuario", $fila['codUsuario']);
            $this->result[] = $empleado;
          }

      }catch (Exception $e){
        echo($e->getMessage());
      }  
    }
    //Funcion del modelo de datos empleado busqueda por nombre, devuelve un array de objetos por result

    public function buscarEmpleadoPorSueldo($sueldoMax,$sueldoMin,$codTienda){
      try {
        $consulta = "SELECT * FROM empleado_$codTienda WHERE sueldo < :sueldoMax AND  sueldo > :sueldoMin";
        $param = array(":sueldoMax" => $sueldoMax, ":sueldoMin" => $sueldoMin);
        $this->con->ConsultaNormalAssoc($consulta, $param);
        $$this->result = array();
        foreach ($this->con->datos as $fila){
          $empleado = new empleado();   
          $empleado->__SET("codEmpleado", $fila['codEmpleado']);
          $empleado->__SET("nombre", $fila['nombre']);
          $empleado->__SET("foto", $fila['foto']);
          $empleado->__SET("apellido1", $fila['apellido1']);
          $empleado->__SET("apellido2", $fila['apellido2']);
          $empleado->__SET("telefono", $fila['telefono']);
          $empleado->__SET("movil", $fila['movil']);
          $empleado->__SET("sueldo", $fila['sueldo']);
          $empleado->__SET("codUsuario", $fila['codUsuario']);
          $this->result[] = $empleado;
        }

      }catch (Exception $e){
        echo($e->getMessage());
      }  
    }
    //Funcion del modelo de datos empleado busqueda por valores maximo y minimo de suelddo, devuelve un array de objetos por result

    public function eliminarEmpleado($codEmpleado,$codTienda){
      try {
      $consulta = "DELETE FROM empleado_$codTienda WHERE codEmpleado = :codEmpleado";
      $param = array(":codEmpleado" => $codEmpleado);
      $this->result = $this->con->ConsultaSimple($consulta, $param);
      
      }catch (Exception $e){
        echo($e->getMessage());
      }  
    }
    //Funcion del modelo de datos empleado elemina un empleado por clave

    public function insertarEmpleado($obj,$codTienda){
      try {
      $consulta = "INSERT INTO empleado_$codTienda(codEmpleado, nombre, foto, apellido1, apellido2, telefono, movil,sueldo,codUsuario) VALUES (?,?,?,?,?,?,?,?,?)";
      $param = array(
        $obj->__GET("codEmpleado"),
        $obj->__GET("nombre"),
        $obj->__GET("foto"),
        $obj->__GET("apellido1"),
        $obj->__GET("apellido2"),
        $obj->__GET("telefono"),
        $obj->__GET("movil"),
        $obj->__GET("sueldo"),
        $obj->__GET("codUsuario"),

      );
      $this->result = $this->con->ConsultaSimple($consulta, $param);
      
      }catch (Exception $e){
        echo($e->getMessage());
      }  
    }
    //Funcion del modelo de datos empleado inserta un nuevo empleado

    public function actualizarEmpleado($obj,$codTienda){
      try {
      $consulta = "UPDATE empleado_$codTienda SET nombre=?,foto=?, apellido1=?, apellido2=?, telefono=?, movil=?, sueldo=?, codUsuario = ? WHERE codEmpleado=?";
      $param = array(
        $obj->__GET("nombre"),
        $obj->__GET("foto"),
        $obj->__GET("apellido1"),
        $obj->__GET("apellido2"),
        $obj->__GET("telefono"),
        $obj->__GET("movil"),
        $obj->__GET("sueldo"),
        $obj->__GET("codUsuario"),
        $obj->__GET("codEmpleado")

      );
      $this->result = $this->con->ConsultaSimple($consulta, $param);
      
      }catch (Exception $e){
        echo($e->getMessage());
      }  
    }
    //Funcion del modelo de datos empleado actualiza un empleado existente por clave

}
