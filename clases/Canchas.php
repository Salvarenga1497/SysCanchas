<?php

require_once "MySQL.php";
require_once "Usuario.php";

class Cancha extends Usuario{

	protected $_idCanchas;
	protected $_nombre;
	protected $_estado;
	protected $_relaAgenda;
	protected $_relaEntidades;

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
		  
	
		public static function obtenerTodos() {
			$sql = "SELECT CANCHAS.ID_CANCHAS, CANCHAS.NOMBRE, " 
			        . "CANCHAS.ESTADOS "
					. "FROM CANCHAS WHERE CANCHAS.ESTADOS = '1'";
		

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

		public function guardar() {

			$database = new MySQL();

			$sql = "INSERT INTO CANCHAS (ID_CANCHAS,RELA_ENTIDADES,NOMBRE) VALUES (NULL, '{$this->getRelaEntidades()}', '{$this->_nombre}')";



			$database->insertar($sql);
		}	


		public function actualizar() {

			$database = new MySQL();

			$sql ="UPDATE CANCHAS SET NOMBRE ='{$this->_nombre}', ESTADOS = '{$this->_estado}', RELA_ENTIDADES = {$this->_relaEntidades} WHERE CANCHAS.ID_CANCHAS = {$this->_idCanchas}";

			$database->actualizar($sql);
		}		

		public function eliminar() {

			$sql = "UPDATE CANCHAS SET ESTADOS='2' WHERE CANCHAS.ID_CANCHAS = {$this->_idCanchas}";


			$database = new MySQL();
			$database-> eliminar($sql);

		}	

}

?>