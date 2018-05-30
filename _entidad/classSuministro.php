<?php

	class suministro{
		private $codProveedor;
		private $codProducto;

		public function __GET($nom){
			return $this->$nom;
		}

		public function __SET($nom,$value){
			$this->$nom = $value;
		}
	}

?>