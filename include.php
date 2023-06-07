<?php

include "lib\barcode.php";

$generator = new barcode_generator();

header('Content-Type: image/svg+xml');

$svg = $generator->render_svg("qr", "menu.php", "");

echo $svg;

?>