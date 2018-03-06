<?php

function getallhealthinfrastructuredamages() {
    require_once('dbconnect.php');

    $query = "SELECT hid.*, CONCAT(u.firstname, u.lastname) FROM health_infrastructure_damages hid JOIN user u ON hid.uploadedBy=u.userID WHERE active = 1";
    $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);


        $num_rows = mysqli_num_rows($result);
        $query_result = array();

        if ($num_rows > 0) {
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $query_result[] = $row;
            }
            return $query_result;
        } else {
            return FALSE;
        }
    }
    $con->close();
}

function get_facilityID($f) {
    require_once('dbconnect.php');
    $query = "SELECT facilitiesID FROM facilities WHERE name LIKE '%$f%'";
    $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);
        return $result;
    }
    $con->close();
}

function uploadhealthinfrastructuredamages($projectID, $year, $month, $region, $city, $barangay, $facility, $existing, $available_for_use, $damaged_by_event_incident, $functional, $uploadedBy) {
    $datenow = date("Y-m-d H:i:s");
    require_once('dbconnect.php');


    
    $query = "INSERT INTO health_infrastructure_damages (projectID,year,month,region,city,barangay,facility,existing,available_for_use,damaged_by_event_incident,functional,uploadedBy,uploadDate) VALUES('$projectID','$year','$month','$region','$city','$barangay','$facility','$existing','$available_for_use','$damaged_by_event_incident','$functional','$uploadedBy','$datenow')";
    $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);

    } else {
        return FALSE;
    }
}
?>

