<?php

//dejen este include afuera de las carpetas no lo muevan

include "lib\barcode.php";

$generator = new barcode_generator();

header('Content-Type: image/svg+xml');

$svg = $generator->render_svg("qr", "INDEX.HTML", "");

echo $svg;

?>


