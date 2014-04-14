<?
//<link rel="apple-touch-icon" href="apple-touch-icon-iphone.png" />
//<link rel="apple-touch-icon" sizes="72x72" href="apple-touch-icon-ipad.png" />
//<link rel="apple-touch-icon" sizes="114x114" href="apple-touch-icon-iphone-retina-display.png" />

function SO_Movil(){
	$SOmovil = "PC";
	
	//android
	$ua = strtolower($_SERVER['HTTP_USER_AGENT']);
	if(stripos($ua,'android') !== false) { 
	  $SOmovil = "android";
	}
	
	// ipad
	$isiPad = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'iPad');
	if ($isiPad ==true){$SOmovil = "iPad";}
	
	// iphone/ipod
	if(strstr($_SERVER['HTTP_USER_AGENT'],'iPhone') || strstr($_SERVER['HTTP_USER_AGENT'],'iPod')){
		 $SOmovil = "iPhone";
	}

	//echo $_SERVER['HTTP_USER_AGENT'];
	return $SOmovil;
}

$SOnav = SO_Movil();
?>

<script language="javascript">
<? if($SOmovil != "PC"){?>
<? }?>
</script>