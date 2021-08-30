<?php

require_once "MySQL.php";

class Tipo {

	private $_idTipo;
	private $_descripcion;


	public function getIdTipo()
	{ 
		return $this->_idTipo; 
	} 	

	public function getDescripcion()
	{ 
		return $this->_descripcion; 
	} 	

	public static function obtenerTodos() {
			
			$sql = "SELECT * FROM TIPO";

			$database = new MySQL();
			$datos = $database->consultar($sql);

			$listadoTipo = [];

			while ($registro = $datos->fetch_assoc()) {

				$tipo = new tipo();
				$tipo->_idTipo = $registro["ID_TIPO"];
				$tipo->_descripcion = $registro["DESCRIPCION"];
				$listadoTipo[] = $tipo;
			
		}		  
		
		return $listadoTipo;

	}
}

?>