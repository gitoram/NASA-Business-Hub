<?
	include_once "../site_includes/funciones.php";
    include_once "../site_includes/url_slug.php";
	include_once "../site_includes/class_mysql.php";
	include_once "../site_includes/rss.php";
	include_once "../site_includes/servidor.php";
	$mysql = new mysql;
//:::::::::: Valores a considerar :::::::::::::::
//KeySec : 1= Noticias, 2=Tu Estado , 3=Eveventos
//KeySitio = 1
//TipoPub = PUB


//:: como invocar la funcion::

//Crar un arreglo llamado $Param con los valores dentro:
try{

		$rss = simplexml_load_file("http://mexico.cnn.com/rss/mundo.rss"); //LEO EL RSS
			if($rss){
				echo "Se ha leido el RSS";
				$rss->registerXPathNamespace('media', "http://search.yahoo.com/mrss/"); //REGISTRO EL NAMESPACE PARA LA IMAGEN
				$i = 0;
				foreach ($rss->channel->item as $Datos){// LEO LAS PUBLICACIONES DE LOS RSS
					$link = utf8_decode($Datos->link);
					$Param["Sitio"]    = "1";
					$Param["Seccion"]  = "1";
					$Param["TipoPub"]  = "PUB";
					$Param["User"] = "1";
					$Param["Titulo"]   =  $Datos->title;
					$Param["Descripcion"] = $Datos->description;
					foreach($Datos->enclosure as $ima){
						$Param["ArchivoImagenUrl"] = utf8_decode($ima['url']);	
					}
					
					$context = stream_context_create(array('http' => array('timeout' => 100)));
					$url = file_get_contents(trim($link), 0, $context);
					$doc = new DOMDocument();
					libxml_use_internal_errors(true);// seccion que se encarga de extraer el contenido del codigo html de la url 
					$doc->loadHTML($url);
					$Param["Contenido"] = stripcslashes(nl2br($doc->getElementById('cambiarFuente')->nodeValue));
					//echo htmlspecialchars($Param["Contenido"];)
					//echo stripcslashes(nl2br($doc->getElementById('cambiarFuente')->nodeValue));
					$Param["Taxonomia"] = "";
					$metadatos = $Datos->category;
					$elementos = count($metadatos);
					$a=0;
					while($a < $elementos){  // Seccion que agrega los tags que se encuentran como category en el xml
						 $Param["Taxonomia"] .= $metadatos[$a].",";
						$a++;	
					}
					 $Param["Taxonomia"] .= "mundo";
					$fechaPub = $Datos->fecha_efectiva;
					$Param["fechaRss"] = $fechaPub;
					$sql = "Select idRss, idPub from publicaciones
						where fechaRss = '".$fechaPub."' and via ='CNN'";
					echo $sql;
					
					try{
						$sqlresultado = $mysql->ejecutar($sql,1); // BUSCO PUBLICACIONES DUPLICADAS
						$reg = mysql_fetch_object($sqlresultado);
						$retorno = mysql_num_rows($sqlresultado);
						
						if($retorno != 0){ // SI NO HAY PUBLICACIONES DUPLICADAS LAS GUARDO EN LA BD
							
							//Esta publicacion ya fue agregada
							echo "Duplicada";
							echo "<br />";
							
						}
						else{
								
							//echo "No se encontraron coincidencias en la bd";
							$nombreImagen = "CNN_World_".date("YmdHis").".jpg"; // Nombre con el que se guardara la imagen
							$directorio = ".\site_images\imgs_publicaciones\\";
							$pagina = "http://".$servidor."/newsize.php?ruta=".$Param[ArchivoImagenUrl]."&ancho=960&alto=400&dir=".$directorio.$nombreImagen;
			
			//				echo $pagina;
							$page = file_get_contents($pagina);
							$Param["ArchivoImagen"] = $nombreImagen;
							$NuevaPub = addPublicacion($Param);
							if($NuevaPub=="OK"){
								echo "Todo Bien";
							}else if($NuevaPub=="Error Insert"){
								echo "No inserto";
							}else if($NuevaPub=="Error Slug"){
								echo "No genero url";
							}
							echo "Proceso Completo";
							echo "<br />";
						}
						
					}
					catch(Exception $e1){
						echo "Se produjo un error al buscar una duplicidad en la publicacion ".$e1;
					}
					
					
					echo $retorno;
					
					if($i >= 15){ //Numero de publicaciones que va a leer el proceso
						break;	
					}
					$i++;
				}
				
				
	
			}
	}
	catch(Exception $e){
		echo "Se ha producido un error al leer el RSS ".$e;
		
	}
	
			
function addPublicacion($Param){
	
	
	$mysql = new mysql;
	
	$sql = "INSERT publicaciones SET
		  	KeySitio 	   = '".$Param["Sitio"]."',
		 	UserAcceso     = '".$Param["User"]."',
		  	KeySec		   = '".$Param["Seccion"]."',
		  	KeySec2 	   = '0',
		  	KeySec3		   = '0',
		  	TipoPub		= '".$Param["TipoPub"]."',
		  	URLsend		= '',
		  	Fecha 		= NOW(),
		  	FechaPub 	= NOW(),
		  	Hora	 	= CURRENT_TIME(),
		  	Titulo 		= '".LimpiarCadena($Param["Titulo"])."',
		  	Descripcion	= '".LimpiarCadena($Param["Descripcion"])."',
		  	Contenido	= '".LimpiarContenido($Param["Contenido"])."',
		  	Tematica	= '".LimpiarCadena("Mundo Noticias")."',
		  	KeyAutor	= 'SinaloaBot',
		  	Fuente		= '".LimpiarCadena("CNN")."',
			via			= 'CNN',
			fechaRss 	= '".$Param["fechaRss"]."',
		  	FechaAdd	= NOW(),
		  	KeyUserAdd	= '1',
		  	Taxonomia  	= '".LimpiarCadena($Param["Taxonomia"])."', 
		  	ArchivoImagenURL = '".$Param["ArchivoImagenUrl"]."',
			ArchivoImagen = '".$Param["ArchivoImagen"]."',
		  	EstatusPub	= 'A'";
 // echo $sql;
  /* 
  	Fecha 		= '".Fecha_Mysql($Param["Fecha"])."',
		  	FechaPub 	= '".Fecha_Mysql($Param["FechaPub"])."',
		  	FechaFin	= '".Fecha_Mysql($Param["FechaFin"])."',
		  	Hora	 	= '".$Param["Hora"]."',
		  	Titulo 		= '".LimpiarCadena($Param["Titulo"])."',
		  	Descripcion	= '".LimpiarCadena($Param["Descripcion"])."',
		  	Contenido	= '".LimpiarContenido($Param["Contenido"])."',
		  	Tematica	= '".LimpiarCadena($Param["Tematica"])."',
		  	KeyAutor	= '".$Param["Autor"]."',
		  	Fuente		= '".LimpiarCadena($Param["Fuente"])."',
		  	FechaAdd	= NOW(),
		  	KeyUserAdd	= '".$Param["userID"]."',
		  	Taxonomia  	= '".LimpiarCadena($Param["Taxonomia"])."', 
		  	ArchivoImagenURL = '".$Param["ArchivoImagenURL"]."',
		  	EstatusPub	= 'A'";
  */
  
  $res = $mysql->ejecutar($sql,2); 
  $LastID = $res;
  //echo "Ya se genero la consulta, falta el slug";
  
  try{
	  
   if(is_numeric($res)){
	 $Param["UserAcceso"] = "0";
	 $Param["xmlDir"]     = "";
	 $TIPO = "PUB";
	// echo "Se agregaron datos al Parametro";
	 //---1 Generamos el SLUG ------
	 $KeySitio = $Param["Sitio"];
	 $URLslug = generaSlug($Param["Titulo"],$LastID,$TIPO,"","1");
	 echo "Slug Generado ".$URLslug." ".$LastID."";
	$Slug    = saveSlug($URLslug,$LastID,"PUB",$Param["xmlDir"],$Param["UserAcceso"],$KeySitio);
	//$Slug    = saveSlug($URLslug,$LastID,"PUB",'','1','1');

	 echo "Slug Guardado";
	 //------------------------------------------------------------------------ 
	 //escribeRSS("PUB");
	 
	 if($Slug=="slug"){
		 $resp = "OK";
		 return $resp;
	 }else{
		 $resp = "Error Slug";
		 return $resp;
	 }
	 
	 
   }else{
	   $resp = "Error Insert";
	   return $resp;
  }
  }
  catch(Exception $e2){
	echo "Error al generar la URL";  
  }
}

?>