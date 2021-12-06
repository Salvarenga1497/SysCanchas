<?php

require_once "MySQL.php";

class Modulo {

	private $_idModulo;
	private $_descripcion;
	private $_directorio;
	private $_nivel;
	private $_orden;
	private $_hijoDe;

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

	public function setNivel($_nivel) 
	{ 
		$this->_nivel = $_nivel; 
		return $this;
	}

	public function setOrden($_orden) 
	{ 
		$this->_orden = $_orden; 
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

	public function setHijoDe($_hijoDe) 
	{ 
		$this->_hijoDe = $_hijoDe; 
		return $this;
	}

	public function getDirectorio()
	{ 
		return $this->_directorio; 
	} 

	public function getNivel()
	{ 
		return $this->_nivel; 
	} 

	public function getOrden()
	{ 
		return $this->_orden; 
	} 

	public function getHijoDe()
	{ 
		return $this->_hijoDe; 
	}




	public static function obtenerPorIdPerfil($idPerfil) {

		$sql = "SELECT MODULO.ID_MODULO, MODULO.DESCRIPCION, MODULO.DIRECTORIO, MODULO.NIVEL, MODULO.ORDEN, MODULO.HIJODE FROM MODULO JOIN PERFIL_MODULO ON PERFIL_MODULO.RELA_MODULO = MODULO.ID_MODULO JOIN PERFIL ON PERFIL.ID_PERFIL = PERFIL_MODULO.RELA_PERFIL WHERE PERFIL_MODULO.RELA_PERFIL = {$idPerfil} ORDER BY MODULO.NIVEL, MODULO.ORDEN ASC ";

		$database = new MySQL();
		$datos = $database->consultar($sql);

		$listadoModulos = [];

		while ($registro = $datos->fetch_assoc()) {
			$modulo = new Modulo();
			$modulo->_idModulo = $registro["ID_MODULO"];
			$modulo->_descripcion = $registro["DESCRIPCION"];
			$modulo->_directorio = $registro["DIRECTORIO"];
			$modulo->_nivel = $registro["NIVEL"];
			$modulo->_orden = $registro["ORDEN"];
			$modulo->_hijoDe = $registro["HIJODE"];
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
				$modulo->_nivel = $registro["NIVEL"];
				$modulo->_orden = $registro["ORDEN"];
				$modulo->_hijoDe = $registro["HIJODE"];
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
		$modulo->_nivel = $registro["NIVEL"];
		$modulo->_orden = $registro["ORDEN"];
		$modulo->_hijoDe = $registro["HIJODE"];
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