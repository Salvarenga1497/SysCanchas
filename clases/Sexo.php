<?php

require_once "MySQL.php";

class Sexo {

	private $_idSexo;
	private $_descripcion;


	public function getIdSexo()
	{ 
		return $this->_idSexo; 
	} 	

	public function getDescripcion()
	{ 
		return $this->_descripcion; 
	} 	

	public static function obtenerTodos() {
			
			$sql = "SELECT * FROM SEXO";

			$database = new MySQL();
			$datos = $database->consultar($sql);

			$listadoSexo = [];

			while ($registro = $datos->fetch_assoc()) {

				$sexo = new Sexo();
				$sexo->_idSexo = $registro["ID_SEXO"];
				$sexo->_descripcion = $registro["DESCRIPCION"];
				$listadoSexo[] = $sexo;
			
		}		  
		
		return $listadoSexo;

	}
}

?>