<?
include_once "site_includes/class_mysql.php";
$mysql = new mysql;

$sql = "SELECT pub.IdPub AS IdPub, pub.Titulo AS Titulo, pub.Descripcion AS Descripcion, pub.ArchivoImagen AS ArchivoImagen, UrlAlias,
		DATE_FORMAT(FechaPub,'%d-%m-%Y') AS FechaPub, Tematica,sec.Seccion AS Seccion, sec2.Seccion2 AS Seccion2
		FROM publicaciones AS pub
		LEFT JOIN url_alias AS url ON ( url.IdPub = pub.IdPub AND url.TipoPub = 'PUB')
		LEFT JOIN cat_secciones AS sec ON (sec.IdSec = pub.KeySec)
		LEFT JOIN cat_secciones2 AS sec2 ON (sec2.IdSec2=pub.KeySec2)
		WHERE EstatusPub = 'A' ORDER BY IdPub DESC LIMIT 5,5";
		//AND KeySec2 = '1' 
$res = $mysql->ejecutar($sql,1);	
$row = mysql_fetch_array($res);


$KeySec2[1]= "1";
$TitSec2[1]= "SINALOA";

$KeySec2[2]= "2";
$TitSec2[2]= "EL MUNDO";

$KeySec2[3]= "3";
$TitSec2[3]= "DEPORTES";

$KeySec2[4]= "4";
$TitSec2[4]= "TECNOLOGIA";

$KeySec2[5]= "4";
$TitSec2[5]= "OPORTUNIDADES";

?>
<link href='http://fonts.googleapis.com/css?family=Sniglet' rel='stylesheet' type='text/css'>
<!-- Sinaloa -->

<? //::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: ?> 
<? for($n=1; $n <= count($KeySec2); ++$n){ //----------------Ciclo principal por seccion -------------
	
	$sql = "SELECT pub.IdPub AS IdPub, pub.Titulo AS Titulo, pub.Descripcion AS Descripcion, pub.ArchivoImagen AS ArchivoImagen, UrlAlias,
		   pub.TipoPub AS TipoPub,(SELECT Seccion2 FROM cat_secciones2 WHERE IdSec2 = pub.KeySec2) AS Seccion, pub.URLSend AS URLSend
		   FROM publicaciones AS pub	
		   LEFT JOIN url_alias AS url ON ( url.IdPub = pub.IdPub AND url.TipoPub = 'PUB')
		   WHERE pub.KeySec2 = '".$KeySec2[$n]."' AND EstatusPub = 'A' ORDER BY IdPub DESC LIMIT 4";		
          $res = $mysql->ejecutar($sql,1);
	$i=1;	
	unset($IdPub);  
	unset($Titulo);
	unset($Descripcion);
	unset($ArchivoImagen);
	unset($UrlPub);
	
	while($row = mysql_fetch_array($res)){ 
	
		$IdPub[$i]         = $row["IdPub"];
		$Titulo[$i]        = $row["Titulo"];
		$Descripcion[$i]   = $row["Descripcion"];
		$ArchivoImagen[$i] = $row["ArchivoImagen"];
		$Seccion2[$i]      = $row["Seccion"];
		
		 if($row["TipoPub"]== "URL" && $row["URLSend"]!= "URL"){
			$UrlPub[$i] = $row["URLSend"];
		 }else{
			$UrlPub[$i] = "publicacion.php?publicacion=".$row["UrlAlias"];
		 }
		 
		 ++$i;
	}	  

?>
<div class="ContUltimasNot">
	<div class="itemTitUltima"><?=$TitSec2[$n]?></div>
    <div class="itemImgUltima"><a href="<?=$UrlPub[1];?>"><img src="imagen.php?archivo=<?=$ArchivoImagen[1];?>&tipo=1&medida=17" /></a></div>
    <div class="itemSubTitUltima"><?=limitarCadena($Titulo[1],65," ..");?></div>
    <div style="height:20px; padding-top:5px; text-align:center; float:left;">
     	<a href="publicacion.php?publicacion=<?=$UrlPub[1];?>"><div class="itemBtnUlt">Ver Noticia</div></a>
    </div>
    <div class="itemListaNot">
    	
        <? 
		//;;;;;;; Noticias titulos ;;;;;;;;;;;;;;;;;;;;;
		for($p=2; $p<= count($IdPub); ++$p){
		?> 
         <a href="<?=$UrlPub[$p];?>">
         <div class="contElemUltNot" style=" margin-left:5px; width:95%;">
            <span class="sepUltNot">--</span>
            <span class="textUltNot"><?=limitarCadena($Titulo[$p],50," ..");?></span>
         </div>
         </a>
         <? if($p < count($IdPub)) {?>
    	 <div class="sepLista">&nbsp;</div>
         <? }?>
        
        <?
		}
		//;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;
		?>
        
        
        
	</div>
</div>
	<? if($n < count($KeySec2)){?>
    <div class="sepbarra">&nbsp;</div>
    <? }?>

<? } // --------------------- Ciclo principal por seccion ---------------------------- ?>

<? //::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: ?>
