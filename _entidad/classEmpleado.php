<?php
/*
Jaime Matas Asensio
Proyecto DAW: ShopSphere
I.E.S. Maestre de Calatrava - Ciudad Real
2018
*/	
	class empleado{
		private $codEmpleado;
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