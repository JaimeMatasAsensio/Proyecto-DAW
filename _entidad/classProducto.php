<?php
/*
Jaime Matas Asensio
Proyecto DAW: ShopSphere
I.E.S. Maestre de Calatrava - Ciudad Real
2018
*/
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