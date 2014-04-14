<?

//:::::::::: Valores a considerar :::::::::::::::
//KeySec : 1= Noticias, 2=Tu Estado , 3=Eveventos
//KeySitio = 1
//TipoPub = PUB


//:: como invocar la funcion::

//Crar un arreglo llamado $Param con los valores dentro:

$Param["Sitio"]    = "1";
$Param["Seccion"]  = "1";
$Param["TipoPub"]  = "PUB" ;
$Param["Titulo"]   = "El Titulo";
$Param["Descripcion"] = "La descripcion";
$Param["Contenido"]   = "Este es todo el texto que va dentro del contenido";
$Param["Taxonomia"]   = "Todos,los,tags,separados,por,coma";
$Param["ArchivoImagenURL"] = "http://www.fiixcom.com/imagenes/css/slide.png";

$NuevaPub = addPublicacion($Param);


if($NuevaPub=="OK"){
	echo "Todo Bien";
}else if($NuevaPub=="Error Insert"){
	echo "No inserto";
}else if($NuevaPub=="Error Slug"){
	echo "No genero url";
}



//$Param es un Arreglo
//Fecha en formado dd-mm-yy
function addPublicacion($Param){
	
	include_once "../includes/funciones.php";
    include_once "../includes/url_slug.php";
	include_once "../includes/class_mysql.php";
	include_once "../includes/rss.php";
	
	$mysql = new mysql;
	
	$sql = "INSERT publicaciones SET
		  	KeySitio 	   = '".$Param["Sitio"]."',
		 	UserAcceso     = '".$Param["User"]."',
		  	KeySec		   = '".$Param["Seccion"]."',
		  	KeySec2 	   = '".$Param["Seccion1"]."',
		  	KeySec3		   = '".$Param["Seccion3"]."',
		  	TipoPub		= '".$Param["TipoPub"]."',
		  	URLsend		= '".$Param["URLsend"]."',
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
  //echo $sql;
  
  $res = $mysql->ejecutar($sql,2); 
  $LastID = $res;
  
   if(is_numeric($res)){
	 $Param["UserAcceso"] = "0";
	 $Param["xmlDir"]     = "";
	 $TIPO = "PUB";
	 //---1 Generamos el SLUG ------
	 $KeySitio = $Param["Sitio"];
	 $URLslug = generaSlug($Param["Titulo"],$LastID,$TIPO,"","1");
	 $Slug    = saveSlug($URLslug,$LastID,"PUB",$Param["xmlDir"],$Param["UserAcceso"],$KeySitio);
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

?>