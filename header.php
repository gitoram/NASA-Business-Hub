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
            <? /*
            <div class="Banner730-90" style="float:left">&nbsp;</div>
            <div style="float:left; width:5px">&nbsp;</div>
            <div class="Banner240-90" style="float:left">&nbsp;</div>
        */ ?>
        <div><img style="width:980px; height:90px;" src="site_images/imagenes/banner-2.png" /></div>
        </div>
    </div>
    <div "HeaderInt" style="  height:30px; width:980px; margin:auto;" >
    	<div class="Columna5050Izq">
        	<div class="txtFecha"><?=$FechaHoy;?></div>
        </div>
        
        <div class="Columna5050Der">
             
             <div class="IcoHead"><a href="http://localhost/onestopshop"><img src="site_images/imagenes/iconos/rss.png" alt="RSS" class="imgPna" width="30" /></a></div>
             <div class="IcoHead"><a href="http://localhost/onestopshop"><img src="site_images/imagenes/iconos/twitter.png" alt="Twitter" class="imgPna" width="30" /></a></div>
             <div class="IcoHead"><a href="http://localhost/onestopshop"><img src="site_images/imagenes/iconos/facebook.png" alt="Facebook" class="imgPna" width="30" /></a></div>
   
        </div>
    </div>
   
	
     <div id="header-content"  style=" background:#111111; height:100px;">
          <div style="width:980px; margin:auto;">      
                <div class="Columna3070Izq" >
                    <a href="index.php" title="<?=SITE_TITLE;?>"><img src="site_images/imagenes/nasa-logo.png" alt="<?=SITE_TITLE;?>" class="imgFullLogo" /></a>
                </div> 
                
                <div class="Columna3070Der" > 
                           <div id="Menu">
                           
                                 <div class="ContenOut" style="float:right;">
                                 <form method="get" id="formSearch" name="formSearch" action="search.php">
                                 		<input id="data" name="data" type="text" value="Company,City,State,Program"  style="float:left; height:30px; width:300px;"/>
                <a href="javascript:void(0);" onclick="javascript:document.getElementById('formSearch').submit();"><div style="background:#000; float:left; height:30px; width:90px; color:#FFF; font-size:14px; text-align:center; padding-top:8px; border-radius:3px;">SEARCH</div></a>            
                </form>
                                 </div>    
        
   						 </div>
                         
                </div>
                
           </div>
   	</div>
		
</header>