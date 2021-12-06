<?php

require_once "MySQL.php";

class Provincia {

	private $_idProvincia;
	private $_descripcion;

	public function setIdProvincia($_idProvincia) 
	{ 
		$this->_idProvincia = $_idProvincia; 
		return $this;
	}

	public function setDescripcion($_descripcion) 
	{ 
		$this->_descripcion = $_descripcion; 
		return $this;
	}


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

	public static function obtenerPorId ($id) {

			$sql = "SELECT * FROM PROVINCIA WHERE ID_PROVINCIA=" . $id; 

			$database = new MySQL();
			$datos = $database-> consultar($sql);

			if ($datos->num_rows > 0) {
				$registro = $datos->fetch_assoc();

				$provincia = new Provincia();
				$provincia->_idProvincia = $registro["ID_PROVINCIA"];
				$provincia->_descripcion = $registro["DESCRIPCION"];

				return $provincia;
			}
}	

	public function guardar() {

			$database = new MySQL();

			$sql = "INSERT INTO PROVINCIA (ID_PROVINCIA, DESCRIPCION) VALUES (NULL, '{$this->getDescripcion()}')";

			$database->insertar($sql);

		}

	public function eliminar() {

			$database = new MySQL();

			$sql = "DELETE FROM PROVINCIA WHERE ID_PROVINCIA ={$this->_idProvincia}";


			
			$database-> eliminar($sql);				

		}
}

?>