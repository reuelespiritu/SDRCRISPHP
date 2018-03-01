<?php

function getallways() {
    require_once('dbconnect.php');

    $query = "SELECT * FROM ways_spreading WHERE active = 1";
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

function add_way($way){
    require_once('dbconnect.php');

    $query = "INSERT INTO ways_spreading (way) VALUES('$way')";
    $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);

        return $query;
    } else {
        return $query;
    }
}

function deactivate_way($ways_spreadingID){
    require_once('dbconnect.php');

    $query = "UPDATE ways_spreading SET active = 0 WHERE ways_spreadingID = '$ways_spreadingID' ";
    $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);

        return $query;
    } else {
        return $query;
    }
}
?>

