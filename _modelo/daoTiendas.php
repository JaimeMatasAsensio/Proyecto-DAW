<?php

require_once '../_entidad/classTienda.php';
require_once '../_conexion/libreria_PDO.php';

 class daoTiendas{
 
    private $con;    //Propiedad para guardar el objeto conexion

    public $result = array();  //Array de objetos para devolver el resultado

    public function __CONSTRUCT(){
      try{
        $this->con = new BD();
      }catch(Exception $e){
        die($e->getMessage());
      }
    }
	  //Funcion constructora del modelo de datos de tienda

    public function listarTiendas(){
      try {
      $consulta = "SELECT * FROM tienda WHERE 1";
      $param = array();
      $this->con->ConsultaNormalAssoc($consulta, $param);
      $this->result = array();
        foreach ($this->con->datos as $fila){
          $tienda = new tienda();   
          $tienda->__SET("codTienda", $fila['codTienda']);
          $tienda->__SET("nombre", $fila['nombre']);
          $tienda->__SET("pais", $fila['pais']);
          $tienda->__SET("provincia", $fila['provincia']);
          $tienda->__SET("poblacion", $fila['poblacion']);
          $tienda->__SET("direccion", $fila['direccion']);
          $tienda->__SET("numero", $fila['numero']);
          $tienda->__SET("telefono", $fila['telefono']);
          $tienda->__SET("movil", $fila['movil']);
          $tienda->__SET("email", $fila['email']);
          $tienda->__SET("tipoSuscripcion", $fila['tipoSuscripcion']);
          $this->result[] = $tienda;
        }
      }catch (Exception $e){
        echo($e->getMessage());
      }
    }
    //Funcion modelo de datos tienda listado de tiendas, devuelve un array de objetos por result

    public function buscarTienda($codTienda){
      try {
        $consulta = "SELECT * FROM tienda WHERE codTienda = :codTienda";
        $param = array(":codTienda" => $codTienda);
        $this->con->ConsultaNormalAssoc($consulta, $param);
        if(!empty($this->con->datos)){
        $fila = $this->con->datos[0];
          if(!empty($fila)){
            $tienda = new tienda();   
            $tienda->__SET("codTienda", $fila['codTienda']);
            $tienda->__SET("nombre", $fila['nombre']);
            $tienda->__SET("pais", $fila['pais']);
            $tienda->__SET("provincia", $fila['provincia']);
            $tienda->__SET("poblacion", $fila['poblacion']);
            $tienda->__SET("direccion", $fila['direccion']);
            $tienda->__SET("numero", $fila['numero']);
            $tienda->__SET("telefono", $fila['telefono']);
            $tienda->__SET("movil", $fila['movil']);
            $tienda->__SET("email", $fila['email']);
            $tienda->__SET("tipoSuscripcion", $fila['tipoSuscripcion']);

            return $tienda;
          }else{
            return 0;
          }
        }else{
          return 0;
        }

      }catch (Exception $e){
        echo($e->getMessage());
      }  
    }
    //Funcion modelo de datos tienda busqueda por clave, devuelve un objeto por return

    public function buscarTiendaPorNombre($nombre){
      try {
        $consulta = "SELECT * FROM tienda WHERE nombre LIKE :nombre";
        $param = array(":nombre" => $nombre);
        $this->con->ConsultaNormalAssoc($consulta, $param);
        $this->result = array();
          foreach ($this->con->datos as $fila){
            $tienda = new tienda();   
            $tienda->__SET("codTienda", $fila['codTienda']);
            $tienda->__SET("nombre", $fila['nombre']);
            $tienda->__SET("pais", $fila['pais']);
            $tienda->__SET("provincia", $fila['provincia']);
            $tienda->__SET("poblacion", $fila['poblacion']);
            $tienda->__SET("direccion", $fila['direccion']);
            $tienda->__SET("numero", $fila['numero']);
            $tienda->__SET("telefono", $fila['telefono']);
            $tienda->__SET("movil", $fila['movil']);
            $tienda->__SET("email", $fila['email']);
            $tienda->__SET("tipoSuscripcion", $fila['tipoSuscripcion']);
            $this->result[] = $tienda;
          }

      }catch (Exception $e){
        echo($e->getMessage());
      }  
    }
    //Funcion modelo de datos tienda busqueda por nombre, devuelve un array por result

    public function buscarTiendaPorSuscripcion($tipoSuscripcion){
      try {
      $consulta = "SELECT * FROM tienda WHERE tipoSuscripcion = :tSuscrip";
      $param = array(":tSuscrip" => $tipoSuscripcion);
      $this->con->ConsultaNormalAssoc($consulta, $param);
      $this->result = array();
        foreach ($this->con->datos as $fila){
          $tienda = new tienda();   
          $tienda->__SET("codTienda", $fila['codTienda']);
          $tienda->__SET("nombre", $fila['nombre']);
          $tienda->__SET("pais", $fila['pais']);
          $tienda->__SET("provincia", $fila['provincia']);
          $tienda->__SET("poblacion", $fila['poblacion']);
          $tienda->__SET("direccion", $fila['direccion']);
          $tienda->__SET("numero", $fila['numero']);
          $tienda->__SET("telefono", $fila['telefono']);
          $tienda->__SET("movil", $fila['movil']);
          $tienda->__SET("email", $fila['email']);
          $tienda->__SET("tipoSuscripcion", $fila['tipoSuscripcion']);
          $this->result[] = $tienda;
        }
      }catch (Exception $e){
        echo($e->getMessage());
      }
    }
    //Funcion modelo de datos tienda busqueda por tipo de suscripcion, devuleve un array por result

    public function obtenerUltimoCodigo(){
      
      $consulta = "SELECT codTienda FROM tienda WHERE 1 ORDER BY codTienda DESC LIMIT 1";
      $param = array();
      try {
        $this->con->ConsultaNormalAssoc($consulta, $param);
        if(!empty($this->con->datos)){
          $fila = $this->con->datos[0];
            if(!empty($fila)){
              
              $tienda = $fila["codTienda"];

              return $tienda;
            }else{
              return 0;
            }
        }
      }catch (Exception $e){
        echo($e->getMessage());
      }
    }
    //Funcion para obtener el codigo de la ultima tienda insertada, deveulve un entero - UTILIDAD
/*Retocar para que ELIMINE las tablas que pertenezcan a una tienda*/
    public function eliminarTienda($codTienda){
      try {
      $consulta = "DELETE FROM tienda WHERE codTienda = :codTienda";
      $param = array(":cosTienda" => $CodTienda);
      $this->result = $this->con->ConsultaSimple($consulta, $param);
      
      }catch (Exception $e){
        echo($e->getMessage());
      }  
    }
    //Funcion modelo de datos tienda elimna una tienda y todas las tablas que pertenecen a esta

/*Retocar para que GENERE las tablas de una tienda*/
    public function insertarTienda($obj){
      try {
      $consulta = "INSERT INTO tienda(codTienda, nombre, pais, provincia, poblacion, direccion, numero, telefono, movil, email, tipoSuscripcion) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
      $param = array(
        $obj->__GET("codTienda"),
        $obj->__GET("nombre"),
        $obj->__GET("pais"),
        $obj->__GET("provincia"),
        $obj->__GET("poblacion"),
        $obj->__GET("direccion"),
        $obj->__GET("numero"),
        $obj->__GET("telefono"),
        $obj->__GET("movil"),
        $obj->__GET("email"),
        $obj->__GET("tipoSuscripcion")
      );
      $this->result = $this->con->ConsultaSimple($consulta, $param);
      
      }catch (Exception $e){
        echo($e->getMessage());
      }  
    }
    //Funcion modelo de datos tienda inserta un nuevo registro y crea todo el conjunto de tablas que necesita una tienda
    
    public function actualizarTienda($obj){
      try {
      $consulta = "UPDATE tienda SET nombre=?,pais=?,provincia=?,poblacion=?, direccion=?, numero=?, telefono=?, movil=?,email=?,tipoSuscripcion=? WHERE codtienda=?";
      $param = array(
        $obj->__GET("nombre"),
        $obj->__GET("pais"),
        $obj->__GET("provincia"),
        $obj->__GET("poblacion"),
        $obj->__GET("direccion"),
        $obj->__GET("numero"),
        $obj->__GET("telefono"),
        $obj->__GET("movil"),
        $obj->__GET("email"),
        $obj->__GET("tipoSuscripcion"),
        $obj->__GET("codTienda"),
      );
      $this->result = $this->con->ConsultaSimple($consulta, $param);
      
      }catch (Exception $e){
        echo($e->getMessage());
      }  
    }
    //Funcion modelo de datos tienda actualiza un registro existente

}
