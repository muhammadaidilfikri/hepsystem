<?php

require_once 'phpqrcode/qrlib.php';

$path = 'images/';
$file = $path.uniqid()."png";

$text = "test me";

QRcode::png($text,$file);

echo "<img src='" .$file."'>";

 ?>
