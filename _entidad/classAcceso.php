<?php
	
	class acceso{
		
		private $codUsuario;
		private $codTienda;

		public function __GET($nom){
			return $this->$nom;
		}

		public function __SET($nom,$value){
			$this->$nom = $value;
		}


	}

?>