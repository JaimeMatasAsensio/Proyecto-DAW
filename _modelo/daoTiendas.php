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

    public function eliminarTienda($codTienda){
      try {
      //Borramos el Registro de la tabla de tiendas
      $consulta = "DELETE FROM tienda WHERE codTienda = :codTienda";
      $param = array(":codTienda" => $codTienda);
      $this->result = $this->con->ConsultaSimple($consulta, $param);
      
      //Borrado de usuarios y accesos a la tienda<-----Continuar

      $consulta = "SELECT codUsuario FROM `acceso` WHERE codTienda = :codTienda";
      $param = array(":codTienda" => $codTienda);


      //INI - Borrado de tablas
      
      //Borramos la tabla de empleados
      $consulta = "DROP TABLE empleado_".$codTienda;
      $param = array();
      $this->result = $this->con->ConsultaSimple($consulta, $param);

      //Borramos la tabla de proveedor
      $consulta = "DROP TABLE proveedor_".$codTienda;
      $param = array();
      $this->result = $this->con->ConsultaSimple($consulta, $param);

      //Borramos la tabla de productos
      $consulta = "DROP TABLE productos_".$codTienda;
      $param = array();
      $this->result = $this->con->ConsultaSimple($consulta, $param);

      //Borramos la tabla de suministro
      $consulta = "DROP TABLE suministro_".$codTienda;
      $param = array();
      $this->result = $this->con->ConsultaSimple($consulta, $param);

      //FIN - Borrado de tablas
      }catch (Exception $e){
        echo($e->getMessage());
      }  
    }
    //Funcion modelo de datos tienda elimna una tienda y todas las tablas que pertenecen a esta

    public function insertarTienda($obj){
      try {
        //Insertamos el Registro de la nueva tienda en la tabla
        $consulta = "INSERT INTO tienda(codTienda, nombre, pais, provincia, poblacion, direccion, numero, telefono, movil, email, tipoSuscripcion) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
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

        //INI-Creacion de tablas
        
        //Creamos la tabla de empleado con el codigo de la nueva tienda
        $consulta = "CREATE TABLE `empleado_".$obj->__GET("codTienda")."` ( `codEmpleado` varchar(3) NOT NULL,
                  `nombre` varchar(30) NOT NULL,
                  `apellido1` varchar(30) NOT NULL,
                  `apellido2` varchar(30) NOT NULL,
                  `telefono` varchar(12) NOT NULL,
                  `movil` varchar(12) NOT NULL,
                  `foto` blob NOT NULL,
                  `sueldo` float NOT NULL,
                  `codUsuario` varchar(3) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
        $param = array();
        $this->result = $this->con->ConsultaSimple($consulta, $param);
        //Asignamos la clave principal a la tabla de empleados
        $consulta = "ALTER TABLE `empleado_".$obj->__GET("codTienda")."` ADD PRIMARY KEY (`codEmpleado`);";
        $param = array();
        $this->result = $this->con->ConsultaSimple($consulta, $param);

        //Creamos la tabla de producto con el codigo de la nueva tienda
        $consulta = "CREATE TABLE `producto_".$obj->__GET("codTienda")."` (
                    `codProducto` varchar(3) NOT NULL,
                    `referencia` varchar(13) NOT NULL,
                    `nombre` varchar(30) NOT NULL,
                    `descripcion` text NOT NULL,
                    `precio` float NOT NULL,
                    `IVA` float NOT NULL,
                    `descuento` float NOT NULL,
                    `cantidad` int(3) NOT NULL,
                    `cantidadMin` int(3) NOT NULL,
                    `nuevo` tinyint(1) NOT NULL,
                    `foto` blob NOT NULL
                  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
        $param = array();
        $this->result = $this->con->ConsultaSimple($consulta, $param);
        //Asignamos la clave principal a la tabla de producto
        $consulta = "ALTER TABLE `producto_".$obj->__GET("codTienda")."` ADD PRIMARY KEY (`codProducto`);";
        $param = array();
        $this->result = $this->con->ConsultaSimple($consulta, $param);

        //Creamos la tabla de proveedores con el codigo de la nueva tienda
        $consulta = "CREATE TABLE `proveedor_".$obj->__GET("codTienda")."` (
                      `codProveedor` varchar(3) NOT NULL,
                      `nombre` varchar(30) NOT NULL,
                      `nombreContacto` varchar(30) NOT NULL,
                      `apellido1Contacto` varchar(30) NOT NULL,
                      `apellido2Contacto` varchar(30) NOT NULL,
                      `telefono` varchar(12) NOT NULL,
                      `movil` varchar(12) NOT NULL,
                      `email` varchar(40) NOT NULL
                    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
        $param = array();
        $this->result = $this->con->ConsultaSimple($consulta, $param);
        //Asignamos la clave principal a la tabla de proveedores
        $consulta = "ALTER TABLE `proveedor_".$obj->__GET("codTienda")."` ADD PRIMARY KEY (`codProveedor`);";
        $param = array();
        $this->result = $this->con->ConsultaSimple($consulta, $param);
        
        //Creamos la tabla de suministro con el codigo de la nueva tienda
        $consulta = "CREATE TABLE `suministro_".$obj->__GET("codTienda")."` (
                      `codProducto` varchar(3) NOT NULL,
                      `codProveedor` varchar(3) NOT NULL
                    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
        $param = array();
        $this->result = $this->con->ConsultaSimple($consulta, $param);
        //Asignamos la clave principal a la tabla de suministro
        $consulta = "ALTER TABLE `suministro_".$obj->__GET("codTienda")."` ADD PRIMARY KEY (`codProducto`,`codProveedor`);";
        $param = array();
        $this->result = $this->con->ConsultaSimple($consulta, $param);
        
        //FIN-Creacion de Tablas

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
