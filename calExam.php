<?php
include ("dbconnect.php");

$sql_events = mysqli_query($connection, "SELECT * FROM ical WHERE dept=6 AND (is_active = 1 OR is_active IS NULL)");

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