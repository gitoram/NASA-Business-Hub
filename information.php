<?
session_start();
$_SESSION["UserAccess"]= "S";
include_once "site_includes/funciones.php";
include_once "site_includes/url-slug-decode.php";

$script = $_SERVER['PHP_SELF'];
$path_info = pathinfo($script);
$fileLoad = $path_info['basename'];

if(isset($_GET["idcompany"])&& $_GET["idcompany"]!=""){
	
	 include_once "site_includes/class_mysql.php";
	  $mysql = new mysql;
	$datSlug = $_GET["idcompany"];

			
		$sql= "SELECT prov.`ciudad`,prov.`company`,prov.`estado`,prov.`programa`,pag.`url` FROM proveedores AS prov LEFT JOIN pagina_proveedor AS pag ON prov.`id` = pag.`id_compañia` WHERE prov.`id` =".$datSlug."";			
		//echo $sql;	
		//exit();	
		$res = $mysql->ejecutar($sql,1);
		$reg = mysql_fetch_object($res);
		
		$Nombre			= $reg->company;
			$Ciudad	= $reg->ciudad;
			$Estado		= $reg->estado;
			$Programa = $reg->programa;
			$Pagina = $reg->url;
		
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

		<div style="width:100%; height:400px; background-color:#CCC; border-radius:3px; overflow:hidden; margin-top:5px;">
        		<div style="width:100%; height:30px; text-align:center; float:left; color:#FFF; background-color:#333; font-size:16px; padding-top:5px; font-family:Tahoma, Geneva, sans-serif;">
                <STRONG>COMPANY INFORMATION</STRONG>
                </div>
                <div style="width:100%; height:280px;  margin-top:10px; float:left;">
                	<div style="width:250px; height:250px; margin-top:5px; margin-left:5px;  border-radius:3px; overflow:hidden; float:left;"> <img src="site_images/imagenes/empresa-big.png" alt="<? echo $Nombre; ?>" /></div>
                    <div style="margin-left:10px; margin-top:5px; width:400px; height:250px;  float:left;">
                    	<div style=" padding-top:5px; width:100%; height:20px; background-color:	#000; text-align:center; font-family:Arial, Helvetica, sans-serif; color:#FFF; font-weight:bold; float:left;">COMPANY:</div>
                        <div style=" background:#FFF; padding-top:5px; width:398px; height:15px; text-align:center; font-family:Arial, Helvetica, sans-serif; color:#333; font-weight:bold; border-color:#000; border-width:1px; border:thin; border-style:solid; float:left;"><? echo $Nombre; ?></div>
                        
                        <div style="width:100%; float:left; height:18px;">&nbsp;</div>
                        
                        <div style=" padding-top:5px; width:100%; height:20px; background-color:#000; text-align:center; font-family:Arial, Helvetica, sans-serif; color:#FFF; font-weight:bold; float:left;">CITY:</div>
                        <div style=" background:#FFF; padding-top:5px; width:398px; height:15px; text-align:center; font-family:Arial, Helvetica, sans-serif; color:#333; font-weight:bold; border-color:#000; border-width:1px; border:thin; border-style:solid; float:left;"><? echo $Ciudad; ?></div>
                            
                        <div style="width:100%; float:left; height:20px;">&nbsp;</div>
                        
                        <div style=" padding-top:5px; width:100%; height:20px; background-color:#000; text-align:center; font-family:Arial, Helvetica, sans-serif; color:#FFF; font-weight:bold; float:left;">STATE:</div>
                        <div style=" background:#FFF; padding-top:5px; width:398px; height:15px; text-align:center; font-family:Arial, Helvetica, sans-serif; color:#333; font-weight:bold; border-color:#000; border-width:1px; border:thin; border-style:solid; float:left;"><? echo $Estado; ?></div>
                            
                        <div style="width:100%; float:left; height:20px;">&nbsp;</div>
                        
                        <div style=" padding-top:5px; width:100%; height:20px; background-color:#000; text-align:center; font-family:Arial, Helvetica, sans-serif; color:#FFF; font-weight:bold; float:left;">PROGRAM:</div>
                        <div style=" background:#FFF; padding-top:5px; width:398px; height:15px; text-align:center; font-family:Arial, Helvetica, sans-serif; color:#333; font-weight:bold; border-color:#000; border-width:1px; border:thin; border-style:solid; float:left;"><? echo $Programa; ?></div>
                            
                        <div style="width:100%; float:left; height:15px;">&nbsp;</div>
                    </div>
                    
                    
                   
                     
                </div>
                <div style="width:100%; height:50px;  float:left; text-align:center">
                	<center><a href="<? echo $Pagina; ?>" target="_blank"><div style="width:250px; padding-top:10px; height:30px; background-color:#000; color:#FFF; border-radius:5px; font-weight:bold; font-family:Georgia, 'Times New Roman', Times, serif;">OPEN Company´s Website</div></a></center>
                </div>
                
        </div> 
        
        <div style="width:100%; height:400px; background-color:#CCC; border-radius:3px; overflow:hidden; margin-top:20px;">
        		<div style="width:100%; height:30px; text-align:center; float:left; color:#FFF; background-color:#333; font-size:16px; padding-top:5px; font-family:Tahoma, Geneva, sans-serif;">
                <STRONG>LOCATE COMPANY</STRONG>
                
                <div id="map-canvas" style=" height:370px;">
                	<iframe
  width="675"
  height="365"
  frameborder="0" style="border:0"
  src="https://www.google.com/maps/embed/v1/place?key=AIzaSyC4RaamD7gB0DkgcLjtT3BPJ3BCMww11sc&q=<? echo urlencode($Nombre); ?>,<? echo urlencode($Ciudad); ?>+<? echo urlencode($Estado); ?>">
</iframe>
                </div>
                </div>
                
                
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


