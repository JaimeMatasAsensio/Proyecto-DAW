<?php
	class tienda{
		private $codTienda;
		private $nombre;
		private $pais;
		private $provincia;
		private $poblacion;
		private $direccion;
		private $numero;
		private $telefono;
		private $movil;
		private $email;
		private $tipoSuscripcion;
		
		public function __GET($nom){
			return $this->$nom;
		}

		public function __SET($nom,$value){
			$this->$nom = $value;
		}

	}

?>