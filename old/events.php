<?php
include ("dbconnect.php");

$sql_events = mysqli_query($connection, "select * from events") or die (mysql_error());
									
$events = array();
while($row = mysqli_fetch_array($sql_events))
{
	
  $titles = $row['name'];
  $startdate = $row['startdate'];
  $enddate = $row['enddate'];
  
  
  $eventArray['title'] = $titles;
  $eventArray['start'] = $startdate;
  $eventArray['end'] = $enddate;
  $events[] = $eventArray;

}

echo json_encode($events);

?>

