<?php
include ("dbconnect.php");

$sql_events = mysqli_query($connection, "select * from ical where dept=7 ") or die (mysql_error());

$events = array();
while($row = mysqli_fetch_array($sql_events))
{

  $titles = $row['eventname'];
  $startdate = $row['date_start'];
  $enddate = $row['date_end'];


  $eventArray['title'] = $titles;
  $eventArray['start'] = $startdate."T"."08:00:00";
  $eventArray['end'] = $enddate."T"."17:00:00";
  $events[] = $eventArray;

}

echo json_encode($events);

?>
