<?php

require_once "MySQL.php";
require_once "Modulo.php";

class Perfil {

	private $_idPerfil;
	private $_descripcion;
	private $_listadoModulos;


	public function setIdPerfil($_idPerfil) 
	{ 
		$this->_idPerfil = $_idPerfil; 
		return $this;
	}

	public function getIdPerfil()
	{ 
		return $this->_idPerfil; 
	}

	public function setDescipcion($_descripcion) 
	{ 
		$this->_descripcion = $_descripcion; 
		return $this;
	}	

	public function getDescripcion()
	{ 
		return $this->_descripcion; 
	}

	public function getModulos()
	{ 
		return $this->_listadoModulos; 
	} 	

	public static function obtenerPorId($idPerfil) {

		$sql = "SELECT * FROM PERFIL WHERE ID_PERFIL={$idPerfil}";

		$database = new MySQL();
		$datos = $database->consultar($sql);

		$registro = $datos->fetch_assoc();

		$perfil = new Perfil();
		$perfil->_idPerfil = $registro["ID_PERFIL"];
		$perfil->_descripcion = $registro["DESCRIPCION"];
		$perfil->_listadoModulos = Modulo::obtenerPorIdPerfil($perfil->_idPerfil);

		return $perfil;

	}

	public static function obtenerXId($id) {

		$sql = "SELECT * FROM PERFIL WHERE ID_PERFIL=" . $id;

		$database = new MySQL();
		$datos = $database->consultar($sql);

		$registro = $datos->fetch_assoc();

		$perfil = new Perfil();
		$perfil->_idPerfil = $registro["ID_PERFIL"];
		$perfil->_descripcion = $registro["DESCRIPCION"];

		return $perfil;

	}


	public static function obtenerTodos() {
			
			$sql = "SELECT * FROM PERFIL";

			$database = new MySQL();
			$datos = $database->consultar($sql);

			$listadoPerfil = [];

			while ($registro = $datos->fetch_assoc()) {

				$perfil = new Perfil();
				$perfil->_idPerfil = $registro["ID_PERFIL"];
				$perfil->_descripcion = $registro["DESCRIPCION"];
				$listadoPerfil[] = $perfil;
			
		}		  
		
		return $listadoPerfil;

	}	

	public function guardar() {

			$database = new MySQL();

			$sql = "INSERT INTO PERFIL (ID_PERFIL,DESCRIPCION) VALUES (NULL, '{$this->_descripcion}')";

			$database->insertar($sql);
		}

		public function actualizar() {

			$database = new MySQL();

			$sql ="UPDATE PERFIL SET DESCRIPCION ='{$this->_descripcion}' WHERE ID_PERFIL = {$this->_idPerfil}";

			$database->actualizar($sql);
		}

		public function eliminar() {

			$database = new MySQL();

			$sql = "DELETE FROM PERFIL WHERE ID_PERFIL ={$this->_idPerfil}";


			
			$database-> eliminar($sql);				

}



}




?>