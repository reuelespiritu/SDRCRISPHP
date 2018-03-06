<?php

require_once('model/dbconnect.php');
$WHERE = array();
$year = 2015;
$month = September;
$Region = 2015;
if ($year && isset($year)) {
    $WHERE[] = "ed.year='$year' ";
}
if ($month && isset($month)) {
    $WHERE[] = "ed.month LIKE '$month' ";
}
if ($region && isset($region)) {
    $WHERE[] = "ed.region LIKE '$region' ";
}
if ($city && isset($city)) {
    $WHERE[] = "ed.municipality LIKE '$city' ";
}
if ($incident && isset($incident)) {
    $WHERE[] = "ed.incident LIKE '$incident' ";
}
if ($barangay && isset($barangay)) {
    $WHERE[] = "ed.barangay LIKE '$barangay' ";
}
$query = "SELECT DISTINCT ed.incident, ed.number_of_incidents ,ed.region "
        . "FROM event_data ed "
        . "WHERE ed.active=1 ";
if (count($WHERE)) {
    $query .= "AND" . implode(" ", $WHERE);
}
$query .= "GROUP BY ed.incident, ed.region ORDER BY ed.region";
$con = createconnection();
$result = mysqli_query($con, $query);
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $query_result[] = $row;
}
return $query_result;
$con->close();
?>