<?php

function getalldiseases() {
    require_once('dbconnect.php');

    $query = "SELECT * FROM diseases WHERE active = 1";
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

function getalldiseases_noncommunicable() {
    require_once('dbconnect.php');

    $query = "SELECT * FROM diseases WHERE active = 1 AND communicable = 0";
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

function getalldiseases_communicable() {
    require_once('dbconnect.php');

    $query = "SELECT * FROM diseases WHERE active = 1 AND communicable = 1";
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

function add_disease($disease) {
    require_once('dbconnect.php');

    $query = "INSERT INTO diseases (disease) VALUES('$disease')";
    $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);

        return $query;
    } else {
        return $query;
    }
}

function deactivate_disease($diseaseID){
    require_once('dbconnect.php');

    $query = "UPDATE diseases SET active = 0 WHERE diseaseID = '$diseaseID' ";
    $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);

        return $query;
    } else {
        return $query;
    }
}

function add_disease_communicable($diseaseID,$waysID){
    require_once('dbconnect.php');

    $query = "INSERT INTO disease_communicable (diseaseID,waysID) VALUES('$diseaseID','$waysID')";
    $con = createconnection();

    if (isset($query)) {
        $result = mysqli_query($con, $query);

        return $query;
    } else {
        return $query;
    }
}
?>

