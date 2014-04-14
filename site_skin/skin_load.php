<?
//-- Las url son relativas al directorio raiz
define ("SKIN_RAIZ","site_skin/");
define ("SKIN_css","");
define ("SKIN_BgBody","");
define ("SKIN_Logo","");

/*:::::::::::::: Para leer el archivo de los Stilos ::::::::::::::::::: */
function SKIN_config($fileXML){
	$archivo  =   SKIN_RAIZ.$fileXML;
	$xml      =  simplexml_load_file($archivo);

	$skin["css"]       = SKIN_RAIZ.SKIN_css.$xml->Css;
	$skin["ImgBgBody"] = SKIN_RAIZ.SKIN_BgBody.$xml->ImgBgBody;
	$skin["BgBody"]    = $xml->BgBody;
	
	$skin["BgColor"]   = $xml->BgColor;
	$skin["BgHeadAct"] = $xml->BgHeadAct;
	$skin["BgHead"]    = SKIN_RAIZ.SKIN_BgBody.$xml->BgHead;
	$skin["Logo"]      = SKIN_RAIZ.SKIN_Logo.$xml->Logo;
	
	//$skin["UrlImgs"] = SKIN_RAIZ.SKIN_BgBody.$xml->UrlImgs;
	
	return $skin;
}
/*::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: */



$skin = SKIN_config("skin_settings_".$_GET["Ksite"].".xml");
//echo "skin_settings_".$_GET["Ksite"].".xml";
//print_r($skin);
?>
<link type="text/css" href="<?=$skin["css"];?>" rel="stylesheet" />

<style type="text/css">
<!--
body { 
	<? if ($skin["ImgBgBody"] != "" )  { ?>
		 
		background:url(<?=$skin["ImgBgBody"];?>) <?=$skin["BgBody"];?>;
	<? }?>
	
	background-color:<?=$skin["BgColor"];?>;
}

<? if($skin["BgHeadAct"] == "S" ){?>
.bgHeader{ background-image:url(<?=$skin["BgHead"];?>);}
<? }?>
-->
</style>