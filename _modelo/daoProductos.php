<?php

require_once '../_entidad/classProducto.php';
require_once '../_conexion/libreria_PDO.php';
require_once '../_web/imprForm.php';

 class daoProductos{
 
    private $con;    //Propiedad para guardar el objeto conexion

    public $result = array();  //Array de objetos para devolver el resultado

    public function __CONSTRUCT(){
      try{
        $this->con = new BD();
      }catch(Exception $e){
        die($e->getMessage());
      }
    }
	  //contructor del modelo de datos para producto

    public function listarProductos($codTienda){
      try {
      $consulta = "SELECT * FROM producto_".$codTienda." WHERE 1";
      $param = array();
      $this->con->ConsultaNormalAssoc($consulta, $param);
      $this->result = array();
        foreach ($this->con->datos as $fila){
          $producto = new producto();   
          $producto->__SET("codProducto", $fila['codProducto']);
          $producto->__SET("referencia", $fila['referencia']);
          $producto->__SET("nombre", $fila['nombre']);
          $producto->__SET("descripcion", $fila['descripcion']);
          $producto->__SET("precio", $fila['precio']);
          $producto->__SET("IVA", $fila['IVA']);
          $producto->__SET("descuento", $fila['descuento']);
          $producto->__SET("cantidad", $fila['cantidad']);
          $producto->__SET("cantidadMin", $fila['cantidadMin']);
          $producto->__SET("nuevo", $fila['nuevo']);
          $producto->__SET("foto", $fila['foto']);

          $this->result[] = $producto;
        }
        $aux = $this->result;

      }catch (Exception $e){
        echo($e->getMessage());
      }
    }
    //Funcion modelo de datos productos devuelve un array con los productos por result

    public function buscarProducto($codProducto,$codTienda){
      try {
        $consulta = "SELECT * FROM producto_$codTienda WHERE codProducto = :codProducto";
        $param = array(":codProducto" => $codProveedor);
        $this->con->ConsultaNormalAssoc($consulta, $param);
        $fila = $this->con->datos[0];
        if(!empty($fila)){
          $producto = new producto();   
          $producto->__SET("codProducto", $fila['codProducto']);
          $producto->__SET("referencia", $fila['referencia']);
          $producto->__SET("nombre", $fila['nombre']);
          $producto->__SET("descripcion", $fila['descripcion']);
          $producto->__SET("precio", $fila['precio']);
          $producto->__SET("IVA", $fila['IVA']);
          $producto->__SET("descuento", $fila['descuento']);
          $producto->__SET("cantidad", $fila['cantidad']);
          $producto->__SET("cantidadMin", $fila['cantidadMin']);
          $producto->__SET("nuevo", $fila['nuevo']);
          $producto->__SET("foto", $fila['foto']);
          return $producto;
        }else{
          return false;
        }

      }catch (Exception $e){
        echo($e->getMessage());
      }  
    }
    //Funcion modelo de datos productos busqueda por clave devuelve un objeto  por return

    public function buscarProductoPorNombre($nombre,$codTienda){
      try {
        $consulta = "SELECT * FROM producto_$codTienda WHERE nombre LIKE %:nombre%";
        $param = array(":nombre" => $nombre);
        $this->con->ConsultaNormalAssoc($consulta, $param);
        $this->result = array();     
          foreach ($this->con->datos as $fila){
            $producto = new producto();   
            $producto->__SET("codProducto", $fila['codProducto']);
            $producto->__SET("referencia", $fila['referencia']);
            $producto->__SET("nombre", $fila['nombre']);
            $producto->__SET("descripcion", $fila['descripcion']);
            $producto->__SET("precio", $fila['precio']);
            $producto->__SET("IVA", $fila['IVA']);
            $producto->__SET("descuento", $fila['descuento']);
            $producto->__SET("cantidad", $fila['cantidad']);
            $producto->__SET("cantidadMin", $fila['cantidadMin']);
            $producto->__SET("nuevo", $fila['nuevo']);
            $producto->__SET("foto", $fila['foto']);

          $this->result[] = $producto;
          }

      }catch (Exception $e){
        echo($e->getMessage());
      }  
    }
    //Funcion modelo de datos productos busqueda por nombre devuelve un array de objetos por result

    public function buscarProductoPorReferencia($codTienda,$referencia){
      try {
        $consulta = "SELECT * FROM producto_$codTienda WHERE referencia = :referencia";
        $param = array(":referencia" => $referencia);
        $this->con->ConsultaNormalAssoc($consulta, $param);
        $fila = $this->con->datos[0];
        if(!empty($fila)){
          $producto = new producto();   
          $producto->__SET("codProducto", $fila['codProducto']);
          $producto->__SET("referencia", $fila['referencia']);
          $producto->__SET("nombre", $fila['nombre']);
          $producto->__SET("descripcion", $fila['descripcion']);
          $producto->__SET("precio", $fila['precio']);
          $producto->__SET("IVA", $fila['IVA']);
          $producto->__SET("descuento", $fila['descuento']);
          $producto->__SET("cantidad", $fila['cantidad']);
          $producto->__SET("cantidadMin", $fila['cantidadMin']);
          $producto->__SET("nuevo", $fila['nuevo']);
          $producto->__SET("foto", $fila['foto']);
          return $producto;
        }else{
          return false;
        }

      }catch (Exception $e){
        echo($e->getMessage());
      }  
    }
    //Funcion modelo de datos productos busqueda por referencia devuelve un objeto por result

    public function buscarProductoPorPrecio($codTienda,$precioMax,$precioMin){
      try {
        $consulta = "SELECT * FROM producto_$codTienda WHERE precio > :precioMin AND precio < :precioMax";
        $param = array(":precioMin" => $precioMax, ":precioMax" => $precioMax);
        $this->con->ConsultaNormalAssoc($consulta, $param);
        $fila = $this->con->datos[0];
        if(!empty($fila)){
          $producto = new producto();   
          $producto->__SET("codProducto", $fila['codProducto']);
          $producto->__SET("referencia", $fila['referencia']);
          $producto->__SET("nombre", $fila['nombre']);
          $producto->__SET("descripcion", $fila['descripcion']);
          $producto->__SET("precio", $fila['precio']);
          $producto->__SET("IVA", $fila['IVA']);
          $producto->__SET("descuento", $fila['descuento']);
          $producto->__SET("cantidad", $fila['cantidad']);
          $producto->__SET("cantidadMin", $fila['cantidadMin']);
          $producto->__SET("nuevo", $fila['nuevo']);
          $producto->__SET("foto", $fila['foto']);
          return $producto;
        }else{
          return false;
        }

      }catch (Exception $e){
        echo($e->getMessage());
      }  
    }
    //Funcion modelo de datos productos busqueda por precio devuelve un array de productos por result

    public function eliminarProducto($codProducto,$codTienda){
      try {
      $consulta = "DELETE FROM producto_$codTienda WHERE codProducto = :codProducto";
      $param = array(":codProducto" => $codProducto);
      $this->result = $this->con->ConsultaSimple($consulta, $param);
      
      }catch (Exception $e){
        echo($e->getMessage());
      }  
    }
    //Funcion modelo de datos productos elimina un registro

    public function insertarProducto($obj,$codTienda){
      try {
      $consulta = "INSERT INTO producto_$codTienda(codProducto, nombre, referencia, descripcion, precio, IVA, descuento,cantidad,cantidadMin, nuevo, foto) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
      $param = array(
        $obj->__GET("codProducto"),
        $obj->__GET("nombre"),
        $obj->__GET("referencia"),
        $obj->__GET("descripcion"),
        $obj->__GET("precio"),
        $obj->__GET("IVA"),
        $obj->__GET("descuento"),
        $obj->__GET("cantidad"),
        $obj->__GET("cantidadMin"),
        $obj->__GET("nuevo"),
        $obj->__GET("foto")

      );
      $this->result = $this->con->ConsultaSimple($consulta, $param);
      
      }catch (Exception $e){
        echo($e->getMessage());
      }  
    }
    //Funcion modelo de datos producto insertar un nuevo registro

    public function actualizarProducto($obj,$codTienda){
      try {
      $consulta = "UPDATE producto_$codTienda SET nombre=?,referencia=?, descripcion=?, precio=?, IVA=?, descuento=?, cantidad=?, cantidadMin = ?, nuevo = ?, foto = ? WHERE codProducto=?";
      $param = array(
        $obj->__GET("nombre"),
        $obj->__GET("referencia"),
        $obj->__GET("descripcion"),
        $obj->__GET("precio"),
        $obj->__GET("IVA"),
        $obj->__GET("descuento"),
        $obj->__GET("cantidad"),
        $obj->__GET("cantidadMin"),
        $obj->__GET("nuevo"),
        $obj->__GET("foto"),
        $obj->__GET("codProducto")

      );
      $this->result = $this->con->ConsultaSimple($consulta, $param);
      
      }catch (Exception $e){
        echo($e->getMessage());
      }  
    }
    //Funcion modelo de datos producto actualiza un producto existente
}
