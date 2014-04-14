<?
// ARREGLO CON LOS MESES Y LOS DIAS ..............................................
$Dia = array("Domingo","Lunes","Martes","Mi&eacute;rcoles","Jueves","Viernes","S&aacute;bado");
$Mes = array("","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

$FechaHoy = $Dia[date("w")]." ".date("d")." de ".$Mes[date("n")]." de ".date("Y");
//echo date("d");
// ...............................................................................
?>

<script language="javascript">
$( document ).ready(function() {
   $("#iMenu<?=$IdSec?>").removeClass();
   $("#iMenu<?=$IdSec?>").addClass('menuItemAct');
});
</script>
<header id="Header">


   
	<div id="headerBanners" style="height:110px; background:#333333">
          <div class="BannerContFull">
            
            <div class="Banner730-90" style="float:left">&nbsp;</div>
            <div style="float:left; width:5px">&nbsp;</div>
            <div class="Banner240-90" style="float:left">&nbsp;</div>
        
        </div>
    </div>
     <div "HeaderInt" style=" background:#F00; height:30px; width:980px; margin:auto;" >
    	<div class="Columna5050Izq">
        	<div class="txtFecha" ><?=$FechaHoy;?></div>
        </div>
        
        <div class="Columna5050Der">
             
             <div class="IcoHead"><a href=""><img src="site_images/imagenes/iconos/rss.png" alt="RSS" class="imgPna" width="30" /></a></div>
             <div class="IcoHead"><a href=""><img src="site_images/imagenes/iconos/twitter.png" alt="Twitter" class="imgPna" width="30" /></a></div>
             <div class="IcoHead"><a href=""><img src="site_images/imagenes/iconos/facebook.png" alt="Facebook" class="imgPna" width="30" /></a></div>
            
        </div>
    </div>
     <div  style=" background:#111111; height:100px; width:980px; margin:auto;">
          <div style="width:250px; float:left; background:#F60; ">      
                
                    <a href="index.php" title="<?=SITE_TITLE;?>"><img src="site_images/imagenes/SinaloaLogo.png" alt="<?=SITE_TITLE;?>" class="imgFullLogo" /></a>
               

           </div>
   	</div>
		
</header>