<? 

function escribeRSS($Tipo){
	include_once "class_mysql.php";
	$mysql = new mysql;
	$RSSpath = "../../../rss/";
	$SrcImg  = "http://www.expomoto.com.mx/site/imagen.php?archivo=";
	
	$FileName = "rss.xml";
	
	if($Tipo == "PUB"){
		$sql = "SELECT pub.IdPub AS IdPub, pub.Titulo AS Titulo, pub.Descripcion AS Descripcion, pub.Contenido AS Contenido, 
				DATE_FORMAT(pub.Fecha,'%d-%m-%Y') AS Fecha,DATE_FORMAT(pub.Fecha,'%W, %d %M %Y') AS FechaPub, pub.ArchivoImagen AS  Imagen,
				url.UrlAlias AS Url
				FROM publicaciones AS pub
				LEFT JOIN url_alias AS url ON(url.IdPub = pub.IdPub AND url.TipoPub = 'PUB')
				WHERE pub.KeyGrupoHome = '1' AND pub.EstatusPub = 'A' ORDER BY IdPub DESC LIMIT 10";
		
        $Url     = "http://www.expomoto.com.mx/site/publicacion.php?publicacion=";		
		$FileName  = "noticias.xml";
		$ImgT = "1";		
	}
	
	if($Tipo == "VID"){
		$sql = "SELECT pub.Id AS IdPub, pub.Titulo AS Titulo, pub.Descripcion AS Descripcion, pub.StrVideo AS Contenido, 
				DATE_FORMAT(pub.Fecha,'%d-%m-%Y') AS Fecha,DATE_FORMAT(pub.Fecha,'%W, %d %M %Y') AS FechaPub, pub.ArchivoImagen AS  Imagen,
				url.UrlAlias AS Url
				FROM conten_videos AS pub
				LEFT JOIN url_alias AS url ON(url.IdPub = pub.Id AND url.TipoPub = 'VID')
				WHERE pub.Estatus = 'A' ORDER BY pub.Id DESC LIMIT 10";
		
        $Url     = "http://www.expomoto.com.mx/site/videogaleria.php?publicacion=";		
		$FileName  = "videos.xml";	
		$ImgT = "3";		
	}
	
   if($Tipo == "GAL"){
		$sql = "SELECT pub.Id AS IdPub, pub.Titulo AS Titulo, pub.Descripcion AS Descripcion, 
				DATE_FORMAT(pub.Fecha,'%d-%m-%Y') AS Fecha,DATE_FORMAT(pub.Fecha,'%W, %d %M %Y') AS FechaPub, fot.ArchivoImagen AS  Imagen,
				url.UrlAlias AS Url
				FROM conten_galerias AS pub
				LEFT JOIN url_alias AS url ON(url.IdPub = pub.Id AND url.TipoPub = 'GAL')
				LEFT JOIN conten_galerias_fotos AS fot ON(fot.KeyOrigen = pub.Id AND fot.EstatusFoto = 'A')
				WHERE pub.Estatus = 'A' GROUP BY fot.KeyOrigen ORDER BY pub.Id DESC, fot.Posicion ASC  LIMIT 10";
		
		$Url     = "http://www.expomoto.com.mx/site/fotogaleria.php?publicacion=";		
		$FileName  = "galerias.xml";
		$ImgT = "2";			
	}
	
	 $res = $mysql->ejecutar($sql,1); 
	 
	 
	 
	 $dirArc = $RSSpath.$FileName;
	 $archivo = fopen($dirArc,"w");

	 $strArchivo  = '<?xml version="1.0" encoding="ISO-8859-1"?>'.chr(13).chr(10);
	 $strArchivo .= '<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/">'.chr(13).chr(10);
	 $strArchivo .= '<channel>'.chr(13).chr(10);		
	 
	 $strArchivo .= '<title>Expo Moto</title>'.chr(13).chr(10);
	 $strArchivo .= '<link>http://www.expomoto.com.mx/</link>'.chr(13).chr(10);
	 $strArchivo .= '<description>RSS Expo Moto</description>'.chr(13).chr(10);
	 $strArchivo .= '<language>es-MX</language>'.chr(13).chr(10);
	 
	 
	 while($row = mysql_fetch_array($res)){ 
		$strArchivo .= '<item>'.chr(13).chr(10);
			
			$strArchivo .= '<title><![CDATA['.utf8_decode($row["Titulo"]).']]></title>'.chr(13).chr(10);
			$strArchivo .= '<link><![CDATA['.$Url.$row["Url"].']]></link>'.chr(13).chr(10);
			$strArchivo .= '<guid isPermaLink="true">'.$Url.$row["Url"].'</guid>'.chr(13).chr(10);
			$strArchivo .= '<pubDate><![CDATA['.$row["FechaPub"].']]></pubDate>'.chr(13).chr(10);
			$strArchivo .= '<description><![CDATA['.utf8_decode($row["Descripcion"]).']]></description>'.chr(13).chr(10);
			$strArchivo .= '<author><![CDATA[Expo Moto]]></author>'.chr(13).chr(10);
			
			$strArchivo .= '<id_pub><![CDATA['.$row["IdPub"].']]></id_pub>'.chr(13).chr(10);
			$strArchivo .= '<imagen><![CDATA['.$SrcImg.$row["Imagen"]."&tipo=".$ImgT."&medida=3".']]></imagen>'.chr(13).chr(10);
		
	    $strArchivo .= '</item>'.chr(13).chr(10);
	 }
		$strArchivo .= '</channel></rss>'.chr(13).chr(10);
		fputs($archivo, $strArchivo);
		fclose($archivo);	
			
		//echo $strArchivo;
		//echo "Listo..";	
		$res = "OK";
		return $res;
	
}


?>