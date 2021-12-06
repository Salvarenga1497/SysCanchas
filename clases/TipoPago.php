<?php

require_once "MySQL.php";

class TipoPago {

	private $_idTipoPago;
	private $_descripcion;


	public function setIdTipoPago($_idTipoPago) 
	{ 
		$this->_idTipoPago = $_idTipoPago; 
		return $this;
	} 	

	public function getIdTipoPago()
	{ 
		return $this->_idTipoPago; 
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
			
			$sql = "SELECT * FROM TIPOS_PAGO";

			$database = new MySQL();
			$datos = $database->consultar($sql);

			$listadoTipoPago = [];

			while ($registro = $datos->fetch_assoc()) {

				$tipoPago = new TipoPago();
				$tipoPago->_idTipoPago = $registro["ID_TIPO_PAGO"];
				$tipoPago->_descripcion = $registro["DESCRIPCION"];
				$listadoTipoPago[] = $tipoPago;
			
		}		  
		
		return $listadoTipoPago;

	}



	public static function obtenerPorId ($id) {

			$sql = "SELECT * FROM TIPOS_PAGO WHERE ID_TIPO_PAGO=" . $id; 

			$database = new MySQL();
			$datos = $database-> consultar($sql);

			if ($datos->num_rows > 0) {
				$registro = $datos->fetch_assoc();

				$tipoPago = new TipoPago();
				$tipoPago->_idTipoPago = $registro["ID_TIPO_PAGO"];
				$tipoPago->_descripcion = $registro["DESCRIPCION"];

				return $tipoPago;
			}
}	

public function guardar() {

			$database = new MySQL();

			$sql = "INSERT INTO TIPOS_PAGO (ID_TIPO_PAGO, DESCRIPCION) VALUES (NULL, '{$this->getDescripcion()}')";

			$database->insertar($sql);

		}

		public function eliminar() {

			$database = new MySQL();

			$sql = "DELETE FROM TIPOS_PAGO WHERE ID_TIPO_PAGO ={$this->_idTipoPago}";


			
			$database-> eliminar($sql);				

}

	
}
?>	


