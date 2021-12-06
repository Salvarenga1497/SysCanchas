<?php

require_once "MySQL.php";
require_once "Localidad.php";

class Barrio {

	private $_idBarrio;
	private $_descripcion;
	
	public $_relaLocalidad;

	public function setIdBarrio($_idBarrio) 
	{ 
		$this->_idBarrio = $_idBarrio; 
		return $this;
	}

	public function setDescripcion($_descripcion) 
	{ 
		$this->_descripcion = $_descripcion; 
		return $this;
	}

	public function setRelaLocalidad($_relaLocalidad) 
	{ 
		$this->_relaLocalidad = $_relaLocalidad; 
		return $this;
	}

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
				$barrio->localidad = Localidad::obtenerPorId($barrio->_relaLocalidad);
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

	public static function obtenerPorId ($id) {

			$sql = "SELECT * FROM BARRIO WHERE ID_BARRIO=" . $id; 

			$database = new MySQL();
			$datos = $database-> consultar($sql);

			if ($datos->num_rows > 0) {
				$registro = $datos->fetch_assoc();

				$barrio = new Barrio();
				$barrio->_idBarrio = $registro["ID_BARRIO"];
				$barrio->_relaLocalidad = $registro["RELA_LOCALIDAD"];
				$barrio->_descripcion = $registro["DESCRIPCION"];

				return $barrio;
			}
		}

	public function guardar() {

			$database = new MySQL();

			$sql = "INSERT INTO BARRIO (ID_BARRIO, RELA_LOCALIDAD, DESCRIPCION) VALUES (NULL,{$this->_relaLocalidad}, '{$this->getDescripcion()}')";

			$database->insertar($sql);

		}

	public function eliminar() {

			$database = new MySQL();

			$sql = "DELETE FROM BARRIO WHERE ID_BARRIO ={$this->_idBarrio}";


			
			$database-> eliminar($sql);				

		}
}

?>