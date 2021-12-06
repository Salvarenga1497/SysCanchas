<?php

require_once "Cancha.php";
require_once "MySQL.php";

class Agenda {

	private $_idAgenda;
	private $_fechaInicio;
	private $_fechaFin;
	private $_horaInicio;
	private $_horaFin;
	private $_duracion;
	private $_estado;
	private $_relaCancha;
	private $_generado;


	public function setIdAgenda($_idAgenda) 
	{ 
		$this->_idAgenda = $_idAgenda; 
		return $this;
	} 	

	public function getIdAgenda()
	{ 
		return $this->_idAgenda; 
	} 

	public function setFechaInicio($_fechaInicio) 
	{ 
		$this->_fechaInicio = $_fechaInicio; 
		return $this;
	} 	

	public function getFechaInicio()
	{ 
		return $this->_fechaInicio; 
	} 	

	public function setFechaFin($_fechaFin) 
	{ 
		$this->_fechaFin = $_fechaFin; 
		return $this;
	} 	

	public function getFechaFin()
	{ 
		return $this->_fechaFin; 
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

	public function setDuracion($_duracion) 
	{ 
		$this->_duracion = $_duracion; 
		return $this;
	} 	

	public function getDuracion()
	{ 
		return $this->_duracion; 
	}

	public function setEstado($_estado) 
	{ 
		$this->_estado = $_estado; 
		return $this;
	} 	

	public function getEstado()
	{ 
		return $this->_estado; 
	}

	public function setRelaCancha($_relaCancha) 
	{ 
		$this->_relaCancha = $_relaCancha; 
		return $this;
	} 	

	public function getRelaCancha()
	{ 
		return $this->_relaCancha; 
	}

	public function setGenerado($_generado) 
	{ 
		$this->_generado = $_generado; 
		return $this;
	} 	

	public function getGenerado()
	{ 
		return $this->_generado; 
	}


	public static function obtenerTodos() {
			
			$sql = "SELECT * FROM AGENDA WHERE ESTADO='1'";

			$database = new MySQL();
			$datos = $database->consultar($sql);

			$listadoAgenda = [];

			while ($registro = $datos->fetch_assoc()) {

				$agenda = new Agenda();
				$agenda->_idAgenda = $registro["ID_AGENDA"];
				$agenda->_fechaInicio = $registro["FECHA_INICIO"];
				$agenda->_fechaFin = $registro["FECHA_FIN"];
				$agenda->_horaInicio = $registro["HORA_INICIO"];
				$agenda->_horaFin = $registro["HORA_FIN"];
				$agenda->_duracion = $registro["DURACION"];
				$agenda->_estado = $registro["ESTADO"];
				$agenda->_relaCancha = $registro["RELA_CANCHAS"];
				$agenda->_generado = $registro["GENERADO"];
				$agenda->cancha = Cancha::obtenerPorId($agenda->_relaCancha);
				$listadoAgenda[] = $agenda;
			
		}		  
		
		return $listadoAgenda;

	}

	public static function obtenerPorId ($id) {

			$sql = "SELECT * FROM AGENDA WHERE ID_AGENDA=" . $id; 

			$database = new MySQL();
			$datos = $database-> consultar($sql);

			if ($datos->num_rows > 0) {
				$registro = $datos->fetch_assoc();

				$agenda = new Agenda();
				$agenda->_idAgenda = $registro["ID_AGENDA"];
				$agenda->_fechaInicio = $registro["FECHA_INICIO"];
				$agenda->_fechaFin = $registro["FECHA_FIN"];
				$agenda->_horaInicio = $registro["HORA_INICIO"];
				$agenda->_horaFin = $registro["HORA_FIN"];
				$agenda->_duracion = $registro["DURACION"];
				$agenda->_estado = $registro["ESTADO"];
				$agenda->_relaCancha = $registro["RELA_CANCHAS"];
				$agenda->_generado = $registro["GENERADO"];

				return $agenda;
			}
}	


	public static function obtenerPorIdCanchas($idCanchas) {

		$sql = "SELECT * FROM AGENDA WHERE RELA_CANCHAS=" . $idCanchas . " AND ESTADO= 1";

	

		$database = new MySQL();
		$datos = $database->consultar($sql);

		while ($registro = $datos->fetch_assoc()) {

			$agenda = new Agenda();
			$agenda->_idAgenda = $registro["ID_AGENDA"];
			$agenda->_relaCanchas = $registro["RELA_CANCHAS"];
			$agenda->_fechaInicio = $registro["FECHA_INICIO"];
		    $agenda->_fechaFin = $registro["FECHA_FIN"];
		    $agenda->_horaInicio = $registro["HORA_INICIO"];
		    $agenda->_horaFin = $registro["HORA_FIN"];
		    $agenda->_duracion = $registro["DURACION"];
		    $agenda->_estado = $registro["ESTADO"];
		    $agenda->_generado = $registro["GENERADO"];

			return $agenda;

	} 

}


public static function obtenerUltimoId() {

		$sql = "SELECT MAX(ID_AGENDA) AS ID_AGENDA FROM AGENDA";

	

		$database = new MySQL();
		$datos = $database->consultar($sql);

		while ($registro = $datos->fetch_assoc()) {

			$agenda = new Agenda();
			$agenda->_idAgenda = $registro["ID_AGENDA"];
			return $agenda;

	} 

}

	public static function obtenerPorIdCancha($idCanchas) {
			
			$sql = "SELECT * FROM AGENDA WHERE RELA_CANCHAS=" . $idCanchas . " AND ESTADO= 1";

			$database = new MySQL();
			$datos = $database->consultar($sql);

			$listadoAgenda = [];

			while ($registro = $datos->fetch_assoc()) {

				$agenda = new Agenda();
				$agenda->_idAgenda = $registro["ID_AGENDA"];
				$agenda->_fechaInicio = $registro["FECHA_INICIO"];
				$agenda->_fechaFin = $registro["FECHA_FIN"];
				$agenda->_horaInicio = $registro["HORA_INICIO"];
				$agenda->_horaFin = $registro["HORA_FIN"];
				$agenda->_duracion = $registro["DURACION"];
				$agenda->_estado = $registro["ESTADO"];
				$agenda->_relaCancha = $registro["RELA_CANCHAS"];
				$agenda->_generado = $registro["GENERADO"];
				$listadoAgenda[] = $agenda;
			
		}		  
		
		return $listadoAgenda;

	}



	public function guardar() {

			$database = new MySQL();

			$sql = "INSERT INTO AGENDA (ID_AGENDA, RELA_CANCHAS, FECHA_INICIO,FECHA_FIN, HORA_INICIO, HORA_FIN, DURACION) VALUES (NULL,{$this->getRelaCancha()}, '{$this->getFechaInicio()}', '{$this->getFechaFin()}', '{$this->getHoraInicio()}', '{$this->getHoraFin()}', '{$this->getDuracion()}')";

		 $database->insertar($sql);
			
		}

		public function actualizar() {


			$database = new MySQL();

			$sql ="UPDATE AGENDA SET RELA_CANCHAS ={$this->_relaCancha}, FECHA_INICIO ='{$this->_fechaInicio}', FECHA_FIN ='{$this->_fechaFin}', HORA_INICIO ='{$this->_horaInicio}', HORA_FIN = '{$this->_horaFin}', DURACION = '{$this->_duracion}', ESTADO = '1' WHERE AGENDA.ID_AGENDA = {$this->_idAgenda}";
		

			$database->actualizar($sql);
		}	

		public function actualizarGenerado() {


			$database = new MySQL();

			$sql ="UPDATE AGENDA SET GENERADO = '2' WHERE AGENDA.ID_AGENDA = {$this->_idAgenda}";
		

			$database->actualizar($sql);
		}

		public function eliminar() {

			$sql = "UPDATE AGENDA SET ESTADO= '2' WHERE ID_AGENDA={$this->_idAgenda}";


			$database = new MySQL();
			$database-> eliminar($sql);		

	}	


}

?>	