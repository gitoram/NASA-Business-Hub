<?

class mysql {
	
	// configuracion
	var $host 		= "localhost";
	var $usuario 	= "root";
	var $password   = "";
	var $bd 		= "onestopshop";
	
	// poner a true para mostrar los mensajes exactos de error
	var $debug = true;
	
	var $conexion;
	
	public function __construct() {
	
        $this->conexion = $this->conectar();
		
    }
	
	private function conectar() {
	
		if (!($link = @mysql_connect($this->host, $this->usuario, $this->password))) {
			echo "<b>Error de Mysql:</b> No se pudo crear la conexion a la Base de Datos";
			
			if ($this->debug) { echo "<br><br>Debug: ".mysql_error(); }
			
			exit();
		}
		
		if (!(mysql_select_db($this->bd, $link))) {
			if (mysql_errno($link) == 1049) {
				echo "<b>Error de Mysql:</b> No se encuentra la Base de Datos especificada";
				
				if ($this->debug) { echo "<br><br>Debug: ".mysql_error(); }
				
				exit();
			}
			
			echo "<b>Error de Mysql:</b> Error al intentar conectar a la Base de Datos";
			
			if ($this->debug) { echo "<br><br>Debug: ".mysql_error(); }
			
			exit();
		}
		
		mysql_query("SET NAMES 'utf8'", $link);
		
		return $link;
	
	}
	
	public function desconectar() {
	
		mysql_close($this->conexion);
	
	}
		
	public function ejecutar($comando, $tipo) {
	
		// tipo - 1 = select, 2 = insert, update
		// prohibidos deletes
		
		$insert = "no";
		$update = "no";
		
		$separa = explode(" ", $comando);
		
		if (trim(strtoupper($separa[0])) == "UPDATE") {
			$update = "si";
			
			$datos = $this->cambios($comando, 1, ""); // obtener datos
		}
		
		if (trim(strtoupper($separa[0])) == "INSERT") {			
			$insert = "si";
		}
		
		// ejecutar
		$r = mysql_query($comando, $this->conexion);
		
		if ($update == "si") {
			$this->cambios("", 2, $datos); // hacer comparacion
		}
		
		if (!$r) {
			if (mysql_errno($this->conexion) == 1146) {
				echo "<b>Error de Mysql:</b> Una de las tablas referidas en la consulta no existe";
				
				if ($this->debug) { echo "<br><br>Debug: ".$comando." <br><br> ".mysql_error(); }
				
				exit();
			}
			
			if (mysql_errno($this->conexion) == 1142) {
				echo "<b>Error de Mysql:</b> Al parecer no tiene permisos para accesar a una de las tablas referidas en la consulta";
				
				if ($this->debug) { echo "<br><br>Debug: ".$comando." <br><br> ".mysql_error(); }
				
				exit();
			}
			
			echo "<b>Error de Mysql:</b> Una consulta parece incorrecta:";
			//echo "<b>Error de Mysql:</b> Una consulta parece incorrecta:".$comando;
			
			if ($this->debug) { echo "<br><br>Debug: ".mysql_error(); }
			
			exit();
		}
		
		if ($insert == "si") {
			return mysql_result(mysql_query("SELECT LAST_INSERT_ID()", $this->conexion), 0, 0);
		}
		
		if ($tipo == 1) {
			return $r;
		}
	
	}
	
	private function cambios($comando, $tipo, $datos) {
		if ($tipo == 1) {
			$separa = explode(" ", $comando);
			
			$where_encontrado = "no";
		
			// revisar los campos
			$tabla = $separa[1];
			
			for ($i = 0; $i < count($separa); $i ++) {
				if (trim(strtoupper($separa[$i])) == "WHERE") {
					$where_encontrado = "si";
					
					break;
				}
			}
			
			if ($where_encontrado == "si") {
				$where = "";
				
				for ($x = ($i + 1); $x < count($separa); $x ++) {
					if ($where) { $where .= " "; }
					
					$where .= $separa[$x];
				}
				
				$datos["tabla"] = $tabla;
				$datos["where"] = $where;
				
				// leer los valores de los campos ---
				$com = "SELECT * FROM ".$tabla." WHERE ".$where." LIMIT 1";
				$res = mysql_query($com, $this->conexion);
				
				if ($res) {				
					$fila = mysql_fetch_array($res);
					
					foreach ($fila as $a => $v) {
						if (!is_numeric($a)) {
							$datos[$a] = $v;
						}
					}
					// leer los valores de los campos ---
				}
				
				return $datos;
			} else {
				echo "<b>Error de Mysql:</b> Los UPDATES requieren un WHERE";
				
				exit();
			}
		} else {
			$modificados = "";
			
			$com = "SELECT * FROM ".$datos["tabla"]." WHERE ".$datos["where"]." LIMIT 1";
			$res = mysql_query($com, $this->conexion);
							
			$fila = mysql_fetch_array($res);
			
			foreach ($fila as $a => $v) {
				if (!is_numeric($a)) {
					if ($datos[$a] != $v) {
						$modificado .= "Campo: ".$a."\r\n   Antes: ".$datos[$a]."\r\n   Nuevo: ".$v."\r\n\r\n";
					}
				}
			}
			
			if ($modificado) {
				$datos["where"] = str_replace("'", chr(34), $datos["where"]); // cambiar ' por "
				
				$com = "INSERT _cambios SET 
						NomTabla    = '".$datos["tabla"]."', 
						WhereCambio = '".$datos["where"]."', 
						Datos       = '".$modificado."', 
						Usuario     = '".$_SESSION["user_id"]."', 
						Fecha       = NOW()";
				
				mysql_query($com, $this->conexion);
			}
		}
	}
	
}

?>