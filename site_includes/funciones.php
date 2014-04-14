<?
error_reporting(0);
ini_set('display_errors', 0);
//:::::::::::::: VALORES GLOBALES POR DEFECTO ::::::::::::::::::::::::::
define ("SITE_TITLE", "NASA Exploration Systems Development Partner and Supplier Companies");
define ("URL_Pagina", "http://localhost/onestopshop/");
define ("URL_PaginaEst", "pagina.php");
define ("URL_Multimedia", "http://localhost/onestopshop/");
define ("URL_MultimediaUpScript", "http://localhost/onestopshop/");
//------------- Esto es para Windows --------
define ("DIR_UploadImgs",  "site_images/");
define ("DIR_UploadXmls",  "site_xmls/");
define ("DIR_UploadFiles", "site_multimedia/");
//------------------------------------------------ 
//define ("DIR_UploadImgs",  "/var/www/noroeste2012/site_images_conten/");
//define ("DIR_UploadXmls",  "/var/www/noroeste2012/site_xmls/");
//define ("DIR_UploadFiles", "/var/www/noroeste2012/site_multimedia/");

define ("DIR_ImgsPub", "imgs_publicaciones/");//Directorio para imagenes de las publicaciones
define ("DIR_ImgsGal", "imgs_galerias/");//Directorio para imagenes de las galerias
define ("DIR_ImgsVid", "imgs_videos/");//Directorio para imagenes de los videos
define ("DIR_ImgsAud", "imgs_audios/");//Directorio para imagenes de los audios
define ("DIR_ImgsSwf", "imgs_graficos/");//Directorio para imagenes de los graficos animados
define ("DIR_ImgsDoc", "imgs_documentos/");//Directorio para imagenes de los graficos animados
define ("DIR_ImgsAutor","imgs_autores/");//Directorio para imagenes de los autores


define ("DIR_ImgsStore", "imgs_store/");//Directorio para imagenes de articulos
define ("DIR_ImgsMarca", "imgs_marcas/");//Directorio para imagenes de articulos


define ("DIR_FileVid", "file_videos/");//Directorio para Archivos de video Locales
define ("DIR_FileAud", "file_audios/");//Directorio para Archivos de audio locales
define ("DIR_FileSwf", "file_graficos/");//Directorio para Archivos de graficos animados SWF
define ("DIR_FileDoc", "file_documentos/");//Directorio para los documentos PDF

define ("DIR_XmlsGral", "generales/");// Dir para guardar xmls de los bloques

define ("DIR_XmlsPub", "publicaciones/");// Dir para guardar xmls de publicaciones
define ("DIR_XmlsPubFull", "site_xmls/publicaciones/");// Dir para guardar xmls de publicaciones

define ("DIR_XmlsVid", "videos/");// Dir para guardar xmls de videos
define ("DIR_XmlsVidFull", "site_xmls/videos/");// Dir para guardar xmls de videos

define ("DIR_XmlsAud", "audios/");// Dir para guardar xmls de audios
define ("DIR_XmlsAudFull", "site_xmls/audios/");// Dir para guardar xmls de audios

define ("DIR_XmlsSwf", "graficos/");// Dir para guardar xmls de graficos
define ("DIR_XmlsSwfFull", "site_xmls/graficos/");// Dir para guardar xmls de graficos

define ("DIR_XmlsDoc", "documentos/");// Dir para guardar xmls de graficos
define ("DIR_XmlsDocFull", "site_xmls/documentos/");// Dir para guardar xmls de graficos

define ("DIR_XmlsGal", "galerias/");// Dir para guardar xmls de galerias
define ("DIR_XmlsGalFull", "site_xmls/galerias/");// Dir para guardar xmls de galerias
//::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::


//:::::::::::::::::::: Funciones ::::::::::::::::::::::::::::::::::::::::::::::::::
function addMultimediaRel($idPub,$idConten,$tipoConten,$estatus){
	include_once "class_mysql.php";
	$mysql = new mysql;
	$KeyFull = trim($idPub)."-".trim($idConten)."-".$tipoConten;
	//KeyFull 	= '".$KeyFull."',
	$com = "REPLACE publicaciones_relacion SET
			KeyPub 		= '".$idPub."',
			KeyConten 	= '".$idConten."',
			TipoConten 	= '".$tipoConten."',
			EstatusRel 	= '".$estatus."'";
	$res = $mysql->ejecutar($com,2); 		
	$res = "listo";
	return $res;
	
}

function addPublicacionRel($idPub,$idRel,$estatus){
	include_once "class_mysql.php";
	$mysql = new mysql;
	$KeyFull = trim($idPub)."-".trim($idRel);
	//KeyFull 	= '".$KeyFull."',
	$com = "REPLACE publicaciones_relacionadas SET
			KeyPub  	= '".$idPub."',
			KeyPubRel 	= '".$idRel."',
			EstatusRel  = '".$estatus."'";
	$res = $mysql->ejecutar($com,2); 		
	$res = "listo";
	return $res;
	
}

function addTaxonomia($idPub,$idTax,$tipoCont,$estatus){
	include_once "class_mysql.php";
	$mysql = new mysql;
	$KeyFull = trim($idPub)."-".trim($idTax)."-".trim($tipoCont);
	//KeyFull 	  = '".$KeyFull."',
	$com = "REPLACE taxonomia_relacion SET
			KeyPub		  = '".$idPub."',
			KeyTerm		  = '".$idTax."',
			TipoContenido = '".$tipoCont."',
			EstatusRel    = '".$estatus."'";
			
	$res = $mysql->ejecutar($com,2); 		
	$res = "listo";
	return $res;
	
}
//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

function LimpiarCadena($texto) {
   $texto = trim($texto);  
   $encontradas = array("|", "'", chr(34), "…", "ü",  "´", "¿", "<", ">");
   $cambiadas   = array("&brvbar;", "&acute;", "&quot;", "...", "&uuml;","&acute;", "&iquest;", "&lt;", "&gt;");

   $texto      = str_replace($encontradas, $cambiadas, $texto);
   return $texto;
}

/*Es para el componente del contenido*/
function LimpiarContenido($texto) {
   $texto = trim($texto);  
  
   $encontradas = array("'",);
   $cambiadas   = array("&acute;");

   $texto      = str_replace($encontradas, $cambiadas, $texto);
   return $texto;
}

/*Recibe Fecha en formato dd-mm-yyyy y la retorna yyyy-mm-dd*/
function Fecha_Mysql($fecha){
	$separado = explode("-",$fecha);
	return $separado[2]."-".$separado[1]."-".$separado[0];
}	

// detecta que navegador se esta utilizando
function detectaNavegador(){
	$strNavegador = strtoupper($_SERVER["HTTP_USER_AGENT"]);

	if (ereg("MSIE",$strNavegador)){
		$navegador= "IE";
	}
	elseif(ereg("FIREFOX",$strNavegador)){
		$navegador= "FIREFOX";
	}
	elseif(ereg("SAFARI",$strNavegador)){
		$navegador= "SAFARI";
	}
	elseif(ereg("OPERA",$strNavegador)){
		$navegador= "OPERA";
		
	}elseif(ereg("CHROME",$strNavegador)){
		$navegador= "CHROME";
	}
	
	return $navegador;
}

function limitarCadena($cadena,$tamanoCad,$fin) {
	// Inicializamos las variables 
	$tamano = $tamanoCad; // tamaño máximo 
	$contador = 0; 
	$texto = $cadena;
	
	if(strlen($texto)>$tamanoCad){
		// Cortamos la cadena por los espacios 
		$arrayTexto = explode(' ',$texto); 
		$texto = ''; 
	
		// Reconstruimos la cadena 
		while($tamano >= strlen($texto) + strlen($arrayTexto[$contador])){ 
			$texto .= ' '.$arrayTexto[$contador]; 
			$contador++; 
		} 
		return $texto.$fin; 
	}else{
		return $texto;
	}
}


/*
Recibe la fecha en formato 2012-01-02
y Genrea los directoris corresponditnes
*/
// creaDir('2012-01-15','C:/wamp/www/noroeste2012/site_xmls/','imgs_conten','full')
function creaDir($strFecha,$path,$subDir,$fDir,$dirWeb=""){
	if($fDir=="full"){ /*Con nomenglatura completa del año Ademas genera un subdirectorio*/
		$dir 	    = explode("-",$strFecha);
		$dirAnio  = $dir[0]."/"; // 2012
		$dirFinal = $dir[0].$dir[1].$dir[2]."/";// 20120101
		$dirFull  = $path.$dirAnio.$dirFinal;
		$dirFullW = $dirAnio.$dirFinal; // Dir Completo pero web
		
		if(!is_dir($path.$dirAnio)){mkdir($path.$dirAnio,0777);}
		if(!is_dir($dirFull)){mkdir($dirFull,0777);}
		if($subDir!=""){
			if(!is_dir($dirFull.$subDir)){
				mkdir($dirFull.$subDir,0777);
		  }
		}
	}else if($fDir=="corta"){/* Carpeta año abreviado y sin subdirectorio*/
		$dir 	  = explode("-",$strFecha);
		$dirAnio  = substr($dir[0], 2, 2)."/"; // 2012
		$dirFinal = substr($dir[0], 2, 2).$dir[1].$dir[2]."/";// 20120101
		$dirFull  = $path.$dirAnio.$dirFinal;
		$dirFullW = $dirAnio.$dirFinal; // Dir Completo pero web
		
		if(!is_dir($path.$dirAnio)){mkdir($path.$dirAnio,0777);}
		if(!is_dir($dirFull)){mkdir($dirFull,0777);}
		if(!is_dir($dirFull.$subDir)){mkdir($dirFull.$subDir,0777);}
		//echo $dirAnio."<br>";
		//echo $dirFinal."<br>"; 
		
	}else if($fDir=="unico_sdir"){
	 //---no genera ningun direcorio solo se asegura de que exista thumbs
	 	$dir 	  = explode("-",$strFecha);
		$dirAnio  = substr($dir[0], 2, 2)."/"; // 2012
		$dirFinal = $dirWeb; // 20120101
		$dirFull  = $path;
		$dirFullW = $dirWeb; // Dir Completo pero web
		
		if(!is_dir($path)){mkdir($path,0777);}
		if(!is_dir($path.$subDir)){mkdir($path.$subDir,0777);}
	}	
	
	$res["estatus"]    ="OK";
	$res["dirFinal"]   =$dirFinal;
	$res["dirFull"]    =$dirFull;
	$res["dirFullWeb"] =$dirFullW;
	return $res;
	
}

function borraThumbs($nomFile,$dirFull, $dirThumb){
	$dir = $dirFull.$dirThumb;
	if (is_dir($dir)) {
		if ($dh = opendir($dir)) {
			while (($file = readdir($dh)) !== false) {
				//echo "nombre archivo: ".$file.": tipo archivo: ". filetype($dir.$file)."<br/>";
				$tipo = trim(filetype($dir.$file));
				//echo $tipo."<br>";
				if($tipo =="file"){
					$nFile = "I".$file;
					$busca = strpos($nFile, $nomFile);
					//echo $nFile ." - ".$nomFile." - ".$busca."<br/>";
					//echo $dir.$file."<br/>";
					if($busca>0){
						unlink($dir.$file);//borramos el archivo
					}
				}
				
			}
			closedir($dh);
		}
	}
	return true;
}

//--borra solo los thhumbs
function borraImagenesThumbs($nomArch, $dirP, $dirT){
 // global $tamanos_fotos_ancho_h;
  $toThubms = 25;
  $separa  = explode(".",$nomArch);
  $nombArc = $separa[0];
  $exten   = $separa[1];
  
  //if(file_exists($dirP.$nombArc.".".$exten)){
  //	unlink($dirP.$nombArc.".".$exten);
	  //echo "<br>".$dirP.$nombArc.".".$exten."<br>";
  //}
  
  //borrar thumbs 
  for ($i = 1;$i <= $toThubms; ++$i) {
	  $thumb  = "";
	  $thumb = $dirP.$dirT.$nombArc."_".$i.".".$exten;
	  //echo "<br/>".$thumb."<br/>";
	  if(file_exists($thumb)){
		 unlink($thumb);
		 //echo $thumb."<br>";
	  }

}	
		
}





?>