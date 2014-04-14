<?
// para medidas en proporcion utilizar up=s (utilizar proporcion)
$dir[1] = "site_images/imgs_publicaciones/";
$dirThumb[1] = "thumbs/";

$dir[2] = "site_images/imgs_galerias/";
$dirThumb[2] = "thumbs/";

//--
$dir[3] = "site_images/imgs_videos/";
$dirThumb[3] = "thumbs/";

$dir[4] = "site_images/imgs_agenda/";
$dirThumb[4] = "thumbs/";

$dir[5] = "site_images/imgs_perfiles/";
$dirThumb[5] = "thumbs/";

$dir[6] = "site_images/imgs_store/";
$dirThumb[6] = "thumbs/";


//1024 x 601   -- 601 x 1024
// principal Slide Portada
$tamanos_fotos_ancho_h[1] = 980; $tamanos_fotos_alto_h[1] = 601;
$tamanos_fotos_ancho_v[1] = 353; $tamanos_fotos_alto_v[1] = 601;

// thumbs noticias secundarias
$tamanos_fotos_ancho_h[2] = 150; $tamanos_fotos_alto_h[2] = 88;
$tamanos_fotos_ancho_v[2] = 52; $tamanos_fotos_alto_v[2] = 88;

//Imagen Interior Publciaciones
$tamanos_fotos_ancho_h[3] = 300; $tamanos_fotos_alto_h[3] = 176;
$tamanos_fotos_ancho_v[3] = 103; $tamanos_fotos_alto_v[3] = 176;

//
$tamanos_fotos_ancho_h[4] = 313; $tamanos_fotos_alto_h[4] = 107;
$tamanos_fotos_ancho_v[4] = 313; $tamanos_fotos_alto_v[4] = 107;

//Slide Mas noticias
$tamanos_fotos_ancho_h[5] = 142; $tamanos_fotos_alto_h[5] = 107;
$tamanos_fotos_ancho_v[5] = 142; $tamanos_fotos_alto_v[5] = 189;

// principal en las notas
$tamanos_fotos_ancho_h[6] = 590; $tamanos_fotos_alto_h[6] = 400;
$tamanos_fotos_ancho_v[6] = 332; $tamanos_fotos_alto_v[6] = 400;

// Fotos para los carruseles
$tamanos_fotos_ancho_h[7] = 176; $tamanos_fotos_alto_h[7] = 134;
$tamanos_fotos_ancho_v[7] = 101; $tamanos_fotos_alto_v[7] = 134;


// Fotos para La presnetacion de la galeria
$tamanos_fotos_ancho_h[8] = 590; $tamanos_fotos_alto_h[8] = 443;
$tamanos_fotos_ancho_v[8] = 332; $tamanos_fotos_alto_v[8] = 443;


// Fotos para El tumb de la geleria
$tamanos_fotos_ancho_h[9] = 100; $tamanos_fotos_alto_h[9] = 75;
$tamanos_fotos_ancho_v[9] = 56; $tamanos_fotos_alto_v[9] = 75;


//--- Foto thum listas VIDEOCORTINA----------
$tamanos_fotos_ancho_h[10] = 100;  $tamanos_fotos_alto_h[10] = 75;
$tamanos_fotos_ancho_v[10] = 56;    $tamanos_fotos_alto_v[10] = 75;


//--- Foto Galeria Grande----------
$tamanos_fotos_ancho_h[11] = 1024;  $tamanos_fotos_alto_h[11] = 683;
$tamanos_fotos_ancho_v[11] = 683;  $tamanos_fotos_alto_v[11] = 1024;

$tamanos_fotos_ancho_h[12] = 140;  $tamanos_fotos_alto_h[12] = 80;
$tamanos_fotos_ancho_v[12] = 140;  $tamanos_fotos_alto_v[12] = 80;

//======Para movil======================
//Slide Principal movil
$tamanos_fotos_ancho_h[13] = 875; $tamanos_fotos_alto_h[13] = 299;
$tamanos_fotos_ancho_v[13] = 875; $tamanos_fotos_alto_v[13] = 299;

$tamanos_fotos_ancho_h[14] = 400; $tamanos_fotos_alto_h[14] = 300;
$tamanos_fotos_ancho_v[14] = 225; $tamanos_fotos_alto_v[14] = 300;

$tamanos_fotos_ancho_h[15] = 800;    $tamanos_fotos_alto_h[15] = 600;
$tamanos_fotos_ancho_v[15] = 450;    $tamanos_fotos_alto_v[15] = 600;

$tamanos_fotos_ancho_h[16] = 195;    $tamanos_fotos_alto_h[16] = 116;
$tamanos_fotos_ancho_v[16] = 195;    $tamanos_fotos_alto_v[16] = 116;

$tamanos_fotos_ancho_h[17] = 185;    $tamanos_fotos_alto_h[17] = 115;
$tamanos_fotos_ancho_v[17] = 185;    $tamanos_fotos_alto_v[17] = 115;

$tamanos_fotos_ancho_h[18] = 390;    $tamanos_fotos_alto_h[18] = 280;
$tamanos_fotos_ancho_v[18] = 390;    $tamanos_fotos_alto_v[18] = 280;

$tamanos_fotos_ancho_h[19] = 90;    $tamanos_fotos_alto_h[19] = 105;
$tamanos_fotos_ancho_v[19] = 90;    $tamanos_fotos_alto_v[19] = 105;

$tamanos_fotos_ancho_h[20] = 130;    $tamanos_fotos_alto_h[20] = 85;
$tamanos_fotos_ancho_v[20] = 130;    $tamanos_fotos_alto_v[20] = 85;

$tamanos_fotos_ancho_h[21] = 80;    $tamanos_fotos_alto_h[21] = 45;
$tamanos_fotos_ancho_v[21] = 80;    $tamanos_fotos_alto_v[21] = 45;
//::::::::::... para las marcas de agua ::::::::::::::::::::::::::
$MarcaAgua[0] = "";
$MarcaAgua[1] = "imagenes_site/imgs_marca_agua/nada.png";
//$MarcaAgua[2] = "imagenes/marcas_de_agua/tecate.png";
//::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::


//$directorio = $dir[$_GET["tipo"]].substr($_GET["archivo"],0,2)."/".substr($_GET["archivo"],0,6)."/";
//echo $directorio."<br>";

$directorio = $dir[$_GET["tipo"]];
$directorioThumb = $dirThumb[$_GET["tipo"]];

//Directorio destino dentro del dir origen
//thumbs/
$medida     = $_GET["medida"];
$separa     = explode(".",$_GET["archivo"]);
//print_r($separa);
// -----------------------------------------------
// verificar si el archivo enviado tiene extension
if (count($separa) > 1) {
	// tiene extension
	$archivo = substr($_GET["archivo"],0,strlen($_GET["archivo"]) - 4);
	$extension = substr($_GET["archivo"],strlen($_GET["archivo"]) - 3,3);
	
	$archivo_original = $directorio.$_GET["archivo"]; 
	$archivo_final    = $directorio.$directorioThumb.$archivo ."_".$_GET["medida"].".".$extension;
	
}

//echo $archivo_original."<br>";
//echo $archivo_final;

// verificar si el archivo ya existe
if (!file_exists($archivo_final)) {
		
	  if(!is_writable($archivo_original)) { exit(); } // si el archivo no esta en proceso de envio o algo asi
	  
	  // sacar medidas del archivo original
	  $medidas = getimagesize($archivo_original);
	  
	  $ancho = $medidas[0];
	  $alto = $medidas[1];
	  
	  // para cuando se quiere sacar por proporcion
	  $ancho_original_ = $medidas[0];
	  $alto_original_ = $medidas[1];
	  
	  if ($tamanos_fotos_ancho[$medida] && $tamanos_fotos_alto[$medida]) {
		
		// aqui entra cuando el ancho y el alto son fijos (no importa si es horizontal o vertical)
		
		$ancho = $tamanos_fotos_ancho[$medida];
		$alto = $tamanos_fotos_alto[$medida];
		
	  } else { 
	  	
		// utilizar proporcion ?
		if ($_GET["up"] == "s") {
			
			if ($ancho > $alto) {
				// es mas ancho que alto (horizontal)
			  	$ancho = $tamanos_fotos_ancho_h[$medida];
				$ratio = $ancho / $ancho_original_;
				$alto = round($ratio * $alto_original_);
			} else {
			  	// es mas alto que ancho (vertical)
				$alto = $tamanos_fotos_alto_v[$medida];
				$ratio = $alto / $alto_original_;
				$ancho = round($ratio * $ancho_original_);
			}
			
		} else {		
		
			if ($ancho > $alto) {
			  // es mas ancho que alto (horizontal)
			  $ancho = $tamanos_fotos_ancho_h[$medida];
			  $alto = $tamanos_fotos_alto_h[$medida];
			} else {
			  // es mas alto que ancho (vertical)
			  $ancho = $tamanos_fotos_ancho_v[$medida];
			  $alto = $tamanos_fotos_alto_v[$medida];
			}
			
		}
	  
	  }
	  
	  $thumb = imagecreatetruecolor(abs($ancho), abs($alto));
	  
	  $img = imagecreatefromjpeg($archivo_original);
	  
	  if ($ancho_original && $alto_original) {
	    // (no mover) aqui solo entra si la medida de la imagen es 16 y es mas alto que ancho
	    imagecopyresampled ($thumb, $img, ($ancho / 2) - ($ancho_original / 2), 0, 0, 0, $ancho_original, $alto_original, $medidas[0], $medidas[1]);
	  } else {
	    // aqui entra por default
		
		imagecopyresampled ($thumb, $img, 0, 0, 0, 0, $ancho, $alto, $medidas[0], $medidas[1]);
		
       
	  }
		
	  if ($medida == 10 && $_GET["tipo"]=="3") {
		$imagenBanda = imagecreatefrompng("images/videocortina.png");
		imagecopy($thumb, $imagenBanda, 0, 0, 0, 0, imagesx($imagenBanda), imagesy($imagenBanda));
	  }		

      if($medida == 12){ 
		imagejpeg($thumb, $archivo_final,100);
	  }else{
	  	 imagejpeg($thumb, $archivo_final,75);
	  }
	 
	 
} 

// leer el archivo generado


Header("Content-Type: image/jpeg");
@readfile($archivo_final);

?>