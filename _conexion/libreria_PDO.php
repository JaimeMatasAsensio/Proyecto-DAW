<?php
/*Libreria PDO para objetos esta libreria implmentara distintas clases para la gestion de bases de datos.*/

class BD {

	//Propiedades...
	private $conexion;
	private $nomBD = "shopshpere";
	private $ip = "localhost";
	private $user = "root";
	private $pass = "";
	public $datos;		//Variable para almacenar los datos de una consulta en un array

	//Constructor... Realiza la conexion a la base de datos y devuelve el descriptor de la conexion.
	public function __construct(){
		try{
      $this->conexion = new PDO("mysql:host=".$this->ip.";dbname=".$this->nomBD."",$this->user,$this->pass);
      $this->conexion->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true); // Establecer unos parametros de conexion
      $this->conexion->exec("set names utf8mb4");//Establecer juego de caracteres utilizados

    }catch(PDOException $e) {
    	//Muestra un error en caso de fallar la conexion
      echo "    <p>Error: No puede conectarse con la base de datos.</p>";
      echo "    <p>Error: " . $e->getMessage() . "</p>";
      exit();
    }
	}

	//Getters & Setters...
	public function __get($nom){
		return $this->$nom;
	}

	public function __set($nom, $value){
		$this->$nom = $value;
	}

	
	//Metodos publicos...
	
	public function ConsultaSimple($consultaSQL,$parametros)
	/*Consulta simple a una base de datos. Se usa para insert, update... Cuando las consultas no devuelven informacion*/
	{
			
		$statement = $this->conexion->prepare($consultaSQL);

		if($statement->execute($parametros)) {
			return true;
		}else{
			return false;
		}
	}

	public function ConsultaNormalRow($consultaSQL,$parametros)
	/*Consulta que si devuelve datos. usadas para hacer select. Devuelve un array con indices numericos*/
	{
		$this->datos = array();
		$statement = $this->conexion->prepare($consultaSQL);

		try{
			$statement->execute($parametros); 
			while($fila = $statement->fetch(PDO::FETCH_NUM))	
			{
				$this->datos[] = $fila;
			}

		}catch(PDOException $e) {
    	//Muestra un error en caso de fallar la conexion
      echo "    <p>Error: Fallo en la consulta!</p>";
      echo "    <p>Error: " . $e->getMessage() . "</p>";
    }

	}

	public function ConsultaNormalAssoc($consultaSQL,$parametros)
	/*Consulta que si devuelve datos. Devuelve un array asociativo con pares clave-valor*/
	{
		$this->datos = array();
		$statement = $this->conexion->prepare($consultaSQL);

		try{
			$statement->execute($parametros); 
			while($fila = $statement->fetch(PDO::FETCH_ASSOC))	
			{
				$this->datos[] = $fila;
			}
				
		}catch(PDOException $e) {
    	//Muestra un error en caso de fallar la conexion
      echo "    <p>Error: Fallo en la consulta!</p>";
      echo "    <p>Error: " . $e->getMessage() . "</p>";
    }
	}

	public function ConsultaNormalArray($consultaSQL)
	/*Consulta que si devuelve datos. Usadas para hacer select. Retorna un array indexado de forma numerica y por pares clave-valor */
	{
		$this->datos = array();
		$statement = $this->conexion->prepare($consultaSQL);

		if($statement->execute($parametros)) {
			
			while($fila = $statement->fetch(PDO::FETCH_BOTH))
			{
				$this->datos[] = $fila;
			}

		}else{

			echo "<p>Cosulta erronea... </p>";
		}
	}


	public function cerrar()
	/*Funcion que cierra la conexion a la base de datos*/
	{
		$this->conexion = null;
		
	}


}

?>