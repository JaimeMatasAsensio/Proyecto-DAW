<?php
	class usuario{
		private $codUsuario;
		private $nombre;
		private $password;
		private $email;
		private $nivelAcceso;
		
		public function __GET($nom){
			return $this->$nom;
		}

		public function __SET($nom,$value){
			$this->$nom = $value;
		}

	}

?>