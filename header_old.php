<?
// ARREGLO CON LOS MESES Y LOS DIAS ..............................................
$Dia = array("Domingo","Lunes","Martes","Mi&eacute;rcoles","Jueves","Viernes","S&aacute;bado");
$Mes = array("","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

$FechaHoy = $Dia[date("w")]." ".date("d")." de ".$Mes[date("n")]." de ".date("Y");
//echo date("d");
// ...............................................................................
?>
<header id="Header">
    <div id="HeaderInt" style="padding-top:10px; padding-bottom:10px">
        <div class="Columna5050Izq">
        	<div class="txtFecha" style="padding-top:15px"><?=$FechaHoy;?></div>
        </div>
        
        <div class="Columna5050Sep">&nbsp;</div>
        
        <div class="Columna5050Der">
             
             <div class="IcoHead"><a href=""><img src="site_images/imagenes/iconos/rss.png" alt="RSS" class="imgPna" width="30" /></a></div>
             <div class="IcoHead"><a href=""><img src="site_images/imagenes/iconos/twitter.png" alt="Twitter" class="imgPna" width="30" /></a></div>
             <div class="IcoHead"><a href=""><img src="site_images/imagenes/iconos/facebook.png" alt="Facebook" class="imgPna" width="30" /></a></div>
            
        	 <div class="contRight txtContraM pad5" style="width:100px">Siguenos:&nbsp;</div>
             <div class="contRight txtContraM pad5" style="">&nbsp;|&nbsp;</div>
             <div class="contRight pad5" style=""><a href="index.php" class="txtContraM">Inicio</a></div>
            
        </div>
        
    </div>
    
    <div class="HLinea">&nbsp;</div>
    
     <div id="HeaderInt" style="padding-top:10px">
        <div class="Columna3070Izq" >
        	<a href="index.php" title="<?=SITE_TITLE;?>"><img src="site_images/imagenes/Sinaloa-Hoy.png" alt="<?=SITE_TITLE;?>" class="imgPna" height="130" /></a>
        </div>
        
        <div class="Columna3070Sep">&nbsp;</div>
        
        <div class="Columna3070Der" >
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
        	<td height="130px" valign="bottom" align="left">
            <nav>
            	<a href="seccion.php?seccion=sinaloa" class="MenuItem" style="width:85px">Sinaloa</a>
                <a href="seccion.php?seccion=el-mundo" class="MenuItem" style="width:100px">El Mundo</a>
                <a href="seccion.php?seccion=deportes" class="MenuItem" style="width:90px">Deportes</a>
                <a href="seccion.php?seccion=tecnologia" class="MenuItem" style="width:110px">Tecnologia</a>
                <a href="#" class="MenuItem" style="width:165px">De Oportunidad</a>
            </nav>
            </td>
        </tr>
        </table>
        </div>
    </div>
    
    
    <div id="MenuLine">&nbsp;</div>

</header>