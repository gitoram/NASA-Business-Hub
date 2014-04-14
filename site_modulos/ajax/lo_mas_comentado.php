<?
include_once "../../site_includes/class_mysql.php";
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


<div class="MasVisto">
	<div class="MasVistoElemento1" >
    	<div class="MasVistoEsquinero">
       		<div class="MasVistoNumero">1</div>
            <div class="MasVistoSep"></div>
            <div class="MasVistoSec">TECNOLOGIA</div>
        </div>
         <a href="publicacion.php?publicacion=<?=$row["UrlAlias"];?>"><div class="MasVistoPub">
            	<div class="MasVistoImg"><img src="imagen.php?archivo=<?=$row["ArchivoImagen"];?>&tipo=1&medida=21" /></div>
                <div class="MasVistoTitulo1"><?=$row["Titulo"];?></div>
        </div></a>
    </div>
    <div class="MasVistoElemento2" >
    	<div class="MasVistoEsquinero">
       		<div class="MasVistoNumero">1</div>
            <div class="MasVistoSep"></div>
            <div class="MasVistoSec">TECNOLOGIA</div>
        </div>
         <a href="publicacion.php?publicacion=<?=$row["UrlAlias"];?>"><div class="MasVistoPub">
            	<div class="MasVistoImg"><img src="imagen.php?archivo=<?=$row["ArchivoImagen"];?>&tipo=1&medida=21" /></div>
                <div class="MasVistoTitulo1"><?=$row["Titulo"];?></div>
        </div></a>
    </div>
    <div class="MasVistoElemento3" >
    	<div class="MasVistoEsquinero">
       		<div class="MasVistoNumero">1</div>
            <div class="MasVistoSep"></div>
            <div class="MasVistoSec">TECNOLOGIA</div>
        </div>
         <a href="publicacion.php?publicacion=<?=$row["UrlAlias"];?>"><div class="MasVistoPub">
            	<div class="MasVistoImg"><img src="imagen.php?archivo=<?=$row["ArchivoImagen"];?>&tipo=1&medida=21" /></div>
                <div class="MasVistoTitulo1"><?=$row["Titulo"];?></div>
        </div></a>
    </div>
    <div class="MasVistoElemento4" >
    	<div class="MasVistoEsquinero">
       		<div class="MasVistoNumero">1</div>
            <div class="MasVistoSep"></div>
            <div class="MasVistoSec">TECNOLOGIA</div>
        </div>
         <a href="publicacion.php?publicacion=<?=$row["UrlAlias"];?>"><div class="MasVistoPub">
            	<div class="MasVistoImg"><img src="imagen.php?archivo=<?=$row["ArchivoImagen"];?>&tipo=1&medida=21" /></div>
                <div class="MasVistoTitulo2"><?=$row["Titulo"];?></div>
        </div></a>
    </div>
    <div class="MasVistoElemento5" >
    	<div class="MasVistoEsquinero">
       		<div class="MasVistoNumero">1</div>
            <div class="MasVistoSep"></div>
            <div class="MasVistoSec">TECNOLOGIA</div>
        </div>
         <a href="publicacion.php?publicacion=<?=$row["UrlAlias"];?>"><div class="MasVistoPub">
            	<div class="MasVistoImg"><img src="imagen.php?archivo=<?=$row["ArchivoImagen"];?>&tipo=1&medida=21" /></div>
                <div class="MasVistoTitulo2"><?=$row["Titulo"];?></div>
        </div></a>
    </div>
</div>