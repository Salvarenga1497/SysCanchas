<?php

require_once "MySQL.php";

class TipoTarifa {

	private $_idTipoTarifa;
	private $_descripcion;


	public function getIdTipoTarifa()
	{ 
		return $this->_idTipoTarifa; 
	} 	

	public function getDescripcion()
	{ 
		return $this->_descripcion; 
	} 	

	public static function obtenerTodos() {
			
			$sql = "SELECT * FROM TIPO_TARIFA";

			$database = new MySQL();
			$datos = $database->consultar($sql);

			$listadoTipo = [];

			while ($registro = $datos->fetch_assoc()) {

				$tipo = new TipoTarifa();
				$tipo->_idTipoTarifa = $registro["ID_TIPO_TARIFA"];
				$tipo->_descripcion = $registro["DESCRIPCION"];
				$listadoTipo[] = $tipo;
			
		}		  
		
		return $listadoTipo;

	}
}

?>