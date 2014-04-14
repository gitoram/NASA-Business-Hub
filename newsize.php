<?php
// El archivo
$nombre_archivo = $_GET["ruta"];

// Establecer un ancho y alto máximo
$ancho = $_GET["ancho"];
$alto = $_GET["alto"];
$directorio = $_GET["dir"];
// Tipo de contenido
header('Content-Type: image/jpeg');

// Obtener las nuevas dimensiones
list($ancho_orig, $alto_orig) = getimagesize($nombre_archivo);

$ratio_orig = $ancho_orig/$alto_orig;

if ($ancho/$alto > $ratio_orig) {
   $ancho = $alto*$ratio_orig;
} else {
   $alto = $ancho/$ratio_orig;
}

// Redimensionar
$image_p = imagecreatetruecolor($ancho, $alto);
$image = imagecreatefromjpeg($nombre_archivo);
imagecopyresampled($image_p, $image, 0, 0, 0, 0, $ancho, $alto, $ancho_orig, $alto_orig);
imagedestroy($image);
// Imprimir

//Calidad

$calidad = 100;
imagejpeg($image_p, $directorio, $calidad);
?>