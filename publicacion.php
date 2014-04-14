<?
session_start();
$_SESSION["UserAccess"]= "S";
include_once "site_includes/funciones.php";
include_once "site_includes/url-slug-decode.php";

$script = $_SERVER['PHP_SELF'];
$path_info = pathinfo($script);
$fileLoad = $path_info['basename'];

if(isset($_GET["publicacion"])&& $_GET["publicacion"]!=""){
	
	$strSlug = $_GET["publicacion"];
	$datSlug = decodeSlug($strSlug);
	//print_r($datSlug);
	//exit();
	if($datSlug["urlPag"]!= $fileLoad){
		directNotFound();
	}else{
	//---- Consultamos los datos de la BD -----------------------------
	    include_once "site_includes/class_mysql.php";
	    $mysql = new mysql;

		//::::::::: Validamos si tiene una COOKIE para Activar los Filtros :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
		$Cookie = "N";
		$Campos = "pub.IdPub AS IdPub, pub.Titulo AS Titulo, pub.Descripcion AS Descripcion, pub.ArchivoImagen AS ArchivoImagen, pub.ArchivoImagenURL AS ArchivoImagenURL, UrlAlias ";
		$LEFT_idioma = " LEFT JOIN publicaciones_idiomas AS pubI ON (pubI.KeyPub = pub.IdPub AND pubI.TipoPub_Id ='PUBLICACION' AND pubI.KeyIdioma = 0) ";
		$WHERE_idioma = "  ";
		if( isset($_COOKIE["eeNID"]) && $_COOKIE["eeNID"] != "" && $_COOKIE["eeNID"] != "0"){
			$Cookie = "S";
			$keyIdioma = $_COOKIE["eeNID"];
			$Campos = "pub.IdPub AS IdPub, pubI.Titulo_Id AS Titulo, pubI.Sumario_Id AS Descripcion, pubI.Contenido_Id AS Contenido, pub.ArchivoImagen AS ArchivoImagen,pub.ArchivoImagenURL AS ArchivoImagenURL, UrlAlias, pub.TipoPub AS TipoPub, URLsend ";
			$LEFT_idioma = " LEFT JOIN publicaciones_idiomas AS pubI ON (pubI.KeyPub = pub.IdPub AND pubI.TipoPub_Id ='PUBLICACION' AND pubI.KeyIdioma = ".$keyIdioma.") ";
			$WHERE_idioma = "  ";// $WHERE_idioma = " AND pubI.Titulo_Id  <> '' ";
		}
		//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::				
				
		$sql = "SELECT IdPub, Titulo, Descripcion, Contenido, pub.ArchivoImagen AS ArchivoImagen, pub.ArchivoImagenURL AS ArchivoImagenURL, DATE_FORMAT(Fecha,'%d-%m-%Y')AS Fecha,
				rel.KeyConten AS KeyGaleria, fgal.ArchivoImagen AS ArchivoImagenG, pubI.Titulo_Id AS TituloI, pubI.Sumario_Id AS DescripcionI, pubI.Contenido_Id AS ContenidoI
				FROM publicaciones AS pub"
				.$LEFT_idioma.
				"LEFT JOIN publicaciones_relacion AS rel ON(rel.KeyPub=IdPub AND TipoConten = 'GAL') 
				 LEFT JOIN conten_galerias_fotos AS fgal ON (fgal.KeyOrigen = rel.KeyConten  AND fgal.EstatusFoto='A')
				 WHERE  IdPub = '".$datSlug["paramPag"]."' AND KeySitio = 1  ".$WHERE_idioma."  GROUP BY IdPub ORDER BY fgal.Posicion ASC ";		
					
		//echo $sql;	
		//exit();	
		$res = $mysql->ejecutar($sql,1);
		$reg = mysql_fetch_object($res);
		
		$IDpub      	= $reg->IdPub;
		
		if($Cookie == "S" && $reg->TituloI != "" ){
			$Titulo			= $reg->TituloI;
			$Descripcion	= $reg->DescripcionI;
			$Contenido		= $reg->ContenidoI;
		}else{
			$Titulo			= $reg->Titulo;
			$Descripcion	= $reg->Descripcion;
			$Contenido		= $reg->Contenido;
		}
		   
		
		$Fecha			= $reg->Fecha;
		$ArchivoImagen	= $reg->ArchivoImagen;
		$ArchivoImagenG	= $reg->ArchivoImagenG;
		$ArchivoImagenURL = $reg->ArchivoImagenURL;
		
		$TituloShare	= $reg->Titulo;
		$DescShare	    = $reg->Descripcion;
		
		$TitlePag       = $Titulo;
		
		//$Taxonomia		= $reg->Taxonomia;
		//---Los Datos de Galeria y Video Relacionados :::::::::::::::::::::::::::::::::::::::
		$sqlRel = "SELECT KeyConten,TipoConten 
				   FROM publicaciones_relacion 
				   WHERE KeyPub = '".$IDpub."' AND EstatusRel = 'A'";
		//echo $sqlRel;		   
		$resRel = $mysql->ejecutar($sqlRel,1);
		//$regRel = mysql_fetch_object($resRel);
		$nVid = 1; $nGal = 1;
		while($row = mysql_fetch_array($resRel)){
						
			if($row["TipoConten"]=="VID"){//Es video
				$IdVideo[$nVid]     = $row["KeyConten"];
				++ $nVid;
			}
			
			if($row["TipoConten"]=="GAL"){//Es video
				$IdGaleria[$nGal]     = $row["KeyConten"];
				++ $nGal;
			}
			
		}
		//print_r($IdPubRel);
		   
	  //::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
	}
	
}else{
	directNotFound();
}

$TituloNav = $Titulo;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<? include "includes_header.php"; ?>
<? 
$_GET["Ksite"] = "1";
include "site_skin/skin_load.php";
include "includes_default.php";
?>


</head>

<body class="BodyBg">

<? include "header.php";?>

<div id="ContenPag">
<div id="ContenPagInt"><? // ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::  ?>
 	
 
 <div style="overflow:hidden">
 	<div class="Columna7030Izq2"><? // ------------ ?>
    
      <div style="overflow:hidden">
	   
    	
        <article>
           <div class="artTitulo"><?=$Titulo;?></div>
           <div class="artDescrip" style="padding-top:5px"><?=$Descripcion;?></div>
           
           <div style="padding-top:5px; padding-bottom:5px">
          
           
     		<div class="artImgBorde"><img src="imagen.php?archivo=<?=$ArchivoImagen;?>&tipo=1&medida=6" class="imgFull" alt="<?=$row["Titulo"];?>" border="0"  /></div>
       	   </div>
               
           <div style="padding-top:5px; padding-bottom:10px"><? include "site_modulos/share_add_this.php"; ?></div>
              
           <div class="artContenido"><?=$Contenido;?></div>
           </br>
         </br>
         </br>
         
        </article>	
        
         </br>
          <center><span>Tell us what you think.</span></center>
          </br>
                    </br>
 	</div>
    
    
    </div><? // ----------------------------------- ?>
    <div class="Columna7030Sep2">&nbsp;</div>
   
    <div class="Columna7030Der2" style="padding-top:5px">
    	<div><img src="site_images/imagenes/support.png" /></div>
        
       
        
        
         <div style="padding-top:10px; float:left; margin-top:10px;">
        	   <? 
				 $_GET["id"]        = $IDpub;
				 $_GET["TitSeccion"]= $TitSeccion;
				 $_GET["KeySec2"]   = $KeySec2 ;
				 include "site_modulos/noticias_historial.php"; 
				?>
        </div>
    </div>
 </div>
    
</div>
</div><? //::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: ?>

<div style="height:15px">&nbsp;</div>
<? include "footer.php";?>
</body>



</html>


