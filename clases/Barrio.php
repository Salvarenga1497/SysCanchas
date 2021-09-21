<?php

require_once "MySQL.php";


class Barrio {

	private $_idBarrio;
	private $_descripcion;
	private $_relaLocalidad;


	public function getIdBarrio()
	{ 
		return $this->_idBarrio; 
	} 


	public function getDescripcion()
	{ 
		return $this->_descripcion; 
	} 	

	public function getRelaLocalidad()
	{ 
		return $this->_relaLocalidad; 
	} 




	public static function obtenerTodos() {
			
			$sql = "SELECT * FROM BARRIO";

			$database = new MySQL();
			$datos = $database->consultar($sql);

			$listadoBarrio = [];

			while ($registro = $datos->fetch_assoc()) {

				$barrio = new Barrio();
				$barrio->_idBarrio = $registro["ID_BARRIO"];
				$barrio->_descripcion = $registro["DESCRIPCION"];
				$barrio->_relaLocalidad = $registro["RELA_LOCALIDAD"];
				$listadoBarrio[] = $barrio;
			
		}		  
		
		return $listadoBarrio;

	}

	public static function obtenerPorIdLocalidad($id) {
			
			$sql = "SELECT * FROM BARRIO WHERE RELA_LOCALIDAD=" . $id;
			

			$database = new MySQL();
			$datos = $database->consultar($sql);

			$listadoBarrio = [];

			while ($registro = $datos->fetch_assoc()) {

				$barrio = new Barrio();
				$barrio->_idBarrio = $registro["ID_BARRIO"];
				$barrio->_descripcion = $registro["DESCRIPCION"];
				$barrio->_relaLocalidad = $registro["RELA_LOCALIDAD"];
				$listadoBarrio[] = $barrio;
			
		}		  
		
		return $listadoBarrio;

	}
}

?>