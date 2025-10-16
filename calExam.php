<?php
include ("dbconnect.php");

$sql_events = mysqli_query($connection, "select * from ical where dept=6 ") or die (mysql_error());

$events = array();
while($row = mysqli_fetch_array($sql_events))
{

  $titles = $row['eventname'];
  $startdate = $row['date_start'];
  $enddate = $row['date_end'];


  $eventArray['title'] = $titles;
  $eventArray['start'] = $startdate;
  $eventArray['end'] = $enddate;
  $events[] = $eventArray;

}

echo json_encode($events);

?>
