	<?php

require 'phpqrcode/qrlib.php';

$dir = 'temp/';

if(!file_exists($dir))
{
	mkdir($dir);
}

$nombrearchivo = $dir.'test.png';

$tamano = 10;
$level = 'M';
$framesize = 3;
$contenido = 'Hola Mundo';

QRcode::png($contenido,$nombrearchivo,$level,$tamano,$framesize);

echo '<img src="'.$nombrearchivo.'"/>';
?>