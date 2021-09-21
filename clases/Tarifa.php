<?php

require_once "MySQL.php";
require_once "Canchas.php";

class Tarifa extends Cancha {

	private $_idTarifa;
	private $_horaInicio;
	private $_horaFin;
	private $_relaTipoTarifa;
	private $_monto;
	private $_relaCanchas;


	public function setIdTarifa($_idTarifa) 
	{ 
		$this->_idTarifa = $_idTarifa; 
		return $this;
	} 	

	public function getIdTarifa()
	{ 
		return $this->_idTarifa; 
	} 

		public function setHoraInicio($_horaInicio) 
	{ 
		$this->_horaInicio = $_horaInicio; 
		return $this;
	} 	

	public function getHoraInicio()
	{ 
		return $this->_horaInicio; 
	} 

	public function setHoraFin($_horaFin) 
	{ 
		$this->_horaFin = $_horaFin; 
		return $this;
	} 	

	public function getHoraFin()
	{ 
		return $this->_horaFin; 
	} 	

	public function setRelaTipoTarifa($_relaTipoTarifa) 
	{ 
		$this->_relaTipoTarifa = $_relaTipoTarifa; 
		return $this;
	} 	

	public function getRelaTipoTarifa()
	{ 
		return $this->_relaTipoTarifa; 
	} 	

	public function setMonto($_monto) 
	{ 
		$this->_monto = $_monto; 
		return $this;
	} 	

	public function getMonto()
	{ 
		return $this->_monto; 
	} 		

	public function setRelaCanchas($_relaCanchas) 
	{ 
		$this->_relaCanchas = $_relaCanchas; 
		return $this;
	} 	

	public function getRelaCanchas()
	{ 
		return $this->_relaCanchas; 
	}	


	public static function obtenerTodos() {
			
			$sql = "SELECT * FROM TARIFA";

			$database = new MySQL();
			$datos = $database->consultar($sql);

			$listadoTarifa = [];

			while ($registro = $datos->fetch_assoc()) {

				$tarifa = new Tarifa();
				$tarifa->_idTarifa = $registro["ID_TARIFA"];
				$tarifa->_horaInicio = $registro["HORA_INICIO"];
				$tarifa->_horaFin = $registro["HORA_FIN"];
				$tarifa->_relaTipoTarifa = $registro["RELA_TIPO_TARIFA"];
				$tarifa->_monto = $registro["MONTO"];
				$tarifa->_relaCanchas = $registro["RELA_CANCHAS"];
				$listadoTarifa[] = $tarifa;
			
		}		  
		
		return $listadoTarifa;

	}	

	public static function obtenerPorId ($id) {

			$sql = "SELECT TARIFA.ID_TARIFA, TARIFA.HORA_INICIO, TARIFA.HORA_FIN, TARIFA.RELA_TIPO_TARIFA, TARIFA.MONTO, TARIFA.RELA_CANCHAS FROM TARIFA JOIN CANCHAS ON CANCHAS.ID_CANCHAS=TARIFA.RELA_CANCHAS WHERE ID_TARIFA=" . $id; 

			$database = new MySQL();
			$datos = $database-> consultar($sql);

			if ($datos->num_rows > 0) {
				$registro = $datos->fetch_assoc();

				$tarifa = new Tarifa();
				$tarifa->_idTarifa = $registro["ID_TARIFA"];
				$tarifa->_horaInicio = $registro["HORA_INICIO"];
				$tarifa->_horaFin = $registro["HORA_FIN"];
				$tarifa->_relaTipoTarifa = $registro["RELA_TIPO_TARIFA"];
				$tarifa->_monto = $registro["MONTO"];
				$tarifa->_relaCanchas = $registro["RELA_CANCHAS"];

				return $tarifa;
			}
}


	public function guardar() {

			$database = new MySQL();

			$sql = "INSERT INTO TARIFA (ID_TARIFA, RELA_CANCHAS, HORA_INICIO, HORA_FIN, RELA_TIPO_TARIFA, MONTO ) VALUES (NULL, {$this->getRelaCanchas()}, '{$this->getHoraInicio()}', '{$this->getHoraFin()}', {$this->getRelaTipoTarifa()}, {$this->getMonto()})";


			$database->insertar($sql);

		}

		public function actualizar() {


			$database = new MySQL();

			$sql ="UPDATE TARIFA SET RELA_CANCHAS = {$this->_relaCanchas}, HORA_INICIO ='{$this->_horaInicio}', HORA_FIN = '{$this->_horaFin}', RELA_TIPO_TARIFA = {$this->_relaTipoTarifa}, MONTO = {$this->_monto} WHERE TARIFA.ID_TARIFA = {$this->_idTarifa}";
		
			$database->actualizar($sql);
		}

		public function eliminar() {

			$sql = "DELETE FROM TARIFA WHERE ID_TARIFA={$this->_idTarifa}";


			$database = new MySQL();
			$database-> eliminar($sql);		

	}

 	
}
?>	