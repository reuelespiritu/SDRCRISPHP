<?php

function getallhealth_data() {
    require_once('dbconnect.php');

    $query = "SELECT hd.*, (SELECT d.disease FROM diseases d WHERE d.diseaseID=hd.diseaseID) AS 'disease', (SELECT GROUP_CONCAT(way SEPARATOR ',') FROM ways_spreading ws WHERE ws.ways_spreadingID IN (SELECT dc.waysID FROM disease_communicable dc WHERE dc.diseaseID=hd.diseaseID)) AS 'communicable by', (SELECT CONCAT(u.firstname, u.lastname) FROM user u WHERE u.userID=hd.uploadedBy) AS 'uploadedBy' FROM health_data hd WHERE active = 1";
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

function getallhealth_data_communicable() {
    require_once('dbconnect.php');

    $query = "SELECT hd.*, (SELECT d.disease FROM diseases d WHERE d.diseaseID=hd.diseaseID) AS 'disease' FROM health_data hd WHERE active = 1 AND hd.diseaseID IN (SELECT d.diseaseID FROM diseases d WHERE d.communicable = 1)";
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

function getallhealth_data_noncommunicable() {
    require_once('dbconnect.php');

    $query = "SELECT hd.*, (SELECT d.disease FROM diseases d WHERE d.diseaseID=hd.diseaseID) AS 'disease' FROM health_data hd WHERE active = 1 AND hd.diseaseID IN (SELECT d.diseaseID FROM diseases d WHERE d.communicable = 0)";
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

function upload_health_data($projectID, $year, $month, $region, $city, $disease, $infected, $uploadedBy) {
    $datenow = date("Y-m-d H:i:s");
    require_once('dbconnect.php');
    
    $query = "INSERT INTO health_data (projectID,year,month,region,city,diseaseID,infected,uploadedBy,uploadDate) VALUES('$projectID','$year','$month','$region','$city','$disease','$infected','$uploadedBy','$datenow')";
    $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);

        return $query;
    } else {

        return $query;
    }
}


?>
