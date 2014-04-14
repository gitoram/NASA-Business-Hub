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
<div class="headColumna">COLUMNAS</div>
<div class="imgColumna">
	<div style="height:280px; width:390px; "><img src="imagen.php?archivo=<?=$row["ArchivoImagen"];?>&tipo=1&medida=18" /></div>
    <div class="divColumna">
    	
        <div class="textoDivCol"><?=$row["Titulo"];?> asdkfj aksd jff aksdjf asdf asd a asdfasdfasdf asdf asdf asdf</div>
        <a href="publicacion.php?publicacion=<?=$row["UrlAlias"];?>"><div class="BtnCol">Leer Columna</div></a>
    </div>
</div>
<div class="sepList" style="width:90%; float:left; margin-left:20px; margin-top:10px;"></div>
<div class="temaColumna">
	<div class="imgTemaColumna"><img src="imagen.php?archivo=<?=$row["ArchivoImagen"];?>&tipo=1&medida=19" /></div>
    <div class="contTemaColumna">
    	<div class="titTemaColumna"><?=$row["Titulo"];?> asdkfj aksd jff aksdjf asdf asd a asdfasdfasdf asdf asdf asdf</div>
        <a href="publicacion.php?publicacion=<?=$row["UrlAlias"];?>"><div class="BtnColNegro">Leer Columna</div></a>
    </div>
</div>
<div class="sepList" style="width:90%; float:left; margin-left:20px;"></div>
<div class="temaColumna">
	<div class="imgTemaColumna"><img src="imagen.php?archivo=<?=$row["ArchivoImagen"];?>&tipo=1&medida=19" /></div>
    <div class="contTemaColumna">
    	<div class="titTemaColumna"><?=$row["Titulo"];?> asdkfj aksd jff aksdjf asdf asd a asdfasdfasdf asdf asdf asdf</div>
        <a href="publicacion.php?publicacion=<?=$row["UrlAlias"];?>"><div class="BtnColNegro">Leer Columna</div></a>
    </div>
</div>