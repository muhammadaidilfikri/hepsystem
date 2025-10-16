<?php
include ("dbconnect.php");

$sql_events = mysqli_query($connection, "select * from alert,position,ipta where position.post_id=alert.post_id and ipta.ipta_id=alert.ipta_id") or die (mysql_error());
									
$events = array();
while($row = mysqli_fetch_array($sql_events))
{
	
  $titles = $row['name'];
  $startdate = $row['date_end'];
  $enddate = $row['date_end'];
  $ipta = $row['ipta_a'];
  $position = $row['position']; 
	
  $desc = $position. " " .$ipta." expires today";	
  
  $eventArray['title'] = $desc;
  $eventArray['start'] = $startdate;
  $eventArray['end'] = $enddate;
  $events[] = $eventArray;

}

echo json_encode($events);

?>

