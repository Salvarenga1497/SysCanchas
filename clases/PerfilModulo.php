<?php

require_once "MySQL.php";
require_once "Entidad.php";

class PerfilModulo {

	private $_idPerfilModulo;
	private $_relaModulo;
	private $_relaPerfil;


	public function setIdPerfilModulo($_idPerfilModulo) 
	{ 
		$this->_idPerfilModulo = $_idPerfilModulo; 
		return $this;
	} 	

	public function getIdPerfilModulo()
	{ 
		return $this->_idPerfilModulo; 
	}

	public function setRelaModulo($_relaModulo) 
	{ 
		$this->_relaModulo = $_relaModulo; 
		return $this;
	} 	

	public function getRelaModulo()
	{ 
		return $this->_relaModulo; 
	}

	public function setRelaPerfil($_relaPerfil) 
	{ 
		$this->_relaPerfil = $_relaPerfil; 
		return $this;
	} 	

	public function getRelaPerfil()
	{ 
		return $this->_relaPerfil; 
	}


	public static function obtenerTodos() {
			
			$sql = "SELECT * FROM PERFIL_MODULO";

			$database = new MySQL();
			$datos = $database->consultar($sql);

			$listadoPerfilModulo = [];

			while ($registro = $datos->fetch_assoc()) {

				$PerfilModulo = new Agenda();
				$PerfilModulo->_idPerfilModulo = $registro["ID_MODULO_PERFIL"];
				$PerfilModulo->_relaModulo = $registro["RELA_MODULO"];
				$PerfilModulo->_relaPerfil = $registro["RELA_PERFIL"];
				$listadoPerfilModulo[] = $PerfilModulo;
			
		}		  
		
		return $listadoPerfilModulo;

	}
	
	public function guardar() {

			$database = new MySQL();

			$sql = "INSERT INTO PERFIL_MODULO (ID_MODULO_PERFIL,RELA_MODULO,RELA_PERFIL) VALUES (NULL, {$this->_relaModulo}, {$this->_relaPerfil})";
		
			$database->insertar($sql);
		}

	public static function eliminar($id) {

		$sql = "DELETE FROM PERFIL_MODULO WHERE RELA_PERFIL=$id";
	
	

		$database = new MySQL();
		$database->eliminar($sql);	

	}

}

?>