<?php
	
	class empleado{
		private $codUsuario;
		private $nombre;
		private $apellido1;
		private $apellido2;
		private $telefono;
		private $movil;
		private $foto;
		private $sueldo;
		private $codUsuario;

		public function __GET($nom){
			return $this->$nom;
		}

		public function __SET($nom,$value){
			$this->$nom = $value;
		}

	}

?>