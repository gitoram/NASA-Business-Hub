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
<!-- Sinaloa -->
<div class="ContUltimasNot">
	<div class="itemTitUltima">SINALOA</div>
    <div class="itemImgUltima"><a href="publicacion.php?publicacion=<?=$row["UrlAlias"];?>"><img src="imagen.php?archivo=<?=$row["ArchivoImagen"];?>&tipo=1&medida=17" /></a></div>
    <div class="itemSubTitUltima"><?=$row["Titulo"];?></div>
    <div style="height:20px; padding-top:5px; text-align:center; float:left;">
     	<a href="publicacion.php?publicacion=<?=$row["UrlAlias"];?>"><div class="itemBtnUlt">Ver Noticia</div></a>
    </div>
    <div class="itemListaNot">
    	<a href="publicacion.php?publicacion=<?=$row["UrlAlias"];?>"><div class="contElemUltNot" style=" margin-left:5px; width:95%;">
            <span class="sepUltNot">--</span>
            <span class="textUltNot"><?=$row["Titulo"];?></span>
        </div></a>
        
    	<div class="sepLista">
        </div>
       <a href="publicacion.php?publicacion=<?=$row["UrlAlias"];?>"><div class="contElemUltNot" style=" margin-left:5px; width:95%;">
            <span class="sepUltNot">--</span>
            <span class="textUltNot"><?=$row["Titulo"];?></span>
        </div></a>
        <div class="sepLista">
        </div>
         <a href="publicacion.php?publicacion=<?=$row["UrlAlias"];?>"><div class="contElemUltNot"  style=" margin-left:5px; width:95%;">
            <span class="sepUltNot">--</span>
            <span class="textUltNot"><?=$row["Titulo"];?></span>
        </div></a>
</div>
</div>
<div class="sepbarra">
&nbsp;
</div>


<!-- MUNDO -->
<div class="ContUltimasNot">
	<div class="itemTitUltima">MUNDO</div>
    <div class="itemImgUltima"><a href="publicacion.php?publicacion=<?=$row["UrlAlias"];?>"><img src="imagen.php?archivo=<?=$row["ArchivoImagen"];?>&tipo=1&medida=17" /></a></div>
    <div class="itemSubTitUltima"><?=$row["Titulo"];?></div>
    <div style="height:20px; padding-top:5px; text-align:center; float:left;">
     	<a href="publicacion.php?publicacion=<?=$row["UrlAlias"];?>"><div class="itemBtnUlt">Ver Noticia</div></a>
    </div>
    <div class="itemListaNot">
    	<a href="publicacion.php?publicacion=<?=$row["UrlAlias"];?>"><div class="contElemUltNot" style=" margin-left:5px; width:95%;">
            <span class="sepUltNot">--</span>
            <span class="textUltNot"><?=$row["Titulo"];?></span>
        </div></a>
        
    	<div class="sepLista">
        </div>
       <a href="publicacion.php?publicacion=<?=$row["UrlAlias"];?>"><div class="contElemUltNot" style=" margin-left:5px; width:95%;">
            <span class="sepUltNot">--</span>
            <span class="textUltNot"><?=$row["Titulo"];?></span>
        </div></a>
        <div class="sepLista">
        </div>
         <a href="publicacion.php?publicacion=<?=$row["UrlAlias"];?>"><div class="contElemUltNot" style=" margin-left:5px; width:95%;">
            <span class="sepUltNot">--</span>
            <span class="textUltNot"><?=$row["Titulo"];?></span>
        </div></a>
	</div>
</div>
<div class="sepbarra">
&nbsp;
</div>


<!-- DEPORTES -->
<div class="ContUltimasNot">
	<div class="itemTitUltima">DEPORTES</div>
   <div class="itemImgUltima"><a href="publicacion.php?publicacion=<?=$row["UrlAlias"];?>"><img src="imagen.php?archivo=<?=$row["ArchivoImagen"];?>&tipo=1&medida=17" /></a></div>
    <div class="itemSubTitUltima"><?=$row["Titulo"];?></div>
    <div style="height:20px; padding-top:5px; text-align:center; float:left;">
     	<a href="publicacion.php?publicacion=<?=$row["UrlAlias"];?>"><div class="itemBtnUlt">Ver Noticia</div></a>
    </div>
    <div class="itemListaNot">
    	<a href="publicacion.php?publicacion=<?=$row["UrlAlias"];?>"><div class="contElemUltNot" style=" margin-left:5px; width:95%;">
            <span class="sepUltNot">--</span>
            <span class="textUltNot"><?=$row["Titulo"];?></span>
        </div></a>
        
    	<div class="sepLista">
        </div>
       <a href="publicacion.php?publicacion=<?=$row["UrlAlias"];?>"><div class="contElemUltNot" style=" margin-left:5px; width:95%;">
            <span class="sepUltNot">--</span>
            <span class="textUltNot"><?=$row["Titulo"];?></span>
        </div></a>
        <div class="sepLista">
        </div>
         <a href="publicacion.php?publicacion=<?=$row["UrlAlias"];?>"><div class="contElemUltNot" style=" margin-left:5px; width:95%;">
            <span class="sepUltNot">--</span>
            <span class="textUltNot"><?=$row["Titulo"];?></span>
        </div></a>
</div>
</div>
<div class="sepbarra">
&nbsp;
</div>

<!-- TECNOLOGIA -->
<div class="ContUltimasNot">
	<div class="itemTitUltima">TECNOLOGIA</div>
    <div class="itemImgUltima"><a href="publicacion.php?publicacion=<?=$row["UrlAlias"];?>"><img src="imagen.php?archivo=<?=$row["ArchivoImagen"];?>&tipo=1&medida=17" /></a></div>
    <div class="itemSubTitUltima"><?=$row["Titulo"];?></div>
    <div style="height:20px; padding-top:5px; text-align:center; float:left;">
     	<a href="publicacion.php?publicacion=<?=$row["UrlAlias"];?>"><div class="itemBtnUlt">Ver Noticia</div></a>
    </div>
    <div class="itemListaNot">
    	<a href="publicacion.php?publicacion=<?=$row["UrlAlias"];?>"><div class="contElemUltNot" style=" margin-left:5px; width:95%;">
            <span class="sepUltNot">--</span>
            <span class="textUltNot"><?=$row["Titulo"];?></span>
        </div></a>
        
    	<div class="sepLista">
        </div>
       <a href="publicacion.php?publicacion=<?=$row["UrlAlias"];?>"><div class="contElemUltNot" style=" margin-left:5px; width:95%;">
            <span class="sepUltNot">--</span>
            <span class="textUltNot"><?=$row["Titulo"];?></span>
        </div></a>
        <div class="sepLista">
        </div>
         <a href="publicacion.php?publicacion=<?=$row["UrlAlias"];?>"><div class="contElemUltNot" style=" margin-left:5px; width:95%;">
            <span class="sepUltNot">--</span>
            <span class="textUltNot"><?=$row["Titulo"];?></span>
        </div></a>
</div>
</div>
<div class="sepbarra">
&nbsp;
</div>


<!-- Sinaloa -->
<div class="ContUltimasNot">
	<div class="itemTitUltima">OPORTUNIDADES</div>
    <div class="itemImgUltima"><a href="publicacion.php?publicacion=<?=$row["UrlAlias"];?>"><img src="imagen.php?archivo=<?=$row["ArchivoImagen"];?>&tipo=1&medida=17" /></a></div>
    <div class="itemSubTitUltima"><?=$row["Titulo"];?></div>
    <div style="height:20px; padding-top:5px; text-align:center; float:left;">
     	<a href="publicacion.php?publicacion=<?=$row["UrlAlias"];?>"><div class="itemBtnUlt">Ver Noticia</div></a>
    </div>
    <div class="itemListaNot">
    	<a href="publicacion.php?publicacion=<?=$row["UrlAlias"];?>"><div class="contElemUltNot" style=" margin-left:5px; width:95%;">
            <span class="sepUltNot">--</span>
            <span class="textUltNot"><?=$row["Titulo"];?></span>
        </div></a>
        
    	<div class="sepLista">
        </div>
       <a href="publicacion.php?publicacion=<?=$row["UrlAlias"];?>"><div class="contElemUltNot" style=" margin-left:5px; width:95%;">
            <span class="sepUltNot">--</span>
            <span class="textUltNot"><?=$row["Titulo"];?></span>
        </div></a>
        <div class="sepLista">
        </div>
        <a href="publicacion.php?publicacion=<?=$row["UrlAlias"];?>"><div class="contElemUltNot" style=" margin-left:5px; width:95%;">
            <span class="sepUltNot">--</span>
            <span class="textUltNot"><?=$row["Titulo"];?></span>
        </div></a>
</div>
</div>