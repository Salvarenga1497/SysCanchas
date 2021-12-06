<?php

require_once "MySQL.php";
require_once "Usuario.php";

class Cancha{

	protected $_idCanchas;
	protected $_nombre;
	protected $_estado;
	protected $_relaEntidades;
	protected $_cantidad;

	public function getIdCanchas()
	{ 
		return $this->_idCanchas; 
	} 
	public function setIdCanchas($_idCanchas) 
	{ 
		$this->_idCanchas = $_idCanchas; 
		return $this;
	} 

	public function getNombre()
	{ 
		return $this->_nombre; 
	} 

	public function setNombre($_nombre) 
	{ 
		$this->_nombre = $_nombre; 
		return $this;
	} 

	public function getEstado()
	{ 
		return $this->_estado;
	} 

	public function setEstado($_estado) 
	{ 
		$this->_estado= $_estado; 
		return $this;
	} 

	public function getRelaAgenda()
	{ 
		return $this->_relaAgenda; 
	} 

	public function setRelaAgenda($_relaAgenda) 
	{ 
		$this->_relaAgenda = $_relaAgenda; 
		return $this;
	} 

	public function getRelaEntidades()
	{ 
		return $this->_relaEntidades; 
	} 

	public function setRelaEntidades($_relaEntidades) 
	{ 
		$this->_relaEntidades = $_relaEntidades; 
		return $this;
	} 

	public function getCantidad()
		{ 
			 return $this->_cantidad; 
		}

	public function setCantidad($_cantidad) 
		{ 
			 $this->_cantidad = $_cantidad; 
			 return $this;
		}

	
	public static function obtenerTodos($filtroEstado = 0, $filtroNombre) {
		$sql = "SELECT CANCHAS.ID_CANCHAS, CANCHAS.NOMBRE, " 
		. "CANCHAS.ESTADOS "
		. "FROM CANCHAS";

			 $where = "";

        if ($filtroEstado != 0) {
        	// $sql = $sql . " WHERE personas.estado = " . $filtroEstado;
        	$where = " WHERE CANCHAS.ESTADOS = " . $filtroEstado;
        }

        if ($filtroNombre != "") {

        	if ($where != "") {

        		$where .= " AND CANCHAS.NOMBRE = '{$filtroNombre}'";

        	} else {

        		$where = " WHERE CANCHAS.NOMBRE like '%{$filtroNombre}%'";

        	}
        }

        

		$sql.= $where;
		
	
	

		$database = new MySQL();
		$datos = $database->consultar($sql);

		$listadoCanchas = [];

		while ($registro = $datos->fetch_assoc()) {

			$cancha = new Cancha();
			$cancha->_idCanchas = $registro["ID_CANCHAS"];
			$cancha->_nombre = $registro["NOMBRE"];
			$cancha->_estado= $registro["ESTADOS"];
			$listadoCanchas[] = $cancha;
			
		}		  
		
		return $listadoCanchas;		  


	}	


	public static function obtenerTodoss() {
		$sql = "SELECT CANCHAS.ID_CANCHAS, CANCHAS.NOMBRE, " 
		. "CANCHAS.ESTADOS "
		. "FROM CANCHAS WHERE CANCHAS.ESTADOS=1";

	
		

		$database = new MySQL();
		$datos = $database->consultar($sql);

		$listadoCanchas = [];

		while ($registro = $datos->fetch_assoc()) {

			$cancha = new Cancha();
			$cancha->_idCanchas = $registro["ID_CANCHAS"];
			$cancha->_nombre = $registro["NOMBRE"];
			$cancha->_estado= $registro["ESTADOS"];
			$listadoCanchas[] = $cancha;
			
		}		  
		
		return $listadoCanchas;		  


	}


	


	public static function obtenerTodasLasCanchasPorId($id) {
		$sql = "SELECT CANCHAS.ID_CANCHAS, CANCHAS.NOMBRE, " 
		. "CANCHAS.ESTADOS "
		. "FROM CANCHAS WHERE CANCHAS.ID_CANCHAS =" . $id;;
		

		$database = new MySQL();
		$datos = $database->consultar($sql);

		$listadoCanchas = [];

		while ($registro = $datos->fetch_assoc()) {

			$cancha = new Cancha();
			$cancha->_idCanchas = $registro["ID_CANCHAS"];
			$cancha->_nombre = $registro["NOMBRE"];
			$cancha->_estado= $registro["ESTADOS"];
			$listadoCanchas[] = $cancha;
			
		}		  
		
		return $listadoCanchas;		  


	}	

	public static function obtenerPorId ($id) {

		$sql = "SELECT CANCHAS.ID_CANCHAS, CANCHAS.NOMBRE,CANCHAS.ESTADOS,CANCHAS.RELA_ENTIDADES "
		. "FROM CANCHAS "
		. "JOIN ENTIDADES ON ENTIDADES.ID_ENTIDADES=CANCHAS.RELA_ENTIDADES "
		. "WHERE ID_CANCHAs=" . $id;


	

		$database = new MySQL();
		$datos = $database-> consultar($sql);

		if ($datos->num_rows > 0) {
			$registro = $datos->fetch_assoc();

			$cancha = new Cancha();
			$cancha->_idCanchas = $registro["ID_CANCHAS"];
			$cancha->_nombre = $registro["NOMBRE"];
			$cancha->_estado= $registro["ESTADOS"];
			$cancha->_relaEntidades= $registro["RELA_ENTIDADES"];
			$listadoCanchas[] = $cancha;

			return $cancha;
		} else {
			return false;
		}
	}


	public static function ObtenerPorIdEntidad ($id) {

		$sql = "SELECT * FROM CANCHAS WHERE RELA_ENTIDADES=" . $id;

		
		
		$database = new MySQL();
		$datos = $database-> consultar($sql);

		if ($datos->num_rows > 0) {
			$registro = $datos->fetch_assoc();

			$cancha = new Cancha();
			$cancha->_idCanchas = $registro["ID_CANCHAS"];
			$cancha->_nombre = $registro["NOMBRE"];
			$cancha->_estado= $registro["ESTADOS"];
			$cancha->_relaEntidades= $registro["RELA_ENTIDADES"];
			$listadoCanchas[] = $cancha;

			return $cancha;
		} else {
			return false;
		}
	}


	public static function obtenerCantidadCanchasRegistradas() {

		$sql = "SELECT COUNT(*)AS canchas FROM canchas";
		$database = new MySQL();
		$datos = $database-> consultar($sql);

		if ($datos->num_rows > 0) {
			$registro = $datos->fetch_assoc();
			$cancha = new Cancha();
			$cancha->_cantidad= $registro["canchas"];
			

			return $cancha;
		} 
	}
		



	public function guardar() {

		$database = new MySQL();

		$sql = "INSERT INTO CANCHAS (ID_CANCHAS,RELA_ENTIDADES,NOMBRE) VALUES (NULL, '{$this->getRelaEntidades()}', '{$this->_nombre}')";

	


		$database->insertar($sql);
	}	


	public function actualizar() {

		$database = new MySQL();

		$sql ="UPDATE CANCHAS SET NOMBRE ='{$this->_nombre}', ESTADOS = '1', RELA_ENTIDADES = {$this->_relaEntidades} WHERE CANCHAS.ID_CANCHAS = {$this->_idCanchas}";

		$database->actualizar($sql);
	}		

	public function eliminar() {

		$sql = "UPDATE CANCHAS SET ESTADOS='2' WHERE CANCHAS.ID_CANCHAS = {$this->_idCanchas}";

		
		$database = new MySQL();
		$database-> eliminar($sql);

	}	

}

?>