<?php

require_once "MySQL.php";

class Modulo {

	private $_idModulo;
	private $_descripcion;
	private $_directorio;

	public function setIdModulo($_idModulo) 
	{ 
		$this->_idModulo = $_idModulo; 
		return $this;
	} 	

	public function getIdModulo()
	{ 
		return $this->_idModulo; 
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

	public function setDirectorio($_directorio) 
	{ 
		$this->_directorio = $_directorio; 
		return $this;
	} 

	public function getDirectorio()
	{ 
		return $this->_directorio; 
	} 



	public function obtenerPorIdPerfil($idPerfil) {

		$sql = "SELECT MODULO.ID_MODULO, MODULO.DESCRIPCION, MODULO.DIRECTORIO FROM MODULO JOIN PERFIL_MODULO ON PERFIL_MODULO.RELA_MODULO = MODULO.ID_MODULO JOIN PERFIL ON PERFIL.ID_PERFIL = PERFIL_MODULO.RELA_PERFIL WHERE PERFIL_MODULO.RELA_PERFIL = {$idPerfil}";

		$database = new MySQL();
		$datos = $database->consultar($sql);

		$listadoModulos = [];

		while ($registro = $datos->fetch_assoc()) {
			$modulo = new Modulo();
			$modulo->_idModulo = $registro["ID_MODULO"];
			$modulo->_descripcion = $registro["DESCRIPCION"];
			$modulo->_directorio = $registro["DIRECTORIO"];
			$listadoModulos[] = $modulo;

		}

		return $listadoModulos;

	}

	public static function obtenerTodos() {
			
			$sql = "SELECT * FROM MODULO";

			$database = new MySQL();
			$datos = $database->consultar($sql);

			$listadoModulos = [];

			while ($registro = $datos->fetch_assoc()) {

				$modulo = new Modulo();
				$modulo->_idModulo = $registro["ID_MODULO"];
				$modulo->_descripcion = $registro["DESCRIPCION"];
				$modulo->_directorio = $registro["DIRECTORIO"];
				$listadoModulos[] = $modulo;
			
		}		  
		
		return $listadoModulos;

	}	

	public static function obtenerPorId($id) {

		$sql = "SELECT * FROM MODULO WHERE ID_MODULO=" . $id;

		$database = new MySQL();
		$datos = $database->consultar($sql);

		$registro = $datos->fetch_assoc();

		$modulo = new Modulo();
		$modulo->_idModulo = $registro["ID_MODULO"];
		$modulo->_descripcion = $registro["DESCRIPCION"];
		$modulo->_directorio = $registro["DIRECTORIO"];
		return $modulo;
	}


	public function guardar() {

			$database = new MySQL();

			$sql = "INSERT INTO MODULO (ID_MODULO,DESCRIPCION,DIRECTORIO) VALUES (NULL, '{$this->_descripcion}','{$this->_directorio}')";

			$database->insertar($sql);
		}

		public function actualizar() {

			$database = new MySQL();

			$sql ="UPDATE MODULO SET DESCRIPCION ='{$this->_descripcion}', DIRECTORIO = '{$this->_directorio}' WHERE MODULO.ID_MODULO = {$this->_idModulo}";
		

			$database->actualizar($sql);
		}

		public function eliminar() {

			$database = new MySQL();

			$sql = "DELETE FROM MODULO WHERE ID_MODULO ={$this->_idModulo}";


			
			$database-> eliminar($sql);				

}

}

?>