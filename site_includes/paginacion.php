<?
// Esta funcion arma los filtros en base a un string partiendo las palabras
// $strFiltro =  Cadena a buscar ; $strCambia = palabra clave que se sustitulle para poner la buscada
function strFiltrosWhere($strFiltro,$strCambia){
	//print_r($strFiltro);
	$palabras = explode(" ",trim($strFiltro["strBusca"]));
	$filtroBusca = "";
	for($i=0; $i < count($palabras);++$i ){
		if($i == 0){
			$filtroBusca = str_replace($strCambia,$palabras[$i],$strFiltro["filtro1"]);
		}else{
			$filtroBusca .= str_replace($strCambia,$palabras[$i],$strFiltro["filtro2"]);
		}
	}
	
	return $filtroBusca;
}

//Ejecuta la consulta con los filtros dados y retorna el arreglo de registros
//$sql = Arreglo con los segmentos de la consulta ; $link= conexion a la BD
function paginacion_lista($sql){
	
	include_once "class_mysql.php";
	$mysql = new mysql;

	$consulta  = "SELECT "    .$sql["Select"] ;
	$consulta .= " FROM  "   .$sql["From"];
	$consulta .= " "          .$sql["LJoin"];
	
	if($sql["Where"]){
		$consulta .= " WHERE ".$sql["Where"];
	}else{
		$consulta .= " ".$sql["Where"];
	}
	
	if ($sql["Group"]) { 
		$consulta .= " GROUP BY " .$sql["Group"];
	}
	
	if ($sql["Order"]) { 
		$consulta .= " ORDER BY " .$sql["Order"];
	}
	
	if ($sql["Limit"]) { 
		 $consulta .= " LIMIT "    .$sql["Limit"];
	}
	


	//echo $consulta;
	//$resQuery = mysql_query($consulta, $link);
	//return $resQuery;
	
	$resQuery = $mysql->ejecutar($consulta,1); 
	return $resQuery;
	
}


function htmlPaginas($sql,$paginas){
	
	include_once "class_mysql.php";
	$mysql = new mysql;
	
	$sqlNumReg  = "SELECT COUNT(*) AS totReg " ;
	$sqlNumReg .= " FROM   "   .$sql["From"];
	$sqlNumReg .= " "          .$sql["LJoin"];
	
	if ($sql["Where"]) {
		$sqlNumReg .= " WHERE ".$sql["Where"];
	} else {
		$sqlNumReg .= " ".$sql["Where"];
	}

	//$resul = mysql_query($sqlNumReg,$link);
	//$registros = mysql_result($resul,'0','totReg');
	
	$resul     = $mysql->ejecutar($sqlNumReg,1); 
	$reg       = mysql_fetch_object($resul);
	$registros = $reg->totReg;
	
	// -----------------------------
	// inicio de paginacion
	$inicio = (($paginas["pagina"] - 1) * $paginas["tamPagina"]);
	
	// pagina actual
	$pagina = $paginas["pagina"];
	
	// numero total de paginas
	$paginas_ = ceil($registros / $paginas["tamPagina"]);
	// -----------------------------
	
		$htmlPaginas = "";

		// letrero o flecha de anterior
		if ($pagina > 1) {
			// puede dar click
			 $htmlPaginas .= '<a href="javascript:'.$paginas['funcion'].'('.($pagina-1).')" ><img src="'.$paginas['ImgAntAct'].'"  border="0" style="padding-right:10px;" /></a>';
		} else {
			// no puede dar click
			 $htmlPaginas .= '<img src="'.$paginas['ImgAntDes'].'"  border="0" style="padding-right:10px;" />';
		}
		
		// - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
			
			$pagina_inicial = $pagina - ceil(($paginas['Visibles'] / 2) - 1);
			$pagina_final = $pagina + ceil(($paginas['Visibles'] / 2) - 1);
			
			if ($paginas_ <= $paginas['Visibles']) {
				$pagina_inicial = 1;
				$pagina_final = $paginas_;	
			} else {
				if ($pagina_inicial < 1) { 
					$pagina_inicial = 1; 
					$pagina_final = $pagina_inicial + ($paginas['Visibles'] - 1); 
				}
				
				if ($pagina_final > $paginas_) {
					$pagina_final = $paginas_;
					if (($pagina_inicial - ceil(($paginas['Visibles'] / 2) - 1)) > 0) { 
						$pagina_inicial -= ceil(($paginas['Visibles'] / 2) - 1);
						
						for ($i = 1; $i < 10; $i ++) {
							if (($pagina_final - $pagina_inicial) > ($paginas['Visibles'] - 1)) { $pagina_inicial ++; }
							else { break; }
						}
					}
				}
			}
			
			// para calcular el ancho de los divs
			$medida = (20 * ($pagina_final - $pagina_inicial + 1));
			
			if ($pagina_inicial > 1) { $medida += 20; }
			if ($pagina_final < $paginas) { $medida += 20; }
			
			// = = = = = = = = = = = = = = = = = = = = = = = = = = = 
				
				// caracteres antes de la paginacion, pueden ser ...
				if ($pagina_inicial > 1 && $paginas['Prefijo']) { 

					$htmlPaginas .= '<span style="padding-right:2px;" class="'.$paginas['Class'].'">'.$paginas['Prefijo'].'</span>';
				}
				
				for ($i = $pagina_inicial; $i <= $pagina_final; $i ++) {
				
					// numeros de paginas
					if ($i == $pagina) { 
						// pagina actual
						$htmlPaginas .= '<span style="padding-right:2px; padding-left:2px;"><a href="javascript:'.$paginas['funcion'].'('.$i.')" class="'.$paginas['ActClass'].'">'.$i.'</a></span>';
					} else { 
						// otras paginas
						$htmlPaginas .= '<span style="padding-right:2px; padding-left:2px;"><a href="javascript:'.$paginas['funcion'].'('.$i.')" class="'.$paginas['Class'].'">'.$i.'</a></span>';
						
					}
					
				}
				
				// caracteres despues de la paginacion, pueden ser ...
				if ($pagina_final < $paginas_ && $paginas['Sufijo']) { 
					$htmlPaginas .= '<span style="padding-left:2px;" class="'.$paginas['Class'].'">'.$paginas['Sufijo'].'</span>';
				}

			// = = = = = = = = = = = = = = = = = = = = = = = = = = = 

		// - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
		
		// letrero o flecha de siguiente
		if ($paginas_ > $pagina) {
			// puede dar click
			 $htmlPaginas .= '<a href="javascript:'.$paginas['funcion'].'('.($pagina+1).')" ><img src="'.$paginas['ImgSigAct'].'"  border="0" style="padding-left:10px;" /></a>';
		} else {
			// no puede dar click
			 $htmlPaginas .= '<img src="'.$paginas['ImgSigDes'].'"  border="0" style="padding-left:10px;" />';
		}
	
	return $htmlPaginas;
	
}

	
//Retorna el Strin Html para pintar el navegador de paginas
//$sql = arreglo con segmentos de la consulta; $paginas = detalle de estilos de paginas
//para los otros eventos
function htmlPaginasLista($sql,$paginas,$link){

	$sqlNumReg  = "SELECT COUNT(*) AS totReg " ;
	$sqlNumReg .= " FROM   "   .$sql["From"];
	$sqlNumReg .= " "          .$sql["LJoin"];
	
	if ($sql["Where"]) {
		$sqlNumReg .= " WHERE ".$sql["Where"];
	} else {
		$sqlNumReg .= " ".$sql["Where"];
	}
	//echo $sqlNumReg;
	//$resul = mysql_query($sqlNumReg,$link);
	//$registros = mysql_result($resul,'0','totReg');
	
	$resul     = $mysql->ejecutar($sqlNumReg,1); 
	$reg       = mysql_fetch_object($resul);
	$registros = $reg->totReg;
	
	// -----------------------------
	// inicio de paginacion
	$inicio = (($paginas["pagina"] - 1) * $paginas["tamPagina"]);
	
	// pagina actual
	$pagina = $paginas["pagina"];
	
	// numero total de paginas
	$paginas_ = ceil($registros / $paginas["tamPagina"]);
	// -----------------------------
	
		$htmlPaginas = '<table width="100%" border="0" cellpadding="0" cellspacing="0"><tr>';

		// letrero o flecha de anterior
		if ($pagina > 1) {
			// puede dar click
			$htmlPaginas .= '<td width="40" height="35" align="right" valign="middle"><a href="javascript:'.$paginas['funcion'].'('.($pagina-1).')" ><img src="'.$paginas['ImgAntAct'].'"  border="0" style="padding-right:10px;" /></a></td>';
		} else {
			// no puede dar click
			$htmlPaginas .= '<td width="40" height="35" align="right" valign="middle"><img src="'.$paginas['ImgAntDes'].'"  border="0" style="padding-right:10px;" /></td>';
		}
		
		// - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
			$htmlPaginas .='<td align="center" valign="middle">';
			
			$pagina_inicial = $pagina - ceil(($paginas['Visibles'] / 2) - 1);
			$pagina_final = $pagina + ceil(($paginas['Visibles'] / 2) - 1);
			
			if ($paginas_ <= $paginas['Visibles']) {
				$pagina_inicial = 1;
				$pagina_final = $paginas_;	
			} else {
				if ($pagina_inicial < 1) { 
					$pagina_inicial = 1; 
					$pagina_final = $pagina_inicial + ($paginas['Visibles'] - 1); 
				}
				
				if ($pagina_final > $paginas_) {
					$pagina_final = $paginas_;
					if (($pagina_inicial - ceil(($paginas['Visibles'] / 2) - 1)) > 0) { 
						$pagina_inicial -= ceil(($paginas['Visibles'] / 2) - 1);
						
						for ($i = 1; $i < 10; $i ++) {
							if (($pagina_final - $pagina_inicial) > ($paginas['Visibles'] - 1)) { $pagina_inicial ++; }
							else { break; }
						}
					}
				}
			}
			
			// para calcular el ancho de los divs
			$medida = (20 * ($pagina_final - $pagina_inicial + 1));
			
			if ($pagina_inicial > 1) { $medida += 20; }
			if ($pagina_final < $paginas) { $medida += 20; }
			
			// = = = = = = = = = = = = = = = = = = = = = = = = = = = 
				
				// caracteres antes de la paginacion, pueden ser ...
				if ($pagina_inicial > 1 && $paginas['Prefijo']) { 
					$htmlPaginas .= '<span style="padding-right:2px;" class="'.$paginas['Class'].'">'.$paginas['Prefijo'].'</span>';
				}
				
				for ($i = $pagina_inicial; $i <= $pagina_final; $i ++) {
				
					// numeros de paginas
					if ($i == $pagina) { 
						// pagina actual
						$htmlPaginas .= '<span style="padding-right:2px; padding-left:2px;"><a href="javascript:'.$paginas['funcion'].'('.$i.')" class="'.$paginas['ActClass'].'">'.$i.'</a></span>';
					} else { 
						// otras paginas
						$htmlPaginas .= '<span style="padding-right:2px; padding-left:2px;"><a href="javascript:'.$paginas['funcion'].'('.$i.')" class="'.$paginas['Class'].'">'.$i.'</a></span>';
						
					}
					
				}
				
				// caracteres despues de la paginacion, pueden ser ...
				if ($pagina_final < $paginas_ && $paginas['Sufijo']) { 
					$htmlPaginas .= '<span style="padding-left:2px;" class="'.$paginas['Class'].'">'.$paginas['Sufijo'].'</span>';
				}


			$htmlPaginas .='</td">';
			// = = = = = = = = = = = = = = = = = = = = = = = = = = = 

		// - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
		
		// letrero o flecha de siguiente
		if ($paginas_ > $pagina) {
			// puede dar click
			$htmlPaginas .= '<td width="40" height="35" align="left" valign="middle"><a href="javascript:'.$paginas['funcion'].'('.($pagina+1).')" ><img src="'.$paginas['ImgSigAct'].'"  border="0" style="padding-left:10px;" /></a></td>';
		} else {
			// no puede dar click
			$htmlPaginas .= '<td width="40" height="35" align="left" valign="middle"><img src="'.$paginas['ImgSigDes'].'"  border="0" style="padding-left:10px;" /></td>'; 
		}
	
	$htmlPaginas .= '</tr></table>';
	return $htmlPaginas;
	
}	


function htmlPaginasLista2($sql,$paginas,$link){

	$sqlNumReg  = "SELECT COUNT(*) AS totReg " ;
	$sqlNumReg .= " FROM   "   .$sql["From"];
	$sqlNumReg .= " "          .$sql["LJoin"];
	
	if ($sql["Where"]) {
		$sqlNumReg .= " WHERE ".$sql["Where"];
	} else {
		$sqlNumReg .= " ".$sql["Where"];
	}
	//echo $sqlNumReg;
	$resul = mysql_query($sqlNumReg,$link);
	
	$registros = mysql_result($resul,'0','totReg');
	
	// -----------------------------
	// inicio de paginacion
	$inicio = (($paginas["pagina"] - 1) * $paginas["tamPagina"]);
	
	// pagina actual
	$pagina = $paginas["pagina"];
	
	// numero total de paginas
	$paginas_ = ceil($registros / $paginas["tamPagina"]);
	// -----------------------------
	
		$htmlPaginas = '<table width="100%" border="0" cellpadding="0" cellspacing="0"><tr>';

		// letrero o flecha de anterior
		if ($pagina > 1) {
			// puede dar click
			$htmlPaginas .= '<td width="40" height="35" align="right" valign="middle"><a href="javascript:'.$paginas['funcion'].'('.($pagina-1).')" ><img src="'.$paginas['ImgAntAct'].'"  border="0" style="padding-right:10px;" /></a></td>';
			$htmlPaginas .= '<td style="font-size:1px; background-color:#000; width:1px;">&nbsp;</td>';
		} else {
			// no puede dar click
			$htmlPaginas .= '<td width="40" height="35" align="right" valign="middle"><img src="'.$paginas['ImgAntDes'].'"  border="0" style="padding-right:10px;" /></td>';
			$htmlPaginas .= '<td style="font-size:1px; background-color:#000; width:1px;">&nbsp;</td>';
		}
		
		// - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
			$htmlPaginas .='<td align="center" valign="middle">';
			
			$pagina_inicial = $pagina - ceil(($paginas['Visibles'] / 2) - 1);
			$pagina_final = $pagina + ceil(($paginas['Visibles'] / 2) - 1);
			
			if ($paginas_ <= $paginas['Visibles']) {
				$pagina_inicial = 1;
				$pagina_final = $paginas_;	
			} else {
				if ($pagina_inicial < 1) { 
					$pagina_inicial = 1; 
					$pagina_final = $pagina_inicial + ($paginas['Visibles'] - 1); 
				}
				
				if ($pagina_final > $paginas_) {
					$pagina_final = $paginas_;
					if (($pagina_inicial - ceil(($paginas['Visibles'] / 2) - 1)) > 0) { 
						$pagina_inicial -= ceil(($paginas['Visibles'] / 2) - 1);
						
						for ($i = 1; $i < 10; $i ++) {
							if (($pagina_final - $pagina_inicial) > ($paginas['Visibles'] - 1)) { $pagina_inicial ++; }
							else { break; }
						}
					}
				}
			}
			
			// para calcular el ancho de los divs
			$medida = (20 * ($pagina_final - $pagina_inicial + 1));
			
			if ($pagina_inicial > 1) { $medida += 20; }
			if ($pagina_final < $paginas) { $medida += 20; }
			
			// = = = = = = = = = = = = = = = = = = = = = = = = = = = 
				
				// caracteres antes de la paginacion, pueden ser ...
				if ($pagina_inicial > 1 && $paginas['Prefijo']) { 
					$htmlPaginas .= '<span style="padding-right:2px;" class="'.$paginas['Class'].'">'.$paginas['Prefijo'].'</span>';
				}
				
				for ($i = $pagina_inicial; $i <= $pagina_final; $i ++) {
				
					// numeros de paginas
					if ($i == $pagina) { 
						// pagina actual
						$htmlPaginas .= '<span style="padding-right:2px; padding-left:2px;"><a href="javascript:'.$paginas['funcion'].'('.$i.')" class="'.$paginas['ActClass'].'" style="color:#FFF; font-size:12px">'.$i.'</a></span>';
					} else { 
						// otras paginas
						$htmlPaginas .= '<span style="padding-right:2px; padding-left:2px;"><a href="javascript:'.$paginas['funcion'].'('.$i.')" class="'.$paginas['Class'].'" style="color:#575757; font-size:12px">'.$i.'</a></span>';
						
					}
					
				}
				
				// caracteres despues de la paginacion, pueden ser ...
				if ($pagina_final < $paginas_ && $paginas['Sufijo']) { 
					$htmlPaginas .= '<span style="padding-left:2px;" class="'.$paginas['Class'].'">'.$paginas['Sufijo'].'</span>';
				}


			$htmlPaginas .='</td">';
			// = = = = = = = = = = = = = = = = = = = = = = = = = = = 

		// - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
		
		// letrero o flecha de siguiente
		if ($paginas_ > $pagina) {
			// puede dar click
			$htmlPaginas .= '<td style="font-size:1px; background-color:#000; width:1px;">&nbsp;</td>';
			$htmlPaginas .= '<td width="40" height="35" align="left" valign="middle"><a href="javascript:'.$paginas['funcion'].'('.($pagina+1).')" ><img src="'.$paginas['ImgSigAct'].'"  border="0" style="padding-left:10px;" /></a></td>';
		} else {
			// no puede dar click
			$htmlPaginas .= '<td style="font-size:1px; background-color:#000; width:1px;">&nbsp;</td>';
			$htmlPaginas .= '<td width="40" height="35" align="left" valign="middle"><img src="'.$paginas['ImgSigDes'].'"  border="0" style="padding-left:10px;" /></td>'; 
		}
	
	$htmlPaginas .= '</tr></table>';
	return $htmlPaginas;
	
}
	
	
?>

