<?php

require_once "MySQL.php";
require_once "Barrio.php";
require_once "Localidad.php";
require_once "Provincia.php";


class Domicilio {

	private $_idDomicilio;
	private $_relaEntidad;
	private $_relaCanchas;
	private $_relaBarrio;
	private $_relaProvincia;
	private $_relaLocalidad;
	private $_calle;
	private $_altura;
	private $_sector;
	private $_manzana;
	private $_casa;
	private $_torre;
	private $_piso;
	private $_departamento;
	private $_observacione;
	
	public function setIdDomicilio($_idDomicilio) 
	{ 
		 $this->_idDomicilio = $_idDomicilio; 
		 return $this;
	} 

	public function setRelaPronvincia($_relaProvincia) 
	{ 
		 $this->_relaProvincia = $_relaProvincia; 
		 return $this;
	}	

	public function setRelaLocalidad($_relaLocalidad) 
	{ 
		 $this->_relaLocalidad = $_relaLocalidad; 
		 return $this;
	}	


	public function setRelaEntidad($_relaEntidad) 
	{ 
		 $this->_relaEntidad = $_relaEntidad; 
		 return $this;
	} 

	public function setRelaCanchas($_relaCanchas) 
	{ 
		 $this->_relaCanchas = $_relaCanchas; 
		 return $this;
	} 

	public function setRelaBarrio($_relaBarrio) 
	{ 
		 $this->_relaBarrio = $_relaBarrio; 
		 return $this;
	} 

	public function setCalle($_calle) 
	{ 
		 $this->_calle = $_calle; 
		 return $this;
	}

	public function setAltura($_altura) 
	{ 
		 $this->_altura = $_altura; 
		 return $this;
	}

	public function setSector($_sector) 
	{ 
		 $this->_sector = $_sector; 
		 return $this;
	}

	public function setManzana($_manzana) 
	{ 
		 $this->_manzana = $_manzana; 
		 return $this;
	}

	public function setCasa($_casa) 
	{ 
		 $this->_casa = $_casa; 
		 return $this;
	}

	public function setTorre($_torre) 
	{ 
		 $this->_torre = $_torre; 
		 return $this;
	}

	public function setPiso($_piso) 
	{ 
		 $this->_piso = $_piso; 
		 return $this;
	}

	public function setDepartamento($_departamento) 
	{ 
		 $this->_departamento = $_departamento; 
		 return $this;
	}

	public function getRelaEntidad() {
		return $this->_relaEntidad;
	}

	public function getRelaCanchas() {
		return $this->_relaCanchas;
	}

	public function getIdDomicilio() {
		return $this->_idDomicilio;
	}
	
	public function getRelaLocalidad() {
		return $this->_relaLocalidad;
	}

	public function getRelaProvincia() {
		return $this->_relaProvincia;
	}

	public function getRelaBarrio() {
		return $this->_relaBarrio;
	}

	public function getCalle() {
		return $this->_calle;
	}

	public function getAltura() {
		return $this->_altura;
	}

	public function getSector() {
		return $this->_sector;
	}

	public function getManzana() {
		return $this->_manzana;
	}

	public function getCasa() {
		return $this->_casa;
	}

	public function getTorre() {
		return $this->_torre;
	}

	public function getPiso() {
		return $this->_piso;
	}

	public function getDepartamento() {
		return $this->_departamento;
	}


	public static function obtenerPorIdEntidad($idEntidad) {

		$sql = "SELECT * FROM DOMICILIO WHERE RELA_ENTIDADES=" . $idEntidad;

		$database = new MySQL();
		$datos = $database->consultar($sql);

		$listadoDomicilios = [];

		while ($registro = $datos->fetch_assoc()) {

			$domicilio = new Domicilio();
			$domicilio->_idDomicilio = $registro["ID_DOMICILIO"];
			$domicilio->_relaEntidad = $registro["RELA_ENTIDADES"];
			$domicilio->_relaBarrio = $registro["RELA_BARRIO"];
		    $domicilio->_calle = $registro["CALLE"];
		    $domicilio->_altura = $registro["ALTURA"];
		    $domicilio->_sector = $registro["SECTOR"];
		    $domicilio->_manzana = $registro["MANZANA"];
		    $domicilio->_casa = $registro["CASA"];
		    $domicilio->_torre = $registro["TORRE"];
		    $domicilio->_piso = $registro["PISO"];
		    $domicilio->_departamento = $registro["DEPARTAMENTO"];
		    $domicilio->_observacione = $registro["OBSERVACIONES"];
		    $domicilio->barrio = Barrio::obtenerPorId($domicilio->_relaBarrio);
		    $domicilio->barrio ->localidad = Localidad::obtenerPorId($domicilio->barrio->_relaLocalidad);
		    $domicilio->barrio ->localidad->provincia = Provincia::obtenerPorId($domicilio->barrio->localidad->_relaProvincia);
		    $listadoDomicilios[] = $domicilio;
		}

		return $listadoDomicilios;

	}

	public static function obtenerPorIdCanchas($idCanchas) {

		$sql = "SELECT * FROM DOMICILIO WHERE RELA_CANCHAS=" . $idCanchas;

		$database = new MySQL();
		$datos = $database->consultar($sql);

		$listadoDomicilios = [];

		while ($registro = $datos->fetch_assoc()) {

			$domicilio = new Domicilio();
			$domicilio->_idDomicilio = $registro["ID_DOMICILIO"];
			$domicilio->_relaCanchas = $registro["RELA_CANCHAS"];
			$domicilio->_relaBarrio = $registro["RELA_BARRIO"];
		    $domicilio->_calle = $registro["CALLE"];
		    $domicilio->_altura = $registro["ALTURA"];
		    $domicilio->_sector = $registro["SECTOR"];
		    $domicilio->_manzana = $registro["MANZANA"];
		    $domicilio->_casa = $registro["CASA"];
		    $domicilio->_torre = $registro["TORRE"];
		    $domicilio->_piso = $registro["PISO"];
		    $domicilio->_departamento = $registro["DEPARTAMENTO"];
		    $domicilio->_observacione = $registro["OBSERVACIONES"];
		    $domicilio->barrio = Barrio::obtenerPorId($domicilio->_relaBarrio);
		    $domicilio->barrio ->localidad = Localidad::obtenerPorId($domicilio->barrio->_relaLocalidad);
		    $domicilio->barrio ->localidad->provincia = Provincia::obtenerPorId($domicilio->barrio->localidad->_relaProvincia);
		    $listadoDomicilios[] = $domicilio;
		}

		return $listadoDomicilios;

	} 

	public static function obtenerPorId ($id) {

			$sql = "SELECT DOMICILIO.ID_DOMICILIO,DOMICILIO.RELA_BARRIO, DOMICILIO.CALLE, DOMICILIO.ALTURA, DOMICILIO.SECTOR, DOMICILIO.MANZANA, DOMICILIO.CASA, DOMICILIO.TORRE,
					DOMICILIO.PISO, DOMICILIO.DEPARTAMENTO, DOMICILIO.OBSERVACIONES, BARRIO.DESCRIPCION, LOCALIDAD.DESCRIPCION, PROVINCIA.DESCRIPCION, BARRIO.RELA_LOCALIDAD, LOCALIDAD.RELA_PROVINCIA 
					 FROM DOMICILIO 
					 JOIN BARRIO ON DOMICILIO.RELA_BARRIO=BARRIO.ID_BARRIO
					 JOIN LOCALIDAD ON BARRIO.RELA_LOCALIDAD=LOCALIDAD.ID_LOCALIDAD
					 JOIN PROVINCIA ON LOCALIDAD.RELA_PROVINCIA=PROVINCIA.ID_PROVINCIA
					 WHERE ID_DOMICILIO=" . $id; 

	
			$database = new MySQL();
			$datos = $database-> consultar($sql);

			if ($datos->num_rows > 0) {
				$registro = $datos->fetch_assoc();

				$domicilio = new Domicilio();
				$domicilio->_idDomicilio = $registro["ID_DOMICILIO"];
				$domicilio->_relaBarrio = $registro["RELA_BARRIO"];
			    $domicilio->_calle = $registro["CALLE"];
			    $domicilio->_altura = $registro["ALTURA"];
			    $domicilio->_sector = $registro["SECTOR"];
			    $domicilio->_manzana = $registro["MANZANA"];
			    $domicilio->_casa = $registro["CASA"];
			    $domicilio->_torre = $registro["TORRE"];
			    $domicilio->_piso = $registro["PISO"];
			    $domicilio->_departamento = $registro["DEPARTAMENTO"];
			    $domicilio->_observacione = $registro["OBSERVACIONES"];
			    $domicilio->_relaLocalidad = $registro["RELA_LOCALIDAD"];
			    $domicilio->_relaProvincia = $registro["RELA_PROVINCIA"];

				return $domicilio;
			}
}	

public function guardar() {

			$database = new MySQL();

			$sql = "INSERT INTO DOMICILIO (ID_DOMICILIO,RELA_ENTIDADES,CALLE,ALTURA,SECTOR,MANZANA,CASA,TORRE,PISO,DEPARTAMENTO,RELA_BARRIO) VALUES (NULL, {$this->_relaEntidad},'{$this->_calle}','{$this->_altura}','{$this->_sector}','{$this->_manzana}','{$this->_casa}','{$this->_torre}','{$this->_piso}','{$this->_departamento}',{$this->_relaBarrio})";
	

			$database->insertar($sql);
		}

public function guardarCancha() {

			$database = new MySQL();

			$sql = "INSERT INTO DOMICILIO (ID_DOMICILIO,CALLE,ALTURA,SECTOR,MANZANA,CASA,TORRE,PISO,DEPARTAMENTO,RELA_BARRIO,RELA_CANCHAS) VALUES (NULL,'{$this->_calle}','{$this->_altura}','{$this->_sector}','{$this->_manzana}','{$this->_casa}','{$this->_torre}','{$this->_piso}','{$this->_departamento}',{$this->_relaBarrio}, {$this->_relaCanchas})";

			


			$database->insertar($sql);
		}

public function actualizar() {

			$database = new MySQL();

			$sql ="UPDATE DOMICILIO SET CALLE ='{$this->_calle}', ALTURA = '{$this->_altura}', SECTOR = '{$this->_sector}', MANZANA = '{$this->_manzana}', CASA = '{$this->_casa}', TORRE = '{$this->_torre}', PISO = '{$this->_piso}', DEPARTAMENTO = '{$this->_departamento}', RELA_BARRIO = '{$this->_relaBarrio}' WHERE DOMICILIO.ID_DOMICILIO = {$this->_idDomicilio}";

			$database->actualizar($sql);
		}

public function eliminar() {

		$sql = "DELETE FROM DOMICILIO WHERE ID_DOMICILIO={$this->_idDomicilio}";
	
	

		$database = new MySQL();
		$database->eliminar($sql);	

	}

}



?>