<?php

require_once "MySQL.php";

class EstadoPago {

	private $_idEstadoPago;
	private $_descripcion;
	


	public function setIdEstadoPago($_idEstadoPago) 
	{ 
		$this->_idEstadoPago = $_idEstadoPago; 
		return $this;
	} 	

	public function getIdEstadoPago()
	{ 
		return $this->_idEstadoPago; 
	} 

	public function setDescripcion($_descripcion) 
	{ 
		$this->_descripcion = $_descripcion; 
		return $this;
	} 	

	public function getDescripcion()
	{ 
		return $this->_descripcion; 
	} 

	
	public static function obtenerTodos() {
			
			$sql = "SELECT * FROM ESTADO_PAGO";

			$database = new MySQL();
			$datos = $database->consultar($sql);

			$listadoEstadoPago = [];

			while ($registro = $datos->fetch_assoc()) {

				$estadoPago = new EstadoPago();
				$estadoPago->_idEstadoPago = $registro["ID_ESTADO_PAGO"];
				$estadoPago->_descripcion = $registro["DESCRIPCION"];
				$listadoEstadoPago[] = $estadoPago;
			
		}		  
		
		return $listadoEstadoPago;

	}


	public static  function obtenerPorId ($id) {

			$sql = "SELECT * FROM ESTADO_PAGO WHERE ID_ESTADO_PAGO=" . $id; 

			$database = new MySQL();
			$datos = $database-> consultar($sql);

			if ($datos->num_rows > 0) {
				$registro = $datos->fetch_assoc();

				$estadoPago = new EstadoPago();
				$estadoPago->_idEstadoPago = $registro["ID_ESTADO_PAGO"];
				$estadoPago->_descripcion = $registro["DESCRIPCION"];

				return $estadoPago;
			}
}	

	public function eliminar() {

			$database = new MySQL();

			$sql = "DELETE FROM ESTADO_PAGO WHERE ID_ESTADO_PAGO ={$this->_idEstadoPago}";


			
			$database-> eliminar($sql);				

}


public function guardar() {

			$database = new MySQL();

			$sql = "INSERT INTO ESTADO_PAGO (ID_ESTADO_PAGO, DESCRIPCION) VALUES (NULL, '{$this->getDescripcion()}')";

			$database->insertar($sql);

		}
	
}
?>	

