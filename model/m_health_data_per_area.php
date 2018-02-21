<?php


function uploadhealtdataarea($projectID, $year, $province, $city, $AWdiarrhea, $ABdiarrhea, $hepatitis, $typhoidFever, $cholera, $dengue, $malaria, $leptospirosis, $tetanus, $userID) {
    $datenow = date("Y-m-d H:i:s");
    require_once('dbconnect.php');

    $query = "INSERT INTO health_data_per_area (projectID,year,province,city,AWdiarrhea,ABdiarrhea,hepatitis,typhoidFever,cholera,dengue,malaria,leptospirosis,tetanus,uploadedBy,uploadDate) VALUES('$projectID', '$year', '$province', '$city', '$AWdiarrhea', '$ABdiarrhea', '$hepatitis', '$typhoidFever', '$cholera', '$dengue', '$malaria', '$leptospirosis', '$tetanus', '$userID','$datenow')";
    $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);

        return $query;
    } else {
        return $query;
    }
}


function getallhealthdataperarea(){
     require_once('dbconnect.php');

    $query = "SELECT hdpa.*, u.firstname, u.lastname FROM sdrcris.health_data_per_area hdpa JOIN sdrcris.user u ON hdpa.uploadedBy=u.userID WHERE hdpa.active = 1;";
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


function getallhealthdata_area(){
    require_once('dbconnect.php');

    $query = "SELECT * FROM health_data_per_area WHERE active = 1";
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

