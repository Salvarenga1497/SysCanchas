<?php
require_once "MySQL.php";
require_once "Cancha.php";
require_once "Usuario.php";
require_once "Entidad.php";

	Class Turno {

		private $_idTurno;
		private $_relaAgenda;
		private $_fecha;
		private $_horaInicio;
		private $_horaFin;
		private $_estado;
		private $_cantidad;
		public $_relaCancha;
		public $_relaEntidad;

		public function setIdTurno($_idTurno) 
		{ 
			 $this->_idTurno = $_idTurno; 
			 return $this;
		} 

		public function setRelaCancha($_relaCancha) 
		{ 
			 $this->_relaCancha = $_relaCancha; 
			 return $this;
		}

		public function setRelaEntidad($_relaEntidad) 
		{ 
			 $this->_relaEntidad = $_relaEntidad; 
			 return $this;
		}

		public function setRelaAgenda($_relaAgenda) 
		{ 
			 $this->_relaAgenda = $_relaAgenda; 
			 return $this;
		} 

		public function setFecha($_fecha) 
		{ 
			 $this->_fecha = $_fecha; 
			 return $this;
		}

		public function setHoraInicio($_horaInicio) 
		{ 
			 $this->_horaInicio = $_horaInicio; 
			 return $this;
		}

		public function setHoraFin($_horaFin) 
		{ 
			 $this->_horaFin = $_horaFin; 
			 return $this;
		}

		public function setEstado($_estado) 
		{ 
			 $this->_estado = $_estado; 
			 return $this;
		}

		public function setCantidad($_cantidad) 
		{ 
			 $this->_cantidad = $_cantidad; 
			 return $this;
		}

		public function getIdTurno()
		{ 
			 return $this->_idTurno; 
		} 

		public function getRelaCancha()
		{ 
			 return $this->_relaCancha; 
		}

		public function getRelaEntidad()
		{ 
			 return $this->_relaEntidad; 
		}

		public function getRelaAgenda()
		{ 
			 return $this->_relaAgenda; 
		}

		public function getFecha()
		{ 
			 return $this->_fecha; 
		}

		public function getHoraInicio()
		{ 
			 return $this->_horaInicio; 
		}

		public function getHoraFin()
		{ 
			 return $this->_horaFin; 
		}

		public function getEstado()
		{ 
			 return $this->_estado; 
		}

		public function getCantidad()
		{ 
			 return $this->_cantidad; 
		}



	public static function obtenerPorFecha($idCanchas, $fecha) {

		$sql = "SELECT * FROM TURNOS WHERE RELA_CANCHAS=" . $idCanchas . " AND FECHA='{$fecha}'" ;

	

		$database = new MySQL();
		$datos = $database->consultar($sql);

		$listadoTurno = [];

		while ($registro = $datos->fetch_assoc()) {

			$turno = new Turno();
			$turno->_idTurno = $registro["ID_TURNOS"];
			$turno->_relaCancha = $registro["RELA_CANCHAS"];
			$turno->_relaEntidad = $registro["RELA_ENTIDADES"];
			$turno->_relaAgenda = $registro["RELA_AGENDA"];
			$turno->_fecha = $registro["FECHA"];
			$turno->_horaInicio = $registro["HORA_INICIO"];
			$turno->_horaFin = $registro["HORA_FIN"];
			$turno->_estado = $registro["ESTADO"];
			$turno->cancha = Cancha::obtenerPorId($turno->_relaCancha);
			if (!is_null($turno->_relaEntidad)) {
				$turno->usuario = Usuario::obtenerPorIdEntidad($turno->_relaEntidad);
			}else{
				$turno->usuario = NULL;
			}
			
			$listadoTurno[] = $turno;
		
		}		  
		
		return $listadoTurno;

	}

	public static function obtenerPorIdCanchas($idCanchas, $filtroFecha = " ") {

		$sql = "SELECT * FROM TURNOS WHERE RELA_CANCHAS=" . $idCanchas ;


		if ($filtroFecha == "") {
				$sql .= " AND FECHA = CURDATE()";
			} else{
				$sql .= " AND FECHA = '{$filtroFecha}'";
			}

		
		$database = new MySQL();
		$datos = $database->consultar($sql);

		$listadoTurno = [];

		while ($registro = $datos->fetch_assoc()) {

			$turno = new Turno();
			$turno->_idTurno = $registro["ID_TURNOS"];
			$turno->_relaCancha = $registro["RELA_CANCHAS"];
			$turno->_relaEntidad = $registro["RELA_ENTIDADES"];
			$turno->_relaAgenda = $registro["RELA_AGENDA"];
			$turno->_fecha = $registro["FECHA"];
			$turno->_horaInicio = $registro["HORA_INICIO"];
			$turno->_horaFin = $registro["HORA_FIN"];
			$turno->_estado = $registro["ESTADO"];
			$turno->cancha = Cancha::obtenerPorId($turno->_relaCancha);
			if (!is_null($turno->_relaEntidad)) {
				$turno->usuario = Usuario::obtenerPorIdEntidad($turno->_relaEntidad);
			}else{
				$turno->usuario = NULL;
			}
			
			$listadoTurno[] = $turno;
		
		}		  
		
		return $listadoTurno;

	}


	public static function obtenerPorId ($id) {

			$sql = " SELECT TURNOS.ID_TURNOS, TURNOS.RELA_CANCHAS, TURNOS.RELA_ENTIDADES, TURNOS.FECHA, TURNOS.HORA_INICIO,TURNOS.HORA_FIN "
					. "FROM TURNOS "
					. "WHERE ID_TURNOS=" . $id;

			

			$database = new MySQL();
			$datos = $database-> consultar($sql);

			if ($datos->num_rows > 0) {
				$registro = $datos->fetch_assoc();

				$turno = new Turno();
				$turno->_idTurno = $registro["ID_TURNOS"];
				$turno->_relaCancha = $registro["RELA_CANCHAS"];
				$turno->_relaEntidades = $registro["RELA_ENTIDADES"];
				$turno->_fecha= $registro["FECHA"];
				$turno->_horaInicio= $registro["HORA_INICIO"];
				$turno->_horaFin= $registro["HORA_FIN"];

				return $turno;
			} else {
				return false;
			}
		}

	public static function obtenerTodosLosTurnosLibres($idCanchas) {
			
			$sql = "SELECT * FROM TURNOS WHERE ESTADO= 'LIBRE' AND RELA_CANCHAS={$idCanchas} AND FECHA >= CURDATE() GROUP BY FECHA";
		

			$database = new MySQL();
			$datos = $database->consultar($sql);

			$listadoTurno = [];

			while ($registro = $datos->fetch_assoc()) {

				$turno = new Turno();
				$turno->_idTurno = $registro["ID_TURNOS"];
				$turno->_relaCancha = $registro["RELA_CANCHAS"];
				$turno->_relaEntidad = $registro["RELA_ENTIDADES"];
				$turno->_relaAgenda = $registro["RELA_AGENDA"];
				$turno->_fecha = $registro["FECHA"];
				$turno->_horaInicio = $registro["HORA_INICIO"];
				$turno->_horaFin = $registro["HORA_FIN"];
				$turno->_estado = $registro["ESTADO"];
				$listadoTurno[] = $turno;
			
		}		  
		
		return $listadoTurno;

	}


	public static function obtenerTodosLosHorariosLibresPorFecha($idCanchas, $fecha) {
			
			$sql = "SELECT * FROM TURNOS WHERE ESTADO= 'LIBRE' AND RELA_CANCHAS={$idCanchas} AND FECHA ='{$fecha}'";
		

			$database = new MySQL();
			$datos = $database->consultar($sql);

			$listadoTurno = [];

			while ($registro = $datos->fetch_assoc()) {

				$turno = new Turno();
				$turno->_idTurno = $registro["ID_TURNOS"];
				$turno->_relaCancha = $registro["RELA_CANCHAS"];
				$turno->_relaEntidad = $registro["RELA_ENTIDADES"];
				$turno->_relaAgenda = $registro["RELA_AGENDA"];
				$turno->_fecha = $registro["FECHA"];
				$turno->_horaInicio = $registro["HORA_INICIO"];
				$turno->_horaFin = $registro["HORA_FIN"];
				$turno->_estado = $registro["ESTADO"];
				$listadoTurno[] = $turno;
			
		}		  
		
		return $listadoTurno;

	}

	public static function obtenerTodosLosTurnosLibresDelDia($idCanchas, $filtroFecha) {
			
			$sql = "SELECT * FROM TURNOS WHERE ESTADO= 'LIBRE' and RELA_CANCHAS=" . $idCanchas ;
			
			if ($filtroFecha == "") {
				$sql .= " AND FECHA = CURDATE()";
			} else{
				$sql .= " AND FECHA = '{$filtroFecha}'";
			}

		
			$database = new MySQL();
			$datos = $database->consultar($sql);

			$listadoTurno = [];

			while ($registro = $datos->fetch_assoc()) {

				$turno = new Turno();
				$turno->_idTurno = $registro["ID_TURNOS"];
				$turno->_relaCancha = $registro["RELA_CANCHAS"];
				$turno->_relaEntidad = $registro["RELA_ENTIDADES"];
				$turno->_relaAgenda = $registro["RELA_AGENDA"];
				$turno->_fecha = $registro["FECHA"];
				$turno->_horaInicio = $registro["HORA_INICIO"];
				$turno->_horaFin = $registro["HORA_FIN"];
				$turno->_estado = $registro["ESTADO"];
				$listadoTurno[] = $turno;
			
		}		  
		
		return $listadoTurno;

	}


	public static function ObtenerTurnosReservadosDelDia() {
			
			$sql = "SELECT * FROM TURNOS WHERE ESTADO= 'RESERVADO' and FECHA=CURDATE()";
			

	

			$database = new MySQL();
			$datos = $database->consultar($sql);

			$listadoTurno = [];

			while ($registro = $datos->fetch_assoc()) {

				$turno = new Turno();
				$turno->_idTurno = $registro["ID_TURNOS"];
				$turno->_relaCancha = $registro["RELA_CANCHAS"];
				$turno->_relaEntidad = $registro["RELA_ENTIDADES"];
				$turno->_relaAgenda = $registro["RELA_AGENDA"];
				$turno->_fecha = $registro["FECHA"];
				$turno->_horaInicio = $registro["HORA_INICIO"];
				$turno->_horaFin = $registro["HORA_FIN"];
				$turno->_estado = $registro["ESTADO"];
				$listadoTurno[] = $turno;
			
		}		  
		
		return $listadoTurno;

	}

	public static function obtenerTotalTurnos($cboFiltro, $filtroFechaInicio, $filtroFechaFin) {
		$sql = "  SELECT RELA_CANCHAS, COUNT(*) AS pagados FROM turnos WHERE (ESTADO= 'Pagado' OR ESTADO= 'Reservado')  AND fecha BETWEEN '{$filtroFechaInicio}' AND '{$filtroFechaFin}' AND RELA_CANCHAS='{$cboFiltro}' ";

		

		$database = new MySQL();
		$datos = $database->consultar($sql);

		$listadoCanchas = [];

		if ($datos->num_rows > 0) {
			$registro = $datos->fetch_assoc(); {

			$turno = new Turno();
			$turno->_relaCancha = $registro["RELA_CANCHAS"];
			$turno->_cantidad= $registro["pagados"];
			if (!is_null($turno->_relaCancha)) {
			$turno->cancha = Cancha::obtenerPorId($turno->_relaCancha);
			}else{
				$turno->usuario = NULL;
			}
			$listadoCanchas[] = $turno;
			
		}		  
		
		return $listadoCanchas;		  


	}
}

	public static function obtenerLasHorasMasAlquilada($cboFiltro) {
		$sql = "  SELECT  HORA_INICIO ,COUNT(*) AS cantidad FROM turnos WHERE  (ESTADO= 'Pagado' OR ESTADO= 'Reservado') AND  rela_canchas='{$cboFiltro}' GROUP BY HORA_INICIO; ";

		

		$database = new MySQL();
		$datos = $database->consultar($sql);

		$listadoCanchas = [];

		while ($registro = $datos->fetch_assoc()) {

			$turno = new Turno();
			$turno->_horaInicio = $registro["HORA_INICIO"];
			$turno->_cantidad= $registro["cantidad"];
			$listadoCanchas[] = $turno;
			
		}		  
		
		return $listadoCanchas;		  


	}


	public static function obtenerLasCanchasMasAlquiladas($filtroFechaInicio, $filtroFechaFin) {
		$sql = "  SELECT RELA_CANCHAS, COUNT(*) AS cantidad FROM turnos WHERE  (ESTADO= 'Pagado' OR ESTADO= 'Reservado') AND fecha BETWEEN '{$filtroFechaInicio}' AND '{$filtroFechaFin}'  GROUP BY RELA_CANCHAS; ";

		
		
		$database = new MySQL();
		$datos = $database->consultar($sql);

		$listadoCanchas = [];

		while ($registro = $datos->fetch_assoc()) {

			$turno = new Turno();
			$turno->_relaCancha = $registro["RELA_CANCHAS"];
			$turno->_cantidad= $registro["cantidad"];
			$turno->cancha = Cancha::obtenerPorId($turno->_relaCancha);
			$listadoCanchas[] = $turno;
			
		}		  
		
		return $listadoCanchas;		  


	}

	public static function obtenerLaCanchasMasAlquilada() {
		$sql = "  SELECT RELA_CANCHAS, CANCHAS.NOMBRE, COUNT(*) AS pagados FROM turnos JOIN Canchas WHERE (ESTADO= 'Pagado' OR ESTADO= 'Reservado') AND RELA_CANCHAS=ID_CANCHAS GROUP BY RELA_CANCHAS ORDER BY pagados DESC   ";

	
		$database = new MySQL();
		$datos = $database->consultar($sql);

		$listadoCanchas = [];

		while ($registro = $datos->fetch_assoc()) {
			$idCancha= $registro["RELA_CANCHAS"];
			$cantidad= $registro["pagados"];
			$cancha = $registro["NOMBRE"];
			array_push($listadoCanchas, array($cancha,$cantidad));
			
		}		  
		
		return $listadoCanchas;		  


	}

	public static function UsuarioQueMasAlquila() {
		$sql = " SELECT turnos.RELA_ENTIDADES,entidades.nombre,entidades.apellido, COUNT(*) AS cantidad FROM turnos JOIN entidades  WHERE turnos.RELA_entidades=entidades.id_entidades AND RELA_ENTIDADES IS NOT NULL GROUP BY RELA_ENTIDADES";

	
		$database = new MySQL();
		$datos = $database->consultar($sql);

		$listadoCanchas = [];

		while ($registro = $datos->fetch_assoc()) {
			$relaentidad= $registro["RELA_ENTIDADES"];
			$nombre= $registro["nombre"];
			$apellido = $registro["apellido"];
			$cantidad = $registro["cantidad"];
			$usuario = Usuario::obtenerPorIdEntidad($relaentidad);
			$usuarioF = $usuario->getUserName();
			array_push($listadoCanchas, array($relaentidad,$nombre,$apellido,$cantidad,$usuario, $usuarioF));
			
		}		  
		
		return $listadoCanchas;		  


	}

	public static function obtenerIdEntidades($id, $filtroFecha = " ") {
			
			$sql = "SELECT * FROM TURNOS WHERE RELA_ENTIDADES=" . $id;


			
			if ($filtroFecha == "") {
				$sql .= " AND FECHA = CURDATE()";
			} else{
				$sql .= " AND FECHA = '{$filtroFecha}'";
			}

		

			$database = new MySQL();
			$datos = $database->consultar($sql);

			$listadoTurno = [];

			while ($registro = $datos->fetch_assoc()) {

				$turno = new Turno();
				$turno->_idTurno = $registro["ID_TURNOS"];
				$turno->_relaCancha = $registro["RELA_CANCHAS"];
				$turno->_relaEntidad = $registro["RELA_ENTIDADES"];
				$turno->_relaAgenda = $registro["RELA_AGENDA"];
				$turno->_fecha = $registro["FECHA"];
				$turno->_horaInicio = $registro["HORA_INICIO"];
				$turno->_horaFin = $registro["HORA_FIN"];
				$turno->_estado = $registro["ESTADO"];
				$turno->cancha = Cancha::obtenerPorId($turno->_relaCancha);
				$listadoTurno[] = $turno;
			
		}		  
		
		return $listadoTurno;

	}
 

public function guardar() {

			$database = new MySQL();

			$sql = "INSERT INTO TURNOS (ID_TURNOS, RELA_CANCHAS, RELA_ENTIDADES, RELA_AGENDA, FECHA, HORA_INICIO, HORA_FIN, ESTADO) VALUES (NULL,{$this->getRelaCancha()},NULL,{$this->getRelaAgenda()}, '{$this->getFecha()}', '{$this->getHoraInicio()}', '{$this->getHoraFin()}', 'Libre')";

		

			$database->insertar($sql);

		}

public function actualizar() {


			$database = new MySQL();

			$sql ="UPDATE TURNOS SET RELA_CANCHAS ={$this->_relaCancha}, RELA_ENTIDADES ={$this->_relaEntidad}, FECHA ='{$this->_fecha}', HORA_INICIO ='{$this->_horaInicio}', HORA_FIN = '{$this->_horaFin}', ESTADO = 'Reservado' WHERE TURNOS.ID_TURNOS = {$this->_idTurno}";
		
		

			$database->actualizar($sql);
		}	

public function pagar() {


			$database = new MySQL();

			$sql ="UPDATE TURNOS SET ESTADO = 'Pagado' WHERE TURNOS.ID_TURNOS = {$this->_idTurno}";
		
		

			$database->actualizar($sql);

			}
		

public function eliminar() {

			$sql = "UPDATE TURNOS SET RELA_ENTIDADES = NULL, ESTADO= 'Libre' WHERE TURNOS.ID_TURNOS={$this->_idTurno}";


			

			$database = new MySQL();
			$database-> eliminar($sql);		

	}	


	public static function reprogramar($idPersona, $id) {

		$sql = "UPDATE TURNOS SET RELA_ENTIDADES = $idPersona, ESTADO= 'Reservado' WHERE TURNOS.ID_TURNOS=$id";
	
	
		$database = new MySQL();
		$database->eliminar($sql);	

	}
 
 

		
	}



?>