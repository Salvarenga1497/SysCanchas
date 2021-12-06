<?php

require_once "MySQL.php";
require_once "EstadoPago.php";
require_once "TipoPago.php";
require_once "Turno.php";

class Factura {

	private $_idFactura;
	private $_relaEstadoPago;
	private $_relaTurnos;
	private $_relaTipoPago;
	private $_relaCancha;
	private $_fechaEmision;


	public function setIdFactura($_idFactura) 
	{ 
		$this->_idFactura = $_idFactura; 
		return $this;
	} 	

	public function getIdFactura()
	{ 
		return $this->_idFactura; 
	} 

	public function setRelaEstadoPago($_relaEstadoPago) 
	{ 
		$this->_relaEstadoPago = $_relaEstadoPago; 
		return $this;
	} 	

	public function getRelaEstadoPago()
	{ 
		return $this->_relaEstadoPago; 
	} 

	public function setRelaTurnos($_relaTurnos) 
	{ 
		$this->_relaTurnos = $_relaTurnos; 
		return $this;
	} 	

	public function getRelaTurnos()
	{ 
		return $this->_relaTurnos; 
	} 

	public function setFechaEmision($_fechaEmision) 
	{ 
		$this->_fechaEmision = $_fechaEmision; 
		return $this;
	} 	

	public function getFechaEmision()
	{ 
		return $this->_fechaEmision; 
	} 

	public function setRelaTipoPago($_relaTipoPago) 
	{ 
		$this->_relaTipoPago = $_relaTipoPago; 
		return $this;
	} 	

	public function getRelaTipoPago()
	{ 
		return $this->_relaTipoPago; 
	} 

	public function setRelaCanchas($_relaCancha) 
	{ 
		$this->_relaCancha = $_relaCancha; 
		return $this;
	} 	

	public function getRelaCanchas()
	{ 
		return $this->_relaCancha; 
	} 



	public static function obtenerTodos() {
			
			$sql = "SELECT * FROM FACTURAS";

			$database = new MySQL();
			$datos = $database->consultar($sql);

			$listadoFacturas = [];

			while ($registro = $datos->fetch_assoc()) {

				$factura = new Factura();
				$factura->_idFactura = $registro["ID_FACTURA"];
				$factura->_relaEstadoPago = $registro["RELA_ESTADO_PAGO"];
				$factura->_relaTipoPago = $registro["RELA_TIPO_PAGO"];
				$factura->_relaTurnos = $registro["RELA_TURNOS"];
				$factura->_fechaEmision = $registro["FECHA_EMISION"];
				$factura->_relaCancha = $registro["RELA_CANCHAS"];
				$factura->turno = Turno::obtenerPorId($factura->_relaTurnos);
				$factura->tipoPago = tipoPago::obtenerPorId($factura->_relaTipoPago);
				$factura->cancha = Cancha::obtenerPorId($factura->_relaCancha);
				$listadoFacturas[] = $factura;
			
		}		  
		
		return $listadoFacturas;

	}


public static function obtenerTodosPorIdCanchas($id) {
			
			$sql = "SELECT * FROM FACTURAS WHERE RELA_CANCHAS=" . $id;

			$database = new MySQL();
			$datos = $database->consultar($sql);

			$listadoFacturas = [];

			while ($registro = $datos->fetch_assoc()) {

				$factura = new Factura();
				$factura->_idFactura = $registro["ID_FACTURA"];
				$factura->_relaEstadoPago = $registro["RELA_ESTADO_PAGO"];
				$factura->_relaTipoPago = $registro["RELA_TIPO_PAGO"];
				$factura->_relaTurnos = $registro["RELA_TURNOS"];
				$factura->_fechaEmision = $registro["FECHA_EMISION"];
				$factura->_relaCancha = $registro["RELA_CANCHAS"];
				$factura->turno = Turno::obtenerPorId($factura->_relaTurnos);
				$factura->tipoPago = tipoPago::obtenerPorId($factura->_relaTipoPago);
				$factura->cancha = Cancha::obtenerPorId($factura->_relaCancha);
				$listadoFacturas[] = $factura;
			
		}		  
		
		return $listadoFacturas;

	}

	public static function obtenerPorId ($id) {

			$sql = "SELECT * FROM FACTURAS WHERE ID_FACTURA=" . $id; 

			$database = new MySQL();
			$datos = $database-> consultar($sql);

			if ($datos->num_rows > 0) {
				$registro = $datos->fetch_assoc();

				$factura = new Factura();
				$factura->_idFactura = $registro["ID_FACTURA"];
				$factura->_relaEstadoPago = $registro["RELA_ESTADO_PAGO"];
				$factura->_relaTipoPago = $registro["RELA_TIPO_PAGO"];
				$factura->_relaTurnos = $registro["RELA_TURNOS"];
				$factura->_fechaEmision = $registro["FECHA_EMISION"];
				$factura->_relaCancha = $registro["RELA_CANCHAS"];

				return $factura;
			}
}	



	public static function obtenerPorIdTurno ($id) {

			$sql = "SELECT * FROM FACTURAS WHERE RELA_TURNOS=" . $id; 

			$database = new MySQL();
			$datos = $database-> consultar($sql);

			if ($datos->num_rows > 0) {
				$registro = $datos->fetch_assoc();

				$factura = new Factura();
				$factura->_idFactura = $registro["ID_FACTURA"];
				$factura->_relaEstadoPago = $registro["RELA_ESTADO_PAGO"];
				$factura->_relaTipoPago = $registro["RELA_TIPO_PAGO"];
				$factura->_relaTurnos = $registro["RELA_TURNOS"];
				$factura->_fechaEmision = $registro["FECHA_EMISION"];
				$factura->_relaCancha = $registro["RELA_CANCHAS"];
				$factura->estadoPago = EstadoPago::obtenerPorId($factura->_relaEstadoPago);
				$factura->tipoPago = tipoPago::obtenerPorId($factura->_relaTipoPago);
				$factura->turno = Turno::obtenerPorId($factura->_relaTurnos);

				return $factura;
			}
}	



	public function guardar() {

			$database = new MySQL();

			$sql = "INSERT INTO FACTURAS (ID_FACTURA, RELA_TIPO_PAGO,RELA_CANCHAS,RELA_TURNOS,FECHA_EMISION) VALUES (NULL, {$this->getRelaTipoPago()},{$this->getRelaCanchas()}, {$this->getRelaTurnos()}, CURDATE())";

		

		 $database->insertar($sql);
			
		}

	public function actualizar() {


			$database = new MySQL();

			$sql ="UPDATE FACTURAS SET RELA_TIPO_PAGO={$this->_relaTipoPago},RELA_CANCHAS ={$this->_relaCancha}, RELA_TURNOS ={$this->_relaTurnos}, FECHA_EMISION =CURDATE() WHERE ID_FACTURA = {$this->_idFactura}";
		

			$database->actualizar($sql);
		}	

	public function eliminar() {

		$sql = "DELETE FROM FACTURAS WHERE ID_FACTURA={$this->_idFactura}";
		
		
		$database = new MySQL();
		$database->eliminar($sql);	

	}
	
}
?>	


