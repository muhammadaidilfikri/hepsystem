<?php
include ("dbconnect.php");

$sql_events = mysqli_query($connection, "select * from dept_activities where dept_stat='a' ") or die (mysql_error());

$events = array();
while($row = mysqli_fetch_array($sql_events))
{

  $titles = $row['dact_name'];
  $date_s = date_create($row["date_start"]);
  $date_e = date_create($row["date_end"]);
  $d_s = date_format($date_s, 'Y-m-d');
  $d_e = date_format($date_e, 'Y-m-d');


  $eventArray['title'] = $titles;
  $eventArray['start'] = $d_s."T"."08:00:00";
  $eventArray['end'] = $d_e."T"."17:00:00";
  $events[] = $eventArray;

}

echo json_encode($events);

?>
