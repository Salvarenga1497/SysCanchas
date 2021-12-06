<?php
require_once "MySQL.php";

class Dia {

	private $_idDia;
	private $_relaAgenda;
	private $_lunes;
	private $_martes;
	private $_miercoles;
	private $_jueves;
	private $_viernes;
	private $_sabado;
	private $_domingo;

	public function setIdDia($_idDia) 
	{ 
		$this->_idDia = $_idDia; 
		return $this;
	}

	public function setRelaAgenda($_relaAgenda) 
	{ 
		$this->_relaAgenda = $_relaAgenda; 
		return $this;
	}

	public function setLunes($_lunes) 
	{ 
		$this->_lunes = $_lunes; 
		return $this;
	}

	public function setMartes($_martes) 
	{ 
		$this->_martes = $_martes; 
		return $this;
	}

	public function setMiercoles($_miercoles) 
	{ 
		$this->_miercoles = $_miercoles; 
		return $this;
	}

	public function setJueves($_jueves) 
	{ 
		$this->_jueves = $_jueves; 
		return $this;
	}

	public function setViernes($_viernes) 
	{ 
		$this->_viernes = $_viernes; 
		return $this;
	}

	public function setSabado($_sabado) 
	{ 
		$this->_sabado = $_sabado; 
		return $this;
	}

	public function setDomingo($_domingo) 
	{ 
		$this->_domingo = $_domingo; 
		return $this;
	}


	public function getIdDia()
	{ 
		 return $this->_idDia;
	} 

		public function getRelaAgenda()
	{ 
		 return $this->_relaAgenda;
	} 

		public function getLunes()
	{ 
		 return $this->_lunes;
	} 
		public function getMartes()
	{ 
		 return $this->_martes;
	} 
		public function getMiercoles()
	{ 
		 return $this->_miercoles;
	} 
		public function getJueves()
	{ 
		 return $this->_jueves;
	} 
		public function getViernes()
	{ 
		 return $this->_viernes;
	} 
		public function getSabado()
	{ 
		 return $this->_sabado;
	} 
		public function getDomingo()
	{ 
		 return $this->_domingo;
	} 


		public static function obtenerPorIdAgenda ($id) {

			$sql = "SELECT DIAS.ID_DIAS,DIAS.LUNES, DIAS.MARTES,DIAS.MIERCOLES,DIAS.JUEVES,DIAS.VIERNES,DIAS.SABADO,.DIAS.DOMINGO "
					. "FROM DIAS "
					. "INNER JOIN AGENDA ON AGENDA.ID_AGENDA=DIAS.RELA_AGENDA "
					. "WHERE ID_AGENDA=" . $id;
			


			$database = new MySQL();
			$datos = $database-> consultar($sql);

			$dia = new Dia();
			
			if ($datos->num_rows > 0) {

				$registro = $datos->fetch_assoc();
				$dia->_idDia = $registro["ID_DIAS"];
				$dia->_lunes = $registro["LUNES"];
				$dia->_martes= $registro["MARTES"];
				$dia->_miercoles= $registro["MIERCOLES"];
				$dia->_jueves= $registro["JUEVES"];
				$dia->_viernes= $registro["VIERNES"];
				$dia->_sabado= $registro["SABADO"];
				$dia->_domingo= $registro["DOMINGO"];
			}

			return $dia;
		}

	public function guardar() {

		

			$database = new MySQL();

			$sql = "DELETE FROM DIAS WHERE RELA_AGENDA={$this->_relaAgenda}";

			$database->eliminar($sql);

			$sql = "INSERT INTO DIAS (ID_DIAS, RELA_AGENDA,LUNES, MARTES, MIERCOLES, JUEVES, VIERNES,SABADO,DOMINGO) VALUES (NULL, {$this->getRelaAgenda()}, {$this->getLunes()}, {$this->getMartes()}, {$this->getMiercoles()}, {$this->getJueves()}, {$this->getViernes()}, {$this->getSabado()}, {$this->getDomingo()})";


			$database->insertar($sql);

		}			
	}	


?>