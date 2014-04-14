<?
session_start();
$_SESSION["UserAccess"]= "S";
include_once "site_includes/funciones.php";
include_once "site_includes/url-slug-decode.php";

$script = $_SERVER['PHP_SELF'];
$path_info = pathinfo($script);
$fileLoad = $path_info['basename'];

if(isset($_GET["data"])&& $_GET["data"]!=""){
	
	 include_once "site_includes/class_mysql.php";
	  $mysql = new mysql;
	$datSlug = $_GET["data"];
	//exit();
		/*$sql = "SELECT IdPub, Titulo, Descripcion, Contenido, pub.ArchivoImagen AS ArchivoImagen, pub.ArchivoImagenURL AS ArchivoImagenURL, DATE_FORMAT(Fecha,'%d-%m-%Y')AS Fecha,
				rel.KeyConten AS KeyGaleria, fgal.ArchivoImagen AS ArchivoImagenG, pubI.Titulo_Id AS TituloI, pubI.Sumario_Id AS DescripcionI, pubI.Contenido_Id AS ContenidoI
				FROM publicaciones AS pub"
				.$LEFT_idioma.
				"LEFT JOIN publicaciones_relacion AS rel ON(rel.KeyPub=IdPub AND TipoConten = 'GAL') 
				 LEFT JOIN conten_galerias_fotos AS fgal ON (fgal.KeyOrigen = rel.KeyConten  AND fgal.EstatusFoto='A')
				 WHERE  IdPub = '".$datSlug["paramPag"]."' AND KeySitio = 1  ".$WHERE_idioma."  GROUP BY IdPub ORDER BY fgal.Posicion ASC ";		
			*/
			
		$sql= "SELECT * FROM proveedores WHERE company LIKE '%".$datSlug."%' OR programa LIKE '%".$datSlug."%' OR ciudad LIKE '%".$datSlug."%' OR estado LIKE '%".$datSlug."%' order by company ASC";			
		//echo $sql;	
		//exit();	
		$res = $mysql->ejecutar($sql,1);
		$i=0;
		while($row = mysql_fetch_array($res)){
			
			$datos[$i]= $row['company'];
			$ciudades[$i] = $row['ciudad'];
			$ids[$i] = $row['id'];
			$i++;
		}
		//print_r($IdPubRel);
		   
	  //::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
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
    	<div style="width:100%; margin-bottom:10px;">
        	<center><strong>SEARCH RESULTS:</strong></center>
        </div>
        <div style="height:1px; width:100%; background-color:#333; margin-bottom:5px;">
        &nbsp;
        </div>
      <div  style="overflow:hidden; min-height:200px;">
	   
    	<?php
				if($datos){
				for($p = 0; $p < $i; $p++){ ?>
				<a href="information.php?idcompany=<? echo $ids[$p]; ?>">	
					<div class="resultadoProv" style=" width:100%; height:80px;">
                    	<div style="float:left; width:70px; height:70px; margin:5px; background-color:#000; border-radius:2px; overflow:hidden;">
                        	<img src="site_images/imagenes/empresa.png" style=" width:100%; height:100%;" />
                        </div>
						<div  style="margin-top:5px; float:left;  height:20px; margin:5px; ">
                                <span style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#333; font-weight:bold;" >Company: </span> 
                                
                                <span style="font-family:Arial, Helvetica, sans-serif; font-size:18px; font-weight:bold;">
                                
                                <? echo $datos[$p];?>
                                
                                </span>
						</div>
                        <div style="width:80%; height:10px; text-align:center; float:left; margin-top:10px;">
                        <span>Click for more information about the company.</span>
                        </div>
                        <div style="width:30%; height:10px; text-align:center; float:right;">
                        <span>City: <strong> <? echo $ciudades[$p];?></strong> </span>
                        </div>
					</div>
                   </a>
                    <div  style=" width:100%; height:10px;"> &nbsp;</div>
                     <?php
				}
				}else{?>
					<div style=" margin-top:30px; text-align:center; height:30px;"><? echo "No Search Results"; ?></div>
                    
				<? }
				
		?>
      
 		</div>

    </div><? // ----------------------------------- ?>
    <div class="Columna7030Sep2">&nbsp;</div>
   
    <div class="Columna7030Der2" style="padding-top:5px">
    	<div><img src="site_images/imagenes/support.png" /></div>
        
       
        <div style=" margin-top:10px; padding-top:10px; border: solid 1px #dad4d4 !important; padding-left:10px; float:left; height:600px; overflow:hidden;">
        	<? include "site_modulos/lo_mas.php"; ?>
        </div>
        
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


