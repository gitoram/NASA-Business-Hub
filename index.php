<? 
session_start();
$_SESSION["acces"]= "S";
$_SESSION["UserAccess"]= "S";

//include "detectamovil.php";
include_once "site_includes/funciones.php";
//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<? include "includes_header.php"; ?>

<? 
$_GET["Ksite"] = "1";
include "site_skin/skin_load.php";

include "includes_default.php";
?>

</head>

<body class="BodyBg">
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<? include "header.php";?>

<div class="SlideBarra"><? include "site_modulos/home_slide.php"; ?></div>

<div id="ContenPag">
        <div id="ContenPagInt"><? // ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::  ?>
            
                 
         
            
        </div>
</div><? //::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: ?>

<div style="height:15px">&nbsp;</div>
<? include "footer.php";?>

</body>
</html>