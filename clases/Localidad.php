<?php

require_once "MySQL.php";


class Localidad  {

	private $_idLocalidad;
	private $_descripcion;
	private $_relaProvincia;


	public function getIdLocalidad()
	{ 
		return $this->_idLocalidad; 
	} 

	public function getDescripcion()
	{ 
		return $this->_descripcion; 
	} 

	public function getRelaProvincia()
	{ 
		return $this->_relaProvincia; 
	} 		

	public static function obtenerTodos() {
			
			$sql = "SELECT * FROM LOCALIDAD";

			$database = new MySQL();
			$datos = $database->consultar($sql);

			$listadoLocalidades = [];

			while ($registro = $datos->fetch_assoc()) {

				$localidad = new Localidad();
				$localidad->_idLocalidad = $registro["ID_LOCALIDAD"];
				$localidad->_descripcion = $registro["DESCRIPCION"];
				$localidad->_relaProvincia = $registro["RELA_PROVINCIA"];
				$listadoLocalidades[] = $localidad;
			
		}		  
		
		return $listadoLocalidades;

	}

		public static function obtenerPorIdProvincia($id) {
			
			$sql = "SELECT * FROM LOCALIDAD WHERE RELA_PROVINCIA=" . $id;
			

			$database = new MySQL();
			$datos = $database->consultar($sql);

			$listadoLocalidades = [];

			while ($registro = $datos->fetch_assoc()) {

				$localidad = new Localidad();
				$localidad->_idLocalidad = $registro["ID_LOCALIDAD"];
				$localidad->_descripcion = $registro["DESCRIPCION"];
				$localidad->_relaProvincia = $registro["RELA_PROVINCIA"];
				$listadoLocalidades[] = $localidad;
			
		}		  
		
		return $listadoLocalidades;

	}
}

?>