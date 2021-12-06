<?php

require_once "MySQL.php";
require_once "Provincia.php";


class Localidad  {

	private $_idLocalidad;
	private $_descripcion;
	public $_relaProvincia;

	public function setIdLocalidad($_idLocalidad) 
	{ 
		$this->_idLocalidad = $_idLocalidad; 
		return $this;
	}

	public function setDescripcion($_descripcion) 
	{ 
		$this->_descripcion = $_descripcion; 
		return $this;
	}

	public function setRelaProvincia($_relaProvincia) 
	{ 
		$this->_relaProvincia = $_relaProvincia; 
		return $this;
	}


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
				$localidad->provincia = Provincia::obtenerPorId($localidad->_relaProvincia);
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

	public static function obtenerPorId ($id) {

			$sql = "SELECT * FROM LOCALIDAD WHERE ID_LOCALIDAD=" . $id; 

			$database = new MySQL();
			$datos = $database-> consultar($sql);

			if ($datos->num_rows > 0) {
				$registro = $datos->fetch_assoc();

				$localidad = new Localidad();
				$localidad->_idLocalidad = $registro["ID_LOCALIDAD"];
				$localidad->_relaProvincia = $registro["RELA_PROVINCIA"];
				$localidad->_descripcion = $registro["DESCRIPCION"];

				return $localidad;
			}
		}

	public function guardar() {

			$database = new MySQL();

			$sql = "INSERT INTO LOCALIDAD (ID_LOCALIDAD, RELA_PROVINCIA, DESCRIPCION) VALUES (NULL,{$this->_relaProvincia}, '{$this->getDescripcion()}')";

			$database->insertar($sql);

		}

	public function eliminar() {

			$database = new MySQL();

			$sql = "DELETE FROM LOCALIDAD WHERE ID_LOCALIDAD ={$this->_idLocalidad}";


			
			$database-> eliminar($sql);				

		}
}

?>