<?php

require_once "MySQL.php";


class Entidad  {

	protected $_idEntidad;
	protected $_nombre;
	protected $_apellido;
	protected $_documento;
	protected $_fechaNacimiento;
	protected $_relatipo;
	protected $_relasexo;

	public function getIdEntidad()
	{ 
		 return $this->_idEntidad; 
	} 

	public function setIdEntidad($_idEntidad) 
	{ 
		 $this->_idEntidad = $_idEntidad; 
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

	public function getApellido()
	{ 
		 return $this->_apellido; 
	} 
		 
	public function setApellido($_apellido) 
	{ 
		 $this->_apellido = $_apellido; 
		 return $this;
	} 
		  
	public function getDocumento()
	{ 
		  	 return $this->_documento; 
	} 

	public function setDocumento($_documento) 
	{ 
		  	 $this->_documento = $_documento; 
		  	 return $this;
	} 

	public function getFechaNacimiento()
	{ 
		 return $this->_fechaNacimiento; 
	} 


	public function setFechaNacimiento($_fechaNacimiento) 
	{ 
		 $this->_fechaNacimiento = $_fechaNacimiento; 
		 return $this;
	} 
		  
	public function getRelaTipo()
	{ 
		 return $this->_relatipo; 
	} 

	public function setRelaTipo($_relatipo) 
	{ 
		 $this->_relatipo = $_relatipo; 
		 return $this;
	} 

	public function getRelaSexo()
	{ 
		 return $this->_relasexo; 
	} 
		 
	public function setRelaSexo($_relasexo) 
	{ 
		 $this->_relasexo = $_relasexo; 
		 return $this;
	} 
		  
		  

	public function guardar () {

		$database = new MySQL();

			$sql = "INSERT INTO ENTIDADES (ID_ENTIDADES,NOMBRE,APELLIDO,DOC,FECHA_NAC, ESTADO, RELA_SEXO, RELA_TIPO) VALUES ( NULL, '{$this->_nombre}', '{$this->_apellido}','{$this->_documento}', '{$this->_fechaNacimiento}', 1, {$this->_relasexo}, {$this->_relatipo})";

			$idEntidad = $database->insertar($sql);

			$this->_idEntidad = $idEntidad;
	}
		
		public function actualizar() {

			$sql = "UPDATE ENTIDADES SET NOMBRE ='{$this->_nombre}', APELLIDO = '{$this->_apellido}', DOC = '{$this->_documento}', FECHA_NAC ='{$this->_fechaNacimiento}', RELA_TIPO = {$this->_relatipo}, RELA_SEXO = {$this->_relasexo} WHERE ENTIDADES.ID_ENTIDADES = {$this->_relaEntidades} ";	
			
			
			$database = new MySQL();
			$database->actualizar($sql);
		}


		public function eliminar() {

			$sql = "UPDATE ENTIDADES SET ESTADO = 2 WHERE ID_ENTIDADES = {$this->_relaEntidades}";

			
		
			$database = new MySQL();
			$database-> eliminar($sql);

		}	



	public function __toString () {
		return "{$this->_apellido},{$this->_nombre}";
	}
	  
} 



?>