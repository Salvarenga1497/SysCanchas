<?php

require_once "MySQL.php";

class Sexo {

	private $_idSexo;
	private $_descripcion;

	public function setIdSexo($_idSexo) 
	{ 
		$this->_idSexo = $_idSexo; 
		return $this;
	}

	public function setDescripcion($_descripcion) 
	{ 
		$this->_descripcion = $_descripcion; 
		return $this;
	}

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

	public static function obtenerPorId ($id) {

			$sql = "SELECT * FROM SEXO WHERE ID_SEXO=" . $id; 

			$database = new MySQL();
			$datos = $database-> consultar($sql);

			if ($datos->num_rows > 0) {
				$registro = $datos->fetch_assoc();

				$sexo = new Sexo();
				$sexo->_idSexo = $registro["ID_SEXO"];
				$sexo->_descripcion = $registro["DESCRIPCION"];

				return $sexo;
			}
}	

	public function guardar() {

			$database = new MySQL();

			$sql = "INSERT INTO SEXO (ID_SEXO, DESCRIPCION) VALUES (NULL, '{$this->getDescripcion()}')";

			$database->insertar($sql);

		}

		public function eliminar() {

			$database = new MySQL();

			$sql = "DELETE FROM SEXO WHERE ID_SEXO ={$this->_idSexo}";


			
			$database-> eliminar($sql);				

}
}

?>