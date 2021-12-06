<?php

require_once "MySQL.php";
require_once "Entidad.php";
require_once "Perfil.php";

	Class Usuario extends Entidad {

		protected $_idUsuario;
		protected $_username;
		protected $_fechaAlta;
		protected $_relaPerfil;
		protected $_contrasena;
		protected $_estaLogueado;
		protected $_relaEntidades;


		public $perfil;
		
		public function getIdUsuario()
		{ 
			 return $this->_idUsuario; 
		} 

		public function setIdUsuario($_idUsuario) 
		{ 
			 $this->_idUsuario = $_idUsuario; 
			 return $this;
		 } 

		public function getUserName()
	 	{ 
	 		 return $this->_username; 
		} 

	    public function setUserName($_username) 
	    { 
	    	$this->_username = $_username; 
	    	return $this;
	    } 

		public function getFechaAlta()
		{ 
		 	 return $this->_fechaAlta; 
		} 

		public function setFechaAlta($_fechaAlta) 
	 	{
		 	 $this->_fechaAlta = $_fechaAlta; 
		 	 return $this;
		} 

		public function getRelaPerfil()
		{ 
			 return $this->_relaPerfil; 
		} 
			 
		public function setRelaPerfil($_relaPerfil) 
		{ 
			 $this->_relaPerfil = $_relaPerfil; 
			 return $this;
		} 
 
		
		public function EstaLogueado()
		{
			 return $this->_estaLogueado;
		}

		public function getContrasena()
		{ 
			 return $this->_contrasena; 
		}

		public function setContrasena($_contrasena) 
		{ 
			 $this->_contrasena = $_contrasena; 
			 return $this;
		} 
		
		public function getRelaEntidades()
		{ 
			 return $this->_relaEntidades; 
		}

		public function setRelaEntidades($_relaEntidades) 
		{ 
			 $this->_relaEntidades = $_relaEntidades; 
			 return $this;
		} 

				  
		
		public static function obtenerTodoss() {
			$sql = "SELECT ENTIDADES.ID_ENTIDADES, ENTIDADES.NOMBRE, " 
			        . "ENTIDADES.APELLIDO,ENTIDADES.FECHA_NAC,USUARIOS.ID_USUARIOS,USUARIOS.USERNAME, ENTIDADES.DOC, USUARIOS.FECHA_ALTA, ENTIDADES.RELA_SEXO, USUARIOS.RELA_ENTIDADES, USUARIOS.RELA_PERFIL "
					. "FROM USUARIOS "
					. "JOIN ENTIDADES ON ENTIDADES.ID_ENTIDADES=USUARIOS.RELA_ENTIDADES WHERE ENTIDADES.ESTADO = 1";

	
			
			

			$database = new MySQL();
			$datos = $database->consultar($sql);

			$listadoUsuarios = [];

			while ($registro = $datos->fetch_assoc()) {

				$user = new Usuario();
				$user->_idUsuario = $registro["ID_USUARIOS"];
				$user->_idEntidades = $registro["ID_ENTIDADES"];
				$user->_nombre = $registro["NOMBRE"];
				$user->_apellido = $registro["APELLIDO"];
				$user->_username = $registro["USERNAME"];
				$user->_fechaNacimiento = $registro["FECHA_NAC"];
				$user->_documento = $registro["DOC"];
				$user->_fechaAlta = $registro["FECHA_ALTA"];
				$user->_sexo = $registro["RELA_SEXO"];
				$user->_relaEntidades = $registro["RELA_ENTIDADES"];
				$user->_relaPerfil = $registro["RELA_PERFIL"];


				$listadoUsuarios[] = $user;
			
		}		  
		
		return $listadoUsuarios;
		 	  	  
			  	
	}

	public static function obtenerTodos($filtroEstado,$filtroNombre,$filtroApellido,$filtroDni) {
			$sql = "SELECT ENTIDADES.ID_ENTIDADES, ENTIDADES.NOMBRE, " 
			        . "ENTIDADES.APELLIDO,ENTIDADES.FECHA_NAC,USUARIOS.ID_USUARIOS,USUARIOS.USERNAME, ENTIDADES.DOC, USUARIOS.FECHA_ALTA, ENTIDADES.RELA_SEXO, USUARIOS.RELA_ENTIDADES, USUARIOS.RELA_PERFIL, ENTIDADES.ESTADO "
					. "FROM USUARIOS "
					. "JOIN ENTIDADES ON ENTIDADES.ID_ENTIDADES=USUARIOS.RELA_ENTIDADES";

					$where = "";

        if ($filtroEstado != 0) {
        	// $sql = $sql . " WHERE personas.estado = " . $filtroEstado;
        	$where = " WHERE ENTIDADES.ESTADO = " . $filtroEstado;
        }

        if ($filtroNombre != "") {

        	if ($where != "") {

        		$where .= " AND ENTIDADES.NOMBRE = '{$filtroNombre}'";

        	} else {

        		$where = " WHERE ENTIDADES.NOMBRE like '%{$filtroNombre}%'";

        	}
        }

        if ($filtroApellido != "") {

        	if ($where != "") {

        		$where .= " AND ENTIDADES.APELLIDO = '{$filtroApellido}'";

        	} else {

        		$where = " WHERE ENTIDADES.APELLIDO like '%{$filtroApellido}%'";

        	}
        }

        if ($filtroDni != "") {

        	if ($where != "") {

        		$where .= " AND ENTIDADES.DOC = '{$filtroDni}'";

        	} else {

        		$where = " WHERE ENTIDADES.DOC like '%{$filtroDni}%'";

        	}
        }

        

		$sql.= $where;

		
			
			

			$database = new MySQL();
			$datos = $database->consultar($sql);

			$listadoUsuarios = [];

			while ($registro = $datos->fetch_assoc()) {

				$user = new Usuario();
				$user->_idUsuario = $registro["ID_USUARIOS"];
				$user->_idEntidades = $registro["ID_ENTIDADES"];
				$user->_nombre = $registro["NOMBRE"];
				$user->_apellido = $registro["APELLIDO"];
				$user->_username = $registro["USERNAME"];
				$user->_fechaNacimiento = $registro["FECHA_NAC"];
				$user->_documento = $registro["DOC"];
				$user->_fechaAlta = $registro["FECHA_ALTA"];
				$user->_sexo = $registro["RELA_SEXO"];
				$user->_relaEntidades = $registro["RELA_ENTIDADES"];
				$user->_relaPerfil = $registro["RELA_PERFIL"];
				$user->_estado = $registro["ESTADO"];
				$user->perfil = Perfil::obtenerPorId($user->_relaPerfil);



				$listadoUsuarios[] = $user;
			
		}		  
		
		return $listadoUsuarios;
		 	   
			  
			  	
	}


		public static function login($username, $contrasena) {


			$sql = "SELECT ENTIDADES.ID_ENTIDADES, ENTIDADES.NOMBRE, " 
			        . "ENTIDADES.APELLIDO,ENTIDADES.FECHA_NAC,USUARIOS.ID_USUARIOS,USUARIOS.USERNAME, USUARIOS.RELA_PERFIL, USUARIOS.RELA_ENTIDADES "
					. "FROM USUARIOS "
					. "JOIN ENTIDADES ON ENTIDADES.ID_ENTIDADES=USUARIOS.RELA_ENTIDADES "
					. "WHERE USERNAME = '{$username}' and CONTRASENA = '{$contrasena}' and ENTIDADES.ESTADO=1";

			$database = new MySQL();
			$datos = $database->consultar($sql);

			$user = new Usuario();

			if ($datos->num_rows > 0) {
				$registro = $datos->fetch_assoc();
				$user->_idUsuario = $registro["ID_USUARIOS"];
				$user->_idEntidades = $registro["ID_ENTIDADES"];
				$user->_username = $registro["USERNAME"];
				$user->_nombre = $registro["NOMBRE"];
				$user->_apellido = $registro["APELLIDO"];
				$user->_fechaNacimiento = $registro["FECHA_NAC"];
				$user->_relaEntidades = $registro["RELA_ENTIDADES"];
				$user->_relaPerfil = $registro["RELA_PERFIL"];
				$user->perfil = Perfil::obtenerPorId($user->_relaPerfil);
				$user->_estaLogueado = true;
			} else {
				$user->_estaLogueado = false;
			}


			return $user;



		}

		public static function obtenerPorId ($id) {

			$sql = "SELECT ENTIDADES.NOMBRE, " 
			        . "ENTIDADES.APELLIDO,ENTIDADES.FECHA_NAC,USUARIOS.ID_USUARIOS,USUARIOS.USERNAME, ENTIDADES.RELA_SEXO, ENTIDADES.DOC, USUARIOS.CONTRASENA, USUARIOS.RELA_ENTIDADES, USUARIOS.RELA_PERFIL "
					. "FROM USUARIOS "
					. "JOIN ENTIDADES ON ENTIDADES.ID_ENTIDADES=USUARIOS.RELA_ENTIDADES "
					. "WHERE ID_USUARIOS=" . $id;
		
			

			$database = new MySQL();
			$datos = $database-> consultar($sql);

			if ($datos->num_rows > 0) {
				$registro = $datos->fetch_assoc();

				$user = new Usuario();
				$user->_idUsuario = $registro["ID_USUARIOS"];
				$user->_relaEntidades = $registro["RELA_ENTIDADES"];
				$user->_username = $registro["USERNAME"];
				$user->_nombre = $registro["NOMBRE"];
				$user->_apellido = $registro["APELLIDO"];
				$user->_fechaNacimiento = $registro["FECHA_NAC"];
				$user->_relasexo = $registro["RELA_SEXO"];
				$user->_documento = $registro["DOC"];
				$user->_relaPerfil = $registro["RELA_PERFIL"];
				$user->_contrasena = $registro["CONTRASENA"];


				return $user;
			} else {
				return false;
			}
		}

		public static function obtenerPorIdEntidad ($id) {

			$sql = "SELECT ENTIDADES.NOMBRE, " 
			        . "ENTIDADES.APELLIDO,ENTIDADES.FECHA_NAC,USUARIOS.ID_USUARIOS,USUARIOS.USERNAME, ENTIDADES.RELA_SEXO, ENTIDADES.DOC, USUARIOS.RELA_PERFIL, USUARIOS.CONTRASENA, USUARIOS.RELA_ENTIDADES "
					. "FROM USUARIOS "
					. "JOIN ENTIDADES ON ENTIDADES.ID_ENTIDADES=USUARIOS.RELA_ENTIDADES "
					. "WHERE RELA_ENTIDADES=" . $id;
	

			$database = new MySQL();
			$datos = $database-> consultar($sql);

			if ($datos->num_rows > 0) {
				$registro = $datos->fetch_assoc();

				$user = new Usuario();
				$user->_idUsuario = $registro["ID_USUARIOS"];
				$user->_relaEntidades = $registro["RELA_ENTIDADES"];
				$user->_username = $registro["USERNAME"];
				$user->_nombre = $registro["NOMBRE"];
				$user->_apellido = $registro["APELLIDO"];
				$user->_fechaNacimiento = $registro["FECHA_NAC"];
				$user->_relasexo = $registro["RELA_SEXO"];
				$user->_documento = $registro["DOC"];
				$user->_relaPerfil = $registro["RELA_PERFIL"];
				$user->_contrasena = $registro["CONTRASENA"];


				return $user;

			}
		
		}

		public static function obtenerUltimoUsuarioRegistrado() {
			$sql = "SELECT * FROM Usuarios ORDER BY ID_USUARIOs DESC ";

			$database = new MySQL();
			$datos = $database->consultar($sql);

			$listadoUsuarios = [];

			while ($registro = $datos->fetch_assoc()) {

				$user = new Usuario();
				$user->_username = $registro["USERNAME"];
				$user->_fechaAlta = $registro["FECHA_ALTA"];

				$listadoUsuarios[] = $user;
			
		}		  
		
		return $listadoUsuarios;
		 	  	  
			  	
	}
 
		public function guardar() {

			parent::guardar();

			$database = new MySQL();

			$sql = "INSERT INTO USUARIOS (ID_USUARIOS,RELA_ENTIDADES,RELA_PERFIL,USERNAME,FECHA_ALTA) VALUES (NULL, {$this->_idEntidad}, {$this->_relaPerfil}, '{$this->_username}', 'CURDATE()')";

			$database->insertar($sql);
		}

		public function actualizar() {

			parent::actualizar();

			$database = new MySQL();

			$sql ="UPDATE USUARIOS SET RELA_PERFIL={$this->_relaPerfil}, USERNAME ='{$this->_username}', CONTRASENA = '{$this->_contrasena}', FECHA_ALTA = '{$this->_fechaAlta}' WHERE USUARIOS.ID_USUARIOS = {$this->_idUsuario}";



			$database->actualizar($sql);
		}


		public function eliminar() {

			$sql = "UPDATE USUARIOS SET USERNAME ='{$this->_username}', CONTRASENA = '{$this->_contrasena}', FECHA_ALTA = '{$this->_fechaAlta}', RELA_ENTIDADES = '{$this->_relaEntidades}' WHERE USUARIOS.ID_USUARIOS = {$this->_idUsuario}";

			
			$database = new MySQL();
			$database-> eliminar($sql);

			parent::eliminar();

		}	


 

}




?>