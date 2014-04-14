<?
error_reporting(0);
ini_set('display_errors', 0);
session_start();
if( !isset($_SESSION["UserAccess"]) || $_SESSION["UserAccess"]!="S" ){exit();}
//print_r($_POST);

include_once "../../site_includes/funciones.php";
include_once "../../site_includes/paginacion.php";

$Tipo 	  = $_POST["tipoConten"];
$pagina   = $_POST["pagina"];

if($_POST["strBusca"]){
	$strBusca = $_POST["strBusca"];
}else{
	$strBusca = "";
}


$rowIni   = $pagina; //-- Pagina en el que inicia la paginacion
$rowTotal = '6';   //-- total de registros a mostrar por Pagina debe se ser numero par

if ($rowIni != 1){ $rowIni = ($rowIni-1) * $rowTotal;}
else {$rowIni = 0;}

//::::::::::: Para las opciones o filtros ::::::::::::::::::::::::::::
if($_POST["sitio"]!= "" && $_POST["sitio"]!= 0){
	$sitio = " pub.KeySitio = '1'";
}else{
	$sitio = " pub.KeySitio = '1'";
}


$keyIdioma = "0";
if( isset($_COOKIE["ExpoMotoNID"]) && $_COOKIE["ExpoMotoNID"] != "" && $_COOKIE["ExpoMotoNID"] != "0"){
	$keyIdioma = $_COOKIE["ExpoMotoNID"];
}

//::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

if($strBusca != "" ){ // armamos los filtros para el where
	$strCambia = "¬strCambia¬";
	$strFiltro["strBusca"]= $strBusca ;
	$strFiltro["filtro1"] = " pub.Titulo LIKE '%".$strCambia."%' "   ;//condicion cuando es la primera palabra
	$strFiltro["filtro2"] = " OR pub.Titulo LIKE '%".$strCambia."%' ";//despues de la primera palabra
	//	$strFiltro["filtro1"] = " CONCAT_WS(' ',Titulo,Descripcion) LIKE '%".$strCambia."%' "   ;//condicion cuando es la primera palabra
	
//$filtroBusca = " ( ".strFiltrosWhere($strFiltro,$strCambia)." ) AND ".$sitio." AND pub.KeySec2 = '".$_POST["seccion"]."' AND pub.EstatusPub = 'A' ";
	$filtroBusca = " ( ".strFiltrosWhere($strFiltro,$strCambia)." ) AND ".$sitio." AND pub.EstatusPub = 'A' ";

}	else {
	
	//$filtroBusca =  $sitio." AND pub.KeySec2 = '".$_POST["seccion"]."' AND pub.EstatusPub = 'A' ";
	$filtroBusca =  $sitio." AND pub.EstatusPub = 'A' ";

}

$sql["Select"] =  "pub.IdPub AS Id, pub.Titulo AS Titulo, pub.Descripcion AS Descripcion, DATE_FORMAT(pub.Fecha,'%d-%m-%Y')AS FechaC, pub.ArchivoImagen AS ArchivoImagen, url.UrlAlias AS UrlAlias,  pubI.Titulo_Id AS TituloIdioma";
$sql["From"]   =  " publicaciones as pub ";
$sql["LJoin"]  =  " LEFT JOIN publicaciones_idiomas AS pubI ON (pubI.KeyPub = pub.IdPub AND pubI.TipoPub_Id ='PUBLICACION' AND pubI.KeyIdioma = ".$keyIdioma.") ";
$sql["LJoin"] .=  " LEFT JOIN url_alias AS url ON ( url.IdPub = pub.IdPub AND url.TipoPub = 'PUB') ";
$sql["Where"]  =  $filtroBusca;
$sql["Order"]  =  "pub.IdPub DESC";
$sql["Limit"]  =  $rowIni." , ".$rowTotal; 
//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

//Arreglocon los registros de la pagina a mostrar =========================
$rowPaginas = paginacion_lista($sql);
//=========================================================================

$paginaVer  =  $pagina;
//:::::::::::::. par apintar el paginador .:::::::::::::::::::::::::::::::::::::::::
$paginas['pagina']    	= $paginaVer;     //pagina a mostrar
$paginas['tamPagina'] 	= $rowTotal;      // total de reg por pagina 
$paginas['ActClass']  	= 'itemPagAct'; //clase pagina activa
$paginas['Class']       = 'itemPag';  //clase paginas
$paginas['funcion']     = 'buscaPub';  //funcion que manda a llamar cada pagina

$paginas['ImgAntAct']   = 'site_images/imagenes/icons/left2_act.png';//Imagen pagina Atras Activa
$paginas['ImgAntDes']   = 'site_images/imagenes/icons/left2_des.png';//Imagen pagina Atras DesActiva
$paginas['ImgSigAct']   = 'site_images/imagenes/icons/rigth2_act.png';//Imagen pagina Siguiente Activa
$paginas['ImgSigDes']   = 'site_images/imagenes/icons/rigth2_des.png';//Imagen pagina Siguiente DesActiva

$paginas['Visibles'] 	= 10; // 4 antes, 4 despues y la actual
$paginas['Prefijo'] 	= '...'; // antes
$paginas['Sufijo'] 		= '...'; // despues

$htmlPaginador = htmlPaginas($sql,$paginas);
//::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
	
?>



<?  
$n = 1;
while($row = mysql_fetch_array($rowPaginas)){ ?>

  <? if($n!= 1){?>
  	   <div style="overflow:hidden; padding-left:5px; padding-right:5px; padding-top:10px; padding-bottom:10px">
                <div style="font-size:1px; height:1px; background-color:#d9dedb">&nbsp;</div>
        </div> 
  <? }?>

  
   <div style="overflow:hidden;" align="left">

      <div style="overflow:hidden;">
           <div class="contLeft" style="width:40%; padding-right:5px; ">
                <img src="imagen.php?archivo=<?=$row["ArchivoImagen"];?>&tipo=1&medida=3&up=s" alt="<?=$row["Titulo"];?>" border="0" class="imgFull" />
            </div>
            
            <div class="contLeft" style="width:55%">
             <div style="padding-left:10px">
             <? if($keyIdioma != "0" && $row["TituloIdioma"]!= ""){?>
                <div style="padding-left:3px; padding-right:2px; padding-top:3px; font-size:15px; " class="txtTitLista"><?=limitarCadena($row["TituloIdioma"],'40',' ..');?></div>
               
                <div style="padding-top:2px;" align="right"><a href="publicacion.php?publicacion=<?=$row[UrlAlias];?>" class="txtLinkList" style="font-size:14px">More..</a></div>
                    
            <? }else { ?>
                <div style="padding-left:3px; padding-right:2px; padding-top:3px; font-size:15px;" class="txtTitLista"><?=$row["Titulo"];?></div>
                <div class="artDescS"><?=$row["Descripcion"];?></div>
               <div style="padding-top:2px;" align="right"><a href="publicacion.php?publicacion=<?=$row[UrlAlias];?>" class="txtLinkList" style="font-size:14px">Ver Mas..</a></div>
             <? }?>
			</div>
            	
           </div>
           
      </div>  

  </div>

<?  ++ $n;} ?>

<div style="padding-top:10px; padding-bottom:10px;">
    <div style="font-size:1px; height:1px; background-color:#FFF">&nbsp;</div>
</div>

<div style="overflow:hidden;">
    <div style="padding:7px" align="center"><?=$htmlPaginador;?></div>
</div>
<? 
exit();
?>

