<? 
include_once "site_includes/class_mysql.php";
$mysql = new mysql;

/*
$sql = "SELECT pub.IdPub AS IdPub, pub.Titulo AS Titulo, pub.Descripcion AS Descripcion, pub.ArchivoImagen AS ArchivoImagen, UrlAlias,
		pub.TipoPub AS TipoPub,(SELECT Seccion2 FROM cat_secciones2 WHERE IdSec2 = pub.KeySec2) AS Seccion, pub.URLSend AS URLSend
		FROM publicaciones AS pub	
		LEFT JOIN url_alias AS url ON ( url.IdPub = pub.IdPub AND url.TipoPub = 'PUB')
		WHERE EstatusPub = 'A' ORDER BY IdPub DESC LIMIT 10";
	*/

$IdNo    = "0";

//-- Seccion SINALOA
$sql = "SELECT pub.IdPub AS IdPub, pub.Titulo AS Titulo, pub.Descripcion AS Descripcion, pub.ArchivoImagen AS ArchivoImagen, UrlAlias,
		pub.TipoPub AS TipoPub,(SELECT Seccion2 FROM cat_secciones2 WHERE IdSec2 = pub.KeySec2) AS Seccion, pub.URLSend AS URLSend
		FROM publicaciones AS pub	
		LEFT JOIN url_alias AS url ON ( url.IdPub = pub.IdPub AND url.TipoPub = 'PUB')
		WHERE pub.KeySec2 = 1 AND EstatusPub = 'A' ORDER BY IdPub DESC LIMIT 4";		
$res = $mysql->ejecutar($sql,1);	
$i = 1;
while($row = mysql_fetch_array($res)){ 

	$IdPub[$i]         = $row["IdPub"];
	$Titulo[$i]        = $row["Titulo"];
	$Descripcion[$i]   = $row["Descripcion"];
	$ArchivoImagen[$i] = $row["ArchivoImagen"];
    
	 if($row["TipoPub"]== "URL" && $row["URLSend"]!= "URL"){
		$UrlPub[$i] = $row["URLSend"];
	 }else{
		$UrlPub[$i] = "publicacion.php?publicacion=".$row["UrlAlias"];
	 }
	 
	 $IdNo .= ",".$IdPub[$i] ;
	 ++$i;
}
		
/*
<link rel="stylesheet" type="text/css" href="jquery/advance-slider/css/scrollbar/scrollbar-7-light/scrollbar-7-light.css" media="screen"/>
*/ 
?>

<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="jquery/advance-slider/css/base/advanced-slider-base.css"  media="screen"/>
<link rel="stylesheet" type="text/css" href="jquery/advance-slider/css/base/glossy-square/gray/glossy-square-gray.css"  media="screen"/>

<!--[if IE 7]><link rel="stylesheet" type="text/css" href="jquery/advance-slider/js/presentation-assets/presentation-ie7.css" media="screen"/><![endif]-->

<!--[if IE]><script type="text/javascript" src="jquery/advance-slider/js/excanvas.compiled.js"></script><![endif]-->



<script type="text/javascript" src="jquery/advance-slider/js/jquery.touchSwipe.min.js"></script>
<script type="text/javascript" src="jquery/advance-slider/js/jquery.advancedSlider.min.js"></script>

 
<div class="advanced-slider" style="background:#000" id="responsive-slider">
		<div class="slides">


			<? while($row = mysql_fetch_array($res)){ 
			
				 if($row["TipoPub"]== "URL" && $row["URLSend"]!= "URL"){
					  $UrlPub = $row["URLSend"];
				  }else{
					  $UrlPub = "publicacion.php?publicacion=".$row["UrlAlias"];
				  }
			?>
			<div class="slide">
				<a href="<?=$UrlPub;?>"><img class="image" src="imagen.php?archivo=<?=$row["ArchivoImagen"];?>&tipo=1&medida=1" alt=""/></a>
    			<img class="thumbnail"  src="imagen.php?archivo=<?=$row["ArchivoImagen"];?>&tipo=1&medida=16" alt="<?=$row["Titulo"];?>"/>

    			<div class="layer black" style="text-align:left; padding:10px; font-size:18px;" data-position="bottomLeft" data-horizontal="0" data-vertical="65" data-width="320" data-transition="down" data-height="100">
					<div style=" float:left; width:300px; "><strong><?=$row["Titulo"];?></strong></div>
                    <div  id="slideBotonVer" style="height:35px; float:left; width:300px; margin-top:15px;" >
                    	<center>
                        	<a href="<?=$UrlPub;?>">
                            	<div style="width:80px; height:15px; background:#ffda00; ">
                                	<span style="font-size:12px; font-weight:bold;">Ver Más</span>
                            	</div>
                            </a>
                       	</center>
                    </div>
				</div>

				<div class="layer white" data-position="bottomLeft" data-horizontal="0" data-vertical="10" data-transition="left" data-delay="200">
					<?=$row["Descripcion"];?>
				</div>
                
                
                <div class="layer red" data-position="topRight" data-horizontal="10" data-vertical="10" data-width="150" data-transition="up">
					<center><?=$row["Seccion"];?></center>
				</div>
              
			</div>
			
			<? } ?>
			
		</div>
</div>
 
    
 
            
 <script type="text/javascript">

	jQuery(document).ready(function($){
		$('#responsive-slider').advancedSlider({width: 980,
												height: 580,
												responsive: true,
												skin: 'glossy-square-gray',
												shadow: false,
												effectType: 'swipe',
												slideshow: true,
												pauseSlideshowOnHover: true,
												swipeThreshold: 30,
												slideButtons: false,
												slideArrows: false,
												thumbnailType: 'scroller',
												thumbnailWidth: 198,
												thumbnailHeight: 100,
												thumbnailButtons: false,
												thumbnailSwipe: true,
												thumbnailScrollerResponsive: true,
												timerAnimation: false,
												minimumVisibleThumbnails: 4,
												maximumVisibleThumbnails: 10,
												keyboardNavigation: true
		});
		
 
        
	});

</script>           
