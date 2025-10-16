<?php


$timestamp = new DateTime('now', new DateTimezone('Asia/Kuala_Lumpur'));
echo $timestamp->format('Y-m-d H:i:s');
echo "<br>";

$date = time()+28800;
echo date("F d, Y h:i:s A", $date);

?>
