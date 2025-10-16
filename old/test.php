<?
function days_between( $then, $now )
{
    // Put the 2 dates into DateTime objects
    $then = new DateTime($then);
    $now  = new DateTime($now);

    // Create a DateInterval object using diff() method
    $interval = $now->diff($then);

    // Format the result as an integer, representing number of days
    return $interval->format('%a');
}


echo days_between('2005-06-01','2018-09-04');

?>