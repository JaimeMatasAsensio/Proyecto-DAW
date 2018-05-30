<?php
	
	class producto{
		private $codProducto;
		private $referencia;
		private $nombre;
		private $descripcion;
		private $precio;
		private $IVA;
		private $descuento;
		private $cantidad;
		private $cantidadMin;
		private $nuevo;
		private $foto;
		
		public function __GET($nom){
			return $this->$nom;
		}

		public function __SET($nom,$value){
			$this->$nom = $value;
		}

	}

?>