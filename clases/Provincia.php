<?php

require_once "MySQL.php";

class Provincia {

	private $_idProvincia;
	private $_descripcion;


	public function getIdProvincia()
	{ 
		return $this->_idProvincia; 
	} 	

	public function getDescripcion()
	{ 
		return $this->_descripcion; 
	} 	

	public static function obtenerTodos() {
			
			$sql = "SELECT * FROM PROVINCIA";

			$database = new MySQL();
			$datos = $database->consultar($sql);

			$listadoProvincia = [];

			while ($registro = $datos->fetch_assoc()) {

				$provincia = new Provincia();
				$provincia->_idProvincia = $registro["ID_PROVINCIA"];
				$provincia->_descripcion = $registro["DESCRIPCION"];
				$listadoProvincia[] = $provincia;
			
		}		  
		
		return $listadoProvincia;

	}
}

?>