<?
	include_once "../site_includes/funciones.php";
    include_once "../site_includes/url_slug.php";
	include_once "../site_includes/class_mysql.php";
	include_once "../site_includes/rss.php";
	include_once "../site_includes/servidor.php";
	
	//Se requieren 3 parametros : fuente, titulo, id
	//genera_url.php?fuente="CNN_WORLD"&titulo="un titulo"&id=1
	$idpub = $_GET["idpub"];
	if($_GET["fuente"] == "CNN_WORLD"){
	$Param["UserAcceso"] = "0";
	$Param["xmlDir"]     = "";
	$TIPO = "PUB";
	$KeySitio = "1";
	$URLslug = generaSlug($_GET["titulo"],$idpub,"PUB","","1");
	$Slug    = saveSlug($URLslug,$idpub,"PUB",$Param["xmlDir"],$Param["UserAcceso"],$KeySitio);
	echo "Slug Guardado";
	}
	if($_GET["fuente"] == "UNOCERO"){
	$Param["UserAcceso"] = "0";
	$Param["xmlDir"]     = "";
	$TIPO = "PUB";
	$KeySitio = "1";
	$URLslug = generaSlug($_GET["titulo"],$idpub,"PUB","","1");
	echo $idpub;
	$Slug    = saveSlug($URLslug,$idpub,"PUB",$Param["xmlDir"],$Param["UserAcceso"],$KeySitio);
	echo "Slug Guardado";
	}
	if($_GET["fuente"] == "MEDIOTIEMPO"){
	$Param["UserAcceso"] = "0";
	$Param["xmlDir"]     = "";
	$TIPO = "PUB";
	$KeySitio = "1";
	$URLslug = generaSlug($_GET["titulo"],$idpub,"PUB","","1");
	echo $idpub;
	$Slug    = saveSlug($URLslug,$idpub,"PUB",$Param["xmlDir"],$Param["UserAcceso"],$KeySitio);
	echo "Slug Guardado";
	}
	if($_GET["fuente"] == "VIVALANOTICIA"){
	$Param["UserAcceso"] = "0";
	$Param["xmlDir"]     = "";
	$TIPO = "PUB";
	$KeySitio = "1";
	$URLslug = generaSlug($_GET["titulo"],$idpub,"PUB","","1");
	echo $idpub;
	$Slug    = saveSlug($URLslug,$idpub,"PUB",$Param["xmlDir"],$Param["UserAcceso"],$KeySitio);
	echo "Slug Guardado";
	}
	?>
	
	
