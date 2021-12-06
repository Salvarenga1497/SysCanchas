<?php

require_once "MySQL.php";

class Contacto {

	private $_idEntidadesContacto;
	private $_relaEntidad;
	private $_relaTipoContacto;
	private $_valor;

	private $_descripcion;

	public function setRelaEntidad($relaEntidad) {
		$this->_relaEntidad = $relaEntidad;
	}

	public function setRelaTipoContacto($relaTipoContacto) {
		$this->_relaTipoContacto = $relaTipoContacto;
	}	

	public function setValor($valor) {
		$this->_valor = $valor;
	}

	public function getDescripcion() {
		return $this->_descripcion;
	}

	public function getValor() {
		return $this->_valor;
	}

	public function getIdEntidadContacto() {
		return $this->_idEntidadesContacto;
	}

	public function getRelaEntidad() {
		return $this->_relaEntidad;
	}




	public static function obtenerPorIdEntidad($idEntidad) {

		$sql = "SELECT ENTIDAD_CONTACTO.ID_ENTIDAD_CONTACTO, ENTIDAD_CONTACTO.RELA_ENTIDADES, ENTIDAD_CONTACTO.RELA_TIPO_CONTACTO, ENTIDAD_CONTACTO.VALOR, TIPO_CONTACTO.DESCRIPCION FROM ENTIDAD_CONTACTO INNER JOIN TIPO_CONTACTO ON TIPO_CONTACTO.ID_TIPO_CONTACTO = ENTIDAD_CONTACTO.RELA_TIPO_CONTACTO  INNER JOIN ENTIDADES ON ENTIDADES.ID_ENTIDADES = ENTIDAD_CONTACTO.RELA_ENTIDADES WHERE ENTIDADES.ID_ENTIDADES = " . $idEntidad;


		$database = new MySQL();
		$datos = $database->consultar($sql);

		$listadoContactos = [];

		while ($registro = $datos->fetch_assoc()) {
			$contacto = new Contacto();
			$contacto->_idEntidadesContacto = $registro["ID_ENTIDAD_CONTACTO"];
			$contacto->_relaEntidad = $registro["RELA_ENTIDADES"];
			$contacto->_relaTipoContacto = $registro["RELA_TIPO_CONTACTO"];
			$contacto->_valor = $registro["VALOR"];
			$contacto->_descripcion = $registro["DESCRIPCION"];
			$listadoContactos[] = $contacto;

		}

		return $listadoContactos;

	}

	public static function obtenerPorId($idEntidadContacto) {

		$sql = "SELECT ENTIDAD_CONTACTO.ID_ENTIDAD_CONTACTO, ENTIDAD_CONTACTO.RELA_ENTIDADES, ENTIDAD_CONTACTO.RELA_TIPO_CONTACTO, ENTIDAD_CONTACTO.VALOR, TIPO_CONTACTO.DESCRIPCION FROM ENTIDAD_CONTACTO INNER JOIN TIPO_CONTACTO ON TIPO_CONTACTO.ID_TIPO_CONTACTO = ENTIDAD_CONTACTO.RELA_TIPO_CONTACTO  INNER JOIN ENTIDADES ON ENTIDADES.ID_ENTIDADES = ENTIDAD_CONTACTO.RELA_ENTIDADES WHERE ID_ENTIDAD_CONTACTO = {$idEntidadContacto}";

			$database = new MySQL();
			$datos = $database-> consultar($sql);

			if ($datos->num_rows > 0) {
			$registro = $datos->fetch_assoc();

			$contacto = new Contacto();
			$contacto->_idEntidadesContacto = $registro["ID_ENTIDAD_CONTACTO"];
			$contacto->_relaEntidad = $registro["RELA_ENTIDADES"];
			$contacto->_relaTipoContacto = $registro["RELA_TIPO_CONTACTO"];
			$contacto->_valor = $registro["VALOR"];
			$contacto->_descripcion = $registro["DESCRIPCION"];

				return $contacto;
			}else {
				return false;
			}
		}

	public function guardar(){
		$sql = "INSERT INTO ENTIDAD_CONTACTO (ID_ENTIDAD_CONTACTO, RELA_ENTIDADES, RELA_TIPO_CONTACTO, VALOR) VALUES (NULL, {$this->_relaEntidad}, {$this->_relaTipoContacto}, '{$this->_valor}')";


		$database = new MySQL();
		$idInsertado = $database->insertar($sql);

		$this->_idEntidadesContacto = $idInsertado;

	}

	public function eliminar() {

		$sql = "DELETE FROM ENTIDAD_CONTACTO WHERE ID_ENTIDAD_CONTACTO={$this->_idEntidadesContacto}";
		
		$database = new MySQL();
		$database->eliminar($sql);		

	}

}



?>