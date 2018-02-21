<?php

function uploadhealtdataregion($projectID, $year, $region, $AWdiarrhea, $ABdiarrhea, $hepatitis, $typhoidFever, $cholera, $dengue, $malaria, $leptospirosis, $tetanus, $userID) {
    $datenow = date("Y-m-d H:i:s");
    require_once('dbconnect.php');

    $query = "INSERT INTO health_data_per_region (projectID,year,region,AWdiarrhea,ABdiarrhea,hepatitis,typhoidFever,cholera,dengue,malaria,leptospirosis,tetanus,uploadedBy,uploadDate) VALUES('$projectID', '$year', '$region', '$AWdiarrhea', '$ABdiarrhea', '$hepatitis', '$typhoidFever', '$cholera', '$dengue', '$malaria', '$leptospirosis', '$tetanus', '$userID','$datenow')";
    $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);

        return $query;
    } else {
        return $query;
    }
}

function getallhealthdataperregion(){
     require_once('dbconnect.php');

    $query = "SELECT hdpr.*, u.firstname, u.lastname FROM sdrcris.health_data_per_trgion hdpr JOIN sdrcris.user u ON hdpr.uploadedBy=u.userID WHERE hdpr.active = 1;";
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

function getallhealthdata_region(){
    require_once('dbconnect.php');

    $query = "SELECT * FROM health_data_per_region WHERE active = 1";
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


?>

