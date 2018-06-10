<?php
/*
Jaime Matas Asensio
Proyecto DAW: ShopSphere
I.E.S. Maestre de Calatrava - Ciudad Real
2018
*/
	class proveedor{
		private $codProveedor;
		private $nombre;
		private $nombreContacto;
		private $apellido1Contacto;
		private $apellido2Contacto;
		private $telefono;
		private $movil;
		private $email;
		
		public function __GET($nom){
			return $this->$nom;
		}

		public function __SET($nom,$value){
			$this->$nom = $value;
		}

	}	

?>