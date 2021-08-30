<?php

require_once "MySQL.php";

class TipoContacto {

	private $_idTipoContacto;
	private $_descripcion;

	public function setIdTipoContacto($_idTipoContacto) 
	{ 
		$this->_idTipoContacto = $_idTipoContacto; 
		return $this;
	}

	public function setDescripcion($_descripcion) 
	{ 
		$this->_descripcion = $_descripcion; 
		return $this;
	}

	public function getIdTipoContacto() {
		return $this->_idTipoContacto;
	}

	public function getDescripcion() {
		return $this->_descripcion;
	}	

	public static function obtenerTodos() {

		$sql= "SELECT * FROM TIPO_CONTACTO";

		$database = new MySQL();
		$datos = $database->consultar($sql);

		$listadoTipoContactos = [];

		while ($registro = $datos->fetch_assoc()) {
		$tipoContacto = new TipoContacto();
		$tipoContacto->_idTipoContacto = $registro["ID_TIPO_CONTACTO"];
		$tipoContacto->_descripcion = $registro["DESCRIPCION"];
		$listadoTipoContactos[] = $tipoContacto;

		}

		return $listadoTipoContactos;

	}

	public static function obtenerPorId ($id) {

			$sql = "SELECT * FROM TIPO_CONTACTO WHERE ID_TIPO_CONTACTO=" . $id; 

			$database = new MySQL();
			$datos = $database-> consultar($sql);

			if ($datos->num_rows > 0) {
				$registro = $datos->fetch_assoc();

				$tipoContacto = new TipoContacto();
				$tipoContacto->_idTipoContacto = $registro["ID_TIPO_CONTACTO"];
				$tipoContacto->_descripcion = $registro["DESCRIPCION"];

				return $tipoContacto;
			}
}	

	public function guardar() {

			$database = new MySQL();

			$sql = "INSERT INTO TIPO_CONTACTO (ID_TIPO_CONTACTO, DESCRIPCION) VALUES (NULL, '{$this->getDescripcion()}')";

			$database->insertar($sql);

		}

		public function eliminar() {

			$database = new MySQL();

			$sql = "DELETE FROM TIPO_CONTACTO WHERE ID_TIPO_CONTACTO ={$this->_idTipoContacto}";


			
			$database-> eliminar($sql);				

}
}



?>