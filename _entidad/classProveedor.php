<?php

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