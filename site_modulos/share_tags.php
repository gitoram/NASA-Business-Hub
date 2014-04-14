

<? if($ShareImg!= ""){?>
<link rel="image_src" type="image/jpeg" href="<?=$ShareImg?>"/>
<? }else{?>
<link rel="image_src" type="image/jpeg" href="<?=URL_LOGO;?>"/>
<? }?>


<meta name="title" content="<?=utf8_decode($ShareTitulo);?>"/> 
<meta name="description" content="<?=utf8_decode($ShareDesc);?>"/> 

<meta name="keywords" content="<?=utf8_decode($ShareTags);?>">
<meta name="robot" content="index,follow">


<meta property="og:url" content="<?=URL_PAG?>" />
<meta property="og:title" content="<?=utf8_decode($ShareTitulo);?>" />
<meta property="og:description" content="<?=utf8_decode($ShareDesc);?>" />


<? if($ShareImg!= ""){?>
<meta property="og:image" content="<?=$ShareImg?>" />
<? }else{?>
 <? /* <meta property="og:image" content="<?=URL_LOGO?>" />*/ ?>
<meta property="og:image" content="<?=URL_PAG?>expomoto.jpg" />
<? }?>


<? // Se puso la imagen fija porque asi lo pidieron.. ?>
<? /* <meta property="og:image" content="<?=URL_PAG?>expomoto.jpg" />  */?>

<? // Para la foto debe ser tamanio 10?>