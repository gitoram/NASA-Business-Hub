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

?>




<link href='http://fonts.googleapis.com/css?family=Sniglet' rel='stylesheet' type='text/css'>
<div class="headColumna">VIDEOS</div>
<div style="height:270px; width:260px; float:left; margin-left:10px; overflow:hidden;">
	<div style="width:260px; height:175px; float:left;">
    	<iframe width="100%" height="100%" src="//www.youtube.com/embed/fRKg6QNLoYY" frameborder="0" allowfullscreen></iframe>
    </div>
    <div style=" width:100%; color:#666; max-height:90px; margin-top:10px;  float:left; font-weight:bold; font-size:14px; text-align:left;">Nueva Cancion de REik "Te fuiste de Aqui"</div>
</div>

<div style="height:280px; width:265px; float:left; margin-left:10px; overflow:hidden;">
	<div style="float:left; height:85px; width:130px; margin-top:2px;"><img src="imagen.php?archivo=<?=$row["ArchivoImagen"];?>&tipo=1&medida=20" /></div>
    <div style="float:left; width:3px;">&nbsp;</div>
    <div style="float:left; height:85px; width:130px; margin-top:2px;"><img src="imagen.php?archivo=<?=$row["ArchivoImagen"];?>&tipo=1&medida=20" /></div>
    <div style="float:left; height:85px; width:130px;margin-top:2px;"><img src="imagen.php?archivo=<?=$row["ArchivoImagen"];?>&tipo=1&medida=20" /></div>
    <div style="float:left; width:3px;">&nbsp;</div>
    <div style="float:left; height:85px; width:130px;margin-top:2px;"><img src="imagen.php?archivo=<?=$row["ArchivoImagen"];?>&tipo=1&medida=20" /></div>
    <div style="float:left; height:85px; width:130px;margin-top:2px;"><img src="imagen.php?archivo=<?=$row["ArchivoImagen"];?>&tipo=1&medida=20" /></div>
    <div style="float:left; width:3px;">&nbsp;</div>
    <div style="float:left; height:85px; width:130px;margin-top:2px;"><img src="imagen.php?archivo=<?=$row["ArchivoImagen"];?>&tipo=1&medida=20" /></div>
</div>