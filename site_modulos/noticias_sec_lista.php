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


?>

<div style="overflow:hidden">
	 <? while($row = mysql_fetch_array($res)){	 ?>
        <div class="itemNoticiaC">
     	<div class="itemNoticia">
    	
           <div style="float:left; width:150px; height:80px" align="center">
			<a class="txtTit" href="publicacion.php?publicacion=<?=$row["UrlAlias"];?>" title="Ver..">
            	<img src="imagen.php?archivo=<?=$row["ArchivoImagen"];?>&tipo=1&medida=2&up=s" border="0" />
            </a>    
           </div> 
           <div style=" float:left; width:15px;">&nbsp;</div>
           
           <div style="float:left; width:460px; height:80px; text-align:left;">
                <div align="right" class="txtRes" style="font-size:11px; padding-top:0px"><?=$row["Seccion2"];?></div>
           		<div class="txtTit" style="padding-top:5px">
					<a class="txtTit" href="publicacion.php?publicacion=<?=$row["UrlAlias"];?>" title="Ver.."><?=$row["Titulo"];?></a>
                </div>
                <div class="txtDesc2" style=" overflow:hidden; padding-top:3px; height:30px"><?=$row["Descripcion"];?></div> 
           </div> 
    
    	</div>
        </div>
     
     <? } ?>
</div>