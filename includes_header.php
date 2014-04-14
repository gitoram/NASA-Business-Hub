
<link href='http://fonts.googleapis.com/css?family=Signika:400,700,600,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700,300italic,400italic,500italic,700italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,400italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>

<link rel="shortcut icon" href="favIco/favicon.ico"  type="image/x-icon"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<? // <meta name="viewport" content="width=device-width" /> ?>
<? // <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">	?>


<? // :::::: PARA Buscadores y Robots ::::::::?>
<? if($TituloNav != ""){?>
	<title><?=$TituloNav;?></title>
<? }else{?>
	<title><?=SITE_TITLE;?></title>
<? }?>
<META NAME="Author" CONTENT="<?=SITE_AUTOR;?>">
<META NAME="Subject" CONTENT="<?=SITE_TEMA;?>">
<META NAME="Description" CONTENT="<?=SITE_DESCRIPCION;?>">
<META NAME="Keywords" CONTENT="<?=TAGS_PAG.$KeyWords?>">
<link rev="made" href="<?=SITE_EMAIL;?>">
<META NAME="Language" CONTENT="Spanish">
<META NAME="Abstract" CONTENT="<?=SITE_DESC2;?>">
<META NAME="Copyright" CONTENT="<?=SITE_DERECHOS;?>">
<META NAME="Designer" CONTENT="<?=SITE_DISENO;?>">
<META NAME="Publisher" CONTENT="<?=SITE_PUBLICA?>">
<META NAME="Revisit-After" CONTENT="1 Days">
<META NAME="Distribution" CONTENT="Global">
<META NAME="Robots" CONTENT="All">