<?php

class MySQL {

	private $_conexion;


	public function __construct() {
		$this->_conexion = new mysqli("localhost", "root", "", "syscanchas");
	}

	public function consultar($sql) {
		$datos = $this->_conexion->query($sql);
		return $datos;
	}

	public function insertar($sql) {
		$datos = $this->_conexion->query($sql);
		return $this->_conexion->insert_id;
	}

	public function actualizar($sql) {
		$this->_conexion->query($sql);
	}

	public function eliminar($sql) {
		$this->_conexion->query($sql);
	}



}

//$database = new MySQL();
//$sql = "INSERT INTO ENTIDADES (ID_ENTIDADES,NOMBRE,APELLIDO,DOC,FECH_NAC,TIPO,ESTADO) VALUES (NULL, 'YANINA','RAMIREZ','56968456','1997-01-22','USUARIO',1);";

//$database->insertar($sql);
?>