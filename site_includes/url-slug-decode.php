<?
session_start();
// Funciones necesarias para Decodificar la URLSlug

$preStr[1]	=	"publicacion.php";
$preStr[2]	=	"fotogaleria.php";
$preStr[3]	=	"videogaleria.php";
$preStr[4]	=	"audio.php";
$preStr[5]	=	"documento.php";
$preStr[6]	=	"grafico-animado.php";
$preStr[7]	=	"pagina.php";
$preStr[8]	=	"motooutletshow.php";



function decodeSlug($strSlug){
	global $preStr;	
	
	//1-- que tipo de pagina es
	$arrSlug = explode("-",$strSlug);
	$nS = $arrSlug[0];
	$datSlug["urlPag"]= $preStr[$nS];
	
	//2-- El Id de la publicacion
	//echo count($arrSlug);
	$nL = count($arrSlug)-1;
	$strParam = $arrSlug[$nL];
	$longitud = strlen($strParam);
	$strParam = trim(substr($strParam,6,$longitud));
	
	$datSlug["paramPag"]= $strParam ;
	
	return $datSlug;
}


function directNotFound(){
	$host = $_SERVER['HTTP_HOST'];
	$url = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	header("Location:http://".$host.$url."/not-found.php");	
}


function getKeywords($Id,$Tipo){
	include_once "class_mysql.php";
	$mysql = new mysql;
	$Keywords = "";
		
	$sql = "SELECT KeyTerm, Termino
			FROM taxonomia_relacion
			LEFT JOIN taxonomia_terminos ON(IdT = KeyTerm)
			WHERE KeyPub = '".$Id."' AND TipoContenido ='".$Tipo."' AND EstatusRel = 'A'";
			
	$res = $mysql->ejecutar($sql,1);	
	
	while($row = mysql_fetch_array($res)){ 	
		$Keywords .= trim($row["Termino"]).",";
	}
	
	$Keywords .= "Fiixcom Soluciones";
	return $Keywords ;
			
}


?>